<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Customer_order extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('c'));
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			$data['data'] = $this->mod->getSome('tiket',['idpengguna' => session()->get('low')]);
			return view('customer/order',$data);
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function save(){
		$get = $this->request->getPost();
		$kuota = $get['kuota'];
		$harga = 0;
		$harga = $this->db->query("select * from harga where idpaket = '".$get['paket']."' and jenis = 1 order by minimum desc")->getResultArray();
		foreach ($harga as $h) {
			if($kuota >= $h['minimum']){
				$harga = $h['harga'];
				break;
			}
		}
		if($harga == 0){
			$harga = $this->db->query("select * from harga where idpaket = '".$get['paket']."' and jenis = 0")->getRowArray()['harga'];
		}
		$data = array(
			'idtiket' => $get['id'],
			'waktu' => date('Y-m-d', strtotime($get['tanggal'])).' '.date('H:i:s', strtotime($get['jam'])),
			'an' => $get['an'],
			'alamat' => $get['alamat'],
			'telepon' => $get['telepon'],
			'kuota' => $kuota,
			'harga' => $harga,
			'total' => ($kuota * $harga),
			'uraian' => $get['keterangan'],
			'status' => '0',
			'idpaket' => $get['paket'],
			'idpengguna' => $get['pemesan']
		);
		$this->mod->inserting('tiket',$data);
		return redirect()->to(base_url('c/pesanan/d/'.$get['id']));
	}

	public function reschedule(){
		$get = $this->request->getPost();
		$data = array(
			'waktu' => date('Y-m-d', strtotime($get['tanggal'])).' '.date('H:i:s', strtotime($get['jam'])),
			'status' => '0'
		);
		$this->mod->updating('tiket',$data,['idtiket' => $get['id']]);
		return redirect()->to(base_url('c/pesanan/d/'.$get['id']));
	}

	public function detail($x){
		$data['data'] = $this->mod->getData('tiket',['idtiket' => $x]);
		$data['bayar'] = $this->db->query("select * from bayar where idtiket = '".$x."' order by waktu desc")->getResultArray();
		$data['bank'] = $this->mod->getAll("rekening");
		return view('customer/orderdetail',$data);
	}

	public function payment(){
		$get = $this->request->getPost();
		$waktu = date('Y-m-d H:i:s');
		$file = $this->request->getFile('bukti');
		$thumbnail = $file->getRandomName();
		$file->move('./assets/gambar/thumbnail/', $thumbnail);
		$data = array(
			'idbayar' => null,
			'waktu' => $waktu,
			'jumlah' => $get['jumlah'],
			'uraian' => $get['uraian'],
			'an' => $get['an'],
			'bukti' => $thumbnail,
			'status' => '1',
			'idrekening' => $get['rekening'],
			'idtiket' => $get['tiket']
		);
		$this->mod->inserting('bayar',$data);
		$this->mod->updating('tiket',['status' => '1'],['idtiket' => $get['tiket']]);
		return redirect()->to(base_url('c/pesanan/d/'.$get['tiket']));
	}
}
?>