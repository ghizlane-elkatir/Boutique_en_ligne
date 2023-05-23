<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <link href="path/to/tailwind.css" rel="stylesheet">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <!-- Logo -->
          <div class="flex-shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                    <img src={{ asset('images/logo.png') }} alt="logo" class=" w-14">
                
            </a>
          </div>
  
          <!-- Navigation Links -->
          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
              {{ __('Categorie') }}
            </x-nav-link>
            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
              {{ __('Product') }}
            </x-nav-link>
            @role('admin')
            <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
              {{ __('Admin') }}
            </x-nav-link>
            @endrole
            <x-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')">
              {{ __('Cart') }}
            </x-nav-link>
          </div>
        </div>
        @auth
        <div>
          <a href="{{ route('profile.edit') }}">
            <img src="{{ auth()->user()->avatar }}" class="w-10 rounded-full" alt="profile pic">
          </a>
        </div>
        @else
        <div class="flex items-center h-full gap-3">
          <a href="{{ route('login') }}" class="second-btn">
            Login
          </a>
          <a href="{{ route('register') }}" class="btn">
            Register
          </a>
        </div>
        @endauth
      </div>
      <script src="path/to/tailwind.js"></script>
    </div>
  </nav>