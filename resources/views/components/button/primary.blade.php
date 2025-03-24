@if ($action !== 'none')
    <a href="{{ $action }}"
    {{ $attributes->merge(['class' => 'my-1 text-center flex justify-center items-center cursor-pointer w-full h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'my-1 text-center flex justify-center items-center cursor-pointer w-full h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700']) }}>
        {{ $slot }}
    </button>
@endif