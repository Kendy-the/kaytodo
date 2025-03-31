@php $auth = false; @endphp
@auth
    @php $auth = true; @endphp
@endauth

@if($auth)
    <x-layout.app-layout>
        <div class="pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">
            @include('shared.faq-and-help')
        </div>
    </x-layout.app-layout>
@else
    <x-layout.auth-layout>
        @section('title', 'Faq - Help')
        <div class="mt-14 h-dvh">
            @include('shared.faq-and-help')
        </div>
    </x-layout.auth-layout>
@endif