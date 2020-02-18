<?php 
$ci = get_instance();
$ci->load->model('Model_ponpes', 'ponpes');
// Random values 0 - 1
function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
}

class Point {
    public $jumlah_santri;
    public $jumlah_tenaga;
    public $jumlah_unit;
}

$GLOBALS['decisions'] = [];
$GLOBALS['iterations'] = 0;

//  Fuzzy C Means Algorithm
//  Cari Matriks Baru
function distributeOverMatrixU($arr, $m, &$centers, $maxIter, $epsilon, $clusters) {
    $ci = get_instance();
    $centers = $ci->ponpes->getAlternate();
    $MatrixU = fillUMatrix(count($arr), $clusters);

    $previousDecisionValue = 0;
    $currentDecisionValue = 1;

    for($a = 0; $a < $maxIter && (abs($previousDecisionValue - $currentDecisionValue) > $epsilon); $a++) {
        $previousDecisionValue = $currentDecisionValue;
        $centers = calculateCenters($MatrixU, $m, $arr, $clusters);


        foreach($MatrixU as $key => &$uRow){
            foreach($uRow as $clusterIndex => &$u){
                $distance = evklidDistance3D($arr[$key], $centers[$clusterIndex]);
                $u = prepareU($distance, $m);
            }
            $uRow = normalizeUMatrixRow($uRow);
        }
        $currentDecisionValue = calculateDecisionFunction($arr, $centers, $MatrixU);
    }
    global $iterations;
    $iterations = $a;
    return $MatrixU;
}


// Isi Matriks Awal
function fillUMatrix($pointsCount, $clustersCount) {
    $MatrixU = [];
    for($i = 0; $i < $pointsCount; $i++){
        $MatrixU[$i] = [];
        for($j=0; $j<$clustersCount; $j++){
            $MatrixU[$i][$j] = random_float(0, 1);
        }
        $MatrixU[$i] = normalizeUMatrixRow($MatrixU[$i]);
    }
    return $MatrixU;
}


// Cari Centroid
function calculateCenters($MatrixU, $m, $points, $clusters)
{
    $MatrixCentroids = [];

    for($clusterIndex=0; $clusterIndex < $clusters; $clusterIndex++){
        $tempAjs = 0;
        $tempBjs = 0;
        $tempAjt = 0;
        $tempBjt = 0;
        $tempAp = 0;
        $tempBp = 0;

        foreach($MatrixU as $key=>$uRow){
            $tempAjs += pow($uRow[$clusterIndex],$m);
            $tempBjs += pow($uRow[$clusterIndex],$m) * $points[$key]->x1;

            $tempAjt += pow($uRow[$clusterIndex],$m);
            $tempBjt += pow($uRow[$clusterIndex],$m) * $points[$key]->x2;

            $tempAp += pow($uRow[$clusterIndex],$m);
            $tempBp += pow($uRow[$clusterIndex],$m) * $points[$key]->x3;
        }

        $MatrixCentroids[$clusterIndex] = new Point();
        $MatrixCentroids[$clusterIndex]->x1 = $tempBjs / $tempAjs;
        $MatrixCentroids[$clusterIndex]->x2 = $tempBjt / $tempAjt;
        $MatrixCentroids[$clusterIndex]->x3 = $tempBp / $tempAp;
    }

    return $MatrixCentroids;
}

function calculateDecisionFunction($MatrixPointX, $MatrixCentroids, $MatrixU)
{
    $sum = 0;
    foreach($MatrixU as $index => $uRow){
        foreach($uRow as $clusterIndex => $u){
            $sum += $u * evklidDistance3D($MatrixCentroids[$clusterIndex], $MatrixPointX[$index]);
        }
    }

    global $decisions;
    array_push($decisions, $sum);
    return $sum;
}

// Cari Jarak
function evklidDistance3D($pointA, $pointB)
{
    $distance1 = pow(($pointA->x1 - $pointB->x1),2);
    $distance2 = pow(($pointA->x2 - $pointB->x2),2);
    $distance3 = pow(($pointA->x3 - $pointB->x3),2);
    $distance = $distance1 + $distance2 + $distance3;
    return sqrt($distance);
}

function normalizeUMatrixRow($MatrixURow)
{
    $sum = 0;
    foreach($MatrixURow as $u){
        $sum += $u;
    }

    foreach($MatrixURow as &$u){
        $u = $u / $sum;
    }

    return $MatrixURow;
}

function prepareU($distance, $m)
{
    return pow(1/$distance , 2/($m-1));
}

function normData($fillData) {
    $ci = get_instance();
    $ci->db->empty_table('alternatif');
    $maxJS = max(array_column($fillData, 'jumlah_santri'));
    $maxJT = max(array_column($fillData, 'jumlah_tenaga'));
    $maxPP = max(array_column($fillData, 'jumlah_unit'));
    $no = 1;
    foreach ($fillData as $data) {
        $hasil = array(
            'id_alternatif' => $no++,
            'id_dataponpes' => $data['id_ponpes'],
            'x1' => ($data['jumlah_santri'] / $maxJS),
            'x2' => ($data['jumlah_tenaga'] / $maxJT),
            'x3' => ($data['jumlah_unit'] / $maxPP)
        );
        $ci->db->insert('alternatif', $hasil);
    }
}

// function dataNorm($dataRow) {
//     $dataRow = max([$dataRow]);
//     var_dump($dataRow);
//     die;
// }

// function maxData() {

// }