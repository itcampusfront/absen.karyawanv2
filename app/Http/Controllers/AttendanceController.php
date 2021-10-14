<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Attendance;
use Ajifatur\Helpers\Date;
use App\Models\Group;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role == role('super-admin')){
            // Set params
            $group = $request->query('group') != null ? $request->query('group') : 0;
            $office = $request->query('office') != null ? $request->query('office') : 0;
            $t1 = $request->query('t1') != null ? Date::change($request->query('t1')) : date('Y-m-d');
            $t2 = $request->query('t2') != null ? Date::change($request->query('t2')) : date('Y-m-d');

            // Get attendances
            if($group != 0 && $office != 0)
                $attendances = Attendance::whereDate('date','>=',$t1)->whereDate('date','<=',$t2)->whereHas('user', function (Builder $query) use ($group, $office) {
                    return $query->where('group_id','=',$group)->where('office_id','=',$office);
                })->get();
            elseif($group != 0 && $office == 0)
                $attendances = Attendance::whereDate('date','>=',$t1)->whereDate('date','<=',$t2)->whereHas('user', function (Builder $query) use ($group) {
                    return $query->where('group_id','=',$group);
                })->get();
            else
                $attendances = Attendance::whereDate('date','>=',$t1)->whereDate('date','<=',$t2)->orderBy('date','asc')->orderBy('start_at','asc')->get();

            // Get groups
            $groups = Group::all();

            // View
            return view('admin/attendance/index', [
                'attendances' => $attendances,
                'groups' => $groups,
            ]);
        }
        elseif(Auth::user()->role == role('admin')){
            // Set params
            $group = Auth::user()->group_id;
            $office = $request->query('office') != null ? $request->query('office') : 0;
            $t1 = $request->query('t1') != null ? Date::change($request->query('t1')) : date('Y-m-d');
            $t2 = $request->query('t2') != null ? Date::change($request->query('t2')) : date('Y-m-d');

            // Get attendances
            if($office != 0)
                $attendances = Attendance::whereDate('date','>=',$t1)->whereDate('date','<=',$t2)->whereHas('user', function (Builder $query) use ($group, $office) {
                    return $query->where('group_id','=',$group)->where('office_id','=',$office);
                })->get();
            else
                $attendances = Attendance::whereDate('date','>=',$t1)->whereDate('date','<=',$t2)->whereHas('user', function (Builder $query) use ($group) {
                    return $query->where('group_id','=',$group);
                })->get();

            // View
            return view('admin/attendance/index', [
                'attendances' => $attendances,
            ]);
        }

        // View
        // return view('admin/attendance/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // Get the attendance
        $attendance = Attendance::findOrFail($request->id);

        // Delete the attendance
        $attendance->delete();

        // Redirect
        return redirect()->route('admin.attendance.index')->with(['message' => 'Berhasil menghapus data.']);
    }
}