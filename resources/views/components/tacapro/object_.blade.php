{{-- Si aucun enregistrement --}}
@if ($object == 'none')
    <div class="mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
        <div>
            <img src="{{ '/assets/img/task-empty.svg' }}" alt="Task Empty">
        </div>
        <div>
            <h3 class="font-bold">No {{ $name }} Assigned</h3>
            <p>
                it looks like you don't have any {{ $name }} now.<br>
                Don't worry this space will be updated as new {{ $name }}s become available.
            </p>
        </div>
    </div>
@else
    {{-- S'il ya enregistrement - object - affichage --}}
    <div data-accordion="collapse" class="flex flex-col my-2 text-sm md:text-[17px]">

        {{-- object --}}
        <div class="my-1 flex flex-col p-3 bg-gray-100 border border-gray-300 rounded-xl">

            {{-- object - View --}}
            <div id="accordion-collapse-heading-{{$object->id}}" 
                data-accordion-target="#accordion-collapse-body-{{$object->id}}"       
                aria-expanded="true"
                aria-controls="accordion-collapse-body-{{$object->id}}" class="flex justify-between cursor-pointer" title="Cliquez"
                style="background-color: #f3f4f6; color:#444" >
                <div class="flex gap-2 pb-2 w-full">
                    <img src="{{ '/assets/img/task-home-icone.svg' }}" alt="">
                    <h3 class="font-bold">{{ $object->name }}
                    </h3>
                </div>
                <div class="flex gap-2 cursor-auto ">
                    <div
                        class="bg-violet-500 mb-2 md:gap-2 w-15 md:w-20 h-7 md:h-10 rounded-3xl flex items-center justify-center text-white">
                        <img src="{{ '/assets/img/task-icone.svg' }}" class="w-4" alt="">
                        <span>{{ count($object->tasks) }}</span>
                    </div>
                    <div
                        class="bg-white mb-2 md:gap-2 w-30 md:w-30 h-7 md:h-10 rounded-3xl items-center justify-center hidden md:flex">
                        <img src="{{ '/assets/img/calendar-icone.svg' }}" alt="">
                        <span>{{ $object->created_at }}</span>
                    </div>
                </div>
            </div>
                
            <div id="accordion-collapse-body-{{$object->id}}" aria-labelledby="accordion-collapse-heading-{{$object->id}}" class="hidden cursor-auto">

                <div class="py-4">
                    <div class="bg-gray-200 w-full p-2 rounded-3xl flex gap-1 items-center justify-center">
                        <div>
                            <img src="{{ '/assets/img/grid-icone.svg' }}" alt="">
                        </div>
                        <div>
                            {{ $object->description }}
                        </div>
                        <div class="cursor-pointer flex mb-2 ms-2 gap-2 items-center justify-center">

                            {{-- id aleatoire pour accordeon --}}
                            @php $editId = mt_rand($object->id, 100); $editId+= $object->id @endphp
                            
                            <div id="accordion-collapse-heading-{{ $editId }}" data-accordion-target="#accordion-collapse-body-{{ $editId }}"
                            aria-controls="accordion-collapse-body-{{ $editId }}"
                            class="flex items-center justify-center">
                                <i class="bx bx-pencil hover:text-violet-700 mx-1" title="Edit"></i>
                            </div>

                            @if ($name == 'project')

                                {{-- id aleatoire pour accordeon --}}
                                @php $endId = mt_rand($object->id, 100); $endId+= ($object->id + 3) @endphp

                                <div id="accordion-collapse-heading-{{ $endId }}" data-accordion-target="#accordion-collapse-body-{{ $endId }}"
                                aria-controls="accordion-collapse-body-{{ $endId }}" class="flex items-center justify-center">
                                    <i class="bx bx-task hover:text-violet-700 mx-1" title="End"></i>
                                </div>
                            @endif

                            {{-- id aleatoire pour accordeon --}}
                            @php $deleteId = mt_rand($object->id, 100); $deleteId+= ($object->id + 7) @endphp
                            
                            <div id="accordion-collapse-heading-{{ $deleteId }}" data-accordion-target="#accordion-collapse-body-{{ $deleteId }}"
                            aria-controls="accordion-collapse-body-{{ $deleteId }}"
                             class="flex items-center justify-center">
                                <i class="bx bx-task-x hover:text-violet-700 text-red-500 mx-1" title="Delete"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- id aleatoire pour accordeon --}}
                @php $newMedTaskId = mt_rand($object->id, 100); $newMedTaskId+= ($object->id + 1) @endphp

                <div class="flex flex-col ps-3 pt-4 pb-3 border-t border-gray-300 mt-2 gap-1">
                    <div class="bg-gray-200 gap-2 w-full p-2 rounded-3xl flex items-center justify-center">
                        My Tasks
                        <div id="accordion-collapse-heading-{{ $newMedTaskId }}" data-accordion-target="#accordion-collapse-body-{{ $newMedTaskId }}"
                        aria-controls="accordion-collapse-body-{{ $newMedTaskId }}">
                        <i 
                        class='bx bxs-plus-circle hover:text-violet-700 cursor-pointer'></i>
                        </div>
                    
                    </div>

                    @if ($tasks == 'none')
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
                        <div class="tg-task flex w-full flex-wrap justify-around pt-4">
                            {{-- Task --}}
                            @foreach ($tasks as $task)
                                <a href="/task/"
                                    class=" bg-gray-50 flex flex-col justify-center rounded my-2 p-3">
                                    <div class="flex justify-center items-center gap-2 pb-2">
                                        <img src="{{ '/assets/img/task-home-icone.svg' }}" class="w-5"
                                            alt="">
                                        <h3 class="font-bold">
                                            {{ !empty($task) ? $task->name : 'My Task analytics' }}
                                        </h3>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <div>
                                            {{ !empty($task) ? substr($task->description, 0, 25) . '...' : 'Some activity for sunday...' }}
                                        </div>
                                    </div>
                                </a>  
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- New Object  --}}
            <div id="accordion-collapse-body-{{$newMedTaskId}}" aria-labelledby="accordion-collapse-heading-{{$newMedTaskId}}" class="hidden">
                @include('shared.task.form', [
                    'post' => $post,
                    'name' => $name,
                    'itemId' => $newMedTaskId,
                    'position' => 'm',
                    'choice' => 'create',
                ])
            </div>
            
            {{-- object - edit --}}
            <div id="accordion-collapse-body-{{$editId}}" aria-labelledby="accordion-collapse-heading-{{$editId}}" class="hidden">
                @include('shared.' . $name . '.form', [
                    'post' => $postUp,
                    'itemId' => $editId,
                    'position' => 't',
                    'choice' => 'edit',
                ])
            </div>

            {{-- object - end --}}
            @if ($name == 'project')
                <div id="accordion-collapse-body-{{$endId}}" aria-labelledby="accordion-collapse-heading-{{$endId}}" class="hidden">
                    @include('project.end.index', [
                        'post' => $post,
                        'itemId' => $endId
                    ])
                </div>
            @endif

            {{-- object - delete --}}
            <div id="accordion-collapse-body-{{$deleteId}}" aria-labelledby="accordion-collapse-heading-{{$deleteId}}" class="hidden">
                @include($name . '.delete.index', [
                    'post' => $post,
                    'itemId' => $deleteId,
                ])
            </div>

        </div>
        
    </div>
@endif
