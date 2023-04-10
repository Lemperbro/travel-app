const modal = document.getElementById('popup-modal');
const btn = document.getElementById('close_modal_delete');


btn.addEventListener('click', function(){
    modal.classList.add('hidden');
});