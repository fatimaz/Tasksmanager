<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource (tasks).
     */
    public function index()
    {
        $tasks = Task::with('user')->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users= User::all();
        return view('dashboard.tasks.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
       try{
            
            Task::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'due_date' => $request->due_date,
            ]);
            // / Redirect back to the tasks index with success message
            return redirect()->route('tasks.index')->with('success', 'Task added successfully');
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
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
        $data['task'] = Task::findorFail($id);
        $data['users']= User::all();
        return view('dashboard.tasks.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        try{
            
            Task::findOrFail($id)->update([
                'user_id' =>  $request->user_id,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'due_date' => $request->due_date,
            ]);
            
            return redirect()->route('tasks.index')->with('success', 'Task updated successfuly');
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $task = Task::findOrFail($id);
            $task->delete();
            
            return redirect()->back()->with('error', 'Task deleted successfuly');      
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }

    // * Update the status of a task.

    public function update_status(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1',
        ]);
        try {
            $task = Task::findorfail($request->id);
            $task->update([
                'status'=>$request->status
            ]);

            return redirect()->back()->with(['success' => 'Status updated successfuly']);
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }

    // Show all tasks assigned to a specific user
    public function showTasksByUser($userId)
    {
        $user = User::findOrFail($userId);
        $tasks = Task::where('user_id', $userId)->paginate(5);
        
        return view('dashboard.tasks.index', compact('tasks', 'user'));
    }


}