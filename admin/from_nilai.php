<?php
include_once 'top.php';
?>
<div id="page-content-wrapper">
    <!-- Top navigation-->
    <?php
    include_once 'menu.php';
    ?>
    <!-- Page content-->
    <div class="container-fluid">
        <h1 class="mt-4">Selamat Datang</h1>

        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Nilai</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            </link>
        </head>

        <body class="bg-gray-100">
            <div class="container mx-auto p-4">
                <form method="post" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <fieldset>
                        <legend class="text-2xl font-bold mb-4">Form Nilai Mahasiswa</legend>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama Lengkap</label>
                            <input name="nama" type="text" placeholder="Masukan Nama"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="matkul">Mata Kuliah</label>
                            <select id="matkul" name="matkul"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                <option value="Bahasa Inggris 1">Bahasa Inggris 1</option>
                                <option value="Jaringan komputer">Jaringan komputer</option>
                                <option value="Statistik dan Probabilitas">Statistik dan Probabilitas</option>
                                <option value="Pemrograman Web 2">Pemrograman Web 2</option>
                                <option value="Pendidikan Pancasila dan Kewarganegaraan">Pendidikan Pancasila dan
                                    Kewarganegaraan</option>
                                <option value="Komunikasi Efektif">Komunikasi Efektif</option>
                                <option value="User Interface dan User Experience">User Interface dan User Experience
                                </option>
                                <option value="Basis Data">Basis Data</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nilai_uts">Nilai UTS</label>
                            <input id="nilai_uts" name="nilai_uts" type="text" placeholder="Masukan Nilai UTS"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nilai_uas">Nilai UAS</label>
                            <input id="nilai_uas" name="nilai_uas" type="text" placeholder="Masukan Nilai UAS"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nilai_tugas">Nilai
                                Tugas/Praktikum</label>
                            <input id="nilai_tugas" name="nilai_tugas" type="text" placeholder="Masukan Nilai Tugas"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kirim</button>
                        </div>
                    </fieldset>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nama = $_POST['nama'];
                    $matkul = $_POST['matkul'];
                    $nilai_uts = $_POST['nilai_uts'];
                    $nilai_uas = $_POST['nilai_uas'];
                    $nilai_tugas = $_POST['nilai_tugas'];

                    $nilai_akhir = hitung_nilai($nilai_uts, $nilai_uas, $nilai_tugas);
                    $status_kelulusan = kelulusan($nilai_akhir);

                    echo "<div class='bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4'>";
                    echo "<h2 class='text-xl font-bold mb-4'>Hasil Nilai</h2>";
                    echo "<p><strong>Nama:</strong> $nama</p>";
                    echo "<p><strong>Mata Kuliah:</strong> $matkul</p>";
                    echo "<p><strong>Nilai UTS:</strong> $nilai_uts</p>";
                    echo "<p><strong>Nilai UAS:</strong> $nilai_uas</p>";
                    echo "<p><strong>Nilai Tugas/Praktikum:</strong> $nilai_tugas</p>";
                    echo "<p><strong>Nilai Akhir:</strong> $nilai_akhir</p>";
                    echo "<p><strong>Status Kelulusan:</strong> $status_kelulusan</p>";
                    echo "</div>";
                }

                function hitung_nilai($nilai_uts, $nilai_uas, $nilai_tugas)
                {
                    define('NILAI_UTS', 0.25);
                    define('NILAI_UAS', 0.35);
                    define('NILAI_TUGAS', 0.45);
                    $nilai_akhir = NILAI_UTS * $nilai_uts + NILAI_UAS * $nilai_uas + NILAI_TUGAS * $nilai_tugas;
                    return $nilai_akhir;
                }

                function kelulusan($nilai)
                {
                    define('NILAI_MINIMAL', 60);
                    if ($nilai >= NILAI_MINIMAL) {
                        return "Lulus";
                    } else {
                        return "Tidak Lulus";
                    }
                }
                ?>
            </div>
        </body>

        </html>


    </div>
</div>
<?php
include_once 'bottom.php';
?>