@if ($object != 'none')
    {{-- s'il ya enregistrement --}}
    <div class=" bg-white rounded-xl p-5 pb-3 mt-5">
        <div>
            <h2 class="font-bold">Burnout Stats</h2>
            <p>you've completed {{ $sum }} more {{ isset($name) ? $name : "tasks"}} than usual, maintain
                your task with your supervor</p>
        </div>
        <div class="rounded-xl bg-gray-100 border-gray-300 border p-3 my-1">
            <div class="w-full my-2 h-3 rounded-2xl bg-gray-200">
                <div style="width:{{ $width }};"
                @class(["relative my-2 h-3 rounded-2xl",
                "bg-orange-500" => ($object < 50),
                "bg-[#795FFC]" => ($object < 80),
                "bg-green-500" => ($object <= 100)
            ])></div>
            </div>
        </div>
    </div> 
@else
    {{-- S'il n'y a pas d'enregistrement  --}}
    <div class="bg-white rounded-xl p-5 pb-3 mt-5">
        <div>
            <h2 class="font-bold">Burnout Stats</h2>
            <p>you've maintain your task at the right peace! keep up!</p>
        </div>
        <div class="rounded-xl bg-gray-100 border-gray-300 border p-3 my-1">
            <div class="w-full my-2 h-3 rounded-2xl bg-gray-200">
                <div style="width:100%" class="relative my-2 h-3 rounded-2xl bg-green-500"></div>
            </div>
        </div>
    </div>
@endif
