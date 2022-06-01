<?php 
    $sql= "SELECT advertise.*, manufactures.name as manuf_name FROM advertise JOIN manufactures on advertise.manufacturer_id = manufactures.id WHERE advertise.rules = 1";
    $result_av = mysqli_query($connect, $sql);
?>
<div class="grid">
    <div class="slider-wrap">
        <?php foreach ($result_av as $each_av) : ?>
            <div class="brands-img__wrap">
                <a href="view_brand.php?b=<?php echo $each_av['manuf_name']?>" class="brands__img">
                    <img src="admin/advertises/server/uploads/<?php echo $each_av['photo'] ?>" alt="">
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>