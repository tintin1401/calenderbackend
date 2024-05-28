<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<div>
        <div class="text-center">
            <div>
                <h2 class="mb-2 mt-2 text-4xl font-medium leading-tight text-white">Add New IMC Result</h2>
            </div>
            <div>
                <a class=" inline-block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-auto" href="{{ route('events.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
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
    
    <form class="max-w-[360px] mx-auto" action="{{ route('events.store') }}" method="POST">
        @csrf
    
        <div>
            <div class="mt-2 mb-2">
                <div>
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                    <select name="categories"  id="categories" class="border-2 border-blue-700 rounded-md lg:w-[20rem] w-full p-2 text-blue-900">
                    <option value="">Select Category</option>
                    
                        

                    </select>
               
                </div>

            </div>
            
            <div class="mt-2 mb-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight:</label>
                    <input type="number" class="border-2 border-blue-700 rounded-md w-full p-2" name="weight" placeholder="1.0" min="1" max="400">
                </div>
            </div>
            <div class="mt-2 mb-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height:</label>
                    <input type="text" class="border-2 border-blue-700 rounded-md w-full p-2" name="height" placeholder="1.0" step="0.01" min="0" max="2.5">
                </div>
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </div>
    </form>
    
</body>
</html>