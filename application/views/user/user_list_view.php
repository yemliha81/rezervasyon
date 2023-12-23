<?php include(APPPATH.'views/includes/header1.php');?>
<style>
    .menu-div{
        display: grid;
        align-items: center;
        grid-template-columns:auto 200px;
        /* margin-top: 10px; */
        /* margin-bottom: 10px; */
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
    }
    .menu-div .m-left{
        display:grid;
        align-items:center;
        grid-template-columns:50px 1fr 1fr;
        gap:20px;
        font-size: 16px;
        color: #6666666;
        font-weight: bold;
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
    								<div class="ttl">Kullanıcı Listesi</div>
    							</div>
    							
    						</div>
                            <div class="menu-div">
								<div class="m-left">
								    <div class="num">ID</div>
    								<div class="">
    									Ad - Soyad
    								</div>
                                    <div class="">
    									Kullanıcı Adı
    								</div>
								</div>
								
								<div class="conf">
								
								    
								</div>
							</div>
						<?php foreach($users as $key => $user){ ?>
							<div class="menu-div">
								<div class="m-left">
								    <div class="num"><?php echo (($page-1)*(20))+$key+1;?></div>
    								<div class="">
    									<?php echo $user['full_name'];?>
    								</div>
                                    <div class="">
    									<?php echo $user['username'];?>
    								</div>
								</div>
								
								<div class="conf">
								
								    <a class="configure" href="javascript:;" class="btn btn-xs btn-info">
									<span class="lnr lnr-cog"></span> Düzenle
									</a>
									<a href="javascript:;" class="delete_menu" id="<?php echo $user['id'];?>">
									    <span class="lnr lnr-trash"></span>
									</a>
								</div>
							</div>
						<?php } ?>
						<div class="m-b-20 form-bottom">
							
						</div>
					</div>
					<!--<div style='padding:20px;text-align:center;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo CUSTOMER_LIST.$c_id;?>?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
					</div>-->
				</div>
        </div>
    </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>
<script>
    
</script>
