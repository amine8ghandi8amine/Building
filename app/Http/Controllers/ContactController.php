<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;

use App\Contact;

use Datatables;

use Form;

use Html;

class ContactController extends Controller
{
    //

    public function index(){

    	return view('admin.contact.index');
    }

    

    public function contactBox(Contact $contacts){

    	$contacts = $contacts->get();

    	$wichF = 'mailBox';

    	return view('admin.contact.mailBox', compact('wichF', 'contacts'));
    }



    

    public function form(){

    	return view('website.contact.contact');
    }

    public function response(Contact $contact, $id){

    	$message = $contact->find( $id )->get();

    	return view('admin.contact.response', compact('message'));
    }

    public function create()
    {
    	# code...
    	return view('admin.contact.create');
    }

    protected function store(ContactRequest $request, Contact $contactS)
    {


    	if( $request->from == 'website' ){

    		$data = [
                'name' => $request->name,
                'email' => $request->email, 
                'phoneNumber' => $request->phoneNumber, 
                'type' => $request->type, 
                'type'  => $request->type,
                'subject'  => $request->subject,
                'message' => $request->message,
                'view' => 0,
                'reply' => 0,
                'deleted' => 0
            ];

            // The user is logged in...
            $contactS->create( $data );


            return back();


    	}else if( $request->from == 'dashboard' ){

    	}


    }

    public function show( Contact $contactSM, $id ){

    	$c = $contactSM->find( $id );

    	return view('admin.contact.readMail', compact( 'c' ) );
    }

    public function edit(User $user, $id)
    {
    	$user = $user->findOrFail( $id );

    	return view( 'admin.user.edit', compact( 'user' ) );
        
    }
    protected function update(AddUserRequestByAdmin $request, User $user)
    {

    	$userUpdate = $user->findOrFail( $id );

    	$userUpdate->fill( $request->all()->save() );

    	flash('تهانينا تم التحديت بنجاح', 'success');

        return redirect::back();
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

    public function anyData(Contact $contact)
    {

      $contact = $contact->all();

        return Datatables::of($contact)

           



            ->editColumn('type', function ($model) {

                return contactType( $model->type );


                		
            })

            ->editColumn('view', function ($model) {

                return contactSeen( $model->view );


                		
            })

            ->editColumn('reply', function ($model) {

                return contactRepleyed( $model->reply );


                		
            })
            
            ->editColumn('response', function ($model) {

                return link_to_route('contact.response', 'الإجابة على الرسالة', [ $model->id ], ['class' => 'btn btn-info btn-circle']);


                		
            })

            ->editColumn('delete', function ($model) {
            		
            		return link_to_route('admin-users-panel.destroy', 'حذف الرسالة', [ $model->id ], ['id' => 'delete', 'class' => 'btn btn-danger btn-circle']);

            })
            ->make(true);

    }




}
