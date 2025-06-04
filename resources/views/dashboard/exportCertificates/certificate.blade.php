<head>
    <meta charset="UTF-8">
    <title>شهادة إنجاز</title>
    <style>
        @font-face {
            font-family: 'Amiri';
            src: url('{{ public_path("assets-dashboard/fonts/Amiri-Regular.ttf") }}') format('truetype');
        }

        @page {
            margin-left: 0mm;
            margin-right: 0mm;
            margin-top: 0mm;
            margin-bottom: 0mm;
            size: A4 landscape; /* التأكيد على الحجم والشكل */
        }

        html, body {
            margin: 0 !important; /* استخدم !important لزيادة الأولوية إذا لزم الأمر */
            padding: 0 !important; /* استخدم !important لزيادة الأولوية إذا لزم الأمر */
            width: 297mm; /* عرض A4 أفقي */
            height: 210mm; /* ارتفاع A4 أفقي */
            font-family: 'Amiri', 'DejaVu Sans', sans-serif;
            direction: rtl;
            position: relative;
            box-sizing: border-box;
            /* يمكنك تجربة إضافة overflow: hidden; هنا ولكن بحذر */
            /* overflow: hidden; */
        }

        .certificate-background {
            position: absolute;
            top: 0;
            /* right: 0; */
            left: 0;
            /* أو ببساطة: */
            /* right: 0; */
            /* width: 100%; */
            /* height: 100%; */
            /* الطريقة الأكثر ضمانًا هي تحديد كل الحواف: */
            /* top: 0; bottom: 0; left: 0; right: 0; */
            /* ولكن مع width و height 100% يجب أن يكون top و right كافيين في RTL */

            width: 297mm; /* تطابق عرض الصفحة تمامًا */
            height: 210mm; /* تطابق ارتفاع الصفحة تمامًا */
            z-index: -10; /* قيمة سالبة منخفضة جدًا لضمان أنها في الخلف */
        }

        .certificate-background img {
            width: 100%; /* تملأ حاوية .certificate-background */
            height: 100%; /* تملأ حاوية .certificate-background */
            display: block;
        }

        /* ... باقي الأنماط .name-field, .date-field ... */
        .name-field {
            position: absolute;
            top: 101mm;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            color: #000;
            z-index: 1; /* للتأكد أنها فوق الخلفية */
        }

        .date-field {
            position: absolute;
            bottom: 43mm;
            right: 82mm;
            font-size: 15px;
            color: #333;
            z-index: 1; /* للتأكد أنها فوق الخلفية */
        }
    </style>
</head>
<body>
    <div class="certificate-background">
        <img src="{{ public_path('assets-dashboard/files/template.jpg') }}" alt="خلفية الشهادة">
    </div>

    <div class="name-field">
        {{ $name }}
    </div>

    <div class="date-field">
        {{ $date }}
    </div>
</body>
</html>
