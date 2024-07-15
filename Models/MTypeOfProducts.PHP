<?php
    require_once 'ConnectDB.PHP';
    
    class TypeOfProducts
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM loai';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getAllDataById($id)
        {
            $sql = 'SELECT * FROM loai WHERE id_loai = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }


        public function setInsertData($id, $name)
        {
            $sql = 'INSERT INTO loai VALUES (?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $name]);
        }

        public function updateData($id, $name)
        {
            $sql = 'UPDATE loai SET id_loai = ?, name_loai = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $name]);
        }

        public function deleteData($id)
        {
            $sql = 'DELETE FROM loai WHERE id_loai = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id]);
        }

    }
?>