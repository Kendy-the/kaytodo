@php $auth = (Auth::user())->id; @endphp
@forelse ($recents as $recent) 
    @if($recent->id != session('lastPost'))
        @if ($recent->sender_id != $auth)
            {{-- message recieved --}}
            <div class="my-4">
                <div class="flex">
                    <div class="flex flex-col gap-3 rounded-xl p-4 bg-gray-100 w-[80%] group">
                        <div class="flex justify-between">
                            <div>
                                {{ $recent->content }}
                            </div>
                            <div id="message-{{$recent->id}}"
                                class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl cursor-pointer"><button onclick="deleteMessage({{ $recent->id }})"
                                    class='bx bx-message-rounded-x'></button></div>
                        </div>

                        <div class="text-end">{{ $recent->getHour() }}</div>
                    </div>
                    <div class="w-[20%]"></div>
                </div>
            </div>
        @else
            {{-- message send --}}
            <div class="my-4">
                <div class="flex">
                    <div class="w-[20%]"></div>
                    <div id="message-{{$recent->id}}"
                        class="flex flex-col gap-3 rounded-xl text-white text-end p-4 bg-violet-500 w-[80%] group">
                        <div class="flex justify-between">
                            <div>
                                {{ $recent->content }}
                            </div>
                            <div
                                class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl cursor-pointer"><button onclick="deleteMessage({{ $recent->id }})" 
                                    class='bx bx-message-rounded-x'></button></div>
                        </div>
                        <div>{{ $recent->getHour() }}</div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@empty 
@endforelse