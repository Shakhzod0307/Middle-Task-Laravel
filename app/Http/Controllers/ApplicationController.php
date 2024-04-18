<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $file = $request->file('file')->storeAs(
                'files',
                $name,
                'public',
            );
        }
        $request->validate([
            'subject'=>'required',
            'message'=>'required',
        ]);

        $application = Application::create([
            'user_id'=>Auth::id(),
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file_url'=>$file ?? null,
        ]);
        $application->save();
        SendEmailJob::dispatch($application);
        return redirect()->back()->with('success','Your application received successfully!');
    }
}
