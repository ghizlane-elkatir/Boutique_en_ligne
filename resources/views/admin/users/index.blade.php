<x-admin-layout>
    <div class="w-full p-5 content">
      <header class="flex items-center justify-between py-4 pb-6 h-fit">
        <h1 class="text-3xl font-semibold text-white">Manage Users</h1>
        <a   href={{ route('admin.users.create') }} class="p-2 text-white bg-green-600 rounded-md hover:bg-green-700">Create User</a>
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
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Avatar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $user->id }}
                    </th>
                    <td class="px-6 py-4">
                      {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                      <a href="{{ $user->avatar }}" data-lightbox="user-avatar">
                        <img src="{{ $user->avatar }}" class="h-6" alt="user_avatar">
                      </a>
                    </td>
                    <td class="px-6 py-4">
                      <a href={{ route('admin.users.edit', $user->id) }} class="pr-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                      <form action={{ route('admin.users.destroy', $user->id) }} onsubmit="return confirm('Are you sure ?');" method="POST" class="inline">
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