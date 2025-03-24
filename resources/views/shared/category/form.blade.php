<form class="bg-white flex flex-col gap-3 rounded-xl px-5 py-7 mt-5"
    action="{{ $choice == 'create' ? '/category/new' : '/category/edit' }}" method="post">
    @csrf
    <div class="flex flex-col">
        <x-input :label="'none'" :value="$post->name" :type="'text'" :name="'name'" :has-error="'none'">
            <x-slot:placeholder>Category name</x-slot:placeholder>
        </x-input><br>

        <x-input :label="'none'" :value="$post->description" :type="'text'" :name="'description'" :has-error="'none'">
            <x-slot:placeholder>Category Description</x-slot:placeholder>
        </x-input>
    </div>
    <div class="flex md:justify-between flex-wrap p-1 border-[#DFEAF2] border-t pt-5">
        <div class="flex w-full md:justify-between md:w-[40%] md:gap-5 md:flex-nowrap flex-wrap mt-3 md:mt-0">

            <div style="background-color: white;" class="w-full" data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                <x-button.primary :action="'none'" :type="'reset'" :name="'reset'">
                    Cancel
                </x-button.primary>
            </div>

            <div class="w-full" data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">

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
