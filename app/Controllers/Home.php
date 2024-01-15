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

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->bukuModel->search($keyword);
        } else {
            $buku = $this->bukuModel;
        }

        $data = [
            'title' => 'Perpus Pinang | PST',
            'versi' => $versi,
            'buku' => $buku->orderBy('id', 'asc')->paginate(10),
            'pagerBuku' => $this->bukuModel->pager
        ];
        return view('index',$data);
    }
}
