<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\AddUserRequestByAdmin;
/* USING THE DATATABLES */
use Datatables;

class UserControlledByAdminController extends Controller
{
    //
    public function index(User $users)
    {
    	# code...
    	/*
    	$users = $users->all();
    	return view('admin.user.index', compact('users'));
    	*/

    	return view('admin.user.index');
    }



    public function create()
    {
    	# code...
    	return view('admin.user.create');
    }

    protected function store(AddUserRequestByAdmin $request, User $user)
    {

    	$userAddAndCheck = $user->where('email', $request->email)->get();

    	if( $request->name != null || $request->email != null || $request->password != null ){

    		if( count( $userAddAndCheck ) == 0 ){

    			$user::create([
		            'name' => $request['name'],
		            'email' => $request['email'],
		            'password' => bcrypt($request['password']),
		            'admin' => (isset($request['admin']) ? $request['admin'] : 0) 
		        ]);

		        flash('تهانينا تم التسجيل بنجاح', 'success');

		        return redirect('admin-users-panel');
    		}else{

    			flash('البريد مستعمل', 'danger');

	    		return back()->withInput();

    		}

	        

	    }else{

	    	flash('الإسم و البريد الإلكتروني', 'danger');

	    	return back()->withInput();
	    }
    }

    public function show( User $user, $id ){
    	return 'to Show';
    }

    public function edit(User $user, $id)
    {
    	$user = $user->findOrFail( $id );

    	return view( 'admin.user.edit', compact( 'user' ) );
        
    }
    protected function update( AddUserRequestByAdmin $request, User $user, $id)
    {


    	$userUpdate = $user::find( $id );

    	$userUpdate->name = $request->name;

    	$userUpdate->email = $request->email;

    	$userUpdate->admin = $request->admin;

    	$userUpdate->updated_at = date('Y-m-d H:i:s');
    	

    	if($userUpdate->save()){

    		flash('تهانينا تم التحديت بنجاح', 'success');

	    }else{

	    	flash('تهانينا تم التحديت بنجاح', 'danger');

	    }

        return back();

    }

    public function destroy (User $user, $id)
    {
    	
    	if( $id == 1 ){

    		return redirect('admin-users-panel')->withFlashMessage('لا يمكن حذف هذا الأدمين');
    	}else{

    		$user = $user->find( $id )->delete();

    		flash('تهانينا تم حذف بنجاح', 'success');

    		return redirect('admin-users-panel');

    	}

    	
        
    }

    public function anyData(User $user)
    {

      $users = $user->all();

        return Datatables::of($users)

            ->editColumn('name', function ($model) {

                return link_to_route('admin-users-panel.show', $model->name, [ $model->id ], []);
            })
            ->editColumn('admin', function ($model) {
            	;
                return $model->admin == 0 ? 'عضو' : 'مدير';
            })

            ->editColumn('created_at', function ($model) {

                return $model->created_at;
            })

            ->editColumn('created_at', function ($model) {
            	
                return $model->created_at;
            })


            
            ->editColumn('edit', function ($model) {

                return link_to_route('admin-users-panel.edit', 'تحديث العضو', [ $model->id ], ['class' => 'btn btn-info btn-circle']);


                		
            })

            ->editColumn('delete', function ($model) {

            	if( $model->id == 1 ){

            		return 'لا يحذف';
            		
            	}else{
            		
            		return link_to_route('admin-users-panel.destroy', 'حذف العضو', [ $model->id ], ['id' => 'delete', 'class' => 'btn btn-danger btn-circle']);

            	}

                
                		
            })
            ->make(true);

    }



}
