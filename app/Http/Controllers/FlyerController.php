<?php

namespace App\Http\Controllers;

use App\flyer;
use Illuminate\Http\Request;

class FlyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('flyer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyer.create');
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
            'category_id'=>'required|numeric',
            'description'=>'required',
            'price'=>'required|numeric',
            'area'=>'required|numeric',
            'image'=>'array',
            'address'=>'required',
        ]);
        $flyer=new flyer();
        $flyer->category_id=$request->category_id;
        $flyer->user_id=auth()->user()->id;
        $flyer->description=$request->description;
        $flyer->price=$request->price;
        $flyer->area=$request->area;
        $flyer->address=$request->address;
        if ($request->image)
        {
            foreach($request->image as $image){
            $arr[]=sorteimage('storage/flyer',$image);
        }
            $flyer->image=json_encode($arr);
        }

        $flyer->save();
        return redirect('/flyer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function show(flyer $flyer)
    {
        return view('flyer.show',compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function edit(flyer $flyer)
    {
        if(auth()->user()->id==$flyer->user_id)
        {
            return view('flyer.edit',compact('flyer'));
        }
        else
        {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, flyer $flyer)
    {
        $this->validate($request,[
            'category_id'=>'required|numeric',
            'description'=>'required',
            'price'=>'required|numeric',
            'area'=>'required|numeric',
            'image'=>'array',
            'address'=>'required',
        ]);
        if(auth()->user()->id==$flyer->user_id)
        {
        $flyer->category_id=$request->category_id;
        $flyer->user_id=auth()->user()->id;
        $flyer->description=$request->description;
        $flyer->area=$request->area;
        $flyer->price=$request->price;
        $flyer->address=$request->address;
        $flyer->contract=$request->contract;
        if ($request->image)
        {
            foreach($request->image as $image){
            $arr[]=sorteimage('storage/flyer',$image);
        }
            $flyer->image=json_encode($arr);
        }
        $flyer->save();
        return redirect('/flyer');
       }
       else
       {
           return abort(404);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(flyer $flyer)
    {
        if(auth()->user()->id==$flyer->user_id)
        {
            $flyer->delete();
            return back();
        }
        else
        {
            return abort(401);
        }

    }
}
