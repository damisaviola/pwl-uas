<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
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

<div class="container">
    <div class="card">
        <h2>Form Edit Jadwal</h2>
        <form action="<?php echo base_url('index.php/Jadwal_ctrl/update'); ?>" method="post" onsubmit="return validateForm()">
        <div class="form-group">
    <label for="id_jadwal">ID jadwal :</label>
    <input type="text" class="form-control" name="id_jadwal" value="<?php echo isset($jadwal_penerbangan['id_jadwal']) ? $jadwal_penerbangan['id_jadwal'] : ''; ?>" >
</div>

            <div class="form-group">
                <label for="id_rute">ID Rute</label>
                <select class="form-control" name="id_rute">
                    <?php foreach ($rute as $r) : ?>
                        <option value="<?php echo $r['id_rute']; ?>">
                            <?php echo $r['id_rute']; ?> - <?php echo $r['bandara_asal']; ?> - <?php echo $r['bandara_tujuan']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_maskapai">ID Maskapai : </label>
                <select class="form-control" name="id_maskapai">
                    <?php foreach ($maskapai as $m) : ?>
                        <option value="<?php echo $m['id_maskapai']; ?>">
                            <?php echo $m['id_maskapai']; ?> - <?php echo $m['nama_maskapai']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_pesawat">ID Pesawat : </label>
                <select class="form-control" name="id_pesawat">
                    <?php foreach ($pesawat as $p) : ?>
                        <option value="<?php echo $p['id_pesawat']; ?>">
                            <?php echo $p['id_pesawat']; ?> - <?php echo $p['jenis_pesawat']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
    <label for="tanggal">Tanggal : </label>
    <input type="date" class="form-control" name="tanggal" value="<?php echo isset($jadwal_penerbangan['tanggal']) ? $jadwal_penerbangan['tanggal'] : ''; ?>">
</div>
<div class="form-group">
    <label for="total_biaya">Harga :</label>
    <input type="text" class="form-control" name="harga" value="<?php echo isset($jadwal_penerbangan['harga']) ? $jadwal_penerbangan['harga'] : ''; ?>">
</div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>




</body>

</html> 