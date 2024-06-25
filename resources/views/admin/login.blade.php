<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-no-repeat bg-cover flex justify-center items-center h-[100vh]" style="background-image: url({{ asset('imgs/bg-register.png') }});">


  @if ($errors->any())
  <div class="flex justify-center text-center text-white">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="my-16 bg-blue-600 rounded-3xl grid justify-center items-center">
    <form class="mx-10 lg:mx-16 w-[30vh] lg:w-[37vh]" action="{{ route('admin.check') }}" method="POST">
      @csrf
      <div class="grid justify-center mt-8">
        <img class="w-52 " src="{{ asset('imgs/logo-white.svg') }}" alt="Logo" />
      </div>
      <div class="flex bg-blue-300 p-3 gap-2 my-8 rounded-xl">
        <img class="w-7" src="{{ asset('imgs/email.svg') }}" alt="Email" />
        <input class="bg-blue-300 w-full border-none outline-none text-base ff-main" name="email" placeholder="Email" type="email" />
      </div>

      <div class="flex bg-blue-300 p-3 gap-2 my-8 rounded-xl">
        <img class="w-7" src="{{ asset('imgs/password.svg') }}" alt="Password" />
        <input class="bg-blue-300 w-full border-none outline-none text-base ff-main" name="password" placeholder="Password" type="password" />
      </div>

      <input class="text-white p-2 bg-orange-500 flex rounded-xl items-center justify-center w-full my-8 cursor-pointer transition delay-150 duration-300 ease-in-out hover:bg-white hover:text-orange-500 ff-main" type="submit" name="btn-login" value="Next" />
    </form>
  </div>
</body>

</html>