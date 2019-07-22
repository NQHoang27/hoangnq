<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Model\Project;
use App\Model\User;
use DB;

class ProjectController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    { 
      $countProject = DB::table('projects')->count();
      $listProject = Project::orderBy('id', 'DESC')->search()->paginate(6);
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
      $project = new Project;
      $project->name = $request->name;
      $project->id_user = $request->id_user;    
      $project->save();
      return redirect()->route('project')->with(['level' => 'success', 'message' => 'Thêm mới project thành công!']);
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
      $listUser = User::all();
      $listProjects = Project::find($id);
      return view('admin.project.edit', ['listProjects' => $listProjects],['listUser' => $listUser]);
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
      $project = Project::find($id);  
      $project->update([       
        'name' => $request->get('name'), 
        'id_user' => $request->get('id_user'),
      ]);
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
      Project::destroy($id);
      return redirect()->route('project')->with(['level' => 'success', 'message' => 'Xóa dự án thành công!']);
    }
}
