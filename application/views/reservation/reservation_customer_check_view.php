<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $_ENV['PROJECT_NAME'];?> Reservation</title>
    <link rel="stylesheet" href="<?php echo FATHER_BASE;?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="<?php echo FATHER_BASE;?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo FATHER_BASE;?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo FATHER_BASE;?>assets/css/Features-Large-Icons-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo FATHER_BASE;?>assets/css/styles.css">
</head>



<body>
    <section>
        <div data-bss-parallax-bg="true" class="h-100 banner" style="background-image: url(&quot;assets/img/voq.jpeg&quot;);background-position: center;background-size: cover;">
            <div class="container h-100">
                <div class="row h-25">
                    <div class="col-md-6 col-xl-12 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div class="row">
                            <div class="col">
                                <div class="text-center d-xl-flex" style="max-width: 350px;"><img class="card-img-top voq-logo" src="<?php echo FATHER_BASE;?>assets/img/logo.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-50">
                    <div class="col-md-6 col-xl-12 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div class="row">
                            <div class="col">
                                <div class="text-center d-xl-flex" style="max-width: 350px;">
                                    <h2 class="text-uppercase fw-bold me-xl-0 pe-xl-0" style="color: var(--bs-white);" id="info_block"><i class="far fa-check-circle text-center text-success" style="font-size: 100px;"></i>Rezervasyonunuz Başarıyla Oluşturulmuştur&nbsp;</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center d-flex justify-content-center align-items-center align-content-center h-25">
                    <div class="col-md-6 col-xl-12 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div class="row text-center d-flex justify-content-center align-items-center">
                            <div class="col text-center d-flex justify-content-center align-items-center">
                                <div class="row text-center d-flex justify-content-center align-items-center">
                                    <div class="col-11 text-center d-flex justify-content-center align-items-center">
                                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary text-center d-flex flex-shrink-0 justify-content-center align-items-center align-content-center align-self-center m-auto bounce animated infinite d-inline-block bs-icon me-0" style="border-style: solid;border-color: var(--bs-indigo);background: var(--bs-border-color-translucent);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-down" style="color: var(--bs-indigo);">
                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>
                                            </svg></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4 py-xl-5">
        <div class="col-12 col-md-8 col-xl-7 text-center d-flex d-xxl-flex flex-column justify-content-start align-items-center mx-auto justify-content-xxl-center p-4">
            <div class="row" id="reservation_icon">
                <div class="col">
                    <div class="row text-center d-flex justify-content-center align-items-center">
                        <div class="col-12 offset-0 text-center d-flex justify-content-center align-items-center me-0 pe-0 ps-xl-0">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary text-center d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon me-0"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                                </svg></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-items-md-start align-items-xl-center" id="reservation_info">

                <div>
                    <h4 style="font-weight: bold;">Rezervasyon Bilgileri</h4>
                    <ul class="list-group text-start">
                        <li class="list-group-item"><span><strong>Rezervasyon Numarası: </strong><?php echo $reservation['reservation_number']; ?></span></li>
                        <li class="list-group-item"><span><strong>Adı Soyadı: </strong><?php echo $reservation['full_name']; ?></span></li>
                        <li class="list-group-item"><span><strong>Rezervasyon Tarihi:</strong> <?php echo date('d-m-Y H:i', strtotime($reservation['start'])); ?></span></li>
                        <li class="list-group-item"><span><strong>Kişi Sayısı:</strong> <?php echo $reservation['person']; ?></span></li>
                    </ul>
                </div>
            </div>
            <hr id="hr" class="my-5">
            <div class="row text-center d-xxl-flex justify-content-xxl-center align-items-xxl-center">
                <div class="col-xl-12 text-center d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center ps-xl-0 me-xl-0 pe-xl-4">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary text-center d-flex flex-shrink-0 justify-content-center align-items-center order-last d-inline-block bs-icon ms-0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="text-center d-xxl-flex justify-content-xxl-center align-items-xxl-center">
                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M512 216.3c0-6.125-2.344-12.25-7.031-16.93L482.3 176.8c-4.688-4.686-10.84-7.028-16.1-7.028s-12.31 2.343-16.1 7.028l-5.625 5.625L329.6 69.28l5.625-5.625c4.687-4.688 7.03-10.84 7.03-16.1s-2.343-12.31-7.03-16.1l-22.62-22.62C307.9 2.344 301.8 0 295.7 0s-12.15 2.344-16.84 7.031L154.2 131.5C149.6 136.2 147.2 142.3 147.2 148.5s2.344 12.25 7.031 16.94l22.62 22.62c4.688 4.688 10.84 7.031 16.1 7.031c6.156 0 12.31-2.344 16.1-7.031l5.625-5.625l113.1 113.1l-5.625 5.621c-4.688 4.688-7.031 10.84-7.031 16.1s2.344 12.31 7.031 16.1l22.62 22.62c4.688 4.688 10.81 7.031 16.94 7.031s12.25-2.344 16.94-7.031l124.5-124.6C509.7 228.5 512 222.5 512 216.3zM227.8 238.1L169.4 297.4C163.1 291.1 154.9 288 146.7 288S130.4 291.1 124.1 297.4l-114.7 114.7c-6.25 6.248-9.375 14.43-9.375 22.62s3.125 16.37 9.375 22.62l45.25 45.25C60.87 508.9 69.06 512 77.25 512s16.37-3.125 22.62-9.375l114.7-114.7c6.25-6.25 9.376-14.44 9.376-22.62c0-8.185-3.125-16.37-9.374-22.62l58.43-58.43L227.8 238.1z"></path>
                        </svg></div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-items-md-start align-items-xl-center">
                <div>
                    <h4 class="text-center" style="font-weight: bold;">Kurallar</h4>
                    <ul class="list-group text-start">
                        <li class="list-group-item"><span><i class="far fa-clock mx-2"></i>14.00-02.00 arası hizmetteyiz.</span></li>
                        <li class="list-group-item"><span><i class="far fa-calendar mx-2"></i>Rezervasyonlarımız en geç 22.00’a kadar geçerli olmaktadır.</span></li>
                        <li class="list-group-item"><span><i class="far fa-calendar-alt mx-2"></i>Etkinliğimiz olduğu günlerde 22.30’da oturma düzenimiz kalkıp bistro düzenine geçmektedir.</span></li>
                        <li class="list-group-item"><span><i class="fas fa-male mx-2"></i>Erkek misafirlerimize damsız giriş olmayıp, gelen misafirlerimizin eş sayısına önem verilmektedir.</span></li>
                    </ul>
                </div>
            </div>
            <hr class="my-5">
            <div class="row">
                <div class="col">
                    <div class="row text-center d-flex justify-content-center align-items-center">
                        <div class="col-12 offset-0 text-center d-flex justify-content-center align-items-center me-0 pe-0 ps-0">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon me-0"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin-map">
                                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"></path>
                                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"></path>
                                </svg></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                <div>
                    <h4><strong>İletişim</strong></h4>
                    <ul class="list-group text-start">
                        <li class="list-group-item"><span><i class="fas fa-phone-alt mx-2"></i><strong>Telefon: </strong><a href="tel:0850 532 3113">0850 532 3113</a></span></li>
                        <li class="list-group-item"><span><i class="fas fa-map-marker-alt mx-2"></i><strong>Adres: </strong>Kemalpaşa Mah. Yavuz Sok. No:2 İzmit/Kocaeli</span></li>
                        <li class="list-group-item"><span><i class="fab fa-instagram mx-2"></i><a href="https://instagram.com/voqizmit">@voqizmit</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo FATHER_BASE;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo FATHER_BASE;?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo FATHER_BASE;?>assets/js/bs-init.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	
	
	
	
	

	
	
	
	
	
</body>
<script src="<?php echo FATHER_BASE;?>assets/js/main.js"></script>
<script>
    // if reservation_id = 1 hide reservation_info  and reservation_icon block

    $(document).ready(function() {
        var is_deleted = <?php echo $reservation['is_deleted'] ; ?>;
        if (is_deleted == 1) {
            $("#reservation_info").attr('style','display:none !important');
            $("#reservation_icon").attr('style','display:none !important');
			$('#hr').attr('style', 'display:none !important');
            $("#info_block").empty();
            $("#info_block").append('<i class="far fa-times-circle text-center text-danger" style="font-size: 100px;"></i>Rezervasyonunuz Bulunmamaktadır&nbsp;');
        }			
    });
</script>
        
</html>