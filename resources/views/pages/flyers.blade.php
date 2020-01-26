<div class="card text-white">
    <div class="card-header bg-primary"></div>
    <div class="card-body">
        <div class="row">
            @forelse ($flyers as $flyer)
             <div class="col-lg-4 mb-5">
                 <div class="card border-primary  shadow-lg">
                   <a href="/flyer/{{$flyer->id}}">
                      <img class="card-img-top" src="{{url('/storage/flyer')}}/{{json_decode($flyer->image)[0]}}"  height="200px">
                   </a>
                   <div class="card-footer bg-primary  text-right" style="font-size: smaller;">
                     <label>السعر:</label> {{$flyer->price}}  <label>جنية</label><br>
                     <label>المساحة:</label> {{$flyer->area}}  <label>متر</label><br>
                     <label>نوع العقار:</label> {{$flyer->category->name}}
                   </div>
                 </div>
             </div>
            @empty
                @include('message.notfound')
            @endforelse
        </div>
    {{$flyers->links()}}
   </div>
  </div>
