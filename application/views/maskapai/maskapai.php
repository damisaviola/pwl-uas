<!DOCTYPE html>
<html>

<head>
  <title>Daftar Maskapai</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    /* Reset some default styles */
    body,
    html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: whitesmoke;
    }

    .container {
      padding-top: 100px;
    }

    /* Sidebar styles */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #333;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      padding: 10px 20px;
      border-bottom: 1px solid #555;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
    }

    /* Header styles */
    .header {
      width: 100%;
      box-sizing: border-box;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: #444;
      color: #fff;
    }

    .profile {
      position: relative;
      cursor: pointer;
      right: 30px;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      top: 30px;
      right: 0;
      background-color: #333;
      padding: 5px 10px;
      cursor: pointer;
      z-index: 1;
    }

    .sidebar ul .dropdown {
      display: none;
      list-style: none;
      padding-left: 0;
      margin-top: 5px;
    }

    .sidebar ul .dropdown2 {
      display: none;
      list-style: none;
      padding-left: 0;
      margin-top: 5px;
    }

    .sidebar ul li:hover .dropdown {
      display: block;
    }

    .profile:hover .dropdown-menu {
      display: block;
    }


    /* Content styles */
    .content {
      padding: 0px;
      margin-left: 250px;
      /* Adjust margin to match sidebar width */
    }

    /* Card styles */

    .card {
      width: 100%;
      /* 50% width with gap */
      border-radius: 0px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
      background-color: #fff;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .beranda {
      padding-top: 100px;
    }

    /* Other styles for header, cards, etc. */
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="beranda">
          <div style="color: #fff; text-align: center; padding-bottom: 20px;">
            <span id="current-time"></span>
            <div class="day" id="current-day"></div>
          </div>
          <ul>
            <li><a href="<?php echo base_url('/index.php/dashboard'); ?>">Dashboard</a></li>
            <li>
              <a href="">Input</a>
              <ul class="dropdown">
                <li><a href="<?php echo base_url('index.php/Maskapai/input'); ?>">Maskapai</a></li>
                <li><a href="<?php echo base_url('index.php/penumpang_ctrl/input_penumpang'); ?>">Penumpang</a></li>
                <li><a href="<?php echo base_url('index.php/pemesanan/input'); ?>">Pemesanan</a></li>
                <li><a href="<?php echo base_url('index.php/pesawat_ctrl/input_pesawat'); ?>">Pesawat</a></li>
                <li><a href="<?php echo base_url('index.php/penerbangan_ctrl/input_penerbangan'); ?>">Penerbangan</a></li>
                <li><a href="<?php echo base_url('index.php/Jadwal_ctrl/input_jadwal'); ?>">Jadwal</a></li>
              </ul>

            <li>
              <a href="#">Informasi</a>
              <ul class="dropdown">
                <li><a href="<?php echo base_url('/index.php/Pemesanan/daftar_maskapai'); ?>">Daftar Maskapai</a></li>
                <li><a href="<?php echo base_url('/index.php/Pesawat_ctrl/daftar_pesawat'); ?>">Daftar Pesawat</a></li>
                <li><a href="<?php echo base_url('/index.php/Pemesanan/input_pemesanan'); ?>">Daftar Pemesanan</a></li>
                <li><a href="<?php echo base_url('index.php/penumpang_ctrl'); ?>">Daftar Penumpang</a></li>
                <li><a href="<?php echo base_url('index.php/penerbangan_ctrl/show_penerbangan'); ?>">Daftar Penerbangan</a></li>
                <li><a href="<?php echo base_url('index.php/Jadwal_ctrl/daftar_jadwal'); ?>">Daftar Jadwal</a></li>

              </ul>
            </li>
</li>
            
            <!-- Add more sidebar items -->
          </ul>
        </div>
      </div>

      <!-- Content -->
      <div class="content">
        <!-- Header -->
        <div class="header">
          <h1>Daftar Maskapai</h1>
          <div class="profile" onclick="toggleDropdown()">
          <span><?php echo $namaAdmin; ?></span>
            <div class="dropdown-menu" id="dropdownMenu">
              <div onclick="logout()">Logout</div>
              <!-- Add other dropdown items -->
            </div>
          </div>
        </div>

        
        <div class="container">
        <a href="<?php echo base_url('index.php/Maskapai/input'); ?>" class="btn btn-success btn-sm">Tambah Data</a> <br> <br>
          <div class="card">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Maskapai</th>
                  <th>Kode Maskapai</th>
                  <th>Jenis Pesawat</th>
                  <th>Gambar</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tbody>


                <?php foreach ($maskapai as $row) { ?>
                  <tr>
                    <td><?php echo $row['id_maskapai']; ?></td>
                    <td><?php echo $row['nama_maskapai']; ?></td>
                    <td><?php echo $row['kode_maskapai']; ?></td>
                    <td><?php echo $row['jenis_pesawat']; ?></td>
                    <td><img src="<?php echo base_url('uploads/' . $row['gambar_maskapai']); ?>" alt="Gambar Maskapai" style="max-width: 100px;"></td>
                    <td>
                      <a href="<?php echo base_url('index.php/Maskapai/edit/' . $row['id_maskapai']); ?>" class="btn btn-warning btn-sm">Edit</a>
                      <a href="<?php echo base_url('index.php/Maskapai/delete/' . $row['id_maskapai']); ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
         

        </div>

        <script>
          function updateTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var time = hours + ":" + (minutes < 10 ? "0" + minutes : minutes);
            document.getElementById("current-time").innerText = time;

            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var day = days[now.getDay()];
            document.getElementById("current-day").innerText = day;
          }

          setInterval(updateTime, 1000);
          updateTime();

          function logout() {
            alert('Logged out');
          }

          function toggleDropdown() {
            var dropdown = document.getElementById("dropdownMenu");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
          }
        </script>
        
        <script>
          function confirmDelete() {
    return confirm("Apakah Anda yakin ingin menghapus data pesawat?");
}
        </script>
        <script>
    function logout() {
      if (confirm('Anda yakin ingin logout?')) {
        // Lakukan logout dan redirect ke halaman login
        window.location.href = '<?php echo base_url("index.php/admin/logout"); ?>';
        // Gunakan pushState untuk mengganti URL setelah logout
        window.history.pushState({}, document.title, '/');
      }
    }

    function updateTime() {
      // Function to update current time, your existing code here
    }

    setInterval(updateTime, 1000);
    updateTime();
  </script>
</body>

</html>