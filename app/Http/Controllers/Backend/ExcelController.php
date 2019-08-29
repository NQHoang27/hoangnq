<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller 
{  
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {	
    	return Excel::download(new UsersExport, 'Danh_sach_tai_khoan.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
    	return view('admin.user.import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcel() 
    {
    	Excel::import(new UsersImport,request()->file('file'));
    	
    	return back();
    }
}
