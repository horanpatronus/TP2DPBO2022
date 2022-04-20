<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Pengurus.class.php");
include("includes/Divisi.class.php");
include("includes/BidangDivisi.class.php");

// membuat objek dari kelas Pengurus
$Pengurus = new Pengurus($db_host, $db_user, $db_pass, $db_name);
$Pengurus->open();

// memanggil method getPengurus di kelas Pengurus
// $Pengurus->getPengurus();

$data = null;

if (isset($_POST['addPengurus'])) {
    
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $semester = $_POST['semester'];
    $id_divisi = $_POST['divisi'];
    $id_jabatan = $_POST['jabatan'];
    $foto_pengurus = $_FILES['foto_pengurus']['name'];
    
    $tempfoto = $_FILES['foto_pengurus']['temp_name'];
    $path = "image/" . $foto;

    move_uploaded_file($tempfoto, $path);

    //memanggil add
    $Pengurus->add($_POST);
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tambah Pengurus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="logo.png" alt="logo" width="10%">
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="add.php">Tambah Pengurus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="divisi.php">Divisi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="jabatan.php">Jabatan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container m-auto mt-xl-5 border p-2 align-items-center" style="background-color: white;">
    <form action="#" method="POST" id="form-pengurus" enctype="multipart/form-data">

      <div class="header text-center p-3 mt-3">
        <h1>Input Pengurus</h1><br>
      </div>

      <div class="card-body text-start" >
        <div class="mb-3">
          <label for="inputNama" class="form-label mb-1">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-3">
          <label for="inputNIM" class="form-label mb-1">NIM</label>
          <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
        </div>
        <div class="mb-3">
          <label for="inputSemester" class="form-label mb-1">Semester</label>
          <input type="number" class="form-control" id="semester" placeholder="Masukkan semester" required>
        </div>
        <div class="mb-3">
          <label for="inputDivisi" class="form-label mb-1">Divisi</label>
          <select class="form-select" aria-label="Divisi" id="divisi" name="divisi" required>
            
            <option selected>Pilih divisi</option>
            <option value="1">Divisi Ekonomi dan Bisnis</option>
            <option value="2">Divisi Pengembangan Minat dan Bakat</option>
            <option value="3">Divisi Pendidikan dan Pelatihan</option>
            <option value="4">Divisi Pengembangan Organisasi</option>
            <option value="5">Divisi Advokasi, Sosial, dan Politik</option>
            <option value="6">Divisi Kerohanian</option>
            <option value="7">Divisi Komunikasi, Teknologi, dan Informasi</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="inputJabatan" class="form-label mb-1">Jabatan</label>
          <select class="form-select" aria-label="Jabatan" id="jabatan" name="jabatan" required>
            <option selected>Pilih jabatan</option>
            <option value="1">Ketua Divisi</option>
            <option value="2">Sekretaris</option>
            <option value="3">Bendahara</option>
            <option value="4">Anggota</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="inputFoto" class="form-label mb-1">Foto</label>
          <input type="file" class="form-control" id="foto_pengurus" name="foto_pengurus" required>
        </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="addPengurus" name="addPengurus" value="submit">Submit</button>
      </div>
      </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>