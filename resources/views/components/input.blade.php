@if ($label !== 'none')
    <label for="{{ $name }}" class="text-[#232323] font-normal">
        {{ $label }}
    </label><br>
@endif

@if($hasError != 'none')
    @php
        $error = true;
        $noerror = false;
    @endphp
@else
    @php
        $error = false;
        $noerror = true;
    @endphp
@endif

<input
    {{ $attributes->merge()}}
    @class(['border bg-violet-50 mt-1 p-2 w-full rounded-xl text-[#718EBF]','border-red-500 focus:outline-0 focus:outline-offset-0'  => $error, 'focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500' => $noerror])
    type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" id="{{ $name }}" value="{{ $value }}"
>
@if($error)
    {{ $inputError }}
@endif