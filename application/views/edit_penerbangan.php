<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbangan</title>
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
            <h2 class="text-center">Form Edit Penerbangan</h2>
            <form action="<?php echo base_url('index.php/Penerbangan_ctrl/update/') . $penerbangan['id_rute']; ?>" method="post">

            <div class="form-group">
                    <label for="id_rute">ID Rute:</label>
                    <input type="text" class="form-control" name="id_rute" value="<?php echo $penerbangan['id_rute']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="bandara_asal">Bandara Asal:</label>
                    <input type="text" class="form-control" name="bandara_asal" value="<?php echo $penerbangan['bandara_asal']; ?>">
                </div>
                <div class="form-group">
                    <label for="bandara_tujuan">Bandara Tujuan:</label>
                    <input type="text" class="form-control" name="bandara_tujuan" value="<?php echo $penerbangan['bandara_tujuan']; ?>">
                </div>
                <div class="form-group">
                    <label for="waktu_keberangkatan">Waktu Keberangkatan:</label>
                    <input type="datetime-local" class="form-control" name="waktu_keberangkatan" value="<?php echo $penerbangan['waktu_keberangkatan']; ?>">
                </div>
                <div class="form-group">
                    <label for="waktu_kedatangan">Waktu Kedatangan:</label>
                    <input type="datetime-local" class="form-control" name="waktu_kedatangan" value="<?php echo $penerbangan['waktu_kedatangan']; ?>">
                </div>
                <div class="form-group">
                    <label for="maskapai">Nama Maskapai:</label>
                    <input type="text" class="form-control" name="Maskapai" value="<?php echo $penerbangan['Maskapai']; ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
