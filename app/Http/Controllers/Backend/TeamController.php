<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TeamRequest;
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

    public function create()
     {
      $listTeam=Team::all();
      return view('admin.team.add',compact('listTeam'));
    }

    public function store(TeamRequest $request)
     {
      $team= new Team();
      $team->name=$request->name;
      $team->leader=$request->leader;
      $team->save();
      return redirect()->route('team')->with(['level'=>'success','message'=>'Thêm team thành công!']);
    }

    public function edit($id)
     {
       $editTeams = Team::find($id);
       return view('admin.team.edit',['editTeams'=>$editTeams]);
     }
    
    public function update($id,TeamRequest $request)
    {  
      $team = Team::find($id);  
      $team->update([       
        'name' => $request->get('name'), 
        
        'leader'=> $request->get('leader'),
      ]);
      return redirect()->route('team')->with(['level'=>'success','message'=>'Cập nhật team thành công!']);
    }
    
    public function destroy($id)
    {
      Team::destroy($id);
      return redirect()->route('team')->with(['level'=>'success','message'=>'Xóa team thành công!']);
    }
  }
