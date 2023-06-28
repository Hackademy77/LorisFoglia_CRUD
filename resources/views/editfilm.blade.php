<x-layout>
    <h2>Modifica film</h2>
    <div class="container">
        <div class="row">
            <div class="col-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('movie.update', $movie)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" name="name" value="{{$movie->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Regista</label>
                        <input type="text" name="director" value="{{$movie->director}}" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Anno</label>
                        <input type="text" name="year" value="{{$movie->year}}" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Locandina</label>
                        <div>
                            <div class="row">
                                <div class="col-6"><input type="file" name="img" class="form-control" id="exampleInputPassword1"></div>
                                <div class="col-6"><img src="{{Storage::url($movie->img)}}" class="img-fluid" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Descrizione</label><br>
                        <textarea name="description" id="" cols="70" rows="5">{{$movie->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>