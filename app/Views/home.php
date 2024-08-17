<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek dan Lokasi</title>
</head>
<body>

<h1>Daftar Proyek</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nama Proyek</th>
            <th>Client</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Pimpinan Proyek</th>
            <th>Keterangan</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($proyek as $p) : ?>
            <tr>
                <td><?= $p['namaProyek'] ?></td>
                <td><?= $p['client'] ?></td>
                <td><?= $p['tglMulai'] ?></td>
                <td><?= $p['tglSelesai'] ?></td>
                <td><?= $p['pimpinanProyek'] ?></td>
                <td><?= $p['keterangan'] ?></td>
                <td>
                    <?php foreach ($p['lokasiSet'] as $l) : ?>
                        <?= $l['namaLokasi'] ?><br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <a href="/editProyek/<?= $p['id'] ?>">Edit</a> |
                    <a href="/deleteProyek/<?= $p['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Daftar Lokasi</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nama Lokasi</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lokasi as $l) : ?>
            <tr>
                <td><?= $l['namaLokasi'] ?></td>
                <td><?= $l['negara'] ?></td>
                <td><?= $l['provinsi'] ?></td>
                <td><?= $l['kota'] ?></td>
                <td>
                    <a href="/editLokasi/<?= $l['id'] ?>">Edit</a> |
                    <a href="/deleteLokasi/<?= $l['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/addProyek">Tambah Proyek</a>
<a href="/addLokasi">Tambah Lokasi</a>

</body>
</html>
