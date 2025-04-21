<x-layout.app-layout>
    <x-layout.messcontact-layout>
        <x-slot:first-title>Message</x-slot:first-title>
        <x-slot:first>
            @include('shared.account.message.index', [
                'posts' => $chats,
                'contacts' => $contacts,
                'position' => 'first-post',
            ])
        </x-slot:first>

        @php $trouver = false; $empty = false @endphp

        @forelse ($contacts as $contact)
            @if ($contact->id == $messages[0]->invite->id)
                @php $trouver = true @endphp
            @endif
        @empty
            @php $empty = true @endphp
            @if ($messages[0]->invite->id != (Auth::user())->id)
                <x-slot:second-title>{{ isset($messages[0]->invite) ? $messages[0]->invite->email : 'no message' }}</x-slot:second-title>
            @else
                <x-slot:second-title>{{ isset($messages[0]->user) ? $messages[0]->user->email : 'no message' }}</x-slot:second-title>
            @endif
        @endforelse

        @if ($trouver)
            @if ($messages[0]->invite->id != (Auth::user())->id)
                <x-slot:second-title>{{ isset($messages[0]->invite) ? $messages[0]->invite->first_name : 'no message' }}</x-slot:second-title>
            @else
                <x-slot:second-title>{{ isset($messages[0]->user) ? $messages[0]->user->first_name : 'no message' }}</x-slot:second-title>
            @endif
        @else
            @if(!$empty)
                @if ($messages[0]->invite->id != (Auth::user())->id)
                    <x-slot:second-title>{{ isset($messages[0]->invite) ? $messages[0]->invite->email : 'no message' }}</x-slot:second-title>
                @else
                    <x-slot:second-title>{{ isset($messages[0]->user) ? $messages[0]->user->email : 'no message' }}</x-slot:second-title>
                @endif
            @endif
        @endif

        <x-slot:second>
            @include('shared.account.message.show', [
                'posts' => $messages,
                'position' => 'second-post',
            ])
        </x-slot:second>

    </x-layout.messcontact-layout>
</x-layout.app-layout>