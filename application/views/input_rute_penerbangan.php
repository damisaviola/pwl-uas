<!DOCTYPE html>
<html>
<head>
    <title>Input Rute Penerbangan</title>
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary:hover {
            background-color: #337ab7 !important;
            border-color: #2e6da4 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Input Rute Penerbangan</h2>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo base_url('index.php/Penerbangan_ctrl/input'); ?>" method="post">
                    <div class="form-group">
                        <label for="id_rute">ID Rute:</label>
                        <input type="text" class="form-control" id="id_rute" name="id_rute">
                    </div>

                    <div class="form-group">
                        <label for="asal">Bandara Asal:</label>
                        <input type="text" class="form-control" id="asal" name="asal">
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Bandara Tujuan:</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan">
                    </div>
                    <div class="form-group">
                        <label for="waktu_keberangkatan">Waktu Keberangkatan:</label>
                        <input type="datetime-local" class="form-control" id="waktu_keberangkatan" name="waktu_keberangkatan">
                    </div>
                    <div class="form-group">
                        <label for="waktu_kedatangan">Waktu Kedatangan:</label>
                        <input type="datetime-local" class="form-control" id="waktu_kedatangan" name="waktu_kedatangan">
                    </div>
                    <div class="form-group">
                        <label for="maskapai">Maskapai:</label>
                        <select class="form-control" id="maskapai" name="maskapai">
        <?php foreach ($daftar_maskapai as $maskapai) { ?>
            <option value="<?php echo $maskapai['nama_maskapai']; ?>"><?php echo $maskapai['nama_maskapai']; ?></option>
        <?php } ?>
    </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
