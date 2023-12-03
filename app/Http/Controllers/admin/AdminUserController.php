<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\admin\AdminUser;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = User::latest();

        if(request('search')){
            $user->where('posisi', 0)->where('username', 'like', '%' .request('search') . '%');
        }
        return view('admin.user.index', [
           'data' => $user->paginate(10),
           'tittle' => 'User',
           'count_user' => User::get(),

        ]);
      
    }

    public function MakeAdmin($id){
        $proses = User::where('id',$id)->update([
            'posisi' => true
        ]);

        if($proses){
            return redirect()->back()->with('toast_success', 'Success Make Admin');
        }else{
            return redirect()->back()->with('toast_error', 'Failed Make Admin');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $adminUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $adminUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUser $adminUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('id',$id)->first();
        $count_admin = User::where('posisi', true)->get();
        if($count_admin->count() == 1){
            if($user->posisi == true){
                return redirect()->back()->with('toast_error', 'Failed Delete, Because You is admin');
            }
        }
        User::find($id)->delete();

        return redirect('/user');
    }
}
