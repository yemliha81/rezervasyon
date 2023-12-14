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
        
                <a href="<?php echo CATEGORY_LIST.$m_id;?>" class="select-lang"><span class="lnr lnr-chevron-left"></span> Back</a>
        
        <div class="main-content m-t-20">
            <div>
					<div class="rests">
					    <div class="top-ttl">
    							<div class="r_ttl">
    								<div class="ttl">Food List</div>
    								
    							</div>
    							
    						</div>
						<?php foreach($foods as $key => $food){ ?>
							<div class="menu-div">
								<div class="m-left">
								    <div class="num"><?php echo (($page-1)*(20))+$key+1;?></div>
    								<div class="m_img">
    									<img src="<?php echo FATHER_BASE.'../files/food/img/100/'.$food['food_image'];?>" 
    									width="50"/>
    								</div>
    								<div class="r_zone">
    								    <div class="m_name"><a href="javascript:;"><?php echo $food['food_name_en'];?></a></div>
    								</div>
								</div>
								
								<div class="conf">
								    <a href="javascript:;" class="display_menu hide_food <?php if($food['is_hidden']=='1'){ echo 'bg_hidden'; } ?>" is_hidden="<?php echo $food['is_hidden'];?>" id="<?php echo $food['id'];?>">
									    <span class="lnr lnr-eye"></span>
									</a>
								
								    <a class="configure" href="<?php echo UPDATE_FOOD.$food['id'];?>" class="btn btn-xs btn-info">
									<span class="lnr lnr-cog"></span> Customize
									</a>
									<a href="javascript:;" class="delete_menu" id="<?php echo $food['id'];?>">
									    <span class="lnr lnr-trash"></span>
									</a>
								</div>
							</div>
						<?php } ?>
						<div class="m-b-20 form-bottom">
							<a href="<?php echo ADD_FOOD.$c_id;?>" class="btn_custom"><span class="lnr lnr-plus-circle"></span>Add Food</a>
						</div>
					</div>
					<div style='padding:20px;text-align:center;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo FOOD_LIST.$c_id;?>?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
					</div>
				</div>
        </div>
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
            url : '<?php echo '';?>',
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
    
    $('.delete_menu').click(function(){
        if(confirm('Do you want to delete this food?')){
            var id = $(this).attr('id');
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo DELETE_FOOD;?>',
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
    $('.hide_food').click(function(){
        
            var id = $(this).attr('id');
            var hidden = $(this).attr('is_hidden');
            
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo HIDE_FOOD;?>',
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
