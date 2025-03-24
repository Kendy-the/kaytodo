<form action="/project/end" method="post" class="bg-white flex flex-col gap-3 rounded-xl p-5 pb-3 mt-5">
    @csrf
    <div class="px-10 py-5 h-min flex flex-col gap-5">
        <div class="mt-5 text-center">
            <h1 class="my-2 text-2xl font-bold">End Project</h1>
            <div>Are you sure you want to end your project ?
            </div>
        </div>

        <div data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
            <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">
                Yes, End Project
            </x-button.primary>
        </div>
        <div data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
            <x-button.primary :action="'none'" :type="'reset'" :name="'reset'">
                No, Let me check
            </x-button.primary>
        </div>
        
    </div>
</form>