@include('admin.partials.start')

<div class="container">
@include('admin.partials.navbar')
<div>
  @include('admin.partials.sidebar')

  <div class="bg-gray-900 opacity-50   inset-0 z-10 border border-red-600" id="sidebarBackdrop"></div>
  <div id="main-content" class="w-full  relative  lg:ml-64 border pt-10">
    <div class="bg-red-600 absolute -z-10 h-screen w-full"></div>
@yield('container')

  </div>
</div>
</div>

@include('admin.partials.end')