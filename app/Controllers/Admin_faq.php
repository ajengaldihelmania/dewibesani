<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_faq extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			$data['data'] = $this->mod->getAll('faq');
			return view('admin/faq',$data);
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
				'idfaq' => null,
				'tanya' => $get['tanya'],
				'jawab' => $get['jawab']
			);
			$this->mod->inserting('faq',$data);
		}else{
			$data = array(
				'tanya' => $get['tanya'],
				'jawab' => $get['jawab']
			);
			$this->mod->updating('faq',$data,['idfaq' => $get['id']]);
		}
		return redirect()->to(base_url('a/faq'));
	}

	public function delete($x){
		$this->mod->deleting('faq',['idfaq' => $x]);
		return redirect()->to(base_url('a/faq'));
	}
}
?>