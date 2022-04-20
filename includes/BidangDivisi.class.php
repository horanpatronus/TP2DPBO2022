<?php

class BidangDivisi extends DB
{
    function getBidangDivisi()
    {
        $query = "SELECT * FROM bidang_divisi";
        return $this->execute($query);
    }

    function getBidangDivisiId($id)
    {
        $query = "SELECT * FROM bidang_divisi WHERE id_bidang = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $jabatan = $data['tjabatan'];
        $divisi = $data['tdivisi'];

        $query = "INSERT INTO bidang_divisi VALUSE ('', '$jabatan', '$divisi')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {   
        $bidang = $data['id_bidang'];
        $jabatan = $data['tjabatan'];
        $divisi = $data['tdivisi'];
        
        $query = "UPDATE bidang_divisi SET jabatan = '$jabatan', id_divisi = '$divisi' WHERE id_bidang = $bidang";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM bidang_divisi WHERE id_bidang = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }


}
