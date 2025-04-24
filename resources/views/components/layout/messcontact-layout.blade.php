<div class="fixed w-[90%]">
    <div class="lg:me-3 bg-white rounded-xl p-3 md:me-10">

        {{-- Test --}}
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        <div class="w-full h-screen bg-white relative" x-data="{ open: false, currentView: 'messages' }">

            <!-- Header dynamique -->
            <div class="p-4 bg-gray-100 border-b flex justify-between items-center">
                <h2 class="text-lg font-bold"
                    x-text="{
      contacts: 'Contacts',
      messages: 'Messages',
      discussion: 'Discussion'
    }[currentView]">
                </h2>
            </div>

            <!-- Section CONTACTS -->
            <div x-show="currentView === 'contacts'" class="flex-1 overflow-y-auto">
                <div class="p-4 border-b">📇 Contact 1</div>
                <div class="p-4 border-b">📇 Contact 2</div>
            </div>

            <!-- Section MESSAGES (liste de conversations) -->
            <div x-show="currentView === 'messages'" class="flex-1 overflow-y-auto">
                <div class="p-4 border-b flex justify-between items-center">
                    💬 Discussion 1
                    <button class="text-sm text-purple-600" @click="currentView = 'discussion'">Ouvrir</button>
                </div>
                <div class="p-4 border-b flex justify-between items-center">
                    💬 Discussion 2
                    <button class="text-sm text-purple-600" @click="currentView = 'discussion'">Ouvrir</button>
                </div>
            </div>

            <!-- Section DISCUSSION (chat en cours) -->
            <div x-show="currentView === 'discussion'" class="flex-1 flex flex-col">
                <div class="flex-1 p-4 overflow-y-auto">
                    <p class="mb-2">👤 Salut, ça va ?</p>
                    <p class="text-right">🧑 Ouais et toi ?</p>
                </div>
                <div class="p-4 border-t flex">
                    <input type="text" class="flex-1 border rounded-l px-4 py-2" placeholder="Écrire un message...">
                    <button class="bg-purple-600 text-white px-4 py-2 rounded-r">Envoyer</button>
                </div>
                <button @click="currentView = 'messages'"
                    class="absolute top-4 left-4 bg-white border px-2 py-1 rounded text-sm hover:bg-gray-100">
                    ← Retour
                </button>
            </div>

            <!-- BOUTON FLOTTANT -->
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

                <!-- Bouton principal -->
                <button @click="open = !open" :class="{ 'rotate-45': open }"
                    class="w-14 h-14 rounded-full bg-purple-600 text-white text-2xl flex items-center justify-center shadow-lg hover:bg-purple-700 transform transition-transform duration-300">
                    +
                </button>
            </div>
        </div>

    </div>
</div>
