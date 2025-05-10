<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
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
        <main class="flex-1 p-10">
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-3xl font-semibold text-gray-800">Data Paramedik</h2>
                <a href="form_paramedik.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tambah Paramedik</a>
            </div>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full table-auto text-left">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Tempat/Tgl Lahir</th>
                            <th class="px-6 py-3">Kategori</th>
                            <th class="px-6 py-3">Telepon</th>
                            <th class="px-6 py-3">Unit Kerja</th>
                            <th class="px-6 py-3">Alamat</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php
                        require_once 'dbkoneksi.php';

                        $sql = "SELECT p.*, u.nama as unit_kerja_nama 
                                FROM paramedik p 
                                LEFT JOIN unit_kerja u ON p.unit_kerja_id = u.id";
                        $query = $dbh->query($sql);

                        $nomor = 1;
                        foreach ($query as $row) {
                            echo "<tr class='border-b hover:bg-gray-50'>
                                    <td class='px-6 py-4'>{$nomor}</td>
                                    <td class='px-6 py-4'>{$row['nama']}</td>
                                    <td class='px-6 py-4'>" . ($row['gender'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>
                                    <td class='px-6 py-4'>{$row['tmp_lahir']}, " . date('d-m-Y', strtotime($row['tgl_lahir'])) . "</td>
                                    <td class='px-6 py-4'>" . ucwords(str_replace('_', ' ', $row['kategori'])) . "</td>
                                    <td class='px-6 py-4'>{$row['telpon']}</td>
                                    <td class='px-6 py-4'>{$row['unit_kerja_nama']}</td>
                                    <td class='px-6 py-4'>{$row['alamat']}</td>
                                    <td class='px-6 py-4'>
                                        <a href='form_paramedik.php?id={$row['id']}' class='text-blue-600 hover:underline'>Ubah</a> |
                                        <a href='proses_paramedik.php?idx={$row['id']}&proses=Hapus' class='text-red-600 hover:underline' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                    </td>
                                </tr>";
                            $nomor++;
                        }                        
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>