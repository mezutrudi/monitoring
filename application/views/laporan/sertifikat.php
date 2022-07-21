<!DOCTYPE html>
<html>
<head>
  <title>Sertifikat Atas Nama <?=$mahasiswa->nama_mahasiswa?></title>
</head>
<body>
<table border="0" width="100%" align="center">
    <tr>
      <td rowspan="4" align="center" valign="top" width="100"><img src="public/assets/images/logo.png" alt="" width="100"></td>     
    </tr>
    <tr>
      <td align="center" valign="top" style="padding:-20px; padding-top:-30px"> <p style="font-size:20px; font-weight: bold;"><>UNIVERSITAS NURUL JADID<</p></td>     
    </tr>
    <tr>
      <td align="center" style="padding:-20px; padding-top:-50px"> <p style="font-size:22px; font-weight: bold;"><>LEMBAGA INTEGRASI KOKURIKULER (LIK) <</p></td>     
    </tr>
    <tr>
      <td align="center" style="padding:-20px; padding-top:-40"> <p style="font-size:22px; font-weight: bold;"><>PAITON  PROBOLINGGO</p></td>     
    </tr>
  </table>
 
  <table border="1px" cellpadding="1" width="100%" align="center" style="border-collapse:collapse;">
    <tr>
      <td align="center" style="border-collapse:collapse; font-size:15px;">Alamat : PP. Nurul Jadid Karanganyar Paiton Probolinggo 672911 email : like@unuja.ac.id</td>     
    </tr>
  </table>
  <h1 align="center">SERTIFIKAT</h1>
  <center style="padding-top:-10;"><span><hr style="width:300px;"/></span></center>
  <center style="padding-top:-20;"><p>Nomor : .........................................................</p></center>

  <center><p>Diberikan kepada : </p></center>

<table border="0px" cellpadding="1" width="70%" align="center" style="border-collapse:collapse; font-size:15px;">
<tr>
  <td width="30%">N a m a </td><td width="2%">:</td><td><b><?=$mahasiswa->nama_mahasiswa?></b></td>

</tr>
<tr>
  <td>Tempat, Tgl Lahir </td><td>:</td><td><?=$mahasiswa->tempat_lahir?>, <?=tgl_indo($mahasiswa->tgl_lahir)?></td>

</tr>
<tr>
  <td>NIM </td><td>:</td><td><?=$mahasiswa->nim?></b></td>

</tr>
<tr>
  <td>Fakultas/Program Studi </td><td>:</td><td><?=$fakultas->nama_fakultas?>/<?=$prodi->nama_prodi?></td>

</tr>
</table>
<p style="text-align:center">Dinyatakan <b>LULUS</b> mengikuti kegiatan Standar Uji Kompetensi Keagamaan Mahasiswa (SUKKM) yang diselenggarakan oleh</p>
<p style="text-align:center; padding-top:-10;">Lembaga Integrasi Kokurikuler (LIK) Universitas Nurul Jadid Paiton Probolinggo.</p>
<p style="text-align:center; padding-top:-10;">Sertifikat ini digunakan sebagai salah satu syara mengikuti kegiatan akademik di Universitas Nurul Jadid Paiton Prolonggo.</p>
<br/>
<p style="padding-top:-20;padding-left:40;">Paiton, <?=tgl_indo(date('Y-m-d'))?></p>
<br/>
<br/>
<br/>

<p style="padding-left:40;">Kepala</p>
<p style="padding-top:-10;padding-left:40;"><b>MOCH. TOHET, M. Pd.I</b></p>
<p style="padding-top:-10;padding-left:40">NIY. 03087</p>
</body>
</html>