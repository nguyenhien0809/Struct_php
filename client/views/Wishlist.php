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
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">Xóa</th>
                                            <th class="li-product-thumbnail">Hình ảnh</th>
                                            <th class="cart-product-name">Tên sản phẩm</th>
                                            <th class="li-product-price">Giá</th>
                                            <th class="li-product-stock-status">Tình trạng</th>
                                            <th class="li-product-add-cart">Thêm vào giỏ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($_SESSION['yeu_thich'] as $id_sp => $sl) { 
                                            $data_yt = $this->Model->fetchOne("select * from view_sp where id = '$id_sp'");
                                            $data_sl = $this->Model->fetchOne("select id,sum(So_Luong) as So_Luong from sp_ton where id_SP = '$id_sp'");?>
                                        <tr>
                                            <td class="li-product-remove"><a href="?ctrl=Wishlist&dm=yeu_thich&act=delete&id=<?php echo $id_sp ?>"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="?ctrl=Product<?php echo '&m='.$data_sl['id'].'&id='.$id_sp ?> "><img
                                                        src="public/Upload/Products/<?php echo $data_yt['Anh'] ?>" alt="" width="150px"></a></td>
                                            <td class="li-product-name"><a href="?ctrl=Product<?php echo '&m='.$data_sl['id'].'&id='.$id_sp ?> "><?php echo $data_yt['Ten_SP'] ?></a></td>
                                            <td class="li-product-price"><span class="amount"><?php echo currency_format($data_yt['Gia_Giam']) ?></span></td>
                                            <td class="li-product-stock-status"><span class="<?php echo $data_sl['So_Luong'] > 0 ? "in-stock" : "out-stock" ?>"><?php echo $data_sl['So_Luong'] > 0 ? "Còn hàng" : "Hết hàng" ?></span>
                                            </td>
                                            <td class="li-product-add-cart"><a href="?ctrl=Wishlist&dm=gio_hang&act=add<?php echo '&m='.$data_sl['id'].'&id='.$id_sp ?>">Thêm vào giỏ</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>