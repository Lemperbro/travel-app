<footer class="mt-32 bg-[#FF2E00] relative pt-24 pb-4">
    <div class=' px-4 md:px-0 md:container'>
        <div
            class='absolute -top-8 left-[50%] transform -translate-x-[50%] grid grid-cols-1 md:grid-cols-2 gap-4 bg-[#FD522C] px-4 md:px-8 py-4 rounded-xl w-[90%] md:w-[80%] shadow-best'>
            <h1 class='text-white text-xl md:text-2xl font-semibold  text-center md:text-left my-auto'>Review & Sugestion
            </h1>
            <form class='gap-x-8 flex my-auto' method="post" action="/review/send">
                @csrf
                <input class='bg-white w-full rounded-lg p-3' placeholder='Write on here please ....' name="description" />
                <button class='bg-white hover:bg-gray-300 font-semibold rounded-lg py-2 px-8'
                    type="submit">Send</button>
            </form>
        </div>

        <div class="">


            <div class='lg:flex mt-4 border-black justify-between gap-x-32'>
                <div class="w-full lg:w-[30%]">
                    <img src='{{ asset('img/logoputih.png') }}' class='h-20' />
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path
                                d="m612 936-263-93-179 71q-17 9-33.5-1T120 883V325q0-13 7.5-23t19.5-15l202-71 263 92 178-71q17-8 33.5 1.5T840 268v565q0 11-7.5 19T814 864l-202 72Zm-34-75V356l-196-66v505l196 66Zm60 0 142-47V302l-142 54v505Zm-458-12 142-54V290l-142 47v512Zm458-493v505-505Zm-316-66v505-505Z"
                                fill="#ffffff" />
                        </svg>
                        <p class="text-white text-base sm:text-lg my-auto px-2">Perum Permata Regency 1 blok 10 no 28
                            Ngijo Karangploso Malang </p>
                    </div>

                    <div class="flex">
                        <img src="icons/waputih.png" alt="" class="object-cover w-8 mt-2 pl-1">
                        <div class="mt-3 pl-2 text-white ">
                            <a href="" class="text-base sm:text-lg my-auto">+62 822-3381-9869</a>
                        </div>
                    </div>

                    <div class="flex mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="38" viewBox="0 96 960 960" width="38">
                            <path
                                d="M140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm340-302L140 371v465h680V371L480 594Zm0-60 336-218H145l335 218ZM140 371v-55 520-465Z"
                                fill="#ffffff" />
                        </svg>
                        <p class="mt-1 pl-2 text-white text-base sm:text-lg my-auto">
                            Growintravel@gmail.com
                        </p>
                    </div>
                </div>


                <div class="grid grid-cols-2 md:gap-x-44 mt-4 md:mt-0">

                    <div class="">
                        <h1 class="text-white text-xl md:text-3xl font-semibold uppercase">Our Service</h1>
                        <ul class=" text-white mt-2 text-base md:text-xl pl-1">
                            <li class="mt-2 capitalize"><a href="/wisata/type/open trip">open trip</a></li>
                            <li class="mt-2 capitalize"><a href="/wisata/type/single trip">single trip</a></li>
                            <li class="mt-2 capitalize"><a href="/wisata/type/private trip">private trip</a></li>
                        </ul>
                    </div>






                    <div class="">
                        <h1 class="text-white text-xl md:text-3xl font-semibold uppercase">menu</h1>
                        <ul class="text-white mt-2 text-base md:text-xl ">
                            <li class="">
                                <a href="/abouts">About Us</a>
                            </li>
                            <li class="mt-2">
                                <a href="/testimoni">Testimoni</a>
                            </li>
                            <li class="mt-2">
                                <a href="/article">Blog</a>
                            </li>
                            <li class="mt-2">
                                <a href="/contact">Contact</a>
                            </li>
                        </ul>
                    </div>


                </div>


            </div>

        </div>



    </div>

</footer>
<script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>

<script src="{{ asset('js/tap-image.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/carouselCard.js') }}"></script>
<script src="{{ asset('js/order-dynamic.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/loading.js') }}"></script>


<script>

    //dropdown FAQ start
    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });

        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ?
                    `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
    //dropdown FAQ end

    $(document).ready(function() {
        $("#addOrder_btn").click(function() {
            $("#addOrders").append(
                '<div id="Order"><div class="flex gap-4 mt-4"><div class="w-[50%]"><label for="age" class="">Select Age</label><select name="age[]" id="age" class="w-full rounded-md border-[1px] border-gray-400 mt-2"><option value="5-10">5th - 10th</option><option value="11-20">11th - 20th</option><option value="21-30">21th - 30th</option><option value="31-40">31th - 40th</option></select></div><div class="w-[50%]"><label for="nama" class="">Name</label><input type="text" name="nama[]" id="nama" class="w-full rounded-md border-[1px] border-gray-400 p-2 mt-2"></div></div><h1 class="text-center block cursor-pointer bg-red-700 text-white font-semibold p-2 rounded-md my-4" id="deleteOrder_btn">Delete Order</h1></div>'
            );
        });
    });

    $("body").on("click", "#deleteOrder_btn", function() {
        $(this).parents("#Order").remove();
    });


    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            view_image.src = URL.createObjectURL(file)
        }
    }
</script>
