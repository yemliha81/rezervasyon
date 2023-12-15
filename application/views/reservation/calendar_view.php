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
    .modal{
      display:none;
      align-items:center;
      justify-content:center;
      position:fixed;
      top:0;
      left:0;
      bottom:0;
      right:0;
      background:#00000080;
    }
    .modalContent{
      padding:20px;
      display:flex;
      flex-direction:column;
      gap:10px;
      background:#FFFFFF;
      width:350px;
      border-radius:10px;
      position:relative;
      z-index: 1;
    }
    .customerForm{
      position:absolute;
      top:0;
      bottom:0;
      right:0;
      left:0;
      padding:20px;
      display:flex;
      flex-direction:column;
      z-index: 2;
      background:#FFFFFF;
    }
    .inp{
      width:100%;
      border:1px solid #ddd;
      border-radius:5px;
      padding:5px;
      height:44px;
    }
    .small-btn{
      display:inline-block;
      padding:5px 15px;
      border:1px solid #dddddd;
      border-radius:5px;
      margin-right:5px;
      text-decoration:none;
    }
    .bg-blue{
      background:#007bff;
      color:#FFFFFF
    }
    .bg-gray{
      background:#6c757d;
      color:#FFFFFF
    }
    label.customer{
      cursor:pointer;
    }
    .hidden{
      display:none;
    }
</style>
<div class="x-content">
    <?php include(APPPATH.'views/includes/left_nav1.php');?>

    <div class="page-content">
        <div id='calendar'></div>
    </div>
</div>
<div class="modal">
  <div class="modalContent">
    <div>
      Rezervasyon Ekle
    </div>
    <div>Müşteri <span class="customer_name"></span></div>
    <div>
      <input class="inp" type="text" placeholder="Müşteri ara"/>
    </div>
    <div>
      <div>
        <label for="m_0" class="customer" onclick="showCustomerForm()">
            <input type="radio"  name="customer_id" id="m_0" class=""> Yeni Müşteri Ekle
        </label>
      </div>
      <div>
        <label for="m_1" class="customer">
            <input type="radio" name="customer_id" id="m_1" class=""> Yemliha Demirdelen
        </label>
      </div>
      <div>
        <label for="m_2" class="customer">
            <input type="radio" name="customer_id" id="m_2" class=""> Yemliha Demirdelen 2
        </label>
      </div>
      <div>
        <label for="m_3" class="customer">
            <input type="radio" name="customer_id" id="m_3" class=""> Yemliha Demirdelen 3
        </label>
      </div>
    </div>
    <div>Kişi Sayısı</div>
    <div>
      <select class="inp" name="person" id="">
        <?php for($i=1; $i<=20; $i++){ ?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ?>
      </select>
    </div>
    <div>Başlangıç</div>
    <div>
      <input class="inp start" type="datetime-local">
    </div>
    <div>Bitiş</div>
    <div>
      <input class="inp end" type="datetime-local">
    </div>
    <div>
      <a class="small-btn bg-blue" href="">Ekle</a> <a class="small-btn bg-gray" href="">Kapat</a>
    </div>

    <div class="customerForm hidden">
      <div>
        <label for="">Adı Soyadı</label>
        <input type="text" name="full_name" class="inp full_name" placeholder="">
      </div>
      <div>
        <label for="">Telefon</label>
        <input type="text" name="gsm" class="inp gsm" placeholder="">
      </div>
      <div>
        <label for="">E-mail</label>
        <input type="text" name="email" class="inp email" placeholder="">
      </div>
      <div>
        <label for="">Doğum Tarihi</label>
        <input type="date"  name="birthday" class="inp birthday" placeholder="">
      </div>
      <div>
        <label for="">Cinsiyet</label>
        <select class="inp gender" name="gender" id="">
          <option value="Erkek">Erkek</option>
          <option value="Kadın">Kadın</option>
        </select>
      </div>
      <div>
        <a href="javascript:;" class="small-btn bg-blue" onclick="saveCustomer()">Kaydet</a>
      </div>
    </div>
  </div>
</div>

<?php include(APPPATH.'views/includes/footer.php');?>
<script src="<?php echo FATHER_BASE;?>template/js/moment.min.js"></script>
<script src="<?php echo FATHER_BASE;?>template/js/fullCalendar.js"></script>
<script src="<?php echo FATHER_BASE;?>template/js/localeTr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.jss"></script>
<script>

$(document).ready(function() {
  $(function () {
        var events =
            [{"id":"121261","title":"1 - Abdullah - 05439204041","start":"2023-12-15 20:00:00","end":"2023-12-15 23:00:00","color":"#28a745"},{"id":"657912","title":"1 - Yi\u011fit Oru\u00e7 - 05433411481","start":"2023-04-30 20:00:00","end":"2023-04-30 23:00:00","color":"#dc3545"},{"id":"664897","title":"1 - Osman Demirci - 05535787745","start":"2023-06-17 20:00:00","end":"2023-06-17 23:00:00","color":"#dc3545"},{"id":"728859","title":"1 - Do\u011fu\u015f Derman - 05462063911","start":"2023-07-21 20:00:00","end":"2023-07-21 23:00:00","color":"#dc3545"},{"id":"855896","title":"1 - Abdullah - 05439204041","start":"2023-07-21 20:00:00","end":"2023-07-21 23:00:00","color":"#dc3545"},{"id":"982317","title":"1 - Osman Demirci - 05535787745","start":"2023-06-17 20:00:00","end":"2023-06-17 23:00:00","color":"#dc3545"},{"id":"147075","title":"2 - Sinem Kayaba\u015f - 0536 603 11 94","start":"2023-05-05 20:00:00","end":"2023-05-05 23:00:00","color":"#dc3545"},{"id":"150552","title":"2 - Fatmanur Sezen - 05397257645","start":"2023-06-09 20:00:00","end":"2023-06-09 23:00:00","color":"#dc3545"},{"id":"157129","title":"2 - Yusuf Atmaca - 05354505426","start":"2023-05-06 20:00:00","end":"2023-05-06 23:00:00","color":"#dc3545"},{"id":"175979","title":"2 - \u0130rem Saltan - 05434310450","start":"2023-05-05 20:00:00","end":"2023-05-05 23:00:00","color":"#dc3545"},{"id":"231379","title":"2 - Bahad\u0131r Cansever - 05384810601","start":"2023-05-06 20:00:00","end":"2023-05-06 23:00:00","color":"#dc3545"},{"id":"253961","title":"2 - Ezgi Keskin  - 05300948562","start":"2023-05-06 20:00:00","end":"2023-05-06 23:00:00","color":"#dc3545"},{"id":"277017","title":"2 - \u00d6mer Fidan - 05426496481","start":"2023-05-20 20:00:00","end":"2023-05-20 23:00:00","color":"#dc3545"},{"id":"278606","title":"2 - Fuat S\u00fcrer - +90 (505) 824 67 38","start":"2023-07-21 20:00:00","end":"2023-07-21 23:00:00","color":"#dc3545"},{"id":"281554","title":"2 - Ay\u015feg\u00fcl \u00d6zt\u00fcrk - +90 (554) 916 57 82","start":"2023-07-21 20:00:00","end":"2023-07-21 23:00:00","color":"#dc3545"},{"id":"339039","title":"2 - Gizem Y\u0131ld\u0131z - 05061249656","start":"2023-05-16 20:00:00","end":"2023-05-16 23:00:00","color":"#dc3545"},{"id":"357782","title":"2 - Orkun Ayd\u0131n - 05322933881","start":"2023-05-06 20:00:00","end":"2023-05-06 23:00:00","color":"#dc3545"},{"id":"357866","title":"2 - Volkan Berbero\u011flu - 05334137676","start":"2023-05-07 20:00:00","end":"2023-05-07 23:00:00","color":"#dc3545"},{"id":"403586","title":"2 - Gizem Y\u0131ld\u0131z - 05061249656","start":"2023-05-16 20:00:00","end":"2023-05-16 23:00:00","color":"#dc3545"},{"id":"456739","title":"2 - \u00d6mer Fidan - 05426496481","start":"2023-05-20 20:00:00","end":"2023-05-20 23:00:00","color":"#dc3545"},{"id":"467950","title":"2 - Deniz Ate\u015f - \u202a+90\u00a0531\u00a0080\u00a066\u00a025\u202c","start":"2023-09-22 20:00:00","end":"2023-09-22 23:00:00","color":"#dc3545"}]        ;
        $('#calendar').fullCalendar({
            selectable: true,
            selectHelper: true,
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,listWeek'
            },
            events: events,

            eventRender: function (event, element) {
                element.attr('href', 'javascript:void(0);');
                element.click(function () {
                    deleteConfirm(event.id)
                });
            },
            dayClick: function (date) {
              
                var start = moment(date).add(20, 'hours');
                var end = moment(start).add(3, 'hours');
                $('.modal').css('display', 'flex');
                $('.start').val(moment(start).format('YYYY-MM-DD HH:mm'));
                $('.end').val(moment(end).format('YYYY-MM-DD HH:mm'));

                console.log(moment(start).format('YYYY-MM-DD HH:mm'))
            },
            // mobile day click open all day event
            eventDrop: function (event, delta, revertFunc) {
                var start = moment(event.start).format('YYYY-MM-DD HH:mm');
                var end = moment(event.end).format('YYYY-MM-DD HH:mm');
                $.ajax({
                    url: "includes/functions/reservation.php",
                    type: "POST",
                    data: {updateReservation: true, id: event.id, start: start, end: end},
                    success: function (data) {
                        if (data == []) {
                            noty("success", "Rezervasyon Güncellendi");
                        } else {
                            noty("error", "Rezervasyon Güncellenemedi");
                        }
                    }
                })
            },
        });
    });
});

function openModal(){
  $('.modal').css('display', 'flex');
}

function showCustomerForm(){
  $('.customerForm').removeClass('hidden');
}

function saveCustomer(){
  const full_name = $('.full_name').val();
  const email = $('.email').val();
  const birthday = $('.birthday').val();
  const gender = $('.gender').val();
  const gsm = $('.gsm').val();
  $.ajax({
      url: "<?php echo SAVE_CUSTOMER_POST;?>",
      type: "POST",
      data: {full_name: full_name, email: email, birthday: birthday, gender: gender, gsm: gsm},
      success: function (resopnse) {
          console.log(response)
      }
  })
}

</script>