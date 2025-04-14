<?php
require_once 'dbkoneksi.php';
$sql = "SELECT * FROM pasien";
$query = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pasien</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      width: 220px;
      background-color: #343a40;
      color: white;
      flex-shrink: 0;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px 20px;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .main {
      flex-grow: 1;
      background-color: #f8f9fa;
    }
    .table th {
      background-color: #0d6efd;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">Puskesmas</h4>
    <a href="#"><i class="fas fa-home me-2"></i>Beranda</a>
    <a href="#" class="active"><i class="fas fa-user-injured me-2"></i>Data Pasien</a>
    <a href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Data Pasien</span>
      </div>
    </nav>

    <!-- Table Content -->
    <div class="container mt-4">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Tabel Data Pasien</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th>Kode</th>
                  <th>Nama Pasien</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nomor = 1;
                foreach ($query as $row) {
                  echo "<tr>
                          <td>$nomor</td>
                          <td>{$row['kode']}</td>
                          <td>{$row['nama']}</td>
                          <td>{$row['alamat']}</td>
                          <td>{$row['email']}</td>
                          <td>
                            <a href='form_pasien.php?id={$row['id']}'>Ubah</a> |
                            <a href='proses_pasien.php?id={$row['id']}&proses=Hapus' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                          </td>
                        </tr>";
                  $nomor++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 text-muted">
      © 2025 Puskesmas
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
