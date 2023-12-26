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
                        <div class="ttl">Müşteri Güncelle</div>
                        <div>Lütfen müşteri bilgilerini giriniz</div>
                    </div>
                </div>
                <form action="<?php echo UPDATE_CUSTOMER_POST;?>" method="post" enctype="multipart/form-data">
                    <div class="grid-5">
                        <div>Ad - Soyad :</div>
                        <div class="">
                            <input class="input_style" type="text" name="full_name" required   value="<?php echo $customer['full_name'];?>"/>
                        </div>
                        <div>Telefon :</div>
                        <div class="">
                            <input class="input_style" type="text" name="gsm"  required   value="<?php echo $customer['gsm'];?>"/>
                        </div>
                        <div>E-mail :</div>
                        <div class="">
                            <input class="input_style" type="text" name="email"   value="<?php echo $customer['email'];?>"/>
                        </div>
                        <div>Doğum Günü :</div>
                        <div class="">
                            <input class="input_style" type="date" name="birthday"  value="<?php echo $customer['birthday'];?>"/>
                        </div>
                        <div>Cinsiyet :</div>
                        <div class="">
                            <select name="gender" class="input_style" id="">
                                <option value="Erkek" <?php echo ($customer['gender'] == "Erkek") ? 'selected' : '';?>>Erkek</option>
                                <option value="Kadın" <?php echo ($customer['gender'] == "Kadın") ? 'selected' : '';?>>Kadın</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="m-b-20 form-bottom">
                        <button type="submit" class="btn_custom"><span class="lnr lnr-upload"></span>Kaydet</button>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $customer['id'];?>"/>
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