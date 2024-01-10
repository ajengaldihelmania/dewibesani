<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
use App\Libraries\Fpdf\Fpdf;
class Operator_report extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
		date_default_timezone_set('Asia/Jakarta');
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

	public function visitor(){
		$dari = date('Y-m-d');
		$sampai = date('Y-m-d');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['data'] = $this->db->query("select * from tiket where date(waktu) between '".$dari."' and '".$sampai."' order by waktu asc")->getResultArray();
		return view('operator/reportvisitor',$data);
	}

	public function showvisitor(){
		$get = $this->request->getPost();
		$dari = date('Y-m-d', strtotime($get['dari']));
		$sampai = date('Y-m-d', strtotime($get['sampai']));
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['data'] = $this->db->query("select * from tiket where date(waktu) between '".$dari."' and '".$sampai."' order by waktu asc")->getResultArray();
		return view('operator/reportvisitor',$data);
	}

	public function order(){
		$dari = date('Y-m-d');
		$sampai = date('Y-m-d');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['data'] = $this->db->query("select * from tiket where date(waktu) between '".$dari."' and '".$sampai."' order by waktu asc")->getResultArray();
		return view('operator/reportorder',$data);
	}

	public function showorder(){
		$get = $this->request->getPost();
		$dari = date('Y-m-d', strtotime($get['dari']));
		$sampai = date('Y-m-d', strtotime($get['sampai']));
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['data'] = $this->db->query("select * from tiket where date(waktu) between '".$dari."' and '".$sampai."' order by waktu asc")->getResultArray();
		return view('operator/reportorder',$data);
	}

	public function printvisitor($x){
		$x = explode("_", $x);
		$dari = date('Y-m-d', strtotime($x[0]));
		$sampai = date('Y-m-d', strtotime($x[1]));
		$data = $this->db->query("select * from tiket where date(waktu) between '".$dari."' and '".$sampai."' order by waktu asc")->getResultArray();
		$p = $this->mod->getData('pengguna',['idpengguna' => session()->get('mid')]);

		$this->pdf = new fpdf('P','mm','A4');
		$this->pdf->AddPage();
		$this->pdf->SetLineWidth(0.5);
		$this->pdf->Line(10,24,200,24);
		$this->pdf->SetLineWidth(0.2);
		$this->pdf->Line(10,25,200,25);
		$this->pdf->SetLineWidth(0);
		$this->pdf->SetFont('Times','B',14);
		$this->pdf->Cell(190,6,'LAPORAN KUNJUNGAN',0,1,'C');
		$this->pdf->SetFont('Times','B',12);
		$this->pdf->Cell(190,6,'Periode : '.date('d/m/Y', strtotime($dari)).' s.d '.date('d/m/Y', strtotime($sampai)),0,1,'C');
		$this->pdf->Ln(7);

		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(9,6,'No.',1,0,'C');
		$this->pdf->Cell(20,6,'Tanggal',1,0,'C');
		$this->pdf->Cell(145,6,'Paket',1,0,'C');
		$this->pdf->Cell(16,6,'Kuota',1,1,'C');

		$n = 1;
		$total = 0;
		$this->pdf->SetFont('Times','',10);
		foreach ($data as $d) {
			$total += $d['kuota'];
			$paket = $this->db->query("select paket from paket where idpaket = '".$d['idpaket']."'")->getRowArray()['paket'];
			$this->pdf->Cell(9,6,$n++,1,0,'C');
			$this->pdf->Cell(20,6,date('d/m/Y', strtotime($d['waktu'])),1,0,'C');
			$this->pdf->Cell(145,6,$paket,1,0);
			$this->pdf->Cell(16,6,number_format($d['kuota']),1,1,'R');
		}

		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(174,6,'Jumlah Total',1,0,'R');
		$this->pdf->Cell(16,6,number_format($total),1,1,'R');

		$this->pdf->Ln(7);
		$this->pdf->SetFont('Times','',11);
		$this->pdf->Cell(130,6,'',0,0,'');
		$this->pdf->Cell(60,6,'Batang, '.$this->tanggal_indo(date('Y-m-d')),0,1,'C');
		$this->pdf->Cell(130,6,'',0,0,'');
		$this->pdf->Cell(60,6,'Bagian Administrasi',0,1,'C');
		$this->pdf->Ln(18);
		$this->pdf->SetFont('Times','BU',11);
		$this->pdf->Cell(130,6,'',0,0,'');
		$this->pdf->Cell(60,6,$p['nama'],0,1,'C');

		$this->pdf->Output();
		exit;
	}

	public function printorder($x){
		$x = explode("_", $x);
		$dari = date('Y-m-d', strtotime($x[0]));
		$sampai = date('Y-m-d', strtotime($x[1]));
		$data = $this->db->query("select * from tiket where date(waktu) between '".$dari."' and '".$sampai."' order by waktu asc")->getResultArray();
		$p = $this->mod->getData('pengguna',['idpengguna' => session()->get('mid')]);
		
		$this->pdf = new fpdf('P','mm','A4');
		$this->pdf->AddPage();
		$this->pdf->SetLineWidth(0.5);
		$this->pdf->Line(10,24,200,24);
		$this->pdf->SetLineWidth(0.2);
		$this->pdf->Line(10,25,200,25);
		$this->pdf->SetLineWidth(0);
		$this->pdf->SetFont('Times','B',14);
		$this->pdf->Cell(190,6,'LAPORAN PEMESANAN',0,1,'C');
		$this->pdf->SetFont('Times','B',12);
		$this->pdf->Cell(190,6,'Periode : '.date('d/m/Y', strtotime($dari)).' s.d '.date('d/m/Y', strtotime($sampai)),0,1,'C');
		$this->pdf->Ln(7);

		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(9,6,'No.',1,0,'C');
		$this->pdf->Cell(20,6,'Tanggal',1,0,'C');
		$this->pdf->Cell(134,6,'Paket',1,0,'C');
		$this->pdf->Cell(27,6,'Total',1,1,'C');

		$n = 1;
		$total = 0;
		$this->pdf->SetFont('Times','',10);
		foreach ($data as $d) {
			$total += $d['total'];
			$paket = $this->db->query("select paket from paket where idpaket = '".$d['idpaket']."'")->getRowArray()['paket'];
			$this->pdf->Cell(9,6,$n++,1,0,'C');
			$this->pdf->Cell(20,6,date('d/m/Y', strtotime($d['waktu'])),1,0,'C');
			$this->pdf->Cell(134,6,$paket,1,0);
			$this->pdf->Cell(27,6,number_format($d['total']),1,1,'R');
		}

		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(163,6,'Jumlah Total',1,0,'R');
		$this->pdf->Cell(27,6,number_format($total),1,1,'R');

		$this->pdf->Ln(7);
		$this->pdf->SetFont('Times','',11);
		$this->pdf->Cell(130,6,'',0,0,'');
		$this->pdf->Cell(60,6,'Batang, '.$this->tanggal_indo(date('Y-m-d')),0,1,'C');
		$this->pdf->Cell(130,6,'',0,0,'');
		$this->pdf->Cell(60,6,'Bagian Administrasi',0,1,'C');
		$this->pdf->Ln(18);
		$this->pdf->SetFont('Times','BU',11);
		$this->pdf->Cell(130,6,'',0,0,'');
		$this->pdf->Cell(60,6,$p['nama'],0,1,'C');

		$this->pdf->Output();
		exit;
	}

	function tanggal_indo($tanggal, $cetak_hari = false){
		$bulan = array (1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$split    = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		return $tgl_indo;
	}
}
?>