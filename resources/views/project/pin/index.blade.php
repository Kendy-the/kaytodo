<form action="/project/pin" method="post" class="bg-white flex flex-col gap-3 rounded-xl p-5 pb-3 mt-5">
    @csrf
    <input type="hidden" value="{{ $object->id }}"/>
    <div class="px-10 py-5 h-min flex flex-col gap-5">
        <div class="mt-5 text-center">
            <h1 class="my-2 text-2xl font-bold">pin Category</h1>
            <div>Are you sure you want to pin your Project ?
            </div>
        </div>
        <div data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
            <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">
                pin Project
            </x-button.primary>
        </div>
        <div data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
            <x-button.primary :action="'none'" :type="'reset'" :name="'reset'">
                No, Let me check
            </x-button.primary>
        </div>
    </div>
</form>