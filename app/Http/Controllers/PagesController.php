<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        $projects = \App\Models\Project::orderBy('id', 'desc')->limit(4)->get();
        $file = \App\Models\File::first();

        return view('welcome', compact('projects', 'file'));
    }

    public function portfolio(){
        $projects = \App\Models\Project::orderBy('id', 'desc')->paginate(4);
        return view('portfolio', compact('projects'));
    }

    public function sendMessage(Request $request){

        // return $request;
        $request->validate(array(
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ));

        \App\Models\Message::create($request->all());

        return back()->with('success', 'Your message sent');
    }

    public function getMessage(){
        $getMessages = \App\Models\Message::orderBy('id', 'desc')->paginate(10);
        return view('admin.getMessage', compact('getMessages'));
    }

    public function showMessage($id){

        $getMessage = \App\Models\Message::find($id);
        $getMessage->update(['status' => 1]);
        return view('admin.showMessage', compact('getMessage'));
    }

    public function deletetMessage($id)
    {

        \App\Models\Message::find($id)->delete();

        return redirect()->route('getMessage')->with('success', 'Delete done');
    }
    public function logins(){
        $logins =DB::table('logins')->orderBy('id', 'desc')->paginate(10);
        return view('admin.logins', compact('logins'));
    }
}
