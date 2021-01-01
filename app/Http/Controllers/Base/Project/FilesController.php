<?php
/**
 * Project: anippe
 * File: FilesController.php
 * Author: Luka
 * Date: 01.01.2021
 * Time: 1:07
 */

namespace App\Http\Controllers\Base\Project;


use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class FilesController extends Controller
{
    public function index(Project $project)
    {
        return view('base.project.files', compact('project'));
    }

    public function datatable(Project $project)
    {
        $files = $project->media();

        return Datatables::of($files)
            ->addColumn('action', function (Media $media) {
                return view('base.contacts.actions', $media);
            })
            ->editColumn('created', function (Media $media) {
                return $media->created_at;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
