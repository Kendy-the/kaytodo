<div class="h-dvh overflow-y-scroll pb-50">
    {{-- new contact --}}
    @include('shared.account.contact.form',[
        "parentId" => $parentId
    ])

    @forelse ($posts as $post)
        <div class="flex justify-around gap-2 border-t my-1 py-3 px-2 md:px-4 border-gray-200">
            <div>
                @if (!isset($post->image) || is_null($post->image))
                    <div class="bg-violet-100 font-semibold rounded-full w-13 h-13 flex justify-center items-center">
                        {{ isset($post) ? Str::upper(Str::substr($post->first_name, 0, 1)) . ' ' . Str::upper(Str::substr($post->last_name, 0, 1)) : 'JD' }}
                    </div>
                @else
                    <img class="w-12 h-12 border border-gray-300 rounded-full object-cover" src="{{ $post->imageUrl() }}"
                        alt="">
                @endif
            </div>
            <div class="{{ $position }} group">
                <div class="flex justify-around">
                    <h2 class="inline-block font-bold text-lg mb-1">{{ $post->first_name . ' ' . $post->last_name }}</h2>
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
</div>
