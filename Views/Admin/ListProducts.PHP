<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CODE/Views/CSS/./ListProducts.CSS">
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

    <div class="typeOfProduct">
        <h3>LOẠI HÀNG</h3>
        <div class="btn">
            <button type="button"> <a href="?act=ListProducts">Tất Cả</a> </button>
            <?php   
                foreach($listTOP as $item)
                {
                    ?>
                        <button type="button"> <a href="?act=ListProducts&id=<?php echo $item -> id_loai ?>"><?php echo $item -> name_loai ?></a> </button>
                    <?php
                }   
            ?>


        </div>
    </div>

    <form action="?act=DeleteDataSelectedPro" method="post">
        <div class="list" border=1>
            
            <table>
                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                    <th></th>
                    <th>MÃ HÀNG</th>
                    <th>TÊN HÀNG</th>
                    <th>ĐƠN GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>LƯỢT XEM</th>
                    <th></th>
                </tr>


                <?php
                    foreach($listPro as $pro)
                    {
                        ?>
                        <tr>
                            <td class="btn-check"><input type="checkbox" class="checkbox" name="checkboxes[]" value="<?php echo $pro -> id_hang  ?>"></td>
                            <td class="id"> <?php echo $pro -> id_hang  ?> </td>
                            <td class="name"> <?php echo $pro -> name_hang ?> </td>
                            <td class="price"> <?php echo $pro -> price_hang ?> </td>
                            <td class="coupon"> <?php echo $pro -> coupon_hang ?> % </td>
                            <td class="views"> <?php echo $pro -> view_hang ?> </td>
                            <td class="btn-setting-delete">
                                <button type="button"><a href="?act=UpdateProducts&id=<?php echo $pro -> id_hang ?>">SỬA</a></button>
                                <button type="button" onclick="confirmDeleted('?act=DeleteDataPro&id=<?php echo $pro -> id_hang?>')">XOÁ</button>
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
            <button onclick="confirmDeleted('?act=DeleteDataSelectedPro')" type="submit" name="btn-delSelected">Xoá các mục đã chọn</button>
            <button type="button"><a href="?act=Products">Nhập thêm</a></button>

            
        </div>

    </form>
    
    <div class="pagination">
        <?php
            if(isset($_GET['id']))
            {
                ?>
                    <a href="?act=ListProducts&id=<?php echo $_GET['id'] ?>&page=1">FIRST</a>
                <?php
            }else
            {
                ?>
                    <a href="?act=ListProducts&page=1">FIRST</a>
                <?php
            }
        ?>
        <?php
            for($i = 1; $i <= $total_pages; $i++)
            {
                if(isset($_GET['id']))
                {
                    ?>  
                        <a href="?act=ListProducts&id=<?php echo $_GET['id'] ?>&page=<?php echo $i ?>"> <?php echo $i  ?> </a>
                    <?php
                }else
                {
                    ?>  
                        <a href="?act=ListProducts&page=<?php echo $i ?>"> <?php echo $i  ?> </a>
                    <?php
                }
               
            }
        ?>
        <?php
            if(isset($_GET['id']))
            {
                ?>
                    <a href="?act=ListProducts&id=<?php echo $_GET['id'] ?>&page=1">LAST</a>
                <?php
            }else
            {
                ?>
                    <a href="?act=ListProducts&page= <?php echo $total_pages ?> ">LAST</a>
                <?php
            }
        ?>
    </div>

</body>
</html>

