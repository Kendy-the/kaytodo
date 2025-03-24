<div class="flex flex-col bg-gray-100 border border-gray-300 h-auto rounded-xl my-2 text-sm md:text-[17px]">

    {{-- Task  --}}
    <div class="flex flex-col px-3 pb-1 pt-3">
        {{-- Task - View --}}
        <div class="object-btn flex justify-between cursor-pointer">
            <div class="flex gap-2 pb-2 w-full">
                <img src="{{"/assets/img/task-home-icone.svg"}}" alt="">
                <h3 class="font-bold"><?= !empty($task) ? $task->title : "Wiring dashboard analytics" ?></h3>
            </div>
            <div
                class="bg-white mb-2 md:gap-2 w-30 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center">
                <img src="{{"/assets/img/calendar-icone.svg"}}" alt="">
                <span><?= isset($task) ? $task->date : "27 April" ?></span>
            </div>
        </div>

        <div class="hidden object-view">
            <div class="py-4">
                <div class="bg-gray-200 w-33 h-8 rounded-3xl flex gap-1 items-center justify-center cursor-pointer">
                    <div>
                        <img src="{{"/assets/img/hours-icone.svg"}}" alt="">
                    </div>
                    <div>
                        <?= !empty($task) ? $task->statut : "In Progress" ?>
                    </div>
                </div>
            </div>

            <div>
                <div class="w-full my-2 h-3 rounded-2xl bg-gray-200">
                    <div style="width:<?= isset($task) ? $task->progress . "%" : "70%" ?>;"
                        class="relative my-2 h-3 rounded-2xl bg-[#795FFC]"></div>
                </div>
            </div>

            <div class="flex justify-between ps-3 pt-2 pb-3">
                <div>
                    <img src="{{"/assets/img/join-meet-icone.svg"}}" alt="">
                </div>
                <div class="flex justify-between gap-4">
                    <div
                        class="bg-white gap-2 w-13 md:w-20 h-7 md:h-10 rounded-3xl flex items-center justify-center">
                        <img src="{{ "/assets/img/message-gray-icone.svg"}}" alt="">
                        <span><?= isset($task) ? count($task->message) : "2" ?></span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between ps-3 pt-4 pb-3 border-t border-gray-300 mt-2 gap-2 md:gap-0">
                <div 
                    class="edit-btn object-btn bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                    <i class="bx bx-pencil"></i>
                    <span>Edit</span>
                </div>
                <div class="flex justify-between gap-2 md:gap-4">
                    <div
                        class="end-btn object-btn bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                        <i class="bx bx-check-square"></i>
                        <span>End</span>
                    </div>
                    <div 
                        class="delete-btn object-btn bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                        <i class="bx bx-task-x text-red-500 hover:text-white"></i>
                        <span>Delete</span>
                    </div>
                </div>
            </div>
        </div>

        
        {{-- Task - edit --}}
        <div class="hidden edit-view">
            @include('shared.task.form', [
                'post' => $postUp,
                'position' => 't',
                'choice' => 'edit'
            ])
        </div>

        {{-- Task - delete --}}
        <div class="hidden delete-view">
            @include('task.delete.index', [
                'post' => $post
            ])
        </div>

        {{-- Task - end --}}
        <div class="hidden end-view">
            @include('task.end.index', [
                'post' => $post
            ])
        </div>
    </div>
</div>