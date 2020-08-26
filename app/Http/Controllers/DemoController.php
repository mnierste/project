<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DemoTask;

class DemoController extends Controller
{
    //
    public function showTasks()
   {
       $tasks = DemoTask::orderBy('order')->select('id','title','order','status')->get();

       $tasksCompleted = $tasks->filter(function ($task, $key) {
           return $task->status;
       })->values();

       $tasksNotCompleted = $tasks->filter(function ($task, $key) {
           return  ! $task->status;
       })->values();

       return view('projects/demos/alltasks',compact('tasksCompleted','tasksNotCompleted'));
   }


}
