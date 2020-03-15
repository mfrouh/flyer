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
                                <th> <label>{{number_format($flyer->price,0)}}</label>   <label>جنية</label></th>
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
                      <label>اسم الوسيط :</label> <label><a href="/user/{{ $flyer->user->id}}">{{ $flyer->user->name}}</a></label>
                      <img src="{{url('/storage/flyer/15798662701.jpg')}}" width="100%">
                      <label>البريدالالكتلروني :</label> <label>{{ $flyer->user->email}}</label><br>
                      <label>رقم الهاتف :</label> <label>{{ $flyer->user->phone}}</label>
                </div>
            </div>
            <div class="card border-primary text-center shadow-lg mt-5">
                <div class="card-header bg-primary">لها علاقة بالسعر</div>
                <div class="card-body text-right">
                  @foreach (array_slice($price, 0, 3) as $flyer)
                   <a href="/flyer/{{$flyer->id}}" style="text-decoration: none" class=" text-body">
                     <div class="row p-2 shadow-sm" >
                        <div class="col-lg-3 col-3 border-danger p-0">
                            <img class="" src="{{url('/storage/flyer')}}/{{json_decode($flyer->image)[0]}}" width="100%" height="70px">
                        </div>
                        <div class="col-lg-9 col-9">
                            <h6>{{$flyer->category->name}}</h6>
                            <label style="font-size: smaller">السعر:  </label> <label style="font-size: smaller"> {{number_format($flyer->price,0)}} </label> <label style="font-size: smaller">جنية</label><br>
                            <label style="font-size: smaller">المساحة:</label> <label style="font-size: smaller"> {{$flyer->area}}  </label> <label style="font-size: smaller">متر</label><br>
                        </div>
                     </div>
                   </a>
                  @endforeach
                </div>
            </div>
            <div class="card border-primary text-center shadow-lg mt-5">
                <div class="card-header bg-primary">لها علاقة بالمساحة</div>
                <div class="card-body text-right">
                  @foreach (array_slice($area, 0, 3) as $flyer)
                   <a href="/flyer/{{$flyer->id}}" style="text-decoration: none" class=" text-body">
                     <div class="row p-2 shadow-sm" >
                        <div class="col-lg-3 col-3 border-danger p-0">
                            <img class="" src="{{url('/storage/flyer')}}/{{json_decode($flyer->image)[0]}}" width="100%" height="70px">
                        </div>
                        <div class="col-lg-9 col-9">
                            <h6>{{$flyer->category->name}}</h6>
                            <label style="font-size: smaller">السعر:  </label> <label style="font-size: smaller"> {{number_format($flyer->price,0)}} </label> <label style="font-size: smaller">جنية</label><br>
                            <label style="font-size: smaller">المساحة:</label> <label style="font-size: smaller"> {{$flyer->area}}  </label> <label style="font-size: smaller">متر</label><br>
                        </div>
                     </div>
                   </a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
