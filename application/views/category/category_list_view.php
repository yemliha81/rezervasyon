<?php include(APPPATH.'views/includes/header1.php');?>
<style>
    .menu-div{
        display: flex;
        align-items: center;
        justify-content: space-between;
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
    							<div class="r_ttl">
    								<div class="ttl">Kategori Listesi</div>
    								<div></div>
    							</div>
    							
    						</div>
						<?php foreach($categories as $key => $category){ ?>
							<div class="menu-div">
								<div class="m-left">
								    <div class="num"><?php echo (($page-1)*(20))+$key+1;?></div>
    								<div class="m_img">
    									<img src="<?php echo FATHER_BASE.'files/category/img/100/'.$category['category_image'];?>" 
    									width="50"/>
    								</div>
    								<div class="r_zone">
    								    <div class="m_name"><a href="javascript:;"><?php echo $category['category_name_en'];?></a></div>
    								</div>
								</div>
								
								<div class="conf">
								
								    <a class="configure" href="<?php echo UPDATE_CATEGORY.$category['id'];?>" class="btn btn-xs btn-info">
									<span class="lnr lnr-cog"></span> Customize
									</a>
									<a href="javascript:;" class="delete_menu" id="<?php echo $category['id'];?>">
									    <span class="lnr lnr-trash"></span>
									</a>
								</div>
							</div>
						<?php } ?>
						<div class="m-b-20 form-bottom">
							<a href="<?php echo ADD_CATEGORY.$c_id;?>" class="btn_custom"><span class="lnr lnr-plus-circle"></span>Kategori Ekle</a>
						</div>
					</div>
					<div style='padding:20px;text-align:center;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo CATEGORY_LIST.$c_id;?>?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
					</div>
				</div>
        </div>
    </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>
<script>
    
    
    $('.delete_menu').click(function(){
        if(confirm('Bu kategoriyi silmek istediğinizden emin misiniz')){
            var id = $(this).attr('id');
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo DELETE_CATEGORY;?>',
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
    
     $('.hide_category').click(function(){
        
            var id = $(this).attr('id');
            var hidden = $(this).attr('is_hidden');
            
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo HIDE_CATEGORY;?>',
            data : {'id' : id,'hidden' : hidden},
            success : function(response){
                
                if(hidden == '0'){
                    console.log('close')
                    $(this).addClass('bg_hidden');
                    $(this).attr('is_hidden', '1');
                }else{
                    console.log('open')
                    $(this).removeClass('bg_hidden');
                    $(this).attr('is_hidden', '0');
                }
                
            }
        })
        
        
    })
</script>
