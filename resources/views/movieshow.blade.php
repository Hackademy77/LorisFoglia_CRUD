<x-layout>


<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>{{$movie->name}}</h2>
            <p>{{$movie->description}}</p>
            <p>Tag: 
                @foreach($movie->tags as $tag)
                    <span class="me-2"><i>{{$tag->name}}</i></span>
                @endforeach
            </p>
        </div>
        <div class="col-6">
            <img src="{{Storage::url($movie->img)}}" class="img-fluid img-custom" alt="">
        </div>
    </div>
</div>


</x-layout>