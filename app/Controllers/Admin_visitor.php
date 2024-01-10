<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_visitor extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			$data['data'] = $this->mod->getSome('pengguna',['level' => 'low']);
			return view('admin/visitor',$data);
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function save(){
		$get = $this->request->getPost();
		if($get['proses'] == 'ubah'){
			$data = array(
				'status' => $get['status']
			);
			$this->mod->updating('pengguna',$data,['idpengguna' => $get['id']]);
		}
		return redirect()->to(base_url('a/pengunjung'));
	}
}
?>