<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $npm=input($_POST["npm"]);
        $kelas=input($_POST["kelas"]);
        $jurusan=input($_POST["jurusan"]);
        $fakultas=input($_POST["fakultas"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (nama,npm,kelas,jurusan,fakultas) values
		('$nama','$npm','$kelas','$jurusan','$fakultas')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>NPM:</label>
            <input type="text" name="npm" class="form-control" placeholder="Masukan npm" required/>
        </div>
       <div class="form-group">
            <label>Kelas :</label>
            <input type="text" name="kelas" class="form-control" placeholder="Masukan kelas" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan jurusan" required/>
        </div>
        <div class="form-group">
            <label>Fakultas:</label>
            <textarea name="fakultas" class="form-control" rows="5"placeholder="Masukan fakultas" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>