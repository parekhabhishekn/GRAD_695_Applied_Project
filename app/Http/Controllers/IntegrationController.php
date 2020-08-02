<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect; 
use App\User; 
use App\Integration;

use Illuminate\Support\Facades\Validator;

class IntegrationController extends Controller
{

	protected $redirectTo = 'integration';

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
        return view('integration');
    } 

    public function integrations($user)
    {
    	$user = User::findOrFail($user); 

        return view('integrations', [
        	'user' => $user
        ]);
    } 

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'api_key' => ['required', 'string', 'max:255'],
            'api_secret' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(Request $request)
    {

    	$this->validator($request->all())->validate();
        Integration::create([
            'user_id' => $request->input('user_id'),
            'type' => $request->input('type'),
            'api_key' => $request->input('api_key'), 
            'api_secret' => $request->input('api_secret'),
        ]); 
        return Redirect::to('/integrations/'.$request->input('user_id'));
    }
}
