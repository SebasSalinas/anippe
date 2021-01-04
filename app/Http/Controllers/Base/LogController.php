<?php
/**
 * Project: anippe
 * File: LogController.php
 * Author: Luka
 * Date: 04.01.2021
 * Time: 11:18
 */

namespace App\Http\Controllers\Base;


use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class LogController extends Controller
{
    public function index()
    {
        return view('base.log.index');
    }

    public function datatable()
    {
        $logs = Activity::query()
            ->with(['causer', 'subject'])
            ->latest();

        return Datatables::of($logs)
            ->editColumn('created_at', function (Activity $activity) {
                return $activity->created_at->format('d.m.Y H:i');
            })
            ->addColumn('causer', function (Activity $activity) {
                return $activity->causer->fullName;
            })
            ->addColumn('action', function (Activity $activity) {
                return $activity->description;
            })
            ->addColumn('item', function (Activity $activity) {
                return $activity->subject_type . '[' . $activity->subject_id . ']';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
