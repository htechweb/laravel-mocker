<?php

namespace Htech\MockEntry\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Schema;
use DB;
class MockEntryController extends Controller
{
    public function removeMockData(){
    	$schema = collect(DB::connection()->getDoctrineSchemaManager()->listTableNames())->map(function ($item, $key) {
		  	return [
		    	'name' => $item,
		    	'columns' => DB::getSchemaBuilder()->getColumnListing($item)
		  	];
		});
    	$tablesWithMockData = [];
    	foreach ($schema as $key => $table) {
    		if(isset($table['columns']) && !empty($table['columns'])){
	    		foreach ($table['columns'] as $key => $columns) {
	    			if($columns == "for_testing"){
	    				// var_dump($table['name']);
	    				$tablesWithMockData[] = $table['name'];
	    				continue 1;
	    			}
	    		}
    		}
    	}
    	// Add bAckup of data here spatie/backup
    	foreach ($tablesWithMockData as $key => $tableName) {
    		$logMessage = 'Test Data of '.$tableName.' table has been deleted';
    		Log::info($logMessage);
    		dump($logMessage);
    		DB::table($tableName)->where('for_testing', 1)->delete();
    	}
    	
    }
}
