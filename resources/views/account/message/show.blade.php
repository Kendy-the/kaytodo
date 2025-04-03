<x-layout.app-layout>
    <x-layout.messcontact-layout>
        <x-slot:first-title>Message</x-slot:first-title>
        <x-slot:first>
            @include('shared.account.message.index', [
                    "post" => [],
                    "position" => "first-post"
                ])
        </x-slot:first>

        <x-slot:second-title>{{ isset($name) && !empty($name) ? $name : 'Jhon Doe'}}</x-slot:second-title>
        <x-slot:second>
            @include('shared.account.message.show', [
                    "post" => [],
                    "position" => "second-post",
                ])
        </x-slot:second>
    </x-layout.messcontact-layout>
</x-layout.app-layout>