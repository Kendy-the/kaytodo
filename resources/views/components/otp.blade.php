<div class="mb-5 md:mb-20 lg:mb-0">
    <div class="shadow-3xl rounded-2xl bg-white w-auto md:w-[500px] md:h-auto">

        <form action="{{ $action }}" method="post">
            @csrf
            <div class="px-10 py-5 h-min flex flex-col gap-5">
                <div class="mt-5 text-center">
                    <h1 class="my-2 text-2xl font-bold">{{ $title }}</h1>
                    <div>{{ $content }}</div>
                </div>

                @if($choice === 'password')

                    <div class="mt-3 flex flex-col">
                        <div>

                            @php $hasError = 'none' @endphp
                            @error('password') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'New Password'" :type="'password'" :name="'password'" :$hasError>
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

                            <x-input :label="'Password Confirmation'" :type="'password'" :name="'password_confirmation'" :$hasError>
                                <x-slot:placeholder>********</x-slot:placeholder>
                                @error('password_confirmation')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                        </div>
                        
                    </div>
                @elseif($choice === 'email')
                    <div class="mt-3 flex">
                        <div class="w-full flex flex-col">
                            @php $hasError = 'none' @endphp
                                @error('email') @php $hasError = 'error' @endphp @enderror

                                <x-input :label="'Email'" :type="'email'" :name="'email'" :$hasError>
                                    <x-slot:placeholder>youremail@example.com</x-slot:placeholder>
                                    @error('email')
                                        <x-slot:input-error>
                                            <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                        </x-slot:input-error>
                                    @enderror
                                </x-input>
                        </div>
                    </div>
                @elseif($choice == 'none')

                @else
                    <div class="mt-3 flex md:justify-between flex-wrap md:no-wrap">
                        <div class="w-full flex justify-around gap-3">
                            <input class="pin-input border border-[#DFEAF2] text-lg text-center rounded w-14 h-14"
                                type="password" name="" id="" maxlength="1">
                            <input class="pin-input border border-[#DFEAF2] text-lg text-center rounded w-14 h-14"
                                type="password" name="" id="" maxlength="1">
                            <input class="pin-input border border-[#DFEAF2] text-lg text-center rounded w-14 h-14"
                                type="password" name="" id="" maxlength="1">
                            <input class="pin-input border border-[#DFEAF2] text-lg text-center rounded w-14 h-14"
                                type="password" name="" id="" maxlength="1">
                        </div>
                    </div>
                @endif

                @if($choice === 'password')
                    <div>
                        <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">
                            Submit
                        </x-button.primary>
                    </div>
                    
                @elseif($choice === 'email')
                    <div>
                        <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">{{ $buttonName }}</x-button.primary>
                    </div>
                @elseif($choice == 'none')
                    <div>
                        <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">Submit</x-button.primary>
                        <x-button.primary :action="$action1" :type="'reset'" :name="'reset'">No, Let me check</x-button.primary>
                    </div> 
                @else
                    <div>
                        <x-button.primary :action="'none'" :type="'submit'" :name="'submit_otp'">Submit</x-button.primary>
                    </div>

                    <div class="text-center">
                        <span>Haven't received the verification code? <a class="text-[#718EBF]" href="{{ $action }}">
                                Resend it.</a></span>
                    </div>
                @endif  
                              
            </div>
        </form>

    </div>
</div>
