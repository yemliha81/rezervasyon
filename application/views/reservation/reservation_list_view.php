<?php include(APPPATH.'views/includes/header1.php');?>
<style>
    .menu-div{
        display: grid;
        align-items: center;
        grid-template-columns:2fr 1fr 1fr 1fr 1fr;
        /* margin-top: 10px; */
        /* margin-bottom: 10px; */
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
    }
    .menu-div .m-left{
        display:flex;
        align-items:center;
        justify-content:flex-start;
        gap:20px;
        font-size: 26px;
        color: #cd2c45;
        font-weight: bold;
    }
    .menu-div .title{
        font-weight:bold;
        color:#000000;
    }
    .menu-div-last{
        text-align: right;
    }
    .m_img{
        border-radius: 50%;
    overflow: hidden;
    }
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        
        <div class="main-content m-t-20">
            <div>
					<div class="rests">
					    <div class="top-ttl">
    							<div class="r_ttl" >
    								<div class="ttl">Rezervasyon Listesi</div>
    							</div>
    							
    						</div>
                            <div class="menu-div">
                                <div class="title">
                                    Ad - Soyad
                                </div>
                                <div class="title">Başlangıç</div>
                                <div class="title">Bitiş</div>
                                <div class="title">Telefon</div>
                                <div class=""></div>
							</div>
						<?php foreach($reservations as $key => $reservation){ ?>
							<div class="menu-div">
                                <div class="">
                                <?php echo $reservation['full_name'];?>
                                </div>
                                <div class=""><?php echo str_replace('T',' ',$reservation['start']);?></div>
                                <div class=""><?php echo str_replace('T',' ',$reservation['end']);?></div>
                                <div class=""><?php echo $reservation['gsm'];?></div>
                                <div class="menu-div-last">
                                    <a class="configure" href="javascript:;" class="btn btn-xs btn-info">
									    <span class="lnr lnr-cog"></span>
									</a>
                                    <a href="javascript:;" class="delete_menu" id="<?php echo $reservation['id'];?>">
									    <span class="lnr lnr-trash"></span>
									</a>
                                </div>
							</div>
						<?php } ?>
						<div class="m-b-20 form-bottom">
							
						</div>
					</div>
					<div style='padding:20px;text-align:center;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo RESERVATION_LIST;?>?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
					</div>
				</div>
        </div>
    </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>
<script>

   
</script>
