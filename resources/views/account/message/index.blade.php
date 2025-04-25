<x-layout.app-layout>
    <div class="fixed w-[90%]">
        <div class="lg:me-3 bg-white rounded-xl p-3 md:me-10">

            <div class="w-full h-screen bg-white relative" x-data="{ open: false, currentView: 'messages', showForm: false, mainBtn: true, refreshInterval: null }"
                x-effect="
                if (currentView === 'discussion') {
                    if (refreshInterval) clearInterval(refreshInterval);
                    refreshInterval = setInterval(() => {
                        refreshMessages();
                    }, 3000);
                } else {
                    if (refreshInterval) {
                        clearInterval(refreshInterval);
                        refreshInterval = null;
                    }
                }
            ">
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
                        @include('account.contact.list', [
                            'posts' => $contacts,
                            'chats' => $chats,
                        ])
                    </template>
                </div>

                {{-- Section CONTACTS --}}
                <div x-show="currentView === 'contacts'" class="flex-1 overflow-y-auto">
                    @include('shared.account.contact.index', [
                        'posts' => $contacts,
                    ])
                </div>

                {{-- Section MESSAGES (liste de conversations) --}}
                <div x-show="currentView === 'messages'" class="flex-1 overflow-y-auto">

                    @include('shared.account.message.index', [
                        'posts' => $chats,
                    ])
                </div>

                {{-- Section DISCUSSION (chat en cours) --}}
                <div id="message-container" x-show="currentView === 'discussion'" class="flex-1 flex flex-col">
                    {{-- Ajout de l'animation roulante --}}
                    <button id="loader" disabled type="button"
                        class="absolute bottom-1/2 left-1/2 transform -translate-x-1/2 text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2  inline-flex items-center">
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        Loading...
                    </button>
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
        let currentDiscussionId = null;

        function loadDiscussion(id) {

            currentDiscussionId = id;
            const container = document.getElementById('message-container');
            const loader = document.getElementById('loader');

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
                    container.innerHTML = html;
                    container.classList.add('fade-in');

                    setTimeout(() => container.classList.remove('fade-in'), 300);
                })
                .finally(() => loader.classList.add('hidden'));
        }

        function refreshMessages() {
            const messageCache = {};

            if (!currentDiscussionId) return;
            console.log('yes show')
            fetch('/account/message/load', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrr-token"]').getAttribute('content')
                },
                body: 'id=' + currentDiscussionId
            })
            .then(res => res.text())
            .then(newHtml => {
                const load = document.getElementById('message-load');
                load.innerHTML = newHtml;
            })
            .catch(error => console.error("Erreur côté JS :", error));
        }
    </script>

</x-layout.app-layout>
