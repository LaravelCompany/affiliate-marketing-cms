<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Illuminate\Support\Facades\Session;
use Auth;
class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lang()
    {
        $data = Language::findOrFail(1);
        return view('admin.language',compact('data'));
    }

    public function langup(Request $request)
    {   
        $ida = Auth::user()->id;   
        $input = $request->all(); 
        $lang = Language::findOrFail(1);                 
        $lang->update($input);
        return redirect()->route('admin-lang-index')->with('message','Data Updated Successfully.');
    }
}
