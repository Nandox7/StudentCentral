<?php
namespace App\Controller;

use App\Controller\AppController;

class DashboardController extends AppController {
 
 	public function index() {
        
        $this->loadModel("Events");
        
        // get all the events from the database.
        $events = $this->Events->find('all')->all();
        
        // insert rows to an array.
        for ($a=0; count($events)> $a; $a++){
        
            $rows[]= '{
                "id":'.$events[$a]['Events']['id'].', 
                "title":"'.$events[$a]['Events']['title'].'", 
                "start":"'.$events[$a]['Events']['start'].'", 
                "className":"'.$events[$a]['Events']['event_type_id'].'",
                "type":"'.$events[$a]['Events']['event_type_id'].'"
                
            }';
        
        }
        
        // convert the array to a string.
        if ($rows){
            $convertojson = implode(",", $rows);
        }
        
        // pass the string to the json variable. this will then be passed  and printed to the javascript code.
        $this->set('json',"[".$convertojson."]"); 
 	    
 	}

    
}

?>
