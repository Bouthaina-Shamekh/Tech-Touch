@php
$title = 'titel_'.app()->currentLocale();

@endphp
   <!-- Footer -->
    <footer class="mt-10">
        <div class="w-full relative mb-10">
            <img src="{{asset('siteweb/img/restatant/view-01.png')}}" alt="" class="w-full">
        </div>
        <div class="container mx-auto w-full relative flex justify-around flex-wrap">
            <div>
                <img src="{{asset('siteweb/img/logoD.png')}}" alt="" width="70px" class="mb-2">
                {{-- {!! App\Models\Setting::where('key',"$title")->first()->value !!} --}}
                مطعم الملكي لاشهى الماكولات
            </div>
            <div>
                <ul class="w-full text-surface dark:text-white">
                    <li class="w-full py-4 text-black font-bold text-lg">
                        روابط قد تهمك
                    </li>
                    <li class="w-full  hover:text-amber-500 hover:ps-2 transition-all delay-150 ease-in">
                        <a href="#" class="hover:text-amber-500 transition-color duration-200 ease-in">سياية الخصوصية</a>
                    </li>
                    <li class="w-full py-4  hover:text-amber-500 hover:ps-2 transition-all delay-150 ease-in">
                        <a href="#" class="hover:text-amber-500 transition-color duration-200 ease-in">الاحكام والشروط</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="w-full text-surface dark:text-white">
                    <li class="w-full py-4 text-black font-bold text-lg">
                        معلومات التواصل
                    </li>
                    <li class="w-full flex items-center text-base hover:text-amber-500 hover:ps-2 transition-all delay-150 ease-in mb-2">
                        <i class="fa-solid fa-location-dot me-2 text-sacndary"></i>
                        <a href="#" class=" transition-color duration-200 ease-in">العنوان</a>
                    </li>
                    <li class="w-full flex items-center text-base hover:text-amber-500 hover:ps-2 transition-all delay-150 ease-in mb-2">
                        <i class="fa-solid fa-phone me-2 text-sacndary" style="rotate: 260deg"></i>
                        <a href="tel:0123456789" class="transition-color duration-200 ease-in">
                            {{-- {!! App\Models\Setting::where('key',"whatsapp")->first()->value !!} --}}
                            0593407702
                        </a>
                    </li>
                    <li class="w-full flex items-center text-base hover:text-amber-500 hover:ps-2 transition-all delay-150 ease-in mb-2">
                        <i class="fa-brands fa-whatsapp me-2 text-sacndary"></i>
                        <a href="#" class="transition-color duration-200 ease-in">تواصل واتس</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col justify-between">
                <a href="#" class="mb-2">
                    <img src="{{asset('siteweb/img/google-play.png')}}" alt="">
                </a>
                <a href="#" class="mb-2">
                    <img src="{{asset('siteweb/img/app-store.png')}}" alt="">
                </a>
                <a href="#" class="mb-2">
                    <img src="{{asset('siteweb/img/call-with-me.png')}}" alt="">
                </a>
            </div>
        </div>
        <div class="w-full relative mt-10 bg-amber-400">
            <div class="container mx-auto w-90 flex justify-between items-center py-4">
                <div class="flex items-center text-white gap-4 font-bold text-xl">
                    <a href="#" target="_blank" class="hover:text-sky-500 transition-color duration-200 ease-in">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" target="_blank" class="hover:text-sky-950 transition-color duration-200 ease-in">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" target="_blank" class="hover:text-red-600 transition-color duration-200 ease-in">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="#" target="_blank" class="hover:text-rose-600 transition-color duration-200 ease-in">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
                <div class="flex items-center  text-white">
                    <a href="https://palgoals.com" target="_blank" class=" hover:text-sky-500"> Palgoals </a>
                    2024 &copy;
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{asset('siteweb/js/plugins/tw-elements.umd.min.js')}}"></script>
    <script type="module" src="{{asset('siteweb/js/tailwind.js')}}"></script>
    <script src="{{asset('siteweb/js/plugins/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('siteweb/js/cart.js')}}"></script>
    <script src="{{asset('siteweb/js/main.js')}}"></script>



    <!-- for this page -->
    <script src="{{asset('siteweb/js/plugins/swiper-bundle.min.js')}}"></script>
    <script>

        function colseModal(id) {
            $(`#${id}`).modal('hide');
        }

        $('#categories li').click(function() {
            $('#categories li:gt(6)').hide();
            $('#fullScreen').addClass('hidden');

            $('#categories').removeClass('categories_all');
            $('#categories-container').css({
                'margin-bottom': '0',
            });
            $('#show-more').slideDown();
            $('#show-more-2').hide();
        });

        $('#fullScreen').click(function() {
            $('#categories li:gt(6)').hide();
            $('#fullScreen').addClass('hidden');

            $('#categories').removeClass('categories_all');
            $('#categories-container').css({
                'margin-bottom': '0',
            });
            $('#show-more').slideDown();
            $('#show-more-2').hide();
        });

        // قسم الأصناف من حيث عرض عدد معين
        // إخفاء العناصر التي تتجاوز الـ 6
        $('#categories li:gt(6)').hide();
        $('#show-more-2').hide();
        $('#show-less').hide();


        function showMore() {
            // إظهار 6 عناصر إضافية
            $('#categories li:hidden').slice(0, 6).slideDown();
            $('#show-more-2').slideDown();

            // إضافة كلاس لجميع العناصر
            $('#categories').addClass('categories_all');

            $('#fullScreen').removeClass('hidden');

            $('#categories-container').css({
                'margin-bottom': '158px',
            });
            // إذا كانت هناك عناصر مخفية بعد الإظهار، احتفظ بالزر، وإلا قم بإخفائه
            if ($('#categories li:hidden').length === 0) {
                $('#show-more').hide();
                $('#show-more-2').hide();
                $('#show-less').show();
            }
        }
        function showLess() {
            // إخفاء 6 عناصر مرئية
            $('#categories li:visible').slice(-6).slideUp();

            console.log($('#categories li:visible').length);
            // إذا كانت هناك عناصر مرئية بعد الإخفاء، احتفظ بالزر، وإلا أعد إظهار زر "عرض المزيد"
            if ($('#categories li:visible').length <= 15) {
                $('#show-more').show(); // إعادة إظهار زر "عرض المزيد"
                $('#show-more-2').show();
                $('#show-less').hide();
            }

            // إزالة كلاس إذا تم إخفاء العناصر
            if ($('#categories li:visible').length <= 15) {
                $('#categories').removeClass('categories_all');
                $('#fullScreen').addClass('hidden');
                $('#categories-container').css({
                    'margin-bottom': '0',
                });
            }
        }
    </script>
    <script>
        const swiper = new Swiper('.slider-wrapper', {
            loop: true,
            grabCursor: true,
            spaceBetween: 30,

            // Pagination bullets
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Responsive breakpoints
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            }
        });
        const swiperFavorites = new Swiper('.favorite-products.slider-wrapper', {
            loop: true,
            grabCursor: true,
            spaceBetween: 30,

            // Pagination bullets
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Responsive breakpoints
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 3
                }
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
