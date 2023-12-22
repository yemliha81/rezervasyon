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
    </style>
</head>
<body>
    <div class="check_div">
        <div class="some_text">
            Rezervasyon Bilgileri
        </div>
        <div class="check_result" >
            <div class="c_r">
                <div>Rezervasyon ID:</div>
                <div class="r_id"><?php echo $reservation['reservation_number'];?></div>
            </div>
            <div class="c_r">
                <div>Rezervasyon Tarihi:</div>
                <div class="r_date"><?php echo $reservation['start'];?></div>
            </div>
            <div class="c_r">
                <div>Kişi Sayısı</div>
                <div class="r_gsm"><?php echo $reservation['person'];?></div>
            </div>
            <div class="c_r">
                <div>Adı Soyadı</div>
                <div class="r_name"><?php echo $reservation['full_name'];?></div>
            </div>
            <div class="c_r">
                <div>Telefon</div>
                <div class="r_gsm"><?php echo $reservation['gsm'];?></div>
            </div>
        </div>
        
    </div>
</body>
</html>