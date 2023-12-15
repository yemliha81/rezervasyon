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
            <input type="radio"  name="customer_id" id="m_0" value="0"> Yeni Müşteri Ekle
        </label>
      </div>
      <?php foreach($customers as $customer){ ?>
        <div>
          <label for="m_<?php echo $customer['id'];?>" class="customer">
              <input type="radio" name="customer_id" id="m_<?php echo $customer['id'];?>" class="" value="<?php echo $customer['id'];?>"> <?php echo $customer['full_name'];?>
          </label>
        </div>
      <?php } ?>
    </div>
    <div>Kişi Sayısı</div>
    <div>
      <select class="inp person" name="person" id="">
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
      <a class="small-btn bg-blue" href="javascript:;" onclick="saveReservation()">Ekle</a> <a class="small-btn bg-gray" href="javascript:;" onclick="closeModal()">Kapat</a>
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
        <hr>
      </div>
      <div>
        <a href="javascript:;" class="small-btn bg-blue" onclick="saveCustomer()">Kaydet</a> 
        <a href="javascript:;" class="small-btn bg-gray" onclick="hideCustomerForm()">Kapat</a> 
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
        
        $('#calendar').fullCalendar({
            selectable: true,
            selectHelper: true,
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,listWeek'
            },
            events: <?php echo $events;?>,

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

function closeModal(){
  $('.modal').fadeOut();
}

function showCustomerForm(){
  $('.customerForm').removeClass('hidden');
}

function hideCustomerForm(){
  $('.customerForm').addClass('hidden');
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
          if(response == "success"){
            
          }
      }
  })
}

function saveReservation(){
  const customer_id = $('input[name=customer_id]:checked').val();
  const person = $('.person').val();
  const start = $('.start').val();
  const end = $('.end').val();
  $.ajax({
      url: "<?php echo SAVE_RESERVATION_POST;?>",
      type: "POST",
      data: {customer_id: customer_id, person: person, start: start, end: end},
      success: function (resopnse) {
        location.reload();
      }
  })
}

</script>