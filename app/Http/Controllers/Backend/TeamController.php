<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Team;
use DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
      $team = DB::table('teams')->count();
      $listTeam = Team::orderBy('id','DESC')->search()->paginate(6);
      return view('admin.team.list',compact('listTeam','team'));
    }

    /**
     Thêm mới người dùng
     */
     public function add(Request $request)
     {
      $listTeam=Team::all();
      return view('admin.team.add',compact('listTeam'));
    }

    /**
     Thêm mới người dùng
     */
     public function store(Request $request)
     {



      $this->validate($request,[
        'name'=>'required',


      ],[
        'name.required'=>'Tên team không được để trống!',




      ]);
      $team= new Team();
      $team->name=$request->name;
      $team->leader=$request->leader;
      $team->save();


      return redirect()->route('team')->with(['level'=>'success','message'=>'Thêm team thành công!']);
    }

    /**
     Sửa thông tin người dùng
     */
     public function edit($id)
     {
       $listTeams = Team::find($id);


       return view('admin.team.edit',['listTeams'=>$listTeams]);
     }

    /**
    Cập nhật thông tin người dùng
     */
    public function update( $id,Request $request)
    {  
      $this->validate($request,[
        'name'=>'required',
        'leader'=>'required',
      ],[
        'name.required'=>'Tên người dùng không được để trống!',
        'leader.required'=>'Tên leader không được để trống!',
        

      ]); 
      $team = Team::find($id);  
      $team->update([       
        'name' => $request->get('name'), 
        
        'leader'=> $request->get('leader'),
      ]);


      

      return redirect()->route('team')->with(['level'=>'success','message'=>'Cập nhật team thành công!']);
    }

    /**
    Xóa người dùng
     */
    public function destroy($id)
    {
      Team::destroy($id);
      return redirect()->route('team')->with(['level'=>'success','message'=>'Xóa team thành công!']);
    }
  }
