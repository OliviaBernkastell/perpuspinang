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
    <p class="h1 judul">List Buku</p>
    <div class="main">
      <table class="tabel">
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
              <td><?= $b['id']; ?></td>
              <td class="text-start"><?= $b['judul']; ?></td>
              <td><?= $b['hardcopy']; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['id']; ?>">
                  Lihat
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php foreach ($buku as $b) : ?>
        <div class="modal fade" id="exampleModal<?= $b['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $b['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel<?= $b['id']; ?>"><?= $b['judul']; ?>&nbsp&nbsp&nbsp|</h1>
                <h1 class="modal-title fs-5" id="exampleModalLabel<?= $b['id']; ?>">&nbsp&nbsp&nbspID-Publikasi:<?= $b['id_publikasi']; ?></h1>
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
                          <td class="text-start"><?= $v['penerbit']; ?></td>
                          <td><?= $v['ruang']; ?></td>
                          <td><?= $v['lorong']; ?></td>
                          <td><?= $v['rak']; ?></td>
                          <?php if ($v['status_bmn']==1) { ?>
                          <td>Termasuk BMN</td>
                          <?php } else { ?>
                          <td>Bukan BMN</td>
                          <?php };?>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="<?= base_url('/JS/script.js'); ?>"></script>
</body>

</html>