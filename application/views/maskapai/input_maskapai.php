<!DOCTYPE html>
<html>

<head>
    <title>Input Maskapai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: whitesmoke;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Styling for the time and day */
        .time {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .day {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Input Maskapai</h2>
        <div class="card">
            <form action="<?php echo base_url('index.php/Maskapai/insert'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id_maskapai">ID Maskapai:</label>
                    <input type="text" class="form-control" id="id_maskapai" name="id_maskapai">
                </div>
                <div class="form-group">
                    <label for="nama_maskapai">Nama Maskapai:</label>
                    <input type="text" class="form-control" id="nama_maskapai" name="nama_maskapai">
                </div>
                <div class="form-group">
                    <label for="jenis_pesawat">Jenis Pesawat:</label>
                    <input type="text" class="form-control" id="jenis_pesawat" name="jenis_pesawat">
                </div>
                <div class="form-group">
                    <label for="kode_maskapai">Kode Maskapai:</label>
                    <input type="text" class="form-control" id="kode_maskapai" name="kode_maskapai">
                </div>
                <div class="form-group">
                    <label for="gambar_maskapai">Gambar Maskapai:</label>
                    <input type="file" class="form-control-file" id="gambar_maskapai" name="gambar_maskapai">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <div class="time" id="current-time"></div>
            <div class="day" id="current-day"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        // Function to update current time
        function updateTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var time = hours + ":" + (minutes < 10 ? "0" + minutes : minutes);
            document.getElementById("current-time").innerText = time;

            // Displaying day
            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var day = days[now.getDay()];
            document.getElementById("current-day").innerText = day;
        }

        // Update time every second
        setInterval(updateTime, 1000);

        // Initial time display
        updateTime();
    </script>
</body>

</html>