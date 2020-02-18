<?php
function geojson($arr)
{
	$geojson = array (
		'type'	=> 'FeatureCollection',
		'features'	=> array()
	);

	foreach ($arr as $row) {
		$properties = $row;
		unset($properties['lat']);
		unset($properties['lon']);
		$feature = array(
			'type'	=> 'Feature',
			'geometry' => array(
				'type' => 'Point',
				'coordinates' => array(
					floatval($row['lon']),
					floatval($row['lat'])
				)
			),
			'properties' => $properties
		);
		array_push($geojson['features'], $feature);
	}

	header('Content-type: application/json');
	$final = json_encode($geojson, JSON_PRETTY_PRINT);
	return $final;
	//for local json files use code below

	/*$fp = fopen('data.json', 'w');
	fwrite($fp, geoJson($json));
	fclose($fp);*/
}

?>