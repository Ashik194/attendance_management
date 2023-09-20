<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:attendance.list|attendance.create|attendance.edit|attendance.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:attendance.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:attendance.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:attendance.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:attendance.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $attendances = Attendance::latest()->get();
        return view('admin.attendance.index',compact('attendances'));
    }

    public function attendance_date(Request $request)
    {
        //
        $first_date = $request->first_date;
        $last_date = $request->last_date;
        if ($first_date && $last_date){
            $attendances = Attendance::whereBetween('date',[$request->first_date,$request->last_date])->get();
        }elseif ($first_date || $last_date){
            $attendances = Attendance::where('date',$first_date)->orWhere('date',$last_date)->get();
        }else{
            $attendances = Attendance::latest()->get();
        }

        return view('admin.attendance.index',compact('attendances','first_date','last_date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        Attendance::updateOrCreate([
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'status' => "Present",
        ]);

        $notification = array(
            'message' => 'Successfully Checked In',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Attendance::whereId($id)->update(['memo'=>$request->memo]);
        $notification = array(
            'message' => 'Memo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    /**
     * Update the specified resource in storage.
     */
    public function memo_update(Request $request, string $id)
    {
        //
        Attendance::whereId($id)->update(['memo'=>$request->memo]);
        $notification = array(
            'message' => 'Memo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        $notification = array(
            'message' => 'Attendance Record Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
