<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReplyRequest;

use App\Reply;

use App\Contact;

use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    //

    public function create(Reply $replyTo,Contact $contactFrom, $id){

    	$mailWork = false;

    	if($id == -1){

    		$mailWork = true;

    		return view('admin.contact.composeMail', compact('mailWork') );

    	}else{

    		$contact = $contactFrom->find( $id );


    		return view('admin.contact.composeMail', compact('mailWork', 'contact') );

    	}

    	

    }

    protected function store(ReplyRequest $request, Reply $replyS)
    {


    	if( $request->from == 'dashboard' ){



    		$data = [
                
                'contact_id' => $request->contact_id, 
                'subject'  => $request->subject,
                'message' => $request->message,
                'confirmed' => 0,
                'deleted' => 0,
                'user_id' => Auth::id()
            ];

            if( $request->email ){

    			$data['email'] = $request->email;
    		}

    		if( $request->contact_id ){

    			$data['contact_id'] = $request->contact_id;
    		}

            // The user is logged in...
            $replyS->create( $data );


            return back();


    	}


    }

    public function sent(Reply $repliesSent){

    	$contacts = $repliesSent->where('confirmed', 1)->get();

    	$wichF = 'replyBox';

    	return view('admin.contact.mailBox', compact('wichF', 'contacts'));

    }

    public function draft(Reply $repliesDraft){

    	$contacts = $repliesDraft->where('confirmed', 0)->get();

    	$wichF = 'draftBox';

    	return view('admin.contact.mailBox', compact('wichF', 'contacts'));

    }

    public function trash(Reply $repliesTrash){

    	$contacts = $repliesTrash->where('deleted', 1)->get();

    	$wichF = 'trashBox';

    	return view('admin.contact.mailBox', compact('wichF', 'contacts'));

    }
}
