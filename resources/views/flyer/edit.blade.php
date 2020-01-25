@extends('layouts.app')
@section('title',' تعديل اعلان عقار')
@section('content')

<div class="container">
    <div class="card border-primary text-right brdrd shadow-lg">
      <div class="card-header bg-primary brdrd"> تعديل اعلان عقار</div>
      <div class="card-body">
       <form action="/flyer/{{$flyer->id}}" method="post" enctype="multipart/form-data" style="width:100%;">
        @csrf
        @method('PUT')
        <div class="row">
           <div class="form-group col-lg-6" >
            <label for="category_id ">نوع العقار</label>
            <select class="form-control" name="category_id" id="">
                @php
                    $categories=App\category::all();
                @endphp
                @foreach ($categories as $category)
                 <option value="{{$category->id}}" {{$category->id==$flyer->category_id ?'selected':''}}>{{$category->name}}</option>
                @endforeach
            </select>
           </div>

           <div class="form-group col-lg-6">
              <label for="contract">العقد</label>
              <select class="form-control" name="contract" id="">
                <option value="sell" {{'sell'==$flyer->contract ?'selected':''}}>بيع</option>
                <option value="rent" {{'rent'==$flyer->contract ?'selected':''}}>ايجار</option>
              </select>
           </div>
        </div>

        <div class="row">
           <div class="form-group col-lg-12">
             <label for="description">الوصف</label>
             <textarea class="form-control" name="description" id="" rows="3">{{$flyer->description}}</textarea>
           </div>
        </div>

        <div class="row">
           <div class="form-group col-lg-4">
             <label for="image">الصور</label>
             <input type="file" class="form-control-file" name="image[]" multiple >
           </div>

           <div class="form-group col-lg-4">
               <label for="price">السعر</label>
               <input type="number" class="form-control" name="price" id="" value="{{$flyer->price}}"  placeholder="السعر">
           </div>

           <div class="form-group col-lg-4">
               <label for="area">المساحة</label>
               <input type="number" class="form-control" name="area" id="" value="{{$flyer->area}}"  placeholder="المساحة">
           </div>
        </div>

        <div class="row">
           <div class="form-group col-lg-12">
              <label for="">العنوان</label>
              <input type="text" name="address" id="" class="form-control" value="{{$flyer->address}}" placeholder="العنوان" >
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
