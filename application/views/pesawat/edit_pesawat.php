<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesawat</title>
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
            <h2 class="text-center">Edit Pesawat</h2>
            <form action="<?php echo base_url('index.php/Pesawat_ctrl/update/') . $pesawat['id_pesawat']; ?>" method="post" >

            <div class="form-group">
                    <label for="id_pesawat">ID Pesawat:</label>
                    <input type="text" class="form-control" name="id_pesawat" value="<?php echo $pesawat['id_pesawat']; ?>"  disabled>
                </div>

                <div class="form-group">
                    <label for="jenis_pesawat">Jenis Pesawat:</label>
                    <input type="text" class="form-control" name="jenis_pesawat" value="<?php echo $pesawat['jenis_pesawat']; ?>">
                </div>
                <div class="form-group">
                    <label for="kapasitas">Kapasitas:</label>
                    <textarea class="form-control" name="kapasitas"><?php echo $pesawat['kapasitas']; ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>