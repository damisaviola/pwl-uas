<!DOCTYPE html>
<html>
<head>
    <title>Input Penumpang</title>
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
            <h2>Form Input Penumpang</h2>
            <form action="<?php echo base_url('index.php/Penumpang_ctrl/tambah'); ?>" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="id_penumpang">ID Penumpang:</label>
                    <input type="text" class="form-control" id="id_penumpang" name="id_penumpang" value="">
                </div>
                <div class="form-group">
                    <label for="nama_penumpang">Nama Penumpang:</label>
                    <input type="text" class="form-control" id="nama_penumpang" name="nama_penumpang">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
                </div>
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
