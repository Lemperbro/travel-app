@include('admin.partials.start')

<div class="container">
@include('admin.partials.navbar')
<div>
  @include('admin.partials.sidebar')

  <div id="main-content" class="w-full relative  lg:ml-64  pt-10">

  @yield('container')

  </div>
</div>
</div>

@include('admin.partials.end')