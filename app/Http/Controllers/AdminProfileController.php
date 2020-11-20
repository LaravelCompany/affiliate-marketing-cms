<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        //$this->userid = Auth::user()->id;
    }

    /**
     * @return Factory|Application|View
     */
    public function index()
    {
        $admin = User::find(Auth::user()->id);
        return view('admin.adminprofile' , compact('admin'));
    }

    /**
     * Prints the view for changing the admin password
     * @method password
     * @param User $user
     * @return Factory|Application|View
     */
    public function password(User $user)
    {
        $admin = $user->find(Auth::user()->id);

        return view('admin.adminchangepass' , compact('admin'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')){
            $photo = time().$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/admin',$photo);
            $input['photo'] = $photo;
        }

        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Doesnot match.');
                    return redirect('admin/adminprofile');
                }
            }else{
                Session::flash('error', 'Admin Profile Updated Successfully.');
                return redirect('admin/adminprofile');
            }
        }

        $user->update($input);
        Session::flash('message', 'Admin Profile Updated Successfully.');
        return redirect('admin/adminprofile');
    }

    /**
     * @method
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function changePass(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input['password'] = "";
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Does not match.');
                    return redirect('admin/adminpassword');
                }
            }else{
                Session::flash('error', 'Current Password Does not match');
                return redirect('admin/adminpassword');
            }
        }

        $user->update($input);
        Session::flash('message', 'Admin Password Updated Successfully.');
        return redirect('admin/adminpassword');
    }

}
