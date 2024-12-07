<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Hero;
use App\Models\Partner;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'name_en' => 'Hero Slider',
            'name_ar' => 'بطل الشريحة',
            'title_en' => 'Welcome to Our Platform',
            'title_ar' => 'مرحبًا بكم في منصتنا',
            'description_en' => 'This is a hero slider for the main page.',
            'description_ar' => 'هذه شريحة البطل للصفحة الرئيسية.',
            'section' => 'Slider',
        ]);
        Hero::create([
            'name_en' => 'About Us',
            'name_ar' => 'من نحن',
            'title_en' => 'What Are tech touch',
            'title_ar' => 'من نحن',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.',
            'description_ar' => 'لوريم ايبسوم دولور سيت أميت، كونسيتيتور ساديبسينج إليتر، سد ديام نونومي إيرمود تيمبور إنفيدونت',
            'partner' => 5,
            'employee' => 27,
            'project' => 221,
            'section' => 'About',
        ]);
        Hero::create([
            'name_en' => 'services',
            'name_ar' => 'The Best Service We Offer',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat',
            'description_ar' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعا',
            'section' => 'Services',
        ]);
        Hero::create([
            'name_en' => 'Our Files',
            'name_ar' => 'ملفاتنا',
            'description_en' => 'The Secret To Success May Be Inside One Of The Files',
            'description_ar' => 'قد يكون سر النجاح داخل أحد الملفات',
            'section' => 'Files',
        ]);
        Hero::create([
            'name_en' => 'partners',
            'name_ar' => 'شركاء',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat',
            'description_ar' => 'د لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
            'section' => 'Partners',
        ]);
        Hero::create([
            'name_en' => 'Work',
            'name_ar' => 'أعمالنا',
            'title_en' => 'Improve & Enhance the Tech Projects',
            'title_ar' => 'تحسين وتعزيز المشاريع التقنية',
            'section' => 'Works',
        ]);
        Hero::create([
            'name_en' => 'OUR TEAM',
            'name_ar' => 'فريقنا',
            'title_en' => 'Meet Our Team',
            'title_ar' => 'تعرف على فريقنا',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat',
            'description_ar' => 'د لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
            'section' => 'Teams',
        ]);
        Hero::create([
            'name_en' => "CLIENT'S FEEDBACK",
            'name_ar' => 'ملاحظات العميل',
            'title_en' => 'What People Say About Us',
            'title_ar' => 'ماذا يقول الناس عنا',
            'section' => 'Feedback',
        ]);
        for ($i = 0; $i < 5; $i++) {
            Partner::create([
                'image' => '/asset/img/extra/partners-0' . $i . '.png',
                'link' => 'https://www.google.com/',
            ]);
        }
        for($i = 0; $i < 7; $i++) {
            Team::create([
                'name_en' => 'Name ' . $i,
                'name_ar' => 'اسم ' . $i,
                'Specialization_en' => 'Work ' . $i,
                'Specialization_ar' => 'عمل ' . $i,
                'image' => 'asset/img/extra/team-0' . $i . '.png',
            ]);
        }
        for($i = 0; $i < 5; $i++) {
            Client::create([
                'name_en' => 'Client ' . $i,
                'name_ar' => 'عميل ' . $i,
                'feedback_en' => 'Description ' . $i,
                'feedback_ar' => 'وصف ' . $i,
                'stars' => $i,
                'image' => 'asset/img/extra/feedback-0' . $i . '.png',
            ]);
        }
    }
}
