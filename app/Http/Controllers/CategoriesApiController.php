<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\SendCategoryNotification;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesApiController extends Controller
{
   
     function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'unique:categories'],
            'is_publish' => 'required'
        ]);

        if ($validator->fails ()) {
            return response()->json([
                'status' => 'Invalid',
                'errors' => $validator->errors()
            ], 422);
        }

        // SendCategoryNotification::dispatch($validator);
        // $details = [
        //     'email' => 'imamamirulloh@gmail.com',
        //     'title' => 'Mail from Laravel Queue',
        //     'body' => 'This is for testing email using queue in Laravel'
        // ];

        
        
        
        $category = new Category();
        $category->name = $request->name;
        $category->is_publish = $request->is_publish;
        $category->save();
        
        return response()->json([
            'status' => 'Success',
            'category' => $category
        ], 200);

    }

     function search(Request $request)
    {
        if ($request->search) {
            $data['category'] = Category::where('name','LIKE','%'.$request->search.'%')->get();
        }else{
            $data['category'] = Category::get();
        }
        $data['count'] = $data['category']->count();
        return response()->json([
            'status' => 'Success',
            'lenght' => $data['count'],
            'categories' => $data['category']
        ], 200);
    }

     function edit(Request $request)
    {
        $data['edit'] = Category::find($request->id);
        return response()->json([
            'status' => 'success',
            'user' => $data['edit']
        ]);
    }

     function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','unique:categories'],
            'is_publish'=> ['required', 'boolean']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'errors' => $validator->errors()
            ], 422);
        }

        $category = Category::where('id', $id)->update([
            'name' => $request->name,
            'is_publish' => $request->is_publish,
        ]);
        return response()->json([
            'status' => 'Success',
            'category' => $category
        ], 200);
    }

     function delete($id)
    {
        Category::where('id',$id)->delete();
        return response()->json([
            'status' => 'Success',
            'message' => 'Category deleted'
        ], 200);
    }
}
