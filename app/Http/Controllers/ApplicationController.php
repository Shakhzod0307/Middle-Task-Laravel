<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $files = $request->file('file')->store('public');
            $file = Storage::url($files);
        }
        $request->validate([
            'subject'=>'required',
            'message'=>'required',
        ]);

        Application::create([
            'user_id'=>Auth::id(),
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file_url'=>$file ?? null,
        ]);
        return redirect()->back()->with('success','Your application received successfully!');
    }
}
