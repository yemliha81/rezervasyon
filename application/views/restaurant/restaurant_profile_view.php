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
        
                <a href="<?php echo RESTAURANT_LIST;?>" class="select-lang"><span class="lnr lnr-chevron-left"></span> Back</a>
        
        <div class="main-content m-t-20">
            <div>
					<div class="rests">
					    <div class="rest-div">
							<div class="r_img">
								<img src="<?php echo FATHER_BASE.'../files/restaurant/img/100/'.$restaurant['restaurant_image'];?>" width="100%"/>
							</div>
							<div class="r_zone" style="justify-content:space-evenly;">
							    <div class="r_name_2"><?php echo $restaurant['restaurant_name'];?></div>
							    <div class="r_desc"><?php echo $restaurant['restaurant_description'];?></div>
							</div>
							<div class="conf">
							    <?php
							        $url = urlencode('https://testcoin.online/menu/menu?id='.$restaurant['uniq_id']);
							    ?>
							 <a class="configure" href="<?php echo UPDATE_RESTAURANT.$restaurant['id'];?>" class="btn btn-xs btn-info">
								<span class="lnr lnr-cog"></span> Customize
								</a>
								<a href="javascript:;" class="delete_rest" id="<?php echo $restaurant['uniq_id'];?>">
								    <span class="lnr lnr-trash"></span>
								</a>
							</div>
						</div>
						<?php foreach($menus as $key => $menu){ ?>
							<div class="menu-div">
								<div class="m-left">
								    <div class="num"><?php echo $key+1;?></div>
    								
    								<div class="r_zone">
    								    <div class="m_name"><a href="<?php echo CATEGORY_LIST.$menu['id'];?>"><?php echo $menu['menu_name_en'];?></a></div>
    								</div>
								</div>
								
								<div class="conf">
								    <a href="javascript:;" class="display_menu hide_menu <?php if($menu['is_hidden']=='1'){ echo 'bg_hidden'; } ?>" is_hidden="<?php echo $menu['is_hidden'];?>" id="<?php echo $menu['id'];?>">
									    <span class="lnr lnr-eye"></span>
									</a>
								
								    <a class="configure" href="<?php echo UPDATE_MENU.$menu['id'];?>" class="btn btn-xs btn-info">
									<span class="lnr lnr-cog"></span> Customize
									</a>
									<a href="javascript:;" class="delete_menu" id="<?php echo $menu['id'];?>">
									    <span class="lnr lnr-trash"></span>
									</a>
								</div>
							</div>
						<?php } ?>
						<div class="m-b-20 form-bottom">
							<a href="<?php echo ADD_MENU.$r_id;?>" class="btn_custom"><span class="lnr lnr-plus-circle"></span>Add Menu</a>
						</div>
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
        if(confirm('Do you want to delete this menu?')){
            var id = $(this).attr('id');
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo DELETE_MENU;?>',
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
    
    $('.hide_menu').click(function(){
        
            var id = $(this).attr('id');
            var hidden = $(this).attr('is_hidden');
            
        $.ajax({
            context : $(this),
            type : 'POST',
            url : '<?php echo HIDE_MENU;?>',
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
