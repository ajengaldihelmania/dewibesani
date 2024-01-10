<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Operator_order extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('a'));
		}else if(session()->get('mid')){
			$data['data'] = $this->mod->getAll('tiket');
			return view('operator/order',$data);
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function detail($x){
		$p = $this->mod->getData('tiket',['idtiket' => $x])['idpaket'];
		$data['data'] = $this->mod->getData('tiket',['idtiket' => $x]);
		$data['bayar'] = $this->db->query("select * from bayar where idtiket = '".$x."' order by waktu desc")->getResultArray();
		$data['paket'] = $this->mod->getData('paket',['idpaket' => $p]);
		return view('operator/orderdetail',$data);
	}

	public function keep($x){
		$this->mod->updating('tiket',['status' => '1'],['idtiket' => $x]);
		return redirect()->to(base_url('o/pesanandetail/'.$x));
	}

	public function reschedule($x){
		$this->mod->updating('tiket',['status' => '3'],['idtiket' => $x]);
		return redirect()->to(base_url('o/pesanandetail/'.$x));
	}

	public function cektotal($x){
		$p = $this->mod->getData('tiket',['idtiket' => $x]);
		$t1 = $p['total'];
		$t2 = 0;
		$bayar = $this->mod->getSome('bayar',['idtiket' => $p['idtiket']]);
		foreach ($bayar as $b) {
			if($b['status'] == '0'){
				$t2 += $b['jumlah'];
			}
		}
		if($t1 == $t2){
			$this->mod->updating('tiket',['status' => ''],['idtiket' => $p['idtiket']]);
		}
	}

	public function decline($a){
		$this->mod->updating('bayar',['status' => '2'],['idbayar' => $a]);
		$p = $this->mod->getData('bayar',['idbayar' => $a])['idtiket'];
		$this->cektotal($p);
		return redirect()->to(base_url('o/pesanandetail/'.$p));
	}

	public function accept($a){
		$this->mod->updating('bayar',['status' => '0'],['idbayar' => $a]);
		$p = $this->mod->getData('bayar',['idbayar' => $a])['idtiket'];
		$this->cektotal($p);
		return redirect()->to(base_url('o/pesanandetail/'.$p));
	}
}
?>