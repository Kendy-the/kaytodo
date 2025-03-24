<form class="bg-white flex flex-col gap-3 rounded-xl px-5 py-7 mt-5"
    action="{{ $choice == 'create' ? '/project/new' : '/project/edit' }}" method="post">
    @csrf
    <div class="flex flex-col">
        <x-input :label="'none'" :value="$post->name" :type="'text'" :name="'name'" :has-error="'none'">
            <x-slot:placeholder>Project name</x-slot:placeholder>
        </x-input><br>

        <x-input :label="'none'" :value="$post->description" :type="'text'" :name="'description'" :has-error="'none'">
            <x-slot:placeholder>Project Description</x-slot:placeholder>
        </x-input>
    </div>
    <div class="flex justify-between gap-4 my-2 p-2 flex-wrap lg:flex-nowrap">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="my-2 md:my-0">
                <x-input :label="'End Date'" :value="$post->end_at" :type="'date'" :name="'end_at'" :has-error="'none'">
                    <x-slot:placeholder>End date</x-slot:placeholder>
                </x-input>
            </div>
        </div>
        <div class="flex flex-col w-full lg:w-auto gap-1">
            <label for="participant">participants</label>
            <select multiple
                class="md:h-20 overflow-y-auto mb-5 md:mb-0 bg-violet-50 rounded p-2 text-[#718EBF] border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 border lg:w-80 w-full"
                name="participant[]" id="participant">
                <option value="rood@gmail.com" selected>Rood</option>
                <option value="school">School</option>
                <option value="game">Game</option>
                <option value="church">Church</option>
                <option value="school">School</option>
                <option value="game">Game</option>
            </select>
        </div>
    </div>

    <div class="flex md:justify-between flex-wrap p-1 border-[#DFEAF2] border-t pt-5">
        <select
            class="mb-5 md:mb-0 bg-violet-50 rounded-xl p-2 text-[#718EBF] border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 border w-40"
            name="category" id="category">
            <option value="church">Church</option>
            <option value="school" selected>School</option>
            <option value="game">Game</option>
        </select>
        <div class="flex w-full md:justify-between md:w-[40%] md:gap-5 md:flex-nowrap flex-wrap mt-3 md:mt-0">

            <div style="background-color: white;" 
            class="w-full" data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                <x-button.primary :action="'none'" :type="'reset'" :name="'reset'">
                    Cancel
                </x-button.primary>

            </div>
            <div class="w-full" data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
                <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">

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
