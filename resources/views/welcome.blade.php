<x-layout.auth-layout>
    @section('title', 'Welcome')

    <div class="bg-gray-100 min-h-screen">

        <!-- HERO SECTION -->
        <section class="max-w-screen-xl mx-auto px-6 py-16">
            <div class="grid lg:grid-cols-2 gap-10 items-center">

                <!-- Left -->
                <div>
                    <span
                        class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 font-semibold text-sm">
                        Project & Task Management
                    </span>

                    <h1 class="mt-6 text-4xl md:text-6xl font-bold leading-tight text-gray-900">
                        Organize Work.
                        <span class="text-violet-600">Manage Projects.</span>
                        Deliver Faster.
                    </h1>

                    <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                        Plan tasks, track progress, collaborate with your team,
                        and stay productive with one modern workspace.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="/auth/register"
                            class="px-6 py-3 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white font-semibold shadow hover:scale-105 transition">
                            Get Started
                        </a>

                        <a href="/auth/login"
                            class="px-6 py-3 rounded-full border border-gray-300 bg-white text-gray-700 font-semibold hover:bg-gray-50 transition">
                            Sign In
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-3 gap-5 text-center">
                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <h3 class="text-2xl font-bold text-violet-600">10K+</h3>
                            <p class="text-sm text-gray-500">Tasks Completed</p>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <h3 class="text-2xl font-bold text-violet-600">500+</h3>
                            <p class="text-sm text-gray-500">Projects Managed</p>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <h3 class="text-2xl font-bold text-violet-600">99%</h3>
                            <p class="text-sm text-gray-500">Client Satisfaction</p>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div>
                    <div class="bg-white rounded-3xl shadow-xl p-5">
                        <img src="{{ '/assets/img/contact-banner.png' }}" class="rounded-2xl w-full" alt="">
                    </div>
                </div>

            </div>
        </section>


        <!-- FEATURES -->

        <section class="max-w-screen-xl mx-auto px-6 py-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900">
                    Everything you need to stay productive
                </h2>
                <p class="mt-3 text-gray-600">
                    Smart tools to manage tasks, teams and deadlines efficiently.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Task Planning -->
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="mb-4">
                        <i class='bx bx-calendar-check text-5xl text-[#4F1ED8]'></i>
                    </div>
                    <h3 class="font-bold text-xl">Task Planning</h3>
                    <p class="mt-2 text-gray-600">
                        Create, assign and organize daily tasks easily.
                    </p>
                </div>

                <!-- Project Tracking -->
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="mb-4">
                        <i class='bx bx-line-chart text-5xl text-[#4F1ED8]'></i>
                    </div>
                    <h3 class="font-bold text-xl">Project Tracking</h3>
                    <p class="mt-2 text-gray-600">
                        Follow project progress with real-time updates.
                    </p>
                </div>

                <!-- Team Collaboration -->
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="mb-4">
                        <i class='bx bx-group text-5xl text-[#4F1ED8]'></i>
                    </div>
                    <h3 class="font-bold text-xl">Team Collaboration</h3>
                    <p class="mt-2 text-gray-600">
                        Work together with comments, notes and statuses.
                    </p>
                </div>

                <!-- Deadline Control -->
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="mb-4">
                        <i class='bx bx-time-five text-5xl text-[#4F1ED8]'></i>
                    </div>
                    <h3 class="font-bold text-xl">Deadline Control</h3>
                    <p class="mt-2 text-gray-600">
                        Never miss important dates again.
                    </p>
                </div>

                <!-- Secure Access -->
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="mb-4">
                        <i class='bx bx-shield-quarter text-5xl text-[#4F1ED8]'></i>
                    </div>
                    <h3 class="font-bold text-xl">Secure Access</h3>
                    <p class="mt-2 text-gray-600">
                        Your projects stay safe and protected.
                    </p>
                </div>

                <!-- Boost Productivity -->
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="mb-4">
                        <i class='bx bx-rocket text-5xl text-[#4F1ED8]'></i>
                    </div>
                    <h3 class="font-bold text-xl">Boost Productivity</h3>
                    <p class="mt-2 text-gray-600">
                        Focus on work that truly matters.
                    </p>
                </div>

            </div>
        </section>

        <!-- SHOWCASE -->

        <section class="max-w-screen-xl mx-auto px-6 py-16">
            <div class="grid lg:grid-cols-2 gap-10 items-center">

                <div>
                    <img src="{{ '/assets/img/back-1.jpg' }}" class="rounded-3xl shadow-xl" alt="">
                </div>

                <div>
                    <span class="text-violet-600 font-semibold uppercase text-sm">
                        Smart Dashboard
                    </span>

                    <h2 class="mt-4 text-4xl font-bold text-gray-900">
                        One dashboard for all your work
                    </h2>

                    <p class="mt-5 text-gray-600 leading-relaxed">
                        Visualize your active projects, pending tasks,
                        completed work and team performance in one place.
                    </p>

                    <ul class="mt-6 space-y-3 text-gray-700 font-medium">
                        <li>✔ Easy navigation</li>
                        <li>✔ Clean interface</li>
                        <li>✔ Fast performance</li>
                        <li>✔ Better productivity</li>
                    </ul>
                </div>

            </div>
        </section>


        <!-- CTA -->
        <section class="bg-gray-200 py-16">
            <div class="max-w-screen-lg mx-auto px-6 text-center">

                <h2 class="text-4xl font-bold text-gray-900">
                    Ready to simplify your workflow?
                </h2>

                <p class="mt-4 text-lg text-gray-600">
                    Join now and manage tasks & projects with confidence.
                </p>

                <div class="mt-8">
                    <a href="/auth/register"
                        class="px-8 py-4 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white font-semibold shadow-lg hover:scale-105 transition">
                        Start Free Today
                    </a>
                </div>

            </div>
        </section>

    </div>

</x-layout.auth-layout>
