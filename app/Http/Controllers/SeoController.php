<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'title'         => 'required|string|max:255'
        ]);
        if($validator->fails()){
            return Response()->json([
                'status'    => 401,
                'errors'    => $validator->errors()->all()
            ]);
        }

        $seo = new Seo();
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            return Response()->json([
                'status'    => 200,
                'message'   => 'Information Saved Successfully'
            ]);
        }else{
            return Response()->json([
                'status'    => 402,
                'message'   => 'Something went wrong. Please try again.'
            ]);
        }
    }
}
