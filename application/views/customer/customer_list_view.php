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
    							<div class="r_ttl" >
    								<div class="ttl">Müşteri Listesi</div>
    							</div>
    							
    						</div>
						<?php foreach($customers as $key => $customer){ ?>
							<div class="menu-div">
								<div class="m-left">
								    <div class="num"><?php echo (($page-1)*(20))+$key+1;?></div>
    								<div class="">
    									<?php echo $customer['full_name'];?>
    								</div>
    								<div class="r_zone">
    								    
    								</div>
								</div>
								
								<div class="conf">
								
								    <a class="configure" href="<?php echo UPDATE_CUSTOMER.$customer['id'];?>" class="btn btn-xs btn-info">
									    <span class="lnr lnr-cog"></span>
									</a>
									<a href="javascript:;" class="delete_menu" id="<?php echo $customer['id'];?>">
									    <span class="lnr lnr-trash"></span>
									</a>
								</div>
							</div>
						<?php } ?>
						<div class="m-b-20 form-bottom">
							
						</div>
					</div>
					<!--<div style='padding:20px;text-align:center;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo CUSTOMER_LIST.$c_id;?>?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
					</div>-->
				</div>
        </div>
    </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>   
<script>
    $('.delete_menu').click(function(){
        const id = $(this).attr('id'); 
        swal({
            title: "Emin misiniz?",
            text: "Bu Müşteriyi silmek üzeresiniz!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sil",
            cancelButtonText: "İptal",
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                $.post('<?php echo DELETE_CUSTOMER;?>',
                    {"id":id},
                    function(data, status){
                        if(status=="success"){
                        swal("Silindi!", "Müşteri silinmiştir.", "success");
                        setTimeout(function(){
                            location.reload()
                        },1000)
                        
                        }
                    });
            }
        });
        
    })
</script>
