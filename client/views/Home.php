<!-- Slider -->
        <div class="slider-with-banner">
             <div class="container">
                <div class="row">
                    <!-- Begin Slider Area -->
                    <div class="col-lg-8 col-md-8">
                        <div class="slider-area">
                            <div class="slider-active owl-carousel">
                                <?php foreach($slider as $val_slider) { 
                                    if($val_slider['Loai'] == 1){ ?>
                                    <div class="single-slide align-center-left  animation-style-01 ">
                                        <img src="public/Upload/Slider/<?php echo $val_slider['Anh'] ?>" alt="">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            
                                        </div>
                                    </div><?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="li-banner">
                            <a href="?ctrl=Product_List&act=sp&th=IP">
                                <img src="public/Upload/Slider/appleDT-390x210-1.png" alt="">
                            </a>
                        </div>
                        <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                            <a href="?ctrl=Product_List&act=sp&th=SS">
                                <img src="public/Upload/Slider/samsung-390-210-390x210.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Li Banner Area End Here -->
                </div>
            </div>
        </div>

        <!-- sản phẩm nổi bật -->
        <section class="product-area  pt-60 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm nổi bật</span>
                            </h2>
                            <ul class="li-sub-category-list">
                                <li class="active"><a href="?ctrl=Product_List&act=spnb">Xem thêm</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                        <?php foreach($data_noi_bat as $val_nb)  { 
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$val_nb['Ma_DM']."'");
                            $data_Mau = $this->Model->fetchOne("select * from sp_ton where id_SP = '".$val_nb['id']."' and So_Luong > 0");?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="?ctrl=Product<?php echo '&m='.$data_Mau['id'].'&id='.$val_nb['id'] ?>">
                                                <img src="public/Upload/Products/<?php echo $val_nb['Anh'] ?>" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker" style="background: #ff3d00;">-<?php echo $val_nb['Sale'] ?>%</span></br>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="?ctrl=category&id=<?php echo $check_DM['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <div class="comment-review">
                                                            <ul class="rating">
                                                                <li <?php echo $val_nb['Danh_Gia'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_nb['Danh_Gia'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_nb['Danh_Gia'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_nb['Danh_Gia'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_nb['Danh_Gia'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="?ctrl=Product<?php echo '&m='.$data_Mau['id'].'&id='.$val_nb['id'] ?>" ><?php echo $val_nb['Ten_SP']." - ".$val_nb['Loai'] ?></a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2"><?php echo currency_format($val_nb['Gia_Giam']) ?></span>
                                                    <span class="old-price"><?php echo currency_format($val_nb['Gia']) ?></span>
                                                </div>
                                                
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang<?php echo '&m='.$data_Mau['id'].'&id='.$val_nb['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=yeu_thic&dm=yeu_thich&id=<?php echo $val_nb['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="?" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $val_nb['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>        
        <?php foreach($data_noi_bat as $val_nb) { 
            $sp_img = $this->Model->fetchOne("select * from sp_image where id_SP = '".$val_nb['id']."'");
            $mau_sp = $this->Model->fetch("select * from sp_ton where id_SP = '".$val_nb['id']."' and So_Luong > 0");
            ?>
            <!-- Modal thông tin sản phẩm -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter<?php echo $val_nb['id'] ?>">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">

                                <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $val_nb['Anh'] ?>" alt="product image">
                                            </div>
                                            <?php if($sp_img['Anh0'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh0'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh1'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh1'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh2'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh2'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh3'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh3'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh4'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh4'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>

                                        
                                            
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            <div class="sm-image"><img src="public/Upload/Products/<?php echo $val_nb['Anh'] ?>" alt="product image thumb"></div>
                                            <?php if($sp_img['Anh0'] != null){ ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh0'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh1'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh1'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh2'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh2'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh3'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh3'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh4'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh4'] ?>" alt="product image thumb"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2><?php echo $val_nb['Ten_SP']."-".$val_nb['Loai'] ?></h2>
                                            <span class="product-details-ref">Mã: <?php echo $val_nb['Ma_SP'] ?></span>

                                            <div class="price-box pt-20">
                                            <?php if($val_nb['Sale'] > 0){ ?>
                                                <span class="new-price new-price-2"><?php echo currency_format($val_nb['Gia_Giam']) ?></span>
                                                <span class="old-price" style="text-decoration: line-through;"><?php echo currency_format($val_nb['Gia']) ?></span>
                                                <span class="discount-percentage">-<?php echo $val_nb['Sale'] ?>%</span>
                                                <?php } ?>
                                                <?php if($val_nb['Sale'] == 0){ ?>
                                                        <span class="new-price"><?php echo currency_format($val_nb['Gia']) ?></span>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    
                                                    <span></span>
                                                    <select name="Mau" class="nice-select">
                                                        <option value="0" title="Ngẫu nhiên" selected="selected">Màu Ngẫu nhiên</option>
                                                        <?php foreach($mau_sp as $val_mau){ ?>
                                                        <option value="<?php echo $val_mau['Ma_Mau'] ?>" title="<?php echo $val_mau['Ten_Mau'] ?>"><?php echo $val_mau['Ten_Mau'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            <div class="single-add-to-cart">
                                                <form action="" class="cart-quantity">
                                                    <a href="?ctrl=Product<?php echo '&m='.$mau_sp[0]['id'].'&id='.$val_nb['id'] ?>" class="add-to-cart" type="submit">Xem thêm</a>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>                    

        <!-- sản phẩm mới -->
        <section class="product-area  pt-60 pb-45">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm mới</span>
                            </h2>
                        </div>
                            
                        <div class="row">
                            <div class="product-active owl-carousel">
                        <?php foreach($data_sp_moi as $val_new) { 
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$val_new['Ma_DM']."'");
                            $data_Mau = $this->Model->fetchOne("select * from sp_ton where id_SP = '".$val_new['id']."' and So_Luong > 0");?>
                                <div class="col-lg-12">
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="?ctrl=product<?php echo '&m='.$data_Mau['id'].'&id='.$val_new['id'] ?>">
                                                <img src="public/Upload/Products/<?php echo $val_new['Anh'] ?>" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">Mới</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="?ctrl=category&id=<?php echo $val_new['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <div class="comment-review">
                                                            <ul class="rating">
                                                                <li <?php echo $val_new['Danh_Gia'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_new['Danh_Gia'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_new['Danh_Gia'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_new['Danh_Gia'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                <li <?php echo $val_new['Danh_Gia'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="?ctrl=product<?php echo '&m='.$data_Mau['id'].'&id='.$val_new['id'] ?>"><?php echo $val_new['Ten_SP']." - ".$val_new['Loai'] ?></a></h4>
                                                <?php if($val_new['Sale'] > 0){ ?>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><?php echo currency_format($val_new['Gia_Giam']) ?></span>
                                                        <span class="old-price"><?php echo currency_format($val_new['Gia']) ?></span>
                                                        <span class="discount-percentage">-<?php echo $val_new['Sale'] ?>%</span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($val_new['Sale'] == 0){ ?>
                                                    <div class="price-box">
                                                        <span class="new-price"><?php echo currency_format($val_new['Gia']) ?></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang<?php echo '&m='.$data_Mau['id'].'&id='.$val_new['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=yeu_thich&id=<?php echo $val_new['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $val_new['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php foreach($data_sp_moi as $val_moi) { 
            $sp_img = $this->Model->fetchOne("select * from sp_image where id_SP = '".$val_moi['id']."'");
            $mau_sp = $this->Model->fetch("select * from sp_ton where id_SP = '".$val_moi['id']."' and So_Luong > 0");
            ?>
            <!-- Modal thông tin sản phẩm -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter<?php echo $val_moi['id'] ?>">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">

                                <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $val_moi['Anh'] ?>" alt="product image">
                                            </div>
                                            <?php if($sp_img['Anh0'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh0'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh1'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh1'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh2'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh2'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh3'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh3'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>
                                            <?php if($sp_img['Anh4'] != null){ ?>
                                            <div class="lg-image">
                                                <img src="public/Upload/Products/<?php echo $sp_img['Anh4'] ?>" alt="product image">
                                            </div>
                                            <?php } ?>

                                        
                                            
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            <div class="sm-image"><img src="public/Upload/Products/<?php echo $val_moi['Anh'] ?>" alt="product image thumb"></div>
                                            <?php if($sp_img['Anh0'] != null){ ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh0'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh1'] != null) { echo $val_anh['Anh1']."haha" ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh1'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh2'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh2'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh3'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh3'] ?>" alt="product image thumb"></div>
                                            <?php } ?>

                                            <?php if($sp_img['Anh4'] != null) { ?>
                                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh4'] ?>" alt="product image thumb"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2><?php echo $val_moi['Ten_SP']."-".$val_moi['Loai'] ?></h2>
                                            <span class="product-details-ref">Mã: <?php echo $val_moi['Ma_SP'] ?></span>

                                            <div class="price-box pt-20">
                                            <?php if($val_moi['Sale'] > 0){ ?>
                                                    <span class="new-price new-price-2"><?php echo currency_format($val_moi['Gia_Giam']) ?></span>
                                                    <span class="old-price" style="text-decoration: line-through;"><?php echo currency_format($val_moi['Gia']) ?></span>
                                                    <span class="discount-percentage">-<?php echo $val_moi['Sale'] ?>%</span>
                                                <?php } ?>
                                                <?php if($val_moi['Sale'] == 0){ ?>
                                                        <span class="new-price"><?php echo currency_format($val_moi['Gia']) ?></span>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    
                                                    <span></span>
                                                    <select name="Mau" class="nice-select">
                                                        <option value="0" title="Ngẫu nhiên" selected="selected">Màu Ngẫu nhiên</option>
                                                        <?php foreach($mau_sp as $val_mau){ ?>
                                                        <option value="<?php echo $val_mau['Ma_Mau'] ?>" title="<?php echo $val_mau['Ten_Mau'] ?>"><?php echo $val_mau['Ten_Mau'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            <div class="single-add-to-cart">
                                                <form action="" class="cart-quantity">
                                                    <a href="?ctrl=Product<?php echo '&m='.$mau_sp[0]['id'].'&id='.$val_moi['id'] ?>" class="add-to-cart" type="submit">Xem thêm</a>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>                                               

        <!-- banner -->
        <div class="li-static-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="single-banner">
                            <a href="?ctrl=Product_List&act=sp&th=SS">
                                <img src="public/Upload/Slider/samsung-390-210-390x210.png" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="single-banner">
                            <a href="?ctrl=Product_List&act=sp&th=IP">
                                <img src="public/Upload/Slider/appleDT-390x210-1.png" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="single-banner">
                            <a href="?ctrl=Product_List&act=sp&dm=PK&th=HW">
                                <img src="public/Upload/Slider/huawei.jpg" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <?php foreach($data_dm as $val_dm) { 
            $data = $this->Model->fetch("select * from view_sp where Ma_DM = '".$val_dm['Ma_DM']."' limit 10"); 
            if(count($data)>=1){?>                                                           
            <section class="product-area  pt-60 pb-45">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span><?php echo $val_dm['Ten_DM'] ?></span>
                                </h2>
                                <ul class="li-sub-category-list">
                                    <li class="active"><a href="?ctrl=Product_List&act=sp&dm=<?php echo $val_dm['Ma_DM'] ?>">Xem thêm</a></li>
                                </ul>
                            </div>
                                
                            <div class="row">
                                <div class="product-active owl-carousel">
                            <?php foreach($data as $values) { 
                                $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$values['Ma_DM']."'");
                                $data_Mau = $this->Model->fetchOne("select * from sp_ton where id_SP = '".$values['id']."' and So_Luong > 0");?>
                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="?ctrl=product<?php echo '&m='.$data_Mau['id'].'&id='.$values['id'] ?>">
                                                    <img src="public/Upload/Products/<?php echo $values['Anh'] ?>" alt="Li's Product Image">
                                                </a>
                                                <!-- <span class="sticker">Mới</span> -->
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="?ctrl=category&id=<?php echo $values['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <div class="comment-review">
                                                                <ul class="rating">
                                                                    <li <?php echo $values['Danh_Gia'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $values['Danh_Gia'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $values['Danh_Gia'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $values['Danh_Gia'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $values['Danh_Gia'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="?ctrl=product<?php echo '&m='.$data_Mau['id'].'&id='.$values['id'] ?>"><?php echo $values['Ten_SP']." - ".$values['Loai'] ?></a></h4>
                                                    <?php if($values['Sale'] > 0){ ?>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2"><?php echo currency_format($values['Gia_Giam']) ?></span>
                                                            <span class="old-price"><?php echo currency_format($values['Gia']) ?></span>
                                                            <span class="discount-percentage">-<?php echo $values['Sale'] ?>%</span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if($values['Sale'] == 0){ ?>
                                                        <div class="price-box">
                                                            <span class="new-price"><?php echo currency_format($values['Gia']) ?></span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $values['id'] ?>">Thêm vào giỏ</a></li>
                                                        <li><a class="links-details" href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $values['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $values['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                <?php foreach($data as $val_md) { 
                    $sp_img = $this->Model->fetchOne("select * from sp_image where id = '".$val_md['id']."'");
                    $mau_sp = $this->Model->fetch("select * from sp_ton where id_SP = '".$val_md['id']."' and So_Luong > 0");
                    ?>
                    <!-- Modal thông tin sản phẩm -->
                    <div class="modal fade modal-wrapper" id="exampleModalCenter<?php echo $val_md['id'] ?>">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    <div class="modal-inner-area row">
                                        <div class="col-lg-5 col-md-6 col-sm-6">

                                        <div class="product-details-left">
                                                <div class="product-details-images slider-navigation-1">
                                                    <div class="lg-image">
                                                        <img src="public/Upload/Products/<?php echo $val_md['Anh'] ?>" alt="product image">
                                                    </div>
                                                    <?php if($sp_img['Anh0'] != null){ ?>
                                                    <div class="lg-image">
                                                        <img src="public/Upload/Products/<?php echo $sp_img['Anh0'] ?>" alt="product image">
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($sp_img['Anh1'] != null){ ?>
                                                    <div class="lg-image">
                                                        <img src="public/Upload/Products/<?php echo $sp_img['Anh1'] ?>" alt="product image">
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($sp_img['Anh2'] != null){ ?>
                                                    <div class="lg-image">
                                                        <img src="public/Upload/Products/<?php echo $sp_img['Anh2'] ?>" alt="product image">
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($sp_img['Anh3'] != null){ ?>
                                                    <div class="lg-image">
                                                        <img src="public/Upload/Products/<?php echo $sp_img['Anh3'] ?>" alt="product image">
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($sp_img['Anh4'] != null){ ?>
                                                    <div class="lg-image">
                                                        <img src="public/Upload/Products/<?php echo $sp_img['Anh4'] ?>" alt="product image">
                                                    </div>
                                                    <?php } ?>

                                                
                                                    
                                                </div>
                                                <div class="product-details-thumbs slider-thumbs-1">
                                                    <div class="sm-image"><img src="public/Upload/Products/<?php echo $val_md['Anh'] ?>" alt="product image thumb"></div>
                                                    <?php if(!$sp_img['Anh0'] != null){ ?>
                                                        <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh0'] ?>" alt="product image thumb"></div>
                                                    <?php } ?>

                                                    <?php if($sp_img['Anh1'] != null) { echo $val_anh['Anh1']."haha" ?>
                                                        <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh1'] ?>" alt="product image thumb"></div>
                                                    <?php } ?>

                                                    <?php if($sp_img['Anh2'] != null) { ?>
                                                        <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh2'] ?>" alt="product image thumb"></div>
                                                    <?php } ?>

                                                    <?php if($sp_img['Anh3'] != null) { ?>
                                                        <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh3'] ?>" alt="product image thumb"></div>
                                                    <?php } ?>

                                                    <?php if($sp_img['Anh4'] != null) { ?>
                                                        <div class="sm-image"><img src="public/Upload/Products/<?php echo $sp_img['Anh4'] ?>" alt="product image thumb"></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                                        
                                        <div class="col-lg-7 col-md-6 col-sm-6">
                                            <div class="product-details-view-content pt-60">
                                                <div class="product-info">
                                                    <h2><?php echo $val_md['Ten_SP']."-".$val_md['Loai'] ?></h2>
                                                    <span class="product-details-ref">Mã: <?php echo $val_md['Ma_SP'] ?></span>

                                                    <div class="price-box pt-20">
                                                    <?php if($val_md['Sale'] > 0){ ?>
                                                            <span class="new-price new-price-2"><?php echo currency_format($val_new['Gia_Giam']) ?></span>
                                                            <span class="old-price" style="text-decoration: line-through;"><?php echo currency_format($val_new['Gia']) ?></span>
                                                            <span class="discount-percentage">-<?php echo $val_new['Sale'] ?>%</span>
                                                        <?php } ?>
                                                        <?php if($val_md['Sale'] == 0){ ?>
                                                                <span class="new-price"><?php echo currency_format($val_md['Gia']) ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    
                                                    <div class="product-variants">
                                                        <div class="produt-variants-size">
                                                            
                                                            <span></span>
                                                            <select name="Mau" class="nice-select">
                                                                <option value="0" title="Ngẫu nhiên" selected="selected">Màu Ngẫu nhiên</option>
                                                                <?php foreach($mau_sp as $val_mau){ ?>
                                                                <option value="<?php echo $val_mau['Ma_Mau'] ?>" title="<?php echo $val_mau['Ten_Mau'] ?>"><?php echo $val_mau['Ten_Mau'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                    <div class="single-add-to-cart">
                                                        <form action="" class="cart-quantity">
                                                            <a href="?ctrl=Product<?php echo '&m='.$mau_sp[0]['id'].'&id='.$val_md['id'] ?>" class="add-to-cart" type="submit">Xem thêm</a>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            <?php } ?>  
        <?php } ?>
    
        
        

        
