<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect; 
use App\User; 
use App\Integration; 
use Aws\CloudWatch\CloudWatchClient; 
use Aws\CloudWatchEvents\CloudWatchEventsClient; 
use Aws\CloudWatchLogs\CloudWatchLogsClient; 
use Aws\Exception\AwsException; 

class AlertController extends Controller
{

	protected $redirectTo = 'alert'; 
    protected $aws_key = ''; 
    protected $aws_secret = '';  
    protected $aws_region = 'us-east-2';  

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
        $cloudWatchClient = new CloudWatchClient([
            'version'     => 'latest',
            'region'      => 'us-east-2',
            'credentials' => [
                'key'    => '',
                'secret' => '',
            ],
        ]);
        $alarm_data = $cloudWatchClient->describeAlarms(); 
        return view('alert/alert')->with('alarm_data',$alarm_data['MetricAlarms']);
    } 

    public function alertSetup() {
        return view('alert/setup'); 
    }

    public function create(Request $request) { 

        $cloudWatchClient = new CloudWatchClient([
            'version'     => 'latest',
            'region'      => 'us-east-2',
            'credentials' => [
                'key'    => '',
                'secret' => '',
            ],
        ]);
        $cloudWatchClient->putMetricAlarm([
            'ActionsEnabled' => ($request->input('ActionsEnabled') == 'true'),
            'AlarmActions' => ["".$request->input('AlarmActions')],
            'AlarmDescription' => $request->input('AlarmDescription'),
            'AlarmName' => $request->input('AlarmName'), 
            'ComparisonOperator' => $request->input('ComparisonOperator'), 
            'EvaluationPeriods' => $request->input('EvaluationPeriods'), 
            'MetricName' => $request->input('MetricName'),
            'Period' => 300, 
            'Namespace' => $request->input('Namespace'), 
            'Statistic' => "Average",  
            'Threshold' => 2000, 
        ]); 

        return Redirect::to('/alerts'); 
    }

    public function getCloudEvents() { 

        return null; 
    } 

    public function getAllAlerts() {
        return null; 
    } 

    
}
