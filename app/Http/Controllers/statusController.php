<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class statusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all status of user
        $status = Status::get();
        return view('status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate input, use constants for field names
        $validated = $request->validate([
            Status::NAME => 'required|string|max:255',
            Status::REMARK => 'nullable|string',
        ]);

        // Create new status using the validated data
        $status = Status::create([
            Status::NAME => $validated[Status::NAME],
            Status::REMARK => $validated[Status::REMARK] ?? null,
            Status::CREATED_BY =>  Auth::user()->id,  // assuming logged-in user
            Status::MODIFY_BY => Auth::user()->id,   // initially same as created_by
        ]);

        // Redirect or respond as needed
        return redirect()->route('index')->with('success', 'Status created successfully!');
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
        $statusId = Status::find($id);
        return view('status.edit', compact('statusId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input using constants
        $validated = $request->validate([
            Status::NAME => 'required|string|max:255',
            Status::REMARK => 'nullable|string',
        ]);

        // Find the existing status by ID
        $status = Status::findOrFail($id);

        // Update the status record
        $status->update($validated);

        // Redirect with success message
        return redirect()->route('index')->with('success', 'Status updated successfully!');
    }

    public function delete(string $id)
    {
        $deleteId = Status::findOrFail($id);
        return view('status.delete', compact('deleteId'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteId = Status::findOrFail($id);
        $deleteId->delete();
        return redirect()->route('index')->with('success', 'Status deleted successfully!');
    }
}