<?php
/**
 * Project: anippe
 * File: ProjectsController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 19:20
 */

namespace App\Http\Controllers\Base\Client;


use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.projects', compact('client'));
    }

    public function datatable(Client $client)
    {
        $client->load('projects');

        $projects = $client->projects;

        return Datatables::of($projects)
            ->editColumn('name', function (Project $project) {
                return '<a href="'.$project->link().'" class="text-bold text-info">' . $project->name . '</a>';
            })
            ->addColumn('action', function (Project $project) {
                return view('base.contacts.actions', $project);
            })
            ->addColumn('members', function (Project $project) {
                return $project->members;
            })
            ->editColumn('created', function (Project $project) {
                return $project->created_at;
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
