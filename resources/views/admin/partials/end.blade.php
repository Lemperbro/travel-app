<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
<script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="../path/to/soft-ui-dashboard-tailwind.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="{{ asset('js/side-bar.js') }}"></script>
<script src="{{ asset('js/dynamic-input.js') }}"></script>
<script src="{{ asset('js/view-image.js') }}"></script>
<script src="{{ asset('js/action-menu.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.2/tinymce.min.js" integrity="sha512-0hADhKU8eEFSmp3+f9Yh8QmWpr6nTYLpN9Br7k2GTUQOT6reI2kdEOwkOORcaRZ+xW5ZL8W24OpBlsCOCqNaNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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
//         });
      
//   });


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