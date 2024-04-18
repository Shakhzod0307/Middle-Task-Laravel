<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Jobs\SendEmailJob;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

    public function store(ApplicationRequest $request)
    {
        if($this->checkDate()){
            return redirect()->back()->with('error','You can not add more than one in a day');
        };
        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $file = $request->file('file')->storeAs(
                'files',
                $name,
                'public',
            );
        }
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

    protected function checkDate()
    {
        if(auth()->user()->applications()->latest()->first()) {
            $last_app = auth()->user()->applications()->latest()->first();
            $last_day = Carbon::parse($last_app->created_at)->format('Y-m-d');
            $today = Carbon::now()->format('Y-m-d');
            if ($last_day === $today){
                return true;
            }
        }
    }
}
