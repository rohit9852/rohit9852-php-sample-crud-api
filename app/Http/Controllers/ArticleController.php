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
        $blog->title = $req->title;
        $blog->body = $req->body;
        $blog = $blog->save();
        if($blog) {
            return response()->json('data save correctly', 200);
        } else {
            return response()->json('data saving failed due smone reason', 500);
        }
    }

    function UpdateData(Request $req) {
        $blog = Article :: find($req->id);
        $blog->body = $req->body;
        $blog = $blog->save();
        if($blog) {
            return response()->json('Data update correctly', 200);
        } else {
            return response()->json('Dat failed for some reason', 500);
        }
    }

    function DataDelete(Request $req, Article $id) {
        $id->delete();
        return response()->json("data succefull", 204);
    }
}
