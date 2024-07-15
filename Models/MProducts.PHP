<?php
    require_once 'ConnectDB.PHP';

    class Products
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM hang_hoa';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getAllDataById($id)
        {
            $sql = 'SELECT * FROM hang_hoa WHERE id_hang = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }

        public function getDataLimit($from,$row)
        {
            $sql = 'SELECT * FROM hang_hoa LIMIT ' . (int)$from . ', ' . (int)$row;
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();   
            // echo $sql;
        }

        public function getAllDataByIdTOPLimit($id,$from,$row)
        {
            $sql = 'SELECT * FROM hang_hoa WHERE id_loai=' .(int)$id. ' LIMIT ' . (int)$from . ', ' . (int)$row;
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getAllDataByIdTOP($id)
        {
            $sql = 'SELECT * FROM hang_hoa WHERE id_loai = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id]);
        }

        public function setInsertData($id, $name, $price, $coupon ,$image, $date, $description, $special, $view, $id_loai)
        {
            $sql = 'INSERT INTO hang_hoa VALUES (?,?,?,?,?,?,?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $name, $price, $coupon ,$image, $date, $description, $special, $view, $id_loai]);
        }

        public function updateData($name, $price, $coupon ,$image, $date, $description, $special, $view, $id_loai,$id)
        {
            $sql = 'UPDATE hang_hoa SET name_hang = ?, price_hang =?,coupon_hang = ?, image_hang =?,date_hang=?, description_hang = ?, special_hang=?,view_hang=?,id_loai=? WHERE id_hang = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$name, $price, $coupon ,$image, $date, $description, $special, $view, $id_loai,$id]);
        }

        public function deleteData($id)
        {
            $sql = 'DELETE FROM hang_hoa WHERE id_hang = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id]);
        }
    }
?>