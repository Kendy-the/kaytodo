<div class="absolute top-4 left-4 right-4">
    <div class="flex justify-between">
        <button x-on:click="currentView = 'messages'; mainBtn = !mainBtn"
            class="cursor-pointer bg-white border px-7 py-1 rounded text-sm hover:bg-gray-100">
            ← Retour
        </button>
        {{-- Nom du recipient --}}
        <div>{{ \App\Models\User::getContactName($contacts,$posts[0]) }}</div>
    </div>
</div>

<div class="h-dvh overflow-y-scroll pb-65 md:pb-60 ps-2" id="show-refresh">

    @php $auth = (Auth::user())->id @endphp

    @if (isset($posts[0]->messages))
        @php session(['lastPost' =>  $posts[0]->messages->last()->id]) @endphp
        @forelse ($posts[0]->messages as $post)
            @php $lastPost = $post->id @endphp
            @if (!is_null($post->content))
                @if ($post->sender_id != $auth)
                    {{-- message recieved --}}
                    <div class="my-4">
                        <div class="flex">
                            <div class="flex flex-col gap-3 rounded-xl p-4 bg-gray-100 w-[80%] group">
                                <div class="flex justify-between">
                                    <div>
                                        {{ $post->content }}
                                    </div>
                                    <form action="/account/message/delete" method="post"
                                        class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl cursor-pointer">@csrf<input name="id" type="hidden" value="{{ $post->id }}" /><button
                                            class='bx bx-message-rounded-x'></button></form>
                                </div>

                                <div class="text-end">{{ $post->getHour() }}</div>
                            </div>
                            <div class="w-[20%]"></div>
                        </div>
                    </div>
                @else
                    {{-- message send --}}
                    <div class="my-4">
                        <div class="flex">
                            <div class="w-[20%]"></div>
                            <div
                                class="flex flex-col gap-3 rounded-xl text-white text-end p-4 bg-violet-500 w-[80%] group">
                                <div class="flex justify-between">
                                    <div>
                                        {{ $post->content }}
                                    </div>
                                    <form action="/account/message/delete" method="post"
                                        class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl cursor-pointer">@csrf<input name="id" type="hidden" value="{{ $post->id }}" /><button
                                            class='bx bx-message-rounded-x'></button></form>
                                </div>
                                <div>{{ $post->getHour() }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @empty
        @endforelse
        {{-- on doit recuperer automatiquement les messages ici et seulement les messages --}}
        <div id="message-load">
            {{-- recent messages --}}
        </div>
        @error('content')
            <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <div>
            <meta name="csrs-token" content="{{ csrf_token() }}">
            <div class="fixed bg-white p-2 shadow bottom-17 md:bottom-2 rounded-xl md:right-10 right-7 left-5 right-5 lg:right-15 md:left-30">
                <div class="flex items-center justify-between w-full">
                    <div class="flex justify-between rounded-xl w-[80%] md:w-[87%] lg:w-[90%] bg-gray-300 me-3 lg:me-4">
                        <textarea name="content" id="send-content" placeholder="type a message..."
                            class="w-full focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500 rounded-xl p-2 h-10 lg:h-13"></textarea>
                    </div>
                    <div onclick="sendMessage({{ $posts[0]->messages[0]->chat_id }},{{ $posts[0]->messages[0]->recipient_id }})"
                        class="cursor-pointer bg-violet-500 rounded-full w-10 h-10 lg:w-13 lg:h-13 flex justify-center items-center"
                        title="send">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.92492 4.96667L13.4416 2.45834C16.8166 1.33334 18.6499 3.17501 17.5333 6.55001L15.0249 14.0667C13.3416 19.125 10.5749 19.125 8.89159 14.0667L8.14992 11.8333L5.91659 11.0917C0.866586 9.41667 0.866586 6.65834 5.92492 4.96667Z"
                                fill="#FEFEFE" />
                            <path d="M10.1001 9.69167L13.2751 6.50833L10.1001 9.69167Z" fill="#FEFEFE" />
                            <path
                                d="M10.1 10.3167C9.94163 10.3167 9.7833 10.2583 9.6583 10.1333C9.41663 9.89166 9.41663 9.49166 9.6583 9.24999L12.825 6.06666C13.0666 5.82499 13.4666 5.82499 13.7083 6.06666C13.95 6.30832 13.95 6.70832 13.7083 6.94999L10.5416 10.1333C10.4166 10.25 10.2583 10.3167 10.1 10.3167Z"
                                fill="#7A5AF8" />
                        </svg>
                    </div>
                </div>
            </div>
        </f>
    @else
        <div
            class="border-t my-1 py-3 border-gray-200 mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
            <div>
                <svg width="140" height="88" viewBox="0 0 140 88" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_10131_1391)">
                        <g filter="url(#filter0_dddd_10131_1391)">
                            <path
                                d="M3 33.9585L42.5457 30.6597L50.4548 30L51.0882 37.5927L56.1551 98.3349L8.70027 102.293L3 33.9585Z"
                                fill="#F4F3FF" />
                            <line x1="10.7982" y1="77.8912" x2="44.412" y2="75.0872" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="9.63416" y1="63.9397" x2="44.9282" y2="60.9956" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="10.0975" y1="70.9253" x2="45.3916" y2="67.9812" stroke="#BDB4FE"
                                stroke-width="2" />
                            <rect x="7.63916" y="40.0227" width="36" height="18"
                                transform="rotate(-4.76839 7.63916 40.0227)" fill="#D9D6FE" />
                        </g>
                        <g filter="url(#filter1_dddd_10131_1391)">
                            <path
                                d="M136.826 32.7244L97.5403 27.1206L89.6832 25.9999L88.6073 33.5427L80 93.885L127.142 100.609L136.826 32.7244Z"
                                fill="#F4F3FF" />
                            <line y1="-1" x2="33.7306" y2="-1"
                                transform="matrix(-0.989979 -0.141212 -0.141212 0.989979 127.799 46.8293)"
                                stroke="#BDB4FE" stroke-width="2" />
                            <line y1="-1" x2="33.7306" y2="-1"
                                transform="matrix(-0.989979 -0.141212 -0.141212 0.989979 126.723 54.3721)"
                                stroke="#BDB4FE" stroke-width="2" />
                            <line y1="-1" x2="33.7306" y2="-1"
                                transform="matrix(-0.989979 -0.141212 -0.141212 0.989979 125.647 61.9148)"
                                stroke="#BDB4FE" stroke-width="2" />
                            <line y1="-1" x2="33.7306" y2="-1"
                                transform="matrix(-0.989979 -0.141212 -0.141212 0.989979 124.571 69.4578)"
                                stroke="#BDB4FE" stroke-width="2" />
                            <line y1="-1" x2="33.7306" y2="-1"
                                transform="matrix(-0.989979 -0.141212 -0.141212 0.989979 123.496 77.0005)"
                                stroke="#BDB4FE" stroke-width="2" />
                            <line y1="-1" x2="33.7306" y2="-1"
                                transform="matrix(-0.989979 -0.141212 -0.141212 0.989979 122.419 84.5432)"
                                stroke="#BDB4FE" stroke-width="2" />
                        </g>
                        <g filter="url(#filter2_dddd_10131_1391)">
                            <path d="M42 8H88.6667L93.3333 12.4444L98 16.8889V88H42V8Z" fill="#F4F3FF" />
                            <line x1="50.166" y1="24.7778" x2="89.8327" y2="24.7778" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="50.166" y1="33.6667" x2="89.8327" y2="33.6667" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="50.166" y1="42.5557" x2="89.8327" y2="42.5557" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="50.166" y1="51.4443" x2="89.8327" y2="51.4443" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="50.166" y1="60.3333" x2="89.8327" y2="60.3333" stroke="#BDB4FE"
                                stroke-width="2" />
                            <line x1="50.166" y1="69.2222" x2="89.8327" y2="69.2222" stroke="#BDB4FE"
                                stroke-width="2" />
                            <path d="M88.666 16.8889V8L97.9993 16.8889H88.666Z" fill="#BDB4FE" />
                        </g>
                    </g>
                    <defs>
                        <filter id="filter0_dddd_10131_1391" x="-13" y="27" width="85.1553" height="130.293"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="2" />
                            <feGaussianBlur stdDeviation="2.5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.1 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix"
                                result="effect1_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="10" />
                            <feGaussianBlur stdDeviation="5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.09 0" />
                            <feBlend mode="normal" in2="effect1_dropShadow_10131_1391"
                                result="effect2_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="22" />
                            <feGaussianBlur stdDeviation="6.5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.05 0" />
                            <feBlend mode="normal" in2="effect2_dropShadow_10131_1391"
                                result="effect3_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="39" />
                            <feGaussianBlur stdDeviation="8" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.01 0" />
                            <feBlend mode="normal" in2="effect3_dropShadow_10131_1391"
                                result="effect4_dropShadow_10131_1391" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect4_dropShadow_10131_1391"
                                result="shape" />
                        </filter>
                        <filter id="filter1_dddd_10131_1391" x="64" y="23" width="88.8257" height="132.609"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="2" />
                            <feGaussianBlur stdDeviation="2.5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.1 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix"
                                result="effect1_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="10" />
                            <feGaussianBlur stdDeviation="5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.09 0" />
                            <feBlend mode="normal" in2="effect1_dropShadow_10131_1391"
                                result="effect2_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="22" />
                            <feGaussianBlur stdDeviation="6.5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.05 0" />
                            <feBlend mode="normal" in2="effect2_dropShadow_10131_1391"
                                result="effect3_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="39" />
                            <feGaussianBlur stdDeviation="8" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.741176 0 0 0 0 0.705882 0 0 0 0 0.996078 0 0 0 0.01 0" />
                            <feBlend mode="normal" in2="effect3_dropShadow_10131_1391"
                                result="effect4_dropShadow_10131_1391" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect4_dropShadow_10131_1391"
                                result="shape" />
                        </filter>
                        <filter id="filter2_dddd_10131_1391" x="26" y="5" width="88" height="140"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="3" />
                            <feGaussianBlur stdDeviation="3" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.592157 0 0 0 0 0.258824 0 0 0 0 1 0 0 0 0.1 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix"
                                result="effect1_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="10" />
                            <feGaussianBlur stdDeviation="5" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.592157 0 0 0 0 0.258824 0 0 0 0 1 0 0 0 0.09 0" />
                            <feBlend mode="normal" in2="effect1_dropShadow_10131_1391"
                                result="effect2_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="23" />
                            <feGaussianBlur stdDeviation="7" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.592157 0 0 0 0 0.258824 0 0 0 0 1 0 0 0 0.05 0" />
                            <feBlend mode="normal" in2="effect2_dropShadow_10131_1391"
                                result="effect3_dropShadow_10131_1391" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="41" />
                            <feGaussianBlur stdDeviation="8" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.592157 0 0 0 0 0.258824 0 0 0 0 1 0 0 0 0.01 0" />
                            <feBlend mode="normal" in2="effect3_dropShadow_10131_1391"
                                result="effect4_dropShadow_10131_1391" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect4_dropShadow_10131_1391"
                                result="shape" />
                        </filter>
                        <clipPath id="clip0_10131_1391">
                            <rect width="140" height="88" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div>
                <h3 class="font-bold">No Chats</h3>
                <p>
                    it looks like you don't have any Chats<br>
                    This space will be updated as new chat are added!
                </p>
            </div>
        </div>
    @endif

</div>