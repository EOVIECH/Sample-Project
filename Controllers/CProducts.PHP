<?php
    require_once 'Models/MProducts.PHP';
    require_once 'Models/MTypeOfProducts.PHP';

    class CProducts
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Products();
        }

        public function Products()
        { 
            $mTOP = new TypeOfProducts();
            $listTOP = $mTOP -> getAllData();
            $mPro = new Products();
            $check = false;
            if(isset($_POST['btn-addPro']))
            {
                if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['id_loai']) ||empty($_POST['special']) || empty($_POST['date']) || empty($_POST['description']))
                {
                    return false;
                }else
                {
                    $target_dir = 'Images/';
                    $name_img = time().$_FILES['image']['name'];
                    $target_path = $target_dir . $name_img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                    $mPro -> setInsertData('',$_POST['name'],$_POST['price'],$_POST['coupon'],$target_path,$_POST['date'],$_POST['description'],$_POST['special'],0,$_POST['id_loai']);
                    $check = true;
                }
            }
            include_once 'Views/Admin/Products.PHP';
        }

        public function ListProducts()
        {
            $mPro = new Products();
            $mTOP = new TypeOfProducts();
            $listTOP = $mTOP -> getAllData();
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $per_Page = 5;
            $from_Page = ($page - 1) * $per_Page;
            $total_pages = ceil(count($mPro -> getAllData()) / $per_Page);
            // $id = isset($_GET['id']) ? $_GET['id'] : 0;
            if(isset($_GET['id']))
            {   
                $id = $_GET['id'];
                $total_pages = ceil(count($mPro -> getAllDataByIdTOP($id)) / $per_Page);
                $listPro = $mPro -> getAllDataByIdTOPLimit($id,$from_Page,$per_Page);
                include_once 'Views/Admin/ListProducts.PHP';
            }else
            {
                $listPro = $mPro -> getDataLimit($from_Page,$per_Page);
                // var_dump($listPro);
                include_once 'Views/Admin/ListProducts.PHP';
            }
        }

        public function DeleteDataSelected()
        {
            $mPro = new Products();
            if(isset($_POST['btn-delSelected']))
            {
                $deletedItems = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
                foreach($deletedItems as $deletedItem)
                {
                    $mPro -> deleteData($deletedItem);
                    header('Location: index.PHP?act=ListProducts');
                }
            }
        }

        public function DeleteData()
        {
            if(isset($_GET['id']))
            {
                $mPro = new Products();
                $id = $_GET['id'];
                $mPro -> deleteData($id);
                header('Location: index.PHP?act=ListProducts');
            }
        }

        public function UpdateData()
        {
            if(isset($_GET['id']))
            {
                $check = false;
                $id = $_GET['id'];
                $mPro = new Products();
                $mTOP = new TypeOfProducts();
                $listTOP = $mTOP -> getAllData();
                $listPro = $mPro -> getAllDataById($id);
                if(isset($_POST['btn-update']))
                {
                    if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE)
                    {
                        $target_dir = 'Images/';
                        $name_img = $_FILES['image']['name'];
                        $target_path = $target_dir . $name_img;
                        move_uploaded_file($_FILES['image']['tmp_name'],$target_path);
                    }else
                    {
                       $target_path= $listPro -> image_hang;
                    }
                    $mPro -> updateData($_POST['name'],$_POST['price'], $_POST['coupon'], $target_path, $_POST['date'],$_POST['description'], $_POST['special'], $listPro -> view_hang, $_POST['id_loai'],$id);
                    $check = true;
                }
                include_once 'Views/Admin/UpdateProducts.PHP';
            }
        }
        

    }
?>