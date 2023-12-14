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
    								<div class="ttl">ÜRÜN GÜNCELLE</div>
    								<div>Lütfen ürün bilgileri giriniz</div>
    							</div>
    							
    						</div>
							<form action="<?php echo UPDATE_PRODUCT_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 menu-form">
									<div>
									    <input class="input_style dropify" type="file" name="product_image"  data-default-file="<?php echo FATHER_BASE.'files/product/img/400/'.$product['product_image'];?>"/>
    								</div>
									
									<div class="menu-form-2">
                                        <!--<div> Kategori Seçiniz</div>
                                        <div>
                                            <select class="input_style" name="category_id" required >
                                                <?php foreach($categories as $category){ ?>
                                                    <option value="<?php echo $category['id'];?>" <?php echo ($product['category_id'] == $category['id']) ? 'selected' : ''; ?> >
                                                        <?php echo $category['category_name_en'];?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>-->
									    <div class="" style="display:grid; grid-template-columns:3fr 2fr; gap:20px;">
    										
    										<input class="input_style lng en" type="text" name="product_name_en" placeholder="Ürün Adı*" required   value="<?php echo $product['product_name_en'];?>"/>
    										<input class="input_style" type="number" min="1" step=".01" name="product_price" placeholder="Ürün Puanı*" required  value="<?php echo $product['product_price'];?>" />
    									</div>
    									<div class="">
    										<textarea class="input_style lng en" name="product_description_en" placeholder="Food description* (EN)" required><?php echo $product['product_description_en'];?></textarea>
    									</div>
    									
									</div>
									
								</div>
								
								<div class="m-b-20 form-bottom">
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Kaydet</button>
								</div>
								<input type="hidden" name="id" value="<?php echo $product['id'];?>"/>
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
		
		$(".food-icon").each(function(){
            if($(this).hasClass('act')){
                var src2 = $(this).attr('src2');
                $(this).find('img').attr('src', src2);
            }else{
                var src1 = $(this).attr('src1');
                $(this).find('img').attr('src', src1);
            }
        })
		
		
	});
</script>