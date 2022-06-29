<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\MemberType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Member::all();
        $member_types = MemberType::all()->keyBy('id');
        $durations = ["1"=>"3 Months","2"=>"6 Months","3"=>"12 Months","4"=>"Life Time"];
        $genders = ["1"=>"Male","2"=>"Female"];
        return view('admin.members.index',compact('users','member_types','durations','genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medical_condtions = ["1"=>"Excilent","2"=>"Normal","3"=>"Injured"];
        $durations = ["1"=>"3 Months","2"=>"6 Months","3"=>"12 Months","4"=>"Life Time"];
        $genders = ["1"=>"Male","2"=>"Female"];
        $member_types = MemberType::all();
        return view('admin.members.create',compact('member_types','medical_condtions','durations','genders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:members|max:255',
        ]);
        if ($validator->fails()) {
            return ['status'=>422,'message'=>"Phone number already exist "];
        }
        else{

            DB::beginTransaction();
            try {
                $member = new Member();
                $member->name = $request->name;
                $member->phone = $request->phone;
                $member->email = $request->email;
                $member->emergency_contact = $request->emergency_contact;
                $member->remarks = $request->remarks;
                $member->nationality = $request->nationality;
                $member->address = $request->address;
                $member->father_name = $request->father_name;
                $member->mother_name = $request->mother_name;
                $member->dob = $request->dob;
                $member->occupation = $request->occupation;
                $member->blood_group = $request->blood_group;
                $member->medical_condition_id = $request->medical_condition_id;
                $member->membership_duration = $request->membership_duration;
                $member->member_type_id = $request->member_type_id;
                $member->admission_fees = $request->admission_fees;
                $member->monthly_fees = $request->monthly_fees;
                $member->gender_id = $request->gender_id;
                $member->joined_date = Carbon::now();
                $member->save();

                DB::commit();
                return ["status"=>200,"message"=>'Data Successfully Saved'];
            }catch (\Exception $e) {
                DB::rollback();
                return $e;
                // something went wrong
            }
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
        return $member = Member::find($id);
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
    public function find($id)
    {
        $members = Member::where('name','like','%'.$id.'%')->get();
        $output = '<ul class="dropdown-menu" style="display: block;position:relative">';
        foreach ($members as $member)
        {
            $output.='<li><a href="#">'.$member->name.'</a></li>';
        }
        $output.= '</ul>';
        return ['output'=>$output];
    }
}
