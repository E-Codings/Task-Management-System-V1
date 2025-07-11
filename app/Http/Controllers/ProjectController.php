<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\PermissionConstant;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::user()->can(PermissionConstant::VIEW_PROJECT)) {
            return back()->with('error', 'Permission Denied');
        }
        $search = $request->search;
        $page = $request->page ?? 1;
        $total = ($page - 1) * 5;

        if ($search) {
            $baseQuery = Project::with(['creator', 'modifier'])
                ->where(Project::NAME, 'like', '%' . $search . '%')
                ->orderBy('id', 'asc');

            $projects = $baseQuery->offset($total)->limit(5)->get();
            $count = $baseQuery->count();
        } else {
            $baseQuery = Project::with(['creator', 'modifier'])->orderBy('id', 'asc');
            $projects = $baseQuery->offset($total)->limit(5)->get();
            $count = Project::count(Project::ID);
        }

        $total_pages = ceil($count / 5);

        return view('project.index', compact('projects', 'total_pages', 'page', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can(PermissionConstant::CREATE_PROJECT)) {
            return back()->with('error', 'Permission Denied');
        }
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            Project::NAME => 'required|max:200',
            Project::REMARK => 'nullable'
        ]);
        if ($validator->fails()) {
            $errors  = $validator->errors();
            $message = implode(", ", $errors->all());
            return back()->with('error', $message);
        }
        $project = Project::create([
            Project::NAME => $request->name,
            Project::REMARK => $request->remark,
            Project::CREATED_BY => Auth::user()->id,
            Project::MODIFY_BY => Auth::user()->id
        ]);
        return redirect()->route('project.index')->with('success', 'Project Created.');
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
    public function edit(Project $project)
    {
        if (!Auth::user()->can(PermissionConstant::EDIT_PROJECT)) {
            return back()->with('error', 'Permission Denied');
        }
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if (!Auth::user()->can(PermissionConstant::EDIT_PROJECT)) {
            return back()->with('error', 'Permission Denied');
        }
        $validator = Validator::make($request->all(), [
            Project::NAME => 'required|max:200',
            Project::REMARK => 'nullable'
        ]);
        // $request->validate([
        //     Project::NAME => 'required|max:200',
        //     Project::REMARK => 'nullable'
        // ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = implode(", ", $errors->all());
            return back()->with('error', $message);
        }
        $project->update([
            Project::NAME => $request->name,
            Project::REMARK => $request->remark,
            Project::MODIFY_BY => Auth::user()->id
        ]);
        return redirect()->route('project.index')->with('success', 'Project Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!Auth::user()->can(PermissionConstant::REMOVE_PROJECT)) {
            return back()->with('error', 'Permission Denied');
        }
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project Deleted.');
    }
}
