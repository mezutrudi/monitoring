<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_administrator');
		$this->load->helper('tanggal_helper');
		if (empty($this->session->userdata('username')) AND empty($this->session->userdata('password'))) {
			redirect('Auth/index');
		}
               
	}

	public function index()
	{
		$header['halaman']="Halaman Beranda";
		$header['menu']="beranda";
		$header['awal']="Beranda";
		$header['pusat']="";

		
		$data['jmldosen'] = $this->m_administrator->jumlah('tb_dosen')->num_rows();
		$data['jmlmhs'] = $this->m_administrator->jumlah('tb_mahasiswa')->num_rows();
		$data['jmlfakultas'] = $this->m_administrator->jumlah('tb_fakultas')->num_rows();
		$data['jmlmateri'] = $this->m_administrator->jumlah('tb_materi')->num_rows();
		$data['jmlprodi'] = $this->m_administrator->jumlah('tb_prodi')->num_rows();
		$data['jmlskd'] = $this->m_administrator->jumlah('tb_standar_kompetensi')->num_rows();
		$data['jmlkd'] = $this->m_administrator->jumlah('tb_kompetensi_dasar')->num_rows();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/beranda', $data);
		$this->load->view('templates/footer');
	}

	

	public function fakultas()
	{
		$header['halaman']="Halaman Fakultas";
		$header['menu']="fakultas";
		$header['awal']="Fakultas";
		$header['pusat']="datakampus";

		$data['fakultas']=$this->m_administrator->tampil('tb_fakultas','id_fakultas')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/fakultas', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_fakultas()
	{
		$data = array(
			'nama_fakultas' => $this->input->post('nama_fakultas',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
	$this->m_administrator->simpan('tb_fakultas', $data);
	}
	public function edit_fakultas()
	{
		$data = array(
			'nama_fakultas' => $this->input->post('nama_fakultas',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
		$id=$this->input->post('idfakultas',TRUE);
		$this->m_administrator->editdata('tb_fakultas','id_fakultas',$id,$data);

	}
	public function prodi()
	{
		$header['halaman']="Halaman Prodi";
		$header['menu']="prodi";
		$header['awal']="Prodi";
		$header['pusat']="datakampus";

		
		$data['prodi']=$this->m_administrator->prodifakultas()->result();
		$data['fakultas']=$this->m_administrator->wheresatu('tb_fakultas','id_fakultas','status','Y')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/prodi', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_prodi()
	{
		$data = array(
			'id_fakultas' => $this->input->post('id_fakultas',TRUE),
			'nama_prodi' => $this->input->post('nama_prodi',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
	$this->m_administrator->simpan('tb_prodi', $data);
	}
	public function edit_prodi()
	{
		$data = array(
			'id_fakultas' => $this->input->post('id_fakultas',TRUE),
			'nama_prodi' => $this->input->post('nama_prodi',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
		$id=$this->input->post('idprodi',TRUE);
		$this->m_administrator->editdata('tb_prodi','id_prodi',$id,$data);

	}
	public function tahun_akedmik()
	{
		$header['halaman']="Halaman Tahun Akademik";
		$header['menu']="th";
		$header['awal']="Tahun Akademik";
		$header['pusat']="datakampus";

		$data['tahun']=$this->m_administrator->tampil('tb_tahun_akademik','id_tahun_akademik')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/tahun_akademik', $data);
		$this->load->view('templates/footer');
	}

	public function simpan_tahun_akedmik()
	{
		$data = array(
			'tahun' => $this->input->post('tahun',TRUE),
			'status_semester' => $this->input->post('semester',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
	$this->m_administrator->simpan('tb_tahun_akademik', $data);
	}
	public function edit_tahun_akedmik()
	{
		$data = array(
			'tahun' => $this->input->post('tahun',TRUE),
			'status_semester' => $this->input->post('semester',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
		$id=$this->input->post('idth',TRUE);
		$this->m_administrator->editdata('tb_tahun_akademik','id_tahun_akademik',$id,$data);

	}

	public function dosen()
	{
		$header['halaman']="Halaman Dosen";
		$header['menu']="dosen";
		$header['awal']="dosen";
		$header['pusat']="";

		$data['dosen']=$this->m_administrator->tampil('tb_dosen','id_dosen')->result();
		
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/dosen', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_dosen()
	{
		$data = array(
			'nidn' => $this->input->post('nidn',TRUE),
			'nama_dosen' => $this->input->post('nama_dosen',TRUE),
			'jenkel' => $this->input->post('jenkel',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'telp' => $this->input->post('telpn',TRUE),
			'jenjang' => $this->input->post('jenjang',TRUE),
			'status' => $this->input->post('status',TRUE),
			'password' =>md5($this->input->post('passsimpan',TRUE)),
			); 
	$this->m_administrator->simpan('tb_dosen', $data);
	}
	public function edit_tanpa_dosen()
	{
		$data = array(
			'nidn' => $this->input->post('nidn',TRUE),
			'nama_dosen' => $this->input->post('nama_dosen',TRUE),
			'jenkel' => $this->input->post('jenkel',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'telp' => $this->input->post('telpn',TRUE),
			'jenjang' => $this->input->post('jenjang',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
		$id=$this->input->post('id_dosen',TRUE);
		$this->m_administrator->editdata('tb_dosen','id_dosen',$id,$data);

	}

	public function edit_dosen()
	{
		$data = array(
			'nidn' => $this->input->post('nidn',TRUE),
			'nama_dosen' => $this->input->post('nama_dosen',TRUE),
			'jenkel' => $this->input->post('jenkel',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'telp' => $this->input->post('telpn',TRUE),
			'jenjang' => $this->input->post('jenjang',TRUE),
			'status' => $this->input->post('status',TRUE),
			'password' =>md5($this->input->post('passedit',TRUE)),
			); 
		$id=$this->input->post('id_dosen',TRUE);
		$this->m_administrator->editdata('tb_dosen','id_dosen',$id,$data);

	}

	public function mahasiswa()
	{
		$header['halaman']="Halaman Mahasiswa";
		$header['menu']="mahasiswa";
		$header['awal']="Mahasiswa";
		$header['pusat']="";

		$data['mahasiswa']=$this->m_administrator->datamahasiswa()->result();
		$data['tahun']=$this->m_administrator->wheresatu('tb_tahun_akademik','id_tahun_akademik','status','Y')->result();
		$data['prodi']=$this->m_administrator->wheresatu('tb_prodi','id_prodi','status','Y')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/mahasiswa', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_mahasiswa()
	{
		$data = array(
			'id_tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
			'id_prodi' => $this->input->post('id_prodi',TRUE),
			'nim' => $this->input->post('nim',TRUE),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa',TRUE),
			'jenkel' => $this->input->post('jenkel',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'tempat_lahir' => $this->input->post('tempat',TRUE),
			'tgl_lahir' => $this->input->post('tgl',TRUE),
			'telp' => $this->input->post('telpn',TRUE),
			'status' => $this->input->post('status',TRUE),
			'password' =>md5($this->input->post('passsimpan',TRUE)),
			); 
	$this->m_administrator->simpan('tb_mahasiswa', $data);
	}
	public function edit_tanpa_mahasiswa()
	{
		$data = array(
			'id_tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
			'id_prodi' => $this->input->post('id_prodi',TRUE),
			'nim' => $this->input->post('nim',TRUE),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa',TRUE),
			'jenkel' => $this->input->post('jenkel',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'tempat_lahir' => $this->input->post('tempat',TRUE),
			'tgl_lahir' => $this->input->post('tgl',TRUE),
			'telp' => $this->input->post('telpn',TRUE),
			'status' => $this->input->post('status',TRUE),
			); 
		$id=$this->input->post('id_mahasiswa',TRUE);
		$this->m_administrator->editdata('tb_mahasiswa','id_mahasiswa',$id,$data);

	}

	public function edit_mahasiswa()
	{
		$data = array(


			'id_tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
			'id_prodi' => $this->input->post('id_prodi',TRUE),
			'nim' => $this->input->post('nim',TRUE),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa',TRUE),
			'jenkel' => $this->input->post('jenkel',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'tempat_lahir' => $this->input->post('tempat',TRUE),
			'tgl_lahir' => $this->input->post('tgl',TRUE),
			'telp' => $this->input->post('telpn',TRUE),
			'status' => $this->input->post('status',TRUE),
			'password' =>md5($this->input->post('passedit',TRUE)),
			); 
		$id=$this->input->post('id_mahasiswa',TRUE);
		$this->m_administrator->editdata('tb_mahasiswa','id_mahasiswa',$id,$data);

	}


	public function materi()
	{
		$header['halaman']="Halaman Materi";
		$header['menu']="materi";
		$header['awal']="Materi";
		$header['pusat']="datapematerian";

		$data['materi']=$this->m_administrator->tampil('tb_materi','id_materi')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/materi', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_materi()
	{
		$data = array(
			'nama_materi' => $this->input->post('nama_materi',TRUE),
			); 
	$this->m_administrator->simpan('tb_materi', $data);
	}
	public function edit_materi()
	{
		$data = array(
			'nama_materi' => $this->input->post('nama_materi',TRUE),
			); 
		$id=$this->input->post('idmateri',TRUE);
		$this->m_administrator->editdata('tb_materi','id_materi',$id,$data);

	}
	public function hapus_materi()
	{
		$id= $this->input->post('id_materi');
		$this->m_administrator->hapus('tb_materi',$id,'id_materi');

	}

	public function standar_kompetensi()
	{
		$header['halaman']="Halaman Standar Kompetensi";
		$header['menu']="standar_kompetensi";
		$header['awal']="Standar Kompetensi";
		$header['pusat']="datapematerian";

		$data['standar_kompetensi']=$this->m_administrator->materiskd()->result();
		$data['materi']=$this->m_administrator->tampil('tb_materi','id_materi')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/standar_kompetensi', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_standar_kompetensi()
	{
		$data = array(
			'id_materi' => $this->input->post('id_materi',TRUE),
			'nama_standar_kompetensi' => $this->input->post('nama_standar_kompetensi',TRUE),
			); 
	$this->m_administrator->simpan('tb_standar_kompetensi', $data);
	}
	public function edit_standar_kompetensi()
	{
		$data = array(
			'id_materi' => $this->input->post('id_materi',TRUE),
			'nama_standar_kompetensi' => $this->input->post('nama_standar_kompetensi',TRUE),
			); 
		$id=$this->input->post('idstandar_kompetensi',TRUE);
		$this->m_administrator->editdata('tb_standar_kompetensi','id_standar_kompetensi',$id,$data);

	}
	public function hapus_standar_kompetensi()
	{
		$id= $this->input->post('id_standar_kompetensi');
		$this->m_administrator->hapus('tb_standar_kompetensi',$id,'id_standar_kompetensi');

	}

	public function kompetensi_dasar()
	{
		$header['halaman']="Halaman Standar Kompetensi";
		$header['menu']="kompetensi_dasar";
		$header['awal']="Standar Kompetensi";
		$header['pusat']="datapematerian";

		$data['kompetensi_dasar']=$this->m_administrator->kdskd()->result();
		$data['standar_kompetensi']=$this->m_administrator->tampil('tb_standar_kompetensi','id_standar_kompetensi')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/kompetensi_dasar', $data);
		$this->load->view('templates/footer');
	}
	public function simpan_kompetensi_dasar()
	{
		$data = array(
			'id_standar_kompetensi' => $this->input->post('id_standar_kompetensi',TRUE),
			'nama_kompetensi_dasar' => $this->input->post('nama_kompetensi_dasar',TRUE),
			); 
	$this->m_administrator->simpan('tb_kompetensi_dasar', $data);
	}
	
	public function edit_kompetensi_dasar()
	{
		$data = array(
			'id_standar_kompetensi' => $this->input->post('id_standar_kompetensi',TRUE),
			'nama_kompetensi_dasar' => $this->input->post('nama_kompetensi_dasar',TRUE),
			); 
		$id=$this->input->post('idkompetensi_dasar',TRUE);
		$this->m_administrator->editdata('tb_kompetensi_dasar','id_kompetensi_dasar',$id,$data);

	}
	public function hapus_kompetensi_dasar()
	{
		$id= $this->input->post('id_kompetensi_dasar');
		$this->m_administrator->hapus('tb_kompetensi_dasar',$id,'id_kompetensi_dasar');

	}

	public function tugas()
	{
		$header['halaman']="Halaman Tugas";
		$header['menu']="tugas";
		$header['awal']="Tugas";
		$header['pusat']="";

		$data['mahasiswa']=$this->m_administrator->datamahasiswa()->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/tugas', $data);
		$this->load->view('templates/footer');
	}

	public function nilai_mahasiswa()
	{
		$id_mahasiswa=$this->input->post('id_mahasiswa');
		$query=$this->m_administrator->detailnilaimahahasiswa($id_mahasiswa);
		$outPut ='';

		$no=1;
		if($query->num_rows()>0){
			foreach ($query->result() as $data) {

				$outPut.='
			<tr>
				<td>'.$no.' </td>
				<td>'.$data->nama_kompetensi_dasar.'</td>
				<td><a href="'.base_url('administrator/download/'.$data->file).'">Download</a></td>
		
			</tr>
			';
			$no++;
				}
		}else{
			$outPut.='
			<tr>
				<td colspan="3" align="center">Tugas belum dikumpulkan</td>
			</tr>
			';
		}
		
	
	
	echo $outPut; 
	}

	public function download($file){
		if(!empty($file)){
			//load download helper
			$this->load->helper('download');
			//file path
			$file = 'public/files/'.$file;
			//download file from directory
			force_download($file, NULL);
		}
	}

	
	public function setting_dosen()
	{
		$header['halaman']="Halaman Setting Dosen";
		$header['menu']="setting";
		$header['awal']="Setting Dosen";
		$header['pusat']="";

	
		$data['dosen']=$this->m_administrator->tampil('tb_dosen','id_dosen')->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/setting', $data);
		$this->load->view('templates/footer');
	}
	public function data_mahasiswa()
	{
		$id_dosen=$this->input->post('id_dosen');
		$query=$this->m_administrator->detaildatamahahasiswa($id_dosen);
		$outPut ='';

		$no=1;
		if($query->num_rows()>0){
			foreach ($query->result() as $data) {

				$outPut.='
			<tr>
				<td>'.$no.' </td>
				<td>'.$data->nama_mahasiswa.'</td>
				<td>'.$data->tahun.'</td>
				<td>
				<a class="btn btn-danger text-white hapussetting"
				data-id="'.$data->id_setting_dosen.'">HAPUS</i></a>
				</td>
			
		
			</tr>
			';
			$no++;
				}
		}else{
			$outPut.='
			<tr>
				<td colspan="4" align="center">Tugas belum dikumpulkan</td>
			</tr>
			';
		}
		
	
	
	echo $outPut; 
	}

	public function hapus_mahasiswa()
	{
		$id= $this->input->post('id');
		$this->m_administrator->hapus('tb_seting_dosen',$id,'id_setting_dosen');

	}
	public function dosen_setting()
	{
		// $query=$this->m_administrator->dosenmahasiswa();
		$query=$this->m_administrator->tampil('tb_dosen','id_dosen');
		$outPut ='';

		$no=1;
		if($query->num_rows()>0){
			foreach ($query->result() as $data) {
				$capaian =  $this->m_administrator->hitung_ambil('tb_seting_dosen','id_dosen',$data->id_dosen)->num_rows();
				$outPut.='
			<tr>
				<td>'.$no.' </td>
				<td>'.$data->nama_dosen.'</td>
				<td>'.$capaian.'</td>
				<td>
				<a class="tag badge badge-success" id="detailmhs"
				data-id_dosen="'.$data->id_dosen.'"
				data-nama_dosen="'.$data->nama_dosen.'"
				
				>Detail Mahasiswa</i></a>
				</td>
			
		
			</tr>
			';
			$no++;
				}
		
		}else{
			$outPut.='
			<tr>
				<td colspan="4" align="center">Data belum ada</td>
			</tr>
			';
		}
			
		
	
	
	echo $outPut; 

	}
	public function mahasiswa_dosen()
	{
		$query=	$this->m_administrator->datamahasiswaaktif();
		$outPut ='';

		$no=1;
		if($query->num_rows()>0){
			foreach ($query->result() as $data) {

				$outPut.='
			<tr>
				<td>'.$no.' </td>
				<td>'.$data->nim.'</td>
				<td>'.$data->nama_mahasiswa.'</td>
				<td>
				<button type="button" data-color="teal" class="btn bg-teal waves-effect"  id="tambahsetting"
				data-id_mahasiswa="'.$data->id_mahasiswa.'"
				data-id_tahun_akademik="'.$data->id_tahun_akademik.'"
				
				>Setting Mahasiswa</i></button>
				</td>
			
		
			</tr>
			';
			$no++;
				}
		
		}else{
			$outPut.='
			<tr>
				<td colspan="4" align="center">Data mahasiswa sudah dipilih</td>
			</tr>
			';
		}
			
		
	
	
	echo $outPut; 

	}
	public function simpan_dosen_mahasiswa()
	{
		$data = array(
			'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
			'id_tahun_akademik' => $this->input->post('id_tahun_akademik',TRUE),
			'id_dosen' => $this->input->post('dosen',TRUE),
			); 
	$this->m_administrator->simpan('tb_seting_dosen', $data);
	}
	public function hasil_monitoring()
	{
		$header['halaman']="Halaman Hasil Monitoring";
		$header['menu']="monitoring";
		$header['awal']="Monitoring";
		$header['pusat']="";

		$data['monitoring']=$this->m_administrator->hasilmonitoring()->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/monitoring', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_sertifkat()
	{
		$header['halaman']="Halaman Cetak Sertifikat";
		$header['menu']="sertifikat";
		$header['awal']="Sertifikat";
		$header['pusat']="";
		$data['jmlskd'] = $this->m_administrator->jumlah('tb_standar_kompetensi')->num_rows();
		$data['mahasiswa']=$this->m_administrator->datamahasiswa()->result();
		$this->load->view('templates/header', $header );
		$this->load->view('administrator/cetak', $data);
		$this->load->view('templates/footer');
	}

	public function sertifikat($id){
                $this->load->library('Pdfgenerator');
			
                $data['trans']=$id;
				$data['mahasiswa'] = $this->m_administrator->form_edit('tb_mahasiswa','id_mahasiswa',$id);
				$mhs = $this->m_administrator->form_edit('tb_mahasiswa','id_mahasiswa',$id);
				$data['prodi'] = $this->m_administrator->form_edit('tb_prodi','id_prodi',$mhs->id_prodi);
				$prodi= $this->m_administrator->form_edit('tb_prodi','id_prodi',$mhs->id_prodi);
				$data['fakultas'] = $this->m_administrator->form_edit('tb_fakultas','id_fakultas',$prodi->id_fakultas);
                $html = $this->load->view('laporan/sertifikat', $data, true);
                $filename = 'report_'.time();
                $this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape');


        }
		public function data_monitoring()
		{
			$id_dosen=$this->input->post('id_dosen');
			$query=$this->m_administrator->detaildatadosen($id_dosen);
			$outPut ='';
	
			$no=1;
			if($query->num_rows()>0){
				foreach ($query->result() as $data) {
	
					$outPut.='
				<tr>
					<td>'.$no.' </td>
					<td>'.$data->nama_mahasiswa.'</td>
					<td>'.$data->tahun.'</td>
					<td>'.$data->nama_standar_kompetensi.'</td>
					<td>'.$data->status_tuntas.'</td>
				
			
				</tr>
				';
				$no++;
					}
			}else{
				$outPut.='
				<tr>
					<td colspan="5" align="center">Tugas belum dikumpulkan</td>
				</tr>
				';
			}
			
		
		
		echo $outPut; 
		}
}
