<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CODE/Views/CSS/./ListCustomers.CSS">
    <title>LIST CUSTOMERS ADMIN</title>
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
        QUẢN LÝ KHÁCH HÀNG
    </div>

    <form action="?act=DeleteDataSelectedPro" method="post">
        <div class="list" border=1>
            
            <table>
                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                    <th></th>
                    <th>MÃ KHÁCH HÀNG</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>EMAIL</th>
                    <th>HÌNH ẢNH</th>
                    <th>VAI TRÒ</th>
                    <th></th>
                </tr>

                <?php
                    foreach($listCus as $cus)
                    {
                        ?>
                        <tr>
                            <td class="btn-check"><input type="checkbox" class="checkbox" name="checkboxes[]" value="<?php echo $cus -> id_khach?>"></td>
                            <td class="id"> <?php echo $cus -> id_khach  ?> </td>
                            <td class="name"> <?php echo $cus -> name_khach ?> </td>
                            <td class="email"> <?php echo $cus -> email_khach ?> </td>
                            <td class="image"> <img style="width: 50px; height: 50px;" src="<?php echo $cus -> image_khach ?>" alt=""> </td>
                            <td class="role"> <?php echo $cus -> vaitro_khach ?> </td>
                            <td class="btn-setting-delete">
                                <button type="button"><a href="?act=UpdateCustomers&id=<?php echo $cus -> id_khach ?>">SỬA</a></button>
                                <button type="button" onclick="confirmDeleted('?act=DeleteDataCus&id=<?php echo $cus -> id_khach?>')">XOÁ</button>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>


        <div class="btn-func">
            <button type="button" onclick="selectAll()">Chọn tất cả</button>
            <button type="button" onclick="deselectAll()">Bỏ chọn tất cả</button>
            <button onclick="confirmDeleted('?act=DeleteDataSelectedCus')" type="submit" name="btn-delSelected">Xoá các mục đã chọn</button>
            <button type="button"><a href="?act=Customers">Nhập thêm</a></button>
        </div>

    </form>
    
    <div class="pagination">
        <a href="?act=ListProducts&page=1">FIRST</a>
        <?php
            for($i = 1; $i <= $total_pages; $i++)
            {
                ?>
                    <a href="?act=ListProducts&page=<?php echo $i ?>"> <?php echo $i  ?> </a>
                <?php
            }
        ?>
        <a href="?act=ListProducts&page= <?php echo $total_pages ?> ">LAST</a>
    </div>

</body>
</html>

