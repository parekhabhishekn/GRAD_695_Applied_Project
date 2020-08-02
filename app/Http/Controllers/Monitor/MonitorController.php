<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request; 
use App\User; 
use App\Integration;

class MonitorController extends Controller
{

	protected $redirectTo = 'monitor';

    /**
     * Create a new controller instance.
     *
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
        return view('monitor');
    } 
}
