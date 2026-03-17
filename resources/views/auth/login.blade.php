<x-layout.auth-layout>

    @section('title', 'Login')

    <div class="flex justify-center items-center my-20">
        <div class="shadow rounded-2xl bg-white w-[500px] h-[500px]">
            <form action="" method="post">
                @csrf
                <div class="px-10 py-5 flex flex-col gap-5">
                    <div class="mt-5 text-center">
                        <h1 class="mb-1 text-3xl font-bold">Sign In</h1>
                        <div>Sign to my account</div>
                    </div>

                    @php $error = 'none' @endphp
                    @error('email')
                        @php $error = 'true' @endphp
                    @enderror
                    <div class="mt-3">
                        <x-input :label="'Email'" :value="''" :type="'email'" :name="'email'"
                            :has-error="$error" required>
                            <x-slot:placeholder>youremail@example.com</x-slot:placeholder>
                            @error('email')
                                <x-slot:input-error>
                                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                </x-slot:input-error>
                            @enderror
                        </x-input>
                    </div>

                    <div>
                        <x-input :label="'Password'" :value="''" :type="'password'" :name="'password'"
                            :has-error="'none'" required>
                            <x-slot:placeholder>********</x-slot:placeholder>
                        </x-input>

                        <div class="flex justify-between">
                            <div class="text-[#718EBF] mt-2">
                                <input class="cursor-pointer" type="checkbox" name="remember" id="remember">
                                <label for="Remember">Remember Me</label>
                            </div>

                            <a href="/auth/pass" class="mt-2 text-[#718EBF] cursor-pointer">Forgot Password</a>
                        </div>
                    </div>

                    <div>
                        <x-button.primary :extend="[]" :action="'none'" :type="'submit'" :name="'submit'">
                            Sign In
                        </x-button.primary>
                    </div>
                    <div class="text-center">
                        <span>Don't have an account ? <a class="text-[#718EBF]" href="/auth/register">Sign Up
                                Here</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout.auth-layout>
