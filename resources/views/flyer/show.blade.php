@extends('layouts.app')
@section('title',$flyer->category->name .' | '. $flyer->address)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-primary text-center shadow-lg">
                <div class="card-header bg-primary"></div>
                <div class="card-body text-right">
                    <label>الصور</label>
                    <div id="demo" class="carousel slide" data-ride="carousel" >
                        <ul class="carousel-indicators">
                            @foreach (json_decode($flyer->image) as $k=> $image)
                               <li data-target="#demo" data-slide-to="{{$k}}" ></li>
                            @endforeach
                        </ul>
                        <div class="carousel-inner">
                          @foreach (json_decode($flyer->image) as $k=> $image)
                             <div class="carousel-item @if($k==0){{'active'}}@endif">
                                 <img src="{{url('/storage/flyer')}}/{{$image}}" alt="Los Angeles" width="100%" height="500px">
                             </div>
                          @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <ul class="hy">
                        @foreach (json_decode($flyer->image) as $k=> $image)
                           <li data-target="#demo" data-slide-to="{{$k}}" >
                            <img src="{{url('/storage/flyer')}}/{{$image}}" alt="Los Angeles" width="60px" height="60px" style="padding:3px;">
                          </li>
                        @endforeach
                    </ul>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th><label>نوع العقار:</label></th>
                                <th> <label>{{$flyer->category->name}}</label></th>
                                <th><label>نوع العقد:</label></th>
                                <th> <label>{{$flyer->contract=='sell'?'بيع':'ايجار'}}</label> </th>
                            </tr>
                            <tr>
                                <th><label>السعر:</label></th>
                                <th> <label>{{$flyer->price}}</label>   <label>جنية</label></th>
                                <th><label>المساحة:</label></th>
                                <th> <label>{{$flyer->area}}</label>   <label>متر</label></th>
                            </tr>
                            <tr>
                                <th>العنوان:</th>
                            </tr>
                            <tr>
                                <th colspan="4">{{$flyer->address}}</th>
                            </tr>
                            <tr>
                                <th>الوصف:</th>
                            </tr>
                            <tr>
                                <th rowspan="4" colspan="4">{{$flyer->description}}</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-primary text-center shadow-lg">
                <div class="card-header bg-primary">للتواصل مع الوسيط</div>
                <div class="card-body text-right">
                      <label>اسم الوسيط :</label> <label>{{ $flyer->user->name}}</label>
                      <img src="{{url('/storage/flyer/15798662701.jpg')}}" width="100%">
                      <label>البريدالالكتلروني :</label> <label>{{ $flyer->user->email}}</label><br>
                      <label>رقم الهاتف :</label> <label>{{ $flyer->user->phone}}</label>
                </div>
            </div>
            <div class="card border-primary text-center shadow-lg mt-5">
                <div class="card-header bg-primary">اماكن لها علاقة</div>
                <div class="card-body text-right">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
