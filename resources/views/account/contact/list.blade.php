<div class="grid gap-2 md:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @forelse ($posts as $post)
        @php $trouver = false @endphp
        @forelse ($chats as $chat)
            @if ($post->id == $chat->invite->id)
                @php $trouver = true @endphp
            @endif
        @empty
            <div
                class="flex justify-between items-center border rounded border-gray-200 hover:bg-gray-100 cursor-pointer group">
                <form action="/account/chat/new" method="post">
                    @csrf
                    <input type="hidden" name="invite_id" value="{{ $post->id }}" />
                    <button class="cursor-pointer flex items-center gap-2 p-1" name="create_chat">
                        <div>
                            @if (is_null($post->image))
                                <div
                                    class="bg-violet-100 font-semibold rounded-full w-13 h-13 flex justify-center items-center">
                                    {{ isset($post) ? Str::upper(Str::substr($post->first_name, 0, 1)) . ' ' . Str::upper(Str::substr($post->last_name, 0, 1)) : 'JD' }}
                                </div>
                            @else
                                <img class="w-12 h-12 border border-gray-300 rounded-md object-cover"
                                src="{{ $post->imageUrl() }}" alt="">
                            @endif
                        </div>
                        <div class="flex gap-2">
                            <h2 class="inline-block font-bold text-lg mb-1">
                                {{ $post->first_name . ' ' . $post->last_name }}
                            </h2>
                        </div>
                    </button>
                </form>
                <form action="/account/contact/delete" method="post"
                    class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl">@csrf<input
                        type="hidden" name="id" value="{{ $post->id }}" /><button name="delete_contact"
                        title="delete" class='bx bx-user-x'></button>
                </form>
            </div>
            @php break; @endphp
        @endforelse

        @if (!$trouver)
            <div
                class="flex justify-between items-center border rounded border-gray-200 hover:bg-gray-100 cursor-pointer group">
                <form action="/account/chat/new" method="post">
                    @csrf
                    <input type="hidden" name="invite_id" value="{{ $post->id }}" />
                    <button class="cursor-pointer flex items-center gap-2 p-1" name="create_chat">
                        <div>
                            @if (is_null($post->image))
                                <div
                                    class="bg-violet-100 font-semibold rounded-full w-13 h-13 flex justify-center items-center">
                                    {{ isset($post) ? Str::upper(Str::substr($post->first_name, 0, 1)) . ' ' . Str::upper(Str::substr($post->last_name, 0, 1)) : 'JD' }}
                                </div>
                            @else
                                <img class="w-12 h-12 border border-gray-300 rounded-md object-cover"
                                src="{{ $post->imageUrl() }}" alt="">
                            @endif
                        </div>
                        <div class="flex gap-2">
                            <h2 class="inline-block font-bold text-lg mb-1">
                                {{ $post->first_name . ' ' . $post->last_name }}
                            </h2>
                        </div>
                    </button>
                </form>
                <form action="/account/contact/delete" method="post"
                    class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl">@csrf<input
                        type="hidden" name="id" value="{{ $post->id }}" /><button name="delete_contact"
                        title="delete" class='bx bx-user-x'></button>
                </form>
            </div>
        @endif
    @empty
        <div class="border-t p-2 border-gray-200 text-center">
            Add contact to chat, click on the plus button
            {{-- New contact --}}
            @include('shared.account.contact.form', [
                'parentId' => $parentId,
            ])
        </div>
    @endforelse

    <div class="col-span-3 border-t p-2 border-gray-200 text-center">
        Add contact to chat, click on the plus button
        {{-- New contact --}}
        @include('shared.account.contact.form', [
            'parentId' => $parentId,
        ])
    </div>

    @error('invite_id')
        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>
