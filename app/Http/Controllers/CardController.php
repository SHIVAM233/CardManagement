<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {
        $card=Card::all();
        return view('welcome')->with(['card' => $card]);
    }

    public function create(Request $request)
    {
        if(isset($request->person_name)){
            
            $validator = Validator::make($request->all(), 
            [ 'person_name' => 'required', 'email' => 'required|unique:card|email', 'description' => 'required|max:255',
                 'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', 'address' => 'required' ]); 
            if ($validator->fails()) { return redirect()->back() ->withErrors($validator) ->withInput(); 
            }
            else{

                $data = $request->input();
                try{
                    $card = new Card;
                    $card->person_name = $data['person_name'];
                    $card->email = $data['email'];
                    $card->description = $data['description'];
                    $card->contact = (int)$data['contact'];
                    $card->address = $data['address'];
                    $card->save();
                    return redirect()->back()->with('status'," successfully");
                }
                catch(Exception $e){
                    return redirect()->back()->with('failed',"operation failed");
                }
            }
             
        }else 
        {
            return view('add');
        }  

    }


    public function edit($getid , Request $request)
    {
        //$getid = $request->id;
        if(isset($request->person_name)){
            
            $validator = Validator::make($request->all(), 
            [ 'person_name' => 'required', 'email' => 'required|email', 'description' => 'required|max:255',
                 'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', 'address' => 'required' ]); 
            if ($validator->fails()) { return redirect()->back() ->withErrors($validator) ->withInput(); 
            }
            else{

                $data = $request->input();
                try{
                    $card = Card::find($getid);
                    $card->person_name = $data['person_name'];
                    $card->email = $data['email'];
                    $card->description = $data['description'];
                    $card->contact = (int)$data['contact'];
                    $card->address = $data['address'];
                    $card->save();
                    return redirect()->back()->with('status'," successfully");
                }
                catch(Exception $e){
                    return redirect()->back()->with('failed',"operation failed");
                }
            }
             
        }else 
        {
            $card = Card::find($getid);
            return view('edit')->with(['card' => $card]);
        }  

    }

    public function destroy($id)
    {   
        $card = Card::destroy($id);
        return redirect()->back()->with('status'," Delete successfully");
    }

}
