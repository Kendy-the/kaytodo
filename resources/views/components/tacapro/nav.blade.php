{{-- Nav --}}
<div class="bg-white rounded-3xl w-full flex justify-between my-4 text-sm md:text-lg">
    <a href="/{{ $name }}" @class([
        'group hover:bg-[#795FFC] hover:text-white transition-all duration-500 rounded-3xl w-[33%] p-2 flex items-center justify-center gap-1',
        'bg-[#795FFC] text-white' => Request::is($name),
    ])>
        <div>{{ $first }}</div>
        <div @class([
            'flex items-center justify-center w-5 h-5 rounded-full group-hover:bg-red-500 text-white bg-gray-400',
            'bg-red-500' => Request::is($name),
        ])>{{ $firstValue }}</div>
    </a>

    <a href="/{{ $name }}/{{ strtolower(str_replace(' ', '-', $second)) }}" @class([
        'group hover:bg-[#795FFC] hover:text-white transition-all duration-500 rounded-3xl w-[33%] p-2 flex items-center justify-center gap-1',
        'bg-[#795FFC] text-white' => Request::is(
            $name . '/' . strtolower(str_replace(' ', '-', $second))),
    ])>
        <div>{{ $second }}</div>
        <div @class([
            'flex items-center justify-center w-5 h-5 rounded-full group-hover:bg-red-500 text-white bg-gray-400',
            'bg-red-500' => Request::is(
                $name . '/' . strtolower(str_replace(' ', '-', $second))),
        ])>{{ $secondValue }}</div>
    </a>

    <a href="/{{ $name }}/{{ strtolower(str_replace(' ', '-', $third)) }}" @class([
        'group hover:bg-[#795FFC] hover:text-white transition-all duration-500 rounded-3xl w-[33%] p-2 flex items-center justify-center gap-1',
        'bg-[#795FFC] text-white' => Request::is(
            $name . '/' . strtolower(str_replace(' ', '-', $third))),
    ])>
        <div>{{ $third }}</div>
        <div @class([
            'flex items-center justify-center w-5 h-5 rounded-full group-hover:bg-red-500 text-white bg-gray-400',
            'bg-red-500' => Request::is(
                $name . '/' . strtolower(str_replace(' ', '-', $third))),
        ])>{{ $thirdValue }}</div>
    </a>
</div>
