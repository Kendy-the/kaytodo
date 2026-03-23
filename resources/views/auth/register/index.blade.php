<x-layout.auth-layout>

    @section('title', 'Register')

    <div class="flex justify-center items-center my-20">
        <div class="shadow rounded-2xl bg-white w-[550px] h-[800px] md:h-[680px]">
            <form action="" method="post">
                @csrf
                <div class="px-10 py-5 h-min flex flex-col gap-5">
                    <div class="mt-5 text-center">
                        <h1 class="mb-1 text-3xl font-bold">Kay Todo</h1>
                        <div>register to Kay-todo</div>
                    </div>
                    <div class="mt-3 flex md:justify-between flex-wrap md:no-wrap">
                        <div class="w-full md:w-auto">

                            @php $hasError = 'none' @endphp
                            @error('last_name') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Last Name'" :value="''" :type="'text'" :name="'last_name'" :$hasError>
                                <x-slot:placeholder>Doe</x-slot:placeholder>
                                @error('last_name')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                        </div>

                        <div class="w-full md:w-auto">

                            @php $hasError = 'none' @endphp
                            @error('first_name') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Firs Name'" :value="''" :type="'text'" :name="'first_name'" :$hasError>
                                <x-slot:placeholder>jhon</x-slot:placeholder>
                                @error('first_name')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                        </div>
                    </div>

                    <div class="mt-3 flex justify-between flex-wrap md:no-wrap">
                        <div class="w-full md:w-auto">

                            @php $hasError = 'none' @endphp
                            @error('email') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Email'" :value="''" :type="'email'" :name="'email'" :$hasError>
                                <x-slot:placeholder>youremail@example.com</x-slot:placeholder>
                                @error('email')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>

                        </div>
                        <div class="w-full md:w-auto">

                            @php $hasError = 'none' @endphp
                            @error('phone_number') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Phone Number'" :value="''" :type="'text'" :name="'phone_number'" :$hasError>
                                <x-slot:placeholder>00123432344</x-slot:placeholder>
                                @error('phone_number')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>

                        </div>
                    </div>

                    <div>
                        <div>

                            @php $hasError = 'none' @endphp
                            @error('password') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Password'" :value="''" :type="'password'" :name="'password'" :$hasError>
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
                    <div>
                        <x-button.primary :formVerifyError="'none'"  :action="'none'" :type="'submit'" :name="'submit'">
                            Sign Up
                        </x-button.primary>
                    </div>
                    <div class="text-center">
                        <span>Already have an account ? <a class="text-[#718EBF]" href="/auth/login">Sign
                                in Here</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout.auth-layout>
