@php $auth = false; @endphp
@auth
    @php $auth = true; @endphp
@endauth

@if($auth)
    <x-layout.app-layout>
        <div>
            @include('shared.about-team')
        </div>
    </x-layout.app-layout>
@else
    <x-layout.auth-layout>
        @section('title', 'About - Team')
        <div class="mt-14">
            @include('shared.about-team')
        </div>
    </x-layout.auth-layout>
@endif