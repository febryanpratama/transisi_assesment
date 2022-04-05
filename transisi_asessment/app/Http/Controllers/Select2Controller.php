<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2Controller extends Controller
{
    //
    public function getdataforselect2(Request $request){
        
        if ($request->ajax()) {

            $term = trim($request->term);
            $posts = DB::table('companies')->select('id','name as text')
                ->where('name', 'LIKE',  '%' . $term. '%')
                ->orderBy('name', 'asc')->paginate(5);
           
            $morePages=true;
           $pagination_obj= json_encode($posts);
           if (empty($posts->nextPageUrl())){
            $morePages=false;
           }
            $results = array(
              "results" => $posts->items(),
              "pagination" => array(
                "more" => $morePages
              )
            );
        
            return \Response::json($results);
        }
    }
}
