<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    protected function createCategoryURL($name){
        $slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($name)));
        $category = Category::where('url',$slug)->get();
        $allCategories = Category::all();
        if($category->count() > 0){
            $slug = $slug . '-' . $allCategories->count();
        }
        return $slug;
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:255',
            'status'    => 'required'
        ]);

        if($validator->fails()){
            return Response()->json([
                'status'    => 401,
                'errors'    => $validator->errors()->all()
            ]);
        }
        $url = $this->createCategoryURL($request->name);
        $category = new Category();
        $category->name = $request->name;
        $category->url = $url;
        $category->status = $request->status;
        if($category->save()){
            return Response()->json([
                'status'    => 200,
                'message'   => 'Category Saved Successfully'
            ]);
        }else{
            return Response()->json([
                'status'    => 402,
                'message'   => 'Something went wrong. Please try again.'
            ]);
        }
    }
}
