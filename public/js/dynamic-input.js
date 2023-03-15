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

  var day = 0;

  $(document).ready(function() {
    $("#add_day").click(function() {
        day += 1;
        $("#day").append('<div id="itenerary"><h3>Day '+day+'</h3><input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2 border mt-4 mb-2"><textarea id="default-editor" class="default-editor message w-full h-20 relative" name="itenerary[]" style=""></textarea><h1 id="remove_itenerary" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_itenerary" data-id="{{ $itenerary->id }}">-</h1></div>');
    });
  });





  $("body").on("click", "#remove_itenerary", function () {
    $(this).parents("#itenerary").remove();
});




  $(document).ready(function() {
    $("#add_faq").click(function() {
        $("#faq").append('<div class="mb-14 mt-14" id="faq_area"><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md"></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md"></div><h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_faq" data-id="{{ $data_faq->id }}">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_faq", function () {
            $(this).parents("#faq_area").remove();
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