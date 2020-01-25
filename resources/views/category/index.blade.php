@extends('layouts.app')
@section('title',' انواع العقارات')
@section('content')
<div class="container">
    <a class="btn btn-primary" href="/category/create">انشاء نوع عقار</a>
    <table class="table table-hover table-condensed table-striped table-borderless table-light text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>نوع العقار</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $categories=App\category::all();
            @endphp
            @foreach ($categories as $k=> $category)
            <tr>
                <td scope="row">{{$k+1}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/category/{{$category->id}}/edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm"  onclick="event.preventDefault(); document.getElementById('delete-category').submit();"><i class="fa fa-trash"></i></a>
                    <form id="delete-category" action="/category/{{$category->id}}" method="POST" style="display: none;">
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
