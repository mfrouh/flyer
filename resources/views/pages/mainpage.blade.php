@extends('layouts.app')
@section('title','العقارات')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border-primary">
              <div class="card-header bg-primary text-center">بحث</div>
              <div class="card-body text-right">
                 <form action="">
                   <div class="form-group">
                     <label for="">نوع العقار</label>
                     <select class="form-control" name='category_id' id="">
                        @php
                            $categories=App\category::all();
                        @endphp
                          <option value="">اختار نوع العقار</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                     </select>
                   </div>

                   <div class="form-group">
                      <label for="">نوع العقد</label>
                      <select class="form-control" name='contract' id="">
                           <option value="">اختار نوع العقد</option>
                           <option value="sell">بيع</option>
                           <option value="rent">ايجار</option>
                      </select>
                   </div>
                   <div class="form-group ">
                    <label for="">السعر</label>
                    <div class="row">
                         <select class="form-control col-lg-6" name='min_price' id="">
                              <option value="">اقل سعر</option>
                              @for ($i = 1; $i < 20; $i++)
                                  <option value="{{$i}}00000">{{$i}}00.000 جنية</option>
                              @endfor
                         </select>
                         <select class="form-control col-lg-6" name='max_price' id="">
                             <option value="">اكثر سعر</option>
                              @for ($i = 2; $i < 21; $i++)
                                  <option value="{{$i}}00000">{{$i}}00.000 جنية</option>
                              @endfor
                         </select>
                    </div>
                   </div>
                   <div class="form-group ">
                    <label for="">المساحة</label>
                    <div class="row">
                         <select class="form-control col-lg-6" name='min_area' id="">
                              <option value="">اقل مساحة</option>
                              @for ($i = 10; $i < 1000; $i+=50)
                                  <option value="{{$i}}">{{$i}} متر</option>
                              @endfor
                         </select>
                         <select class="form-control col-lg-6" name='max_area' id="">
                             <option value="">اكثر مساحة</option>
                               @for ($i = 30; $i < 1050; $i+=50)
                                 <option value="{{$i}}">{{$i}} متر</option>
                               @endfor
                         </select>
                   </div>
                 </div>
                   <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">بحث</button>
                   </div>
                 </form>
              </div>
            </div>
        </div>
        <div class="col-lg-9">
            @include('pages.flyers')
        </div>
    </div>
</div>

@endsection
