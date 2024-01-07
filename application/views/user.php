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

  </style>
</head>
<body>
  

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
    <div class="card">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pemesanan</th>
                    <th>ID Jadwal</th>
                    <th>Nama Penumpang</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemesanan as $row) : ?>
                    <tr>
                        <td><?php echo $row['id_pemesanan']; ?></td>
                        <td><?php echo $row['id_jadwal']; ?></a></td>
                        <td>
                            <?php
                            $nama_penumpang = $this->Penumpang_model->get_nama_penumpang_by_id($row['id_penumpang']);
                            echo $nama_penumpang;
                            ?>
                        </td>
                        <td><?php echo $row['jumlah_tiket']; ?></td>
                        <td><?php echo $row['total_biaya']; ?></td>
                    </tr>
                <?php endforeach; ?>
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
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script>
  function logout() {
    if (confirm('Anda yakin ingin logout?')) {
      window.location.href = '<?php echo base_url("index.php/Admin/logout"); ?>';
    }
  }
</script>
</body>

</html>