<?php

require 'admin/root.php';
$id = isset($_GET['lap_id']) ? $_GET['lap_id'] : '';

$sql =  "SELECT 
product_laptop.*,
config_laptop.name_detail as cfig_name,
config_product_laptop.values as value
FROM config_product_laptop
left JOIN config_laptop on config_laptop.id = config_product_laptop.config_laptop_id
left JOIN product_laptop on product_laptop.id = config_product_laptop.pro_laptop_id
WHERE pro_laptop_id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

$sql = "SELECT manufactures.name as brands, product_laptop.* FROM product_laptop
JOIN manufactures on manufactures.id = product_laptop.manufacturer_id
WHERE product_laptop.id = '$id'";
$result_b = mysqli_query($connect, $sql);
$brands = mysqli_fetch_array($result_b )['brands'];
?>
<div class="container">
    <div class="grid_full-width">
        <?php include './partials/menu.php' ?>
        <?php include './partials/breadcrumb.php' ?>
        <div class="grid_full-width content">
            <div class="content__brands">
                <?php include './partials/slider.php' ?>
                <div class="grid grid-cart_phone">
                    <div class="row">
                        <div class="col col-2">
                            <div class="cart_phone-img">
                                <img src="admin/product_laptop/server/uploads/<?php echo $each['photo'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col col-2">
                            <div class="cart_phone-about">
                                <h2><?php echo $each['name'] ?></h2>
                                <span>
                                    <?php foreach($result as $value): ?>
                                        <p style="padding: 5px 10px;font-size: 1.4rem;font-weight: 500;">
                                            <?php echo $value['cfig_name']?>:
                                        <span><?php echo $value['value']?></span>
                                        </p>
                                    <?php endforeach ?>
                                </span>
                                <h4>Gi??: <span><?php echo currency_format($each['price']) ?></span></h4>
                                <?php if(empty($_SESSION['id'])){ ?>
                                    <a onclick="return Onc()" href="login.php" class="cart_phone-btn">Mua ngay</a>
                                <?php } else { ?>
                                    <a class="cart_phone-btn" href="add_to_cart_lp.php?lap_id=<?php echo $each['id'] ?>">Mua ngay</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cart_phone">
                    <div class="row">
                        <div class="cart_phone-about">
                            <h3>Th??ng tin s???n ph???m:</h3>
                            <p class="cart_phone-descriptions"><?php echo $each['descriptions'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './partials/slidebar.php' ?>
        </div>
        <?php include './detail/comments.php' ?>
        <div class="footer">
            <div class="grid_full-width">
                <div class="grid">
                    <div class="row">
                        <div class="col col-4 col-mobi">
                            <div class="logo logo-bottom ml-mobi">
                                <img src="./public/img/logo2.png" alt="" class="img">
                            </div>
                            <div class="footer__text ml-mobi">
                                <p>Vietpro Academy th??nh l???p n??m 2009. Ch??ng
                                    t??i ????o t???o chuy??n s??u trong 2 l??nh v???c l?? L???p
                                    tr??nh Website & Mobile nh???m cung c???p cho th???
                                    tr?????ng CNTT Vi???t Nam nh???ng l???p tr??nh vi??n
                                    th???c s??? ch???t l?????ng, c?? kh??? n??ng l??m vi???c ?????c
                                    l???p, c??ng nh?? Team Work ??? m???i m??i tr?????ng ????i
                                    h???i s??? chuy??n nghi???p cao. </p>
                            </div>
                        </div>
                        <div class="col col-4 col-mobi">
                            <div class="footer__about">
                                <h3>?????a ch???</h3>
                            </div>
                            <div class="footer__text">
                                <p>
                                    B8A V?? V??n D??ng - Ho??ng C???u ?????ng ??a -
                                    H?? N???i
                                </p>
                                <p>
                                    S??? 25 Ng?? 178/71 - T??y S??n ?????ng ??a - H??
                                    N???i
                                </p>
                            </div>
                        </div>
                        <div class="col col-4 col-mobi">
                            <div class="footer__about">
                                <h3>D???ch v???</h3>
                            </div>
                            <div class="footer__text">
                                <p>
                                    B???o h??nh r??i v???, ng???m n?????c Care Diamond
                                </p>
                                <p>
                                    B???o h??nh Care X60 r??i v??? ng???m n?????c v???n ?????i
                                    m???i
                                </p>
                            </div>
                        </div>
                        <div class="col col-4 col-mobi">
                            <div class="footer__about">
                                <h3>Li??n h???</h3>
                            </div>
                            <div class="footer__text">
                                <p>Phone Sale: <a href="tel:+00 151515">(+84) 0988 550 5535</a></p>
                                <p>Email: <a href="mailto:vietpro.edu.vn@gmail.com">vietpro.edu.vn@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>