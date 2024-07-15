<?php
    require_once 'ConnectDB.PHP';

    class Customers
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM khach_hang';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getAllDataById($id)
        {
            $sql = 'SELECT * FROM khach_hang WHERE id_khach = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }

        public function getDataLimit($from,$row)
        {
            $sql = 'SELECT * FROM khach_hang LIMIT ' . (int)$from . ', ' . (int)$row;
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();   
        }
        
        public function setInsertData($id, $name, $password, $email ,$image, $kichHoat, $vaitro)
        {
            $sql = 'INSERT INTO khach_hang VALUES (?,?,?,?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $name, $password, $email ,$image, $kichHoat, $vaitro]);
        }

        public function updateData($name, $password, $email ,$image, $kichHoat, $vaitro,$id)
        {
            $sql = 'UPDATE khach_hang SET name_khach = ?, password_khach =?,email_khach =?,image_khach=?, kichhoat_khach = ?, vaitro_khach=? WHERE id_khach = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$name, $password, $email ,$image, $kichHoat, $vaitro,$id]);
        }

        public function deleteData($id)
        {
            $sql = 'DELETE FROM khach_hang WHERE id_khach = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id]);
        }
    }
?>