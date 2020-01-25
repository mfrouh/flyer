@extends('layouts.app')
@section('title',' تعديل نوع العقار')
@section('content')

<div class="container">
 <div class="card border-primary text-right brdrd shadow-lg">
     <div class="card-header bg-primary brdrd">تعديل نوع العقار</div>
     <div class="card-body">
       <form action="/category/{{$category->id}}" method="post">
           @csrf
           @method('PUT')
           <div class="form-group">
             <label for="category">النوع</label>
             <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="category-name" value="{{$category->name}}">
           </div>
           <div class="form-group text-center">
             <button type="submit" class="btn btn-primary">حفظ</button>
           </div>
       </form>
     </div>
 </div>
</div>

@endsection
