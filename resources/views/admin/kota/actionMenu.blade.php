{!! "<script>
                    const button". $query->id." = document.querySelector('.options-menu".$query->id."');
                     const menu".$query->id." = document.querySelector('.dropdown-menu".$query->id."');

                     button". $query->id.".addEventListener('click', () => {
                        const expanded = button". $query->id.".getAttribute('aria-expanded') === 'true' || false;
                        button". $query->id.".setAttribute('aria-expanded', !expanded);
                        menu". $query->id.".classList.toggle('hidden');
                     });

                     menu". $query->id.".addEventListener('click', (event) => {
                        event.stopPropagation();
                     });

                     document.addEventListener('click', (event) => {
                        const isClickInside = menu". $query->id.".contains(event.target) || button". $query->id.".contains(event.target);
                        if (!isClickInside) {
                           button". $query->id.".setAttribute('aria-expanded', 'false');
                           menu". $query->id.".classList.add('hidden');
                        }
                     });
                  </script>" !!}