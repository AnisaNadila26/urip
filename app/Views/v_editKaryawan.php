<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
</head>

<body>
    <h1>Edit Karyawan</h1>
    <form action="/update/<?= $karyawan['id'] ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $karyawan['nama'] ?>" required><br>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" value="<?= $karyawan['tgl_lahir'] ?>" required><br>

        <label for="gaji">Gaji:</label>
        <input type="text" name="gaji" value="<?= $karyawan['gaji'] ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>