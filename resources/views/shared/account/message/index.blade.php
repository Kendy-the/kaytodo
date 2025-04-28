@forelse ($posts as $post)
    <div class="border-gray-200 border-t bg-gray-50 rounded flex group">
        <div class="w-full"  onclick="loadDiscussion({{ $post->id }})" @click="disk = {{ $post->id }}; currentView = 'discussion'; mainBtn = false">
            <div class="w-full text-sm flex gap-2 justify-between my-1 px-2 py-3 cursor-pointer">
                @if ($post->invite->id != (Auth::user())->id)
                    <div>
                        @if (is_null($post->invite->image))
                            <div
                                class="bg-violet-100 font-semibold rounded-full w-13 h-13 flex justify-center items-center">
                                {{ $post->invite->getAbrName() }}
                            </div>
                        @else
                            <img class="w-12 h-12 border border-gray-300 rounded-full object-cover"
                                src="{{ $post->invite->imageUrl() }}">
                        @endif
                    </div>
                    @if (isset($post->messages[0]))
                        <div>
                            <div class="flex justify-between">
                                <h2 class="font-bold mb-1 me-1">{{ 
                                    \App\Models\User::getContactName($contacts,$post)
                                }}
                                </h2>
                                
                                {{-- message - fetch --}}
                                <span>{{ $post->messages->last()->getLast($post->id)->getHour() }}</span>
                            </div>

                            {{-- message - fetch --}}
                            <div class="flex justify-between items-center gap-7">
                                <p>{{ $post->messages->last()->getLast($post->id)->getContent() }}</p>
                                <span
                                    @class([
                                        'text-white rounded-full w-5 h-5 md:w-7 md:h-7 flex justify-center items-center',
                                        'bg-violet-500' => \App\Models\Message::notView($post->messages),
                                    ])>{{ \App\Models\Message::notView($post->messages) }}</span>
                            </div>
                        </div>
                    @endif
                @else
                    <div>
                        @if (is_null($post->user->image))
                            <div
                                class="bg-violet-100 font-semibold rounded-full w-13 h-13 flex justify-center items-center">
                                {{ $post->user->getAbrName() }}
                            </div>
                        @else
                            <img class="w-12 h-12 border border-gray-300 rounded-md object-cover"
                                src="{{ $post->user->imageUrl() }}">
                        @endif
                    </div>
                    @if (isset($post->messages[0]))
                        <div>
                            <div class="flex justify-between">
                                <h2 class="font-bold mb-1 me-1">{{ 
                                    \App\Models\User::getContactName($contacts,$post,false)
                                }}
                                </h2>
                                
                                <span>{{ $post->messages->last()->getLast($post->id)->getHour() }}</span>
                                {{-- message - fetch --}}
                            </div>

                            {{-- message - fetch --}}
                            <div class="flex justify-between items-center gap-7">
                                <p>{{ $post->messages->last()->getLast($post->id)->getContent() }}</p>
                                <span
                                    @class([
                                        'text-white rounded-full w-5 h-5 md:w-7 md:h-7 flex justify-center items-center',
                                        'bg-violet-500' => \App\Models\Message::notView($post->messages),
                                    ])>{{ \App\Models\Message::notView($post->messages) }}</span>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <form action="/account/chat/delete" method="post"
            class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl">@csrf<input
                type="hidden" name="chat_id" value="{{ $post->id }}" /><button name="delete_chat"
                title="delete" class='bx bx-message-rounded-x'></button>
        </form>
    </div>
@empty
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
@endforelse