<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('Users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|unique:users',
            'password'=>'required|confirmed'
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $result = User::create($input);

        if ($result) {
            $role = Role::findOrFail($input['role_id']);
            $result->roles()->attach($role);
            Session::flash('message', 'You have successfully created User');
        }
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        $role_user = '';
        $arole_user = DB::table('user_role')->where('user_id', $user->id)->first();
        if (!empty($arole_user)) {
            $role_user = $arole_user;
        }

        return view('Users.edit', compact('user', 'roles', 'role_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password'=>'confirmed'
        ]);
        $user = User::findOrFail($id);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
            $user->password =$input['password'];
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $result = $user->save();
        if ($result) {
            $user->roles()->detach();
            $role = Role::findOrFail($input['role_id']);
            $user->roles()->attach($role);
            Session::flash('message', 'You have successfully updated User');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        return redirect()->back();
    }
}
