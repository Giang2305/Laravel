<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{    
    public function index_user(){
        return view('users.index');
    }

    public function edit_own_account()
    {
        $user = Auth::user();
        return view('users.account', compact('user'));
    }

    public function update_own_account(Request $request)
    {
        $user = Auth::user();
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = $request->password;
        }

        DB::table('users')->where('id', $user->id)->update($data);

        return redirect()->route('users.account.edit')->with('success', 'Account updated successfully.');
    }
    
    public function show_index(){
        $all_user = DB::table('users')->get();
        return view('admin.user.index', compact('all_user'));
    }

    public function index(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('users')->where('Email', $admin_email)->where('Password', $admin_password)->first();
        if ($result) {
            $all_user = DB::table('users')->get();
            return view('admin.user.index', compact('all_user'));
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng.');
        }
    }

    public function all_user()
    {
        $all_user = DB::table('users')->get();
        return view('admin.user.index', compact('all_user'));
    }

    public function show_create_user(){
        return view('admin.user.create_user');
    }

    public function create_user(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if ($request->password) {
            $data['password'] = $request->password;
        }
        $data['utype'] = $request->level; // Make sure to use the correct input name

        DB::table('users')->insert($data);

        return redirect()->route('all_user')->with('success', 'User created successfully.');
    }

    public function show_edit_user($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return redirect()->route('all_user')->with('error', 'User not found.');
        }
        return view('admin.user.edit_user', compact('user'));
    }

    
    public function edit_user(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if ($request->password) {
            $data['password'] = $request->password;
        }
        $data['utype'] = $request->utype;
        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('all_user')->with('success', 'User edited successfully.');
    }
    public function delete_user($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('all_user')->with('success', 'User deleted successfully.');
    }

    public function detail_user($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $all_user = DB::table('users')->get();
        return view('admin.user.detail_user')->with('all_user', $all_user);
    }
}
