<x-layout.auth-layout>

    @section('title', 'price')

    <div class="bg-gray-100 min-h-screen">

        <!-- HERO -->
        <section class="max-w-screen-xl mx-auto px-6 py-14">
            <div class="text-center max-w-3xl mx-auto">

                <span
                    class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 font-semibold text-sm">
                    Pricing Plans
                </span>

                <h1 class="mt-5 text-4xl lg:text-5xl font-bold text-gray-900">
                    Simple pricing for every team
                </h1>

                <p class="mt-4 text-lg text-gray-600">
                    Choose the perfect plan to manage tasks, projects,
                    teams and productivity without limits.
                </p>

            </div>
        </section>



        <!-- TOGGLE -->
        <section class="max-w-screen-xl mx-auto px-6 pb-8">
            <div class="flex justify-center">
                <div class="bg-white rounded-full shadow-sm p-2 flex gap-2">

                    <button
                        class="px-6 py-2 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white font-semibold">
                        Monthly
                    </button>

                    <button class="px-6 py-2 rounded-full text-gray-600 font-semibold hover:bg-gray-100 transition">
                        Yearly
                    </button>

                </div>
            </div>
        </section>



        <!-- PRICING CARDS -->
        <section class="max-w-screen-xl mx-auto px-6 pb-16">
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- STARTER -->
                <div class="bg-white rounded-3xl shadow-sm p-8 border border-gray-100">

                    <span
                        class="inline-block px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">
                        Starter
                    </span>

                    <h2 class="mt-6 text-3xl font-bold text-gray-900">
                        Free
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Perfect for personal productivity.
                    </p>

                    <div class="mt-8 space-y-4 text-gray-700">

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Up to 3 Projects
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Unlimited Tasks
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Calendar View
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Basic Support
                        </div>

                    </div>

                    <a href="/auth/register"
                        class="block text-center mt-10 py-3 rounded-full border border-gray-300 font-semibold text-gray-700 hover:bg-gray-50 transition">
                        Get Started
                    </a>

                </div>



                <!-- PRO -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-[#4F1ED8] relative scale-105">

                    <span
                        class="absolute -top-4 left-1/2 -translate-x-1/2 px-5 py-2 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white text-sm font-semibold shadow">
                        Most Popular
                    </span>

                    <span
                        class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 text-sm font-semibold">
                        Pro
                    </span>

                    <h2 class="mt-6 text-3xl font-bold text-gray-900">
                        $9<span class="text-lg text-gray-500">/month</span>
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Best for professionals and growing teams.
                    </p>

                    <div class="mt-8 space-y-4 text-gray-700">

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Unlimited Projects
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Team Collaboration
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Priority Levels
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Reports & Analytics
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Email Notifications
                        </div>

                    </div>

                    <a href="/auth/register"
                        class="block text-center mt-10 py-3 rounded-full bg-gradient-to-r from-violet-400 to-[#4F1ED8] text-white font-semibold hover:scale-105 transition">
                        Start Pro Plan
                    </a>

                </div>



                <!-- ENTERPRISE -->
                <div class="bg-white rounded-3xl shadow-sm p-8 border border-gray-100">

                    <span
                        class="inline-block px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">
                        Enterprise
                    </span>

                    <h2 class="mt-6 text-3xl font-bold text-gray-900">
                        Custom
                    </h2>

                    <p class="mt-2 text-gray-500">
                        For large organizations with advanced needs.
                    </p>

                    <div class="mt-8 space-y-4 text-gray-700">

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Unlimited Everything
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Dedicated Manager
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Custom Integrations
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            Advanced Security
                        </div>

                        <div class="flex items-center gap-3">
                            <i class='bx bx-check-circle text-xl text-green-500'></i>
                            24/7 Premium Support
                        </div>

                    </div>

                    <a href="/about-team"
                        class="block text-center mt-10 py-3 rounded-full border border-gray-300 font-semibold text-gray-700 hover:bg-gray-50 transition">
                        Contact Sales
                    </a>

                </div>

            </div>
        </section>



        <!-- FEATURE COMPARISON -->
        <section class="max-w-screen-xl mx-auto px-6 pb-16">
            <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

                <div class="p-8 border-b border-gray-100">
                    <h2 class="text-3xl font-bold text-gray-900">
                        Compare Features
                    </h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4">Features</th>
                                <th class="px-6 py-4">Starter</th>
                                <th class="px-6 py-4">Pro</th>
                                <th class="px-6 py-4">Enterprise</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 text-gray-700">

                            <tr>
                                <td class="px-6 py-4">Projects</td>
                                <td class="px-6 py-4">3</td>
                                <td class="px-6 py-4">Unlimited</td>
                                <td class="px-6 py-4">Unlimited</td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">Team Members</td>
                                <td class="px-6 py-4">1</td>
                                <td class="px-6 py-4">25</td>
                                <td class="px-6 py-4">Unlimited</td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">Analytics</td>
                                <td class="px-6 py-4">—</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">Advanced</td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">Support</td>
                                <td class="px-6 py-4">Basic</td>
                                <td class="px-6 py-4">Priority</td>
                                <td class="px-6 py-4">24/7</td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>
        </section>



        <!-- CTA -->
        <section class="max-w-screen-xl mx-auto px-6 pb-16">
            <div class="rounded-3xl p-10 text-center text-white bg-gradient-to-r from-violet-400 to-[#4F1ED8]">

                <h2 class="text-4xl font-bold">
                    Ready to boost productivity?
                </h2>

                <p class="mt-4 text-lg text-white/90">
                    Start free today and upgrade anytime.
                </p>

                <a href="/auth/register"
                    class="inline-block mt-8 px-8 py-3 bg-white text-[#4F1ED8] rounded-full font-semibold hover:scale-105 transition">
                    Start Now
                </a>

            </div>
        </section>

    </div>
    
</x-layout.auth-layout>
