function checkout(){
   var pickup = document.getElementById('pickup');
   var pickupValue = pickup.value;
   var pickupsplit = pickupValue.split(",");

   var checkboxes = document.querySelectorAll('#additional:checked');

   var additionalTotal = 0;

   for (var i = 0; i < checkboxes.length; i++) {
      var extraSplit = checkboxes[i].value.split(",");
      var value = parseFloat(extraSplit[1]); // Mengubah nilai menjadi tipe float
      additionalTotal += value;
    }
    var jumlah_pesanan = document.getElementById('jumlah_pesanan');
    var data_jumlah = jumlah_pesanan.getAttribute('data-data');

    if(data_jumlah > 0){
      additionalTotal = additionalTotal * data_jumlah; 
    }

    if(additionalTotal > 0){
       document.getElementById('extra_nama').innerHTML = "Extra";
      if(data_jumlah > 0){
         document.getElementById('extra_jumlah').innerHTML = 'x '+data_jumlah;
      }else{
         document.getElementById('extra_jumlah').innerHTML = 'x '+ '1';
      }
      document.getElementById('extra_harga').innerHTML = new Intl.NumberFormat('id-ID', {
         minimumFractionDigits: 0
       }).format(additionalTotal);
    }else{
      document.getElementById('extra_nama').innerHTML = "";

      document.getElementById('extra_jumlah').innerHTML = '';
      document.getElementById('extra_harga').innerHTML = '';
    }
    
   var dropout = document.getElementById('dropout');

   var hasil = document.getElementById('hasil');


   
   
   var pickupValue = pickup.value;
   var pickupsplit = pickupValue.split(",");


    if(pickupsplit[0] !== dropout.value){
       hasil.innerHTML = '<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300" role="alert"><span class="font-medium">Warning!</span> Your Drop Point Location is out Off Range, You Will Be get extra cost </div>' 
      }else if(pickupsplit[0] === dropout.value){
         hasil.innerHTML = ""
      }
      
      
   var Pricewisata = document.getElementById('priceWisata');
    var destinationPrice = document.getElementById('destinationPrice');
    var total = document.getElementById('total');
    var count  = parseInt(pickupsplit[1])  + parseInt(Pricewisata.value) + additionalTotal;
    var payment_type = document.querySelector('input[name="payment_type"]:checked');

    if(payment_type.value == 'dp'){
      dp = count * 0.5;
      document.getElementById('payment_title').innerHTML = 'Dp';

      document.getElementById('payment_value').innerHTML = 'Rp. ' + new Intl.NumberFormat('id-ID', {
         minimumFractionDigits: 0
       }).format(dp);

    }else if(payment_type.value == 'full'){
      document.getElementById('payment_title').innerHTML = '';
      document.getElementById('payment_value').innerHTML = '';
    }
   

   // destinationPrice.innerHTML = new Intl.NumberFormat('id-ID', {
   //    minimumFractionDigits: 0
   //  }).format(Pricewisata.value);

   pickupPrice.innerHTML =  new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0
    }).format(pickupsplit[1]);

   total.innerHTML = new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0
    }).format(count);

    
    

dropout.addEventListener('input', function() {

   var pickupValue = pickup.value;
   var pickupsplit = pickupValue.split(",");
   
   
    if(pickupsplit[0] !== dropout.value){
       hasil.innerHTML = '<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300" role="alert"><span class="font-medium">Warning!</span> Your Drop Point Location is out Off Range, You Will Be get extra cost</div>'
    }else if(pickupsplit[0] === dropout.value){
       hasil.innerHTML = ""

    }
});


}



function Agree(){

   var Agree = document.querySelectorAll('#agree:checked');
   if (Agree.length === 1) {
      document.getElementById('submit').removeAttribute('disabled');
   } else if (Agree.length === 0) {
      document.getElementById('submit').setAttribute('disabled', 'disabled');
   }
}





// var destinationPrice = document.getElementById('destinationPrice');
// var pickupPrice = document.getElementById('pickupPrice');
// var Pricewisata = document.getElementById('priceWisata');
// var total = document.getElementById('total');





// var count  = parseInt(pickupsplit[1])  + parseInt(priceWisata.value);


// destinationPrice.innerHTML = Pricewisata.value;
// pickupPrice.innerHTML = pickupsplit[1];
// total.innerHTML = count;

// pickup.addEventListener('input', function(){
   //     pickupPrice.innerHTML = pickupsplit[1];
//     total.innerHTML = count;
// });



//show password


var viewBookingButtons = document.querySelectorAll('.view_booking');


viewBookingButtons.forEach(function(button) {
    button.addEventListener('click', function() {

        var targetId = this.getAttribute('data-target');
        var viewBookingArea = document.getElementById(targetId);
        var eye_open = document.querySelector('.eye_open_'+targetId);   
        var eye_close = document.querySelector('.eye_close_'+targetId);   

        if (viewBookingArea.classList.contains('hidden')) {
            viewBookingArea.classList.remove('hidden');
            viewBookingArea.classList.add('open');
            eye_open.classList.add('hidden');
            eye_close.classList.remove('hidden');

        } else if (viewBookingArea.classList.contains('open')) {
            viewBookingArea.classList.add('hidden');
            viewBookingArea.classList.remove('open');
            eye_open.classList.remove('hidden');
            eye_close.classList.add('hidden');
        }
    });
});


function ShowPassword() {
   var password = document.getElementById("password");
   var eyeShow = document.getElementById("eyeShow");
   var eyeHidden = document.getElementById("eyeHidden");
   if (password.type === "password") {
      password.type = "text";

      eyeShow.classList.add('hidden')
      eyeHidden.classList.remove('hidden')

   } else {
      password.type = "password";


      eyeHidden.classList.add('hidden')
      eyeShow.classList.remove('hidden')

   }

   }



   $(function(){
      var dtToday = new Date();
      
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();
      
      var minDate= year + '-' + month + '-' + day;
      
      $('#date').attr('min', minDate);
  });