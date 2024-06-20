@extends('events.layout')
 
@section('content')

    @if ($errors->any())
    <div class="text-white">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="max-w-[800px] mx-auto grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-8 pt-16">
    <div>
        <img src="{{ asset('imgs/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-auto rounded-2xl">
    </div>

    <div>
        <h1 class='font-bold text-blue-700 text-3xl pt-4 mb-2'>{{ $event->name }}</h1>
        <h2 class='font-medium text-xl mb-4'>{{ $event->courses_name }}</h2>
        <p class="my-8 text-gray-700">{{ $event->description }}</p>
        <div class="flex flex-col items-center mt-4 w-full">
            <div class="flex flex-row justify-center w-full mb-2">
                <label class="w-full text-center font-bold">Activity</label>
                <label class="w-full text-center font-bold">Category</label>
                <label class="w-full text-center font-bold">Status</label>
            </div>
            <div class="flex flex-row justify-center w-full text-center space-x-2">
                <p class="w-full text-sm">{{ $event->labels_name }}</p>
                <p class="w-full text-sm">{{ $event->categories_name }}</p>
                <p class="w-full text-sm">{{ $event->status_activities_name }}</p>
            </div>
        </div>
    </div>
</div>

@endsection