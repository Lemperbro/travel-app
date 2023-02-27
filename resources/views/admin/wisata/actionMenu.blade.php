{!! "<script>
                    const button". $wisata->id." = document.querySelector('.options-menu-wisata".$wisata->id."');
                     const menu".$wisata->id." = document.querySelector('.dropdown-menu-wisata".$wisata->id."');

                     button". $wisata->id.".addEventListener('click', () => {
                        const expanded = button". $wisata->id.".getAttribute('aria-expanded') === 'true' || false;
                        button". $wisata->id.".setAttribute('aria-expanded', !expanded);
                        menu". $wisata->id.".classList.toggle('hidden');
                     });

                     menu". $wisata->id.".addEventListener('click', (event) => {
                        event.stopPropagation();
                     });

                     document.addEventListener('click', (event) => {
                        const isClickInside = menu". $wisata->id.".contains(event.target) || button". $wisata->id.".contains(event.target);
                        if (!isClickInside) {
                           button". $wisata->id.".setAttribute('aria-expanded', 'false');
                           menu". $wisata->id.".classList.add('hidden');
                        }
                     });
                  </script>" !!}