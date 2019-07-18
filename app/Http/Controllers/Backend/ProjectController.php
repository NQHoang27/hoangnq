<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Project;
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
      $listProject = Project::orderBy('id','DESC')->search()->paginate(6);
      return view('admin.project.list',compact('listProject'));
    }

    /**
     Thêm mới người dùng
     */
     public function add(Request $request)
     {
      $listProject=Project::all();
      return view('admin.project.add',compact('listProject'));
    }

    /**
     Thêm mới người dùng
     */
     public function store(Request $request)
     {



      $this->validate($request,[
        'name'=>'required',


      ],[
        'name.required'=>'Tên project không được để trống!',




      ]);
      $project= new Project();
      $project->name=$request->name;
      $project->id_users=$request->id_users;
      $project->save();


      return redirect()->route('project')->with(['level'=>'success','message'=>'Thêm mới project thành công!']);
    }

    /**
     Sửa thông tin người dùng
     */
     public function edit($id)
     {
       $listProjects = Project::find($id);


       return view('admin.project.edit',['listProjects'=>$listProjects]);
     }

    /**
    Cập nhật thông tin người dùng
     */
    public function update( $id,Request $request)
    {  
      $this->validate($request,[
        'name'=>'required'
      ],[
        'name.required'=>'Tên người dùng không được để trống!',
        

      ]); 
      $project = Project::find($id);  
      $project->update([       
        'name' => $request->get('name'), 
        
        'id_users'=> $request->get('id_users'),
                 ]);


   

      return redirect()->route('project')->with(['level'=>'success','message'=>'Cập nhật dự án thành công!']);
    }

    /**
    Xóa người dùng
     */
    public function destroy($id)
    {
      Project::destroy($id);
      return redirect()->route('project')->with(['level'=>'success','message'=>'Xóa dự án thành công!']);
    }
  }
