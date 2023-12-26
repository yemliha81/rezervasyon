<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <style>
            .login{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            .welcome-div{
                display: flex;
                flex-direction: column;
                gap: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                overflow: hidden;
                padding: 30px;
                box-sizing: border-box;
                width:380px;
            }
            .welcome-msg{
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
            .welcome-div input{
                border: 0;
                border-bottom: 1px solid #ddd;
                padding: 10px;
                width: 100%;
                box-sizing: border-box;
            }
            .welcome-div .btn{
                background:#CD2C45;
                color:#FFFFFF;
                font-weight:bold;
            }
            .error{
                padding: 5px;
                font-family: arial;
                font-size: 12px;
                border-radius: 5px;
                color: #e79c9c;
                text-align: center;
            }
        </style>
        <title>YÖNETİCİ GİRİŞİ</title>
    </head>
    <body>

        <div class="login">
            <div class="welcome-div">
                <form action="<?php echo LOGIN_POST;?>" method="post">
                    <div style="margin-bottom:30px">
                        <img src="<?php echo FATHER_BASE;?>assets/img/logo-black.png" width="100%"/>
                    </div>
                    <div class="welcome-msg">
                        <div>
                            <input type="text" name="username" placeholder="Kullanıcı adı" required/> 
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Şifre" required/> 
                        </div>
                        <div>
                            <input type="submit" class="btn" value="GİRİŞ" /> 
                        </div>
                        <?php if(!empty($_SESSION['login_error'])){ unset($_SESSION['login_error']);  ?>
                        <div class="error">Kullanıcı bilgileri hatalıdır.</div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo FATHER_BASE;?>template/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo FATHER_BASE;?>template/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo FATHER_BASE;?>template/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo FATHER_BASE;?>template/js/startmin.js"></script>
    
    </body>
</html>
