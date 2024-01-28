



var type = document.getElementById('type');
var harga = document.getElementById('harga');
var hotel = document.getElementById('hotel');

type.addEventListener('click', function(){

    if(type.value == 'hotel' || type.value == 'mobil'){
        harga.classList.add('hidden');
    }else if(type.value !== 'hotel' || type.value !== 'mobil'){
        harga.classList.remove('hidden');
    }

    if(type.value == 'hotel'){
        hotel.classList.remove('hidden');
        document.getElementById('add_hotel').classList.remove('hidden');
    }else{
        hotel.classList.add('hidden');
        document.getElementById('add_hotel').classList.add('hidden');
    }
});


