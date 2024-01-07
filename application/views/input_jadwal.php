<!DOCTYPE html>
<html>
<head>
    <title>Input Jadwal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 5px;
            transition: box-shadow 0.3s ease-in-out;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .form-group {
            padding: 10px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Form Input Jadwal</h2>
        <form action="<?php echo base_url('index.php/Jadwal_ctrl/tambah'); ?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="id_jadwal">ID Jadwal:</label>
                <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" value="">
            </div>
            <div class="form-group">
                <label for="id_rute">ID Rute:</label>
                <select class="form-control" id="id_rute" name="id_rute">
                    <?php foreach ($rute as $row) : ?>
                        <option value="<?php echo $row['id_rute']; ?>"><?php echo $row['id_rute']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_maskapai">ID Maskapai:</label>
                <select class="form-control" id="id_maskapai" name="id_maskapai">
                    <?php foreach ($maskapai as $row) : ?>
                        <option value="<?php echo $row['id_maskapai']; ?>"><?php echo $row['nama_maskapai']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pesawat">ID Pesawat:</label>
                <select class="form-control" id="id_pesawat" name="id_pesawat">
                    <?php foreach ($pesawat as $row) : ?>
                        <option value="<?php echo $row['id_pesawat']; ?>"><?php echo $row['jenis_pesawat']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
    <label for="tanggal">Tanggal:</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal">
</div>
<div class="form-group">
    <label for="harga">Harga:</label>
    <input type="number" class="form-control" id="harga" name="harga">
</div>
            <!-- ...Form fields lainnya... -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>



    <script>
        function validateForm() {
            var idPenumpang = document.getElementById("id_penumpang").value;
            var namaPenumpang = document.getElementById("nama_penumpang").value;
            var alamat = document.getElementById("alamat").value;
            var nomorTelepon = document.getElementById("nomor_telepon").value;

            if (idPenumpang === '' || namaPenumpang === '' || alamat === '' || nomorTelepon === '') {
                alert('Harap isi semua bidang yang diperlukan.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
