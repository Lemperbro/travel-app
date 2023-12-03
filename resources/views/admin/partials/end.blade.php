<script src="{{ asset('froala/js/froala_editor.pkgd.min.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
{{-- <script src="{{ asset('js/html2canvas.min.js') }}"></script> --}}
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('src/sidebar.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/printToExcel.js') }}"></script>
<script src="{{ asset('js/extra.js') }}"></script>
<script src="{{ asset('js/faq-dynamic.js') }}"></script>
<script src="{{ asset('js/dynamic-input.js') }}"></script>
<script src="{{ asset('js/froala.js') }}"></script>
<script src="{{ asset('js/view-image.js') }}"></script>
<script src="{{ asset('js/action-menu.js') }}"></script>
<script src="{{ asset('js/pop-up.js') }}"></script>
<script src="{{ asset('src/dark-mode.js') }}"></script>
<script src="{{ asset('src/constants.js') }}"></script>
<script src="{{ asset('src/index.js') }}"></script>
<script src="{{ asset('js/editCarousel.js') }}"></script>


@include('sweetalert::alert')





</div>

<script>










$(document).on('click', '.remove_faq', function() {
    var id = $(this).data('id');
    var token = "{{ csrf_token() }}";
    $.ajax({
        url: '/admin/wisata/faq/delete/' + id,
        type: 'POST',
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

        $("#faq").append(
            '<div class="mb-14 mt-14" id="faq_area"><div class="flex justify-end pb-4"><h1 class="text-white bg-red-600 p-1 rounded-md font-semibold  cursor-pointer" id="remove_faq">Delete</h1></div><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900" required></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900" required></div></div>'
        );
    });
});



$("body").on("click", "#remove_faq", function() {

  $(this).parents("#faq_area").remove();
    if ($("#faq_area").length == 0) {
        $("#faq").append(
            '<div class="mb-14 mt-14" id="faq_area"><div class="flex justify-end pb-4"><h1 class="text-white bg-red-600 p-1 rounded-md font-semibold  cursor-pointer" id="remove_faq">Delete</h1></div><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900" required></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900" required></div></div>'
        );
    }
});












</script>
</body>

</html>
