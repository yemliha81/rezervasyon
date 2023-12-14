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
    .menu-form{
        display:grid;
        grid-template-columns:250px auto;
        gap:20px;
    }
    .menu-form-2{
        display: flex;
    flex-direction: column;
    /* gap: 20px; */
    justify-content: space-evenly;
    }
    .act{
        background:#FFF1F3;
    }
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        
        <div class="main-content m-t-20">
            <div class="">
							
							<div class="top-ttl">
    							<div class="r_ttl">
    								<div class="ttl">Hesap Güncelle</div>
    								<div>Lütfen sayfa bilgilerini giriniz</div>
    							</div>
    							
    						</div>
							<form action="<?php echo UPDATE_SOCIAL_MEDIA_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 menu-form">
									<div>
									    
    										
    										<input class="input_style dropify" type="file" name="social_media_image"  data-default-file="<?php echo FATHER_BASE.'files/social_media/img/400/'.$page['social_media_image'];?>"/>
    										
    									
									</div>
									
									<div class="menu-form-2">
									    <div class="" style="display:grid; grid-template-columns:3fr 2fr; gap:20px;">
    										
    										<input class="input_style lng en" type="text" name="name" placeholder="Hesap Adı* (EN)" required   value="<?php echo $page['name'];?>"/>
    									</div>
    									<div class="">
                                        <input class="input_style lng en" type="text" name="url" placeholder="Hesap Linki* (EN)" required   value="<?php echo $page['url'];?>"/>
    									</div>
    									
									</div>
									
								</div>
								
								<div class="m-b-20 form-bottom">
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Kaydet</button>
								</div>
								<input type="hidden" name="id" value="<?php echo $page['id'];?>"/>
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
        $('.summernote').summernote({
            height: 400
        });
		
	});
</script>