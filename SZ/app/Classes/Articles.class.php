<?php
namespace App\Classes;

class Articles{


        public static function getArticles($store_id = null){
            $q = \App\article::select('articles.*','stores.name AS store_name');
            $q ->leftJoin('stores', 'stores.id', '=', 'articles.store_id');
            if($store_id != null && is_numeric($store_id)){
                $q -> where("articles.store_id",$store_id);
            }
            return $q->get();

        }

}

