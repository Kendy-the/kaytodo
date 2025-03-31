<x-layout.app-layout>

    @section('title', 'Clock In')

<div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

    {{-- Task Banner --}}
    @include('shared.banner',[
        'title' => "Let's Clock-In!", 
        'content' => "Don't miss your clock in schedule",
        'imgPath' => '/assets/img/attendant-banner.svg'
    ])

    <div class="bg-white rounded-xl p-5 pb-3 mt-5">
        <div>
            <h2 class="font-bold">Total working Hour {{ isset($meeting) ? count($meeting) : "2" }}</h2>
            <p>Paid period
                {{ isset($periode) ? $periode->first . " - " . $periode->end : "4 Mars 2025 - 30 Mars 2025" }}</p>
        </div>
        @include('shared.attendant.form')
    </div>

    {{-- Si aucun enregistrement  --}}
    @if(isset($task))
        <div class="bg-white rounded-xl p-5 pb-3 mt-5">
            <div>
                <h2 class="font-bold">Working Periode</h2>
                <p>Your Working time in this paid periode</p>
            </div>
            <div class="mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
                <div>
                    <img src="{{ '/assets/img/task-empty.svg' }}" alt="Task Empty">
                </div>
                <div>
                    <h3 class="font-bold">No Working time available</h3>
                    <p>
                        it looks like you don't have any working time in this periode.<br>
                        Don't worry this space will be updated as new working time submit.
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- S'il ya enregistrement  --}}
    <div>
        <div class="bg-white rounded-xl p-5 pb-3 mt-5">
            <div>
                <h2 class="font-bold">{{ isset($periode) ? $periode->first : "4 Mars 2025" }}</h2>
            </div>

            <div class="my-2 flex justify-between  bg-gray-100 border border-gray-300 rounded-xl">
                <div class="w-[48%] flex flex-col px-3 pb-1 pt-3">
                    <h3>Total Hours</h3>
                    <p class="text-xl">{{ isset($totalHours) ? $totalHours : "08:00:00 Hrs"  }}</p>
                </div>
                <div class="w-[48%] flex flex-col px-3 pt-2 pb-3">
                    <h3>Clock In & Out</h3>
                    <p class="text-xl">
                        {{ isset($clock) ? $clock->clockIn . " - " . $clock->clockOut : "08:00 AM - 05:00 PM"  }}</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
</x-layout.app-layout>