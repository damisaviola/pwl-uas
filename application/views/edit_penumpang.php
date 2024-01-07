<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penumpang</title>
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
            <h2 class="text-center">Form edit Penumpang</h2>
            <form action="<?php echo base_url('index.php/Penumpang_ctrl/update/') . $penumpang['id_penumpang']; ?>" method="post">
            <div class="form-group">
                    <label for="id_penumpang">ID Penumpang:</label>
                    <input type="text" class="form-control" name="id_penumpang" value="<?php echo $penumpang['id_penumpang']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nama_penumpang">Nama Penumpang:</label>
                    <input type="text" class="form-control" name="nama_penumpang" value="<?php echo $penumpang['nama_penumpang']; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" name="alamat"><?php echo $penumpang['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" class="form-control" name="nomor_telepon" value="<?php echo $penumpang['nomor_telepon']; ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>