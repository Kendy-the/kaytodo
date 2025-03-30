@forelse ($objects as $object)
    <div data-accordion="collapse">
        <div class="flex flex-col  h-auto  my-2 text-sm md:text-[17px]">
            <div class="flex flex-col px-3 pt-3 bg-gray-100 rounded-xl border border-gray-300">
                {{-- Task - View --}}
                @php $objectId = $parentId->getId() @endphp
                   
                <div id="accordion-collapse-heading-{{$objectId}}"
                    style="background-color: #f3f4f6; color:#444" class="flex justify-between cursor-pointer"
                    data-accordion-target="#accordion-collapse-body-{{$objectId}}"  
                    @if(request()->path() == 'task/'.$object->id)
                        aria-expanded="true"
                    @endif
                    aria-controls="accordion-collapse-body-{{$objectId}}">

                    <div class="flex gap-2 pb-2 w-full">
                        <img src="{{ '/assets/img/task-home-icone.svg' }}" alt="">
                        <h3 class="font-bold">{{ $object->name }}
                        </h3>
                    </div>
                    <div
                        class="bg-white mb-2 md:gap-2 w-30 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center">
                        <img src="{{ '/assets/img/calendar-icone.svg' }}" alt="">
                        <span>{{ $object->created_at->format('d/m/y') }}</span>
                    </div>
                </div>

                <div id="accordion-collapse-body-{{$objectId}}"
                    aria-labelledby="accordion-collapse-heading-{{$objectId}}" class="hidden">
                    <div class="py-4 flex gap-3">
                        <div
                            class="bg-gray-200 w-33 h-8 rounded-3xl flex gap-1 items-center justify-center cursor-pointer">
                            <div>
                                <img src="{{ '/assets/img/hours-icone.svg' }}" alt="">
                            </div>
                            <div>
                                {{ $object->getStatut() }}
                            </div>
                        </div>
                        
                        @if(!empty($object->getCategory()))
                            <div
                                class="bg-gray-200 w-33 h-8 rounded-3xl flex gap-1 items-center justify-center cursor-pointer">
                                <div>
                                    <img src="{{ '/assets/img/grid-icone.svg' }}" alt="">
                                </div>
                                <div>
                                    {{ $object->getCategory() }}
                                </div>
                            </div>
                        @endif

                        @if(!empty($object->getProject()))
                            <div
                                class="bg-gray-200 w-33 h-8 rounded-3xl flex gap-1 items-center justify-center cursor-pointer">
                                <div>
                                    <img src="{{ '/assets/img/category-icone.svg' }}" alt="">
                                </div>
                                <div>
                                    {{ $object->getProject() }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div>
                        <div class="w-full my-2 h-3 rounded-2xl bg-gray-200">
                            <div style="width:{{ isset($object) ? $object->getProgression() . '%' : '0%' }};"
                                @class(["relative my-2 h-3 rounded-2xl",
                                    "bg-orange-500" => ($object->getProgression() < 50),
                                    "bg-[#795FFC]" => ($object->getProgression() < 70),
                                    "bg-green-500" => ($object->getProgression() <= 100)
                                ])></div>
                        </div>
                    </div>

                    {{-- meetting
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
                    </div> --}}

                    <div class="flex justify-between ps-3 pt-4 pb-3 border-t border-gray-300 mt-2 gap-2 md:gap-0">

                        @if($object->statut != env("DONE"))
                            @php $editId = $parentId->getId(); @endphp

                            <div id="accordion-collapse-heading-{{ $editId }}"
                                data-accordion-target="#accordion-collapse-body-{{ $editId }}"
                                aria-controls="accordion-collapse-body-{{ $editId }}"
                                class="bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                                <i class="bx bx-pencil"></i>
                                <span>Edit</span>
                            </div>
                        @endif

                        <div class="flex justify-between gap-2 md:gap-4">
                        
                            @if($object->statut != env("DONE"))
                                @php $endId = $parentId->getId(); @endphp

                                <div id="accordion-collapse-heading-{{ $endId }}"
                                    data-accordion-target="#accordion-collapse-body-{{ $endId }}"
                                    aria-controls="accordion-collapse-body-{{ $endId }}"
                                    class="bg-white hover:bg-[#795FFC] hover:text-white gap-2 w-23 md:w-30 h-7 md:h-10 rounded-3xl flex items-center justify-center cursor-pointer focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-500">
                                    <i class="bx bx-check-square"></i>
                                    <span>End</span>
                                </div>
                            @endif

                            @php $deleteId = $parentId->getId(); @endphp

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


                @if($object->statut != env("DONE"))
                    {{-- Task - edit --}}
                    <div id="accordion-collapse-body-{{ $editId }}"
                        aria-labelledby="accordion-collapse-heading-{{ $editId }}" class="hidden">
                        @include('shared.task.form', [
                            'post' => $object,
                            'itemId' => $editId,
                            'position' => 't',
                            'choice' => 'edit',
                        ])
                    </div>
                @endif

                {{-- Task - delete --}}
                <div id="accordion-collapse-body-{{ $deleteId }}"
                    aria-labelledby="accordion-collapse-heading-{{ $deleteId }}" class="hidden">
                    @include('task.delete.index', [
                        'post' => $object,
                        'itemId' => $deleteId,
                    ])
                </div>

                @if($object->statut != env("DONE"))
                    {{-- Task - end --}}
                    <div id="accordion-collapse-body-{{ $endId }}"
                        aria-labelledby="accordion-collapse-heading-{{ $endId }}" class="hidden">
                        @include('task.end.index', [
                            'post' => $object,
                            'itemId' => $endId,
                        ])
                    </div>
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="mt-5 pb-3 flex flex-col gap-3 justify-center items-center text-center">
        <div>
            <img src="{{ '/assets/img/task-empty.svg' }}" alt="Task Empty">
        </div>
        <div>
            <h3 class="font-bold">No Tasks {{ $position }}</h3>
            <p>
                it looks like you don't have any tasks {{ $position }} now.<br>
                Don't worry this space will be updated as new tasks {{ $position }} become available.
            </p>
        </div>
    </div>
@endforelse