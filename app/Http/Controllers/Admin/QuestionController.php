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
        $this->authorize('create', Question::class);
        return view('dashboard.question.create');
    }

    // تخزين السؤال والإجابات
    public function store(Request $request)
    {

        $this->authorize('create', Question::class);

        $request->validate([
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            // 'answer.*' => 'required|string',
        ]);



        // حفظ السؤال
        $question = Question::create([
            'question_en' => $request->question_en,
            'question_ar' => $request->question_ar,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);



        Answer::create([
            'question_id' => $question->id,
            'answer' =>'yes', // الإجابة التي اختارها المستخدم
        ]);

        // dd($request->all());

        return redirect()->route('admin.question.index');
    }

    // عرض نموذج تعديل السؤال
    public function edit($id)
    {
        $this->authorize('edit', Question::class);
        $question = Question::findOrFail($id);
        return view('dashboard.question.edit', compact('question'));
    }


    public function update(Request $request, $id)
    {

        $this->authorize('edit', Question::class);

// dd($request->all());

        $request->validate([
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
        ]);

        $question = Question::findOrFail($id);

        $question->update([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);


       $question->answers()->delete();


        Answer::create([
            'question_id' => $question->id,
            'answer' => 'yes',
        ]);

        return redirect()->route('admin.question.index');
    }


    public function show($id)
    {
        $this->authorize('view', Question::class);
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();
        return view('dashboard.question.show', compact('question', 'answers'));
    }


    public function showAnswers(Request $request)
    {

    $questions = Question::whereHas('answers', function ($query) {
        $query->where('answer', 'no');
    })->with('answers')->get();

    return view('user.questions', compact('questions'));
    }


    public function destroy($id)
    {
        $this->authorize('delete', Question::class);
        $question = Question::findOrFail($id);
        $question->answers()->delete();
        $question->delete();

        return redirect()->route('admin.question.index');
    }


}
