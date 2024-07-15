<?php
    require_once 'Models/MCustomers.PHP';
    // require_once 'Models/MCustomers.PHP';
    class CCustomers
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Customers();
        }

        public function Customers()
        {
            $mCus = new Customers();
            $check = false;
            if(isset($_POST['btn-addPro']))
            {
                if(empty($_POST['name']) || empty($_POST['id']) || empty($_POST['password']) ||empty($_POST['confirmPassword']) || empty($_POST['email']) || empty($_POST['role']) || empty($_POST['activate']))
                {
                    return false;
                }else
                {
                    if($_POST['password'] == $_POST['confirmPassword'])
                    {
                        $target_dir = 'Images/';
                        $name_img = time().$_FILES['image']['name'];
                        $target_path = $target_dir . $name_img;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                        $mCus -> setInsertData($_POST['id'],$_POST['name'],$_POST['password'],$_POST['email'],$target_path,$_POST['activate'],$_POST['role']);
                        $check = true;
                    }else
                    {
                        return false;
                    }
                }
            }
            include_once 'Views/Admin/Customers.PHP';
        }

        public function ListCustomers()
        {
            $mCus = new Customers();
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $per_Page = 5;
            $from_Page = ($page - 1) * $per_Page;
            $total_pages = ceil(count($mCus -> getAllData()) / $per_Page);  
            $listAllCus = $mCus -> getAllData();
            $listCus = $mCus -> getDataLimit($from_Page, $per_Page);
            include_once 'Views/Admin/ListCustomers.PHP';   
        }

        public function UpdateCustomers()
        {
            if(isset($_GET['id']))
            {
                $check = false;
                $id = $_GET['id'];
                $mCus = new Customers();
                $listCus = $mCus -> getAllDataById($id);
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
                        $target_path= $listCus -> image_khach;
                    }
                    $mCus -> updateData($_POST['name'],$_POST['password'],$_POST['email'],$target_path,$_POST['activate'],$_POST['role'],$id);
                    $check = true;
                    header('Location: ?act=ListCustomers');
                }
                include_once 'Views/Admin/UpdateCustomers.PHP';
            }
        }

        public function DeleteDataSelected()
        {
            $mCus = new Customers();
            if(isset($_POST['btn-delSelected']))
            {
                $deletedItems = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
                foreach($deletedItems as $deletedItem)
                {
                    $mCus -> deleteData($deletedItem);
                }
                // header('Location: index.PHP?act=ListCustomers');
            }
        }

        public function DeleteData()
        {
            if(isset($_GET['id']))
            {
                $mCus = new Customers();
                $id = $_GET['id'];
                $mCus -> deleteData($id);
                header('Location: index.PHP?act=ListCustomers');
            }
        }
    }
?>