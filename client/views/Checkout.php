<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="?">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </ul>
        </div>
    </div>
</div>

<form action="?ctrl=Checkout&" method="post">
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">

                    <div class="checkbox-form">
                        <h3>Chi tiết hóa đơn</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Mã hóa đơn <span class="required">*</span></label>
                                    <input placeholder="" name="Ma_HD" readonly value="<?php echo date(" YmdHis") ?>" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Họ và tên <span class="required">*</span></label>
                                    <input placeholder="abc..." name="Ho_Ten" value="<?php echo $data['Ho_Ten'] ?>" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input name="Dia_Chi" placeholder="Địa chỉ nhận hàng..."  value="<?php echo $data['Dia_Chi'] ?>"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="SDT" type="text" value="<?php echo $data['Sdt'] ?>" placeholder="099...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Yêu cầu khác <span class="required">*</span></label>
                                    <textarea name="YeuCau" placeholder="Yêu cầu khác (không bắt buộc)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="cart-product-total">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sum = 0;
                                    if(isset($_SESSION['gio_hang'])){
                                        foreach($_SESSION['gio_hang'] as $id_sp => $sl){ 
                                            $data_sp = $this->Model->fetchOne("select * from view_sp where id = '$id_sp'");
                                            foreach($_SESSION['gio_hang'][$id_sp] as $id_m => $sll){ 
                                                $data_m = $this->Model->fetchOne("select * from sp_ton where id = '$id_m'");?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <?php echo $data_sp['Ten_SP']."-".$data_sp['Loai']."-".$data_m['Ten_Mau'] ?>
                                            <strong class="product-quantity"> ×
                                                <?php echo $sll ?>
                                            </strong>
                                        </td>
                                        <td class="cart-product-total"><span class="amount">
                                                <?php echo currency_format($data_sp['Gia_Giam'] * $sll) ?>
                                            </span></td>
                                    </tr>
                                    <?php $sum +=$data_sp['Gia_Giam'] * $sll; } ?>
                                    <?php } ?>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Thành tiền</th>
                                        <td><span class="amount">
                                                <?php echo currency_format($sum) ?>
                                            </span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng thành tiền</th>
                                        <td><strong><span class="amount">
                                                    <?php echo currency_format($sum) ?>
                                                </span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Thanh toán khi nhận hàng
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Thực hiện thanh toán của bạn khi đơn hàng được giao đến tay bạn.</p>
                                            </div>
                                            <div class="order-button-payment">
                                                <input value="Thanh toán khi nhận hàng" name="TToff" type="submit">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-20">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    VNPAY
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Thực hiện thanh toán đơn hàng của bạn qua các qua các ngân hàng
                                                    đã liên kết với VNPAY</p>
                                            </div>
                                            <div class="order-button-payment">
                                                <input value="Thanh toán qua VNPAY" name="vnpay" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>