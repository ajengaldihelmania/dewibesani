<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Operator_respon extends BaseController{
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
		return view('operator/suggestion',$data);
	}

	public function changesuggestion(){
		$get = $this->request->getPost();
		$this->mod->updating('respon',['status' => $get['status']],['idrespon' => $get['id']]);
		return redirect()->to(base_url('o/masukan'));
	}

	public function showtestimony(){
		$data['data'] = $this->mod->getSome('respon',['jenis' => '0']);
		return view('operator/testimony',$data);
	}

	public function changetestimony(){
		$get = $this->request->getPost();
		$this->mod->updating('respon',['status' => $get['status']],['idrespon' => $get['id']]);
		return redirect()->to(base_url('o/testimoni'));
	}

	public function showfaq(){
		$data['data'] = $this->mod->getAll('faq');
		return view('operator/faq',$data);
	}

	public function savefaq(){
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
		return redirect()->to(base_url('o/faq'));
	}

	public function deletefaq($x){
		$this->mod->deleting('faq',['idfaq' => $x]);
		return redirect()->to(base_url('o/faq'));
	}
}
?>