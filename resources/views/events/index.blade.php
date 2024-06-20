<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('.success-message').fadeOut();
            }, 5000);
        });
    </script>
</head>
<body class="max-w-[900px] mx-auto px-4 bg-[#EFF6FE]">
    
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
    
    <div class="mt-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 space-y-4 lg:space-y-0">
            <h1 class="font-bold text-blue-700 lg:text-3xl text-2xl">Registered Activities</h1>
            <a class="self-start lg:text-lg text-base text-center font-bold text-blue-700 hover:text-white border-2 rounded-lg border-blue-700 hover:bg-blue-700 px-4 py-1" href="{{ route('events.create') }}">New Activity</a>
        </div>

        <div class="my-5">
        <form class="flex flex-row items-center mb-8 space-y-0 gap-2" action="{{ route('events.search') }}" method="GET">
            <div>
                <label for="event" class="block mb-2 text-sm font-medium">Activity Name:</label>
                <input id="event" type="text" class="bg-gray-10 border border-gray-300 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-2.5" name="event" placeholder="Name" >
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                <select id="category" name="category" class="bg-gray-10 border border-gray-300 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-2.5">
                    <option value="0">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-[1.9rem]">Search</button>
            </div>
        </form>
    </div>

        @if ($message = Session::get('success'))
        <div class="pb-2 text-base success-message">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="overflow-x-auto">
        <table class="w-full text-center table-auto border-separate border-spacing-y-4 bg-[#EFF6FE]">
            <thead class="bg-blue-700 text-white">
                <tr>
                    <th scope="col" class="px-4 py-2">Name</th>
                    <th scope="col" class="px-4 py-2">Course</th>
                    <th scope="col" class="px-4 py-2">Activity</th>
                    <th scope="col" class="px-4 py-2">Category</th>
                    <th scope="col" class="lg:px-4 px-6 py-2">Date</th>
                    <th scope="col" class="px-4 py-2">Time</th>
                    <th scope="col" class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr class="bg-white border-b hover:shadow-md">
                    <td class="p-4"> {{ $event->name }} </td>
                    <td class="p-4"> {{ $event->courses->name }} </td>
                    <td class="p-4"> {{ $event->labels->name }} </td>
                    <td class="p-4"> {{ $event->categories->name }} </td>
                    <td class="p-4"> {{ $event->date }} </td>
                    <td class="p-4"> {{ $event->hour }} </td>
                    <td>
                        <form class="p-4 flex items-center justify-center" action="{{ route('events.destroy',$event->id) }}" method="POST">    
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('events.show', $event->id) }}" class="mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-orange-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                            </a>

                            <a href="{{ route('events.edit', $event->id) }}" class="mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-orange-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>

                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-orange-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    

</body>
</html>