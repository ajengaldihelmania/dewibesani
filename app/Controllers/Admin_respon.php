<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_respon extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('a'));
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function showsuggestion(){
		$data['data'] = $this->mod->getSome('respon',['jenis' => '1']);
		return view('admin/suggestion',$data);
	}

	public function showtestimony(){
		$data['data'] = $this->mod->getSome('respon',['jenis' => '0']);
		return view('admin/testimony',$data);
	}

	public function changetestimony(){
		$get = $this->request->getPost();
		$this->mod->updating('respon',['status' => $get['status']],['idrespon' => $get['id']]);
		return redirect()->to(base_url('a/testimoni'));
	}
}
?>