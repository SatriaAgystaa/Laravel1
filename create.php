<!DOCTYPE html>
<html>
<head>
    <title>Kevin Ilpallazo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";
    
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $nis=input($_POST["nis"]);
        $rombel=input($_POST["rombel"]);
        $rayon=input($_POST["rayon"]);
        $no_hp=input($_POST["no_hp"]);

        $sql="insert into anggota (nama,nis,rombel,rayon,no_hp) values
		('$nama','$nis','$rombel','$rayon','$no_hp')";

        $hasil=mysqli_query($kon,$sql);

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
            <label>NIS:</label>
            <input type="text" name="nis" class="form-control" placeholder="Masukan NIS" required/>

        </div>
        <div class="form-group">
            <label>Rombel:</label>
            <input type="text" name="rombel" class="form-control" placeholder="Masukan NIS" required/>

        </div>
        <div class="form-group">
            <label>Rayon:</label>
            <input type="text" name="rayon" class="form-control" placeholder="Masukan Rayon" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
    </form>
</div>
</body>
</html>