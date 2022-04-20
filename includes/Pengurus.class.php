<?php

class Pengurus extends DB
{
    function getPengurus()
    {
        $query = "SELECT * FROM pengurus";
        return $this->execute($query);
    }

    function getPengurusId($id)
    {
        $query = "SELECT * FROM pengurus WHERE nim = $id";
        return $this->execute($query);
    }

    function add($data){
        
        $nim = $data['tnim'];
        $nama = $data['tnama'];
        $semester = $data['tsemester'];
        $bidang = $data['tbidang'];
        $id_divisi = $data['tid_divisi'];
        $id_jabatan = $data['tid_jabatan'];
        $foto = $data['tfoto'];

        $query = "INSERT INTO pengurus (nim, nama, semester, id_bidang, id_divisi, id_jabatan, foto_pengurus) 
                VALUES ('$nim', '$nama', '$semester', '$bidang', '$id_divisi', '$id_jabatan', '$foto')";

        return $this->execute($query);
    }

    function update($data){
        
        $nim = $data['tnim'];
        $nama = $data['tnama'];
        $semester = $data['tsemester'];
        $bidang = $data['tbidang'];
        $id_divisi = $data['tid_divisi'];
        $id_jabatan = $data['tid_jabatan'];
        $foto = $data['tfoto'];

        $query = "UPDATE pengurus SET nim = '$nim', nama = '$nama', semester =  '$semester', 
                id_bidang = '$bidang', id_divisi = '$id_divisi', id_jabatan = '$id_jabatan'; foto_pengurus = '$foto' where nim = $nim";
        return $this->execute($query);
    }

    function delete($id){
        $query = "DELETE FROM pengurus WHERE nim = $id";
        return $this->execute($query);
    }
}


?>