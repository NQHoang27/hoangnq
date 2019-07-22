<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Team;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $countusers = DB::table('users')->count();
      $listUser = User::orderBy('id', 'DESC')->search()->paginate(6);
      return view('admin.user.list',compact('listUser', 'countusers'));
    }
    
    public function create()
    {
      $listTeam = Team::all();
      $listUser = User::all();
      return view('admin.user.add', compact('listUser', 'listTeam'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->id_teams = $request->id_teams;
      $user->remember_token = $request->_token;
      $user->save();
      return redirect()->route('tai-khoan')->with(['level' => 'success', 'message' => 'Thêm mới người dùng thành công!']);
    }
    /**
     * Edit the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $listUsers = User::find($id);
     return view('admin.user.edit', ['listUsers' => $listUsers, 'listTeam' => Team::where('id', '<>', $id)->get()]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserRequest $request)
    {  
      $user = User::find($id);  
      $user->update([       
        'name' => $request->get('name'), 
        'email' => $request->get('email'),
        'password' => bcrypt($request->password),
        'id_teams' => $request->get('id_teams'),
      ]);
      return redirect()->route('tai-khoan')->with(['level' => 'success', 'message' => 'Cập nhật thành viên thành công!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::destroy($id);
      return redirect()->route('tai-khoan')->with(['level' => 'success', 'message' => 'Xóa tài khoản thành công!']);
    }
  }
