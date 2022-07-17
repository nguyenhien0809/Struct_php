        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="?">Trang chủ</a></li>
                        <li class="active">Yêu thích</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wishlist-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <?php if(count($data) > 0){ ?>
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">Xóa</th>
                                            <th class="li-product-thumbnail">Hình ảnh</th>
                                            <th class="cart-product-name">Tên sản phẩm</th>
                                            <th class="cart-product-name">Loại</th>
                                            <th class="cart-product-name">Màu</th>
                                            <th class="li-product-price">Giá</th>
                                            <th class="li-product-stock-status">Tình trạng</th>
                                            <th class="li-product-add-cart">Thêm vào giỏ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $id_sp ) {
                                            $val_sp = $this->Model->fetchOne("select * from sp_view where id_loai = '".$id_sp['id_sp']."'");?>
                                        <tr>
                                            <td class="li-product-remove"><a href="?ctrl=Wishlist&act=delete&id=<?= $val_sp['id_loai'] ?>"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="?ctrl=Product<?= '&id='.$val_sp['id_loai'] ?> "><img
                                                        src="public/Upload/Products/<?= $val_sp['anh'] ?>" alt="" width="150px"></a></td>
                                            <td class="li-product-name"><a href="?ctrl=Product<?= '&id='.$val_sp['id_loai'] ?> "><?php echo $val_sp['ten_sp'] ?></a></td>
                                            <td class="li-product-price"><span class="amount"><?= $val_sp['loai'] ?></span></td>
                                            <td class="li-product-price"><span class="amount"><?=$val_sp['ten_mau'] ?></span></td>
                                            <td class="li-product-price"><span class="amount"><?= currency_format($val_sp['gia']) ?></span></td>
                                            <td class="li-product-stock-status"><span class="<?= $val_sp['so_luong'] > 0 ? "in-stock" : "out-stock" ?>"><?php echo $val_sp['so_luong'] > 0 ? "Còn hàng" : "Hết hàng" ?></span>
                                            </td>
                                            <td class="li-product-add-cart"><a href="?ctrl=Wishlist&dm=gio_hang&act=add<?php echo '&id='.$val_sp['id_loai'] ?>">Thêm vào giỏ</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php }
                            else {?>
                                <h3 class="text-secondary">Bạn chưa có sản phẩm yêu thích nào cả !</h3>
                                <a href="?" class="text-warning">Xem các sản phẩm ngay >></a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="" id="liveToastBtn">Show live toast</button>



        <script type="text/javascript">


        </script>