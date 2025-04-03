<x-layout.app-layout>
    <x-layout.messcontact-layout>
        <slot:first>
            @include('shared.contact', [
                    "post" => [],
                ])
        </slot:first>

        <slot:second>
            @include('shared.message', [
                    "post" => [],
                ])
        </slot:second>
    </x-layout.messcontact-layout>
</x-layout.app-layout>