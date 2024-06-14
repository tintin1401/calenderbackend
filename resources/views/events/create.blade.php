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

    <form class="max-w-[360px] mx-auto" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Example of a form that Dropzone can take over -->

        <h1 class='font-bold text-blue-700 text-3xl mb-4 pt-4'>Create Activity</h1>
        <div class="w-full">
            <label for="file" class="mb-4 flex flex-col items-center text-center justify-center w-full border-2 border-blue-700 border-dashed rounded-lg cursor-pointer bg-white" id="drop-area">
                <input  type="file" name="file" id="file" accept="image/*" hidden required>
                <div id="img-view" class="bg-cover bg-center bg-no-repeat w-full h-[20vh]">
                    <svg class="w-8 h-8 mx-auto mt-6 text-gray-800 justify-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                    </svg>
                    <p id="p-file" class="admin-text">Drag and drop or click here to upload image</p>
                    <span>Upload any images from desktop</span>
                </div>
            </label>
        </div>
        <div class="grid md:grid-cols-[auto_auto] gap-2">
            <div class='mb-4'>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" id="name" name="name" class="border-2 border-blue-700 rounded-md w-full p-2" placeholder="Activity Name" />
            </div>
            <div>
                <label for="course" class="block mb-2 text-sm font-medium text-gray-900">Course</label>
                <select id="course" name="course" class="border-2 border-blue-700 rounded-md w-full p-2">
                    <option value="">Select Courses</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                <select name="category" id="category" class="border-2 border-blue-700 rounded-md w-full p-2">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='mb-4'>
                <label for="schedule" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                <input type="date" id="schedule" name="schedule" class="border-2 border-blue-700 rounded-md w-full p-2" value="{{ $date }}" min="{{ $date }}" />
            </div>
            <div>
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Time</label>
                <input type="time" id="time" name="time" class="border-2 border-blue-700 rounded-md w-full p-2" />
            </div>
            <div class='mb-4'>
                <label for="label" class="block mb-2 text-sm font-medium text-gray-900">Activity</label>
                <select id="label" name="label" class="border-2 border-blue-700 rounded-md w-full p-2">
                    <option value="">Select Activity</option>
                    @foreach ($labels as $label)
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label htmlFor="description" class="block text-sm font-medium text-gray-900">Description</label>
        <textarea type="text" rows="4" id="description" name="description" class="border-2 border-blue-700 rounded-md w-full p-2" placeholder="Activity Description"></textarea>
        <div class="grid gap-6 lg:grid-cols-2 w-full pb-8 mt-4">
            <button type="reset" class="text-black border-2 border-orange-700 p-2 rounded-lg">Reset</button>
            <button type="submit" class="text-white bg-orange-700 p-2 rounded-lg">Save</button>
        </div>
    </form>
    @vite('resources/js/admin.js')
</body>

</html>