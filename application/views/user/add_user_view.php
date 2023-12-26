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
    .grid-5{
        display:grid;
        grid-template-columns:1fr 4fr;
        gap:20px;
        margin-bottom:20px;
    }
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        
        <div class="main-content m-t-20">
            <div class="">
                <div class="top-ttl">
                    <div class="r_ttl">
                        <div class="ttl">Kullanıcı Ekle</div>
                        <div>Lütfen kullanıcı bilgilerini giriniz</div>
                    </div>
                </div>
                <form action="<?php echo SAVE_USER_POST;?>" method="post" enctype="multipart/form-data">
                    <div class="grid-5">
                        <div>isim :</div>
                        <div class="">
                            <input class="input_style" type="text" name="full_name" required   value=""/>
                        </div>
                        <div>Kullanıcı Adı :</div>
                        <div class="">
                            <input class="input_style" type="text" name="username"  required   value=""/>
                        </div>
                        <div>Şifre :</div>
                        <div class="">
                            <input class="input_style" type="text" name="password"   value=""/>
                        </div>
                        <div>Rol :</div>
                        <div class="">
                            <select name="role" class="input_style">
                                <option value="1">Yönetici</option>
                                <option value="2">Güvenlik</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="m-b-20 form-bottom">
                        <button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Kaydet</button>
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
        $('.summernote').summernote({
            height: 400
        });
		
	});
</script>