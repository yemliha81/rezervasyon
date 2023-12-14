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
    								<div class="ttl">Dosya Ekle</div>
    								<div>Lütfen Excel Dosyası yükleyiniz</div>
    							</div>
    							
    						</div>
							<form action="<?php echo UPLOAD_EXCEL_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20 menu-form">
                                    <div>
                                        Örnek Excel dosyasını indirmek için <a href="<?php echo $_ENV['BASE_URL'];?>files/excel/ornek-urun-dosyasi.xlsx" download>BURAYA</a> tıklayınız.
                                    </div>
									<div>
    									<input class="input_style " type="file" name="upload_file" required/>
									</div>
									
									<div class="menu-form-2">
									    
    									
									</div>
								</div>
								
								<div class="m-b-20 form-bottom">
									<button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Kaydet</button>
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