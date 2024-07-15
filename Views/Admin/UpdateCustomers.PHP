<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CODE/Views/CSS/./CustomersAdmin.CSS">
    <title>CUSTOMERS ADMIN</title>
</head>
<body>
    <header>    
        QUẢN TRỊ WEBSITE
    </header>

    <nav>
        <a href="?act=Home">Trang chủ</a>
        <a href="?act=TypeOfProductsAdmin">Loại hàng</a>
        <a href="?act=Products">Hàng hoá</a>
        <a href="?act=Customers">Khách hàng</a>
        <a href="">Bình luận</a>
        <a href="">Thống kê</a>
    </nav>

    <div class="title">
        QUẢN LÝ KHÁCH HÀNG
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

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="formAdd">
            <div class="id">
                <label for="">MÃ KHÁCH HÀNG</label>
                <input type="text" id="id" name="id" value=" <?php echo $listCus -> id_khach ?>">
            </div>
            <div class="name">
                <label for="">HỌ VÀ TÊN</label>
                <input type="text" id="name" name="name" value="<?php echo $listCus -> name_khach ?>">
            </div>
            <div class="password">
                <label for="">MẬT KHẨU</label>
                <input type="password" id="password" name="password" value="<?php echo $listCus -> password_khach ?>"> 
            </div>
            <div class="confirmPassword">
                <label for="">XÁC NHẬN MẬT KHẨU</label>
                <input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $listCus -> password_khach ?>">
            </div>
            <div class="image">
                <label for="">HÌNH ẢNH</label>
                <input type="file" name="image">
                <img style="width: 50px; height: 50px;" src="<?php echo $listCus -> image_khach ?>" alt="">
            </div>
            <div class="email">
                <label for="">ĐỊA CHỈ EMAIL</label>
                <input type="email" id="email" name="email" value="<?php echo $listCus -> email_khach ?>">
            </div>
            <div class="role">
                <label for="">VAI TRÒ</label>
                <div>
                    <input type="radio" name="role" value="Khách hàng" <?php echo ($listCus -> vaitro_khach == 'Khách hàng') ? 'checked' : '' ?>>
                    <label for="">Khách hàng</label>
                    <input type="radio" name="role" value="Nhân viên" <?php echo ($listCus -> vaitro_khach == 'Nhân viên') ? 'checked' : '' ?>>
                    <label for="">Nhân viên</label>
                </div>
            </div>

            <div class="activate">
                <label for="">KÍCH HOẠT</label>
                <div>
                    <input type="radio" name="activate" value="Chưa kích hoạt" <?php echo ($listCus -> kichhoat_khach == 'Chưa kích hoạt') ? 'checked' : '' ?>>
                    <label for="">Chưa kích hoạt</label>
                    <input type="radio" name="activate" value="Kích hoạt" <?php echo ($listCus -> kichhoat_khach == 'Kích hoạt') ? 'checked' : '' ?>>
                    <label for="">Kích hoạt</label>
                </div>
            </div>
        </div>

        <div class="btn-func">
            <button type="submit" name="btn-update">Cập nhật</button>
            <button class="btn-rest" type="button">Nhập lại</button>
            <button type="button"><a href="?act=ListCustomers">Danh sách</a></button>
        </div>
    </form>
    
</body>
</html>
<script>
    document.querySelector('.btn-rest').addEventListener('click', function()
    {
        document.querySelector('#id').value = '';
        document.querySelector('#name').value = '';
        document.querySelector('#password').value = '';
        document.querySelector('#confirmPassword').value = '';
        document.querySelector('#email').value = '';
    })
</script>