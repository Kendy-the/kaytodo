{{-- Header --}}
{{-- <div class="flex items-center justify-between p-2 bg-gray-100 border-b">
    <h2 class="text-lg font-bold">Messages</h2>
    <button class="text-2xl font-bold">+</button>
</div> --}}

{{-- Liste des conversations --}}
{{-- <div class="flex-1 overflow-y-auto">
    <div class="flex items-center justify-between px-4 py-3 hover:bg-gray-100">
        <div class="flex items-center space-x-3">
            <div
                class="w-10 h-10 rounded-full bg-purple-200 flex items-center justify-center font-bold text-white">
                U</div>
            <div>
                <p class="font-bold text-sm">user</p>
                <p class="text-xs text-gray-500">My man...</p>
            </div>
        </div>
        <div class="flex flex-col items-end text-xs text-gray-400">
            <span>07/04/25</span>
            <button class="text-red-500 text-lg">✖</button>
        </div>
    </div>

    <div class="flex items-center justify-between px-4 py-3 hover:bg-gray-100">
        <div class="flex items-center space-x-3">
            <img src="avatar.jpg" alt="Witchy" class="w-10 h-10 rounded-full object-cover" />
            <div>
                <p class="font-bold text-sm">Witchy</p>
                <p class="text-xs text-gray-500">my man...</p>
            </div>
        </div>
        <div class="flex flex-col items-end text-xs text-gray-400">
            <span>08/04/25</span>
            <button class="text-red-500 text-lg">✖</button>
        </div>
    </div>

    <div class="flex items-center justify-between px-4 py-3 hover:bg-gray-100">
        <div class="flex items-center space-x-3">
            <img src="avatar.jpg" alt="Witchy" class="w-10 h-10 rounded-full object-cover" />
            <div>
                <p class="font-bold text-sm">Witchy</p>
                <p class="text-xs text-gray-500">my man...</p>
            </div>
        </div>
        <div class="flex flex-col items-end text-xs text-gray-400">
            <span>08/04/25</span>
            <button class="text-red-500 text-lg">✖</button>
        </div>
    </div>



    <div class="flex items-center justify-between px-4 py-3 hover:bg-gray-100">
        <div class="flex items-center space-x-3">
            <div
                class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center font-bold text-white">
                S J</div>
            <div>
                <p class="font-bold text-sm truncate w-40">jeanbaptisteedshy@gm...</p>
                <p class="text-xs text-gray-500">yeh...</p>
            </div>
        </div>
        <div class="flex flex-col items-end text-xs text-gray-400">
            <span>-</span>
            <button class="text-red-500 text-lg">✖</button>
        </div>
    </div>
</div> --}}

@forelse ($posts as $post)
    <div class="flex justify-between text-sm md:text-lg md:group gap-2 border-b my-1 py-1 px-2 md:px-4 border-gray-200">
        <div>
            @if (!isset($post->image) || is_null($post->image))
                <div class="bg-violet-100 font-semibold rounded-full w-11 h-11 flex justify-center items-center">
                    {{ isset($post) ? Str::upper(Str::substr($post->first_name, 0, 1)) . ' ' . Str::upper(Str::substr($post->last_name, 0, 1)) : 'JD' }}
                </div>
            @else
                <img class="w-11 h-11 border border-gray-300 rounded-full object-cover" src="{{ $post->imageUrl() }}"
                    alt="">
            @endif
        </div>

        <div class="hidden md:flex items-center gap-7 text-gray-900">
            <p>{{ $post->email }}</p>
        </div>

        <div class="hidden md:flex items-center">
            <h2 class="inline-block font-bold mb-1">{{ $post->first_name . ' ' . $post->last_name }}</h2>
            
        </div>

        <form action="/account/contact/delete" method="post"
                class="hidden md:flex text-red-700 font-bold text-2xl">@csrf<input
                    type="hidden" name="id" value="{{ $post->id }}" /><button
                    class='cursor-pointer bx bx-user-x'></button></form>

        <div class="md:hidden group">
            <div class="flex justify-between">
                <h2 class="inline-block font-bold mb-1">{{ $post->first_name . ' ' . $post->last_name }}</h2>
                <form action="/account/contact/delete" method="post"
                    class="text-red-700 lg:text-gray-100 lg:group-hover:text-red-700 font-bold text-2xl">@csrf<input
                        type="hidden" name="id" value="{{ $post->id }}" /><button
                        class='cursor-pointer bx bx-user-x'></button></form>
            </div>
            <div class="flex items-center gap-7">
                <p>{{ $post->email }}</p>
            </div>
        </div>
    </div>
@empty
    <div
        class="border-t my-1 p-3 border-gray-200 mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
            <h3 class="font-bold">No Contacts</h3>
            <p>
                it looks like you don't have any contact at the moment.<br>
                This space will be updated as new contact are added!
            </p>
        </div>
@endforelse