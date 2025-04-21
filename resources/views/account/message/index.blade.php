<x-layout.app-layout>
    <x-layout.messcontact-layout>
        <x-slot:first-title>Contact</x-slot:first-title>
        <x-slot:first>
            @include('shared.account.contact.index', [
                    "posts" => $contacts,
                    "position" => "first-post",
                ])
        </x-slot:first>

        <x-slot:second-title>message</x-slot:second-title>
        <x-slot:second>
            @include('shared.account.message.index', [
                    "posts" => $chats,
                    "contacts" => $contacts,
                    "position" => "second-post",
                ])
        </x-slot:second>
    </x-layout.messcontact-layout>
</x-layout.app-layout>