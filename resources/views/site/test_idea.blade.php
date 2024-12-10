@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$question_name = 'question_' . app()->currentLocale();
@endphp



@section('content')
    <link rel="stylesheet" href="{{asset('asset/css/test_idea.css')}}">
    <!-- Content -->
    <section class="my-20">
        <div class="container ">
            <h2 class="text-5xl font-semibold text-main uppercase mb-6 w-full text-center top__content">Test Your Idea</h2>
            <div class="flex flex-col justify-center items-center w-full">
                <!-- Progress Bar -->
                <div class="progress-bar w-[100%] md:w-3/4 flex items-center top__content mb-6 ">
                    @foreach ($questions as $index => $question)
                        <span class="progress-step {{$index == 0 ? 'completed' : ''}}">{{ $index + 1 }}</span>
                        @if ($index < $question->count() - 1)
                            <span class="progress-line flex-grow"></span>
                        @endif
                    @endforeach
                </div>
                <div class="w-full bg-[#F5F5F5] p-5">
                    <form action="{{route('site.show_answers')}}" method="post" id="myForm">
                        @csrf
                        @foreach ($questions as $question)
                        <!-- Step 1 -->
                        <div class="step-content" data-step="{{ $loop->iteration }}">
                            <h4 class="text-main font-medium mb-4">__ {{ $loop->iteration }}</h4>
                            <p class="mb-4">{{ $question->$question_name }}</p>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="questions[{{ $question->id }}]" value="yes" class="appearance-none peer w-4 h-4 border border-second rounded-full checked:bg-main checked:border-second focus:outline-none" {{ $question->answers->where('answer', 'yes')->first() != null ? 'checked' : '' }}>
                                <span class="ml-2 text-base font-light">Yes</span>
                            </label>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="questions[{{ $question->id }}]" value="no" class="appearance-none peer w-4 h-4 border border-second rounded-full checked:bg-main checked:border-second focus:outline-none" {{ $question->answers->where('answer', 'no')->first() != null ? 'checked' : '' }}>
                                <span class="ml-2 text-base font-light">No</span>
                            </label>
                        </div>
                        @endforeach
                    </form>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                </div>
                <div class="relative mb-3 bottom__content">
                    <button id="prevBtn" class="mt-2 px-8  py-4 text-gray-500 bg-gray-100 hover:bg-gray-300 hover:-translate-y-1 focus:bg-gray-300  transition-all duration-150 ease-in-out" disabled >
                        <i class="fa-solid fa-arrow-left ms-3"></i>
                        Back
                    </button>
                    <button id="nextBtn" type="button" class="mt-2 inline-block px-8  py-4 text-white bg-main hover:bg-second hover:-translate-y-1 focus:bg-second transition-all duration-150 ease-in-out" >
                        <span id="nextBtnText">Next</span>
                        <i class="fa-solid fa-arrow-right ms-3"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    @stop

    @section('scripts')

    <script>
        $(document).ready(function () {
            let currentStep = 1;
            const totalSteps = {{ $questions->count() }};

            function showStep(step) {
                // إظهار وإخفاء محتوى الخطوات
                $(".step-content").addClass("hidden");
                $(`.step-content[data-step="${step}"]`).removeClass("hidden");

                // تحديث مظهر شريط التقدم
                $(".progress-bar .progress-step").each(function (index) {
                    if (index + 1 < step) {
                        // الخطوات التي تم تجاوزها
                        $(this)
                            .removeClass("bg-white border border-[#B2B2B2] text-[#B2B2B2]")
                            .addClass("bg-second text-white completed");

                        // تغيير لون الخط بعد الخطوات المكتملة
                        $(this).next(".progress-line").addClass("done");
                    } else if (index + 1 === step) {
                        // الخطوة الحالية
                        $(this)
                            .removeClass("bg-white border border-[#B2B2B2] text-[#B2B2B2]")
                            .addClass("bg-second text-white p-2 relative after:absolute after:inset-0 after:-z-10 after:rounded-full after:border-2 after:border-second after:scale-125");
                    } else {
                        // الخطوات القادمة
                        $(this)
                            .removeClass("bg-second text-white completed p-2 relative after:absolute after:inset-0 after:-z-10 after:rounded-full after:border-2 after:border-second after:scale-125")
                            .addClass("bg-white border border-[#B2B2B2] text-[#B2B2B2]");
                        // إزالة اللون من الخط بعد الخطوات القادمة
                        $(this).next(".progress-line").removeClass("done").addClass("");
                    }
                });


                // تحديث الأزرار
                $("#prevBtn").prop("hidden", step === 1);
                $("#prevBtn").prop("disabled", step === 1);
                $("#nextBtnText").text(step === totalSteps ? "Submit" : "Next");
            }

            $("#nextBtn").on("click", function () {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    // alert("Form submitted!"); // يمكنك استبدالها بمنطق إرسال البيانات
                    $("#myForm").submit();
                }
            });

            $("#prevBtn").on("click", function () {
                if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                }
            });

            showStep(currentStep); // تهيئة الخطوة الأولى
        });
    </script>

    <script>
        sr.reveal(`.top__content`);
        sr.reveal(`.bottom__content`, { origin: 'bottom' });
    </script>

    @stop





