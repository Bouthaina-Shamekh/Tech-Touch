<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{




    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('dashboard.question.index', compact('questions'));
    }


    public function create()
    {
        return view('dashboard.question.create');
    }

    // تخزين السؤال والإجابات
    public function store(Request $request)
    {


        $request->validate([
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
             'answer' => 'required',
            // 'answer.*' => 'required|string',
        ]);



        // حفظ السؤال
        $question = Question::create([
            'question_en' => $request->question_en,
            'question_ar' => $request->question_ar,
        ]);



        Answer::create([
            'question_id' => $question->id,
            'answer' => $request->answer, // الإجابة التي اختارها المستخدم
        ]);

        // dd($request->all());

        return redirect()->route('admin.question.index');
    }

    // عرض نموذج تعديل السؤال
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('dashboard.question.edit', compact('question'));
    }


    public function update(Request $request, $id)
    {


// dd($request->all());

        $request->validate([
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
            'answer' => 'required|string',
        ]);

        $question = Question::findOrFail($id);

        $question->update([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,

        ]);


       $question->answers()->delete();


        Answer::create([
            'question_id' => $question->id,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.question.index');
    }

    // عرض تفاصيل السؤال مع الإجابات
    public function show($id)
    {
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();
        return view('dashboard.question.show', compact('question', 'answers'));
    }

    // حذف السؤال والإجابات المرتبطة به
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->answers()->delete(); // حذف الإجابات المرتبطة بالسؤال
        $question->delete(); // حذف السؤال نفسه

        return redirect()->route('admin.question.index');
    }


}
