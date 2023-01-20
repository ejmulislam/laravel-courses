<x-guest-layout>
    @include('components.header-courses')
    <section class="my-20 lg:mt-[140px] ">
        <h1 class="heading-tertiory text-center mb-10 md:mb-16">
            Courses on {{ $series->name }}
        </h1>
        <div class="max-w-[400px] sm:max-w-[700px] lg:max-w-7xl w-full sm:px-6 lg:px-8 mx-auto grid sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-10">
            @foreach($courses as $course)
            @include('components.course-box', ['course' =>$course])
            @endforeach
        </div>
        <div class="p-8 float-right">
            {{ $courses->links() }}
        </div>
    </section>
    @include('components.footer-section')
</x-guest-layout>
