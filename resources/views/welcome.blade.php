<x-layout>

<x-slot name="titlePage">
    Home page
</x-slot>

<div class="container">
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-3">
            <x-card 
            :movie="$movie"
            pageis="welcome"
            />
        </div>
        @endforeach
    </div>
</div>

</x-layout>
        