<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_ENV['PROJECT_NAME'];?> Yönetici Paneli</title>

    <!-- Bootstrap Core CSS -->
   <link href="<?php echo FATHER_BASE;?>template/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/morris.css" rel="stylesheet">
    <link href="<?php echo FATHER_BASE;?>template/css/style.css" rel="stylesheet">
    <link href="<?php echo FATHER_BASE;?>template/css/dropify.css" rel="stylesheet">
    <link href="<?php echo FATHER_BASE;?>template/css/fullCalendar.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo FATHER_BASE;?>template/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="<?php echo FATHER_BASE;?>template/fonts/icomoon/demo-files/demo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
	<style type="text/css">
		body{
			font-family: 'GilroyRegular', sans-serif;
			background:#FFFFFF;
		}
		a{
		    text-decoration:none !important;
		}
        div{
            box-sizing:border-box;
        }
		.page{
		    border: 1px solid #ce2c45;
            width: 25px;
            height: 25px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 3px;
            background: #fff5f5;
            color: #ce2c45;
		}
		.act{
		    background:#ce2c45;
		    color:#FFFFFF;
		    font-weight:bold;
		}
		.top-bar{
		    display: grid;
            align-items: center;
            grid-template-columns:250px auto 300px;
            gap:20px;
            height:80px;
            padding:10px;
		}
		.search-div{
            display: grid;
            align-items: center;
            gap: 20px;
            flex: auto;
            grid-template-columns: 1fr;
		}
		.search-div .search-input{
		    width: 100%;
            padding: 10px;
            border: 0;
            background: transparent;
		}
		.search-zone{
		    display: flex;
            align-items: center;
            gap: 20px;
            background: #F2F3F5;
            padding: 5px 20px;
            border-radius: 16px;
            font-size: 16px;
		}
		.top-title{
		    font-size:32px;
		}
		.x-wrapper{
		    height:100vh;
		}
		.x-content{
		    display: grid;
            grid-template-columns: 270px auto;
            height:100%;
		}
		.page-content{
		    background: #F9F2F2;
		    padding:25px;
		}
		.main-content{
		    background: #FFFFFF;
            padding: 30px;
            border-radius: 30px;
            
		}
		.l-menu{
		    display: flex;
            flex-direction: column;
            gap: 10px;
            padding-left: 10px;
            margin-top:20px;
		}
		.l-menu .left-a{
		    background: #FFFFFF;
            line-height: 1;
            height: 50px;
            display: flex;
            align-items: center;
            padding: 15px;
            gap: 10px;
            color: #767676;
            justify-content: space-between;
            box-sizing: border-box;
		}
		.menu-title{
		    font-size:20px;
		}
		.l-menu a.active{
		    background: #F7DDE1;
            color: #CD2D45;
            border-radius: 20px 0px 0px 20px;
            border-right: 4px solid #CD2D45;
		}
		a.active .fa-chevron-right{
		    font-size:14px;
		}
		.left-a .lnr{
		    font-size:30px;
		}
		.bg_hidden{
		    background:#F6F4FF;
		}
		.xflex{
		    display: flex;
            align-items: center;
            gap: 10px;
		}
		.top-right{
		    display: flex;
            gap: 10px;
            align-items: center;
            margin-right: 30px;
            justify-content: flex-end;
            position:relative;
		}
		.top-right .user-name:hover .top-right .logout{
		    display:block;
		}
		.logout{
		    position: absolute;
            display: none;
            right: 0;
            top: 46px;
            width: 145px;
            background: #fff;
            padding: 10px;
            border-radius: 10px;
		}
		.logout a{
		    display:flex;
		    align-items:center;
		    justify-content:space-between;
		    color: #666;
		}
		.nm{
		    font-size: 20px;
            font-weight: bold;
            color:#000000;
		}
		.spr{}
		span.user{
		    line-height: 1;
            display: flex;
            border: 1px solid #ce2c45;
            width: 30px;
            height: 30px;
            color: #666;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f7dde1;
            color: #ce2c45;
		}
		.delete_rest,.delete_menu{
		    display: inline-block;
            padding: 8px;
            line-height: 1;
            /* background: #e93a55; */
            color: #897777;
            border-radius: 5px;
            border: 1px solid;
            font-size:26px;
		}
		.m_name a{
		    color:#cd2c45;
		}
		.display_menu{
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 8px;
            line-height: 1;
            /* background: #e93a55; */
            border-radius: 5px;
            border: 1px solid #9178FB;
            font-size: 26px;
        }
        .display_menu .lnr{
            font-size:26px;
            color:#9178FB;
        }
	</style>
	<style>
    .rest-div{
        display:grid;
        grid-template-columns:150px auto 300px;
        gap:20px;
        
    }
    .rests{
        display:flex;
        flex-direction:column;
        gap:20px;
        min-width:600px;
        overflow:hidden;
    }
    .r_zone{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        
    }
    .rest-div{
        padding-bottom:20px;
        border-bottom:1px solid #ddd;
    }
    .r_name{
        font-size:32px;
    }
    .r_name_2{
        font-size:26px;
    }
    .r_desc{}
    .r_img{
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #CD2D45;
        height: 150px;
    }
    .top-ttl{
        border-bottom: 1px solid #DDDDDD;
        margin-bottom: 20px;
        margin-left: -30px;
        margin-right: -30px;
        padding: 0 20px 20px 30px;
    }
    .r_ttl{
        font-size: 24px;
        color: #767676;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .r_ttl .ttl{
        font-size:32px;
        font-weight:bold;
        color:#000000;
    }
    .configure{
        display: inline-flex;
        gap: 10px;
        padding: 10px;
        align-items: center;
        line-height: 1;
        /* background: #f7dde1; */
        color: #CD2D45;
        border-radius: 5px;
        border: 1px solid;
        font-size:18px;
    }
    .configure .lnr{
        font-size:26px;
    }
    .owner_zone{
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
    .conf{
        display:flex;
        align-items:center;
        justify-content: flex-end;
        gap:20px
    }
    .welcome-div{
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 38px;
        width:100%;
    }
    .add-form{
        display: grid;
        grid-template-columns: 250px auto 600px;
        gap: 40px;
    }
    .col-flex{
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }
    .btn_custom .lnr-upload{
        font-size:16px;
    }
    .form-bottom{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 15px;
    }
    .select-lang{
        display: inline-block;
        border: 1px solid #CD2C45;
        font-size: 16px;
        line-height: 1;
        padding: 10px;
        border-radius: 10px;
        background: #FFFFFF;
        color: #CD2C45;
    }
    .food-icon{
        display: inline-flex;
        border: 1px solid #CD2C45;
        font-size: 16px;
        line-height: 1;
        padding: 10px;
        border-radius: 10px;
        background: #FFFFFF;
        color: #CD2C45;
        width: 45px;
        height: 45px;
        align-items: center;
        justify-content: center;
    }
    .vertical-line{
        width: 1px;
        background: #ddd;
    }
    .subMenu{
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding-left: 55px;
    }
    .subMenuItem{}
    .subMenuItem a{
        color:#767676;
        text-decoration:none;
    }
    .subMenuItem a:hover{
        color:#000000;
        text-decoration:none;
        font-weight:bold;
    }
    .menu-icon{
        display:none;
    }
    @media screen and (max-width: 767px) {
        .main-content{
            padding:15px;
            overflow:hidden;
        }
        .top-bar{
            grid-template-columns:130px auto;
        }
        .top-title{
            display:none;
        }
        .top-right{
            margin-right:0;
        }
        .l-menu{
            display:none;
            margin:0;
            padding:0;
        }

        .x-content {
            display: grid;
            grid-template-columns: 1fr;
            height: 100%;
        }

        .search-div{
            display:none;
        }
        .menu-div{
            /*grid-template-columns: auto 80px !important;*/
        }
        .menu-div .m-left{
            grid-template-columns: 15px 1fr 1fr !important;
            font-size:16px !important;
        }
        .configure, .delete_rest, .delete_menu{
            padding:5px;
            font-size:18px;
        }
        .nm{
            font-size:13px;
        }
        .configure .lnr{
            font-size:18px;
        }
        .user-icon{
            display:none;
        }
        .menu-icon{
            font-size:38px;
            display:inline-block;
        }
        .charts{
            grid-template-columns:1fr !important;
        }
        .totals{
            grid-template-columns:1fr !important;
        }
        .r_ttl .ttl{
            font-size:16px;
        }
        .card{
            padding:7px !important;
        }
        .page-content{
            padding:10px;
            width:75%;
        }
        .modalInner{
            max-height:500px;
            overflow: auto;
        }
    }
}
</style>
</head>
<body>

<div id="wrapper" class="x-wrapper">

<div class="top-bar">
    <div style="text-align:center;">
        <div>
            <a class="" href="<?php echo FATHER_BASE;?>">
                <img src="<?php echo FATHER_BASE;?>assets/img/logo-black.png" width="80%"/>
            </a>
        </div>
    </div>
    <div class="search-div">
        <div class="top-title">
            <img src="<?php echo FATHER_BASE;?>template/img/page-lines.png" width="40px"/> <span>Yönetici Paneli</span>
        </div>
        
    </div>
    <div class="top-right">
        <div class="user-icon">
            <span class="user fa fa-user"></span>
        </div>
        <div class="user-name">
            <div class="nm"><?php echo $_SESSION['full_name'];?></div>
            <div class="spr">Admin</div>
        </div>
        <div class="logout">
            <a href="<?php echo LOGOUT;?>"><span>Çıkış</span> <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="menu-icon">
            <span class="lnr lnr-menu"></span>
        </div>
    </div>
</div>


