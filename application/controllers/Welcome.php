<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->library('javascript');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
	  }

	public function index()
	{
		
		$data['user'] = $this->db->get('biodata')->result();
		$data['jenjang'] = $this->db->query('SELECT * FROM `pendidikan` 
		INNER join jenjang_pendidikan USING(id_jenjang)')->result();
		$this->load->view('header',$data);
		$this->load->view('home',$data);
		// echo json_encode($data);
		$this->load->view('footer');
	}
	public function editbio($npm)
	{
		$data['user'] = $this->db->get('biodata')->result();
		$where = array('npm' => $npm);
		$data['data'] = $this->db->get_where('biodata',$where)->result();
		$this->load->view('header',$data);
		$this->load->view('edit_bio',$data);
		$this->load->view('footer');
	}
	public function updatebio()
	{
		$npm = $this->input->post('npm');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$deskripsi = $this->input->post('deskripsi');
		$data = array(
			'nama' => $nama,
			'tgl_lahir' => $tgl_lahir,
			'email' => $email,
			'alamat' => $alamat,
			'deskripsi' => $deskripsi
		);
	 
		$where = array(
			'npm' => $npm
		);
		$this->db->where($where);
		$this->db->update('biodata',$data);
		redirect('/');
	}

	public function tambahjenjang(){
		$data['jenjang'] = $this->db->get('jenjang_pendidikan')->result();
		$data['user'] = $this->db->get('biodata')->result();
		// echo json_encode($data);
		$this->load->view('header',$data);
		$this->load->view('tambah_jenjang',$data);
		$this->load->view('footer');
	}

	public function simpanjenjang()
	{
		$id_jenjang = $this->input->post('id_jenjang');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$thn_lulus = $this->input->post('thn_lulus');
		$data = array(
			'nama_sekolah' => $nama_sekolah,
			'id_jenjang' => $id_jenjang,
			'thn_lulus' => $thn_lulus
		);
		$this->db->insert('pendidikan',$data);
		redirect('/');
	}

	public function editjenjang($id)
	{
		$data['user'] = $this->db->get('biodata')->result();
		$where = array('id_pendidikan' => $id);
		$data['data'] = $this->db->get_where('pendidikan',$where)->result();
		$data['jenjang'] = $this->db->get('jenjang_pendidikan')->result();
		$this->load->view('header',$data);
		$this->load->view('edit_jenjang',$data);
		$this->load->view('footer');
	}

	public function updatejenjang()
	{
		$id_jenjang = $this->input->post('id_jenjang');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$thn_lulus = $this->input->post('thn_lulus');
		$id_pendidikan = $this->input->post('id_pendidikan');

		$data = array(
			'nama_sekolah' => $nama_sekolah,
			'id_jenjang' => $id_jenjang,
			'thn_lulus' => $thn_lulus
		);
		$where = array(
			'id_pendidikan' => $id_pendidikan
		);
		$this->db->where($where);
		$this->db->update('pendidikan',$data);
		redirect('/');
	}

	public function hapusjenjang($id)
	{
		$where = array('id_pendidikan' => $id);
		$this->db->where($where);
		$this->db->delete('pendidikan');
		redirect('/');
	}

	public function login(){
		$data['user'] = $this->db->get('biodata')->result();
		// echo json_encode($data);
		$this->load->view('header',$data);
		$this->load->view('login');
		$this->load->view('footer');
	}
/*

Penjelasan kode ada di login auth
https://github.com/ilcupnjatim/simple-crud/blob/master/proseslogin.php#L1

*/
	public function auth(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password=md5(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
		$cek=$this->db->query("SELECT * FROM user WHERE username='$username' LIMIT 1");
		$ambildata = $cek->row();
		$biodata = $this->db->get('biodata')->row();
		// $cek_dosen=$this->login_model->auth_dosen($username,$password);
		if ($cek->num_rows() == 0 || $cek->num_rows() > 1) {
			echo '<script language="javascript">alert("Tidak bisa Login !"); document.location="login";</script>';
		} else {
			# code...
			if (password_verify($password, $ambildata->password)) {
				$this->session->set_userdata('cek_masuk',TRUE);
				$this->session->set_userdata('session_username',$ambildata->username);
				$this->session->set_userdata('session_nama',$ambildata->username);
				echo '<script language="javascript">alert("Sukses Login !");</script>';
				echo "Sukses login\nSelanjutnya kalian kembangin sendiri ya.\nSemangattttttt";
			} else {
				echo '<script language="javascript">alert("Tidak bisa Login !"); document.location="login";</script>';
			}
		}
	}

	/*

Penjelasan kode ada di login auth
https://github.com/ilcupnjatim/simple-crud/blob/master/proseslogin.php#L1

*/
}
