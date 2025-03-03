<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CODE/Views/CSS/./ProductsAdmin.CSS">
    <title>PRODUCTS ADMIN</title>
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
        QUẢN LÝ HÀNG HOÁ
    </div>

    <?php
        if($check == true)
        {
            ?>
                <div class="notice">
                    Cập nhật thành công
                </div>
            <?php
        }
    ?>

    <form action="?act=UpdateProducts&id=<?php echo $listPro -> id_hang ?>" method="POST" enctype="multipart/form-data">
        <div class="formAdd">
            <div class="id">
                <label for="">MÃ HÀNG HOÁ</label>
                <div id="id">auto number</div>
            </div>
            <div class="name">
                <label for="">TÊN HÀNG HOÁ</label>
                <input type="text" id="name" name="name" value=" <?php echo $listPro -> name_hang ?> ">
            </div>
            <div class="price">
                <label for="">GIÁ HÀNG HOÁ</label>
                <input type="text" id="price" name="price" value=" <?php echo $listPro -> price_hang ?> " >
            </div>
            <div class="coupon">
                <label for="">MÃ GIẢM GIÁ</label>
                <input type="text" id="coupon" name="coupon" value=" <?php echo $listPro -> coupon_hang ?> ">
            </div>
            <div class="image">
                <label for="">HÌNH ẢNH</label>
                <input type="file" name="image">
                <p><?php echo $listPro -> image_hang ?></p>
            </div>
            <div class="typeOfPro">
                <label for="">LOẠI HÀNG</label>
                <select name="id_loai" id="">
                    <?php
                        foreach($listTOP as $item)
                        {
                            ?>
                                <option value="<?php echo $item -> id_loai ?>"  <?php echo ($listPro -> id_loai ==  $item -> id_loai ) ? 'selected' : '' ?> > <?php echo $item -> name_loai ?> </option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="special">
                <label for="">HÀNG ĐẶC BIỆT</label>
                <div>
                    <input type="radio" name="special" value="Đặc biệt" <?php echo ($listPro -> special_hang == 'Đặc biệt') ? 'checked' : '' ?> >
                    <label for="">Đặc biệt</label>
                    <input type="radio" name="special" value="Bình thường" <?php echo ($listPro -> special_hang == 'Bình thường') ? 'checked' : '' ?> >
                    <label for="">Bình thường</label>
                </div>
            </div>
            <div class="date">
                <label for="">NGÀY NHẬP</label>
                <input type="date" name="date" id="date" value="<?php echo $listPro -> date_hang ?>">
            </div>
            <div class="views">
                <label for="">SỐ LƯỢT XEM</label>
                <div id="views"> <?php echo isset($listPro -> view_hang) ? $listPro -> view_hang : 0 ?> </div>
            </div>
            <div class="description">
                <label for="">MÔ TẢ</label>
                <textarea id="description" name="description" rows="8"> <?php echo $listPro -> description_hang ?> </textarea>
            </div>
        </div>

        <div class="btn-func">
            <button type="submit" name="btn-update">Cập nhật</button>
            <button class="btn-rest" type="button">Nhập lại</button>
            <button type="button"><a href="?act=ListProducts">Danh sách</a></button>
        </div>
    </form>
    
</body>
</html>
<script>
    document.querySelector('.btn-rest').addEventListener('click', function()
    {
        document.querySelector('#name').value = '';
        document.querySelector('#price').value = '';
        document.querySelector('#coupon').value = '';
        document.querySelector('#date').value = '';
        document.querySelector('#description').value = '';
    })
</script>