<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Operator_package extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('a'));
		}else if(session()->get('mid')){
			$data['data'] = $this->mod->getAll('paket');
			return view('operator/package',$data);
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function new(){
		$get = $this->request->getPost();
		$file = $this->request->getFile('gambar');
		$thumbnail = $file->getRandomName();
		$file->move('./assets/gambar/thumbnail/', $thumbnail);
		$data = array(
			'thumbnail' => $thumbnail,
			'paket' => $get['paket'],
			'deskripsi' => $get['deskripsi'],
			'durasi' => $get['durasi'],
			'fasilitas' => $get['fasilitas'],
			'konfirmasi' => $get['konfirmasi']
		);
		$data['data'] = $data;
		$data['agenda'] = [];
		$data['harga'] = [];
		return view('operator/packagenew',$data);
	}

	public function add(){
		$get = $this->request->getPost();
		$agenda = unserialize($get['agenda']);
		$data = array(
			'hari' => $get['hari'],
			'waktu' => date('H:i', strtotime($get['dari'])).'_'.date('H:i', strtotime($get['sampai'])),
			'agenda' => $get['kegiatan']
		);
		array_push($agenda, $data);
		$data['data'] = unserialize($get['data']);
		$data['agenda'] = $agenda;
		$data['harga'] = unserialize($get['harga']);
		return view('operator/packagenew',$data);
	}

	public function addcost(){
		$get = $this->request->getPost();
		$harga = unserialize($get['harga']);
		$minimum = 1;
		if($get['jenis'] == '1'){
			$minimum = $get['minimum'];
		}
		$isi = array(
			'jenis' => $get['jenis'],
			'minimum' => $minimum,
			'harga' => $get['jumlah']
		);
		array_push($harga, $isi);
		$data['data'] = unserialize($get['data']);
		$data['agenda'] = unserialize($get['agenda']);
		$data['harga'] = $harga;
		return view('operator/packagenew',$data);
	}

	public function remove($isi, $agenda, $harga, $x){
		$agenda = unserialize($agenda);
		array_splice($agenda, $x, 1);
		$data['data'] = unserialize($isi);
		$data['agenda'] = $agenda;
		$data['harga'] = unserialize($harga);
		return view('operator/packagenew',$data);
	}

	public function removecost($isi, $agenda, $harga, $x){
		$harga = unserialize($harga);
		array_splice($harga, $x, 1);
		$data['data'] = unserialize($isi);
		$data['agenda'] = unserialize($agenda);
		$data['harga'] = $harga;
		return view('operator/packagenew',$data);
	}

	public function save(){
		$get = $this->request->getPost();
		$agenda = unserialize($get['agenda']);
		$isi = unserialize($get['data']);
		$harga = unserialize($get['harga']);
		$data = array(
			'idpaket' => null,
			'thumbnail' => $isi['thumbnail'],
			'paket' => $isi['paket'],
			'deskripsi' => $isi['deskripsi'],
			'durasi' => $isi['durasi'],
			'fasilitas' => $isi['fasilitas'],
			'konfirmasi' => $isi['konfirmasi']
		);
		$this->mod->inserting('paket',$data);
		$kode = $this->mod->getData('paket',['thumbnail' => $isi['thumbnail'],'paket' => $isi['paket']])['idpaket'];
		for ($i=0; $i < count($agenda); $i++) {
			$data = array(
				'idagenda' => null,
				'hari' => $agenda[$i]['hari'],
				'waktu' => $agenda[$i]['waktu'],
				'agenda' => $agenda[$i]['agenda'],
				'idpaket' => $kode
			);
			$this->mod->inserting('agenda',$data);
		}
		for ($i=0; $i < count($harga); $i++) {
			$data = array(
				'idharga' => null,
				'jenis' => $harga[$i]['jenis'],
				'minimum' => $harga[$i]['minimum'],
				'harga' => $harga[$i]['harga'],
				'idpaket' => $kode
			);
			$this->mod->inserting('harga',$data);
		}
		return redirect()->to(base_url('o/paket'));
	}

	public function detail($x){
		$data['data'] = $this->mod->getData('paket',['idpaket' => $x]);
		$data['agenda'] = $this->mod->getSome('agenda',['idpaket' => $x]);
		$data['harga'] = $this->mod->getSome('harga',['idpaket' => $x]);
		return view('operator/packagedetail',$data);
	}

	public function change(){
		$get = $this->request->getPost();
		$data = array(
			'paket' => $get['paket'],
			'deskripsi' => $get['deskripsi'],
			'durasi' => $get['durasi'],
			'fasilitas' => $get['fasilitas'],
			'konfirmasi' => $get['konfirmasi']
		);
		$this->mod->updating('paket',$data,['idpaket' => $get['id']]);
		return redirect()->to(base_url('o/paketdetail/'.$get['id']));
	}

	public function changeagenda(){
		$get = $this->request->getPost();
		$data = array(
			'idagenda' => null,
			'hari' => $get['hari'],
			'waktu' => date('H:i', strtotime($get['dari'])).'_'.date('H:i', strtotime($get['sampai'])),
			'agenda' => $get['kegiatan'],
			'idpaket' => $get['id']
		);
		$this->mod->inserting('agenda',$data);
		return redirect()->to(base_url('o/paketdetail/'.$get['id']));
	}

	public function deleteagenda($x){
		$kode = $this->mod->getData('agenda',['idagenda' => $x])['idpaket'];
		$this->mod->deleting('agenda',['idagenda' => $x]);
		return redirect()->to(base_url('o/paketdetail/'.$kode));
	}

	public function changecost(){
		$get = $this->request->getPost();
		$data = array(
			'idharga' => null,
			'jenis' => $get['jenis'],
			'minimum' => $get['minimum'],
			'harga' => $get['jumlah'],
			'idpaket' => $get['id']
		);
		$this->mod->inserting('harga',$data);
		return redirect()->to(base_url('o/paketdetail/'.$get['id']));
	}

	public function deletecost($x){
		$kode = $this->mod->getData('harga',['idharga' => $x])['idpaket'];
		$this->mod->deleting('harga',['idharga' => $x]);
		return redirect()->to(base_url('o/paketdetail/'.$kode));
	}

	public function hapus($x){
		$this->mod->deleting('paket',['idpaket' => $x]);
		$this->mod->deleting('agenda',['idpaket' => $x]);
		$this->mod->deleting('harga',['idpaket' => $x]);
		return redirect()->to(base_url('o/paket'));
	}
}
?>