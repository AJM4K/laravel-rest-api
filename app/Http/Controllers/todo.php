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
        // Retrieve all todos and order them by a specific column (e.g., 'name')
        $todos = Todos::orderBy('id')->get();


        // Return the todos as a JSON response
        return response()->json(['data' => $todos]);
    }
    public function paginated(Request $request)
    {


        $page_query = $request->query('page', 1);
        $todos_paginated = Todos::query()->paginate(7, ['*'], 'page', $page_query);

// Retrieve all todos (you can replace this with your actual query)
        $todos = Todos::all();

// Calculate the start and end indices for the current page
        $max = count($todos);
        $start = ($page_query - 1) * 7;
        $end = min($start + 7, $max);

// Create an array to store the paginated results
        $todo_res = [];

// Populate the paginated results array
        for ($i = $start; $i < $end; $i++) {
            $todo_res[] = $todos[$i];
        }

// Now you can use $todo_res for your paginated response
// For example, return it as JSON or render it in your view
      //  return response()->json($todo_res);

        // Return the todos as a JSON response
        return response()->json(['data' => $todo_res]);
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
        // Retrieve the todo item by ID
        $todo = Todos::find($id);

        if (!$todo) {
            // Handle case when todo item is not found
            return response()->json(['message' => 'Todo not found'], 404);
        }

        // Return the todo item as JSON response
        return response()->json($todo);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            // Handle case when todo item is not found
            return response()->json(['message' => 'Todo not found'], 404);
        }

        // Update the todo item with new data
        $todo->name = $request->input('name');
        // Add other fields as needed

        // Save the changes
        $todo->save();

        // Return the updated todo item
        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            // Handle case when todo item is not found
            return response()->json(['message' => 'Todo not found'], 404);
        }

        // Delete the todo item
        $todo->delete();

        // Return a success message
        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
