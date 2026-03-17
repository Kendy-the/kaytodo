<form class="bg-white flex flex-col gap-3 rounded-xl px-5 py-7 mt-5"
    action="{{ $choice == 'create' ? '/category/new' : '/category/edit' }}" method="post">
    @csrf
    @if($choice != 'create')
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif

    <input type="hidden" name="formErr" value="category"/>

    <div class="flex flex-col">

        @php $hasError = 'none'; $obj = old("formErr") @endphp
        @if ($obj == 'category')
            @error('name') @php $hasError = 'error'@endphp @enderror
        @endif

        @if($choice != 'create')
            <x-input :label="'none'" :value="$post->name" :type="'text'" :name="'name'" :$hasError readonly>
                <x-slot:placeholder>Category name</x-slot:placeholder>
                @error('name')
                    <x-slot:input-error>
                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                    </x-slot:input-error>
                @enderror
            </x-input><br>
        @else
            <x-input :label="'none'" :value="$post->name" :type="'text'" :name="'name'" :$hasError>
                <x-slot:placeholder>Category name</x-slot:placeholder>
                @error('name')
                    <x-slot:input-error>
                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                    </x-slot:input-error>
                @enderror
            </x-input><br>
        @endif

        @php $hasError = 'none' @endphp
        @if ($obj == 'category')
            @error('description') @php $hasError = 'error' @endphp @enderror
        @endif

        <x-input :label="'none'" :value="$post->description" :type="'text'" :name="'description'" :$hasError>
            <x-slot:placeholder>Category Description</x-slot:placeholder>
            @error('description')
                <x-slot:input-error>
                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                </x-slot:input-error>
            @enderror
        </x-input>
    </div>
    <div class="flex md:justify-between flex-wrap p-1 border-[#DFEAF2] border-t pt-5">
        <div class="flex w-full md:justify-between md:w-[40%] md:gap-5 md:flex-nowrap flex-wrap mt-3 md:mt-0">

            <input type="hidden" name="itemId" value="{{ $itemId }}">

            <div style="background-color: white;" class="w-full" data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                <x-button.primary :extend="[]" :action="'none'" :type="'reset'" :name="'reset'">
                    Cancel
                </x-button.primary>
            </div>

            <div class="w-full">
                <x-button.primary :extend="[]" :action="'none'" :type="'submit'" :name="'submit'">

                    @if ($choice == 'create')
                        Create Category
                    @else
                        Edit Category
                    @endif
                </x-button.primary>
            </div>
        </div>
    </div>
</form>
