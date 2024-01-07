<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center">Form Edit Pemesanan</h2>
            <form action="<?php echo base_url('index.php/Pemesanan/update/') . $pemesanan['id_pemesanan']; ?>" method="post">

            <div class="form-group">
             <label for="id_pemesanan">ID Pemesanan:</label>
            <input type="text" class="form-control" name="id_pemesanan" value="<?php echo $pemesanan['id_pemesanan']; ?>" disabled>
        </div>

                

            <div class="form-group">
                <label for="id_jadwal">ID jadwal:</label>
                <select class="form-control" id="id_jadwal" name="id_jadwal">
                    <?php foreach ($jadwal_penerbangan as $jadwal) : ?>
                        <option value="<?php echo $jadwal['id_jadwal']; ?>">
                            <?php echo $jadwal['id_jadwal']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_penumpang">ID Penumpang:</label>
                <select class="form-control" name="id_penumpang">
                    <?php foreach ($penumpang as $p) : ?>
                        <option value="<?php echo $p['id_penumpang']; ?>">
                            <?php echo $p['id_penumpang']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

                <div class="form-group">
                    <label for="jumlah_tiket">Jumlah Tiket:</label>
                    <input type="text" class="form-control" name="jumlah_tiket" value="<?php echo $pemesanan['jumlah_tiket']; ?>">
                </div>
                <div class="form-group">
                    <label for="total_biaya">Total Biaya:</label>
                    <input type="text" class="form-control" name="total_biaya" value="<?php echo $pemesanan['total_biaya']; ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
