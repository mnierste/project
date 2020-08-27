<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
|
| This controller is responsible for handling the home (dashboard) app
|
|	INDEX
|
|  **Allows one to see/edit/delete all pizza orders for pizza place project
|  **Allows one to manage contacts (in progress)
|	 **Allows one to update personal information
|  **Allows one to see other projects
|
|--------------------------------------------------------------------------
*/

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
