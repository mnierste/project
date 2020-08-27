<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DemoTask;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| DemoController
|--------------------------------------------------------------------------
|
| This controller is responsible for vue examples project
|
|	showTasks
|
|  **Pulls tasks from database for draggable.vue example
|  **Shows basic Vue components
|	 **Basic Form Manipulation
|  **Grocery todo list
|
|--------------------------------------------------------------------------
*/

class DemoController extends Controller
{
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
