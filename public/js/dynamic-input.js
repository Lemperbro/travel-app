
    //hotel dynamic start



    //add



    $(document).ready(function() {
      $("#add_hotel").click(function() {
          var hotel_add = document.getElementById('hotel_area').cloneNode(true);
          $("#hotel").append(hotel_add);
      });

  });




  $("body").on("click", "#remove_hotel", function() {
      var hotel_add = document.getElementById('hotel_area').cloneNode(true);
      $(this).parents("#hotel_area").remove();
      if ($("#hotel_area").length == 0) {
          $("#hotel").append(hotel_add);
      }
  });



  // //delete



  //hotel dynamic end

  function toggleEvent() {
      var toggle = document.querySelector('.toggle');

      toggle.classList.add('right-0')
  }

  // $(document).ready(function() {
  //     $("#add_faq").click(function() {
  //         $("#faq").append(
  //             '<div class="mb-14 mt-14" id="faq_area"><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_faq" data-id="$data_faq->id">-</h1></div>'
  //         );
  //     });
  // });

  // $("body").on("click", "#remove_faq", function() {
  //     $(this).parents("#faq_area").remove();
  // });


  $(document).ready(function() {
      $("#add_inclusion").click(function() {
          $("#inclusion").append(
              '<div class="flex gap-x-2" id="area_inclusion"><input type="text" name="inclusion[]" id="inclusion" class="w-full h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white"><h1 id="remove_inclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div>'
          );
      });
  });

  $("body").on("click", "#remove_inclusion", function() {
      $(this).parents("#area_inclusion").remove();
  });

  $(document).ready(function() {
      $("#add_exclusion").click(function() {
          $("#exclusion").append(
              '<div class="flex gap-x-2" id="area_exclusion"><input type="text" name="exclusion[]" id="inclusion" class="w-full h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white"><h1 id="remove_exclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div>'
          );
      });
  });

  $("body").on("click", "#remove_exclusion", function() {
      $(this).parents("#area_exclusion").remove();
  });

  var day_number = document.getElementById('count_day');
  var day_integer = parseInt(day_number.value);
  if (day_integer > 0) {
      var day = day_integer;
  } else if (day_integer == 0) {
      var day = 1;
  }

  $(document).ready(function() {
      $("#add_day").click(function() {
          day += 1;
          $("#day").append('<div id="itenerary" class="border-b-[1px] pb-4 relative"><div class="flex justify-between w-full mt-4"><h3 class="text-gray-900 dark:text-white ">Day ' + day +'</h3><h1 id="remove_itenerary" class="text-red-600  font-semibold text-base  cursor-pointer remove_itenerary" data-id="$itenerary->id">Delete</h1></div><input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2  mt-4 mb-2 text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900 border-none"><div class="grid lg:grid-cols-2 gap-x-4 "><div class="w-full"><h1 class="text-gray-900 dark:text-white my-2">Start Time</h1><input type="time" name="startTime[]" class="bg-gray-200 border-none dark:bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full"></div><div class="w-full"><h1 class="text-gray-900 dark:text-white my-2">End Time</h1><input type="time" name="endTime[]" class="bg-gray-200 border-none dark:bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full"></div></div><p class="text-gray-600 dark:text-gray-300 my-2">Note: please<span class="font-bold"> Enter </span> to move bar</p><textarea id="default-editor" class="default-editor message w-full h-20 relative text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900 border-none" name="itenerary[]" style=""></textarea></div>'
          );
      });
  });





  $("body").on("click", "#remove_itenerary", function() {
      $(this).parents("#itenerary").remove();
      day -= 1;
      if($('#itenerary').length == 0){
          $("#day").append('<div id="itenerary" class="border-b-[1px] pb-4 relative"><div class="flex justify-between w-full mt-4"><h3 class="text-gray-900 dark:text-white ">Day 1 </h3></div><input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2  mt-4 mb-2 text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900 border-none"><div class="grid lg:grid-cols-2 gap-x-4 "><div class="w-full"><h1 class="text-gray-900 dark:text-white my-2">Start Time</h1><input type="time" name="startTime[]" class="bg-gray-200 border-none dark:bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full"></div><div class="w-full"><h1 class="text-gray-900 dark:text-white my-2">End Time</h1><input type="time" name="endTime[]" class="bg-gray-200 border-none dark:bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full"></div></div><p class="text-gray-600 dark:text-gray-300 my-2">Note: please<span class="font-bold"> Enter </span> to move bar</p><textarea id="default-editor" class="default-editor message w-full h-20 relative text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900 border-none" name="itenerary[]" style=""></textarea></div>'
          );
      }
  });


 
  $(document).on('click', '.remove_itenerary', function() {
      var id = $(this).data('id');
      var token = "{{ csrf_token() }}";

      $.ajax({
          url: '/admin/wisata/delete/itenerary/' + id,
          type: 'DELETE',
          data: {
              _token: token
          },
          success: function(response) {
              // Berikan respon sukses pada pengguna
          },
          error: function(xhr) {
              // Berikan respon error pada pengguna
          }
      });
  });