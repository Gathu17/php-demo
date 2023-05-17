<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="post" action="/register">
                @csrf 
                <div class="mb-6">
                    <label for="name" class="block text-grey-darker text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey bg-grey-lighter leading-tight" placeholder="Name" required>
                </div>
                @error('name')
                  <p class="text-red-500 text-xs mt-2"> {{message}}</p>
                @enderror
                <div class="mb-6">
                    <label for="username" class="block text-grey-darker text-sm font-bold mb-2">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey bg-grey-lighter leading-tight" placeholder="Username" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-grey-darker text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey bg-grey-lighter leading-tight" placeholder="Email" required>
                </div>
                @error('email')
                  <p class="text-red-500 text-xs mt-2"> {{message}}</p>
                @enderror
                <div class="mb-6">
                    <label for="password" class="block text-grey-darker text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey bg-grey-lighter leading-tight" placeholder="Password" required>
                </div>
                <div class="mb-6">
                  <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                    Submit
                  </button>
                </div>
                @foreach ($errors as $error)
                   <li class="text-red-500 text-xs">{{error}}</li>
                @endforeach
            </form>
        </main>
    </section>
</x-layout>