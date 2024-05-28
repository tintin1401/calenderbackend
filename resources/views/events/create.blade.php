<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    

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

        <h1 class='font-bold text-blue-700 text-3xl mb-4 pt-4'>Agregar actividad</h1>
        <div class="flex items-center gap-4 mb-8">
            <img class='block rounded-md w-[40rem] h-[8rem] object-cover' src="{{ asset('imgs/course02.jpg') }}" alt="User Profile" />
        </div>
        <div class="grid md:grid-cols-[auto_auto] gap-2">
            <div class='mb-4'>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                <input type="text" id="name" name="name" class="border-2 border-blue-700 rounded-md w-full p-2" placeholder="Nombre de la actividad" />
            </div>
            <div>
                <label for="course" class="block mb-2 text-sm font-medium text-gray-900">Curso</label>
                <select id="course" name="course" class="border-2 border-blue-700 rounded-md w-full p-2">
                <option value="">Select Courses</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Categoría</label>
                <select name="category" id="category" class="border-2 border-blue-700 rounded-md w-full p-2">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='mb-4'>
                <label for="schedule" class="block mb-2 text-sm font-medium text-gray-900">Fecha</label>
                <input type="date" id="schedule" name="schedule" class="border-2 border-blue-700 rounded-md w-full p-2" />
            </div>
            <div>
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Hora</label>
                <input type="time" id="time" name="time" class="border-2 border-blue-700 rounded-md w-full p-2" />
            </div>
            <div class='mb-4'>
                <label for="label" class="block mb-2 text-sm font-medium text-gray-900">Actividad</label>
                <select id="label" name="label" class="border-2 border-blue-700 rounded-md w-full p-2">
                <option value="">Select Activity</option>
                @foreach ($labels as $label)
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label htmlFor= "description" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                <textarea type="text" rows="4" id="description" name="description" class="border-2 border-blue-700 rounded-md w-full p-2" placeholder="Descripción de la actividad"></textarea>
            </div>

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-blue-700 border-dashed rounded-lg cursor-pointer bg-white  ">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG or JPG</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>

        </div>
        <div class="grid gap-6 lg:grid-cols-2 grid-cols-1 lg:w-[20rem] w-full pb-8 mt-8">
            <button type="submit" class="text-black border-2 border-orange-700 p-2 rounded-lg">Reset</button>
            <button type="submit" class="text-white bg-orange-700 p-2 rounded-lg">Save</button>
        </div>
    </form>

</body>

</html>