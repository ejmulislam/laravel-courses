<div class="w-full  bg-gray-100  h-auto bg-no-repeat bg-cover">
    <header class="w-full h-full relative ">
        <nav x-data="{ open: false }" class=" bg-white border-b border-gray-100 ">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="/">
                                <img class="w-56 h-auto object-contain" src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition" href="/courses">
                                Courses
                            </a>

                            <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition" href="/books">
                            Books
                            </a>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="flex items-center md:ml-4">

                            @if(Auth::check())
                                <div class="flex items-center gap-2">
                                    <span
                                        class="font-semibold text-lg text-gray-800">
                                        Welcome {{ Auth::User()->name }}
                                    </span>
                                </div>

                                @if (Auth::User()->type === 1)
                                    <a href=" {{route('dashboard')}} "
                                        class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">
                                        Dashboard
                                    </a>
                                    @else
                                    <a href=" {{route('dashboard')}} "
                                    class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">
                                    Submit a Course
                                </a>
                                @endif

                                <form action="{{route('logout')}}" method="POST">@csrf
                                    <button type="submit"
                                        class="block pl-3 pr-4 py-2 border-transparent text-base font-medium text-red-600 hover:text-red-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition">
                                        Logout
                                    </button>
                                </form>

                                @else
                                <a href="{{route('login')}}"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900">
                                    Sign in
                                </a>
                                <a href=" {{route('register')}} "
                                    class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">
                                    Sign up
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white">
                <div class="pt-2 pb-3 space-y-1">
                    <a class="block pl-3 pr-4 py-2 border-l-4 hover:border-indigo-400 text-base font-medium hover:text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition" href="/courses">
                    Courses
                    </a>

                    <a class="block pl-3 pr-4 py-2 border-l-4 hover:border-indigo-400 text-base font-medium hover:text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition" href="/books">
                    Books
                    </a>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="mt-3 space-y-4">
                        <h2 class="pl-4 mb-4 font-semibold text-xl">Profile</h2>
                        <!-- Account Management -->
                        @if (Auth::check())
                            <span class="ml-8 pr-4 py-2"> {{ Auth::User()->name }} </span> <br>
                            @if (Auth::User()->type === 1)
                                <a href=" {{route('dashboard')}} "
                                    class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">
                                    Dashboard
                                </a>
                                @else
                                <a href=" / "
                                    class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">
                                    Submit a Course
                                </a>
                            @endif
                            <form action="{{route('logout')}}" method="POST">@csrf
                                <button type="submit"
                                    class="block ml-8 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-red-600 hover:text-red-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition">
                                    Logout
                                </button>
                            </form>
                            @else
                            <a href="{{route('login')}}"
                                class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition" >
                                Sign In
                            </a>

                            <a href="{{route('register')}}"
                                class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition" >
                                Sign Up
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- ::::::::::::header content:::::::::::: -->
        <div class="sm:mt-20">
            <form action="/" method="GET">
                <div class="w-full relative max-w-[740px] lg:max-w-[860px] mx-auto px-5 pb-10 lg:pb-[138px] pt-20 lg:pt-24">
                    <div class="w-full max-w-[400px] sm:max-w-full mx-auto flex flex-col items-center justify-center">
                        <h1 class="lg:max-w-[750px] text-center w-full mx-auto heading-primary mb-3">
                            The best Courses and Books on the <span class="text-orange-100">Laravel</span> ecosystem
                        </h1>

                        <p class="text-lg-secondary w-full text-center my-4 mb-10">
                            Find the right books and courses on the Laravel framework and related topics to suite your level of expertise.
                            Know how good a course is through your peers review and share your own too.
                        </p>

                        <!-- ::::::::::::search for header:::::::::::: -->
                        <div class="grid grid-cols-1 md:grid-cols-[1fr,200px] lg:flex items-center flex-col sm:flex-row gap-5 max-w-[400px] sm:max-w-[700px] md:mb-0 w-full">
                            <input type="search" name="keyword" placeholder="Enter keywords to search courses" class="md:max-w-[482px] lg:max-w-[582px] w-full bg-white h-12 border border-orange-100 rounded-lg px-3.5 outline-none" required />
                            <button type="submit" class="btn-primary w-full lg:w-[106px] h-12 shrink-0">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            @include('components.series-logo')
        </div>
    </header>
</div>
