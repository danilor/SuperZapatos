<?php namespace App\Http\Controllers;


//This class will take care of the login information
use Illuminate\Support\Facades\Redirect;
use Request;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;



class ServicesController extends Controller {
    public function __construct(){

    }

    public function stores(){

        $response = new \App\Classes\Response();
        $stores = \App\store::all();
        $stores_response = [];

        foreach($stores AS $s){
            $aux = new \stdClass();
            $aux->id = $s->id;
            $aux->address = $s->address;
            $aux->name = $s->name;
            $stores_response[] = $aux;
        }
        $response->setDataRoot('stores');
        $response->setData($stores_response);
        $response->setTotalElements(count($stores_response));
        return response($response->getResponse())->header('Content-Type', $response->getResponseType());
    }

    public function articles(){

        $response = new \App\Classes\Response();
        $articles = \App\Classes\Articles::getArticles();
        $articles_response = [];
        foreach($articles AS $s){
            $aux = new \stdClass();
            $aux->id = $s->id;
            $aux->description = $s->description;
            $aux->name = $s->name;
            $aux->price = (float)$s->price;
            $aux->total_in_shelf = (int)$s->total_in_shelf;
            $aux->total_in_vault = (int)$s->total_in_vault;
            $aux->store_name = $s->store_name;
            $aux->store_id = (int)$s->store_id;
            $articles_response[] = $aux;
        }
        $response->setDataRoot('articles');
        $response->setData($articles_response);
        $response->setTotalElements(count($articles_response));
        return response($response->getResponse())->header('Content-Type', $response->getResponseType());
    }

    public function articles_in_store(){
        $response = new \App\Classes\Response();

        $id = (int)Request::segment(4);
        if(!is_numeric($id)){
            $response = new \App\Classes\Response();
            $response -> setError(400,'Bad Request');
            return response($response->getResponse())->header('Content-Type', $response->getResponseType());
        }

        $store = \App\store::find($id);
        if($store == null){
            $response = new \App\Classes\Response();
            $response -> setError(404,'Record not Found');
            return response($response->getResponse())->header('Content-Type', $response->getResponseType());
        }

        $articles = \App\Classes\Articles::getArticles($id);
        $articles_response = [];
        foreach($articles AS $s){
            $aux = new \stdClass();
            $aux->id = $s->id;
            $aux->description = $s->description;
            $aux->name = $s->name;
            $aux->price = (float)$s->price;
            $aux->total_in_shelf = (int)$s->total_in_shelf;
            $aux->total_in_vault = (int)$s->total_in_vault;
            $aux->store_name = $s->store_name;
            $aux->store_id = (int)$s->store_id;
            $articles_response[] = $aux;
        }
        $response->setDataRoot('articles');
        $response->setData($articles_response);
        $response->setTotalElements(count($articles_response));
        return response($response->getResponse())->header('Content-Type', $response->getResponseType());
    }

    //This should handle all requests not inside the routing group
    public function missing(){
        $response = new \App\Classes\Response();
        $response -> setError(400,'Bad Request');
        return response($response->getResponse())->header('Content-Type', $response->getResponseType());
    }
}
