<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
<script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>

</div>

<script>
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

    
</script>
</body>
</html>