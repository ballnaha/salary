<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Hash;
use App\StatusMaster;
use Image;
use Illuminate\Support\Facades\Input;
use \File;

class SetuserController extends Controller
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
    public function index()
    {
        //
        if((Auth::user()->username == 'thanya')||(Auth::user()->username == 'admin')||(Auth::user()->username == 'pla')) {
            $users = DB::table('users')->get();
            return view('setting.user.index',['users'=>$users]);
        } else {
            return view('errors.403');
        } 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if((Auth::user()->username == 'thanya')||(Auth::user()->username == 'admin')||(Auth::user()->username == 'pla')) {
        
        $userAuths = DB::table('status_master')->where('type','Auth')->get();
        $departments = DB::table('status_master')->where('type','department')->orderBy('name','asc')->get();

        return view('setting.user.create',['userAuths'=>$userAuths , 'departments'=>$departments]);
        } else {
            return view('errors.403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $user                    = new User;
        $user->username          = $request->username;
        $user->photo             = $dbimgname;
        //$user->photo             = $request->photo;
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->password          = Hash::make(Input::get('password'));
        $user->status            = $request->status;
        $user->role              = $request->role;
        $user->department_code   = $request->department_code;
        

        $this->validate($request, [
        'username' => 'required|unique:users|max:255',
        'email' => 'required|unique:users' ,
        
        ]);

        
        $user->save();
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
        if((Auth::user()->username == 'thanya')||(Auth::user()->username == 'admin')||(Auth::user()->username == 'pla')) {

        $users = User::findOrFail($id);
        return view('setting.user.edit', ['users' => $users]);
        
        } else {
            return view('errors.403');
        }

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
        $users = User::findOrFail($id);


        //$users->username          = $request->username;
        //$users->photo             = $dbimgname;
        //$users->photo             = $request->photo;
        $users->name              = $request->name;
        $users->email             = $request->email;
        //$users->password          = Hash::make(Input::get('password'));
        $users->status            = $request->status;
        $users->role              = $request->role;
        $users->department_code   = $request->department_code;


        $this->validate($request, [
        //'username' => 'required|unique:users,username,'.$users->id,
        'email' => 'required|unique:users,email,'.$users->id ,
        
        ]);

         if ($request->hasFile('photo')) {
            
            $makenewname = iconv("utf-8", "TIS-620", $users->photo);
            File::delete('images/'.$makenewname);
            
        $originalname = $request->file('photo')->getClientOriginalName(); 
        $extension = Input::file('photo')->getClientOriginalExtension();
        $oldnamewithoutext     = substr($originalname, 0, strlen($originalname) - 4);
        $dbimgname  = $oldnamewithoutext . '-'. date("dmYHis") . '-'. rand(0,99) . '.' . $extension;
        $newname = iconv("utf-8", "TIS-620", $dbimgname);
        $moveImage = $request->file('photo')->move('images', $newname);

        $users->photo          = $dbimgname;
        } else {
            $dbimgname = $users->photo;
        }       

        $users->save();

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
