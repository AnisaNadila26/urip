<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
</head>

<body>
    <h1>Tambah Karyawan</h1>
    <form action="/store" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" required><br>

        <label for="gaji">Gaji:</label>
        <input type="text" name="gaji" required><br>

        <button type="submit">Simpan</button>
    </form>

    <h1>Data Karyawan</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($karyawan)) : ?>
                <?php foreach ($karyawan as $k) : ?>
                    <tr>
                        <td><?= $k['id'] ?></td>
                        <td><?= $k['nama'] ?></td>
                        <td><?= $k['tgl_lahir'] ?></td>
                        <td><?= $k['gaji'] ?></td>
                        <td>
                            <a href="/karyawan/edit/<?= $k['id'] ?>">Edit</a>
                            <form action="/karyawan/delete/<?= $k['id'] ?>" method="POST" style="display:inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">Tidak ada data karyawan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>