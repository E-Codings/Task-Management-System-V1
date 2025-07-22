<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\PermissionConstant;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $page = $request->page ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $query = Task::with(['project', 'status'])->orderBy('id', 'desc');

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $total_tasks = $query->count();
        $total_pages = ceil($total_tasks / $limit);

        $tasks = $query->offset($offset)->limit($limit)->get(); // ✅ Only get 5 tasks

        return view('task.index', compact('tasks', 'total_pages', 'page', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::get(['id', 'name'])->all();
        $statuss = Status::get(['id', 'name'])->all();
        return view('task.create', compact('projects', 'statuss'));
        // return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => ['required'],
            'duration' => ['required', 'regex:/^\d{1,2}:\d{1,2}$/'],
            "remark" => ['nullable'],
            "project" => ['required'],
            "status" => ['required'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->messages();
            $messsage = implode(", ", $errors->all());
            return back()->with("error", $messsage);
        }

        Task::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'status_id' => $request->status,
            'project_id' => $request->project,
            'remark' => $request->remark,
            'created_by' => Auth::user()->id,
            'modify_by' => Auth::user()->id,
        ]);

        return back()->with('success', 'Task Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    public function edit(string $id)
    {
        $projects = Project::get(['id', 'name'])->all();
        $statuss = Status::get(['id', 'name'])->all();
        $tasks = Task::find($id);
        return view('task.update', compact('tasks', 'projects', 'statuss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        if ($task) {
            $validator = Validator::make($request->all(), [
                "title" => ['required'],
                'duration' => ['required', 'regex:/^\d{1,2}:\d{1,2}$/'],
                "status" => 'required',
                "project" => 'required',
                "remark" => ['nullable'],
            ]);

            //             if ($validator->fails()) {
            //     dd($validator->errors()->all());
            // }

            if ($validator->fails()) {
                $errors = $validator->messages();
                $messsage = implode(", ", $errors->all());
                return back()->with("Error", $messsage);
            }

            Task::where(Task::ID, $id)->update([
                Task::TITLE => $request->title,
                Task::DURATION  => $request->duration,
                Task::STATUS     => $request->status,
                Task::PROJECT      => $request->project,
                Task::REMARK     => $request->remark,
                Task::CREATED_BY    => Auth::id(),
                Task::MODIFY_BY    => Auth::id(),
            ]);
            return redirect()->route('task.index')->with('success', 'Task Updated');
        } else {
            return redirect()->route('task.index')->with('error', 'Task not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (!Auth::user()->can(PermissionConstant::REMOVE_TASK)) {
            return back()->with('error', 'Permission Denied');
        }
        $task = Task::find($request->remove_id);
        if ($task) {
            Task::where(Task::ID, $request->remove_id)->delete();
            return redirect()->back()->with('success', 'Task Deleted');
        } else {
            return redirect()->back()->with('error', 'Task not found');
        }
    }
}
