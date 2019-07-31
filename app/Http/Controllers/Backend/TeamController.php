<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Contracts\ITeamRepository;
use App\Http\Request\UserRequest;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;
use App\Model\Team;
use DB;

class TeamController extends Controller
{
    /**
    * [$team description]
    * @var [type]
    */
    protected $team;

    /**
    * [__construct description]
    * @param ITeamRepository $team [description]
    */
    public function __construct(ITeamRepository $team)
    {
      $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
      dd("Hoangnq");
      $team = DB::table('teams')->count();
      $listTeam = $this->team->getAll();
      return view('admin.team.list', compact('listTeam', 'team'));
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
      return view('admin.team.add', compact('listTeam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
      $data = $request->all();
      $this->team->create($data);
      return redirect()->route('team')->with(['level' => 'success', 'message' => 'Thêm team thành công!']);
    }

    /**
     * Edit the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Team  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editTeams = $this->team->find($id);
      return view('admin.team.edit', ['editTeams' => $editTeams]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Model\Team  $id
    * @return \Illuminate\Http\Response
    */    
    public function update($id, TeamRequest $request)
    {  
      $data = $request->all();
      $this->team->update($id, $data);
      return redirect()->route('team')->with(['level' => 'success', 'message' => 'Cập nhật team thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Team  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->team->delete($id);
      return redirect()->route('team')->with(['level' => 'success', 'message' => 'Xóa team thành công!']);
    }
  }
