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
    /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
    public function create()
    {
      $listTeam = Team::all();
      return view('admin.team.add',compact('listTeam'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
      $team = new Team();
      $team->name = $request->name;
      $team->leader = $request->leader;
      $team->save();
      return redirect()->route('team')->with(['level' => 'success','message' => 'Thêm team thành công!']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $editTeams = Team::find($id);
     return view('admin.team.edit',['editTeams' => $editTeams]);
   }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function update($id,TeamRequest $request)
      {  
        $team = Team::find($id);  
        $team->update([       
          'name' => $request->get('name'), 

          'leader' => $request->get('leader'),
        ]);
        return redirect()->route('team')->with(['level' => 'success','message' => 'Cập nhật team thành công!']);
      }
      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
    public function destroy($id)
    {
      Team::destroy($id);
      return redirect()->route('team')->with(['level' => 'success','message' => 'Xóa team thành công!']);
    }
  }
