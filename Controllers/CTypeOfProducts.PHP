<?php
    require_once 'Models/MTypeOfProducts.PHP';

    class CTypeOfProducts
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new TypeOfProducts();
        }

        public function Home()
        {
            include_once 'Views/Admin/Home.PHP';
        }
        public function TypeOfProducts()
        {
            $mTOP = new TypeOfProducts();
            $check = false;
            if(isset($_POST['btn-add']))
            {
                if(!empty($_POST['typeOfPro']))
                {
                    $_POST['typeOfPro'] = trim($_POST['typeOfPro']);
                    if(strlen($_POST['typeOfPro']) > 5)
                    {
                        $mTOP -> setInsertData('',$_POST['typeOfPro']);
                        $check = true;
                    }
                }
            }
            include_once 'Views/Admin/TypeOfProducts.PHP';
        }

        public function ListTypeOfProducts()
        {
            $mTOP = new TypeOfProducts();
            $listTOP = $mTOP -> getAllData();
            include_once 'Views/Admin/ListTOP.PHP';
        }

        public function DeleteDataSelected()
        {
            $mTOP = new TypeOfProducts();
            // $listTOP = $mTOP -> getAllData();
            // include_once 'Views/Admin/ListTOP.PHP';
            if(isset($_POST['btn-delSelected']))
            {
                $deletedItems = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
                foreach($deletedItems as $deletedItem)
                {
                    $mTOP -> deleteData($deletedItem);
                    header('Location: index.PHP?act=ListTypeOfProductsAdmin');
                }
            }
            // include_once 'Views/Admin/ListTOP.PHP';
        }

        public function DeleteData()
        {
            if(isset($_GET['id']))
            {
                $mTOP = new TypeOfProducts();
                $id = $_GET['id'];
                $mTOP -> deleteData($id);
                header('Location: index.PHP?act=ListTypeOfProductsAdmin');
            }
        }

        public function UpdateData()
        {
            if(isset($_GET['id']))
            {
                $check = false;
                $id = $_GET['id'];
                $mTOP = new TypeOfProducts();
                $listTOP = $mTOP -> getAllDataById($id);
                if(isset($_POST['btn-update']))
                {
                    $mTOP -> updateData($id, $_POST['typeOfPro']);
                    $check = true;
                }
                include_once 'Views/Admin/UpdateTOP.PHP';
            }
        }
    }
?>