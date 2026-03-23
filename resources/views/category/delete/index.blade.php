<form action="/category/delete" method="post" class="bg-white flex flex-col gap-3 rounded-xl p-5 pb-3 mt-5">
    @csrf
    <input type="hidden" name="id" value="{{ $post->id }}"/>
    <div class="px-10 py-5 h-min flex flex-col gap-5">
        <div class="mt-5 text-center">
            <h1 class="my-2 text-2xl font-bold">delete Category</h1>
            <div>Are you sure you want to delete your <b><i>{{ $post->name }}</i></b> Category and all his tasks ?
            </div>
        </div>
        <div>
            <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'submit'" :name="'submit'" class="delete-btn">
                Delete Category
            </x-button.primary>
        </div>
        <div data-accordion-target="#accordion-collapse-body-{{ $itemId }}">
            <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'reset'" :name="'reset'" class="delete-btn">
                No, Let me check
            </x-button.primary>
        </div>
    </div>
</form>
