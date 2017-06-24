<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Auth;
use DB;
use App\User;
use Hash;
use App\StatusMaster;
use Image;
use Illuminate\Support\Facades\Input;
use \File;

class EmployeeController extends Controller
{
public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sort()
    {
        $sorts = DB::table('employee')->orderBy('priority','asc')->orderBy('id','asc')->get();
        $counts = DB::table('employee')->count();
        return view('setting.employee.sort',['sorts'=>$sorts , 'counts'=>$counts]);
    }


    public function index()
    {
        //
        return view('setting.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $titlenames = DB::table('status_master')->where('type','titlename')->get();
        $counts = DB::table('employee')->count();
        return view('setting.employee.create',['titlenames'=>$titlenames , 'counts'=>$counts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
if ($request->hasFile('photo')) {
        $originalname = $request->file('photo')->getClientOriginalName(); 
        $extension = Input::file('photo')->getClientOriginalExtension();
        $oldnamewithoutext     = substr($originalname, 0, strlen($originalname) - 4);       
        $dbimgname  = $oldnamewithoutext . '-'. time() . '.' . $extension;      
        $newname = iconv("utf-8", "TIS-620", $dbimgname);
        $moveImage = $request->file('photo')->move('images', $newname);

} else {
        $dbimgname = "";
}     
        //
        $employees                    = new Employee;
        $employees->title             = $request->title;
        $employees->firstname         = $request->firstname;
        $employees->lastname          = $request->lastname;
        $employees->photo             = $dbimgname;
        $employees->status            = $request->status;
        $employees->priority          = $request->priority;
        

        // $this->validate($request, [
        // 'fistname' => 'required|unique:employee|max:255',
        
        // ]);

        
        $employees->save();
        $request->session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
        return back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employees = Employee::findOrFail($id);
        $titlenames = DB::table('status_master')->where('type','titlename')->get();
        return view('setting.employee.edit',['titlenames'=>$titlenames,'employees'=>$employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employees = Employee::findOrFail($id);

        $employees->title              = $request->title;
        $employees->firstname          = $request->firstname;
        $employees->lastname           = $request->lastname;
        $employees->status             = $request->status;
        $employees->priority           = $request->priority;

         if ($request->hasFile('photo')) {
            
            $makenewname = iconv("utf-8", "TIS-620", $employees->photo);
            File::delete('images/'.$makenewname);
            
        $originalname = $request->file('photo')->getClientOriginalName(); 
        $extension = Input::file('photo')->getClientOriginalExtension();
        $oldnamewithoutext     = substr($originalname, 0, strlen($originalname) - 4);
        $dbimgname  = $oldnamewithoutext . '-'. date("dmYHis") . '-'. rand(0,99) . '.' . $extension;
        $newname = iconv("utf-8", "TIS-620", $dbimgname);
        $moveImage = $request->file('photo')->move('images', $newname);

        $employees->photo          = $dbimgname;
        } else {
            $dbimgname = $employees->photo;
        }       

        $employees->save();

        $request->session()->flash('status','แก้ไขข้อมูลเรียบร้อย');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
