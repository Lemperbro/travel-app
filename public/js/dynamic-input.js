$(document).ready(function() {
    $("#add_jemput").click(function() {
        $("#jemput").append('<div class="mt-4 grid grid-cols-2 gap-4 mx-auto w-full" id="area_jemput"> <div class=""><label for="titik_jemput" class="font-bold text-sm mb-1 text-gray-700 block">Lokasi</label><input type="text" name="titik_jemput[]" id="titik_jemput" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" required></div> <div class=""><label for="harga" class="font-bold text-sm mb-1 text-gray-700 block">Harga</label><div class="flex gap-x-2"><input type="number" name="harga[]" id="harga" class="w-full  rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium" required><h1 id="remove_jemput" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div></div>');
    });
  });


  // $("body").on("click", "#remove_jemput", function () {
  //           $(this).parents("#area_jemput").remove();
  //       });

  $(document).ready(function() {
    $("#add_inclusion").click(function() {
        $("#inclusion").append('<div class="flex gap-x-2" id="area_inclusion"><input type="text" name="inclusion[]" id="inclusion" class="h-12 rounded-md p-2 border"><h1 id="remove_inclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_inclusion", function () {
            $(this).parents("#area_inclusion").remove();
        });

  $(document).ready(function() {
    $("#add_exclusion").click(function() {
        $("#exclusion").append('<div class="flex gap-x-2" id="area_exclusion"><input type="text" name="exclusion[]" id="inclusion" class="h-12 rounded-md p-2 border"><h1 id="remove_exclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_exclusion", function () {
            $(this).parents("#area_exclusion").remove();
        });

  var day = 1;

  $(document).ready(function() {
    $("#add_day").click(function() {
        day += 1;
        $("#day").append('<h3>Day '+day+'</h3><div id="itenerary"><input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2 border mt-4 mb-2"><textarea id="banner-message" class="message w-full h-20 relative" name="itenerary[]" style=""></textarea></div>');
    });
  });



  $(document).ready(function() {
    $("#add_itenerary").click(function() {
        $("#itenerary").append('<div class="mt-4 border rounded-md p-8 shadow-best" > <input type="text" name="exclusion[]" id="inclusion" class="w-full h-12 rounded-md p-2 border mt-4 mb-2"></div>');
    });
  });

//   var increment = 0;

// function hitungDiv() {
//   var divs = document.getElementById("div_count");
//   increment += divs.length;
  
//   //mengambil elemen dengan ID "output" dan memperbarui isinya dengan nilai increment
// console.log(increment)

//   document.getElementById("output").innerHTML = increment;
// }

// //memanggil fungsi hitungDiv() setiap 5 detik
// setInterval(hitungDiv, 1000);