{{-- <div class="flex flex-col bg-gray-100 border border-gray-300 rounded-xl my-2 text-sm md:text-[17px]">
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
                </div> --}}

{{-- <div class="bg-white rounded-xl p-5 pb-3 mt-5">
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
        </div> --}}