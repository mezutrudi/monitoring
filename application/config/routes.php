<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'administrator';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['proses-login'] = 'Auth/proses_login';
$route['logout'] = 'Auth/logout';
$route['beranda-utama'] = 'Administrator/index';

$route['beranda-fakultas'] = 'Administrator/fakultas';
$route['beranda-simpanfakultas'] = 'Administrator/simpan_fakultas';
$route['beranda-editfakultas'] = 'Administrator/edit_fakultas';

$route['beranda-prodi'] = 'Administrator/prodi';
$route['beranda-simpanprodi'] = 'Administrator/simpan_prodi';
$route['beranda-editprodi'] = 'Administrator/edit_prodi';

$route['beranda-tahun_akademik'] = 'Administrator/tahun_akedmik';
$route['beranda-simpantahun'] = 'Administrator/simpan_tahun_akedmik';
$route['beranda-edittahun'] = 'Administrator/edit_tahun_akedmik';


$route['beranda-dosen'] = 'Administrator/dosen';
$route['beranda-simpandosen'] = 'Administrator/simpan_dosen';
$route['beranda-edittanpadosen'] = 'Administrator/edit_tanpa_dosen';
$route['beranda-editdosen'] = 'Administrator/edit_dosen';



$route['beranda-mahasiswa'] = 'Administrator/mahasiswa';
$route['beranda-simpanmahasiswa'] = 'Administrator/simpan_mahasiswa';
$route['beranda-edittanpamahasiswa'] = 'Administrator/edit_tanpa_mahasiswa';
$route['beranda-editmahasiswa'] = 'Administrator/edit_mahasiswa';


$route['beranda-materi'] = 'Administrator/materi';
$route['beranda-simpanmateri'] = 'Administrator/simpan_materi';
$route['beranda-editmateri'] = 'Administrator/edit_materi';
$route['beranda-hapusmateri'] = 'Administrator/hapus_materi';

$route['beranda-standar_kompetensi'] = 'Administrator/standar_kompetensi';
$route['beranda-simpanstandar_kompetensi'] = 'Administrator/simpan_standar_kompetensi';
$route['beranda-editstandar_kompetensi'] = 'Administrator/edit_standar_kompetensi';
$route['beranda-hapusstandar_kompetensi'] = 'Administrator/hapus_standar_kompetensi';


$route['beranda-kompetensi_dasar'] = 'Administrator/kompetensi_dasar';
$route['beranda-simpankompetensi_dasar'] = 'Administrator/simpan_kompetensi_dasar';
$route['beranda-editkompetensi_dasar'] = 'Administrator/edit_kompetensi_dasar';
$route['beranda-hapuskompetensi_dasar'] = 'Administrator/hapus_kompetensi_dasar';

$route['beranda-tugas'] = 'Administrator/tugas';
$route['beranda-nilaimahasiswa'] = 'Administrator/nilai_mahasiswa';



$route['beranda-settingdosen'] = 'Administrator/setting_dosen';
$route['beranda-datamahasiswa'] = 'Administrator/data_mahasiswa';
$route['beranda-hapusmahasiswa'] = 'Administrator/hapus_mahasiswa';
$route['beranda-dosensetting'] = 'Administrator/dosen_setting';
$route['beranda-mahasiswadosen'] = 'Administrator/mahasiswa_dosen';
$route['beranda-simpandosenmahasiswa'] = 'Administrator/simpan_dosen_mahasiswa';


$route['beranda-hasilmonitoring'] = 'Administrator/hasil_monitoring';
$route['beranda-datamonitoring'] = 'Administrator/data_monitoring';
$route['beranda-cetaksertifkat'] = 'Administrator/cetak_sertifkat';