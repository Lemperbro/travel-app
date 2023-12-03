var loadingIndicator = document.getElementById('loading');

function loading(){
    this.loadingIndicator.style.display = 'flex';
}

window.addEventListener('load', function () {
    loadingIndicator.style.display = 'none';
});