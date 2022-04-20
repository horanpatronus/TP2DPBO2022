<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Jabatan.class.php");

$jabatan = new Jabatan($db_host, $db_user, $db_pass, $db_name);
$jabatan->open();
$jabatan->getJabatan();
$data = null;
$no = 1;

if (!empty($_GET['edit'])) {
    //memanggil add
    $id = $_GET['edit'];
    $nama = $_GET['nama'];

    $jabatan->update($id, $nama);
    header("location:jabatan.php");
}

//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];

    $jabatan->delete($id);
    header("location:jabatan.php");
}

while(list($id_jabatan, $nama_jabatan) = $jabatan->getResult()){

        $data .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $nama_jabatan. "</td>
        <td>
        <a href='update.php?edit=" . $id_jabatan .  "' class='btn btn-warning' '>Edit</a>
        <a href='jabatan.php?id_hapus=" . $id_jabatan . "' class='btn btn-danger' '>Hapus</a>
        </td>
        </tr>";
    
}


$jabatan->close();
$tpl = new Template("templates/tabel_jabatan.html");
$tpl->replace("DATA_TABEL", $data);
$tpl->write();
