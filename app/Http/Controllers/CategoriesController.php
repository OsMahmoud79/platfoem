<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// bnadi 3lh el model 34an a3ml connect b el database
use App\Category;
use Illuminate\Support\Facades\Auth;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('categories.index')->with('categories',Category::all());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
 // $id=Auth::user()->type;
           
 //        dd($id);
    return view('categories.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" =>  "required",
        ]);

        $category = new Category;
        $category -> name = $request->name;
        $category->save();
     return redirect()->back();


// inf owner
// ownr_id=$category->id;
// $second_table=new infOwner
// $second_table->adrees=$request->address;
// $second_table->owner_id=ownr_id
       // dd($category->id); 
        //
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
        $category = Category::find($id);
        return view('categories.edit')->with('category',$category);
    }
        //return back(
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $category = Category::find($id);
         $category->name=$request->name;
         $category->save();

        //return redirect()->back();
        //Or
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
         return redirect()->route('categories');
    }
}
