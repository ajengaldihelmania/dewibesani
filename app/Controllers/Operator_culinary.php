<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Operator_culinary extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('a'));
		}else if(session()->get('mid')){
			$data['data'] = $this->db->query("select * from post where kategori = '1' order by waktu desc")->getResultArray();
			return view('operator/culinary',$data);
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function save(){
		$get = $this->request->getPost();
		$waktu = date('Y-m-d H:i:s');
		$data = array(
			'idpost' => null,
			'waktu' => $waktu,
			'kategori' => '1',
			'judul' => $get['judul'],
			'thumbnail' => '',
			'isi' => $get['isi'],
			'tag' => $get['tag'],
			'status' => '1',
			'idpengguna' => session()->get('mid')
		);
		$this->mod->inserting('post',$data);
		$id = $this->mod->getData('post',['waktu' => $waktu, 'kategori' => '1'])['idpost'];
		$files = $this->request->getFileMultiple('gambar');
		foreach ($files as $file) {
			$thumbnail = $file->getRandomName();
			$file->move('./assets/gambar/thumbnail/', $thumbnail);
			$data = array(
				'idthumb' => null,
				'thumbnail' => $thumbnail,
				'idpost' => $id
			);
			$this->mod->inserting('thumbnail',$data);
		}
		return redirect()->to(base_url('o/kuliner'));
	}

	public function detail($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('operator/culinarydetail',$data);
	}

	public function change(){
		$get = $this->request->getPost();
		$data = array(
			'judul' => $get['judul'],
			'isi' => $get['isi'],
			'tag' => $get['tag'],
			'status' => $get['status']
		);
		$this->mod->updating('post',$data,['idpost' => $get['id']]);
		return redirect()->to(base_url('o/kulinerdetail/'.$get['id']));
	}

	public function comment(){
		$get = $this->request->getPost();
		$data = array(
			'idkomentar' => null,
			'waktu' => date('Y-m-d H:i:s'),
			'induk' => '0',
			'komentar' => $get['komentar'],
			'idpengguna' => session()->get('mid'),
			'idpost' => $get['id']
		);
		$this->mod->inserting('komentar',$data);
		return redirect()->to(base_url('o/kulinerdetail/'.$get['id']));
	}

	public function reply(){
		$get = $this->request->getPost();
		$data = array(
			'idkomentar' => null,
			'waktu' => date('Y-m-d H:i:s'),
			'induk' => $get['induk'],
			'komentar' => $get['komentar'],
			'idpengguna' => session()->get('mid'),
			'idpost' => $get['id']
		);
		$this->mod->inserting('komentar',$data);
		return redirect()->to(base_url('o/kulinerdetail/'.$get['id']));
	}

	public function addimage(){
		$get = $this->request->getPost();
		$files = $this->request->getFileMultiple('gambar');
		foreach ($files as $file) {
			$thumbnail = $file->getRandomName();
			$file->move('./assets/gambar/thumbnail/', $thumbnail);
			$data = array(
				'idthumb' => null,
				'thumbnail' => $thumbnail,
				'idpost' => $get['id']
			);
			$this->mod->inserting('thumbnail',$data);
		}
		return redirect()->to(base_url('o/kulinerdetail/'.$get['id']));
	}

	public function deleteimage($x){
		$id = $this->mod->getData('thumbnail',['idthumb' => $x])['idpost'];
		$foto = $this->mod->getData('thumbnail',['idthumb' => $x])['thumbnail'];
		unlink('./assets/gambar/thumbnail/'.$foto);
		$this->mod->deleting('thumbnail',['idthumb' => $x]);
		return redirect()->to(base_url('o/kulinerdetail/'.$id));
	}

	public function delete($x){
		$gambar = $this->mod->getSome('thumbnail',['idpost' => $x]);
		foreach ($gambar as $g) {
			unlink('./assets/gambar/thumbnail/'.$g['thumbnail']);
			$this->mod->deleting('thumbnail',['idthumb' => $g['idthumb']]);
		}
		$this->mod->deleting('post',['idpost' => $x]);
		$this->mod->deleting('komentar',['idpost' => $x]);
		return redirect()->to(base_url('o/kuliner'));
	}
}
?>