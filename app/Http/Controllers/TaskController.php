<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::get();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $projects = Project::get(['id', 'name'])->all();
        // $statuss = Status::get(['id', 'name'])->all();
        // return view('task.create', compact('projects','statuss'));
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => ['required'],
            'duration' => ['required', 'date_format:H:i'],
            "status" => ['nullable'],
            "project" => ['nullable'],
            "remark" => ['nullable'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->messages();
            $messsage = implode(", ", $errors->all());
            return back()->with("Error", $messsage);
        }

        Task::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'score' => $request->score,
            'status' => $request->status,
            'project' => $request->project,
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
        // $projects = Project::get(['id', 'name'])->all();
        // $statuss = Status::get(['id', 'name'])->all();
        $task = Task::find($id);
        return view('task.update', compact('task'));
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
                'duration' => ['required', 'date_format:H:i'],
                "status" => ['nullable'],
                "project" => ['nullable'],
                "remark" => ['nullable'],
            ]);

            if ($validator->fails()) {
                $errors = $validator->messages();
                $messsage = implode(", ", $errors->all());
                return back()->with("Error", $messsage);
            }

            Task::where(Task::ID, $id)->update([
                Task::TITLE => $request->title,
                Task::DURATION  => $request->duration,
                Task::STATUS_ID     => $request->status,
                Task::PROJECT_ID      => $request->project,
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
        $task = Task::find($request->remove_id);
        if ($task) {
            Task::where(Task::ID, $request->remove_id)->delete();
            return redirect()->back()->with('success', 'Task Deleted');
        } else {
            return redirect()->back()->with('error', 'Task not found');
        }
    }
}
