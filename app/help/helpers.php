<?php

	use App\SiteSetting;

	use App\User;

	use App\Contact;

	use App\Reply;

	use Intervention\Image\ImageManagerStatic as Image;

	

	function getSetting( $slug ){

		$siteSetting =  new SiteSetting();

		
		
		if( count( $siteSetting->where( 'slug', $slug )->first() ) > 0 ){
			return $siteSetting->where( 'slug', $slug )->first()->value;
		}else{
			return 'لا شيئ';
		}

	}

	function getUser( $userId ){

		$userTable =  new User;

		$userName = $userTable->where( 'id', $userId )->first()->name;

		return $userName;

	}

	function getUserEmail( $userId ){

		$userTable =  new User;

		$userEmail = $userTable->where( 'id', $userId )->first()->email;

		return $userEmail;

	}

	function ifAdmin( $adminId ){

		$userTable =  new User;

		$ifAdmin = $userTable->where( 'id', $adminId )->first()->admin;

		return $ifAdmin;

	}

    function inboxCount(  ){

    	$contacts =  new Contact;

		return count( $contacts->get() );

    }

    function sentCount(  ){

    	$replies =  new Reply;

		return count( $replies->get() );

    }

    function draftCount(  ){

    	$replies =  new Reply;

		return count( $replies->where('confirmed', 0)->get() );

    }

    function junkCount(){

    	$replies =  new Reply;

		return -1;

    }

    function trashCount(  ){

    	$replies =  new Reply;

		return count( $replies->where('deleted', 0)->get() );

    }


	function activeClass($route = 'home', $id = -1, $segmentNum = 2 ){

		if( $id != -1 ){
			return Route::currentRouteNamed( $route ) && Request::segment( $segmentNum ) == $id ? 'active': '';
		}else{
			return Route::currentRouteNamed( $route ) ? 'active': '';
		}

		
	}

	function currentClass($route = 'home', $id = -1, $segmentNum = 2 ){

		if( $id != -1 ){
			return Route::currentRouteNamed( $route ) && Request::segment( $segmentNum ) == $id ? 'current': '';
		}else{
			return Route::currentRouteNamed( $route ) ? 'current': '';
		}

		
	}

	function ifImg( $varImg ){



		if( $varImg == '' || !file_exists( base_path().'/public/images/'.$varImg )  ){

			return asset('/images/'.getSetting( 'no-image' ) );

		}else{

			return asset('/images/'. $varImg);

		}


	}

	function resizeIMG($imgPath, $imgWidth, $imgHeight ){

        $newImgWidth = 520;

        $newImgHeight = 310;

        // open an image file
        $imgToResize = Image::make( $imgPath );

        if( $imgWidth < $newImgWidth || $imgHeight < $newImgHeight ){

            // now you are able to resize the instance
            $imgToResize->resize( $newImgWidth , $newImgHeight);

        }
        
        /*

        // and insert a watermark for example
        $img->insert('public/watermark.png');

        */

        // finally we save the image as a new file
        $imgToResize->save( $imgPath );

    }




	

	

	function buildingType( $typeNumber = null ){

		$buildingTypes = [

			'شقة',
			'فيلا',
			'منزل',
			'شاليه'

		];

		if( $typeNumber == -1 ){

			return $buildingTypes;

		}else{

			return $buildingTypes[ $typeNumber ];
		}


		
	}



	function buildingRent( $rentNumber = null ){

		$buildingRents = [

			'بيع',
			'إيجار'

		];

		if( $rentNumber == -1 ){

			return $buildingRents;
			
		}else{

			return $buildingRents[ $rentNumber ];
		}


		
	}





	function buildingStatu( $statusNumber = null ){

		$buildingStatus = [

			'غير مفعل',
			'مفعل'
			

		];

		if( $statusNumber == -1 ){

			return $buildingStatus;
			
		}else{

			return $buildingStatus[ $statusNumber ];
		}


		
	}


	function buildingPlace( $placesNumber = null ){

		$buildingPlaces = [

1005 => "Casablanca",
1013 => "Agadir"

		];

		if( $placesNumber == -1 ){

			return $buildingPlaces;
			
		}else{

			return $buildingPlaces[ $placesNumber ];
		}


		
	}

	function contactSeen( $contactSeen = null ){

		$contactSeens = [

			'غير مقروؤة',
			'مقروؤة'
			

		];

		if( $contactSeen == -1 ){

			return $contactSeens;
			
		}else{

			return $contactSeens[ $contactSeen ];
		}


		
	}


	function contactType( $contactType = null ){

		$contactTypes = [

			'تبليغ عن مشكل',
			'مساعدة',
			'شكر',
			'تشجيع',
			'نصيحة'
			

		];

		if( $contactType == -1 ){

			return $contactTypes;
			
		}else{

			return $contactTypes[ $contactType ];
		}


		
	}


	function contactRepleyed( $contactRepley = null ){

		$contactReplies = [

			'لم يجب بعد عن الرسالة',
			'أجيب عن الرسالة'
			

		];

		if( $contactRepley == -1 ){

			return $contactReplies;
			
		}else{

			return $contactReplies[ $contactRepley ];
		}


		
	}


