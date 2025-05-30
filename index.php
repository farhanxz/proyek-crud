<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jadwal Piket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hari-box {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            min-width: 150px;
            height: 150px;
            overflow-y: auto;
        }
    </style>
</head>
<body class="container py-5">

    <h2 class="mb-4">Jadwal Piket</h2>
    <a href="tambah.php" class="btn btn-primary mb-4">Tambah Piket</a>

    <div class="row">
        <?php
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        foreach ($hariList as $hari):
            $sql = "SELECT * FROM piket WHERE hari='$hari' ORDER BY id ASC";
            $result = $conn->query($sql);
        ?>
            <div class="col-md-2">
                <div class="hari-box">
                    <strong><?= $hari ?></strong>
                    <hr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><?= htmlspecialchars($row['nama']) ?></span>
                            <div class="btn-group btn-group-sm">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">X</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
