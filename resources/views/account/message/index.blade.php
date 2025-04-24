<x-layout.app-layout>
    

    <div class="fixed w-[90%]">
        <div class="lg:me-3 bg-white rounded-xl p-3 md:me-10">

            <div class="w-full h-screen bg-white relative" x-data="{ open: false, currentView: 'messages', showForm: false, mainBtn:true }">

                {{-- Header dynamique --}}
                <div class="p-4 bg-gray-100 border-b flex justify-between items-center">
                    <h2 class="text-lg font-bold"
                        x-text="{
                        contacts: 'Contacts',
                        messages: 'Messages',
                        discussion: 'Chat'
                        }[currentView]">
                    </h2>
                    <template x-if="currentView !== 'discussion'">
                        <button @click="showForm = !showForm"
                            class="text-sm bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700 transition">
                            +
                        </button>
                    </template>
                </div>

                {{-- FORMULAIRE dynamique --}}
                <div x-show="showForm" class="p-4 border-b bg-gray-50">
                    <template x-if="currentView === 'contacts'">
                        @include('account.contact.new')
                    </template>

                    <template x-if="currentView === 'messages'">
                        <form class="space-y-2">
                            <input type="text" placeholder="Nom de la discussion"
                                class="w-full border rounded px-3 py-2">
                            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">Créer
                                discussion</button>
                        </form>
                    </template>
                </div>

                {{-- Section CONTACTS --}}
                <div x-show="currentView === 'contacts'" class="flex-1 overflow-y-auto">
                    {{-- <div class="p-4 border-b">📇 Contact 1</div>
                    <div class="p-4 border-b">📇 Contact 2</div> --}}

                    @include('shared.account.contact.index', [
                        'posts' => $contacts,
                    ])
                </div>

                {{-- Section MESSAGES (liste de conversations) --}}
                <div x-show="currentView === 'messages'" class="flex-1 overflow-y-auto">

                    @include('shared.account.message.index', [
                        'posts' => $chats,
                    ])
                    {{-- <div class="cursor-pointer p-4 border-b flex justify-between items-center" @click="currentView = 'discussion'">
                        {{-- Nom de l'expediteur
                        💬 alpine
                        {{--<button class="cursor-pointer text-sm text-purple-600" >Ouvrir</button>
                    </div>
                    <div class="cursor-pointer p-4 border-b flex justify-between items-center" @click="currentView = 'discussion'">
                        {{-- Nom de l'expediteur
                        💬 Josue
                        {{--<button class="cursor-pointer text-sm text-purple-600" >Ouvrir</button>
                    </div> --}}
                </div>

                {{-- Section DISCUSSION (chat en cours) --}}
                <div id="message-container" x-show="currentView === 'discussion'" class="flex-1 flex flex-col">
                    hhh hfjf f fhfjjfnffn f
                    {{-- @include('shared.account.message.show') --}}
                    {{-- <div class="flex-1 p-4 overflow-y-auto">
                        <p class="mb-2">👤 Salut, ça va ?</p>
                        <p class="text-right">🧑 Ouais et toi ?</p>
                    </div>
                    <div class="p-4 border-t flex">
                        <input type="text" class="flex-1 border rounded-l px-4 py-2"
                            placeholder="Écrire un message...">
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-r">Envoyer</button>
                    </div> --}}
                    

                </div>

                {{-- BOUTON FLOTTANT --}}
                <div class="absolute bottom-40 right-4 flex flex-col items-end space-y-2" @click.outside="open = false">
                    <template x-if="open">
                        <div class="flex flex-col items-end space-y-2 mb-2">
                            <button @click="currentView = 'contacts'; open = false"
                                class="bg-white shadow px-4 py-2 rounded-full text-sm flex items-center space-x-2 hover:bg-gray-100">
                                <span>📇</span>
                                <span>Contacts</span>
                            </button>
                            <button @click="currentView = 'messages'; open = false"
                                class="bg-white shadow px-4 py-2 rounded-full text-sm flex items-center space-x-2 hover:bg-gray-100">
                                <span>💬</span>
                                <span>Messages</span>
                            </button>
                        </div>
                    </template>

                    {{-- Bouton principal --}}
                    <template x-if="mainBtn">
                        <button @click="open = !open" :class="{ 'rotate-45': open }"
                            class=" w-11 md:w-14  h-11 md:h-14 rounded-full bg-purple-600 text-white text-2xl flex items-center justify-center shadow-lg hover:bg-purple-700 transform transition-transform duration-300">
                            +
                        </button>
                    </template>
                    
                </div>
            </div>

        </div>
    </div>

    <script>
        function loadDiscussion(id) {
          fetch('/account/message/show', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csr-token"]').getAttribute('content')
            },
            body: 'id=' + id
          })
          .then(res => res.text())
          .then(html => {
            document.getElementById('message-container').innerHTML = html;
          });
        }
      </script>

    {{-- <x-slot:first-title>Contact</x-slot:first-title>
        <x-slot:first>
            @include('shared.account.contact.index', [
                    "posts" => $contacts,
                    "position" => "first-post",
                ])
        </x-slot:first>

        <x-slot:second>
            @include('shared.account.message.index', [
                    "posts" => $chats,
                    "contacts" => $contacts,
                    "position" => "second-post",
                ])
        </x-slot:second>

        <x-slot:third>
            @include('shared.account.message.index', [
                    "posts" => $chats,
                    "contacts" => $contacts,
                    "position" => "second-post",
                ])
        </x-slot:third> --}}
</x-layout.app-layout>
