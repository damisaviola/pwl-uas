<!DOCTYPE html>
<html>
<head>
    <title>Input Pemesanan</title>
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
    <h2>Input Pemesanan</h2>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo base_url('index.php/pemesanan/insert_pemesanan'); ?>" method="post">
                <div class="form-group">
                    <label for="id_pemesanan">ID Pemesanan:</label>
                    <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan">
                </div>

                <div class="form-group">
                    <label for="id_jadwal">ID Jadwal:</label>
                    <select class="form-control" id="id_jadwal" name="id_jadwal">
    <?php foreach ($jadwal_penerbangan as $jadwal) : ?>
        <option value="<?php echo $jadwal['id_jadwal']; ?>"><?php echo $jadwal['id_jadwal']; ?></option>
    <?php endforeach; ?>
</select>
                </div>

                <div class="form-group">
                    <label for="id_penumpang">ID Penumpang:</label>
                    <select class="form-control" id="id_penumpang" name="id_penumpang">
                        <?php foreach ($penumpang as $p) : ?>
                            <option value="<?php echo $p['id_penumpang']; ?>"><?php echo $p['nama_penumpang']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah_tiket">Jumlah tiket:</label>
                    <input type="text" class="form-control" id="jumlah_tiket" name="jumlah_tiket">
                </div>

                <div class="form-group">
                    <label for="total_biaya">Total:</label>
                    <input type="text" class="form-control" id="totalk_biaya" name="total_biaya">
                </div>
             
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
