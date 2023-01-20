<!-- ::::::::::::|Featured Courses|:::::::::::: -->
<section class="mt-20 lg:mt-[140px]">
    <h1 class="heading-tertiory text-center mb-10 md:mb-16">
        Featured Courses
    </h1>

    <!-- ::::::::::::card:::::::::::: -->
    <div class="max-w-[400px] sm:max-w-[700px] lg:max-w-7xl w-full sm:px-6 lg:px-8 mx-auto grid sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-10">
        @foreach ($courses as $course)
        @include('components.course-box')
        @endforeach
    </div>
    <div class="flex justify-center mt-12 mb-12">
        <a href="/courses">
            <button class="btn-primary max-w-[160px] w-full h-14 lg:w-32">
                Browse all
            </button>
        </a>
    </div>
</section>
