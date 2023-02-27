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



</div>

<script>










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