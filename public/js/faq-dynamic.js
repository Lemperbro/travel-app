$(document).ready(function() {
    $("#add_faq").click(function() {
        $("#faq").append('<div class="mb-14 mt-14" id="faq_area"><div class="flex gap-x-4"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">Q</label><input name="question[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><div class="flex gap-x-4 mt-2"><label for="" class="my-auto font-semibold text-xl text-gray-900 dark:text-white">A</label><input name="answer[]" type="text" class="w-full p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-900"></div><h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_faq" data-id="{{ $data_faq->id }}">-</h1></div>');
    });
  });

  $("body").on("click", "#remove_faq", function () {
            $(this).parents("#faq_area").remove();
        });