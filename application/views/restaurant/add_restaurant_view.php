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
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        
        <a href="<?php echo RESTAURANT_LIST;?>" class="select-lang"><span class="lnr lnr-chevron-left"></span> Back</a>
        
        <div class="main-content m-t-20">
            <div class="">
							
							<div class="top-ttl">
    							<div class="r_ttl">
    								<div class="ttl">Add Restaurant</div>
    								<div>Please enter restaurant information</div>
    							</div>
    							
    						</div>
							<form action="<?php echo ADD_RESTAURANT_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 add-form">
									<div>
									    
    										
    										<input class="input_style dropify" type="file" name="restaurant_image"/>
    										
    									
									</div>
									
									<div class="col-flex">
									    <div class="">
    										
    										<input class="input_style" type="text" name="restaurant_name" placeholder="Restoran name*" required />
    										
    									</div>
    									
    									<div class="">
    										
    											<input class="input_style" type="text" name="owner_full_name" placeholder="Admin name*" required />
    										
    									</div>
    									
    									<div class="">
    										
    											<input class="input_style" type="email" name="owner_email" placeholder="Admin e-mail*" required />
    										
    									</div>
    									
    									<div class="">
    										
    											<input class="input_style" type="text" name="password" placeholder="Admin password*" required />
    										
    									</div>
									</div>
									
									<div>
									    <div class="">
    										
    											<textarea class="input_style" 
    											name="restaurant_description" 
    											id="" cols="30" 
    											rows="10" 
    											required placeholder="Restaurant description"></textarea>
    										
    									</div>
									</div>
								</div>
								
								<div class="m-b-20 form-bottom">
								    <span>Please select language</span>
								    <a href="javascript:;" class="select-lang">SR</a>
								    <a href="javascript:;" class="select-lang">EN</a>
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Save</button>
								</div>
								
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
	$(".addVariant").click(function(){
        $(".vGrid").first().clone().appendTo(".variants");
      });
</script>