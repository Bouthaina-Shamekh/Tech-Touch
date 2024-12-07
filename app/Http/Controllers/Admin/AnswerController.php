<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function index($questionId)
    {
        $question = Question::findOrFail($questionId);
        $answers = Answer::where('question_id', $questionId)->get();
        return view('answers.index', compact('question', 'answers'));
    }


    public function create($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('answers.create', compact('question'));
    }


    public function store(Request $request, $questionId)
    {

        $request->validate([
            'answer' => 'required|string|max:255',
        ]);


        $answerType = ($request->input('answer') == 'نعم') ? 'yes' : 'no';


        Answer::create([
            'question_id' => $questionId,
            'answer' => $request->input('answer'),
            'answer_type' => $answerType,
        ]);


        return redirect()->route('answers.index', $questionId)->with('success', 'تم إضافة الإجابة بنجاح');
    }


    public function edit($questionId, $id)
    {
        $question = Question::findOrFail($questionId);
        $answer = Answer::findOrFail($id);
        return view('answers.edit', compact('question', 'answer'));
    }


    public function update(Request $request, $questionId, $id)
    {

        $request->validate([
            'answer' => 'required|string|max:255',
        ]);


        $answer = Answer::findOrFail($id);
        $answerType = ($request->input('answer') == 'نعم') ? 'yes' : 'no';

        $answer->update([
            'answer' => $request->input('answer'),
            'answer_type' => $answerType,
        ]);


        return redirect()->route('answers.index', $questionId)->with('success', 'تم تعديل الإجابة بنجاح');
    }


    public function destroy($questionId, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();

     
        return redirect()->route('answers.index', $questionId)->with('success', 'تم حذف الإجابة بنجاح');
    }
}
