<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Http\Controllers\Controller;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::with('name')->get();
        $months = ["1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August"];
        $monthsName = ["January","February","March","April","May","June","July"];
        return view('admin.bill.index',compact('bills','monthsName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monthsName = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        $year = Carbon::now()->format('Y');
        $members = Member::all()->pluck('name','id')->prepend("Please Select","");
        return view('admin.bill.create',compact('monthsName','year','members'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $bill = new Bill();
            $bill->month_name = $request->month_name;
            $bill->year = $request->year;
            $bill->user_id = $request->name;
            $bill->amount = $request->amount;
            $bill->bill_type = $request->bill_type;
            $bill->collected_by = Auth::user()->id;
            $bill->save();
            DB::commit();
            return ["status"=>200,"message"=>'Data Successfully Saved'];
        }catch (\Exception $e) {
            DB::rollback();
            return $e;
            // something went wrong
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bills = Bill::where('user_id',$id)->get();
        $user_info = Member::find($id);
        return view('admin.bill.show',compact('bills','user_info'));

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
