@extends('layouts.app')
@section('title',' العقارات')
@section('content')
<div class="container">
    <a class="btn btn-primary" href="/flyer/create">انشاء عقار</a>
    <table class="table table-hover table-condensed table-striped table-borderless table-light text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>نوع العقار</th>
                <th>اسم المستخدم</th>
                <th>السعر</th>
                <th>المساحة</th>
                <th>الوصف</th>
                <th>العنوان</th>
                <th>نوع العقد</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $flyers=App\flyer::all();
            @endphp
            @foreach ($flyers as $k=> $flyer)
            <tr>
                <td scope="row">{{$k+1}}</td>
                <td>{{$flyer->category->name}}</td>
                <td>{{$flyer->user->name}}</td>
                <td>{{$flyer->price}}</td>
                <td>{{$flyer->area}}</td>
                <td title="{{$flyer->description}}">{!! \Str::limit($flyer->description,10) !!}</td>
                <td title="{{$flyer->address}}">{!! \Str::limit($flyer->address,10) !!}</td>
                <td>{{$flyer->contract}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/flyer/{{$flyer->id}}/edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm"  onclick="event.preventDefault(); document.getElementById('delete-flyer').submit();"><i class="fa fa-trash"></i></a>
                    <form id="delete-flyer" action="/flyer/{{$flyer->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
