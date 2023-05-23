<x-admin-layout>
    <div class="w-full p-6 create bg-gray-800">
      <header class="flex items-center justify-between py-4 pb-6 h-fit">
        <h2 class="text-3xl font-semibold text-white">Create User</h2>
        <a href={{ route('admin.users.show') }} class="p-2 text-white bg-green-600 rounded-md hover:bg-green-700">Users List</a>
      </header>
      <div class="flex items-center justify-center w-full py-10 rounded-md h-fit">
        <form class="bg-gray-00 w-96 h-fit" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" >
          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            @error('name')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
            @error('email')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <!-- Password -->
          <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
  
            <x-text-input id="password" class="bg-gray-800 block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
  
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
  
          <!-- Confirm Password -->
          <div class="mt-4 text-white">
              <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
  
              <x-text-input id="password_confirmation" class="bg-gray-800 block w-full mt-1"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
  
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
          <div class="mb-6">
            <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Picture</label>
            <input type="file" name="avatar" id="avatar" class="block w-full text-sm border border-gray-200 rounded-md shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-2 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400">
            @error('avatar')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
      </div>
    </div>
  </x-admin-layout>