<?php

class Jabatan extends DB
{
    function getJabatan()
    {
        $query = "SELECT * FROM jabatan";
        return $this->execute($query);
    }

    function getJabatanId($id)
    {
        $query = "SELECT * FROM jabatan WHERE id_jabatan=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];

        $query = "INSERT INTO jabatan VALUES ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['tname'];
        
        $query = "UPDATE jabatan SET nama_jabatan = '$name' WHERE id_jabatan = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM jabatan WHERE id_jabatan = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }


}
