<?php

class Divisi extends DB
{
    function getDivisi()
    {
        $query = "SELECT * FROM divisi";
        return $this->execute($query);
    }

    function getDivisiId($id)
    {
        $query = "SELECT * FROM divisi WHERE id_divisi=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];

        $query = "INSERT INTO divisi VALUES ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['tname'];
        
        $query = "UPDATE divisi SET nama_divisi = '$name' WHERE id_divisi = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM divisi WHERE id_divisi = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }


}
