<x-layout>

    <h2>il mio profilo</h2>
    <div class="container-fluid">
        @foreach(Auth::user()->movies as $movie)
        <div class="row">
            <div class="col-6 my-5">
                <ul>
                    <li>
                        <h4>Titolo</h4>
                        <p>{{$movie->name}}</p>
                    </li>
                    <li>
                        <h5>Regista</h5>
                        <p>{{$movie->director}}</p>
                    </li>
                    <li>
                        <h5>Descrizione</h5>
                        <p>{{$movie->description}}</p>
                    </li>
                </ul>
            </div>
            <div class="col-6 my-5">
                <img src="{{Storage::url($movie->img)}}" class="img-fluid" alt="">
            </div>
        </div>
        <hr>
        @endforeach
    </div>

</x-layout>