const open = document.getElementById('toggleSidebarMobile');
const close = document.getElementById('toggleSidebarMobileClose');
const sidebar = document.getElementById('sidebar');

open.addEventListener('click', function(){
    sidebar.classList.remove('hidden');
    close.classList.remove('hidden');
    open.classList.add('hidden');
});
close.addEventListener('click', function(){
    sidebar.classList.add('hidden');
    close.classList.add('hidden');
    open.classList.remove('hidden');

});