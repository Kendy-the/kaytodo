<x-layout.auth-layout>

@section('title', 'welcome')

<div class="pt-3 md:pb-5 bg-gray-100">

    <section class="flex justify-center items-center mx-auto max-w-screen-xl">
        <div class="flex p-7 flex-wrap-reverse md:justify-center lg:flex-nowrap lg:justify-between gap-4">
            <div class="flex items-center">
                <div class="flex flex-col bg-gray-200 px-4 py-2 md:py-4 md:px-25 lg:px-4 lg:py-11 rounded">
                    <h2
                        class="font-bold mt-5 text-center lg:text-start text-[20px] md:text-[25px] lg:text-[40px] underline md:no-underline">
                        <a href="/auth/login">
                            Task Management Website</a>
                    </h2>

                    <ul
                        class="md:mt-3 lg:mt-5 md:indent-[30px] lg:indent-[40px] text-[#444] font-semibold lg:text-[17px] text-[15px]">
                        <li class="my-3">
                            <div>📅 Organise votre journée, simplifie votre vie !</div>
                        </li>
                        <li class="my-3">
                            <div>🎯 la gestion des taches enfin simplifiée !</div>
                        </li>
                        <li class="my-3">
                            <div>⏳ Des tâches sous contrôle, un esprit libre !</div>
                        </li>
                        <li class="my-3">
                            <div>📌 Planifiez, priorisez, progressez !</div>
                        </li>
                        <li class="my-3">
                            <div>🚀 Passez à l’action, restez maître de votre temps !</div>
                        </li>
                    </ul>
                </div>
            </div>

            <img src="{{'/assets/img/contact-banner.png'}}" class="rounded" alt="">
        </div>
    </section>

    <div class="bg-gray-200">
        <section class="flex justify-center items-center mx-auto max-w-screen-xl">
            <div class="flex p-7 flex-wrap-reverse md:justify-center lg:flex-nowrap lg:justify-between gap-4 rounded">
                <div class="flex flex-col items-center">
                    <p class="px-7 text-2xl">Want to get in touch? We'd love to hear from you. Here's how you can
                        reach
                        us.</p>
                    <button name="submit"
                        class="mt-5 cursor-pointer text-[20px] w-[50%] h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700">Get
                        Started
                    </button>
                </div>

            </div>
        </section>
    </div>

    <section class="flex justify-center items-center mx-auto max-w-screen-xl">
        <div class="flex p-7 flex-wrap md:justify-center lg:flex-nowrap lg:justify-between gap-4">
            <img src="{{'/assets/img/back-1.jpg'}}" class="rounded" alt="">
            <div class="flex items-center">
                <div class="flex flex-col bg-gray-200 px-4 py-2 md:py-4 md:px-25 lg:px-4 lg:py-11 rounded">
                    <h2
                        class="font-bold mt-5 text-center lg:text-start text-[20px] md:text-[25px] lg:text-[40px] underline md:no-underline">
                        <a href="/auth/login">
                            Task Management Website</a>
                    </h2>

                    <ul
                        class="md:mt-3 lg:mt-5 md:indent-[30px] lg:indent-[40px] text-[#444] font-semibold lg:text-[17px] text-[15px]">
                        <li class="my-3">
                            <div>📅 Organise votre journée, simplifie votre vie !</div>
                        </li>
                        <li class="my-3">
                            <div>🎯 la gestion des taches enfin simplifiée !</div>
                        </li>
                        <li class="my-3">
                            <div>⏳ Des tâches sous contrôle, un esprit libre !</div>
                        </li>
                        <li class="my-3">
                            <div>📌 Planifiez, priorisez, progressez !</div>
                        </li>
                        <li class="my-3">
                            <div>🚀 Passez à l’action, restez maître de votre temps !</div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <div class="bg-gray-200">
        <section class="flex justify-center items-center mx-auto max-w-screen-xl">
            <div class="flex p-7 flex-wrap-reverse md:justify-center lg:flex-nowrap lg:justify-between gap-4 rounded">
                <div class="flex flex-col items-center">
                    <p class="px-7 text-2xl">Want to get in touch? We'd love to hear from you. Here's how you can
                        reach
                        us.</p>
                    <button name="submit"
                        class="mt-5 cursor-pointer text-[20px] w-[50%] h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700">Get
                        Started
                    </button>
                </div>

            </div>
        </section>
    </div>

    <section class="flex justify-center items-center mx-auto max-w-screen-xl">
        <div
            class="flex p-7 flex-wrap md:justify-center lg:flex-nowrap lg:justify-between gap-4 rounded border-t border-b border-gray-300">

            <div class="flex items-center text-center">
                <div class="flex flex-col gap-4">
                    <h1 class="px-7 font-bold text-5xl">Get in touch</h1>
                    <p class="px-7 text-2xl">Want to get in touch? We'd love to hear from you. Here's how you can
                        reach
                        us.</p>
                </div>
            </div>
            <img src="{{'/assets/img/contact-banner-2.jpg'}}" class="rounded" alt="">
        </div>
    </section>
    <div class="bg-gray-200">
        <section class="flex justify-center items-center mx-auto max-w-screen-xl">
            <div class="flex p-7 flex-wrap-reverse md:justify-center lg:flex-nowrap lg:justify-between gap-4 rounded">
                <div class="flex flex-col items-center">
                    <p class="px-7 text-2xl">Want to get in touch? We'd love to hear from you. Here's how you can
                        reach
                        us.</p>
                    <button name="submit"
                        class="mt-5 cursor-pointer text-[20px] w-[50%] h-10 border border-white text-white rounded-full bg-linear-to-b from-violet-400 to-[#4F1ED8]  hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700">Get
                        Started
                    </button>
                </div>
            </div>
        </section>
    </div>
</div>
</x-layout.auth-layout>