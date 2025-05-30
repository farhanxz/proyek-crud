<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM piket WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $conn->query("UPDATE piket SET nama='$nama', hari='$hari' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Piket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2 class="mb-4">Edit Jadwal Piket</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hari</label>
            <select name="hari" class="form-control" required>
                <option <?= $data['hari'] == 'Senin' ? 'selected' : '' ?>>Senin</option>
                <option <?= $data['hari'] == 'Selasa' ? 'selected' : '' ?>>Selasa</option>
                <option <?= $data['hari'] == 'Rabu' ? 'selected' : '' ?>>Rabu</option>
                <option <?= $data['hari'] == 'Kamis' ? 'selected' : '' ?>>Kamis</option>
                <option <?= $data['hari'] == 'Jumat' ? 'selected' : '' ?>>Jumat</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
