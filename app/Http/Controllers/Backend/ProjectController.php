<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Contracts\IProjectRepository;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Model\Project;
use App\Model\User;
use DB;

class ProjectController extends Controller
{
    /**
    * [$projetc description]
    * @var [type]
    */
    protected $project;

    /**
    * [__construct description]
    * @param IUserRepository $projetc [description]
    */
    public function __construct(IProjectRepository $project)
    {
      $this->project = $project;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    { 
      $countProject = DB::table('projects')->count();
      $listProject = $this->project->getAll();
      return view('admin.project.list', compact('listProject', 'countProject'));
    }

    /**
    * Create a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
      $listUser = User::all(); 
      $listProject = Project::all();
      return view('admin.project.add', compact('listProject', 'listUser'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(ProjectRequest $request)
    {
      $data = $request->all();
      $this->project->create($data);
      return redirect()->route('project')->with(['level' => 'success', 'message' => 'Thêm dự án thành công!']);
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Model\Team  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      $listProjects = $this->project->find($id);
      return view('admin.project.edit', ['listProjects' => $listProjects, 'listUser' => User::where('id', '<>', $id)->get()]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Model\Project  $id
    * @return \Illuminate\Http\Response
    */
    public function update($id, ProjectRequest $request)
    {  
      $data = $request->all();
      $this->project->update($id, $data);
      return redirect()->route('project')->with(['level' => 'success', 'message' => 'Cập nhật dự án thành công!']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Model\Project  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $this->project->delete($id);
      return redirect()->route('project')->with(['level' => 'success', 'message' => 'Xóa dự án thành công!']);
    }
  }
