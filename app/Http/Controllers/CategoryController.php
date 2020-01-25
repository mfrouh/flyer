<?php

namespace App\Http\Controllers;
use App\flyer;
use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
         'name'=>'required|unique:categories',
        ]);
       $category=new category();
       $category->name=$request->name;
       $category->save();
       return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category,Request $request)
    {
        $flyer=flyer::where('category_id',$category->id);
        if(isset($request->contract))
        {
          $flyer->where('contract',$request->contract);
        }
        if(isset($request->category_id))
        {
          $flyer->where('category_id',$request->category_id);
        }
        if(isset($request->max_price))
        {
          $flyer->where('price','<=',$request->max_price);
        }
        if(isset($request->min_price))
        {
          $flyer->where('price','>=',$request->min_price);
        }
        if(isset($request->max_area))
        {
          $flyer->where('area','<=',$request->max_area);
        }
        if(isset($request->min_area))
        {
          $flyer->where('area','>=',$request->min_area);
        }
        return view('category.show')->with('flyers',$flyer->paginate(9));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',
        ]);
        $category->name=$request->name;
        $category->save();
        return redirect('/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return back();
    }
}
