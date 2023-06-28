<x-layout>

<x-slot name="titlePage">
    Home page
</x-slot>

<div class="container">
    <div class="row justify-content-evenly">
        @foreach($movies as $movie)
        <div class="col-3 mx-4">
            <x-card 
            :movie="$movie"

            pageis="welcome"
            />
        </div>
        @endforeach
    </div>
</div>

</x-layout>
        