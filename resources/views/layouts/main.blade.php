@include('partials.head')

<body class="">

@include('partials.navbar')

<div class="container mt-32">

@yield('container')

</div>

@include('partials.footer')
@include('sweetalert::alert')

</body>

