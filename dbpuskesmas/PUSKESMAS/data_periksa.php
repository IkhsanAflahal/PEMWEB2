<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemeriksaan</title>
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
                <h2 class="text-3xl font-semibold text-gray-800">Data Pemeriksaan Pasien</h2>
                <a href="form_periksa.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tambah Pemeriksaan</a>
            </div>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full table-auto text-left">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Nama Pasien</th>
                            <th class="px-6 py-3">Dokter</th>
                            <th class="px-6 py-3">Berat/Tinggi</th>
                            <th class="px-6 py-3">Tensi</th>
                            <th class="px-6 py-3">Keterangan</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php
                        require_once 'dbkoneksi.php';

                        $sql = "SELECT pr.*, ps.nama as pasien_nama, pd.nama as dokter_nama 
                                FROM periksa pr 
                                JOIN pasien ps ON pr.pasien_id = ps.id 
                                JOIN paramedik pd ON pr.dokter_id = pd.id";
                        $query = $dbh->query($sql);

                        $nomor = 1;
                        foreach ($query as $row) {
                            echo "<tr class='border-b hover:bg-gray-50'>
                                    <td class='px-6 py-4'>{$nomor}</td>
                                    <td class='px-6 py-4'>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>
                                    <td class='px-6 py-4'>{$row['pasien_nama']}</td>
                                    <td class='px-6 py-4'>{$row['dokter_nama']}</td>
                                    <td class='px-6 py-4'>{$row['berat']} kg / {$row['tinggi']} cm</td>
                                    <td class='px-6 py-4'>{$row['tensi']}</td>
                                    <td class='px-6 py-4'>{$row['keterangan']}</td>
                                    <td class='px-6 py-4'>
                                        <a href='form_periksa.php?id={$row['id']}' class='text-blue-600 hover:underline'>Ubah</a> |
                                        <a href='proses_periksa.php?idx={$row['id']}&proses=Hapus' class='text-red-600 hover:underline' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
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