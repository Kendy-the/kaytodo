<x-layout.app-layout>

    @section('title', 'My Task')

    <div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

        {{-- Task Banner --}}
        @include('shared.banner', [
            'title' => 'Challenges awaiting',
            'content' => "Let's tackle your to do list",
            'imgPath' => '/assets/img/task-banner.svg',
        ])

        @php
            if(isset($postUp) && !empty($postUp))
            {
                $newObjectTopId = mt_rand($postUp->id + 100, ($postUp->id +10000));
                $newObjectTopId += $postUp->id;
            }else{
                $newObjectTopId = 1;
            }
        @endphp

        <div data-accordion="collapse">
            {{-- New task Button  --}}
            <div id="accordion-collapse-heading-{{ $newObjectTopId }}"
                data-accordion-target="#accordion-collapse-body-{{ $newObjectTopId }}"
                aria-controls="accordion-collapse-body-{{ $newObjectTopId }}" title="Cliquez"
                style="background-color: white" class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
                <x-button.primary :action="'none'" :type="'button'" :name="'new'">
                    New Task
                </x-button.primary>
            </div>

            {{-- New task  --}}
            <div id="accordion-collapse-body-{{ $newObjectTopId }}"
                aria-labelledby="accordion-collapse-heading-{{ $newObjectTopId }}" class="hidden">
                @include('shared.task.form', [
                    'post' => $post,
                    'position' => 't',
                    'itemId' => $newObjectTopId,
                    'choice' => 'create',
                ])
            </div>
        </div>

        {{-- Summary --}}
        <x-tacapro.summary>
            <x-slot:title>Summary of your work</x-slot:title>
            <x-slot:sub-title>your current task progress</x-slot:sub-title>
            <x-slot:todo>{{ isset($todo) ? $todo : 0 }}</x-slot:todo>
            <x-slot:progress>{{ isset($progress) ? $progress : 0 }}</x-slot:progress>
            <x-slot:done>{{ isset($done) ? $done : 0 }}</x-slot:done>
        </x-tacapro.summary>

        {{-- Stats --}}
        <x-tacapro.stats :object="'task'">
            <x-slot:sum>{{ isset($task) ? count($task->done) : 0 }}</x-slot:sum>
            <x-slot:width>{{ isset($task) ? $task->progress . '%' : '0%' }}</x-slot:width>
        </x-tacapro.stats>

        {{-- Nav --}}
        <x-tacapro.nav :name="'task'">
            <x-slot:first>All</x-slot:first>
            <x-slot:first-value>{{ isset($task) ? count($task) : 0 }}</x-slot:first-value>

            <x-slot:second>In Progress</x-slot:second>
            <x-slot:second-value>{{ isset($task) ? count($task->progress) : 0 }}</x-slot:second-value>

            <x-slot:third>Finish</x-slot:third>
            <x-slot:third-value>{{ isset($task) ? count($task->finish) : 0 }}</x-slot:third-value>
        </x-tacapro.nav>

        {{-- Object - Si aucun enregistrement --}}
        @if (!isset($postUp) || empty($postUp))
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
        @else
            {{-- S'il ya enregistrement - task affichage --}}
            <div data-accordion="collapse">
                <div class="flex flex-col  h-auto  my-2 text-sm md:text-[17px]">
                    <div class="flex flex-col px-3 pt-3 bg-gray-100 rounded-xl border border-gray-300">
                        {{-- Task - View --}}
                        <div id="accordion-collapse-heading-{{ $postUp->id }}"
                            style="background-color: #f3f4f6; color:#444" class="flex justify-between cursor-pointer"
                            data-accordion-target="#accordion-collapse-body-{{ $postUp->id }}" aria-expanded="true"
                            aria-controls="accordion-collapse-body-{{ $postUp->id }}">
                            <div class="flex gap-2 pb-2 w-full">
                                <img src="{{ '/assets/img/task-home-icone.svg' }}" alt="">
                                <h3 class="font-bold"><?= !empty($task) ? $task->title : 'Wiring dashboard analytics' ?>
                                </h3>
                            </div>
                            <div
                                class="bg-white mb-2 md:gap-2 w-30 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center">
                                <img src="{{ '/assets/img/calendar-icone.svg' }}" alt="">
                                <span><?= isset($task) ? $task->date : '27 April' ?></span>
                            </div>
                        </div>

                        <div id="accordion-collapse-body-{{ $postUp->id }}"
                            aria-labelledby="accordion-collapse-heading-{{ $postUp->id }}" class="hidden">
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
                                    <img src="{{ '/assets/img/join-meet-icone.svg' }}" alt="">
                                </div>
                                <div class="flex justify-between gap-4">
                                    <div
                                        class="bg-white gap-2 w-13 md:w-20 h-7 md:h-10 rounded-3xl flex items-center justify-center">
                                        <img src="{{ '/assets/img/message-gray-icone.svg' }}" alt="">
                                        <span><?= isset($task) ? count($task->message) : '2' ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between ps-3 pt-4 pb-3 border-t border-gray-300 mt-2 gap-2 md:gap-0">

                                @php
                                    $editId = mt_rand($postUp->id, ($postUp->id+1000));
                                    $editId += $postUp->id;
                                @endphp

                                <div id="accordion-collapse-heading-{{ $editId }}"
                                    data-accordion-target="#accordion-collapse-body-{{ $editId }}"
                                    aria-controls="accordion-collapse-body-{{ $editId }}"
                                    class="bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                                    <i class="bx bx-pencil"></i>
                                    <span>Edit</span>
                                </div>

                                <div class="flex justify-between gap-2 md:gap-4">
                                    @php
                                        $endId = mt_rand($postUp->id, ($postUp->id+1000));
                                        $endId += $postUp->id + 3;
                                    @endphp

                                    <div id="accordion-collapse-heading-{{ $endId }}"
                                        data-accordion-target="#accordion-collapse-body-{{ $endId }}"
                                        aria-controls="accordion-collapse-body-{{ $endId }}"
                                        class="bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                                        <i class="bx bx-check-square"></i>
                                        <span>End</span>
                                    </div>

                                    @php
                                        $deleteId = mt_rand($postUp->id, ($postUp->id+1000));
                                        $deleteId += $postUp->id + 7;
                                    @endphp

                                    <div id="accordion-collapse-heading-{{ $deleteId }}"
                                        data-accordion-target="#accordion-collapse-body-{{ $deleteId }}"
                                        aria-controls="accordion-collapse-body-{{ $deleteId }}"
                                        class="bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                                        <i class="bx bx-task-x text-red-500 hover:text-white"></i>
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Task - edit --}}
                        <div id="accordion-collapse-body-{{ $editId }}"
                            aria-labelledby="accordion-collapse-heading-{{ $editId }}" class="hidden">
                            @include('shared.task.form', [
                                'post' => $postUp,
                                'itemId' => $editId,
                                'position' => 't',
                                'choice' => 'edit',
                            ])
                        </div>

                        {{-- Task - delete --}}
                        <div id="accordion-collapse-body-{{ $deleteId }}"
                            aria-labelledby="accordion-collapse-heading-{{ $deleteId }}" class="hidden">
                            @include('task.delete.index', [
                                'post' => $post,
                                'itemId' => $deleteId,
                            ])
                        </div>

                        {{-- Task - end --}}
                        <div id="accordion-collapse-body-{{ $endId }}"
                            aria-labelledby="accordion-collapse-heading-{{ $endId }}" class="hidden">
                            @include('task.end.index', [
                                'post' => $post,
                                'itemId' => $endId,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- New task --}}
        <div data-accordion="collapse">
            @php
                if(isset($postUp) && !empty($postUp))
                {
                    $newObjectButtomId = mt_rand($postUp->id + 200, ($postUp->id +10000));
                    $newObjectButtomId += $postUp->id;
                }else{
                    $newObjectButtomId = 2;
                }
            @endphp

            <div id="accordion-collapse-body-{{ $newObjectButtomId }}"
                aria-labelledby="accordion-collapse-heading-{{ $newObjectButtomId }}" class="hidden">
                @include('shared.task.form', [
                    'post' => $post,
                    'position' => 'b',
                    'itemId' => $newObjectButtomId,
                    'choice' => 'create',
                ])
            </div>

            <div id="accordion-collapse-heading-{{ $newObjectButtomId }}"
                data-accordion-target="#accordion-collapse-body-{{ $newObjectButtomId }}"
                aria-controls="accordion-collapse-body-{{ $newObjectButtomId }}" title="Cliquez"
                style="background-color: white;"
                class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
                <x-button.primary :action="'none'" :type="'button'" :name="'new'">
                    New Task
                </x-button.primary>
            </div>
        </div>
    </div>
</x-layout.app-layout>
