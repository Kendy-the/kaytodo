<div class="flex justify-center">
    {{-- Pupup --}}
    <div class="fixed top-0 bg-gray-900/30 backdrop-blur-[2px] w-full h-dvh">
    <div class="h-40"></div>
        <div class="absolute top-90 md:top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[90%] md:w-auto">
            {{-- Petit carre --}}
            <div
                class="absolute top-[-45px] left-1/2 transform -translate-x-1/2  w-[80px] h-[80px] bg-[#6a0dad] rounded shadow">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    {{ $noticeIcone }}
                </div>
            </div>
            {{$slot}}
        </div>
    </div>
</div>