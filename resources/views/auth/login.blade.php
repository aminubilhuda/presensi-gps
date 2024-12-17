<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen">

    <!-- Container -->
    <div class="bg-white w-full max-w-sm p-8 rounded-lg">

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login</h2>

        <!-- Form -->
        <form action="/proseslogin" method="POST">
            @csrf
            <!-- Email Input -->
            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-600">NIK</label>
                <input type="nik" id="nik" name="nik"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nik" required>
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password" required>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>

            <!-- Forgot Password Link -->
            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-blue-500 hover:underline">Lupa password?</a>
            </div>

            <!-- Register Link -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Belum punya akun? <a href="#"
                        class="text-blue-500 hover:underline">Daftar di sini</a></p>
            </div>
        </form>

    </div>

</body>

</html>
