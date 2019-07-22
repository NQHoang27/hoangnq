<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Model\User;
use App\Model\Team;
use Validator;
use Hash;
use DB;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $countusers = DB::table('users')->count();
        $listUser = User::orderBy('id', 'DESC')->search()->paginate(6);
        return view('admin.user.list', compact('listUser', 'countusers'));
    }

    /**
    * Create a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $listTeam = Team::all();
        $listUser = User::all();
        return view('admin.user.add', compact('listUser','listTeam'));
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
        $user->save();
        return redirect()->route('user.index')->with(['level' => 'success', 'message' => 'Thêm mới người dùng thành công!']);
    }

    /**
    * Edit the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Model\User  $user
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
    * @param  \App\Model\User  $user
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
        return redirect()->route('user.index')->with(['level' => 'success', 'message' => 'Cập nhật thành viên thành công!']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Model\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with(['level' => 'success', 'message' => 'Xóa tài khoản thành công!']);
    }

    //     /** 
    //      * login api 
    //      * 
    //      * @return \Illuminate\Http\Response 
    //      */ 
    //     public function login(){ 
    //         if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
    //             $user = Auth::user(); 
    //             $success['token'] =  $user->createToken('MyApp')-> accessToken; 
    //             return response()->json(['success' => $success], $this-> successStatus); 
    //         } 
    //         else{ 
    //             return response()->json(['error'=>'Unauthorised'], 401); 
    //         } 
    //     }
    // /** 
    //      * Register api 
    //      * 
    //      * @return \Illuminate\Http\Response 
    //      */ 
    // public function register(Request $request) 
    // { 
    //     $validator = Validator::make($request->all(), [ 
    //         'name' => 'required', 
    //         'email' => 'required|email', 
    //         'password' => 'required', 
    //         'c_password' => 'required|same:password', 
    //     ]);
    //     if ($validator->fails()) { 
    //         return response()->json(['error'=>$validator->errors()], 401);            
    //     }
    //     $input = $request->all(); 
    //     $input['password'] = bcrypt($input['password']); 
    //     $user = User::create($input); 
    //     $success['token'] =  $user->createToken('MyApp')-> accessToken; 
    //     $success['name'] =  $user->name;
    //     return response()->json(['success'=>$success], $this-> successStatus); 
    // }
    // /** 
    //      * details api 
    //      * 
    //      * @return \Illuminate\Http\Response 
    //      */ 
    // public function details() 
    // { 
    //     $user = Auth::user(); 
    //     return response()->json(['success' => $user], $this-> successStatus); 
    // } 
}
