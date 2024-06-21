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

    <div class="flex flex-col justify-center">
        <h1 class='font-bold text-blue-700 text-3xl mb-4'>{{ $event->name }}</h1>
        <h2 class='font-bold text-xl'>{{ $event->courses_name }}</h2>
        <p class="my-4 text-gray-700">{{ $event->description }}</p>
        <p class="font-bold mb-6">Due Date: <span class="text-gray-700 font-normal">{{ $event->date }} - {{ $event->hour }}</span></p>
        <div class="flex flex-col items-center mt-4 w-full">
            <div class="flex flex-row justify-center w-full mb-2">
                <label class="w-full text-center font-bold">Activity</label>
                <label class="w-full text-center font-bold">Category</label>
                <label class="w-full text-center font-bold">Status</label>
            </div>
            <div class="flex flex-row justify-center w-full text-center space-x-2">
                <p class="w-full text-gray-700">{{ $event->labels_name }}</p>
                <p class="w-full text-gray-700">{{ $event->categories_name }}</p>
                <p class="w-full text-gray-700">{{ $event->status_activities_name }}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-center">
        <img src="{{ asset('imgs/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover rounded-2xl">
    </div>
</div>

@endsection