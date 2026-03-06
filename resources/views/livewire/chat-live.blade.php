<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Chat') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your profile and account settings') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>    

    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-white">
        {{-- left: User List --}}
        <div x-data="{ showForm : false, loading : false }" class="w-1/4 border-r bg-gray-50">
            <div class="flex justify-between p-4 font-bold text-gray-700 border-b">
                <div>
                    Users
                </div>
                <button @click="showForm = !showForm"
                    class="cursor-pointer text-sm text-purple-600 hover:text-purple-700 transition">
                    +
                </button>
            </div>
            <div class="p-3" x-show="showForm">
                @include('account.contact.new')
            </div>
            <div class="divide-y">
                @php $position = -1 @endphp
                @foreach ($chats as $chat)
                    @php $position++ @endphp
                    <div @click="loading = !loading" wire:click="selectInvite({{$chat->invite->id}},{{$position}})"
                        @class(['p-3 cursor-pointer hover:bg-blue-100 transition', 'bg-blue-50 font-semibold' => $selectedInvite->id === $chat->invite->id])>
                        <div class="text-gray-800">{{$chat->invite->getName()}}</div>
                        <div class="text-xs text-gray-500">{{$chat->invite->email}}</div>
                    </div>
                @endforeach                
            </div>
        </div>

        {{-- Right: Chat Section --}}
        <div class="w-3/4 flex flex-col">
            {{-- header --}}
            <div class="p-4 border-b bg-gray-50"> 
                <div class="text-lg font-semibold text-gray-800">{{$this->selectedInvite->getName()}}</div>
                <div class="text-xs text-gray-500">{{$this->selectedInvite->email}}</div>
            </div>

            {{-- message --}}
            <div id="message" class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                                
                {{-- loading - a implementer--}}
                {{-- <div x-show="loading">
                    <button id="loader" disabled type="button"class="absolute transform text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2  inline-flex items-center"><svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" /> <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" /> </svg> Loading...</button>
                </div> --}}

                @foreach ($chats[$activeChat]->messages as $message) 
                    <div @class(['flex', 
                        'justify-end' => $message->sender_id == $auth->id,
                        'justify-start' => $message->sender_id != $auth->id
                    ])>
                        <div @class(['max-w-xs px-4 py-2 rounded-2xl shadow', 
                            'bg-blue-600 text-white' => $message->sender_id == $auth->id,
                            'bg-gray-200 text-gray-800' => $message->sender_id != $auth->id
                        ])>
                            {{$message->content}}
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Typing indicator --}}
            <div id="typing-indicator" class="px-4 pb-1 text-xs text-blue-600 italic"></div>

            {{-- input --}}
            <form class="p-4 border-t bg-white flex items-center gap-2">
                <input
                type="text"
                class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-1"
                placeholder="Type your message..."/>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-full">
                    Send
                </button>
            </form>
        </div>
       
    </div>

</div>