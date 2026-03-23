<x-layout.app-layout>

    @section('title', 'Profile - update')

    <div class="h-dvh overflow-y-auto flex justify-center">
        <form action="/account/profile/pass/edit" method="post" class="w-full">
            @csrf
            <div class="bg-white rounded-xl p-10 pb-3 mt-5">
                <div>
                    <h2 class="font-bold">Change Password Form</h2>
                    <p>Fill information to change your password</p>
                </div>

                <div class="mt-3 flex flex-col gap-4`">
                    <div>
                        @php $hasError = 'none' @endphp
                            @error('current_password') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Current Password'" :value="''" :type="'password'" :name="'current_password'" :$hasError>
                                <x-slot:placeholder>********</x-slot:placeholder>
                                @error('current_password')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>

                    <div>
                        @php $hasError = 'none' @endphp
                            @error('password') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'New Password'" :value="''" :type="'password'" :name="'password'" :$hasError>
                                <x-slot:placeholder>********</x-slot:placeholder>
                                @error('password')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>

                    <div class="mt-3">
                        @php $hasError = 'none' @endphp
                            @error('password_confirmation') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Password Confirmation'" :value="''" :type="'password'" :name="'password_confirmation'" :$hasError>
                                <x-slot:placeholder>********</x-slot:placeholder>
                                @error('password_confirmation')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>
                </div>
                <div class="my-5">
                    <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'submit'" :name="'submit'">
                        Submit
                    </x-button.primary>
                </div>
            </div>
        </form>
    </div>
</x-layout.app-layout>
