var pickup = document.getElementById('pickup');
var pickupValue = pickup.value;
var pickupsplit = pickupValue.split(",");


var dropout = document.getElementById('dropout');

var hasil = document.getElementById('hasil');


pickup.addEventListener('input', function() {



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
    var count  = parseInt(pickupsplit[1])  + parseInt(priceWisata.value);
   
    

   destinationPrice.innerHTML = new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0
    }).format(Pricewisata.value);

   pickupPrice.innerHTML =  new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0
    }).format(pickupsplit[1]);

   total.innerHTML = new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0
    }).format(count);

    
});

dropout.addEventListener('input', function() {

   var pickupValue = pickup.value;
   var pickupsplit = pickupValue.split(",");


    if(pickupsplit[0] !== dropout.value){
       hasil.innerHTML = '<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300" role="alert"><span class="font-medium">Warning!</span> Your Drop Point Location is out Off Range, You Will Be get extra cost</div>'
    }else if(pickupsplit[0] === dropout.value){
       hasil.innerHTML = ""

    }
});


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
