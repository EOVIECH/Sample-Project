<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CODE/Views/CSS/./ListTypeOfProAdmin.CSS">
    <title>LIST TYPE OF PRODUCTS ADMIN</title>
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

    <form action="?act=DeleteDataSelected" method="post">
        <div class="list" border=1>
            
            <table>
                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>


                <?php
                    foreach($listTOP as $top)
                    {
                        ?>
                        <tr>
                            <td class="btn-check"><input type="checkbox" class="checkbox" name="checkboxes[]" value="<?php echo $top -> id_loai ?>"></td>
                            <td class="id"> <?php echo $top -> id_loai ?> </td>
                            <td class="name"> <?php echo $top -> name_loai?> </td>
                            <td class="btn-setting-delete">
                                <button type="button"><a href="?act=UpdateDataTOP&id=<?php echo $top -> id_loai ?>">SỬA</a></button>
                                <button type="button" onclick="confirmDeleted('?act=DeleteDataTOP&id=<?php echo $top -> id_loai ?>')">XOÁ</button>
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
            <button onclick="confirmDeleted('?act=DeleteDataSelectedTOP')" type="submit" name="btn-delSelected">Xoá các mục đã chọn</button>
            <button type="button"><a href="?act=TypeOfProductsAdmin">Nhập thêm</a></button>
        </div>

    </form>
</body>
</html>

