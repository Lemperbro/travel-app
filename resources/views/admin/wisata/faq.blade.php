@extends('admin.layouts.main')

@section('container')

<div class="mt-20 bg-white p-10 rounded-md shadow-md">

    
  

   <form action="/admin/wisata/faq/{{ $slug }}" method="post" class="">
    @csrf


<div class="mb-32">
<div class="" id="faq">

    <div class="mb-8">
    <h1 class="text-2xl font-semibold flex justify-center">Type Frequently Asked Questions </h1>
    </div>

@if ($faq->count() > 0)
    
    @foreach ($faq as $data_faq)
    <input name="id[]" type="hidden" class="w-full p-2 rounded-md" value="{{ $data_faq->id }}">

    <div class="mb-14 " id="faq_area">

    <div class="flex gap-x-4">
        <label for="" class="my-auto font-semibold text-xl">Q</label>
        <input name="question[]" type="text" class="w-full p-2 rounded-md" value="{{ $data_faq->question }}">
    </div>


    <div class="flex gap-x-4 mt-2">
        <label for="" class="my-auto font-semibold text-xl">A</label>
        <input name="answer[]" type="text" class="w-full p-2 rounded-md" value="{{ $data_faq->answer }}">
    </div>
    
    <h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4  cursor-pointer remove_faq" data-id="{{ $data_faq->id }}">-</h1>

</div>

@endforeach



@elseif ($faq->count() === 0)

<div class="mb-14" id="faq_area">

    <div class="flex gap-x-4">
        <label for="" class="my-auto font-semibold text-xl">Q</label>
        <input name="question[]" type="text" class="w-full p-2 rounded-md" value="">
    </div>
    
    
    <div class="flex gap-x-4 mt-2">
        <label for="" class="my-auto font-semibold text-xl">A</label>
        <input name="answer[]" type="text" class="w-full p-2 rounded-md" value="">
    </div>
    <h1 id="remove_faq" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer">-</h1>
    
    </div>
@endif






</div>



<h1 id="add_faq" class="bg-blue-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-xl float-right mt-8 cursor-pointer">Tambah</h1>
</div>


<button type="submit" class="bg-orange-600 p-2 text-white rounded-md justify-center">Send</button>

   </form>
 
</div>





@endsection