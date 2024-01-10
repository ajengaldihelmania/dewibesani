<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_account extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			$data['data'] = $this->mod->getAll('rekening');
			return view('admin/account',$data);
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url(''));
		}
	}

	public function save(){
		$get = $this->request->getPost();
		if($get['proses'] == 'simpan'){
			$data = array(
				'idrekening' => null,
				'bank' => $get['bank'],
				'norek' => $get['norek'],
				'an' => $get['an'],
				'status' => '1'
			);
			$this->mod->inserting('rekening',$data);
		}else{
			$data = array(
				'bank' => $get['bank'],
				'norek' => $get['norek'],
				'an' => $get['an'],
				'status' => $get['status']
			);
			$this->mod->updating('rekening',$data,['idrekening' => $get['id']]);
		}
		return redirect()->to(base_url('a/rekening'));
	}

	public function delete($x){
		$this->mod->deleting('rekening',['idrekening' => $x]);
		$this->mod->deleting('bayar',['idrekening' => $x]);
		return redirect()->to(base_url('a/rekening'));
	}
}
?>