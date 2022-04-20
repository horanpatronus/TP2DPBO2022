<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Divisi.class.php");

$divisi = new Divisi($db_host, $db_user, $db_pass, $db_name);
$divisi->open();
$divisi->getDivisi();
$data = null;
$no = 1;

if (!empty($_GET['edit'])) {
    //memanggil add
    $id = $_GET['edit'];
    $nama = $_GET['nama'];

    $divisi->update($id, $nama);
    header("location:divisi.php");
}

//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];

    $divisi->delete($id);
    header("location:divisi.php");
}

while(list($id_divisi, $nama_divisi) = $divisi->getResult()){

        $data .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $nama_divisi. "</td>
        <td>
        <a href='update.php?edit=" . $id_divisi .  "' class='btn btn-warning' '>Edit</a>
        <a href='divisi.php?id_hapus=" . $id_divisi . "' class='btn btn-danger' '>Hapus</a>
        </td>
        </tr>";
    
}


$divisi->close();
$tpl = new Template("templates/tabel_divisi.html");
$tpl->replace("DATA_TABEL", $data);
$tpl->write();
