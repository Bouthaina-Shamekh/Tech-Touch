@php
use App\Models\Setting;
$sections = Setting::where('key','sections_show')->first() ? json_decode(Setting::where('key','sections_show')->first()->value) : [];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Touch</title>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}" type="image/x-icon">

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Normalize css -->
    <link rel="stylesheet" href="{{asset('asset/css/normalize.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset/css/all.min.css')}}">

    <!-- Tailwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="{{asset('asset/css/tailwind.css')}}">

    <!-- Slide -->
    <link rel="stylesheet" href="{{asset('asset/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/slide.css')}}">


    <!-- My css -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>

<body class="min-h-screen relative overflow-x-hidden" style="padding-right: 0 !important;">
        <!-- Header -->
        <header>
            <!-- Main navigation container -->
            <nav class="flex-no-wrap relative flex w-full items-center justify-center bg-white py-2 lg:flex-wrap lg:justify-center lg:py-4">
                <div class="container flex w-full flex-wrap items-center justify-between px-3">
                    <!-- Logo -->
                    <a class="logo__hero mx-2 my-1 flex items-center lg:mb-0 lg:mt-0" href="./index.html">
                        <img class="me-2" src="{{asset('asset/img/logoBrand.png')}}" style="height: 35px" alt="TE Logo" loading="lazy" />
                    </a>

                    <!-- Collapsible navigation container -->
                    <div class="!visible hidden basis-[100%] items-center lg:!flex lg:basis-auto" id="navbarSupportedContent1" data-twe-collapse-item>
                        <!-- navigation links -->
                        <ul class="list-style-none me-auto flex flex-col ps-0 lg:flex-row" data-twe-navbar-nav-ref>
                            <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
                                <a class="{{ request()->is('/') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.index') }}" data-twe-nav-link-ref>Home</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->about == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('about') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2 " href="{{route('site.about')}}" data-twe-nav-link-ref>About</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->services == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('services') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.services') }}" data-twe-nav-link-ref>Services</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->work == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('portfolios') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.portfolios') }}" data-twe-nav-link-ref>Portfolio</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->files == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('file/*') || request()->is('file') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.files') }}" data-twe-nav-link-ref>Files</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->contact == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('contact') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.contact') }}" data-twe-nav-link-ref>Content</a>
                            </li>

                        </ul>
                        <!-- links -->
                    </div>

                    <!-- Right elements -->
                    <div class="right__hero relative hidden lg:!flex items-center ">
                        <div class="relative group">
                            <a href="{{route('site.consultation')}}" class="inline-block bg-second px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-dark hover:shadow-md focus:bg-dark focus:shadow-md focus:outline-none focus:ring-0 active:bg-dark active:shadow-md motion-reduce:transition-none">
                            Free Consultation
                            </a>
                            <div class="absolute top-1/2 -right-[16px] -translate-y-1/2 group-hover:transform group-hover:rotate-90 group-hover:-translate-y-1/2 group-hover:-translate-x-1/3 transition-all delay-200 ease-in">
                                <img src="{{asset('asset/img/icon/arrow-down.png')}}" alt="" width="33px">
                            </div>
                        </div>
                    </div>
                    <!-- Right elements -->
                    <!-- Hamburger button for mobile view -->
                    <button
                        type="button"
                        class="block border-0 bg-transparent px-2 text-black/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                        data-twe-toggle="modal"
                        data-twe-target="#NavBar"
                        data-twe-ripple-init
                        data-twe-ripple-color="light"
                    >
                    <span class="[&>svg]:w-7 [&>svg]:stroke-black/50 dark:[&>svg]:stroke-neutral-200">
                        <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">                      <path
                                fill-rule="evenodd"
                                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                            </svg>
                    </span>
                    </button>
                </div>
            </nav>
        </header>

  

    @yield('content')


     <!-- Footer -->
    @php
        $settings = \App\Models\Setting::get();
        

    @endphp
    <footer class="footer w-full py-3 bg-[#F5F5F5] ">
        <div class="container">
            <div class="flex justify-between items-start gap-12 md:gap-40 flex-wrap">
                <div class="flex flex-col flex-1 justify-start items-start my-4">
                    <a class="logo__hero my-2 flex items-center hover:pl-2 transition-all delay-150 ease-in" href="./index.html">
                        @if($settings->where('key', 'logo')->first() != null)
                        <img class="me-2" src="{{ asset( 'uploads/logos/'.$settings->where('key', 'logo')->first()->value )}}" style="height: 50px" alt="TE Logo" loading="lazy" />
                        @else
                        <img class="me-2" src="{{asset('asset/img/logoBrand.png')}}" style="height: 50px" alt="TE Logo" loading="lazy" />
                        @endif
                    </a>
                    @if (App::getLocale() == 'ar')
                        @if($settings->where('key', 'titel_en')->first() != null)
                        <p class="text__footer text-second font-light text-base">{!!$settings->where('key', 'titel_ar')->first()->value!!}</p>
                        @else
                        <p class="text__footer text-second font-light text-base">وصف الموقع</p>
                        @endif
                    @else
                        @if($settings->where('key', 'titel_en')->first() != null)
                        <p class="text__footer text-second font-light text-base">{!!$settings->where('key', 'titel_en')->first()->value!!}</p>
                        @else
                        <p class="text__footer text-second font-light text-base">Site Description</p>
                        @endif
                    @endif
                </div>
                <div class="flex flex-col flex-1 justify-start items-start my-4">
                    <h3 class="text-3xl text-second uppercase mb-4 top__footer">Pages</h3>
                    <div class="flex justify-between items-start w-full">
                    <ul class="flex flex-col justify-start items-start w-1/2">
                            <li class="links__footer my-1"><a class="text-main pl-2 hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in font-light uppercase text-base" href="./index.html">Home</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/about.html">About Us</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/services.html">Services</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/portfolios.html">Portfolio</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/files.html">Files</a></li>
                        </ul>
                        <ul class="flex flex-col justify-start items-start w-1/2">
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/terms_conditions.html">Terms Of Payment</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/contact.html">Content</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/test_idea.html">Test Idea</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/our_comment.html">Our Comment</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/payment_method.html">Pyment Method</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col flex-1 justify-start items-center md:items-start  my-4">
                    <h3 class="text-3xl text-second uppercase mb-4 top__footer">social media</h3>
                    <div class="flex justify-between items-start gap-5">
                        <a href="{{$settings->where('key', 'instagram')->first() != null ? $settings->where('key', 'instagram')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{$settings->where('key', 'linkedin')->first() != null ? $settings->where('key', 'linkedin')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="{{$settings->where('key', 'snapshat')->first() != null ? $settings->where('key', 'snapshat')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-snapchat"></i>
                        </a>
                        <a href="{{$settings->where('key', 'twitter')->first() != null ? $settings->where('key', 'twitter')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center border-t border-[#DBDBDB] pt-2 bottom__footer">
            <p class="text-[#909090] font-light text-base uppercase">© All Copyright 2023 by tech touch</p>
        </div>
    </footer>

    <div data-twe-modal-init class="fixed left-0 top-0 z-[1055] hidden h-[100vh] w-full overflow-y-auto overflow-x-hidden outline-none pr-0" id="NavBar" tabindex="-1" aria-labelledby="NavBar" aria-modal="true" role="dialog">
        <div data-twe-modal-dialog-ref class="pointer-events-none relative w-auto h-full translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-8 min-[576px]:max-w-[500px] min-[992px]:max-w-[666px] my-5 mx-4 flex justify-center items-center">
            <div class="pointer-events-auto relative flex w-[86%] flex-col border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark rounded-2xl">
                <!-- Modal body -->
                <div class="relative p-4">
                    <ul class="flex flex-col justify-start items-start w-100">
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('/') || request()->is('/') ? 'text-main' : 'text-dark' }} pl-2 hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in font-light uppercase text-base" href="{{ route('site.index') }}">Home</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('about/*') || request()->is('about') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.about') }}">About Us</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('services/*') || request()->is('services') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.services') }}">Services</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('portfolios/*') || request()->is('portfolios') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.portfolios') }}">Portfolio</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('files/*') || request()->is('files') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.files') }}">Files</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('contact/*') || request()->is('contact') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.contact') }}">Content</a></li>
                    </ul>
                    <div class="right__hero relative !flex items-center justify-center py-2">
                        <div class="relative group">
                            <a href="{{route('site.consultation')}}" class="inline-block bg-second px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-dark hover:shadow-md focus:bg-dark focus:shadow-md focus:outline-none focus:ring-0 active:bg-dark active:shadow-md motion-reduce:transition-none">
                            Free Consultation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <!-- JQuery -->
    <script src="{{asset('asset/js/plugins/jquery-3.7.1.min.js')}}"></script>
    <!-- Tailwind Elements -->
    <script src="{{asset('asset/js/plugins/tw-elements.umd.min.js')}}"></script>
    <script type="module" src="{{asset('asset/js/tailwind.js')}}"></script>
    <!-- Slide -->
    <script src="{{asset('asset/js/plugins/swiper-bundle.min.js')}}"></script>

    <!-- ScrollReveal -->
    <!-- <script src="{{asset('asset/js/plugins/scrollreveal.min.js')}}"></script> -->
    <script src="{{asset('asset/js/plugins/gsap.min.js')}}"></script>
    <script src="{{asset('asset/js/plugins/ScrollTrigger.min.js')}}"></script>

    <!-- Scroll Anemation All sections -->
    <script src="{{asset('asset/js/scrollGsap.js')}}"></script>

    <!-- My JS -->
    <script src="{{asset('asset/js/main.js')}}"></script>


    <!-- Hero -->
    <script>
        $(document).ready(function () {
            // استهداف جميع عناصر الفقرات داخل القسم
            const $paragraphs = $('#hero-texts .hero-paragraph');
            const totalParagraphs = $paragraphs.length;
            let currentIndex = 0;
            const $progressBar = $('#progress-bar');

            // وظيفة لتحديث الفقرة الظاهرة وشريط التقدم
            function updateParagraph(index) {
                $paragraphs.hide().eq(index).fadeIn(); // إخفاء جميع الفقرات وإظهار الحالية
                $progressBar.css('width', `${((index + 1) / totalParagraphs) * 100}%`); // تحديث عرض شريط التقدم
            }

            // الانتقال إلى الفقرة التالية
            function nextParagraph() {
                currentIndex = (currentIndex + 1) % totalParagraphs;
                updateParagraph(currentIndex);
            }

            // الانتقال إلى الفقرة السابقة
            function prevParagraph() {
                currentIndex = (currentIndex - 1 + totalParagraphs) % totalParagraphs;
                updateParagraph(currentIndex);
            }

            // ربط الأزرار بوظائف التنقل
            $('#next-btn').on('click', nextParagraph);
            $('#prev-btn').on('click', prevParagraph);

            // التبديل التلقائي كل 3 ثوانٍ
            setInterval(nextParagraph, 3000);

            // إظهار الفقرة الأولى عند بدء التشغيل
            updateParagraph(currentIndex);
        });
    </script>

    <!-- About -->
    <script>
        // دالة العد التدريجي
        function animateCounter(element) {
            const target = parseInt(element.getAttribute("data-target")); // قيمة الهدف
            const duration = 2; // مدة العد
            const increment = target / (duration * 60); // زيادة تدريجية (60 إطار في الثانية)

            let count = 0; // بدء العد
            const updateCounter = () => {
                count += increment; // زيادة تدريجية
                if (count >= target) {
                    count = target; // توقف عند الهدف
                    gsap.ticker.remove(updateCounter); // إيقاف التحديث
                }
                element.textContent = Math.floor(count); // تحديث النص
            };

            gsap.ticker.add(updateCounter); // تحديث عند كل إطار
        }
        // تفعيل العد عند وصول العنصر
        document.querySelectorAll('.counter').forEach(counter => {
            ScrollTrigger.create({
                trigger: counter,
                start: "top 85%", // يبدأ عند وصول العنصر إلى الشاشة
                onEnter: () => animateCounter(counter), // يبدأ العد عند الوصول
            });
        });
    </script>

    <!-- Files -->
    <script>
        $(document).ready(function () {
            // استهداف الحاوية التي تحتوي على العناصر
            const $itemsContainer = $('#files_view');
            const $items = $itemsContainer.children();
            const itemsPerPage = 6; // عدد العناصر في كل صفحة
            const totalItems = $items.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            let currentPage = 0;

            // عناصر التحكم
            const $progressBar = $('#progress-bar-files');
            const $prevBtn = $('#prev-btn-files');
            const $nextBtn = $('#next-btn-files');

            // تحديث العرض وشريط التقدم
            function updateDisplay() {
                // إخفاء كل العناصر
                $items.hide();

                // إظهار العناصر التي تخص الصفحة الحالية
                const startIndex = currentPage * itemsPerPage;
                const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
                $items.slice(startIndex, endIndex).fadeIn();

                // تحديث شريط التقدم
                const progressWidth = ((currentPage + 1) / totalPages) * 100;
                $progressBar.css('width', `${progressWidth}%`);
            }

            // الانتقال إلى الصفحة التالية
            function nextPage() {
                if (currentPage < totalPages - 1) {
                    currentPage++;
                    updateDisplay();
                }
            }

            // الانتقال إلى الصفحة السابقة
            function prevPage() {
                if (currentPage > 0) {
                    currentPage--;
                    updateDisplay();
                }
            }

            // ربط الأزرار بوظائف التنقل
            $nextBtn.on('click', nextPage);
            $prevBtn.on('click', prevPage);

            // عرض الصفحة الأولى عند بدء التشغيل
            updateDisplay();
        });

    </script>

    <!-- works -->
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
                1200: {
                    slidesPerView: 4
                }
            }
        });
    </script>

    <!-- out team -->
    <script>
        const content = document.querySelector('.scroll-wrapper');
        const overlay = document.createElement('div');

        // إضافة الشريط الشفاف كطبقة فوق المحتوى
        overlay.classList.add('scroll-overlay');
        document.querySelector('.scroll-wrapper').appendChild(overlay);

        let isScrolling = false;
        let startX;
        let scrollLeft;

        // أحداث الفأرة للتحكم بالتمرير
        overlay.addEventListener('mousedown', (e) => {
            isScrolling = true;
            startX = e.pageX - overlay.offsetLeft;
            scrollLeft = content.scrollLeft;
        });

        overlay.addEventListener('mouseleave', () => {
            isScrolling = false;
        });

        overlay.addEventListener('mouseup', () => {
            isScrolling = false;
        });

        overlay.addEventListener('mousemove', (e) => {
            if (!isScrolling) return;
            const x = e.pageX - overlay.offsetLeft;
            const walk = (x - startX) * 2; // تعديل سرعة التمرير
            content.scrollLeft = scrollLeft - walk;
        });


        // التعديل على الحجم
        $(document).ready(function() {
            // حدد القسم المستهدف
            let recCount = $(".scroll-wrapper .content .rec").length;
            let imgCount = $(".scroll-wrapper .content img").length;

            let widthContent = (recCount * 270) + ((recCount - 1) * 200);
            $(".scroll-wrapper .content").width(widthContent);
        });


    </script>

    <!-- client's feedback -->
    <script>
        $(document).ready(function () {
            const slider = $('#image-slider');
            const reviews = $(".review");
            function updateContent(clientId) {
                reviews.removeClass("active");
                $(`.review[data-client="${clientId}"]`).addClass("active");
            }

            slider.on('click', 'img', function () {
                const clicked = $(this); // العنصر الذي تم النقر عليه
                const currentActive = slider.find('.active'); // العنصر النشط حالياً
                const clientId = $(this).data('client');
                if (!clicked.hasClass('active')) {
                    currentActive.removeClass('active').addClass('inactive'); // اجعل العنصر النشط الحالي غير نشط
                    clicked.removeClass('inactive').addClass('active'); // اجعل العنصر الذي تم النقر عليه نشطاً

                    const clickedIndex = clicked.index();
                    const totalImages = slider.children().length;

                    const centerIndex = 2; // الموقع الثالث (0-based index)
                    const offset = clickedIndex - centerIndex;

                    const reorderedImages = [];

                    // إضافة تأثيرات الحركة قبل الترتيب
                    slider.children().each(function (index) {
                        if (index < clickedIndex) {
                            $(this).addClass('slide-left'); // إزاحة لليسار
                        } else if (index > clickedIndex) {
                            $(this).addClass('slide-right'); // إزاحة لليمين
                        }
                    });

                    setTimeout(() => {
                        // إعادة ترتيب الصور
                        for (let i = 0; i < totalImages; i++) {
                            const newIndex = (i - offset + totalImages) % totalImages;
                            reorderedImages[newIndex] = slider.children().eq(i);
                        }

                        slider.empty();
                        reorderedImages.forEach(img => {
                            $(img).removeClass('slide-left slide-right').addClass('fade-in'); // تأثير الظهور
                            slider.append(img);
                        });
                        // الانتظار لمدة 5 ثوانٍ قبل إزالة تأثير الظهور
                        setTimeout(() => {
                            reorderedImages.forEach(img => {
                                $(img).removeClass('fade-in'); // تأثير الظهور
                            });
                        }, 3000); // 5000ms = 5 ثوانٍ
                    }, 300); // الانتظار لإنهاء الحركة
                }
                updateContent(clientId);  // تحديث النصوص
            });
        });
    </script>

    <!-- client's feedback -->
    <script>
        $(document).ready(function () {
            const slider = $('#image-slider');
            const reviews = $(".review");
            function updateContent(clientId) {
                reviews.removeClass("active");
                $(`.review[data-client="${clientId}"]`).addClass("active");
                // $(".img__client[data-client="${clientId}"]").addClass("active");
            }

            slider.on('click', 'img', function () {
                const clicked = $(this); // العنصر الذي تم النقر عليه
                const currentActive = slider.find('.active'); // العنصر النشط حالياً
                const clientId = $(this).data('client');
                if (!clicked.hasClass('active')) {
                    currentActive.removeClass('active').addClass('inactive'); // اجعل العنصر النشط الحالي غير نشط
                    clicked.removeClass('inactive').addClass('active'); // اجعل العنصر الذي تم النقر عليه نشطاً

                    const clickedIndex = clicked.index();
                    const totalImages = slider.children().length;

                    const centerIndex = 2; // الموقع الثالث (0-based index)
                    const offset = clickedIndex - centerIndex;

                    const reorderedImages = [];

                    // إضافة تأثيرات الحركة قبل الترتيب
                    slider.children().each(function (index) {
                        if (index < clickedIndex) {
                            $(this).addClass('slide-left'); // إزاحة لليسار
                        } else if (index > clickedIndex) {
                            $(this).addClass('slide-right'); // إزاحة لليمين
                        }
                    });

                    setTimeout(() => {
                        // إعادة ترتيب الصور
                        for (let i = 0; i < totalImages; i++) {
                            const newIndex = (i - offset + totalImages) % totalImages;
                            reorderedImages[newIndex] = slider.children().eq(i);
                        }

                        slider.empty();
                        reorderedImages.forEach(img => {
                            $(img).removeClass('slide-left slide-right').addClass('fade-in'); // تأثير الظهور
                            slider.append(img);
                        });
                        // الانتظار لمدة 5 ثوانٍ قبل إزالة تأثير الظهور
                        setTimeout(() => {
                            reorderedImages.forEach(img => {
                                $(img).removeClass('fade-in'); // تأثير الظهور
                            });
                        }, 3000); // 5000ms = 5 ثوانٍ
                    }, 300); // الانتظار لإنهاء الحركة
                }
                updateContent(clientId);  // تحديث النصوص
            });
            updateContent(3);
        });
    </script>

    @yield('scripts')
</body>
</html>
