<!DOCTYPE html>
<html>

<head>
    <title>Edit Maskapai</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <h2 class="text-2xl mb-4">Edit Data Maskapai</h2>

    <?php echo form_open_multipart('Maskapai/update/' . $maskapai['id_maskapai']); ?>

    <div class="max-w-md mx-auto">
        <div class="bg-white p-4 rounded-md shadow-md">
            <label for="id_maskapai" class="block mb-1 text-gray-600">ID Maskapai</label>
            <input type="text" name="id_maskapai" value="<?php echo $maskapai['id_maskapai']; ?>" class="w-full p-2 border border-gray-300 rounded-md mb-4" disabled>


            <label for="nama_maskapai" class="block mb-1 text-gray-600">Nama Maskapai</label>
            <input type="text" name="nama_maskapai" value="<?php echo $maskapai['nama_maskapai']; ?>" class="w-full p-2 border border-gray-300 rounded-md mb-4">

            <label for="kode_maskapai" class="block mb-1 text-gray-600">Kode Maskapai</label>
            <input type="text" name="kode_maskapai" value="<?php echo $maskapai['kode_maskapai']; ?>" class="w-full p-2 border border-gray-300 rounded-md mb-4">

            <label for="jenis_pesawat" class="block mb-1 text-gray-600">Jenis Pesawat</label>
            <input type="text" name="jenis_pesawat" value="<?php echo $maskapai['jenis_pesawat']; ?>" class="w-full p-2 border border-gray-300 rounded-md mb-4">

            <label for="gambar_pesawat" class="block mb-1 text-gray-600">Gambar Pesawat</label>
            <input type="file" name="gambar_maskapai" value="<?php echo $maskapai['gambar_maskapai']; ?>" class="w-full p-2 border border-gray-300 rounded-md mb-4">

            <input type="submit" value="Update" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md cursor-pointer">
        </div>
    </div>

    <?php echo form_close(); ?>
</body>

</html>
