<form class="bg-white flex flex-col gap-3 rounded-xl px-5 py-7 mt-5"
    action="{{ $choice == 'create' ? '/task/new' : '/task/edit' }}" method="post">

    @csrf

    @if ($choice != 'create')
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif

    <div class="flex flex-col">

        @php $hasError = 'none' @endphp
        @error('name')
            @php $hasError = 'error'@endphp
        @enderror

        <x-input :label="'none'" :value="$post->name" :type="'text'" :name="'name'" :$hasError>
            <x-slot:placeholder>Task name</x-slot:placeholder>
            @error('name')
                <x-slot:input-error>
                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                </x-slot:input-error>
            @enderror
        </x-input><br>

        @php $hasError = 'none' @endphp
        @error('description')
            @php $hasError = 'error'@endphp
        @enderror

        <x-input :label="'none'" :value="$post->description" :type="'text'" :name="'description'" :$hasError>
            <x-slot:placeholder>Task Description</x-slot:placeholder>
            @error('description')
                <x-slot:input-error>
                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                </x-slot:input-error>
            @enderror
        </x-input>
    </div>

    @if ($position != 'm')
        @php $hasError = 'none' @endphp
        @error('end_at')
            @php $hasError = 'error'@endphp
        @enderror

        <div class="flex my-2 p-2 flex-wrap md:flex-nowrap">
            <div class="my-2 md:my-0">
                <x-input :label="'End Date'" :value="$post->end_at" :type="'date'" :name="'end_at'" :$hasError>
                    <x-slot:placeholder>End date</x-slot:placeholder>
                    @error('end_at')
                        <x-slot:input-error>
                            <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                        </x-slot:input-error>
                    @enderror
                </x-input>
            </div>
        </div>
    @endif

    <div class="flex md:justify-between flex-wrap p-1 border-[#DFEAF2] border-t pt-5">

        @if ($position != 'm')

            @php $hasError = false @endphp
            @error('category')
                @php $hasError = true @endphp
            @enderror

            <select name="category" id="category" @class([
                'border bg-violet-50 my-4 p-2 w-full rounded-xl text-[#718EBF]',
                'border-red-500 focus:outline-0 focus:outline-offset-0' => $hasError,
                'focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500' => !$hasError,
            ])>

                <option class="">Selectionner une categorie </option>
                @foreach ($categories as $category)
                    <option @selected($category->id == $post->category_id) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
            @error('category')
                <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        @else
            @php $hasError = 'none' @endphp
            @error('end_at')
                @php $hasError = 'error'@endphp
            @enderror

            <div class="flex my-2 p-2 flex-wrap md:flex-nowrap">
                <div class="my-2 md:my-0">
                    <x-input :label="'End Date'" :value="$post->end_at" :type="'date'" :name="'end_at'" :$hasError>
                        <x-slot:placeholder>End date</x-slot:placeholder>
                        @error('end_at')
                            <x-slot:input-error>
                                <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                            </x-slot:input-error>
                        @enderror
                    </x-input>
                </div>
            </div>

            @if ($name == 'category')
                <input type="hidden" name="category" value="{{ $object->id }}" />
            @endif

            @if ($name == 'project')

                <input type="hidden" name="project" value="{{ $object->id }}" />
                <input type="hidden" name="category" value="{{ $object->category_id }}">

                <div class="flex flex-col w-full lg:w-auto gap-1">
                    @php $hasError = false @endphp
                    @error('contacts')
                        @php $hasError = true @endphp
                    @enderror

                    <label for="contacts">participants</label>
                    <select multiple @class([
                        'md:h-20 overflow-y-auto mb-5 md:mb-0 bg-violet-50 rounded p-2 text-[#718EBF] border-[#DFEAF2] border lg:w-80 w-full',
                        'border-red-500 focus:outline-0 focus:outline-offset-0' => $hasError,
                        'focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500' => !$hasError,
                    ]) name="contacts[]" id="contacts">

                        @foreach ($contacts as $contact)
                        <option 
                            @foreach ($post->getContacts() as $postContact) 
                                @selected($contact->email == $postContact->email)
                            @endforeach
                            value="{{ $contact->id }}">{{ $contact->email }}</option>
                        @endforeach
                    </select>
                    @error('contacts')
                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        @endif

        <div class="flex w-full md:justify-between md:w-[40%] md:gap-5 md:flex-nowrap flex-wrap mt-3 md:mt-0">

            <div style="background-color: white;" class="w-full"
                data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                <x-button.primary :action="'none'" :type="'reset'" :name="'reset'">
                    Cancel
                </x-button.primary>
            </div>

            <div class="w-full">
                <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">
                    @if ($choice == 'create')
                        Create Task
                    @else
                        Edit Task
                    @endif
                </x-button.primary>
            </div>
        </div>
    </div>
</form>