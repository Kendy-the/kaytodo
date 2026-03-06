<form wire:submit="storeContact">
    @csrf

    @php $hasError = 'none' @endphp
    @error('email') @php $hasError = 'error' @endphp @enderror

    <div class="w-full gap-2">
        <x-input wire:model='email' :label="'Email'" :value="''" :type="'email'" :name="'email'" :$hasError>
            <x-slot:placeholder>my.contact@example.com</x-slot:placeholder>
            @error('email')
                <x-slot:input-error>
                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                </x-slot:input-error>
            @enderror
        </x-input>
        <div>
            <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">
               Add Contact
            </x-button.primary>
        </div>
    </div>
</form>