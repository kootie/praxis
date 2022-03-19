<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Auth;

use App\Models\Favourite;

class FavouritesController extends Controller
{
    public function addFavourite(Request $request){
        $this->validate($request, [
            'job_id' => 'required|integer',
        ]);
        
        $User = Auth::user();

        $Favourite = new Favourite;

        $Favourite->job_id = $request->input('job_id');

        $User->Favourites()->save($Favourite);

        return redirect('/jobs/'.$request->input('job_id'))->with('success','Favourite Added');
        
    }

    //look up favourites
    public function getFavouritesWidget(){
        $User = Auth::user();
        if(!is_null($User)){
            if($User->hasRole('worker')){
                $Favourites = [];
                $Favourites = $User->Favourites;
            } else {
                $Favourites = false;
            }
        } else {
            $Favourites = false;
        }

        return $Favourites;
    }
}
