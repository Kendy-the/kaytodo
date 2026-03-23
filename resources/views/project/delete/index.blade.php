<form action="/project/delete" method="post" class="bg-white flex flex-col gap-3 rounded-xl p-5 pb-3 mt-5">
    @csrf

    <input type="hidden" name="id" value="{{$object->id}}"/>

    <div class="px-10 py-5 h-min flex flex-col gap-5">
        <div class="mt-5 text-center">
            <h1 class="my-2 text-2xl font-bold">delete Project</h1>
            <div>Are you sure you want to delete <b><i>{{$object->name}}</i></b> Project?
            </div>
        </div>
        <div>
            <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'submit'" :name="'submit'">
                Delete Project
            </x-button.primary>
        </div>
        <div data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
            <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'reset'" :name="'reset'">
                No, Let me check
            </x-button.primary>
        </div>
    </div>
</form>
