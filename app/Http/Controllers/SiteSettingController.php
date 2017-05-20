<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\SiteSetting;

use Illuminate\Support\Facades\File;

use App\Building;

class SiteSettingController extends Controller
{
    //
    public function index(){

    	

    }

    protected function create( SiteSetting $siteSetting  ){

    	$siteSettings = $siteSetting::all();

    	return view('admin.siteSetting.create', compact('siteSettings'));
    }

     protected function store(Request $requests, SiteSetting $siteSetting, Building $buildingS){

     	$reqToArray = array_except( $requests->toarray(), ['_token','submit']);

     	 foreach ( $reqToArray  as $slug => $request ) {

     	 	// search for the name of slug of specefic request

     	 	$temp = $siteSetting->where( 'slug' , $slug  )->first();

     	 	// if its a file request enter to the statement if not just registre the new value

     	 	if( $temp->type == "file" ){

     	 		// be  shourt that request has a file in this specific request

     	 		if( $requests->hasFile( $slug ) ){

     	 			// get the img totally name

     	 			$imgName = $requests->file( $slug )->getClientOriginalName();

     	 				// if it is a new img requested not repeated

	     	 			if( $imgName != $temp->value ){

	     	 				//dd("difference");

	     	 				// search in all building for the new img

	     	 				$tempSearchBuil = $buildingS->where('img', $imgName )->get();

	     	 				// if there is in buildings the same img just fill the value

	     	 				if( count( $tempSearchBuil ) == 0 ){

	     	 				//if the img requested not in the buildings

	     	 					// search again in the building if there is img with the last img value

	     	 					$tempSearchBuil2 = $buildingS->where('img', $temp->value )->get();

	     	 					// if there is not and its exist just deleted

	     	 					if( count( $tempSearchBuil2 ) == 0 ){

	     	 						if( file_exists( base_path().'/public/images/'.$temp->value ) ){

							            File::delete( base_path().'/public/images/' . $temp->value );

							        }

	     	 					}

	     	 					$tempSearchBuil2 = null;

	     	 					// if the file dont exist save it and save the value

						        if(!file_exists( base_path().'/public/images/'.$imgName )){

						        	$requests->file( $slug )->move( 
					                          base_path().'/public/images/', $imgName
					                      );
						        }

	     	 				}

	     	 				$temp->fill([
								            'value' => $imgName
								          ])->save();


	     	 			}

     	 		}

     	 	}else{

     	 		$temp->fill([

     	 				"value" => $request
     	 			])->save();

     	 	}


     	 	$temp = null;


     	 }

     	return back()->withFlashMessage('تهانينا تم التعديل على البيانات بنجاح');
     }





    public function show(){
    	return 'show';	
    }

    public function edit(){
    	return 'edit';
    }

    protected function update(){
    	return 'update';
    }

    public function destroy(){
    	return 'destroy';
    }
}
