<x-layout>


<div class="container">
    <div class="row">
        <h2>{{$movie->name}}</h2>
        <p>{{$movie->description}}</p>
        <img src="{{Storage::url($movie->img)}}" alt="">
    </div>
</div>


</x-layout>