<div class="bg-gray-100 min-h-screen">

    <!-- HERO -->
    <section class="max-w-screen-xl mx-auto px-6 py-14">
        <div class="bg-white rounded-3xl shadow-sm p-8 lg:p-12">

            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 font-semibold text-sm">
                    Help Center
                </span>

                <h1 class="mt-5 text-4xl lg:text-5xl font-bold text-gray-900">
                    How can we help you today?
                </h1>

                <p class="mt-4 text-lg text-gray-600">
                    Find answers about tasks, projects, teams, notifications,
                    account settings and common issues.
                </p>
            </div>

            <!-- Search -->
            <div class="mt-8 max-w-2xl mx-auto">
                <form>
                    <div class="relative z-10">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <i class='bx bx-search text-xl text-gray-400'></i>
                        </div>

                        <input type="text"
                            placeholder="Search help articles..."
                            class="w-full ps-12 pe-4 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-violet-500 focus:border-violet-500">

                    </div>
                </form>
            </div>

        </div>
    </section>



    <!-- QUICK HELP -->
    <section class="max-w-screen-xl mx-auto px-6 pb-10">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <i class='bx bx-task text-5xl text-[#4F1ED8]'></i>
                <h3 class="mt-4 font-bold text-lg">Tasks</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Create, edit and organize tasks.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <i class='bx bx-briefcase text-5xl text-[#4F1ED8]'></i>
                <h3 class="mt-4 font-bold text-lg">Projects</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Manage deadlines and progress.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <i class='bx bx-group text-5xl text-[#4F1ED8]'></i>
                <h3 class="mt-4 font-bold text-lg">Teams</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Invite and collaborate easily.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <i class='bx bx-user-circle text-5xl text-[#4F1ED8]'></i>
                <h3 class="mt-4 font-bold text-lg">Account</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Profile, login and settings.
                </p>
            </div>

        </div>
    </section>



    <!-- FAQ -->
    <section class="max-w-screen-xl mx-auto px-6 pb-16">
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- LEFT -->
            <div>
                <span
                    class="inline-block px-4 py-1 rounded-full bg-violet-100 text-violet-700 font-semibold text-sm">
                    Frequently Asked Questions
                </span>

                <h2 class="mt-5 text-4xl font-bold text-gray-900">
                    Popular Help Topics
                </h2>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Based on common issues users face in task and project
                    management platforms.
                </p>
            </div>


            <!-- RIGHT -->
            <div class="lg:col-span-2">

                <!-- Flowbite Accordion -->
                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="bg-white text-gray-900"
                    data-inactive-classes="text-gray-500">

                    <!-- 1 -->
                    <h2 id="faq-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 px-6 font-medium text-left bg-white border-b border-gray-200 rounded-t-2xl"
                            data-accordion-target="#faq-body-1"
                            aria-expanded="true"
                            aria-controls="faq-body-1">

                            <span>How do I create a new task?</span>
                            <i class='bx bx-chevron-down text-2xl'></i>
                        </button>
                    </h2>

                    <div id="faq-body-1" class="hidden" aria-labelledby="faq-heading-1">
                        <div class="px-6 py-5 bg-white border-b border-gray-200 text-gray-600">
                            Go to your dashboard, click <strong>Add Task</strong>,
                            enter title, due date, priority and save.
                        </div>
                    </div>


                    <!-- 2 -->
                    <h2 id="faq-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 px-6 font-medium text-left bg-white border-b border-gray-200"
                            data-accordion-target="#faq-body-2">

                            <span>Why am I not receiving notifications?</span>
                            <i class='bx bx-chevron-down text-2xl'></i>
                        </button>
                    </h2>

                    <div id="faq-body-2" class="hidden">
                        <div class="px-6 py-5 bg-white border-b border-gray-200 text-gray-600">
                            Check notification settings in your profile,
                            browser permissions, and spam folder for emails.
                        </div>
                    </div>


                    <!-- 3 -->
                    <h2 id="faq-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 px-6 font-medium text-left bg-white border-b border-gray-200"
                            data-accordion-target="#faq-body-3">

                            <span>How do I invite team members?</span>
                            <i class='bx bx-chevron-down text-2xl'></i>
                        </button>
                    </h2>

                    <div id="faq-body-3" class="hidden">
                        <div class="px-6 py-5 bg-white border-b border-gray-200 text-gray-600">
                            Open your project, go to <strong>Members</strong>,
                            click <strong>Invite</strong>, then send invitations by email.
                        </div>
                    </div>


                    <!-- 4 -->
                    <h2 id="faq-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 px-6 font-medium text-left bg-white border-b border-gray-200"
                            data-accordion-target="#faq-body-4">

                            <span>I forgot my password. What should I do?</span>
                            <i class='bx bx-chevron-down text-2xl'></i>
                        </button>
                    </h2>

                    <div id="faq-body-4" class="hidden">
                        <div class="px-6 py-5 bg-white border-b border-gray-200 text-gray-600">
                            Use the <strong>Forgot Password</strong> option
                            on the login page to reset securely.
                        </div>
                    </div>


                    <!-- 5 -->
                    <h2 id="faq-heading-5">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 px-6 font-medium text-left bg-white border-b border-gray-200"
                            data-accordion-target="#faq-body-5">

                            <span>Can I edit or delete completed tasks?</span>
                            <i class='bx bx-chevron-down text-2xl'></i>
                        </button>
                    </h2>

                    <div id="faq-body-5" class="hidden">
                        <div class="px-6 py-5 bg-white border-b border-gray-200 text-gray-600">
                            Yes. Open the completed task list and choose
                            edit or delete from actions.
                        </div>
                    </div>


                    <!-- 6 -->
                    <h2 id="faq-heading-6">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 px-6 font-medium text-left bg-white rounded-b-2xl"
                            data-accordion-target="#faq-body-6">

                            <span>Why is my dashboard loading slowly?</span>
                            <i class='bx bx-chevron-down text-2xl'></i>
                        </button>
                    </h2>

                    <div id="faq-body-6" class="hidden">
                        <div class="px-6 py-5 bg-white text-gray-600 rounded-b-2xl">
                            Try refreshing the page, checking internet connection,
                            clearing browser cache or reducing open tabs.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>



    <!-- CONTACT SUPPORT -->
    <section class="max-w-screen-xl mx-auto px-6 pb-16">
        <div
            class="bg-gradient-to-r from-violet-400 to-[#4F1ED8] rounded-3xl p-10 text-white text-center">

            <h2 class="text-4xl font-bold">
                Still need help?
            </h2>

            <p class="mt-4 text-lg text-white/90">
                Our support team is ready to assist you.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="/support/contact"
                    class="px-6 py-3 bg-white text-[#4F1ED8] rounded-full font-semibold hover:scale-105 transition">
                    Contact Us
                </a>

                <a href="/auth/login"
                    class="px-6 py-3 border border-white rounded-full font-semibold hover:bg-white hover:text-[#4F1ED8] transition">
                    Go to Dashboard
                </a>
            </div>

        </div>
    </section>

</div>
