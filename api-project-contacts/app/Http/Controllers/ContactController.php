<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request){
        try{
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->save();
        }catch(\Exception $error){
            return ['error' => $error];
        }
    }

    public function index(){
        $contact = Contact::all('id', 'name','email', 'phone_number');
        return $contact;
    }

    public function show($id){
        $contact = Contact::find($id);
        return $contact;
    }

    public function update(Request $request, $id){
        try{
            $contact = Contact::find($id);
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->update();
        }catch(\Exception $error){
            return ['error' => $error];
        }
    }

    public function destroy($id){
        try{
            $contact = Contact::find($id);
            $contact->delete();        
            return ['success' => true];    
        }catch(\Exception $error){
            return ['error' => $error];
        }
    }
}
