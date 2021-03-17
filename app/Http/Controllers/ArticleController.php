<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use GrahamCampbell\ResultType\Result;

class ArticleController extends Controller
{
    //
    function DataSave(Request $req) {
        $blog = new Article();
        $blog->title = $req ->title;
        $blog->body = $req ->body;
        $blog = $blog->save();
        if($blog) {
            return ["result"=>"Data save correctlly", "response code"=>"200 succefully"];
        } else {
            return ["result"=>"data Failed for some reason", "response code"=>"500 internal error"];
        }
    }

    function UpdateData(Request $req) {
        $blog = Article :: find($req-> id);
        $blog->body = $req->body;
        $blog = $blog->save();
        if($blog) {
            return ["result"=>"Data update correctlly", "response code"=>"200 succefully"];
        } else {
            return ["result"=>"data Failed for some reason", "response code"=>"500 internal error"];
        }
    }

    function DataDelete(Request $req, Article $id) {
        $id->delete();
        return response()->json("data succefull", 204);
    }
}
