<?php
    require_once 'ConnectDB.PHP';

    class Comments
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM binh_luan';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getAllDataById($id)
        {
            $sql = 'SELECT * FROM binh_luan WHERE id_comment = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }

        public function setInsertData($id, $noiDung, $id_hang, $id_khach ,$date)
        {
            $sql = 'INSERT INTO binh_luan VALUES (?,?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $noiDung, $id_hang, $id_khach ,$date]);
        }

        public function updateData($noiDung, $id_hang, $id_khach ,$date,$id)
        {
            $sql = 'UPDATE binh_luan SET noi_dung = ?, id_hang =?,id_khach =?,date_comment=? WHERE id_comment = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$noiDung, $id_hang, $id_khach ,$date,$id]);
        }

        public function deleteData($id)
        {
            $sql = 'DELETE FROM binh_luan WHERE id_comment = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id]);
        }
    }
?>