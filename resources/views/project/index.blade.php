<x-layout.app-layout>

    @section('title', 'My Project')

<div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

    {{-- Project Banner --}}
    @include('shared.banner',[
        'title' => 'Challenges awaiting',
        'content' => "Let's tackle your to do list",
        'imgPath' => '/assets/img/task-banner.svg'
    ])

    @php $newObjectTopId = $parentId->getId() @endphp

    {{-- New Project Button  --}}
    <div data-accordion="collapse">
        <div data-has-form={{ $newObjectTopId }} id="accordion-collapse-heading-{{$newObjectTopId}}"
            data-accordion-target="#accordion-collapse-body-{{$newObjectTopId}}"
            aria-controls="accordion-collapse-body-{{$newObjectTopId}}"
            title="Cliquez"
            style="background-color: white"

            class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
            <x-button.primary :action="'none'" :type="'button'" :name="'new'" :extend="['form' =>['verifyError' => true]]">
                New Project
            </x-button.primary>
        </div>

        {{-- New project  --}}
        <div id="accordion-collapse-body-{{$newObjectTopId}}" aria-labelledby="accordion-collapse-heading-{{$newObjectTopId}}" class="hidden">
            @include('shared.project.form',[
                'post' => $post,
                'position' => 't',
                'itemId' => $newObjectTopId,
                'choice' => 'create'
            ])
        </div>
    </div>

    {{-- Stats --}}
    @php $percent = $projects['donePercent'] @endphp
    <x-tacapro.stats :object="$percent">
        <x-slot:name>projects</x-slot:name>
        <x-slot:sum>{{ isset($projects) ? count($projects['done']) : 0 }}</x-slot:sum>
        <x-slot:width>{{ isset($percent) ? $percent . "%" : "0%" }}</x-slot:width>
    </x-tacapro.stats>

    {{-- Nav --}}
    <x-tacapro.nav :name="'project'">
        <x-slot:first>All</x-slot:first>
        <x-slot:first-value>{{ isset($posts) ? $posts->count() : 0 }}</x-slot:first-value>

        <x-slot:second>Recently Add</x-slot:second>
        <x-slot:second-value>{{ isset($recents) ? count($recents) : 0 }}</x-slot:second-value>

        <x-slot:third>Pin</x-slot:third>
        <x-slot:third-value>{{ isset($pins) ? count($pins) : 0 }}</x-slot:third-value>
    </x-tacapro.nav>

    {{-- Object --}}
    @if(request()->path() == 'project/recently-add')
        @php $position = 'rencently' @endphp
        <x-tacapro.object_
        :objects="$recents"
        :$post :$parentId :$position :$contacts :$categories
        :name="'project'">
        </x-tacapro.object_>
    @elseif(request()->path() == 'project/pin')
    @php $position = 'pin' @endphp
        <x-tacapro.object_
        :objects="$pins"
        :$post :$parentId :$position :$contacts :$categories
        :name="'project'">
        </x-tacapro.object_>
    @else
    @php $position = ' ' @endphp
        <x-tacapro.object_
        :objects="$posts"
        :$post :$parentId :$position :$contacts :$categories
        :name="'project'">
        </x-tacapro.object_>
    @endif

    {{-- New project  --}}
    <div data-accordion="collapse">

        @php $newObjectButtomId = $parentId->getId() @endphp

        <div id="accordion-collapse-body-{{$newObjectButtomId}}" aria-labelledby="accordion-collapse-heading-{{$newObjectButtomId}}" class="hidden">
            @include('shared.project.form',[
                'post' => $post,
                'position' => 'b',
                'itemId' => $newObjectButtomId,
                'choice' => 'create'
            ])
        </div>

        {{-- New Project Button  --}}
        <div data-has-form={{ $newObjectButtomId }} id="accordion-collapse-heading-{{$newObjectButtomId}}"
        data-accordion-target="#accordion-collapse-body-{{$newObjectButtomId}}"
        aria-controls="accordion-collapse-body-{{$newObjectButtomId}}"
        title="Cliquez"
        style="background-color: white;"
        class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
            <x-button.primary :action="'none'" :type="'button'" :name="'new'" :extend="['form' =>['verifyError' => true]]">
                New Project
            </x-button.primary>
        </div>
    </div>

</div>
</x-layout.app-layout>
