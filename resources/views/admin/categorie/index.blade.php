<x-admin-layout>
    <div class="w-full p-5 content">
      <header class="flex items-center justify-between py-4 pb-6 h-fit">
        <h1 class="text-3xl font-semibold text-white">Manage Categorie</h1>
        <a   href={{ route('admin.categorie.create') }} class="p-2 text-white bg-green-600 rounded-md hover:bg-green-700">Create Categorie</a>
      </header>
      {{-- {{ dd($users) }} --}}
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($categories as $categorie)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $categorie->id }}
                    </th>
                    <td class="px-6 py-4">
                      {{ $categorie->name }}
                    </td>
                    
                    <td class="px-6 py-4">
                      <a href={{ route('admin.categorie.edit', $categorie->id) }} class="pr-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                      <form action={{ route('admin.categorie.destroy', $categorie->id) }} onsubmit="return confirm('Are you sure ?');" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                          Delete
                        </button>
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
    
  </x-admin-layout>