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
        $questions = Question::all();
        return view('dashboard.question.index', compact('questions'));
    }


    public function create()
    {
        // $questions = new Question();
        // $answer = new Answer();
        return view('dashboard.question.create');
    }


    public function store(Request $request)
{


    dd($request->all());
    $request->validate([
        'question_en' => 'required|string|max:255',
        'question_ar' => 'required|string|max:255',
        // 'answers' => 'required|array',
        'answer_type' => 'in:yes,no',  // تأكد من الإجابة الصحيحة
    ]);

    // dd($request->all());

    // تخزين السؤال
    $question = Question::create([
        'question_en' => $request->input('question_en'),
        'question_ar' => $request->input('question_ar'),
    ]);

    // تخزين الإجابات المرتبطة بالسؤال
    foreach ($request->answer_type as $answer) {
        $answerType = ($answer == 'نعم') ? 'yes' : 'no';  // تعديل من 'نعم' إلى 'yes'

        Answer::create([
            'question_id' => $question->id,
            'answer_en' => $answer, // الإجابة بالإنجليزية
            'answer_ar' => $answer, // الإجابة بالعربية
            'answer_type' => $answerType,
        ]);
    }

    return redirect()->route('question.index')->with('success', 'تم إضافة السؤال والإجابات بنجاح');
}


    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();
        return view('questions.edit', compact('question', 'answers'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'question_en' => 'required|string|max:255',
        'question_ar' => 'required|string|max:255',
        // 'answers' => 'required|array',
        'answer_type' => 'in:yes,no',
    ]);

    // تحديث السؤال
    $question = Question::findOrFail($id);
    $question->update([
        'question_en' => $request->input('question_en'),
        'question_ar' => $request->input('question_ar'),
    ]);

    // حذف الإجابات القديمة
    Answer::where('question_id', $id)->delete();

    // إضافة الإجابات الجديدة
    foreach ($request->answer_type as $answer) {
        $answerType = ($answer == 'نعم') ? 'yes' : 'no';

        Answer::create([
            'question_id' => $id,
            'answer_en' => $answer,
            'answer_ar' => $answer,
            'answer_type' => $answerType,
        ]);
    }

    return redirect()->route('question.index')->with('success', 'تم تعديل السؤال والإجابات بنجاح');
}


    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();


        Answer::where('question_id', $id)->delete();


        return redirect()->route('question.index')->with('success', 'تم حذف السؤال والإجابات بنجاح');
    }


}
