@props([
    'titleLesson',
    'courseVideo'=> false,
    'courseReading'=> false,
])

<div class="flex flex-col gap-7 h-full border border-gray-400 p-2 xl:p-12 rounded-lg">
    <div class="flex flex-col justify-between h-full divide-y divide-gray-600">
        <div class="flex flex-col mb-4">
            <span class="text-xl font-bold mb-4">{{ $titleLesson }}</span>
            @if ($courseVideo)
                <video class="w-full h-auto max-w-full" controls>
                    <source src="{{ asset('assets/video/countdown-15s.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
            @if ($courseReading)
                <div class="flex flex-col gap-3">
                    <span class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit eum
                        alias hic sapiente eveniet dolore corporis, nesciunt beatae quasi similique sed
                        dolores totam ipsam perspiciatis veniam iste quae a nisi dolor! Eius aliquam
                        provident unde reprehenderit qui placeat ad non dolorum. Praesentium cupiditate at
                        delectus minus vel quae, expedita ipsa recusandae eaque sequi ad minima ex ipsum.
                        Vero rem at reprehenderit corrupti id, excepturi voluptatem asperiores cupiditate!
                        Corporis ullam saepe sequi natus accusantium. Debitis rerum corporis maxime
                        recusandae, iure dicta.</span>
                    <span class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit eum
                        alias hic sapiente eveniet dolore corporis, nesciunt beatae quasi similique sed
                        dolores totam ipsam perspiciatis veniam iste quae a nisi dolor! Eius aliquam
                        provident unde reprehenderit qui placeat ad non dolorum. Praesentium cupiditate at
                        delectus minus vel quae, expedita ipsa recusandae eaque sequi ad minima ex ipsum.
                        Vero rem at reprehenderit corrupti id, excepturi voluptatem asperiores cupiditate!
                        Corporis ullam saepe sequi natus accusantium. Debitis rerum corporis maxime
                        recusandae, iure dicta.</span>
                    <span class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit eum
                        alias hic sapiente eveniet dolore corporis, nesciunt beatae quasi similique sed
                        dolores totam ipsam perspiciatis veniam iste quae a nisi dolor! Eius aliquam
                        provident unde reprehenderit qui placeat ad non dolorum. Praesentium cupiditate at
                        delectus minus vel quae, expedita ipsa recusandae eaque sequi ad minima ex ipsum.
                        Vero rem at reprehenderit corrupti id, excepturi voluptatem asperiores cupiditate!
                        Corporis ullam saepe sequi natus accusantium. Debitis rerum corporis maxime
                        recusandae, iure dicta.</span>
                </div>
                <a href="{{ route('murid.course-module') }}" class="flex justify-end pt-4 lg:pt-6 xl:pt-8">
                    <x-button-primary iconNone="true" type="button">Mark as done</x-button-primary>
                </a>
            @endif
        </div>
        <div class="flex gap-2 py-4">
            <x-icon icon="iconReportIssue" fill="#5F5FFF"></x-icon>
            <a class="text-primary-1100 font-light">Report an issue</a>
        </div>
    </div>
</div>
