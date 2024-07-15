<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CODE/Views/CSS/./TypeOfProAdmin.CSS">
    <title>TYPE OF PRODUCTS ADMIN</title>
</head>
<body>
    <header>    
        QUẢN TRỊ WEBSITE
    </header>

    <nav>
        <a href="?act=Home">Trang chủ</a>
        <a href="?act=TypeOfProductsAdmin">Loại hàng</a>
        <a href="?act=Products">Hàng hoá</a>
        <a href="">Khách hàng</a>
        <a href="">Bình luận</a>
        <a href="">Thống kê</a>
    </nav>

    <div class="title">
        QUẢN LÝ LOẠI HÀNG
    </div>

    <?php
        if($check == true)
        {
            ?>
                <div class="notice">
                    Thêm mới thành công
                </div>
            <?php
        }
    ?>


    <div class="formAdd">

        <div class="idType">
            <label for="">Mã loại</label>
            <div class="value_idType">
                Auto Number
            </div>
        </div>

        <form action="" method="POST">
            <label for="">Tên loại</label>
            <input type="text" id="name" name="typeOfPro">
            <input type="submit" name="btn-add" value="Thêm mới">
            <button class="btn-reset"><a href="">Nhập lại</a></button>
            <button><a href="?act=ListTypeOfProductsAdmin">Danh sách</a></button>            
        </form>

    </div>
</body>
</html>
<script>
    document.querySelector('.btn-rest').addEventListener('click', function()
    {
        document.querySelector('.name').value = '';
    })
</script>