<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\VersiModel;

class Home extends BaseController
{
    protected $bukuModel;
    protected $versiModel;

    public function index(): string
    {
        $this->bukuModel = new BukuModel();
        $this->versiModel = new VersiModel();

        $buku = $this->bukuModel->getBuku();
        $versi = $this->versiModel->getVersi();

        $data = [
            'title' => 'Perpus Pinang | PST',
            'versi' => $versi,
            'buku' => $this->bukuModel->orderBy('judul', 'desc')->paginate(10),
            'pagerBuku' => $this->bukuModel->pager
        ];
        return view('index',$data);
    }
}
