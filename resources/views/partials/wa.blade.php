<!-- load font awesome for icons -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

<!-- add your custom CSS -->
<style>
body {
 font-family: sans-serif;
}

/* Add WA floating button CSS */
.floating {
 position: fixed;
 width: 60px;
 height: 60px;
 bottom: 40px;
 right: 40px;
 background-color: #25d366;
 color: #fff;
 border-radius: 50px;
 text-align: center;
 font-size: 30px;
 box-shadow: 2px 2px 3px #999;
 z-index: 100;
}

.fab-icon {
 margin-top: 16px;
}
</style>

<!-- render the button and direct it to wa.me -->
<a href="https://wa.me/6282231719219?text=hallo" class="floating" target="_blank">
<i class="fab fa-whatsapp fab-icon"></i>
</a>