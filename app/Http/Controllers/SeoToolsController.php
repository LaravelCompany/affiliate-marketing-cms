<?php
namespace App\Http\Controllers;

use App\SeoTools;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

/**
 * Class SeoToolsController
 * @package App\Http\Controllers
 */
class SeoToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @method index
     * @param SeoTools $seoTools
     * @return Factory|Application|View
     */
    public function index(SeoTools $seoTools)
    {

        $tools = $seoTools->firstOrFail();

        return view('admin.seo',compact('tools'));
    }


    /**
     * Update the specified resource in storage.
     * @method update
     * @param Request $request
     * @param int $id
     * @param SeoTools $seoTools
     * @return Application|RedirectResponse|Response|Redirector
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
