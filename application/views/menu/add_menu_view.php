<?php include(APPPATH.'views/includes/header1.php');?>
<style>
    .dropify-wrapper{
        height:222px;
        padding:0;
        border:1px solid #E3E3E3;
        border-radius:10px;
    }
    .lnr-upload{
        font-size: 50px;
    }
    
    .menu-form-2{
        display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: space-evenly;
    }
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        
        <a href="<?php echo RESTAURANT_PROFILE.$restaurant_id;?>" class="select-lang"><span class="lnr lnr-chevron-left"></span> Back to Profile</a>
        
        <div class="main-content m-t-20">
            <div class="">
							
							<div class="top-ttl">
    							<div class="r_ttl">
    								<div class="ttl">Add Menu</div>
    								<div>Please enter menu information.</div>
    							</div>
    							
    						</div>
							<form action="<?php echo ADD_MENU_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 menu-form">
									
									<div class="menu-form-2">
									    <div class="">
    										
    										<input class="input_style lng en" type="text" name="menu_name_en" placeholder="Menu name* (EN)" required  />
    										<input class="input_style lng sr" style="display:none;" type="text" name="menu_name_sr" placeholder="Menu name* (SR)"   />
    									</div>
    									<div class="">
    										<textarea class="input_style lng en" name="menu_description_en" placeholder="Menu description* (EN)" required></textarea>
    										<textarea class="input_style lng sr" style="display:none;" name="menu_description_sr" placeholder="Menu description* (SR)" ></textarea>
    									</div>
    									
    									
									</div>
								</div>
								
								<div class="m-b-20 form-bottom">
								    <span>Please select language</span>
								    <a href="javascript:;" class="select-lang" lang="sr">SR</a>
								    <a href="javascript:;" class="select-lang" lang="en">EN</a>
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Save</button>
								</div>
								<input type="hidden" name="r_id" value="<?php echo $restaurant_id;?>"/>
								<input type="hidden" name="uniq_id" value="<?php echo $restaurant['uniq_id'];?>"/>
							</form>
						</div>
        </div>
    </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>

<script type="text/javascript">
	$(document).ready(function(){
		// Basic
		$('.dropify').dropify();
		$('.file-icon').addClass('lnr lnr-upload');
		$('.file-icon').removeClass('file-icon');
	});
	 $(".select-lang").click(function(){
        var lang = $(this).attr('lang')
        $('.lng').hide()
        $('.'+lang).show()
      });
     
</script>