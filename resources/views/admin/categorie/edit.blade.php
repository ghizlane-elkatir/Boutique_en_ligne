l<x-admin-layout>
    <div class="w-full p-6 create">
      <header class="flex items-center justify-between py-4 pb-6 h-fit">
        <h2 class="text-3xl font-semibold text-white">Create User</h2>
        <a href={{ route('admin.categorie.show') }} class="p-2 text-white bg-green-600 rounded-md hover:bg-green-700">Users List</a>
      </header>
      <div class="flex items-center justify-center w-full py-10 rounded-md h-fit">
        <form class="bg-gray-100 w-96 h-fit" method="POST" action="{{ route('admin.categorie.update', $categorie->id) }}" enctype="multipart/form-data" >
          @csrf
          @method('PUT')
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
            <input type="text" name="name" id="name" value="{{ $categorie->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required >
            @error('name')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          
         
          <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
      </div>
    </div>
  </x-admin-layout>