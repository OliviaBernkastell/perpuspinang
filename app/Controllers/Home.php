<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $buku = array(
            array('id' => 1,'id_publikasi'=> 1, 'judul' => 'Statistik Ekonomi Keuangan Daerah Kepulauan Riau','hardcopy' => 2),
            array('id' => 2,'id_publikasi'=> 2, 'judul' => 'Kajian Ekonomi regional Provinsi Kepulauan Riau 2009','hardcopy' => 5),
        );
        $versi = array(
            array('id'=> 1, 'id_buku'=> 1, 'ruang'=>1, 'versi'=>'Vol. 7 No 87', 'lorong'=>1, 'rak'=>1,'baris'=>1,'bulan'=>'Maret', 'tahun'=>'2012', 'penerbit'=>'Bank Indonesia'),
            array('id'=> 2, 'id_buku'=> 1, 'ruang'=>1, 'versi'=>'Vol. 7 No 91', 'lorong'=>1, 'rak'=>1,'baris'=>1,'bulan'=>'Juli', 'tahun'=>'2014', 'penerbit'=>'Dinas Komunikasi dan Informatika Kota Tanjungpinang'),
            array('id'=> 3, 'id_buku'=> 1, 'ruang'=>1, 'versi'=>'Vol. 7 No 92', 'lorong'=>1, 'rak'=>1,'baris'=>1,'bulan'=>'Agustus', 'tahun'=>'2021', 'penerbit'=>'Bank Indonesia'),
            array('id'=> 4, 'id_buku'=> 2, 'ruang'=>1, 'versi'=>'Edisi 85',     'lorong'=>1, 'rak'=>2,'baris'=>1,'bulan'=>'April', 'tahun'=>'2013', 'penerbit'=>'Dinas Pariwisata dan Kebudayaan Kota Tanjungpinang'),
        );
        $data = [
            'title' => 'Perpus Pinang | PST',
            'buku' => $buku,
            'versi' => $versi,
        ];
        return view('index',$data);
    }
}
