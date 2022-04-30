<!-- Slider -->
        <div class="slider-with-banner">
             <div class="container">
                <div class="row">
                    <!-- Begin Slider Area -->
                    <div class="col-lg-8 col-md-8">
                        <div class="slider-area">
                            <div class="slider-active owl-carousel">
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left  animation-style-01 ">
                                    <img src="public/client/images/slider/3.jpg" alt="">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Giảm ngay <span>-20%</span> trong tuần này</h5>
                                        <h2>Samsung Galaxy S9 | S9+</h2>
                                        <h3>Giá bán chỉ còn: <span>6.000.000đ</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="shop-left-sidebar.html">Đặt hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Area End Here -->
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left animation-style-02">
                                    <img src="public/client/images/slider/2.jpg" alt="">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                        <h2>Work Desk Surface Studio 2018</h2>
                                        <h3>Starting at <span>$824.00</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Area End Here -->
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left animation-style-01 ">
                                    <img src="public/client/images/slider/1.jpg" alt="">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Giảm ngay <span>-10%</span> trong tuần này</h5>
                                        <h2>Phantom 4 Pro+ Obsidian</h2>
                                        <h3>Giá bán chỉ còn: <span>6.000.000đ</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="shop-left-sidebar.html">Đặt hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="li-banner">
                            <a href="#">
                                <img src="public/client/images/banner/1_1.jpg" alt="">
                            </a>
                        </div>
                        <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                            <a href="#">
                                <img src="public/client/images/banner/1_2.jpg" alt="">
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
                                <li class="active"><a href="?ctrl=Products&act=spnb">Xem thêm</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                        <?php foreach($data_noi_bat as $val_nb)  { 
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$val_nb['Ma_DM']."'");?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="public/Upload/Products/<?php echo $val_nb['Anh'] ?>" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker" style="background: #ff3d00;">-<?php echo $val_nb['Phan_Tram_Giam'] ?>%</span></br>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="?ctrl=category&id=<?php echo $check_DM['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                    </h5>

                                                </div>
                                                <h4><a class="product_name" href="?ctrl=Product&id=<?php echo $val_nb['id'] ?>" ><?php echo $val_nb['Ten_SP'] ?></a></h4>
                                                <div class="price-box">
                                                    <span class="Mới-price" style="text-decoration: line-through;"><?php echo currency_format($val_nb['Gia']) ?></span>
                                                </div>
                                                <div class="price-box">
                                                    <span class="Mới-price" style="color: #ff3d00;"><?php echo currency_format($val_nb['Gia_Sau']) ?></span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang&id=<?php echo $val_nb['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=yeu_thic&dm=yeu_thich&id=<?php echo $val_nb['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
                            $anh_ct_sp = $this->Model->fetchOne("select * from anh_ct_sp where id_SP = '".$val_new['id']."'");?>
                                <div class="col-lg-12">
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="?ctrl=product&id=<?php echo $val_new['id'] ?>">
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

                                                </div>
                                                <h4><a class="product_name" href="?ctrl=product&id=<?php echo $val_new['id'] ?>"><?php echo $val_new['Ten_SP'] ?></a></h4>
                                                <?php if($val_new['Phan_Tram_Giam'] > 0){ ?>
                                                    <div class="price-box">
                                                    <span class="Mới-price" style="text-decoration: line-through;"><?php echo currency_format($val_new['Gia']) ?></span>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="Mới-price" style="color: #ff3d00;"><?php echo currency_format($val_new['Gia_Sau']) ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($val_new['Phan_Tram_Giam'] == 0){ ?>
                                                    <div class="price-box">
                                                        <span class="Mới-price"><?php echo currency_format($val_new['Gia']) ?></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $val_new['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=yeu_thich&dm=yeu_thich&id=<?php echo $val_new['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
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
                                                    

        <!-- banner -->
        <div class="li-static-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="single-banner">
                            <a href="#">
                                <img src="public/client/images/banner/1_3.jpg" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="single-banner">
                            <a href="#">
                                <img src="public/client/images/banner/1_4.jpg" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="single-banner">
                            <a href="#">
                                <img src="public/client/images/banner/1_5.jpg" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- điện thoại -->
        <section class="product-area  pt-60 pb-45">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Điện thoại</span>
                            </h2>
                        </div>
                            
                        <div class="row">
                            <div class="product-active owl-carousel">
                        <?php foreach($data_dt as $val_dt) { 
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$val_dt['Ma_DM']."'");?>
                                <div class="col-lg-12">
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="?ctrl=product&id=<?php echo $val_dt['id'] ?>">
                                                <img src="public/Upload/Products/<?php echo $val_dt['Anh'] ?>" alt="Li's Product Image">
                                            </a>
                                            <!-- <span class="sticker">Mới</span> -->
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="?ctrl=category&id=<?php echo $val_dt['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                    </h5>

                                                </div>
                                                <h4><a class="product_name" href="?ctrl=product&id=<?php echo $val_dt['id'] ?>"><?php echo $val_dt['Ten_SP'] ?></a></h4>
                                                <?php if($val_new['Phan_Tram_Giam'] > 0){ ?>
                                                    <div class="price-box">
                                                    <span class="Mới-price" style="text-decoration: line-through;"><?php echo currency_format($val_dt['Gia']) ?></span>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="Mới-price" style="color: #ff3d00;"><?php echo currency_format($val_dt['Gia_Sau']) ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($val_dt['Phan_Tram_Giam'] == 0){ ?>
                                                    <div class="price-box">
                                                        <span class="Mới-price"><?php echo currency_format($val_dt['Gia']) ?></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $val_dt['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $val_dt['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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

        <!-- phụ kiện -->
        <section class="product-area  pt-60 pb-45">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Phụ kiện</span>
                            </h2>
                        </div>
                            
                        <div class="row">
                            <div class="product-active owl-carousel">
                        <?php foreach($data_pk as $val_pk) { 
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$val_pk['Ma_DM']."'");?>
                                <div class="col-lg-12">
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="?ctrl=product&id=<?php echo $val_pk['id'] ?>">
                                                <img src="public/Upload/Products/<?php echo $val_pk['Anh'] ?>" alt="Li's Product Image">
                                            </a>
                                            <!-- <span class="sticker">Mới</span> -->
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="?ctrl=category&id=<?php echo $val_pk['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                    </h5>

                                                </div>
                                                <h4><a class="product_name" href="?ctrl=product&id=<?php echo $val_pk['id'] ?>"><?php echo $val_pk['Ten_SP'] ?></a></h4>
                                                <?php if($val_pk['Phan_Tram_Giam'] > 0){ ?>
                                                    <div class="price-box">
                                                    <span class="Mới-price" style="text-decoration: line-through;"><?php echo currency_format($val_pk['Gia']) ?></span>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="Mới-price" style="color: #ff3d00;"><?php echo currency_format($val_pk['Gia_Sau']) ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($val_pk['Phan_Tram_Giam'] == 0){ ?>
                                                    <div class="price-box">
                                                        <span class="Mới-price"><?php echo currency_format($val_pk['Gia']) ?></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $val_pk['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=gio_hang&dm=yeu_thich&id=<?php echo $val_pk['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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

        <!-- sản phẩm bán chạy -->
        <section class="product-area  pt-60 pb-45">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm bán chạy</span>
                            </h2>
                        </div>
                            
                        <div class="row">
                            <div class="product-active owl-carousel">
                        <?php foreach($data_ban_chay as $val_hot) { 
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '".$val_hot['Ma_DM']."'");?>
                                <div class="col-lg-12">
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="?ctrl=product&id=<?php echo $val_hot['id'] ?>">
                                                <img src="public/Upload/Products/<?php echo $val_hot['Anh'] ?>" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">Hot</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="?ctrl=category&id=<?php echo $val_hot['Ma_DM'] ?>"><?php echo $check_DM['Ten_DM'] ?></a>
                                                    </h5>

                                                </div>
                                                <h4><a class="product_name" href="?ctrl=product&id=<?php echo $val_hot['id'] ?>"><?php echo $val_hot['Ten_SP'] ?></a></h4>
                                                <?php if($val_new['Phan_Tram_Giam'] > 0){ ?>
                                                    <div class="price-box">
                                                    <span class="Mới-price" style="text-decoration: line-through;"><?php echo currency_format($val_hot['Gia']) ?></span>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="Mới-price" style="color: #ff3d00;"><?php echo currency_format($val_hot['Gia_Sau']) ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($val_hot['Phan_Tram_Giam'] == 0){ ?>
                                                    <div class="price-box">
                                                        <span class="Mới-price"><?php echo currency_format($val_hot['Gia']) ?></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="?act=add&dm=gio_hang&dm=gio_hang&id=<?php echo $val_hot['id'] ?>">Thêm vào giỏ</a></li>
                                                    <li><a class="links-details" href="?act=add&dm=gio_hang&dm=yeu_thich&id=<?php echo $val_hot['id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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

        <?php foreach($anh_sp as $val_anh) { ?>
            <!-- Modal thông tin sản phẩm -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter<?php echo $val_anh['id_SP'] ?>">
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
                                                <img src="public/client/images/product/large-size/1.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="public/client/images/product/large-size/2.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="public/client/images/product/large-size/3.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="public/client/images/product/large-size/4.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="public/client/images/product/large-size/5.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="public/client/images/product/large-size/6.jpg" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            <div class="sm-image"><img src="public/client/images/product/small-size/1.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="public/client/images/product/small-size/2.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="public/client/images/product/small-size/3.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="public/client/images/product/small-size/4.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="public/client/images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="public/client/images/product/small-size/6.jpg" alt="product image thumb"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>Tên sản phẩm</h2>
                                            <span class="product-details-ref">Reference: demo_15</span>

                                            <div class="price-box pt-20">
                                                <span class="Mới-price Mới-price-2">2.000.000đ</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                                        </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    <label>Màu</label>
                                                    <select class="nice-select">
                                                            <option value="1" title="S" selected="selected">Xanh</option>
                                                            <option value="2" title="M">Đỏ</option>
                                                            <option value="3" title="L">Tím</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Số lượng</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Thêm vào giỏ</button>
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
