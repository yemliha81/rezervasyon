<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyon Kontrol</title>
    <script src="<?php echo FATHER_BASE;?>template/js/jquery.min.js"></script>
    <script src="<?php echo FATHER_BASE;?>template/js/moment.min.js"></script>
    <style>
        body{
            height:100dvh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#1d243d;
            font-family:'Source Sans Pro', sans-serif;
        }
        .check_div{
            width:345px;
            padding:20px;
            background:rgb( 33, 41, 66 );
            display:flex;
            flex-direction:column;
            gap:30px;
            border-radius:20px;
            border-top: 10px solid #79a6fe;
            border-bottom: 10px solid #8BD17C;
            color:#f3f3f3;
        }
        .some_text{
            padding:30px;
            box-sizing:border-box;
            text-align:center;
            display:flex;
            flex-direction:column;
            gap:30px;
        }
        .res_input{
            width: 100%;
            background: #262e49;
            border: 0;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
            color:#FFFFFF;
        }
        .check_btn{
            border: 0;
            background: #7f5feb;
            color: #dfdeee;
            border-radius: 100px;
            width: 100%;
            /* height: 49px; */
            font-size: 16px;
            transition: 0.3s;
            display: block;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            text-decoration: none;
        }
        .new_btn{
            border: 0;
            background: #851110;
            color: #FFFFFF;
            border-radius: 100px;
            width: 100%;
            font-size: 16px;
            transition: 0.3s;
            display: inline-block;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            text-decoration: none;
        }
        .c_r{
            background: #0e1552;
            padding: 10px;
            text-align: center;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .project_name{
            color: #666666
        }
    </style>
</head>
<body>
    <div class="check_div">
        <div class="some_text">
            <div>Rezervasyon Kontrol Paneli</div>
            <div class="project_name"><?php echo $_ENV['PROJECT_NAME'];?></div>
        </div>
        <div>
            <input type="text" name="" class="res_input" placeholder="Rezervasyon Numarası"/>
        </div>
        <div>
            <a class="check_btn" href="javascript:;">Kontrol Et</a>
        </div>
        <div class="check_result" style="display:none;">
            <div class="c_r">
                <div>Rezervasyon ID:</div>
                <div class="r_id"></div>
            </div>
            <div class="c_r">
                <div>Rezervasyon Tarihi:</div>
                <div class="r_date"></div>
            </div>
            <div class="c_r">
                <div>Adı Soyadı</div>
                <div class="r_name"></div>
            </div>
            <div class="c_r">
                <div>Telefon</div>
                <div class="r_gsm"></div>
            </div>
            <div>
                <a class="new_btn" href="javascript:;">Yeni Sorgu</a>
            </div>
        </div>
    </div>


<script>
    $('.check_btn').click(function(){
        const id = $('.res_input').val().trim()
        const hash = ""
        if(id != ""){
            $.get("<?php echo RESERVATION_CHECK_POST;?>"+id,
            function(data, status){
                if(status == "success"){
                    const dt = JSON.parse(data);
                    $('.r_id').text(dt.reservation_number);
                    $('.r_date').text(moment(dt.start).format('YYYY-MM-DD HH:mm'));
                    $('.r_name').text(dt.full_name);
                    $('.r_gsm').text(dt.gsm);
                    $('.check_result').fadeIn()
                }
            });
        }
        
    })
    $('.new_btn').click(function(){
        $('.r_id').text("");
        $('.r_date').text("");
        $('.r_name').text("");
        $('.r_gsm').text("");
        $('.check_result').fadeOut()
    })
</script>
</body>
</html>