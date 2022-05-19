<?php $data_mau = $this->Model->fetchOne("select * from sp_ton where id_SP = '$id' and id = '$id_m'"); ?>
<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="?">Trang chủ</a></li>
                        <li class="active">Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if(isset($_GET['id'])){ ?>
        <div class="content-wraper">
            <div class="container">
                <div class="row single-product-area">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="public/Upload/Products/<?php echo $data['Anh'] ?>"
                                        data-gall="myGallery">
                                        <img src="public/Upload/Products/<?php echo $data['Anh'] ?>" alt="product image">
                                    </a>
                                </div>
                                <?php for ($i=0; $i < 5; $i++) { 
                                    if($data_img['Anh'.$i] != null){ ?>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="public/Upload/Products/<?php echo $data_img['Anh'.$i] ?>"
                                            data-gall="myGallery">
                                            <img src="public/Upload/Products/<?php echo $data_img['Anh'.$i] ?>" alt="product image">
                                        </a>
                                    </div><?php } ?>
                                <?php } ?>
                                
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img src="public/Upload/Products/<?php echo $data['Anh'] ?>"
                                        alt="product image thumb"></div>
                                
                                    <?php for ($i=0; $i < 5; $i++) { 
                                        if($data_img['Anh'.$i] != null){ ?>
                                        <div class="sm-image"><img src="public/Upload/Products/<?php echo $data_img['Anh'.$i] ?>"
                                            alt="product image thumb"></div><?php } ?>
                                    <?php } ?>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2><?php echo $data['Ten_SP']."-".$data['Loai'].(isset($data_mau) ? "-".$data_mau['Ten_Mau'] : '') ?></h2>
                                <span class="product-details-ref">Mã sản phẩm: <?php echo $data['Ma_SP'] ?></span>
                                <div class="comment-review">
                                    <ul class="rating">
                                        <li <?php echo $data['Danh_Gia'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $data['Danh_Gia'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $data['Danh_Gia'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $data['Danh_Gia'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $data['Danh_Gia'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <?php if($data['Sale'] > 0) {?>
                                    <div class="price-box">
                                        <span class="new-price new-price-2"><?php echo currency_format($data['Gia_Giam']) ?></span>
                                        <span class="old-price"><?php echo currency_format($data['Gia']) ?></span>
                                        <span class="discount-percentage">-<?php echo $data['Sale'] ?>%</span>
                                    </div>
                                <?php }?>
                                <?php if($data['Sale'] == 0) {?>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2"><?php echo currency_format($data['Gia']) ?></span>
                                    </div>
                                <?php }?>
                                      
                                <div class="product-variants">
                                    <div class="produt-variants-size">
                                        <select class="nice-select" onchange="location = this.value;">
                                            <?php $data_l = $this->Model->fetch("select * from san_pham where Ma_SP = '".$data['Ma_SP']."'");
                                            foreach($data_l as $val_l){ 
                                                $data_mOne = $this->Model->fetchOne("select * from sp_ton where id_SP = '".$val_l['id']."'");?>
                                            <option value="?ctrl=Product<?php echo '&m='.$data_mOne['id'].'&id='.$val_l['id'] ?>"  <?php echo $val_l['Loai'] == $data['Loai'] ? 'selected="selected"' : '' ?> ><?php echo $val_l['Loai'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="produt-variants-size">
                                        <select class="nice-select" onchange="location = this.value;">
                                            <?php 
                                            foreach($data_m as $val_m){ 
                                                if($val_m['So_Luong'] > 0){?>
                                                <option value="?ctrl=Product<?php echo '&m='.$val_m['id'].'&id='.$id ?>" <?php echo isset($data_mau) && $data_mau['id'] == $val_m['id'] ? 'selected="selected"' : '' ?> >
                                                    <?php echo $val_m['Ten_Mau'] ?>
                                                </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>


                                </div>
                                <div class="single-add-to-cart">
                                    <form action="?ctrl=Cart&act=add&dm=gio_hang<?php echo '&m='.$id_m.'&id='.$id ?>" method="post" class="cart-quantity">
                                        <div class="quantity">
                                            <label>Số lượng</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" name="So_Luong" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" <?php echo $data_mau['So_Luong'] > 1 ? '' : 'disabled' ?> type="submit"><?php echo $data_mau['So_Luong'] > 1 ? "Thêm vào giỏ" : 'Hết hàng' ?></button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="?ctrl=Product&act=add&dm=yeu_thich&id=<?php echo $id ?>"><i class="fa fa-heart-o"></i>Thêm vào
                                        yêu thích</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product-area pt-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#description"><span>Giới thiệu</span></a>
                                </li>
                                <li><a data-toggle="tab" href="#product-details"><span>Thông số sản phẩm</span></a></li>
                                <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            <span><?php echo $data['Mo_Ta'] ?></span>
                        </div>
                    </div>
                    <div id="product-details" class="tab-pane" role="tabpanel">
                        <div class="product-details-manufacturer">
                            <?php for ($i=0; $i < 8; $i++) { 
                                if($data_ts['Thong_So'.$i] != null){?>
                                <p><span><?php echo $data_ts['Thong_So'.$i] ?></span></p><?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="reviews" class="tab-pane" role="tabpanel">
                        <div class="product-reviews">
                            <div class="product-details-comment-block">
                                <?php foreach ($data_dg as  $value) { ?>
                                
                                <div class="comment-details">
                                    <div class="comment-author-infos ">
                                        <em><?php echo $value['Thoi_Gian'] ?></em>
                                    </div>
                                    <h4 class="title-block"><?php echo $value['Ho_Ten'] ?></h4>
                                    <ul class="rating">
                                        <li <?php echo $value['Rate'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['Rate'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['Rate'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['Rate'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['Rate'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <p><?php echo $value['Binh_Luan'] ?></p>
                                </div>
                                <?php } ?>
                                <div class="review-btn">
                                    <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết đánh giá!</a>
                                </div>
                                <!-- Begin Quick View | Modal Area -->
                                <div class="modal fade modal-wrapper" id="mymodal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="review-page-title">Đánh giá</h3>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-6">
                                                        <div class="li-review-product">
                                                            <img src="public/Upload/Products/<?php echo $data['Anh'] ?>" width="150px"
                                                                alt="Li's Product">
                                                            <div class="li-review-product-desc">
                                                                <p class="li-product-name"><?php echo $data['Ten_SP'] ?></p>
                                                                <p>
                                                                    
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="li-review-content">
                                                            <!-- Begin Feedback Area -->
                                                            <div class="feedback-area">
                                                                <div class="feedback">
                                                                    <h3 class="feedback-title">Phản hồi với chúng tôi</h3>
                                                                    <form action="?ctrl=Product&act=dg&id=<?php echo $data['id'] ?>" method="post">
                                                                        <p class="your-opinion">
                                                                            <label>Điểm đánh giá của bạn</label>
                                                                            <span>
                                                                                <select class="star-rating" name="rate">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <input type="hidden" name="Ma_SP" value="<?php echo $data['Ma_SP'] ?>">
                                                                        <p class="feedback-form">
                                                                            <label for="feedback">Đánh giá của bạn</label>
                                                                            <textarea id="feedback" name="comment"
                                                                                cols="45" rows="8"
                                                                                aria-required="true"></textarea>
                                                                        </p>
                                                                        <div class="feedback-input">
                                                                            <p class="feedback-form-author">
                                                                                <label for="author">Họ và Tên<span
                                                                                        class="required">*</span>
                                                                                </label>
                                                                                <input id="author" name="name"
                                                                                    value="" size="30"
                                                                                    aria-required="true" type="text">
                                                                            </p>
                                                                            <p
                                                                                class="feedback-form-author feedback-form-email">
                                                                                <label for="email">Email<span
                                                                                        class="required">*</span>
                                                                                </label>
                                                                                <input id="email" name="email" value=""
                                                                                    size="30" aria-required="true"
                                                                                    type="text">
                                                                                <span class="required"><sub>*</sub>
                                                                                    Phần bắt buộc</span>
                                                                            </p>
                                                                            <div class="feedback-btn pb-15">
                                                                                    
                                                                                <a href="#" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">Thoát</a>
                                                                                
                                                                                <input type="submit" value="Đánh giá">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Feedback Area End Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick View | Modal Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>