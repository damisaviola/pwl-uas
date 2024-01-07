<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    /* Reset some default styles */
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: whitesmoke;
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
      margin-left: 250px; /* Adjust margin to match sidebar width */
    }

    /* Card styles */
    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: flex-start;
      margin-top: 20px;
      margin-left: 20px;
    }
    .card {
      width: calc(50% - 20px); /* 50% width with gap */
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: box-shadow 0.3s ease-in-out;
      background-color: #fff;
    }
    .card:hover {
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .card-body {
      text-align: center;
      padding: 20px;
    }

    .beranda {
        top: 100px;
    }
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
            

          </ul>
      </div>
      </div>
      <!-- Header -->
      <div class="content">
        <!-- Header -->
        <div class="header">
          <h1>Dashboard</h1>
          <div class="profile" onclick="toggleDropdown()">
          <span><?php echo $namaAdmin; ?></span>
            <div class="dropdown-menu" id="dropdownMenu">
              <div onclick="logout()">Logout</div>
              <!-- Add other dropdown items -->
            </div>
          </div>
        </div>
        <div class="card-container">
          <div class="card">
            <div class="card-body">
              <header>
                <h5 class="card-title">Jumlah Pelanggan</h5>
              </header>
              <p class="card-text"><?= $jumlah_pelanggan ?></p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <header>
                <h5 class="card-title">Jumlah Maskapai</h5>
              </header>
              <p class="card-text"><?= $jumlah_maskapai ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <header>
                <h5 class="card-title">Jumlah Pesawat</h5>
              </header>
              <p class="card-text"><?= $jumlah_pesawat ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <header>
                <h5 class="card-title">Jumlah Jadwal</h5>
              </header>
              <p class="card-text"><?= $jumlah_jadwal ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <header>
                <h5 class="card-title">Jumlah Penerbangan</h5>
              </header>
              <p class="card-text"><?= $jumlah_penerbangan ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <header>
                <h5 class="card-title">Jumlah Pemesanan</h5>
              </header>
              <p class="card-text"><?= $jumlah_pemesanan ?></p>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>

  <script>
    function logout() {
      // Implement your logout logic here
      alert('Logged out');
      // Redirect to logout page or perform other actions as needed
    }

    function toggleDropdown() {
      var dropdown = document.getElementById("dropdownMenu");
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    // Function to update current time
    function updateTime() {
      var now = new Date();
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var time = hours + ":" + (minutes < 10 ? "0" + minutes : minutes);
      document.getElementById("current-time").innerText = time;
    }

    // Update time every second
    setInterval(updateTime, 1000);
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
