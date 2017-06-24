<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Pay;
use Hash;
use App\StatusMaster;
use Image;
use Illuminate\Support\Facades\Input;
use \File;

class PayController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('main.pay.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = DB::table('employee')->where('status','1')->orderBy('priority','asc')->get();

        return view('main.pay.create',['employees'=>$employees]);
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
        $pays                     = new Pay;
        $pays->startdate          = $request->startdate;
        $pays->pateint1           = $request->pateint1;
        $pays->pateint2           = $request->pateint2;
        $pays->pateint3           = $request->pateint3;
        $pays->emp_id             = $request->emp_id;
        $pays->money1             = $request->money1;
        $pays->money2             = $request->money2;
        $pays->money3             = $request->money3;
        $pays->totalmoney1        = $request->totalmoney1;
        $pays->totalmoney2        = $request->totalmoney2;
        $pays->totalmoney3        = $request->totalmoney3; 

       
        $pays->save();
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
