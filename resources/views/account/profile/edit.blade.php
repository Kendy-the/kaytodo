<x-layout.app-layout>

    @section('title', 'Profile - edit')
    
    <div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">
        <form action="/account/profile/edit" method="post">
            @csrf
            <div class="bg-white rounded-xl p-10 pb-3 mt-5">
                <div>
                    <h2 class="font-bold">My Personal data</h2>
                    <p>Details about my personal data</p>
                </div>
                <div class="flex items-center justify-center mt-2">
                    <div class="flex flex-col items-center justify-center">
                        <img class="cursor-pointer relative left-17 top-7"
                        src="{{"/assets/img/refresh-icone.svg" }}" alt="">
                        <img class="w-40 h-40" src="{{ isset($user) ? $user->image : "/assets/img/profile.svg" }}" alt="">
                        <div class="flex gap-1 justify-center items-center mt-2 text-xl">
                            <div class="font-bold">
                                Upload Photo
                            </div>
                        </div>
                        <div class="text-center">format should be in .jpeg, .png atleast 800x800px and less than 5MB</div>
                    </div>
                </div>

                <div class="mt-3 flex flex-col gap-4 pb-3">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="w-full md:w-auto">
                        @php $hasError = 'none' @endphp
                            @error('last_name') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Last Name'" :value="$user->last_name" :type="'text'" :name="'last_name'" :$hasError readonly>
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

                            <x-input :label="'Firs Name'" :value="$user->first_name" :type="'text'" :name="'first_name'" :$hasError readonly>
                                <x-slot:placeholder>jhon</x-slot:placeholder>
                                @error('first_name')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>

                    <div class="w-full md:w-auto">
                        @php $hasError = 'none' @endphp
                            @error('email') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Email'" :value="$user->email" :type="'email'" :name="'email'" :$hasError readonly>
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

                            <x-input :label="'Phone Number'" :value="$user->phone_number" :type="'text'" :name="'phone_number'" :$hasError>
                                <x-slot:placeholder>00123432344</x-slot:placeholder>
                                @error('phone_number')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>
                    <div class="w-full md:w-auto">
                        @php $hasError = 'none' @endphp
                            @error('profession') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Profession'" :value="$user->profession" :type="'text'" :name="'profession'" :$hasError>
                                <x-slot:placeholder>Junoior dev</x-slot:placeholder>
                                @error('profession')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-10 pb-3 mt-5">
                <div>
                    <h2 class="font-bold">Adress</h2>
                    <p>Your current adress</p>
                </div>

                <div class="mt-3 flex flex-col gap-4 pb-3">
                    <div class="w-full md:w-auto">
                        @php $hasError = 'none' @endphp
                            @error('country') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'Country'" :value="$user->country" :type="'text'" :name="'country'" :$hasError>
                                <x-slot:placeholder>USA</x-slot:placeholder>
                                @error('country')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>

                    <div class="w-full md:w-auto">
                        @php $hasError = 'none' @endphp
                            @error('state') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'State'" :value="$user->state" :type="'text'" :name="'state'" :$hasError>
                                <x-slot:placeholder>My state</x-slot:placeholder>
                                @error('state')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>

                    <div class="w-full md:w-auto">
                        @php $hasError = 'none' @endphp
                            @error('city') @php $hasError = 'error' @endphp @enderror

                            <x-input :label="'City'" :value="$user->city" :type="'text'" :name="'city'" :$hasError>
                                <x-slot:placeholder>My city</x-slot:placeholder>
                                @error('city')
                                    <x-slot:input-error>
                                        <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                    </x-slot:input-error>
                                @enderror
                            </x-input>
                    </div>

                    <div class="w-full md:w-auto">
                        <label for="other" class="text-[#232323] font-normal">
                            Other
                        </label><br>
                        <textarea
                            class="border border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 mt-1 p-3 w-full rounded-[15px] text-[#718EBF]"
                            type="text" name="other" placeholder="Other, I want to save" id="">{{ $user->other }}</textarea>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <x-button.primary :action="'none'" :type="'submit'" :name="'submit'">
                    Update My Account
                </x-button.primary>
            </div>
        </form>
    </div>
</x-layout.app-layout>