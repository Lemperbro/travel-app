$(document).ready(function() {
    $("#addOrder_btn").click(function() {
        $("#addOrders").append('<div class="flex gap-4 "><div class="w-[50%]"><label for="age" class="">Select Age</label><select name="age[]" id="age" class="w-full rounded-md border-[1px] border-gray-400 mt-2"><option value="5-10">5th - 10th</option><option value="11-20">11th - 20th</option><option value="21-30">21th - 30th</option><option value="31-40">31th - 40th</option></select></div><div class="w-[50%]"><label for="nama" class="">Name</label><input type="text" name="nama[]" id="nama" class="w-full rounded-md border-[1px] border-gray-400 p-2 mt-2"></div></div><h1 class="text-center block cursor-pointer bg-red-700 text-white font-semibold p-2 rounded-md my-4" id="deleteOrder_btn">Delete Order</h1>');
    });
  });

  $("body").on("click", "#deleteOrder_btn", function () {
            $(this).parents("#addOrders").remove();
        });