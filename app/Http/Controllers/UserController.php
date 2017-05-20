<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\UserRequest;

use App\Building;

class UserController extends Controller
{
    //

    public function myPage($id, User $user, Building $my9Buil){


    	$display = 'myPage';

    	$userInstance = $user->find( $id );

    	$b4 = $my9Buil->where('status', 1)->orderBy('id', 'desc')->limit(5)->offset(5)->paginate(9);


    	return view('website.user.userPage', compact('userInstance', 'display', 'b4'));

    }

    public function mySettings($id, User $user){

    	$display = 'mySettings';

    	$userInstance = $user->find( $id );

    	return view('website.user.userPage', compact('userInstance', 'display'));

    }

    public function myBuildings($id, User $user, Building $myBuil){

    	$display = 'myBuildings';

    	$userInstance = $user->find( $id );

    	$b4 = $myBuil->where('user_id', $id )->orderBy('id', 'desc')->limit(5)->offset(5)->paginate(12);

    	

    	return view('website.user.userPage', compact('userInstance', 'display', 'b4'));

    }

    public function myBuildingsW($id, User $user, Building $myBuil){

    	$display = 'myBuildingsW';

    	$userInstance = $user->find( $id );

    	$b4 = $myBuil->where('user_id', $id )->where('status', 0 )->orderBy('id', 'desc')->limit(5)->offset(5)->paginate(12);

    	return view('website.user.userPage', compact('userInstance', 'display', 'b4'));

    }

    public function update(UserRequest $request,$id, User $user){

    	$userUpdate = $user::find( $id );

    	$emailCheck = $user->where('email', '=', $request->email )->get();

    	$userUpdate->name = $request->name;

    	$userUpdate->password = bcrypt( $request->password );

    	if( $userUpdate->email != $request->email){

    		if( count( $emailCheck )  == 0 ){

    			$userUpdate->email = $request->email;
    		}else{

    			flash('البريد الإلكتروني مستعمل', 'danger');

    		}

    	}

    	if($userUpdate->save()){

    		flash('تهانينا تم التحديت بنجاح', 'success');

	    }else{

	    }

	    

        return back();

    }

    public function BuildingsEdit($id, User $user, Building $builUpdate){

    	$b = $builUpdate->findOrFail( $id );

    	$u = $user->findOrFail( Auth::id() );

    	if( $b->status == 0 && ( $b->user_id == $u->id || $u->admin == 1 ) ){

    		return view('website.buildings.update', compact('b'));

    	}else{

    		return redirect('/');
    	}
        
        

    }
}
