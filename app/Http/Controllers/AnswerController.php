<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{
    public function answer(Application $application)
    {
        Gate::authorize('answer-app');
        return view('answer.answer',['application'=>$application]);
    }

    public function answerStore(Request $request, Application $application)
    {
        Gate::authorize('answer-app');
        $request->validate([
            'answer'=>'required',
        ]);
        Answers::create([
            'application_id'=>$application->id,
            'answer'=>$request->answer,
        ]);
        return redirect()->route('dashboard')->with('success','Answer submitted successfully!');
    }
}
