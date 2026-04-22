{{-- <div>
    <div class="pt-3 md:pb-5 bg-gray-100">
        <section class="mx-auto max-w-screen-xl">
            <h1 class="px-7 font-bold text-4xl text-center mb-9">Kay TODO / Team</h1>
            <div class="flex justify-center items-center bg-white">
                <div class="flex p-7 flex-wrap-reverse lg:flex-nowrap lg:justify-between gap-4 mt-5">
                    <div class="flex items-center">
                        <div class="flex flex-col gap-4">
                            <h2 class="px-7 font-bold text-3xl">Rickendy Presume / CEO</h2>
                            <p class="px-7 text-xl">I am Rickendy PRESUME, Most often I am called PRESUME. I am a IT
                                student, I
                                am developing a huge passion for computer code, for my future I aspire to become a
                                computer
                                developer, all integrated namely the Web, software and mobile, without forgetting that I
                                already
                                master web development. I've always been fascinated by how technology can simplify our
                                daily
                                lives and improve our productivity. It is this vision that pushed me to develop my task
                                management web application. I wanted to create an efficient and intuitive tool that
                                helps
                                users
                                better organize their work, track their projects and optimize their time.

                                Through this project, I put my web development skills into practice while taking on
                                stimulating
                                technical challenges. My goal is to offer a high-performance solution that meets the
                                needs
                                of
                                professionals and students looking for organization and efficiency. This app is a
                                reflection
                                of
                                my passion for coding and my desire to innovate in the field of IT development.</p>
                        </div>
                    </div>
                    <img src="{{ '/assets/img/concepteur.jpg' }}" class="rounded" alt="">
                </div>
            </div>

        </section>

        <section class="mx-auto max-w-screen-xl">
            <h1 class="font-bold text-2xl my-7 text-center underline">Contact Us</h1>
            <div class="flex flex-wrap lg:flex-nowrap lg:justify-between gap-4">

                <div class="bg-white shadow rounded-xl w-full lg:w-[50%] text-center">

                    <div class="flex items-center flex-col p-10 gap-2">
                        <svg width="80" height="80" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1665 2.02499H5.83317C3.33317 2.02499 1.6665 3.69166 1.6665 6.19166V11.1917C1.6665 13.6917 3.33317 15.3583 5.83317 15.3583H9.1665L12.8748 17.825C13.4248 18.1917 14.1665 17.8 14.1665 17.1333V15.3583C16.6665 15.3583 18.3332 13.6917 18.3332 11.1917V6.19166C18.3332 3.69166 16.6665 2.02499 14.1665 2.02499ZM12.9165 9.37499H7.08317C6.7415 9.37499 6.45817 9.09166 6.45817 8.74999C6.45817 8.40833 6.7415 8.12499 7.08317 8.12499H12.9165C13.2582 8.12499 13.5415 8.40833 13.5415 8.74999C13.5415 9.09166 13.2582 9.37499 12.9165 9.37499Z"
                                fill="#6E62FF" />
                        </svg>
                        <h2 class="font-bold text-2xl my-4">Contact Customer Support</h2>
                        <p class="text-center text-3xs my-4">Sometimes you need a little help Or a
                            kaytodo support rep. Don’t worry…
                            we’re here for you.</p>
                        <address>
                            <div>KayTODO</div>
                            <div>Email : <a href="mailto:kendythe.c@gmail.com" class="underline">contact@kaytodo.com</a>
                            </div>
                            <div>Phone : (509) 3780-0137 / 4042-1847</div>
                            <div>#10, Rue toussaint Louverutre, Cayes, Sud, HT</div>
                        </address>
                        <a href="mailto:kendythe.c@gmail.com"
                            class="mt-4 cursor-pointer text-[20px] w-full h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700">Contact
                            Support
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow rounded-xl flex justify-around gap-1 p-5 w-full lg:w-[50%] mb-20 md:mb-0">
                    <div class="flex items-center">
                        <svg width="100" height="100" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.75 2.625H5.25C3 2.625 1.5 3.75 1.5 6.375V11.625C1.5 14.25 3 15.375 5.25 15.375H12.75C15 15.375 16.5 14.25 16.5 11.625V6.375C16.5 3.75 15 2.625 12.75 2.625ZM13.1025 7.1925L10.755 9.0675C10.26 9.465 9.63 9.66 9 9.66C8.37 9.66 7.7325 9.465 7.245 9.0675L4.8975 7.1925C4.6575 6.9975 4.62 6.6375 4.8075 6.3975C5.0025 6.1575 5.355 6.1125 5.595 6.3075L7.9425 8.1825C8.5125 8.64 9.48 8.64 10.05 8.1825L12.3975 6.3075C12.6375 6.1125 12.9975 6.15 13.185 6.3975C13.38 6.6375 13.3425 6.9975 13.1025 7.1925Z"
                                fill="#795FFC" />
                        </svg>
                    </div>
                    <form action="/support/contact" method="post" class="mt-10 w-full">
                        @csrf
                        @auth
                            <input type="hidden" name="user_id" value="{{ (Auth::User())->id }}">
                        @endauth
                        <div class="flex flex-col gap-3 md:ms-10">
                            <div>
                                <h3 class="font-bold text-2xl mb-5">Get in touch</h3>
                            </div>
                            <div class="w-full">
                                @php $hasError = 'none' @endphp
                                @error('name') @php $hasError = 'error' @endphp @enderror

                                <x-input :label="'none'" :value="''" :type="'text'" :name="'name'" :$hasError>
                                    <x-slot:placeholder>Doe</x-slot:placeholder>
                                    @error('name')
                                        <x-slot:input-error>
                                            <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                        </x-slot:input-error>
                                    @enderror
                                </x-input>
                            </div>

                            <div class="w-full">

                                @php $hasError = 'none' @endphp
                                @error('email') @php $hasError = 'error' @endphp @enderror

                                <x-input :label="'none'" :value="''" :type="'email'" :name="'email'" :$hasError>
                                    <x-slot:placeholder>youremail@example.com</x-slot:placeholder>
                                    @error('email')
                                        <x-slot:input-error>
                                            <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                        </x-slot:input-error>
                                    @enderror
                                </x-input>

                            </div>

                            <textarea
                                placeholder="Your message"
                                class="border border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 mt-1 p-3 w-full rounded-[15px] text-[#718EBF]"
                                name="message" id="" cols="20" rows="5"></textarea>
                                @error('message')
                                    <p class="text-[12px] text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            <div>
                                <button name="submit"
                                    class="mt-4 cursor-pointer text-[20px] w-full h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700">Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div> --}}

<div class="bg-gray-100 min-h-screen">

    <!-- HERO -->
    <section class="max-w-screen-xl mx-auto px-6 py-14">
        <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
            <div class="grid lg:grid-cols-2 gap-10 items-center p-8 lg:p-14">

                <!-- LEFT -->
                <div>
                    <span
                        class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 font-semibold text-sm">
                        Meet Our Team
                    </span>

                    <h1 class="mt-5 text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        Behind <span class="text-[#4F1ED8]">KayTODO</span>
                    </h1>

                    <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                        We build smart productivity tools that help users manage
                        tasks, organize projects and save valuable time.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="bg-gray-100 rounded-2xl p-4">
                            <h3 class="text-2xl font-bold text-[#4F1ED8]">100%</h3>
                            <p class="text-sm text-gray-500">Focused on Productivity</p>
                        </div>

                        <div class="bg-gray-100 rounded-2xl p-4">
                            <h3 class="text-2xl font-bold text-[#4F1ED8]">24/7</h3>
                            <p class="text-sm text-gray-500">Support Ready</p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="flex justify-center">
                    <img src="{{ '/assets/img/concepteur.jpg' }}"
                        class="rounded-3xl shadow-lg w-full max-w-md object-cover"
                        alt="">
                </div>

            </div>
        </div>
    </section>


    <!-- CEO SECTION -->
    <section class="max-w-screen-xl mx-auto px-6 pb-14">
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- PROFILE CARD -->
            <div class="bg-white rounded-3xl shadow-sm p-8">
                <div class="w-24 h-24 rounded-full overflow-hidden mx-auto">
                    <img src="{{ '/assets/img/concepteur.jpg' }}"
                        class="w-full h-full object-cover"
                        alt="">
                </div>

                <div class="text-center mt-5">
                    <h2 class="text-2xl font-bold text-gray-900">
                        Rickendy Presume
                    </h2>
                    <p class="text-[#4F1ED8] font-semibold mt-1">
                        Founder / CEO
                    </p>
                </div>

                <div class="mt-6 space-y-3 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <i class='bx bx-code-alt text-xl text-[#4F1ED8]'></i>
                        Full Stack Developer
                    </div>

                    <div class="flex items-center gap-2">
                        <i class='bx bx-globe text-xl text-[#4F1ED8]'></i>
                        Web / Software / Mobile Vision
                    </div>

                    <div class="flex items-center gap-2">
                        <i class='bx bx-bulb text-xl text-[#4F1ED8]'></i>
                        Innovation Driven
                    </div>
                </div>
            </div>


            <!-- STORY -->
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm p-8">
                <h2 class="text-3xl font-bold text-gray-900">
                    My Story
                </h2>

                <p class="mt-5 text-gray-600 leading-relaxed">
                    I am Rickendy PRESUME, an IT student passionate about coding
                    and digital innovation. My ambition is to become a complete
                    developer mastering web, software and mobile technologies.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    KayTODO was created from one simple vision:
                    helping people organize their work, manage projects
                    and stay productive through a clean and efficient platform.
                </p>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    This project reflects my passion for development,
                    problem solving and building tools that create
                    real impact in daily life.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <div class="px-5 py-3 rounded-2xl bg-gray-100">
                        <span class="font-bold text-[#4F1ED8]">Laravel</span>
                    </div>

                    <div class="px-5 py-3 rounded-2xl bg-gray-100">
                        <span class="font-bold text-[#4F1ED8]">Tailwind CSS</span>
                    </div>

                    <div class="px-5 py-3 rounded-2xl bg-gray-100">
                        <span class="font-bold text-[#4F1ED8]">Productivity UX</span>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- CONTACT -->
    <section class="max-w-screen-xl mx-auto px-6 pb-16 mb-5 md:mb-0">
        <div class="grid lg:grid-cols-2 gap-8">

            <!-- LEFT -->
            <div class="bg-white rounded-3xl shadow-sm p-8">

                <span
                    class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 font-semibold text-sm">
                    Contact Us
                </span>

                <h2 class="mt-5 text-3xl font-bold text-gray-900">
                    Need Help?
                </h2>

                <p class="mt-4 text-gray-600">
                    Our team is ready to answer your questions and support your experience.
                </p>

                <div class="mt-8 space-y-5 text-gray-700">

                    <div class="flex items-center gap-4">
                        <i class='bx bx-envelope text-3xl text-[#4F1ED8]'></i>
                        <span>kaytodo@gmail.com</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <i class='bx bx-phone text-3xl text-[#4F1ED8]'></i>
                        <span>(509) 3780-0137 / 4042-1847</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <i class='bx bx-map text-3xl text-[#4F1ED8]'></i>
                        <span>#10, Rue Toussaint Louverture, Cayes, Haiti</span>
                    </div>

                </div>

                <a href="mailto:kendythe.c@gmail.com"
                    class="inline-block mt-8 px-6 py-3 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white font-semibold hover:scale-105 transition">
                    Contact Support
                </a>

            </div>


            <!-- FORM -->
            <div class="bg-white rounded-3xl shadow-sm p-8">

                <h2 class="text-3xl font-bold text-gray-900">
                    Get In Touch
                </h2>

                <p class="mt-3 text-gray-600">
                    Send us a message and we’ll reply as soon as possible.
                </p>

                <form action="/support/contact" method="post" class="mt-8 space-y-5">
                    @csrf

                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth

                    <div>
                        <input type="text" name="name"
                            placeholder="Your Name"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-violet-500">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="email" name="email"
                            placeholder="you@example.com"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-violet-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <textarea name="message" rows="5"
                            placeholder="Your Message"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-violet-500"></textarea>

                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="w-full py-3 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white font-semibold hover:scale-[1.02] transition">
                        Send Message
                    </button>

                </form>

            </div>

        </div>
    </section>

</div>
