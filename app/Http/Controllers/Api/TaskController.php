<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = Task::create([
            'title' => $request['title'],
            'description' => $request['description'],
            // 'category' => $request['category'],
            'reminder' => $request['reminder'],
            'created_by' => Auth::user()->id,
        ]);
        // $students = Student::create([
        //     'user_name' => $request['user_name'],
        //     'address_id' => $request['address_id'],
        //     'phone_no' => $request['phone_no'],
        //     'age' => $request['age'],
        //     'resolved_by' => Auth::user()->id,
        // ]);
        return response()->json([
            'message' => 'Student created',
            'status' => 'success',
            'data' => $tasks,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if($task->delete()){
            $notification = array(
              'message' => 'data is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => 'data could not be deleted!',
              'status' => 'error'
          );
        }
        return response()->json($notification);
    }

    public function toggleStatus($id)
    {
        $task = Task::findOrFail($id);

        $task->status = $task->status === 'Completed' ? 'Pending' : 'Completed';
        $task->save();

        return response()->json([
            'success' => true,
            'message' => 'Task status updated successfully.',
            'data' => [
                'id' => $task->id,
                'new_status' => $task->status
            ]
        ]);
    }
}
