<?php include(APPPATH.'views/includes/header1.php');?>
<style>
    .r_name a{
        color:#000000;
    }
    .rtt{
        display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    padding-bottom: 20px;
    }
    .qr_modal{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: #00000080;
        display: flex;
        align-items: center;
        justify-content: center;
        display:none;
    }
    .qr_div{
        width: 300px;
        border-radius: 15px;
        overflow: hidden;
    }
    .closeModal{
        background: #ffffff;
        font-size: 28px;
        position: relative;
        height: 25px;
    }
    .closeModal a{
        position: absolute;
        right: 20px;
        top: 17px;
        color: #000;
    }
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        <div class="main-content">
            <div>
					<div class="rests">
					    <div class="rtt">
							<div class="r_ttl">
								<div class="ttl">Restaurants</div>
								<div>All restaurants list</div>
							</div>
							
							<div class="conf">
							   <a class="configure" href="<?php echo ADD_RESTAURANT;?>" class="btn btn-xs btn-info">
								    <span class="lnr lnr-plus-circle"></span> Add Restaurant
								</a>
							</div>
						</div>
						<?php foreach($restaurants as $restaurant){ ?>
									<div class="rest-div">
										<div class="r_img">
											<img src="<?php echo FATHER_BASE.'../files/restaurant/img/100/'.$restaurant['restaurant_image'];?>" 
											width="100%"/>
										</div>
										<div class="r_zone">
										    <div class="r_name"><a href="<?php echo RESTAURANT_PROFILE.$restaurant['id'];?>"><?php echo $restaurant['restaurant_name'];?></a></div>
										    <div class="r_desc"><?php echo $restaurant['restaurant_description'];?></div>
										    <div class="owner_zone">
										        <div class="top-right">
                                                    <div>
                                                        <span class="user fa fa-user"></span>
                                                    </div>
                                                    <div>
                                                        <div class="nm">User Name</div>
                                                        <div class="spr"><?php echo $restaurant['owner_full_name'];?></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="lnr lnr-eye"></span> 234 Reviews
                                                </div>
										    </div>
										</div>
										<div class="conf">
										    <?php
										        $url = urlencode('https://menu.felixfood.net/?id='.$restaurant['uniq_id']);
										    ?>
										    <a href="javascript:;" class="show_qr" qr="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $url;?>&choe=UTF-8">
    									        <img src="<?php echo FATHER_BASE;?>template/img/qr.svg">
    									    </a>
										 <!--<a href="https://testcoin.online/menu/restaurant?id=<?php echo $restaurant['uniq_id'];?>" target="_blank">Configure</a>-->
										 <a class="configure" href="<?php echo UPDATE_RESTAURANT.$restaurant['id'];?>" class="btn btn-xs btn-info">
											<span class="lnr lnr-cog"></span> Customize
											</a>
											<a href="javascript:;" class="delete_rest" id="<?php echo $restaurant['uniq_id'];?>">
											    <span class="lnr lnr-trash"></span>
											</a>
										</div>
									</div>
								<?php } ?>
					</div>
					<div style='padding:20px;text-align:center;display:none;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo FATHER_BASE;?>restaurant/restaurant_list?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
					</div>
				</div>
        </div>
    </div>
</div>

<div class="qr_modal">
    <div class="qr_div">
        <div class="closeModal" style="display:flex; align-items:right;">
            <a href="javascript:;" onclick="$('.qr_modal').fadeOut();" class=""><span class="lnr lnr-cross"></span></a>
        </div>
        <img src="" class="qrImg" width="100%" />
    </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>
<script>
    $('.delete_rest').click(function(){
        if(confirm('Do you want to delete this restaurant?')){
            var id = $(this).attr('id');
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo DELETE_RESTAURANT;?>',
            data : {'id' : id},
            success : function(response){
                console.log(response)
                if(response == 'ok'){
                    $(this).parent().parent().fadeOut();
                }
            }
        })
        }
        
    })
    $('.show_qr').click(function(){
        var url = $(this).attr('qr');
        $('.qrImg').attr('src', url);
        $('.qr_modal').css('display', 'flex');
    })
</script>
