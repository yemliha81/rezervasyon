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
		gap: 20px;
		justify-content: space-evenly;
		}
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        
        <div class="main-content m-t-20">
            <div class="">
							
							<div class="top-ttl">
    							<div class="r_ttl">
    								<div class="ttl">Kategori Güncelle</div>
    								<div></div>
    							</div>
    							
    						</div>
							<form action="<?php echo UPDATE_CATEGORY_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 menu-form">
									<div>
											
												
											<input class="input_style dropify" type="file" name="category_image"  data-default-file="<?php echo FATHER_BASE.'files/category/img/400/'.$category['category_image'];?>"/>
											
										
									</div>
									
									<div class="menu-form-2">
									
									    <div class="" >
    										
    										<input class="input_style lng en" type="text" name="category_name_en" placeholder="Category name* (EN)" required   value="<?php echo $category['category_name_en'];?>"/>

    									</div>
    									<div class="">
    										<textarea class="input_style lng en" name="category_description_en" placeholder="Category description* (EN)"><?php echo $category['category_description_en'];?></textarea>
    										
    									</div>
    									
    									
									</div>
								</div>
								
								<div class="m-b-20 form-bottom">
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Kaydet</button>
								</div>
								<input type="hidden" name="id" value="<?php echo $category['id'];?>"/>
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