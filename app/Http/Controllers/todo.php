<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class todo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all todos from the database
        $todos = Todos::all();

        // Return the todos as a JSON response
        return response()->json(['data' => $todos]);
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data (if needed)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as necessary
        ]);

        $todo = Todos::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Todo created successfully', 'data' => $todo], 201);
    }
//        $todoData = Todos::create([
//            "name" => "First Task"
//        ]);
//        //
//        return $todoData;
//        // echo "database";
//
//        // Retrieve data from the request body
//        $requestData = $request->all();
//
//        // Process the data (e.g., save it to the database)
//
//        // Return the data as a response
//        return response()->json(['message' => 'Data successfully stored', 'data' => $requestData]);


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
