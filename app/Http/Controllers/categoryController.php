<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $category = category::all();
           return view('category', ['category' => $category]);

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        category::create([
            'name' => $request->name,
        ]);
        return redirect(route('category.index'))->with(['success' => 'Category Added!!']);
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
        $categoryedit  = category::where('id' , $id)->first();
        return view('edit_category',['categoryedit' => $categoryedit] );
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
        category::where('id' , $id)->update([

            'name' => $request->name,
        ]);
        return redirect(route('category.index'))->with(['success' => 'Category Updated!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id' , $id)->delete();
        return redirect(route('category.index'))->with(['success' => 'Category Deleted!!']);
    }
}
