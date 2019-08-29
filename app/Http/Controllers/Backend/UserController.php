<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Contracts\IUserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Team;
use Hash;
use DB;


class UserController extends Controller 
{
    /**
     * [$successStatus description]
     * @var integer
     */
    public $successStatus = 200;
    protected $user;

    public function __construct(IUserRepository $user)  
    {
      $this->user = $user;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
      $countUsers = DB::table('users')->count();
      $listUser = $this->user->getAll();
      return view('admin.user.list', compact('listUser', 'countUsers'));
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
      $this->user->update();
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
