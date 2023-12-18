<div class="l-menu">
    <a class="left-a <?php if($menu=='1'){echo 'active';}?>" href="<?php echo FATHER_BASE;?>">
        <span class="xflex"><span class="lnr lnr-home"></span> Anasayfa</span> 
        <?php if($menu=='1'){echo '<i class="fa fa-chevron-right"></i>';}?>
    </a>
    <a class="left-a <?php if($menu=='2'){echo 'active';}?>" href="<?php echo RESERVATION_CALENDAR;?>">
        <span class="xflex"><span class="lnr lnr-calendar-full"></span> Rezervasyon</span> 
        <?php if($menu=='2'){echo '<i class="fa fa-chevron-right"></i>';}?>
    </a>
    <a class="left-a <?php if($menu=='2_1'){echo 'active';}?>" href="<?php echo 'RESERVATION_CONTROL';?>">
        <span class="xflex"><span class="lnr lnr-checkmark-circle"></span> Rezervasyon Kontrol</span> 
        <?php if($menu=='2_1'){echo '<i class="fa fa-chevron-right"></i>';}?>
    </a>
    <a class="left-a <?php if($menu=='3'){echo 'active';}?>" href="<?php echo 'CUSTOMER_LIST';?>">
        <span class="xflex"><span class="lnr lnr-users"></span> Müşteriler</span> 
        <?php if($menu=='3'){echo '<i class="fa fa-chevron-right"></i>';}?>
    </a>
    <a class="left-a <?php if($menu=='4'){echo 'active';}?>" href="<?php echo 'USER_LIST';?>">
        <span class="xflex"><span class="lnr lnr-users"></span> Kullanıcı İşlemleri</span> 
        <?php if($menu=='4'){echo '<i class="fa fa-chevron-right"></i>';}?>
    </a>
    <a class="left-a" href="<?php echo LOGOUT;?>">
        <span class="xflex"><span class="lnr lnr-exit"></span> Çıkış Yap</span> 
    </a>
</div>