<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class CrudsController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cruds = Crud::all();
        return view('index', compact('cruds'));
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
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
        ]);

        crud::create($validated);

        return redirect()->back()->with('success', 'Record saved successfully.');
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
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
        ]);

        $crud = crud::findOrFail($id);
        $crud->update($validated);

        return redirect()->route('users.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crud = crud::findOrFail($id);
        $crud->delete();

        return redirect()->route('users.index')->with('success', 'Record deleted successfully.');
    }
    

}
