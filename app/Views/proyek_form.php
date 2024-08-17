<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($proyek) ? 'Edit Proyek' : 'Tambah Proyek' ?></title>
</head>
<body>

<h1><?= isset($proyek) ? 'Edit Proyek' : 'Tambah Proyek' ?></h1>

<form action="<?= isset($proyek) ? '/updateProyek/' . $proyek['id'] : '/createProyek' ?>" method="post">
    <label>Nama Proyek:</label>
    <input type="text" name="nama_proyek" value="<?= isset($proyek) ? $proyek['namaProyek'] : '' ?>" required><br>

    <label>Client:</label>
    <input type="text" name="client" value="<?= isset($proyek) ? $proyek['client'] : '' ?>" required><br>

    <label>Tanggal Mulai:</label>
    <input type="date" name="tgl_mulai" value="<?= isset($proyek) ? $proyek['tglMulai'] : '' ?>" required><br>

    <label>Tanggal Selesai:</label>
    <input type="date" name="tgl_selesai" value="<?= isset($proyek) ? $proyek['tglSelesai'] : '' ?>" required><br>

    <label>Pimpinan Proyek:</label>
    <input type="text" name="pimpinan_proyek" value="<?= isset($proyek) ? $proyek['pimpinanProyek'] : '' ?>" required><br>

    <label>Keterangan:</label>
    <textarea name="keterangan" required><?= isset($proyek) ? $proyek['keterangan'] : '' ?></textarea><br>

    <label>Lokasi:</label>
<?php foreach ($lokasi as $l) : ?>
    <label>
        <input type="checkbox" name="lokasi[]" value="<?= $l['id'] ?>" 
            <?= isset($proyek) && in_array($l['id'], array_column($proyek['lokasiSet'], 'id')) ? 'checked' : '' ?>>
        <?= $l['namaLokasi'] ?>
    </label><br>
<?php endforeach; ?>

    <button type="submit"><?= isset($proyek) ? 'Update' : 'Simpan' ?></button>
</form>

<a href="/">Kembali</a>

</body>
</html>
