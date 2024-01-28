function see_carousel() {
    var text = document.getElementById('text');
    var text_view = document.getElementById('text_view');

    const [file] = image.files
    if (file) {
        view_image.src = URL.createObjectURL(file)
    }
    text_view.innerHTML = text.value;


}