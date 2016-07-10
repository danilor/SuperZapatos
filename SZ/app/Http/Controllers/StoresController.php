<?php namespace App\Http\Controllers;


//This class will take care of the login information
use Illuminate\Support\Facades\Redirect;
use Request;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;



class StoresController extends Controller {



    public function __construct(){

    }

    public function store_form(){
        $data = [];
        $id = Request::segment(2);
        $store = \App\store::find($id);
        if($store == null){
            return Response::view('errors.404', [], 404);
        }
        $data['store'] = $store;
        return view('store_modify')->with($data);
    }

    public function save_store(){
        $id = Input::get('id');

        $rules = array(
            'storeName'         =>      'required|min:3',
            'storeAddress'      =>      'required|min:3',
        );

        $validador = Validator::make(Input::all(), $rules);
        if ($validador->fails()) {
            return Redirect::to('store/'.$id)->withErrors($validador)->withInput();
        }

        $store = null;
        if($id == ""){
            $store = new \App\store();
        }else{
            $store = \App\store::find($id);
            if($store == null){
                $store = new \App\store();
            }
        }
        $store -> name = Input::get('storeName');
        $store -> address = Input::get('storeAddress');
        $store -> save();
        return Redirect::to("stores");

    }

    public function delete_store(){
        $id = Request::segment(3);
        $store = \App\store::find($id);
        if($store != null){
                $store->delete();
        }
        return Redirect::to("stores");
    }


}
