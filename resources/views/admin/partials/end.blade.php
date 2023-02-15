<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
<script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="../path/to/soft-ui-dashboard-tailwind.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>


</div>

<script>
    const open = document.getElementById('toggleSidebarMobile');
    const close = document.getElementById('toggleSidebarMobileClose');
    const sidebar = document.getElementById('sidebar');

    open.addEventListener('click', function(){
        sidebar.classList.remove('hidden');
        close.classList.remove('hidden');
        open.classList.add('hidden');
    });
    close.addEventListener('click', function(){
        sidebar.classList.add('hidden');
        close.classList.add('hidden');
        open.classList.remove('hidden');

    });

    $(document).ready(function() {
    $("#add_jemput").click(function() {
        $("#jemput").append('<div class="mt-4 border rounded-md p-8 shadow-best" > <label for="titik_jemput">Titik Jemput </label><input type="text" name="titik_jemput[]" id="titik_jemput" class="w-full h-12 rounded-md p-2 border mt-4 mb-2"><label for="harga">Harga</label><input type="number" name="harga[]" id="harga" class="w-full h-12 rounded-md p-2 border mt-4"></div>');
    });
  });

  $(document).ready(function() {
    $("#add_inclusion").click(function() {
        $("#inclusion").append('<div class="mt-4 border rounded-md p-8 shadow-best" > <input type="text" name="inclusion[]" id="inclusion" class="w-full h-12 rounded-md p-2 border mt-4 mb-2"></div>');
    });
  });

  $(document).ready(function() {
    $("#add_exclusion").click(function() {
        $("#exclusion").append('<div class="mt-4 border rounded-md p-8 shadow-best" > <input type="text" name="exclusion[]" id="inclusion" class="w-full h-12 rounded-md p-2 border mt-4 mb-2"></div>');
    });
  });

  var input = document.getElementById("input");
var list = document.getElementById("list");

input.addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    var item = input.value;
    input.value = "";

    var li = document.createElement("<li>");
    li.innerHTML = item;
    list.appendChild(li);
  }
});

// js form wizard
function app() {
			return {
				step: 1, 
				passwordStrengthText: '',
				togglePassword: false,


				password: '',
				gender: 'Male',


			}
		}



    
</script>
</body>
</html>