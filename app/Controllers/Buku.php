<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\VersiModel;

class Buku extends BaseController
{
  protected $bukuModel;
  protected $versiModel;

  public function buat()
  {
    $this->bukuModel = new BukuModel();
    $this->bukuModel->save([
      'id_publikasi' => $this->request->getVar('id_publikasi'),
      'judul' => $this->request->getVar('judul'),
      'hardcopy' => 0,
    ]);
    return redirect()->to('/home');
  }
  public function hapus($id)
  {
    $this->bukuModel = new BukuModel();
    $gambar = $this->bukuModel->getBuku($id);

    $this->bukuModel->delete($id);
    return redirect()->to('/home');
  }
  public function edit($id)
  {
    $this->bukuModel = new BukuModel();
    $data = [
      'id_publikasi' => $this->request->getVar('id_publikasi'),
      'judul' => $this->request->getVar('judul'),
    ];
    $this->bukuModel->update($id, $data);
    return redirect()->to('/home');
  }
}
