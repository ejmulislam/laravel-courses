<!-- ::::::::::::series logo:::::::::::: -->
<div class="max-w-[440px] sm:max-w-[740px] lg:max-w-7xl w-full mx-auto mt-2 md:mt-0 px-4 sm:px-6 lg:px-8">
    <ul class="grid grid-cols-2 sm:grid-cols-3 lg:flex items-center flex-nowrap justify-center lg:justify-between md:gap-y-7 gap-3">

        @foreach ($series as $item)
        <li class="w-full lg:max-w-[165px]">
            <a href="https://laravel-courses.com/series/laravel" class="bg-white border mx-auto border-orange-100 box-shadow w-full h-12 md:h-16 rounded-lg flex items-center justify-center">
                <img src=" {{ $item->image }} " alt="Laravel" class="w-20 md:w-auto h-auto object-contain" />
            </a>
        </li>
        @endforeach
        
    </ul>
</div>
