@extends('layouts.app')
@section('title','انشاء اعلان عقار')
@section('content')

<div class="container">
    <div class="card border-primary text-right brdrd shadow-lg">
      <div class="card-header bg-primary brdrd">انشاء اعلان عقار</div>
      <div class="card-body">
       <form action="/flyer" method="post" enctype="multipart/form-data" style="width:100%;">
        @csrf
        <div class="row">
           <div class="form-group col-lg-6" >
            <label for="category_id fr">نوع العقار</label>
            <select class="form-control" name="category_id" id="">
                @php
                    $categories=App\category::all();
                @endphp
                @foreach ($categories as $category)
                 <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
           </div>

           <div class="form-group col-lg-6">
              <label for="contract">العقد</label>
              <select class="form-control" name="contract" id="">
                <option value="sell">بيع</option>
                <option value="rent">ايجار</option>
              </select>
           </div>
        </div>

        <div class="row">
           <div class="form-group col-lg-12">
             <label for="description">الوصف</label>
             <textarea class="form-control" name="description" id="" rows="3"></textarea>
           </div>
        </div>

        <div class="row">
           <div class="form-group col-lg-4">
             <label for="image">الصور</label>
             <input type="file" class="form-control-file" name="image[]" multiple >
           </div>

           <div class="form-group col-lg-4">
               <label for="price">السعر</label>
               <input type="number" class="form-control" name="price" id=""  placeholder="السعر">
           </div>

           <div class="form-group col-lg-4">
               <label for="area">المساحة</label>
               <input type="number" class="form-control" name="area" id=""  placeholder="المساحة">
           </div>
        </div>

        <div class="row">
           <div class="form-group col-lg-12">
              <label for="">العنوان</label>
              <input type="text" name="address" id="" class="form-control" placeholder="العنوان" >
           </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>

       </form>
      </div>
    </div>
</div>

@endsection
