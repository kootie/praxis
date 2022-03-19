<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function getUserMenu(){
	    
	    $Menu = array();
	    
	    $User = Auth::user();
	    
	    if(!is_null($User)){
		   		    
		    if($User->hasRole('Resident')){
			    $Menu['/myjobs'] = 'My Jobs';
			    $Menu['/myposts'] = 'My Posts';
				$Menu['/myitems'] = 'My Items';
                
		    }
		    
		    if($User->hasRole('Worker')){
			    $Menu['/jobsearch'] = 'Find a Job';
                $Menu['/jobrequest'] = 'Request a Job';
				$Menu['/jobs'] = 'View Jobs';
		    }

            if($User->hasRole('Admin')){
			    $Menu['/categories/create'] = 'Add Categories';
                $Menu['/categories'] = 'View Categories';
			    $Menu['/users/create'] = 'Add User';
                $Menu['/profiles/create'] = 'Add Profile';
                $Menu['/jobrequest'] = 'Request a Job';
		    }
		    
	    }
	    
	    return $Menu;
	    
	    
    }
}
