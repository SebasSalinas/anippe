<?php
/**
 * Project: anippe
 * File: NotesController.php
 * Author: Luka
 * Date: 01.01.2021
 * Time: 1:08
 */

namespace App\Http\Controllers\Base\Project;


use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class NotesController extends Controller
{
    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Project $project)
    {
        return view('base.project.notes', compact('project'));
    }

    /**
     * @param Project $project
     * @return mixed
     * @throws \Exception
     */
    public function datatable(Project $project)
    {
        $notes = $project
            ->notes()
            ->with(['addedBy'])
            ->withCount('media');

        return Datatables::of($notes)
            ->addColumn('action', function (Note $note) use ($project) {
                return view('livewire.base.note.actions', ['note' => $note, 'project' => $project]);
            })
            ->addColumn('created_by', function (Note $note) {
                return $note->addedBy->fullName;
            })
            ->addColumn('has_attachment', function (Note $note) {
                $hasAttacment = $note->count_media;
                return $hasAttacment ? '<span><i class="fa fa-paperclip"> ' . $hasAttacment . '</i></span>' : '';
            })
            ->editColumn('created', function (Note $note) {
                return $note->created_at;
            })
            ->rawColumns(['action', 'has_attachment'])
            ->orderColumn('title', function ($query, $order) {
                $query->orderBy('status', $order);
            })
            ->make(true);
    }

    /**
     * @param Note $note
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project, Note $note)
    {
        $note->delete();

        flash()->success('Note deleted');

        return redirect()->back();
    }
}
