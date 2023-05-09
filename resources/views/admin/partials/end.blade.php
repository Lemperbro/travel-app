<script src="{{ asset('js/faq-dynamic.js') }}"></script>
<script src="{{ asset('js/dynamic-input.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
<script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
<script src="../path/to/soft-ui-dashboard-tailwind.js"></script>
<script src="{{ asset('js/side-bar.js') }}"></script>
<script src="{{ asset('js/view-image.js') }}"></script>
<script src="{{ asset('js/action-menu.js') }}"></script>
<script src="{{ asset('js/pop-up.js') }}"></script>
<script src="{{ asset('src/dark-mode.js') }}"></script>
<script src="{{ asset('src/charts.js') }}"></script>
<script src="{{ asset('src/constants.js') }}"></script>
<script src="{{ asset('src/index.js') }}"></script>
<script src="{{ asset('src/sidebar.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ asset('js/tinymce.js') }}"></script>
@include('sweetalert::alert')





</div>

<script>







// $(".remove_faq").on("click", function(){
//         var id = $(this).data("id");
//         $.ajax({ 
//           url: ",
//           data: {"id": id,"_token": "{{ csrf_token() }}"},
//           type: 'post',
//           success: function(result){
//               location.reload();
//           }
//         });,
//   });

$(document).ready(function() {
    $("#add_faq").click(function() {
        $("#faq").append('<div class="mb-14 mt-14" id="faq_area"><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_faq" data-id="$data_faq->id">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_faq", function () {
            $(this).parents("#faq_area").remove();
        });


$(document).ready(function() {
    $("#add_inclusion").click(function() {
        $("#inclusion").append('<div class="flex gap-x-2" id="area_inclusion"><input type="text" name="inclusion[]" id="inclusion" class="h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white"><h1 id="remove_inclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_inclusion", function () {
            $(this).parents("#area_inclusion").remove();
        });

  $(document).ready(function() {
    $("#add_exclusion").click(function() {
        $("#exclusion").append('<div class="flex gap-x-2" id="area_exclusion"><input type="text" name="exclusion[]" id="inclusion" class="h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white"><h1 id="remove_exclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_exclusion", function () {
            $(this).parents("#area_exclusion").remove();
        });

  var day_number = document.getElementById('count_day');
  var day_integer = parseInt(day_number.value);
  if(day_integer > 0){
    var day = day_integer;
  }else if(day_integer == 0){
    var day = 1;
  }

  $(document).ready(function() {
    $("#add_day").click(function() {
        day += 1;
        $("#day").append('<div id="itenerary"><h3 class="text-gray-900 dark:text-white">Day '+day+'</h3><input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2  mt-4 mb-2 text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900 border-none"><div class="grid lg:grid-cols-2 gap-x-4 my-4"><div class="w-full"><h1 class="text-gray-900 dark:text-white">Start Time</h1><input type="time" name="startTime[]" class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full"></div><div class="w-full"><h1 class="text-gray-900 dark:text-white">End Time</h1><input type="time" name="endTime[]" class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full"></div></div><textarea id="default-editor" class="default-editor message w-full h-20 relative text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900 border-none" name="itenerary[]" style=""></textarea><h1 id="remove_itenerary" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_itenerary" data-id="$itenerary->id">-</h1></div>');
    });
  });





  $("body").on("click", "#remove_itenerary", function () {
    $(this).parents("#itenerary").remove();
});


  $(document).on('click', '.remove_faq', function() {
        var id = $(this).data('id');
        var token = "{{ csrf_token() }}";
        
        $.ajax({
            url: '/admin/wisata/faq/delete/' + id,
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

    $(document).ready(function() {
    $("#add_faq").click(function() {

        $("#faq").append('<div class="mb-14 mt-14" id="faq_area"><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_faq" data-id="$data_faq->id">-</h1></div>');
    });
  });



  $("body").on("click", "#remove_faq", function () {
            
            $(this).parents("#faq_area").remove();

            if($("#faq_area").length == 0 ){
                $("#faq").append('<div class="mb-14 mt-14" id="faq_area"><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_faq" data-id="$data_faq->id">-</h1></div>');
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
  


  var strings = [];
strings.push(
  
);

var htmlContent='';
var textAreaContent='';
$(document).ready(function(){
	strings.forEach(element => htmlContent += "<li>"+element+"</li>");
	$("#display").html(htmlContent);
	var i=1;
	strings.forEach(function(element){ 
  	if(strings.length==i)
  		textAreaContent += ">"+ element;
    else
    	textAreaContent += ">"+ element+"\n";
    i++;
  });
  $("#banner-message").val(textAreaContent);  
})


tinymce.init({
  selector: 'textarea.default-editor'
});



$("#banner-message").keyup(function(e) {
   var code = e.keyCode ? e.keyCode : e.which;
   if (code == 13) {  
   			var text=$(this).val();
        text+=">";
        $(this).val(text);
     }
   });
  







// js form wizard
function app() {
			return {
				step: 1, 



			}
		}





    
</script>
</body>
</html>