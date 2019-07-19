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

      $listProject = Project::orderBy('id','DESC')->search()->paginate(6);
      return view('admin.project.list',compact('listProject','countProject'));
    }
    public function create()
    {
     $listUser = User::all(); 
     $listProject=Project::all();
     return view('admin.project.add',compact('listProject','listUser'));
   }

   public function store(ProjectRequest $request)
   {
    $project = new Project;
    $project->name = $request->name;
    $project->id_user =$request->id_user;    
    $project->save();
    return redirect()->route('project')->with(['level'=>'success','message'=>'Thêm mới project thành công!']);
  }

  public function edit($id)
  {
    //$listUser = User::all();

   $listProjects = Project::find($id);
   return view('admin.project.edit',['listProjects'=>$listProjects]);
 }

 public function update($id,ProjectRequest $request)
 {  
  $project = Project::find($id);  
  $project->update([       
    'name' => $request->get('name'), 
    'id_user'=> $request->get('id_user'),
  ]);
  return redirect()->route('project')->with(['level'=>'success','message'=>'Cập nhật dự án thành công!']);
}

public function destroy($id)
{
  Project::destroy($id);
  return redirect()->route('project')->with(['level'=>'success','message'=>'Xóa dự án thành công!']);
}
}
