<x-layout.app-layout>

    @section('title', 'Home')

    <div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

        <div class="bg-[#795FFC] rounded-xl p-5 pe-0 flex items-center text-white justify-between">
            <div>
                <h1 class="text-xl font-semibold">My Work Summary</h1>
                <p>Today task & Presence activity</p>
            </div>
            <img src="{{ '/assets/img/home-banner.svg' }}" alt="" />
        </div>

        <div class="bg-white rounded-xl p-5 pb-3 mt-5">
            <div>
                <h2 class="font-bold">Today Meeting <?= isset($meeting) ? count($meeting) : '2' ?></h2>
                <p>Your schedule for the day</p>
            </div>

            <!-- Si aucun enregistrement -->
            <?php if(isset($meeting)): ?>
            <div class="mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
                <div>
                    <svg width="122" height="82" viewBox="0 0 122 82" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="39.3333" height="40" rx="4" fill="#EBE9FE" />
                        <rect x="41.3335" width="39.3333" height="40" rx="4" fill="#EBE9FE" />
                        <rect x="82.6665" width="39.3333" height="40" rx="4" fill="#EBE9FE" />
                        <path
                            d="M102 20.0001C104.301 20.0001 106.167 18.1346 106.167 15.8334C106.167 13.5322 104.301 11.6667 102 11.6667C99.699 11.6667 97.8335 13.5322 97.8335 15.8334C97.8335 18.1346 99.699 20.0001 102 20.0001Z"
                            fill="#D9D6FE" />
                        <path
                            d="M102 22.0833C97.8248 22.0833 94.4248 24.8833 94.4248 28.3333C94.4248 28.5666 94.6081 28.7499 94.8415 28.7499H109.158C109.391 28.7499 109.575 28.5666 109.575 28.3333C109.575 24.8833 106.175 22.0833 102 22.0833Z"
                            fill="#D9D6FE" />
                        <path
                            d="M61.0002 20.0001C63.3013 20.0001 65.1668 18.1346 65.1668 15.8334C65.1668 13.5322 63.3013 11.6667 61.0002 11.6667C58.699 11.6667 56.8335 13.5322 56.8335 15.8334C56.8335 18.1346 58.699 20.0001 61.0002 20.0001Z"
                            fill="#D9D6FE" />
                        <path
                            d="M60.9998 22.0833C56.8248 22.0833 53.4248 24.8833 53.4248 28.3333C53.4248 28.5666 53.6081 28.7499 53.8415 28.7499H68.1581C68.3915 28.7499 68.5748 28.5666 68.5748 28.3333C68.5748 24.8833 65.1748 22.0833 60.9998 22.0833Z"
                            fill="#D9D6FE" />
                        <path
                            d="M20.0002 20.0001C22.3013 20.0001 24.1668 18.1346 24.1668 15.8334C24.1668 13.5322 22.3013 11.6667 20.0002 11.6667C17.699 11.6667 15.8335 13.5322 15.8335 15.8334C15.8335 18.1346 17.699 20.0001 20.0002 20.0001Z"
                            fill="#D9D6FE" />
                        <path
                            d="M19.9998 22.0833C15.8248 22.0833 12.4248 24.8833 12.4248 28.3333C12.4248 28.5666 12.6081 28.7499 12.8415 28.7499H27.1581C27.3915 28.7499 27.5748 28.5666 27.5748 28.3333C27.5748 24.8833 24.1748 22.0833 19.9998 22.0833Z"
                            fill="#D9D6FE" />
                        <rect y="42" width="39.3333" height="40" rx="4" fill="#EBE9FE" />
                        <rect x="41.3335" y="42" width="39.3333" height="40" rx="4" fill="#EBE9FE" />
                        <rect x="82.6665" y="42" width="39.3333" height="40" rx="4" fill="#EBE9FE" />
                        <path
                            d="M61.0002 62.0001C63.3013 62.0001 65.1668 60.1346 65.1668 57.8334C65.1668 55.5322 63.3013 53.6667 61.0002 53.6667C58.699 53.6667 56.8335 55.5322 56.8335 57.8334C56.8335 60.1346 58.699 62.0001 61.0002 62.0001Z"
                            fill="#D9D6FE" />
                        <path
                            d="M60.9998 64.0833C56.8248 64.0833 53.4248 66.8833 53.4248 70.3333C53.4248 70.5666 53.6081 70.7499 53.8415 70.7499H68.1581C68.3915 70.7499 68.5748 70.5666 68.5748 70.3333C68.5748 66.8833 65.1748 64.0833 60.9998 64.0833Z"
                            fill="#D9D6FE" />
                        <path
                            d="M102 62.0001C104.301 62.0001 106.167 60.1346 106.167 57.8334C106.167 55.5322 104.301 53.6667 102 53.6667C99.699 53.6667 97.8335 55.5322 97.8335 57.8334C97.8335 60.1346 99.699 62.0001 102 62.0001Z"
                            fill="#D9D6FE" />
                        <path
                            d="M102 64.0833C97.8248 64.0833 94.4248 66.8833 94.4248 70.3333C94.4248 70.5666 94.6081 70.7499 94.8415 70.7499H109.158C109.391 70.7499 109.575 70.5666 109.575 70.3333C109.575 66.8833 106.175 64.0833 102 64.0833Z"
                            fill="#D9D6FE" />
                        <path
                            d="M20.0002 62.0001C22.3013 62.0001 24.1668 60.1346 24.1668 57.8334C24.1668 55.5322 22.3013 53.6667 20.0002 53.6667C17.699 53.6667 15.8335 55.5322 15.8335 57.8334C15.8335 60.1346 17.699 62.0001 20.0002 62.0001Z"
                            fill="#D9D6FE" />
                        <path
                            d="M19.9998 64.0833C15.8248 64.0833 12.4248 66.8833 12.4248 70.3333C12.4248 70.5666 12.6081 70.7499 12.8415 70.7499H27.1581C27.3915 70.7499 27.5748 70.5666 27.5748 70.3333C27.5748 66.8833 24.1748 64.0833 19.9998 64.0833Z"
                            fill="#D9D6FE" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold">No Meeting Available</h3>
                    <p>
                        it looks like you don't have any meeting scheduled at the moment.<br>
                        This space will be updated as new meeting are added!
                    </p>
                </div>
            </div>
            <?php endif ?>

            <!-- S'il ya enregistrement -->
            <div class="flex flex-col bg-gray-100 border border-gray-300 rounded-xl my-2 text-sm md:text-[17px]">
                <div class="flex justify-between px-3 pb-1 pt-3">
                    <div class="flex gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="12" fill="#7A5AF8" />
                            <path
                                d="M16.575 9.085C16.37 8.975 15.94 8.86 15.355 9.27L14.62 9.79C14.565 8.235 13.89 7.625 12.25 7.625H9.25C7.54 7.625 6.875 8.29 6.875 10V14C6.875 15.15 7.5 16.375 9.25 16.375H12.25C13.89 16.375 14.565 15.765 14.62 14.21L15.355 14.73C15.665 14.95 15.935 15.02 16.15 15.02C16.335 15.02 16.48 14.965 16.575 14.915C16.78 14.81 17.125 14.525 17.125 13.81V10.19C17.125 9.475 16.78 9.19 16.575 9.085ZM11.5 11.69C10.985 11.69 10.56 11.27 10.56 10.75C10.56 10.23 10.985 9.81 11.5 9.81C12.015 9.81 12.44 10.23 12.44 10.75C12.44 11.27 12.015 11.69 11.5 11.69Z"
                                fill="#FAFAFF" />
                        </svg>

                        <h3 class="font-bold"><?= !empty($metting) ? $metting->title : 'Townhall Meeting' ?></h3>
                    </div>
                    <div class="flex gap-2">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.00016 1.33331C4.32683 1.33331 1.3335 4.32665 1.3335 7.99998C1.3335 11.6733 4.32683 14.6666 8.00016 14.6666C11.6735 14.6666 14.6668 11.6733 14.6668 7.99998C14.6668 4.32665 11.6735 1.33331 8.00016 1.33331ZM10.9002 10.38C10.8068 10.54 10.6402 10.6266 10.4668 10.6266C10.3802 10.6266 10.2935 10.6066 10.2135 10.5533L8.14683 9.31998C7.6335 9.01331 7.2535 8.33998 7.2535 7.74665V5.01331C7.2535 4.73998 7.48016 4.51331 7.7535 4.51331C8.02683 4.51331 8.2535 4.73998 8.2535 5.01331V7.74665C8.2535 7.98665 8.4535 8.33998 8.66016 8.45998L10.7268 9.69331C10.9668 9.83331 11.0468 10.14 10.9002 10.38Z"
                                fill="#D0D5DD" />
                        </svg>

                        <p><?= !empty($metting) ? $metting->hours : '01:30 AM - 02:00 AM' ?></p>
                    </div>
                </div>
                <div class="flex justify-between px-3 pt-2 pb-3">
                    <div>
                        <img src="{{ '/assets/img/join-meet-icone.svg' }}" alt="">
                    </div>
                    <div
                        class="bg-[#795FFC] w-25 h-7 md:w-30 md:h-10 rounded-3xl text-white flex items-center justify-center cursor-pointer">
                        Join Meet
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-gray-100 border border-gray-300 rounded-xl my-2 text-sm md:text-[17px]">
                <div class="flex justify-between px-3 pb-1 pt-3">
                    <div class="flex gap-2">
                        <img src="{{ 'build/assets/img/meeting-icone.svg' }}" alt="">
                        <h3 class="font-bold"><?= !empty($metting) ? $metting->title : 'Townhall Meeting' ?></h3>
                    </div>
                    <div class="flex gap-2">
                        <img src="{{ '/assets/img/hours-icone.svg' }}" alt="">
                        <p><?= !empty($metting) ? $metting->hours : '01:30 AM - 02:00 AM' ?></p>
                    </div>
                </div>
                <div class="flex justify-between px-3 pt-2 pb-3">
                    <div>
                        <img src="{{ '/assets/img/join-meet-icone.svg' }}" alt="">
                    </div>
                    <div
                        class="bg-[#795FFC] w-25 h-7 md:w-30 md:h-10 rounded-3xl text-white flex items-center justify-center cursor-pointer">
                        Join Meet
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 pb-3 mt-5">
            <div>
                <h2 class="font-bold">Today Task <?= isset($task) ? count($task) : '2' ?></h2>
                <p>The task assigned to you for the day</p>
            </div>

            <!-- Si aucun enregistrement -->
            <?php if(isset($task)): ?>
            <div class="mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
                <div>
                    <img src="{{ '/assets/img/task-empty.svg' }}" alt="Task Empty">
                </div>
                <div>
                    <h3 class="font-bold">No Tasked Assigned</h3>
                    <p>
                        it looks like you don't have any tasks assigned to you right now.<br>
                        Don't worry this space will be updated as new tasks become available.
                    </p>
                </div>
            </div>
            <?php endif ?>

            <!-- S'il ya enregistrement -->
            <div class="flex flex-col bg-gray-100 border border-gray-300 rounded-xl my-2 text-sm md:text-[17px]">
                <div class="flex flex-col px-3 pb-1 pt-3">

                    <div class="flex gap-2">
                        <img src="{{ '/assets/img/task-home-icone.svg' }}" alt="">
                        <h3 class="font-bold"><?= !empty($task) ? $task->title : 'Wiring dashboard analytics' ?></h3>
                    </div>

                    <div class="py-4">
                        <div
                            class="bg-gray-200 w-33 h-8 rounded-3xl flex gap-1 items-center justify-center cursor-pointer">
                            <div>
                                <img src="{{ '/assets/img/hours-icone.svg' }}" alt="">
                            </div>
                            <div>
                                <?= !empty($task) ? $task->statut : 'In Progress' ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="w-full my-2 h-3 rounded-2xl bg-gray-200">
                            <div style="width:<?= isset($task) ? $task->progress . '%' : '70%' ?>;"
                                class="relative my-2 h-3 rounded-2xl bg-[#795FFC]"></div>
                        </div>
                    </div>

                    <div class="flex justify-between ps-3 pt-2 pb-3">
                        <div>
                            <img src="{{ '/assets/img/join-meet-icone.svg' }}>" alt="">
                        </div>
                        <div class="flex justify-between gap-4">
                            <div
                                class="bg-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer">
                                <img src="{{ '/assets/img/calendar-icone.svg' }}" alt="">
                                <span><?= isset($task) ? $task->date : '27 April' ?></span>
                            </div>
                            <div
                                class="bg-white gap-2 w-13 md:w-20 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer">
                                <img src="{{ '/assets/img/message-gray-icone.svg' }}" alt="">
                                <span><?= isset($task) ? count($task->message) : '2' ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app-layout>
