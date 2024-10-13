<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
    {
        //return  $todos = Todo::all();

        // $todos = Todo::all();
        // return view('todos.index', compact('todos'));

        $todos = Todo::all(); // Assuming you have a Todo model that retrieves the data.
        return view('todos.index', compact('todos'));

        // return view('todos.index');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        // return $request;

        Todo::create($request->all());

        // return redirect()->back();
        // return view('todos.index');

        // Flash a success message
        session()->flash('success', 'New Record has been added successfully!!!!');

        return redirect()->route('todos.index');
    }


    public function edit(Request $request, $todot_id)
    {

        //return $todot_id;

        //  return  $todos = Todo::where('id', $todot_id)->first();

        $todos = Todo::where('id', $todot_id)->first();
        return view('todos.edit', compact('todos'));
    }


    // public function update(Request $request, $todot_id)
    // {
    //     $todos = Todo::where('id', $todot_id)->first();

    //     return $todos;
    // }


    public function update(Request $request, $todot_id)
    {
        // return $request;
        // return $student_id;

        $todos = Todo::where('id', $todot_id)->first();
        //return  $todos;
        $todos->title = $request->title;
        $todos->description = $request->description;
        $todos->category = $request->category;
        $todos->completed = isset($request->completed) ? 1 : 0;
        $todos->save();

        session()->flash('success', 'Record has been Update successfully!!!');

        return redirect()->route('todos.index');
    }

    public function delete($todot_id)
    {
        // return "delete";
        // return $student_id;

        Todo::where('id', $todot_id)->delete();

        session()->flash('success', 'Record has been Delete successfully!!!');


        return redirect()->route('todos.index');
    }
}
