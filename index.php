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
$Pengurus->getPengurus();

$data = null;
$no = 1;


if(isset($_POST['add'])){

    $Pengurus->add($_POST);
	header("location:index.php");
}

//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];

    $Pengurus->delete($id);
    header("location:index.php");
}

if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];

    $Pengurus->update($id);
    header("location:index.php");
}

while (list($nim, $nama, $semester, $id_bidang, $id_divisi, $id_jabatan, $foto_pengurus) = $Pengurus->getResult()) {

        $bidang_divisi = new BidangDivisi($db_host, $db_user, $db_pass, $db_name);
        $bidang_divisi->open();
        $bidang_divisi->getBidangDivisiId($id_bidang);
        $result_bd = $bidang_divisi->getResult();

        $divisi = new Divisi($db_host, $db_user, $db_pass, $db_name);
        $divisi->open();
        $divisi->getDivisiId($result_bd['id_divisi']);
        $result_d = $divisi->getResult();

        $data .= "
        
        <div class='card d-flex justify-content-sm-between m-5' style='width: 16rem;'>
            <a href='detail.php?nim=" . $nim . "' class='text-decoration-none'>
                <img src='image/" . $foto_pengurus . "' class='card-img-top p-3' alt='". $foto_pengurus ."'>
                <div class='card-body justify-content-center text-center'>
                    <h5 class='card-text' style='text-decoration:none;'> " . $nama . "</h5>
                    <p class='card-text'> " . $nim . "</p>
                    <p class='card-text'> Semester " . $semester . "</p>
                    <p class='card-text'> " . $result_d['nama_divisi'] . "</p>
                    <p class='card-text'> " . $result_bd['jabatan'] . "</p>
                </div>
            </a>
        </div>
        ";
    
}

$Pengurus->close();
$tpl = new Template("templates/index.html");
$tpl->replace("DATA_TABEL", $data);
$tpl->write();
