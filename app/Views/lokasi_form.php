<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($lokasi) ? 'Edit Lokasi' : 'Tambah Lokasi' ?></title>
</head>
<body>

<h1><?= isset($lokasi) ? 'Edit Lokasi' : 'Tambah Lokasi' ?></h1>

<form action="<?= isset($lokasi) ? '/updateLokasi/' . $lokasi['id'] : '/createLokasi' ?>" method="post">
    <label>Nama Lokasi:</label>
    <input type="text" name="nama_lokasi" value="<?= isset($lokasi) ? $lokasi['namaLokasi'] : '' ?>" required><br>

    <label>Negara:</label>
    <input type="text" name="negara" value="<?= isset($lokasi) ? $lokasi['negara'] : '' ?>" required><br>

    <label>Provinsi:</label>
    <input type="text" name="provinsi" value="<?= isset($lokasi) ? $lokasi['provinsi'] : '' ?>" required><br>

    <label>Kota:</label>
    <input type="text" name="kota" value="<?= isset($lokasi) ? $lokasi['kota'] : '' ?>" required><br>

    <button type="submit"><?= isset($lokasi) ? 'Update' : 'Simpan' ?></button>
</form>

<a href="/">Kembali</a>

</body>
</html>
