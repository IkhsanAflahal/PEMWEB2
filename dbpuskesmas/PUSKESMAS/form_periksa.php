<?php
require_once 'dbkoneksi.php';

$_id = $_GET['id'] ?? null;
if ($_id) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();

    $_tanggal = $row['tanggal'];
    $_berat = $row['berat'];
    $_tinggi = $row['tinggi'];
    $_tensi = $row['tensi'];
    $_keterangan = $row['keterangan'];
    $_pasien_id = $row['pasien_id'];
    $_dokter_id = $row['dokter_id'];
    $tombol = "Ubah";
} else {
    $_tanggal = date('Y-m-d');
    $_berat = $_tinggi = $_tensi = $_keterangan = "";
    $_pasien_id = $_dokter_id = "";
    $tombol = "Tambah";
}

$pasien = $dbh->query("SELECT * FROM pasien");
$dokter = $dbh->query("SELECT * FROM paramedik WHERE kategori='dokter'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md h-screen hidden md:block">
        <div class="p-6 text-center font-bold text-xl border-b">Puskesmas</div>
        <nav class="mt-4">
            <ul>
                <li><a href="data_pasien.php" class="block py-3 px-6 hover:bg-blue-200">Data Pasien</a></li>
                <li><a href="form_pasien.php" class="block py-3 px-6 hover:bg-gray-200">Input Pasien</a></li>
                <li><a href="data_paramedik.php" class="block py-3 px-6 hover:bg-blue-200">Data Paramedik</a></li>
                <li><a href="form_paramedik.php" class="block py-3 px-6 hover:bg-blue-200">Input Paramedik</a></li>
                <li><a href="data_periksa.php" class="block py-3 px-6 hover:bg-gray-200">Data Pemeriksaan</a></li>
                <li><a href="form_periksa.php" class="block py-3 px-6 hover:bg-blue-200">Input Pemeriksaan</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-6">Form Pemeriksaan Pasien</h2>
            <form action="proses_periksa.php" method="POST">
                <input type="hidden" name="idx" value="<?= $_id ?>">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Tanggal</label>
                        <input type="date" name="tanggal" class="w-full px-3 py-2 border rounded-md" value="<?= $_tanggal ?>" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Pasien</label>
                        <select name="pasien_id" class="w-full px-3 py-2 border rounded-md" required>
                            <option value="">Pilih Pasien</option>
                            <?php foreach ($pasien as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= $_pasien_id == $p['id'] ? 'selected' : '' ?>>
                                    <?= $p['nama'] ?> (<?= $p['kode'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Dokter</label>
                        <select name="dokter_id" class="w-full px-3 py-2 border rounded-md" required>
                            <option value="">Pilih Dokter</option>
                            <?php foreach ($dokter as $d): ?>
                                <option value="<?= $d['id'] ?>" <?= $_dokter_id == $d['id'] ? 'selected' : '' ?>>
                                    <?= $d['nama'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Berat Badan (kg)</label>
                        <input type="number" step="0.1" name="berat" class="w-full px-3 py-2 border rounded-md" value="<?= $_berat ?>" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Tinggi Badan (cm)</label>
                        <input type="number" step="0.1" name="tinggi" class="w-full px-3 py-2 border rounded-md" value="<?= $_tinggi ?>" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Tensi</label>
                        <input type="text" name="tensi" class="w-full px-3 py-2 border rounded-md" value="<?= $_tensi ?>" required>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block mb-1 font-medium">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="w-full px-3 py-2 border rounded-md"><?= $_keterangan ?></textarea>
                </div>

                <div class="mt-6 flex gap-4">
                    <button type="submit" name="proses" value="<?= $tombol ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md"><?= $tombol ?></button>
                    <a href="data_periksa.php" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-md">Batal</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>