<!DOCTYPE html>
<html>
<head>
    <title>Input Pesawat</title>
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
            <h2>Form Input Pesawat</h2>
            <form action="<?php echo base_url('index.php/pesawat_ctrl/tambah'); ?>" method="post">
                <div class="form-group">
                    <label for="id_pesawat">ID Pesawat:</label>
                    <input type="text" class="form-control" id="id_pesawat" name="id_pesawat" value="">
                </div>
                <div class="form-group">
                    <label for="jenis_pesawat">Jenis Pesawat:</label>
                    <input type="text" class="form-control" id="jenis_pesawat" name="jenis_pesawat">
                </div>
                <div class="form-group">
                    <label for="kapasitas">Kapasitas:</label>
                    <input class="form-control" id="kapasitas" name="kapasitas"></input>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
