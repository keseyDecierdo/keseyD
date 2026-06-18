<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudsController extends Controller
{


    /**
     * Display the dashboard.
     */
    public function index()
    {

        $cruds = Crud::all();
        return view('dashboard', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Demonstrates: Success Message & Validation Error (empty form submission)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'qualification' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.index')
                ->with('error', 'Please fill out all required fields before submitting the form.')
                ->withInput();
        }

        $validated = $validator->validated();

        crud::create($validated);

        return redirect()->route('users.index')->with('success', 'Student record added successfully!');
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
        $crud = crud::findOrFail($id);
        return view('edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     * Demonstrates: Info Message (system notice)
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'qualification' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.index')
                ->with('error', 'Please fill out all required fields before updating the record.')
                ->withInput();
        }

        $validated = $validator->validated();

        $crud = crud::findOrFail($id);
        $crud->update($validated);

        return redirect()->route('users.index')->with('info', 'Student record updated. Please review the changes.');
    }

    /**
     * Remove the specified resource from storage.
     * Demonstrates: Warning Message (restricted/dangerous action)
     */
    public function destroy(string $id)
    {
        $crud = crud::findOrFail($id);
        $crud->delete();

        return redirect()->route('users.index')->with('warning', 'if you perform the delete action. it will be permanently deleted!');
    }

    /**
     * Demonstrates: Error Message (invalid action)
     */
    public function invalidAction()
    {
        return redirect()->route('users.index')->with('error', 'Woops, something went wrong! Invalid action.');
    }

    /**
     * Demonstrates: Warning Message (restricted page access)
     */
    public function restricted()
    {
        return redirect()->route('users.index')->with('warning', 'Access denied! You do not have permission to view this page.');
    }

    /**
     * Demonstrates: Info Message (system notice)
     */
    public function notice()
    {
        return redirect()->route('users.index')->with('info', 'System maintenance scheduled for tomorrow at 10:00 PM.');
    }

}
