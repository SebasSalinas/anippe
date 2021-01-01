<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('base.projects.index');
    }

    public function datatable()
    {
        $projects = Project::with(['client', 'users']);

        return Datatables::of($projects)
            ->editColumn('name', function (Project $project) {
                return '<a href="' . $project->link() . '" class="text-bold text-info">' . $project->name . '</a>';
            })
            ->addColumn('action', function (Project $project) {
                return view('base.projects.actions', ['project' => $project]);
            })
            ->addColumn('members', function (Project $project) {
                return $project->members;
            })
            ->addColumn('client', function (Project $project) {
                $clientLink = '<a href="' . $project->client->link() . '" class="text-bold text-info">' . $project->client->name . '</a>';
                return $project->client != null ? $clientLink : '-';
            })
            ->editColumn('created', function (Project $project) {
                return $project->created_at;
            })
            ->rawColumns(['action', 'name', 'client'])
            ->make(true);
    }

    public function create()
    {
        return view('base.projects.create');
    }

    public function store()
    {
        dd("creating project");
    }

    public function edit(Project $project)
    {
        return view('base.projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        dd("updating project");
    }

    public function destroy(Project $project)
    {
        $project->delete();

        flash()->success('Project has been deleted.');

        return redirect()->route('base.projects.index');
    }
}
