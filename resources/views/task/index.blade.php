<x-layout.app-layout>

    @section('title', 'My Task')

    <div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

        {{-- Task Banner --}}
        @include('shared.banner', [
            'title' => 'Challenges awaiting',
            'content' => "Let's tackle your to do list",
            'imgPath' => '/assets/img/task-banner.svg',
        ])

        @php $newObjectTopId = $parentId->getId() @endphp

        <div data-accordion="collapse">
            {{-- New task Button  --}}
            <div data-has-form={{ $newObjectTopId }} id="accordion-collapse-heading-{{ $newObjectTopId }}"
                data-accordion-target="#accordion-collapse-body-{{ $newObjectTopId }}"
                aria-controls="accordion-collapse-body-{{ $newObjectTopId }}" title="Cliquez"
                style="background-color: white" class="rounded-xl p-4 flex justify-center items-center text-center mt-4">

                <x-button.primary :action="'none'" :type="'button'" :name="'new'" :extend="['form' =>['verifyError' => true]]">
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
    {{-- <x-tacapro.summary>
        <x-slot:title>Summary of your work</x-slot:title>
        <x-slot:sub-title>your current task progress</x-slot:sub-title>
        <x-slot:todo>{{ isset($tasks) ? $posts->count() : 0 }}</x-slot:todo>
        <x-slot:progress>{{ isset($tasks) ? count($tasks['progress']) : 0 }}</x-slot:progress>
        <x-slot:done>{{ isset($tasks) ? count($tasks['done']) : 0 }}</x-slot:done>
    </x-tacapro.summary> --}}

    {{-- Stats --}}
    @php $percent = $tasks['donePercent'] @endphp
    <x-tacapro.stats :object="$percent">
        <x-slot:sum>{{ isset($tasks) ? count($tasks['done']) : 0 }}</x-slot:sum>
        <x-slot:width>{{ isset($tasks) ? $percent . "%" : "0%" }}</x-slot:width>
    </x-tacapro.stats>

        {{-- Nav --}}
        <x-tacapro.nav :name="'task'">
            <x-slot:first>All</x-slot:first>
            <x-slot:first-value>{{ isset($posts) ? $posts->count() : 0 }}</x-slot:first-value>

            <x-slot:second>In Progress</x-slot:second>
            <x-slot:second-value>{{ isset($tasks) ? count($tasks['progress']) : 0 }}</x-slot:second-value>

            <x-slot:third>Pending</x-slot:third>
            <x-slot:third-value>{{ isset($tasks) ? count($tasks['pending']) : 0 }}</x-slot:third-value>

            <x-slot:fourth>Finish</x-slot:fourth>
            <x-slot:fourth-value>{{ isset($tasks) ? count($tasks['done']) : 0 }}</x-slot:fourth-value>
        </x-tacapro.nav>

        {{-- Object --}}
        @if(request()->path() == 'task/in-progress')
            @include('shared.task.object_',[
                'objects' => $tasks['progress'],
                'post' => $post,
                'parentId' => $parentId,
                'position' => "in progress",
            ])
        @elseif(request()->path() == 'task/pending')
            @include('shared.task.object_',[
                'objects' => $tasks['pending'],
                'post' => $post,
                'parentId' => $parentId,
                'position' => "pending",
            ])
        @elseif(request()->path() == 'task/finish')
            @include('shared.task.object_',[
                'objects' => $tasks['done'],
                'post' => $post,
                'parentId' => $parentId,
                'position' => "done",
            ])
        @else
            @include('shared.task.object_',[
                'objects' => $posts,
                'post' => $post,
                'parentId' => $parentId,
                'position' => " ",
            ])
        @endif

        {{-- New task --}}
        <div data-accordion="collapse">
            @php $newObjectButtomId = $parentId->getId() @endphp

            <div id="accordion-collapse-body-{{ $newObjectButtomId }}"
                aria-labelledby="accordion-collapse-heading-{{ $newObjectButtomId }}" class="hidden">
                @include('shared.task.form', [
                    'post' => $post,
                    'position' => 'b',
                    'itemId' => $newObjectButtomId,
                    'choice' => 'create',
                ])
            </div>

            <div id="accordion-collapse-heading-{{ $newObjectButtomId }}" data-has-form={{ $newObjectButtomId }}
                data-accordion-target="#accordion-collapse-body-{{ $newObjectButtomId }}"
                aria-controls="accordion-collapse-body-{{ $newObjectButtomId }}" title="Cliquez"
                style="background-color: white;"
                class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
                <x-button.primary :action="'none'" :type="'button'" :name="'new'" :extend="['form' =>['verifyError' => true]]">
                    New Task
                </x-button.primary>
            </div>
        </div>
    </div>
</x-layout.app-layout>
