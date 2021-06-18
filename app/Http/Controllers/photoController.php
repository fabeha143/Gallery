<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\photo;
use Validator;
use Illuminate\Support\Facades\File;

class photoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = photo::all();
       return view('photo', ['photo' => $photo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = category::select('id','name')->get();
        
        $categories = array();
        foreach( $items as $item )
        {
            $categories[$item->id] = $item->name;
        }
        return view('add_photo', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image')){
            $image = $request->file('image');
            $reImage = time() . '.' .$image->getClientOriginalExtension();
            $dest = public_path('images');
            $image->move($dest,$reImage);
            $save_data          = new photo();
            $save_data->img_alt = $request->img_alt;
            $save_data->category_id = $request->category_id;
            $save_data->image = $reImage;
            $save_data->save();
            return redirect(route('photo.index'))->with(['success' => 'photo Added!!']);
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photoedit = photo::where('id', $id)->first();
        $categories = category::all();

        $categoriesData = array();
        foreach( $categories as $category )
        {            
            $temp = $category->name;
            $categoriesData[$category->id] = $temp; 
        }
        return view('edit_photo', ['photoedit' => $photoedit, 'edit_photo' => $categoriesData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = photo::where('id', $id)->update([
            'image' => $request->image,
            'category_id' => $request->category_id,
    ]);

    
    return redirect(route('photo.index'))->with(['success' => 'photo edit!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        photo::where('id' , $id)->delete();
        return redirect(route('photo.index'))->with(['success' => 'photo Deleted!!']);
    }
}
