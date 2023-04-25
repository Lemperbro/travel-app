
<script src="{{ asset('src/dark-mode.js') }}"></script>
<script src="{{ asset('src/charts.js') }}"></script>
<script src="{{ asset('src/constants.js') }}"></script>
<script src="{{ asset('src/index.js') }}"></script>
<script src="{{ asset('src/sidebar.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>s
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
<script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="../path/to/soft-ui-dashboard-tailwind.js"></script>
<script src="{{ asset('js/side-bar.js') }}"></script>
<script src="{{ asset('js/dynamic-input.js') }}"></script>
<script src="{{ asset('js/view-image.js') }}"></script>
<script src="{{ asset('js/action-menu.js') }}"></script>
<script src="{{ asset('js/pop-up.js') }}"></script>

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