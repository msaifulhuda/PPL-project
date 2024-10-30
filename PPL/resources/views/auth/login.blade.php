<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">

  <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Left Side: Image -->
    <div class="w-5/12 bg-cover" style="background-image: url('/images/background-login.webp');">

    </div>

    <!-- Right Side: Login Form -->
    <div class="w-7/12 p-8 items-center">
      <div class="flex flex-col">
        <!-- Logo -->
        <img src="/images/SST-Logo.webp" alt="Logo" class="h-14 mb-6 mx-4 w-fit" >

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Let's Get Started</h2>
        <p class="text-gray-600 mb-8">Already have an account? <a href="#" class="text-blue-500">Log in</a></p>

        <!-- Login Form -->
        <form class="w-full" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
            <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <button type="submit" class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold">Login</button>
        </form>

      </div>
    </div>
  </div>

</body>
</html>
