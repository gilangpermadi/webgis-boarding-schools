<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $filename = "format"; // Kita tentukan nama filenya

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Model_ponpes');
		$this->load->model('Model_autonumber');
		$this->load->model('Model_excel');
	}

	public function index() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';

		$data['totalUser'] = $this->Model_ponpes->totalOperator();
		$data['totalData'] = $this->db->count_all_results('dataponpes');
		$data['totalAnalyze'] = $this->db->count_all_results('hasil');
		$data['chartHasil'] = $this->Model_ponpes->chart();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function role() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Akses';

		$data['role'] = $this->db->get_where('tb_role')->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/user_footer');
	}

	public function roleaccess($role_id) {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Akses';

		$data['role'] = $this->db->get_where('tb_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('tb_usermenu')->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/user_footer');
	}

	public function changeAccess() {
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('tb_access', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('tb_access', $data);
		} else {
			$this->db->delete('tb_access', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert>Akses telah diubah!</div>');
	}

	public function dataPonpes() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Pondok Pesantren';
		$data['dataPonpes'] = $this->Model_ponpes->getPonpes();
		
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/dataPonpes', $data);
		$this->load->view('templates/user_footer');

	}

	public function detail($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Info Lengkap';

		$detail = $this->Model_ponpes->getPonpesById($id);
		$data['detail'] = $detail;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function add_data() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data';
		$data['dataKecamatan'] = $this->db->get('kecamatan')->result_array();
		$data['dataProgram'] = $this->db->get('program_pendidikan')->result_array();
		$data['dataDaerah'] = $this->db->get('daerah')->result_array();

		$data['getCode'] = $this->Model_autonumber->kodePonpes();

		$this->form_validation->set_rules('nspp', 'NSPP', 'required|trim|numeric|is_unique[dataponpes.nspp]', [
			'is_unique' => 'Nomor Statistik sudah ada',
			'required' => 'Nomor Statistik wajib diisi'
		]);
		$this->form_validation->set_rules('lat', 'Latitude', 'required|trim|numeric', [
			'numeric' => 'Latitude salah. Inputan mengandung karakter atau huruf'
		]);
		$this->form_validation->set_rules('lon', 'Longitude', 'required|trim|numeric', [
			'numeric' => 'Longitude salah. Inputan mengandung karakter atau huruf'
		]);
		$this->form_validation->set_rules('jsantri', 'Jumlah Santri', 'required|trim|numeric', [
			'numeric' => 'Jumlah Santri salah. Inputan mengandung karakter atau huruf',
			'required' => 'Jumlah Santri wajib diisi'
		]);
		$this->form_validation->set_rules('jtenaga', 'Jumlah Tenaga', 'required|trim|numeric', [
			'numeric' => 'Jumlah Tenaga salah. Inputan mengandung karakter atau huruf',
			'required' => 'Jumlah Tenaga wajib diisi'
		]);

		if($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('admin/add', $data);
			$this->load->view('templates/user_footer');
		} else {
			$data_unit = $this->input->post('program');
			$data =[
				'id_ponpes' => $this->input->post('id'),
				'nspp' => $this->input->post('nspp'),
				'nama_ponpes' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'id_kecamatan' => $this->input->post('kecamatan'),
				'tgl_berdiri' => $this->input->post('tanggal'),
				'yayasan' => $this->input->post('yayasan'),
				'id_daerah' => $this->input->post('daerah'),
				'jumlah_santri' => $this->input->post('jsantri'),
				'jumlah_tenaga' => $this->input->post('jtenaga'),
				'jumlah_unit' => sizeof($data_unit),
				'lat' => $this->input->post('lat'),
				'lon' => $this->input->post('lon'),
				'pengupdate' => $this->input->post('updater'),
				'tgl_update' => time()
			];

			foreach ($data_unit as $unit) {
				$add_unit = array(
					'id_ponpes' => $this->input->post('id'),
					'nama_unit' => $unit
				);
				$this->db->insert('ponpes_unit', $add_unit);
			}
			$this->db->insert('dataponpes', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
			redirect('admin/dataponpes');
		}
	}

	public function edit_data($id){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Ubah Data';
		$where = array('id_ponpes' => $id);

		$data['pontren'] = $this->Model_ponpes->editPonpesById($where, 'dataponpes')->row_array();
		$data['dataKecamatan'] = $this->db->get('kecamatan')->result_array();
		$data['dataDaerah'] = $this->db->get('daerah')->result_array();
		$data['ponpes_unit'] = $this->db->get_where('ponpes_unit', ['id_ponpes' => $id])->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/edit', $data);
		$this->load->view('templates/user_footer');
	}

	public function update_data(){
		$data_unit = $this->input->post('program');
		if($data_unit == null){
			$unit = 0;
		} else {
			$unit = sizeof($data_unit);
		}
		$countUnit = $this->db->where('id_ponpes', $this->input->post('id'))->from('ponpes_unit')->count_all_results() + $unit;
		$data = [
			'nspp' => $this->input->post('nspp'),
			'nama_ponpes' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'id_kecamatan' => $this->input->post('kecamatan'),
			'tgl_berdiri' => $this->input->post('tanggal'),
			'yayasan' => $this->input->post('yayasan'),
			'id_daerah' => $this->input->post('daerah'),
			'jumlah_santri' => $this->input->post('jsantri'),
			'jumlah_tenaga' => $this->input->post('jtenaga'),
			'jumlah_unit' => $countUnit,
			'lat' => $this->input->post('lat'),
			'lon' => $this->input->post('lon'),
			'pengupdate' => $this->input->post('updater'),
			'tgl_update' => time()
		];
		$where = [
			'id_ponpes' => $this->input->post('id')
		];
		if($data_unit){
			foreach ($data_unit as $unit) {
				$add_unit = array(
					'id_ponpes' => $this->input->post('id'),
					'nama_unit' => $unit
				);
				$this->db->insert('ponpes_unit', $add_unit);
			}
		} else {
			$this->Model_ponpes->update($where, $data, 'dataponpes');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
			redirect('admin/dataponpes','refresh');
		}
		

		$this->Model_ponpes->update($where, $data, 'dataponpes');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
		redirect('admin/dataponpes','refresh');
	}

	public function hapus($id){
		$where = ['id_ponpes' => $id];
		$this->Model_ponpes->hapus_data($where, 'dataponpes');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di hapus!</div>');
		redirect('admin/dataponpes');
	}

	public function user(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Operator';
		$data['manageUser'] = $this->ponpes->user();
		$data['sttsApproved'] = $this->ponpes->approved();
		$data['sttsPending'] = $this->ponpes->pending();
		
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_all(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Operator';

		$data['manageUser'] = $this->ponpes->user();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user-all', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_pending(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Operator';

		$data['manageUser'] = $this->ponpes->user();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user-pending', $data);
		$this->load->view('templates/user_footer');
	}

	public function pratinjau($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Pratinjau';

		$user = $this->Model_ponpes->getUserById($id);
		$data['user'] = $user;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/pratinjau', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_detail($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail';

		$user = $this->Model_ponpes->getUserById($id);
		$data['user'] = $user;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('admin/user-detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function user_acc($id){
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		$this->db->update('tb_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil disetujui!</div>');
		redirect('admin/user');
	}

	public function user_dec($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditolak!</div>');
		redirect('admin/user');
	}

	public function user_block($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diblokir!</div>');
		redirect('admin/user');
	}

	public function preview(){
		$data = array(); // Buat variabel $data sebagai array

	    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
	      	// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	    	$upload = $this->Model_excel->upload_file($this->filename);

	      	if($upload['result'] == "success"){ // Jika proses upload sukses
		        // Load plugin PHPExcel nya
		      	include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		      	$excelreader = new PHPExcel_Reader_Excel2007();
		        $loadexcel = $excelreader->load(FCPATH . 'assets/file/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
		        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		        
		        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
		        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
		        $data['sheet'] = $sheet; 
		      }else{ // Jika proses upload gagal
		        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		    }
		}
		$this->load->view('admin/preview', $data);
	}

	public function import(){
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load(FCPATH . 'assets/file/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    
	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'nis'=>$row['A'], // Insert data nis dari kolom A di excel
	          'nama'=>$row['B'], // Insert data nama dari kolom B di excel
	          'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
	          'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->Model_excel->insert_multiple($data);
	    
	    redirect("admin/dataPonpes"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}