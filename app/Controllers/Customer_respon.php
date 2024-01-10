<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Customer_respon extends BaseController{
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
			return redirect()->to(base_url(''));
		}
	}

	public function testimony(){
		$data['data'] = $this->mod->getSome('respon',['jenis' => '0', 'idpengguna' => session()->get('low')]);
		return view('customer/testimony',$data);
	}

	public function savetestimony(){
		$get = $this->request->getPost();
		$data = array(
			'idrespon' => null,
			'jenis' => '0',
			'waktu' => date('Y-m-d H:i:s'),
			'nama' => $get['nama'],
			'email' => $get['email'],
			'alamat' => $get['alamat'],
			'respon' => $get['respon'],
			'status' => '',
			'idpengguna' => session()->get('low')
		);
		$this->mod->inserting('respon',$data);
		return redirect()->to(base_url('c/testimoni'));
	}

	public function deletetestimony($x){
		$this->mod->deleting('respon',['idrespon' => $x]);
		return redirect()->to(base_url('c/testimoni'));
	}
}
?>