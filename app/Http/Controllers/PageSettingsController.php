<?php

namespace App\Http\Controllers;

use App\PageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagedata = PageSettings::find(1);
        return view('admin.pagesettings',compact('pagedata'));
    }


    //Upadte FAQ Page Section Settings
    public function faq(Request $request)
    {
        $page = PageSettings::findOrFail(1);
        $input = $request->all();
        if ($request->f_status == ""){
            $input['f_status'] = 0;
        }
        $page->update($input);
        Session::flash('message', 'FAQ Page Content Updated Successfully.');
        return redirect('admin/pagesettings');
    }

    //Upadte Contact Page Section Settings
    public function contact(Request $request)
    {
        $page = PageSettings::findOrFail(1);
        $input = $request->all();
        if ($request->c_status == ""){
            $input['c_status'] = 0;
        }
        $page->update($input);
        Session::flash('message', 'Contact Page Content Updated Successfully.');
        return redirect('admin/pagesettings');
    }

}
