<?php namespace App\Http\Controllers;


//This class will take care of the login information
use Illuminate\Support\Facades\Redirect;
use Request;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;



class ArticlesController extends Controller {
    public function __construct(){

    }

    public function article_form(){
        $data = [];
        $id = Request::segment(2);
        $article = \App\article::find($id);
        if($article == null){
            $article = new \stdClass();
            $article -> name = 'New Store';
        }

        $stores = \App\store::all();
        $stores_aux = [];
        foreach($stores AS $s){
            $stores_aux[$s->id] =  '[' . $s->id . '] ' . $s->name . '';
        }
        $data['article'] = $article;
        $data['stores'] = $stores_aux;
        return view('article_modify')->with($data);
    }

    public function save_article(){
        $id = Input::get('id');
        $rules = array(
            'articleName'          =>      'required|min:3',
            'articleDescription'   =>      'required|min:3',
            'articlePrice'         =>      'required|numeric',
            'articleShelf'         =>      'required|numeric',
            'articleVault'         =>      'required|numeric',
            'store_id'             =>      'required|exists:stores,id',
        );
        $validador = Validator::make(Input::all(), $rules);
        if ($validador->fails()) {
            return Redirect::to('article/'.$id)->withErrors($validador)->withInput();
        }
        $article = null;
        if($id == ""){
            $article = new \App\article();
        }else{
            $article = \App\article::find($id);
            if($article == null){
                $article = new \App\article();
            }
        }
        $article -> name = Input::get('articleName');
        $article -> description = Input::get('articleDescription');
        $article -> price = (float)Input::get('articlePrice');
        $article -> total_in_shelf = (int)Input::get('articleShelf');
        $article -> total_in_vault = (int)Input::get('articleVault');
        $article -> store_id = (int)Input::get('store_id');
        $article -> save();
        return Redirect::to("articles");
    }

    public function delete_article(){
        $id = Request::segment(3);
        $article = \App\article::find($id);
        if($article != null){
            $article->delete();
        }
        return Redirect::to("articles");
    }

}
