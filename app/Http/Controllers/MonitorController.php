<?php
namespace App\Http\Controllers;

// require '../../../../vendor/autoload.php'; 

use Illuminate\Http\Request; 
use App\User; 
use App\Integration; 
use Aws\CloudWatch\CloudWatchClient; 
use Aws\CloudWatchEvents\CloudWatchEventsClient; 
use Aws\CloudWatchLogs\CloudWatchLogsClient; 
use Aws\Exception\AwsException; 

class MonitorController extends Controller
{

	protected $redirectTo = 'monitor'; 
    protected $aws_key = ''; 
    protected $aws_secret = '';  

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
        
        try {
            $result = $cloudWatchClient->listMetrics();

            $message = ''; 

            if (isset($result['@metadata']['effectiveUri']))
            {
                $message .= 'For the effective URI at ' . 
                    $result['@metadata']['effectiveUri'] . ":<br /><br />";
            
                if ((isset($result['Metrics'])) and 
                    (count($result['Metrics']) > 0))
                {
                    $message .= "<br /><table><thead><th>Metric</th><th>Namespace</th><th>Dimension</th></thead><tbody>";

                    foreach($result['Metrics'] as $metric) 
                    {
                        if($metric['MetricName'] == "CallCount") {
                            continue; 
                        }
                        $message .= '<tr><td>' . $metric['MetricName'] . 
                            '</td><td>' . $metric['Namespace'] . "</td>";
                        
                        if ((isset($metric['Dimensions'])) and 
                            (count($metric['Dimensions']) > 0))
                        {
                            $message .= "<td>";

                            foreach ($metric['Dimensions'] as $dimension)
                            {
                                $message .= 'Name: ' . $dimension['Name'] . 
                                    ', Value: ' . $dimension['Value'] . "<br />";
                            }

                            $message .= "</td></tr>";
                        } else {
                            $message .= "<td>No dimensions.</td></tr>";
                        }
                    }
                } else {
                    $message .= '<tr><td colspan="3">No Metric Found.</td></tr>';
                }
            } else {
                $message .= '<tr><td colspan="3">No Metric Found.</td></tr>';
            }   
            return view('monitor/monitor')->with('data', $message);
        } catch (AwsException $e) {
            return 'Error: ' . $e->getAwsErrorMessage();
        } 
        //return $result; 
        //return view('monitor/monitor')->with('data',"Some data");
    } 

    public function getCloudEvents() { 

        return null; 
    } 

    public function getAllIntegrations() {

    }  

}
