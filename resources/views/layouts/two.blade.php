@include('partials.head')

<body>


<div class="lg:container">

@yield('container')


</div>



  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
  <script src="{{ asset('js/html2canvas.min.js') }}"></script>
  <script src="{{ asset('js/printImage.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>