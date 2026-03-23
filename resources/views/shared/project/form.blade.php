<form class="bg-white flex flex-col gap-3 rounded-xl px-5 py-7 mt-5"
    action="{{ $choice == 'create' ? '/project/new' : '/project/edit' }}" method="post">
    @csrf

    @if($choice != 'create')
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif

    <input type="hidden" name="formErr" value="project"/>

    <div class="flex flex-col">

        @php $hasError = 'none'; $obj = old("formErr") @endphp
        @if ($obj == 'project')
            @error('name') @php $hasError = 'error'@endphp @enderror
        @endif

        <x-input :label="'none'" :value="$post->name" :type="'text'" :name="'name'" :$hasError>
            <x-slot:placeholder>Project name</x-slot:placeholder>
            @error('name')
                <x-slot:input-error>
                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                </x-slot:input-error>
            @enderror
        </x-input><br>

        @php $hasError = 'none' @endphp
        @if ($obj == 'project')
            @error('description') @php $hasError = 'error'@endphp @enderror
        @endif

        <x-input :label="'none'" :value="$post->description" :type="'text'" :name="'description'" :$hasError>
            <x-slot:placeholder>Project Description</x-slot:placeholder>
            @error('description')
                <x-slot:input-error>
                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                </x-slot:input-error>
            @enderror
        </x-input>
    </div>

    <div class="flex justify-between gap-4 my-2 p-2 flex-wrap lg:flex-nowrap">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="my-2 md:my-0">

                @php $hasError = 'none' @endphp
                @if ($obj == 'project')
                    @error('end_at') @php $hasError = 'error'@endphp @enderror
                @endif

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
        <div class="flex flex-col w-full lg:w-auto gap-1">

            @php $hasError = false @endphp
            @if ($obj == 'project')
                @error('contacts') @php $hasError = true @endphp @enderror
            @endif

            <label for="participant">participants</label>
            @if($contacts->count() != 0)
                <select multiple
                    @class(['md:h-20 overflow-y-auto mb-5 md:mb-0 bg-violet-50 rounded p-2 text-[#718EBF] border-[#DFEAF2] border lg:w-80 w-full','border-red-500 focus:outline-0 focus:outline-offset-0'  => $hasError, 'focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500' => !$hasError
                    ])
                    name="contacts[]" id="contacts">

                    @foreach ($contacts as $contact)
                    <option
                        @forelse ($post->getContacts() as $postContact)
                            @selected($postContact->email == $contact->email)
                        @empty

                        @endforelse
                        value="{{ $contact->id }}">{{ $contact->email }}</option>
                    @endforeach
                </select>
            @else
                <b><i>you have no contacts</i></b>
                <x-button.primary :formVerifyError="'none'"  :action="'/account/contact'" :type="''" :name="''">
                    Add Contacts
                </x-button.primary>
            @endif
            @error('contacts')
                <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex md:justify-between flex-wrap p-1 border-[#DFEAF2] border-t pt-5">

        @php $hasError = false @endphp
        @if ($obj == 'project')
            @error('category') @php $hasError = true @endphp @enderror
        @endif

        @if($categories->count() == 1)
            <label for="category">Selectionner une categorie</label>
        @endif

        <select name="category" id="category"
            @class(['border bg-violet-50 my-4 p-2 w-full rounded-xl text-[#718EBF]','border-red-500 focus:outline-0 focus:outline-offset-0'  => $hasError, 'focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500' => !$hasError])>

            @if($categories->count() != 1)
                <option class="">Selectionner une categorie </option>
            @endif

            @foreach ($categories as $category)
                <option @selected($category->id == $post->category_id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
        @if ($obj == 'project')
            @error('category')
                <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
            @enderror
        @endif

        <div class="flex w-full md:justify-between md:w-[40%] md:gap-5 md:flex-nowrap flex-wrap mt-3 md:mt-0">

            <input type="hidden" name="itemId" value="{{ $itemId }}">

            <div style="background-color: white; color:white;"
            class="w-full">
                <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'reset'" :name="'reset'" data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                    Cancel
                </x-button.primary>

            </div>
            <div class="w-full">
                <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'submit'" :name="'submit'">

                    @if ($choice == 'create')
                        Create Project
                    @else
                        Edit Project
                    @endif
                </x-button.primary>
            </div>
        </div>
    </div>
</form>
