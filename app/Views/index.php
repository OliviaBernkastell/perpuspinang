<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
  <title><?= $title; ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('/CSS/style.css') ?>" />
  <link rel="icon" type="image/x-icon" href="<?= base_url('/IMG/logo.png') ?>">
</head>

<body>
  <div class="container text-center">
    <div class="judulList">
      <p class="h1 judul">PUSTAKA</p>
      <!-- Admin -->
      <button type="button" class="bi bi-plus-circle-fill iconList" data-bs-toggle="modal" data-bs-target="#BukuBuatModal">
      </button>
    </div>

    <div class="main">
      <table class="tabel" style="overflow: visible;">
        <thead class="fs-4 text-white">
          <tr>
            <th>ID-Publikasi</th>
            <th>Judul Publikasi</th>
            <th>Hardcopy</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="fs-4 text-white">
          <?php foreach ($buku as $b) : ?>
            <tr>
              <td><?= $b['id_publikasi']; ?></td>
              <td class="text-start"><?= $b['judul']; ?></td>
              <td><?= $b['hardcopy']; ?></td>
              <td>
                <div style="overflow: visible;" class="btn-group">
                  <button type="button" class="dropdown-toggle btnModal lihat" data-bs-toggle="dropdown" aria-expanded="false">
                    Aksi
                  </button>
                  <ul class="dropdown-menu">
                    <?php if ($b['hardcopy'] != 0) { ?>
                      <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#lihatModal<?= $b['id']; ?>">Lihat</button></li>
                    <?php } else { ?>
                      <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#BuatVersiModal<?= $b['id']; ?>">Tambah</button></li>
                    <?php } ?>
                    <li><button class="dropdown-item" type="button">Edit</button></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $b['id']; ?>">Hapus</button></li>
                  </ul>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php foreach ($buku as $b) : ?>
        <div class="modal fade" id="lihatModal<?= $b['id']; ?>" tabindex="-1" aria-labelledby="lihatModalLabel<?= $b['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="lihatModalLabel<?= $b['id']; ?>"><?= $b['judul']; ?>&nbsp&nbsp&nbsp|</h1>
                <h1 class="modal-title fs-5" id="lihatModalLabel<?= $b['id']; ?>">&nbsp&nbsp&nbsp<?= $b['id_publikasi']; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="overflow: auto; white-space: nowrap;">
                <table class="tabel-modal">
                  <thead>
                    <tr class="th-modal">
                      <th>Versi</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Penerbit</th>
                      <th>Ruang</th>
                      <th>Lorong</th>
                      <th>RAK</th>
                      <th>Status BMN</th>
                      <th>Kode BMN</th>
                      <th>NUP</th>
                      <th>Harga (Rp)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($versi as $v) : ?>
                      <?php if ($v['id_buku'] == $b['id']) { ?>
                        <tr class="td-modal">
                          <td><?= $v['versi']; ?></td>
                          <td><?= $v['bulan']; ?></td>
                          <td><?= $v['tahun']; ?></td>
                          <td><?= $v['penerbit']; ?></td>
                          <td><?= $v['ruang']; ?></td>
                          <td><?= $v['lorong']; ?></td>
                          <td><?= $v['rak']; ?></td>
                          <?php if ($v['status_bmn'] == 1) { ?>
                            <td>Termasuk BMN</td>
                          <?php } else { ?>
                            <td>Bukan BMN</td>
                          <?php }; ?>
                          <td><?= $v['kode_bmn']; ?></td>
                          <td><?= $v['nup']; ?></td>
                          <td><?= $v['harga']; ?></td>
                        </tr>
                      <?php }; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class=" modal-footer">
                <button type="button" class="btnModal lihat" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="hapusModal<?= $b['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $b['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="hapusModal<?= $b['id']; ?>">Hapus <?= $b['judul']; ?> ?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <form action="<?= base_url('/Buku/hapus/') ;?><?= $b['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btnModal biru">Ya</button>
                  </form>
                  <button type="button" class="btnModal merah" data-bs-dismiss="modal">Tidak</button>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    </div>

    <div class="modal fade" id="BukuBuatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="BukuBuatModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="BukuBuatModalLabel">Buat Buku</h1>
          </div>

          <div class=" modal-body">
            <form action="<?= base_url('/Buku/buat'); ?>" method="post"">
           <?= csrf_field(); ?>
              <div class=" mb-3">
              <input type="text" class="form-control" id="id_publikasi" placeholder="ID-Publikasi" name="id_publikasi" required />
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" required />
          </div>
          <div class="modal-footer">
            <button type="button" class="btnModal merah" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btnModal biru">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="<?= base_url('/JS/script.js'); ?>"></script>
</body>

</html>