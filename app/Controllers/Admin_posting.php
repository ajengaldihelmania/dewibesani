<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_posting extends BaseController{
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

	public function showtour(){
		$data['data'] = $this->db->query("select * from post where kategori = '0' order by waktu desc")->getResultArray();
		return view('admin/tour',$data);
	}

	public function detailtour($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/tourdetail',$data);
	}

	public function showculinary(){
		$data['data'] = $this->db->query("select * from post where kategori = '1' order by waktu desc")->getResultArray();
		return view('admin/culinary',$data);
	}

	public function detailculinary($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/culinarydetail',$data);
	}

	public function showhomestay(){
		$data['data'] = $this->db->query("select * from post where kategori = '2' order by waktu desc")->getResultArray();
		return view('admin/homestay',$data);
	}

	public function detailhomestay($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/homestaydetail',$data);
	}

	public function showfashion(){
		$data['data'] = $this->db->query("select * from post where kategori = '3' order by waktu desc")->getResultArray();
		return view('admin/fashion',$data);
	}

	public function detailfashion($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/fashiondetail',$data);
	}

	public function showcreation(){
		$data['data'] = $this->db->query("select * from post where kategori = '4' order by waktu desc")->getResultArray();
		return view('admin/creation',$data);
	}

	public function detailcreation($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/creationdetail',$data);
	}

	public function shownews(){
		$data['data'] = $this->db->query("select * from post where kategori = '5' order by waktu desc")->getResultArray();
		return view('admin/news',$data);
	}

	public function detailnews($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/newsdetail',$data);
	}

	public function showphoto(){
		$data['data'] = $this->db->query("select * from post where kategori = '6' order by waktu desc")->getResultArray();
		return view('admin/photo',$data);
	}

	public function detailphoto($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/photodetail',$data);
	}

	public function showvideo(){
		$data['data'] = $this->db->query("select * from post where kategori = '7' order by waktu desc")->getResultArray();
		return view('admin/video',$data);
	}

	public function detailvideo($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['comment'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		return view('admin/videodetail',$data);
	}
}
?>