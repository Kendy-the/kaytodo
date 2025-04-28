@php $newContactId = $parentId->getId();@endphp
    <div data-accordion="collapse"
        class="flex flex-col items-center gap-2 border-t my-1 py-3 px-2 md:px-4 border-gray-200">
        <div style="background-color:rgb(247,245,245)" id="accordion-collapse-heading-{{ $newContactId }}"
            data-accordion-target="#accordion-collapse-body-{{ $newContactId }}"
            aria-controls="accordion-collapse-body-{{ $newContactId }}">
            <i style="color:black" class='bx bxs-plus-circle hover:text-violet-700 cursor-pointer'></i>
        </div>

        <div id="accordion-collapse-body-{{ $newContactId }}"
            aria-labelledby="accordion-collapse-heading-{{ $newContactId }}" class="hidden">
            @include('account.contact.new', [
                'itemId' => $newContactId,
            ])
        </div>
    </div>