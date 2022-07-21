<?php
class M_administrator extends CI_Model{
    public function tampil ($table, $urut_id){
        return $this->db->from($table)
                    ->order_by($urut_id,'DESC')
                    ->get('');
    }
    public function wheresatu ($table, $urut_id, $field, $fieldisi){
        return $this->db->from($table)
                    ->where($field, $fieldisi)
                    ->order_by($urut_id,'DESC')
                    ->get('');
    }
    public function simpan($table,$data){
        return $this->db->insert($table, $data);
    }
    public function hapus($table,$id,$primary){
        return $this->db->delete($table, array($primary=>$id));
    }
    public function form_edit($table, $primary, $id){
        return $this->db->get_where($table, array($primary=>$id))->row();
    }
    public function hitung_tuntas($table, $primary, $id){
        return $this->db->get_where($table, array($primary=>$id, 'status_tuntas'=>'Y'));
    }
    public function hitung_ambil($table, $primary, $id){
        return $this->db->get_where($table, array($primary=>$id));
    }
    public function editdata($tabel, $primary, $id, $data)
    {
        return $this->db->where($primary, $id)->update($tabel, $data);
    }
    
    public function prodifakultas()
    {
        return $this->db->select('pro.id_prodi, pro.nama_prodi, pro.status, fakul.nama_fakultas,fakul.id_fakultas', false)
                        ->from('tb_prodi as pro')
                        ->join('tb_fakultas as fakul', 'pro.id_fakultas = fakul.id_fakultas')
                        ->order_by('pro.id_prodi', 'DESC')
                        ->get();
    
       
    }
    public function datamahasiswa()
    {
        return $this->db->select('mhs.*, pro.nama_prodi, th.tahun', false)
                        ->from('tb_mahasiswa as mhs')
                        ->join('tb_prodi as pro', 'pro.id_prodi = mhs.id_prodi')
                        ->join('tb_tahun_akademik as th', 'th.id_tahun_akademik = mhs.id_tahun_akademik')
                        ->order_by('mhs.id_mahasiswa', 'DESC')
                        ->get();
    
       
    }
    public function materiskd()
    {
        return $this->db->select('skd.*,mtr.nama_materi', false)
                        ->from('tb_standar_kompetensi as skd')
                        ->join('tb_materi as mtr', 'mtr.id_materi = skd.id_materi')
                        ->order_by('skd.id_standar_kompetensi', 'DESC')
                        ->get();
    
       
    }

    public function kdskd()
    {
        return $this->db->select('kd.*,skd.nama_standar_kompetensi', false)
                        ->from('tb_kompetensi_dasar as kd')
                        ->join('tb_standar_kompetensi as skd', 'kd.id_standar_kompetensi = skd.id_standar_kompetensi')
                        ->order_by('kd.id_kompetensi_dasar', 'DESC')
                        ->get();
    
       
    }
    public function detailnilaimahahasiswa($id)
    {
        return $this->db->select('tg.file, kd.nama_kompetensi_dasar, mhs.nama_mahasiswa ')
                        ->from('tb_tugas as tg')
                        ->where('tg.id_mahasiswa',$id)
                        ->join('tb_kompetensi_dasar as kd', 'tg.id_kompetensi_dasar = kd.id_kompetensi_dasar')
                        ->join('tb_mahasiswa as mhs', 'tg.id_mahasiswa = mhs.id_mahasiswa')
                        ->order_by('tg.id_tugas', 'DESC')
                        ->get();
    
       
    }
    
    // public function dosenmahasiswa()
    // {
    //     return $this->db->select('set.*,dsn.nama_dosen, COUNT(set.id_mahasiswa) AS total')
    //                     ->from('tb_seting_dosen as set')
    //                     ->join('tb_dosen as dsn', 'dsn.id_dosen = set.id_dosen')
    //                     ->group_by('set.id_dosen')
    //                     ->order_by('total', 'DESC')
    //                     ->get();
    
       
    // }

    public function detaildatamahahasiswa($id)
    {
        return $this->db->select('set.id_setting_dosen, mhs.nama_mahasiswa, th.tahun')
                        ->from('tb_seting_dosen as set')
                        ->where('set.id_dosen',$id)
                        ->join('tb_tahun_akademik as th','set.id_tahun_akademik = th.id_tahun_akademik')
                        ->join('tb_mahasiswa as mhs','set.id_mahasiswa = mhs.id_mahasiswa')
                        ->order_by('set.id_setting_dosen', 'DESC')
                        ->get();
    
       
    }
    public function datamahasiswaaktif()
    {
        return $this->db->where("not exists (select id_setting_dosen from tb_seting_dosen where tb_mahasiswa.id_mahasiswa=tb_seting_dosen.id_mahasiswa)",null,false)
                        ->order_by('id_mahasiswa', 'DESC')
                        ->get('tb_mahasiswa');
    
       
    }
    public function jumlah($table){
		return $this->db->get($table);
	}
    public function hasilmonitoring()
    {
        return $this->db->select('mon.*,dsn.nama_dosen, COUNT(mon.id_mahasiswa) AS total,
                                                        COUNT(CASE WHEN mon.status_tuntas = "Y" THEN 0 END) AS total_y,
                                                        COUNT(CASE WHEN mon.status_tuntas = "T" THEN 0 END) AS total_n,')
                        ->from('tb_monitoring as mon')
                        ->join('tb_dosen as dsn', 'dsn.id_dosen = mon.id_dosen')
                        ->group_by('mon.id_dosen')
                        ->order_by('total', 'DESC')
                        ->get();
    
       
    }
    public function detaildatadosen($id)
    {
        return $this->db->select('mhs.nama_mahasiswa, skd.nama_standar_kompetensi, th.tahun, mon.status_tuntas')
                        ->from('tb_monitoring as mon')
                        ->where('mon.id_dosen',$id)
                        ->join('tb_tahun_akademik as th','mon.id_tahun_akademik = th.id_tahun_akademik')
                        ->join('tb_mahasiswa as mhs','mon.id_mahasiswa = mhs.id_mahasiswa')
                        ->join('tb_standar_kompetensi as skd','mon.id_standar_kompetensi = skd.id_standar_kompetensi')
                        ->order_by('mon.id_monitoring', 'DESC')
                        ->get();
    
       
    }
}
?>