<div class="card text-white">
    <div class="card-header bg-yellow"></div>
    <div class="card-body">
        <div class="row">
            @forelse ($flyers as $flyer)
             <div class="col-lg-4 col-md-4 col-6 mb-5">
                 <div class="card brdrd">
                   <a href="/flyer/{{$flyer->id}}">
                      <img class="card-img-top brdrd" src="{{url('/storage/flyer')}}/{{json_decode($flyer->image)[0]}}"  height="200px">
                   </a>
                   <div class="card-footer bg-yellow  text-right" style="font-size: smaller;">
                     <label>السعر:</label> {{number_format($flyer->price,0)}}  <label>جنية</label><br>
                     <label>المساحة:</label> {{$flyer->area}}  <label>متر</label><br>
                     <label>نوع العقار:</label> {{$flyer->category->name}}
                   </div>
                 </div>
             </div>
            @empty
                @include('message.notfound')
            @endforelse
        </div>
    {{$flyers->appends(Request::except('page'))->links()}}
   </div>
  </div>
