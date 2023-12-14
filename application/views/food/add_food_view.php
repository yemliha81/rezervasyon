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
        
        <a href="<?php echo FOOD_LIST.$c_id;?>" class="select-lang"><span class="lnr lnr-chevron-left"></span> Back to Food list</a>
        
        <div class="main-content m-t-20">
            <div class="">
							
							<div class="top-ttl">
    							<div class="r_ttl">
    								<div class="ttl">Add Food</div>
    								<div>Please enter food information.</div>
    							</div>
    							
    						</div>
							<form action="<?php echo ADD_FOOD_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 menu-form">
									<div>
									    
    										
    										<input class="input_style dropify" type="file" name="food_image"/>
    										
    									
									</div>
									
									<div class="menu-form-2">
									    <div class="" style="display:grid; grid-template-columns:3fr 2fr; gap:20px;">
    										
    										<input class="input_style lng en" type="text" name="food_name_en" placeholder="Food name* (EN)" required  />
    										<input class="input_style lng sr" style="display:none;" type="text" name="food_name_sr" placeholder="Food name* (SR)" />
    										<input class="input_style" type="number" step="0.01" name="food_price" placeholder="Food price* (€)" required  />
    										
    									</div>
    									<div class="">
    										<textarea class="input_style lng en" name="food_description_en" placeholder="Food description* (EN)" required></textarea>
    										<textarea class="input_style lng sr" style="display:none;" name="food_description_sr" placeholder="Food description* (SR)" ></textarea>
    									</div>
    									
    									<div class="food-icons" style="display:flex; gap:15px">
    									    <a href="javascript:;" class="food-icon" icon="best.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/best.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/best_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/best.svg">
    									    </a>
    									    <span class="vertical-line"></span>
    									    <a href="javascript:;" class="food-icon" icon="vegetarian.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/vegetarian.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/vegetarian_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/vegetarian.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="vegan.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/vegan.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/vegan_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/vegan.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="gluten-free.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/gluten-free.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/gluten-free_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/gluten-free.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="organic.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/organic.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/organic_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/organic.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="spicy.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/spicy.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/spicy_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/spicy.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="chicken.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/chicken.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/chicken_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/chicken.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="meat.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/meat.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/meat_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/meat.svg">
    									    </a>
    									    <a href="javascript:;" class="food-icon" icon="pork.svg" 
    									    src1="<?php echo FATHER_BASE;?>template/img/icons/pork.svg"
    									    src2="<?php echo FATHER_BASE;?>template/img/icons/pork_2.svg">
    									        <img src="<?php echo FATHER_BASE;?>template/img/icons/pork.svg">
    									    </a>
    									</div>
    									<input type="hidden" class="iconsInput" name="icons" value="" />
    									
									</div>
								</div>
								
								<div class="m-b-20 form-bottom">
								    <span>Please select language</span>
								    <a href="javascript:;" class="select-lang" lang="sr">SR</a>
								    <a href="javascript:;" class="select-lang" lang="en">EN</a>
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Save</button>
								</div>
								<input type="hidden" name="category_id" value="<?php echo $c_id;?>"/>
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
      
     $(".food-icon").click(function(){
        $(this).toggleClass('act')
        
        let icons = [];
        
        
        
        $('.act').each(function(){
            var icon = $(this).attr('icon');
            icons.push(icon)
        })
        
        $(".food-icon").each(function(){
            if($(this).hasClass('act')){
                var src2 = $(this).attr('src2');
                $(this).find('img').attr('src', src2);
            }else{
                var src1 = $(this).attr('src1');
                $(this).find('img').attr('src', src1);
            }
        })
        
        
        $('.iconsInput').val(icons.join(','));
        
        
      });
      
</script>