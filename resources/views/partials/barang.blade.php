@foreach ($wisata->equipment as $img)
<div class="my-[5vh] lg:my-[10vh]">
    <img src="{{ asset('image/'.$img->image) }}" alt="" class="h-[15rem] lg:h-[30rem] object-contain w-full">
</div>
@endforeach
