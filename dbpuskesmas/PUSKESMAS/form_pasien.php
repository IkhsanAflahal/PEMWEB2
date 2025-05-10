<?php
require_once 'dbkoneksi.php';

$_id = $_GET['id'] ?? null;
if ($_id) {
    $sql = "SELECT * FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();

    $_kode = $row['kode'];
    $_nama = $row['nama'];
    $_tmp_lahir = $row['tmp_lahir'];
    $_tgl_lahir = $row['tgl_lahir'];
    $_gender = $row['gender'];
    $_email = $row['email'];
    $_alamat = $row['alamat'];
    $_kelurahan = $row['kelurahan_id'];
    $tombol = "Ubah";
} else {
    $_kode = $_nama = $_tmp_lahir = $_tgl_lahir = $_gender = $_email = $_alamat = $_kelurahan = "";
    $tombol = "Tambah";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pasien</title>
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
            <h2 class="text-2xl font-semibold mb-6">Form Input Data Pasien</h2>
                <form action="proses_pasien.php" method="POST">
                    <input type="hidden" name="idx" value="<?= $_id ?>">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-medium">Kode</label>
                            <input type="text" name="kode" class="w-full px-3 py-2 border rounded-md" value="<?= $_kode ?>" required>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Nama Lengkap</label>
                            <input type="text" name="nama" class="w-full px-3 py-2 border rounded-md" value="<?= $_nama ?>" required>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" class="w-full px-3 py-2 border rounded-md" value="<?= $_tmp_lahir ?>">
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="w-full px-3 py-2 border rounded-md" value="<?= $_tgl_lahir ?>">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block mb-1 font-medium">Jenis Kelamin</label>
                        <div class="flex items-center gap-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="L" <?= $_gender == 'L' ? 'checked' : '' ?>>
                                <span class="ml-2">Laki-Laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="P" <?= $_gender == 'P' ? 'checked' : '' ?>>
                                <span class="ml-2">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block mb-1 font-medium">Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 border rounded-md" value="<?= $_email ?>">
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Kelurahan</label>
                            <select name="kelurahan" class="w-full px-3 py-2 border rounded-md">
                                <?php
                                $kelurahanQuery = $dbh->query("SELECT id, nama FROM kelurahan");
                                foreach ($kelurahanQuery as $row) {
                                    $selected = $_kelurahan == $row['id'] ? 'selected' : '';
                                    echo "<option value='{$row['id']}' $selected>{$row['nama']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block mb-1 font-medium">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full px-3 py-2 border rounded-md"><?= $_alamat ?></textarea>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <button type="submit" name="proses" value="<?= $tombol ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md"><?= $tombol ?></button>
                        <a href="data_pasien.php" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-md">Batal</a>
                    </div>
                </form>

        </div>
    </main>
</body>
</html>
