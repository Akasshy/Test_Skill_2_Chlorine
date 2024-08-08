<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryApiController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'unique:categoris'],
            'is_publish' => 'required'
        ]);

        if ($validator->fails ()) {
            return response()->json([
                'status' => 'Invalid',
                'errors' => $validator->errors()
            ], 422);
        }

        $categori = new Categori();
        $categori->name = $request->name;
        $categori->is_publish = $request->is_publish;
        $categori  ->save();

        return response()->json([
            'status' => 'Success',
            'categori' => $categori,
            'message' => 'Category created succesfully'
        ], 200);
    }

    public function get(Request $request)
    {
        if ($request->search) {
            $data['category'] = Categori::where('name','LIKE','%'.$request->search.'%')->get();
        }else{
            $data['category'] = Categori::get();
        }

        $data['count'] = $data['category']->count();
        return response()->json([
            'status' => 'Success',
            'lenght' => $data['count'],
            'categories' => $data['category']
        ], 200);
    }

    public function edit(Request $request)
    {
        $data['edit'] = Categori::find($request->id);
        return view('edit',$data);
    }

    public function update(Request $request, $id)
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

        Categori::where('id', $id)->update([
            'name' => $request->name,
            'is_publish' => $request->is_publish,
        ]);
        $category = Categori::find($id);

        return response()->json([
            'status' => 'Success',
            'category' => $category
        ], 200);
    }

    public function delete($id)
    {
        $Category = CategorI::where('id',$id)->delete();
        return response()->json([
            'status' => 'Success',
            'category' => $Category
        ],200);
    }
}