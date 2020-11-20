<?php

namespace App\Http\Controllers;

use App\SeoTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeoToolsController extends Controller
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
        $tools = SeoTools::find(1);
        return view('admin.seotools',compact('tools'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param SeoTools $seoTools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SeoTools $seoTools)
    {
        $tool = $seoTools->findOrFail($id);
        $data = $request->all();
        $tool->update($data);
        Session::flash('message', 'Seo Tools Settings Updated Successfully.');
        return redirect('admin/tools');
    }

}
