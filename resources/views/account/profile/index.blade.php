<x-layout.app-layout>

    @section('title', 'My Profile')
    <div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

        {{-- Task Banner --}}
        @include('shared.banner',[
            'title' => 'My Profile', 
            'content' => "View and update my profile",
            'imgPath' => '/assets/img/notice-user.svg'
        ])

        <div class="flex flex-col">
            <div class="flex items-center justify-center mt-2">
                <div class="flex flex-col items-center justify-center">
                    @if(is_null($user->image))
                        <div class="bg-violet-100 font-semibold text-5xl rounded-full w-40 h-40 me-3 flex justify-center items-center">
                        {{ isset($user) ? Str::upper(Str::substr($user->first_name, 0, 1)) . ' ' . Str::upper(Str::substr($user->last_name, 0, 1)) : 'JD' }}
                    </div>
                    @else
                        <img class="w-40 h-40 border border-gray-300 rounded-md object-cover" src="{{ $user->imageUrl() }}" alt="">
                    @endif
                    
                    <div class="flex gap-1 justify-center items-center mt-2 text-xl">
                        <div class="font-bold">{{ isset($user) ? Str::ucfirst($user->first_name) . ' ' . Str::ucfirst($user->last_name) : "Chelbe Design" }}
                        </div>
                        <img src="{{"/assets/img/verify-icone.svg" }}" alt="">
                    </div>
                    <div>{{ isset($user) ? Str::title($user->profession) : "Junior Full Stack Developper" }}</div>
                </div>
            </div>

            <div class="m-2">
                <h2 class="font-bold text-xl uppercase">Contact</h2>
                <div class="bg-gray-300 rounded-xl p-4 mt-2 mb-4 flex flex-col gap-3">
                    <div class="flex gap-2">
                        <img src="{{"/assets/img/email-icone.svg" }}" alt="">
                        <div>{{ isset($user) ? $user->email : "chelbe.xdesign@gmail.com" }}</div>
                    </div>
                    <div class="flex gap-2 mt-2">
                        <img src="{{"/assets/img/verify-user.svg" }}" alt="">
                        <div>{{ isset($user) ? Str::title($user->city . ',' . $user->state . ',' . $user->country) : "Rue toussaint louverture" }}</div>
                    </div>
                </div>

                <h2 class="font-bold text-xl uppercase my-2">Account</h2>
                <div class="bg-gray-300 rounded-xl p-4 mt-2 mb-4 flex flex-col gap-3">
                    <a href="/account/profile/edit" class="cursor-pointer flex gap-2">
                        <img src="{{ "/assets/img/user.svg" }}" alt="">
                        <div>Personal data</div>
                    </a>
                </div>

                <h2 class="font-bold text-xl uppercase mt-2">Setting</h2>
                <div class="bg-gray-300 rounded-xl p-4 mt-2 mb-4 flex flex-col gap-3">
                    <a href="/account/profile/pass/edit" class="cursor-pointer flex gap-2">
                        <img src="{{"/assets/img/setting-password-icone.svg"}}" alt="">
                        <div>Change Password</div>
                    </a>
                    <div class="flex gap-2 mt-2">
                        <img src="{{"/assets/img/versioning.svg"}}" alt="">
                        <div>Versioning</div>
                    </div>
                    <a href="/support/faq-and-help" class="cursor-pointer flex gap-2 mt-2">
                        <img src="{{"/assets/img/faq-help.svg"}}" alt="">
                        <div>Faq & Help</div>
                    </a>
                    <a href="/support/contact" class="cursor-pointer flex gap-2 mt-2 items-center">
                        <i class='bx bxs-contact text-[#795FFC]'></i>
                        <div>Contact Us</div>
                    </a>
                    <a href="/support/contact" class="cursor-pointer flex gap-2 mt-2 items-center">
                        <i class='bx bxs-group text-[#795FFC]'></i>
                        <div>About Us</div>
                    </a>
                    <a href="/auth/logout" class="cursor-pointer flex gap-2 mt-2">
                        <img src="{{"/assets/img/logout.svg"}}" alt="">
                        <div>logout</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout.app-layout>