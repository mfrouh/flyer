@extends('layouts.app')
@section('title','انشاء نوع العقار')
@section('content')

<div class="container">
   <div class="card border-primary text-right brdrd shadow-lg">
      <div class="card-header bg-primary brdrd">انشاء نوع العقار</div>
      <div class="card-body">
       <form action="/category" method="post">
           @csrf
           <div class="form-group">
             <label for="category">النوع</label>
             <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="category-name">
           </div>
           <div class="form-group text-center">
               <button type="submit" class="btn btn-primary">حفظ</button>
           </div>
       </form>
      </div>
   </div>
</div>

@endsection
