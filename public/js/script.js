var pickup = document.getElementById('pickup');
// var pickupValue = pickup.value;
// var pickupsplit = pickupValue.split(",");


var dropout = document.getElementById('dropout');

var hasil = document.getElementById('hasil');


pickup.addEventListener('input', function() {
console.log(dropout.value)

    if(pickup.value !== dropout.value){
       hasil.innerHTML = '<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300" role="alert"><span class="font-medium">Warning!</span> Your Drop Point Location is out Off Range, You Will Be </div>' 
    }else if(pickup.value === dropout.value){
       hasil.innerHTML = ""

    }
});

dropout.addEventListener('input', function() {
    if(pickup.value !== dropout.value){
       hasil.innerHTML = '<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300" role="alert"><span class="font-medium">Warning!</span> Your Drop Point Location is out Off Range, You Will Be </div>'
    }else if(pickup.value === dropout.value){
       hasil.innerHTML = ""

    }
});


var destinationPrice = document.getElementById('destinationPrice');
var pickupPrice = document.getElementById('pickupPrice');
var Pricewisata = document.getElementById('priceWisata');
var total = document.getElementById('total');





var count  = parseInt(pickupsplit[1])  + parseInt(priceWisata.value);


destinationPrice.innerHTML = Pricewisata.value;
pickupPrice.innerHTML = pickupsplit[1];
total.innerHTML = count;

pickup.addEventListener('input', function(){
    pickupPrice.innerHTML = pickupsplit[1];
    total.innerHTML = count;
});

