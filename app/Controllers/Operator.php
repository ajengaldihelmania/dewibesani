<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Operator extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('a'));
		}else if(session()->get('mid')){
			return view('operator/landing');
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function showprofile(){
		$data['data'] = $this->mod->getData('pengguna',['idpengguna' => session()->get('mid')]);
		return view('operator/profile',$data);
	}

	public function changeprofile(){
		$get = $this->request->getPost();
		$cek = $this->db->query("select * from pengguna where idpengguna not in (".session()->get('mid').") and username = '".$get['username']."'")->getResultArray();
		if(count($cek) == 0){
			$data = array(
				'nama' => $get['nama'],
				'alamat' => $get['alamat'],
				'telepon' => $get['telepon'],
				'email' => $get['email'],
				'username' => $get['username']
			);
		}else{
			$data = array(
				'nama' => $get['nama'],
				'alamat' => $get['alamat'],
				'telepon' => $get['telepon'],
				'email' => $get['email']
			);
		}
		$this->mod->updating('pengguna',$data,['idpengguna' => session()->get('mid')]);
		return redirect()->to(base_url('o/profil'));
	}

	public function showaccess(){
		return view('operator/access');
	}

	public function changeaccess(){
		$get = $this->request->getPost();
		$p = $this->mod->getData('pengguna',['idpengguna' => session()->get('mid')]);
		if($p['password'] == md5($get['p1'])){
			if($get['p2'] == $get['p3']){
				$this->mod->updating('pengguna',['password' => md5($get['p3'])],['idpengguna' => session()->get('mid')]);
			}
		}
		return redirect()->to(base_url('o/akses'));
	}
}
?>