<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\flyer;
class Pagecontroller extends Controller
{
    public function mainpage(Request $request)
    {
        $flyer=flyer::query();
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
        return view('pages.mainpage')->with('flyers',$flyer->paginate(9));
    }


}
