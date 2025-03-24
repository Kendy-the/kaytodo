<x-layout.app-layout>

    @section('title', 'My Project')

<div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

    {{-- Project Banner --}}
    @include('shared.banner',[
        'title' => 'Challenges awaiting', 
        'content' => "Let's tackle your to do list",
        'imgPath' => '/assets/img/task-banner.svg'
    ])

    {{-- New Project Button  --}}
    <div data-accordion="collapse">
        @php $newObjectTopId = mt_rand(($postUp->id + 30) , 200); $newObjectTopId+= $postUp->id @endphp
        <div id="accordion-collapse-heading-{{$newObjectTopId}}" 
            data-accordion-target="#accordion-collapse-body-{{$newObjectTopId}}"       
            aria-controls="accordion-collapse-body-{{$newObjectTopId}}"
            title="Cliquez"
            style="background-color: white" 
         class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
            <x-button.primary :action="'none'" :type="'button'" :name="'new'">
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
    
    {{-- Summary --}}
    <x-tacapro.summary>
        <x-slot:title>Summary of your work</x-slot:title>
        <x-slot:sub-title>your current project progress</x-slot:sub-title>
        <x-slot:todo>{{ isset($todo)? $todo : '5' }}</x-slot:todo>
        <x-slot:progress>{{ isset($progress)? $progress : '2' }}</x-slot:progress>
        <x-slot:done>{{ isset($done)? $done : '10' }}</x-slot:done>
    </x-tacapro.summary>

    {{-- Stats --}}
    <x-tacapro.stats :object="'project'">
        <x-slot:sum>{{ isset($project) ? count($project->done) : '2' }}</x-slot:sum>
        <x-slot:width>{{ isset($project) ? $project->progress . "%" : "70%" }}</x-slot:width>
    </x-tacapro.stats>

    {{-- Nav --}}
    <x-tacapro.nav :name="'project'">
        <x-slot:first>All</x-slot:first>
        <x-slot:first-value>{{ isset($project) ? count($project) : '4' }}</x-slot:first-value>

        <x-slot:second>Recently Add</x-slot:second>
        <x-slot:second-value>{{ isset($project) ? count($project->progress) : '7' }}</x-slot:second-value>

        <x-slot:third>Pin</x-slot:third>
        <x-slot:third-value>{{ isset($project) ? count($project->finish) : '2' }}</x-slot:third-value>
    </x-tacapro.nav>

    {{-- Object --}}
    <x-tacapro.object_ 
    :object="$postUp" 
    :tasks="$tasks" 
    :$post :$postUp 
    :name="'project'">
    </x-tacapro.object_>

    {{-- New project  --}}
    <div data-accordion="collapse">
        @php $newObjectButtomId = mt_rand(($postUp->id + 10) , 150); $newObjectButtomId+= $postUp->id @endphp
        <div id="accordion-collapse-body-{{$newObjectButtomId}}" aria-labelledby="accordion-collapse-heading-{{$newObjectButtomId}}" class="hidden">
            @include('shared.project.form',[
                'post' => $post,
                'position' => 'b',
                'itemId' => $newObjectButtomId,
                'choice' => 'create'
            ])
        </div>
    
        {{-- New Project Button  --}}
        <div id="accordion-collapse-heading-{{$newObjectButtomId}}" 
        data-accordion-target="#accordion-collapse-body-{{$newObjectButtomId}}"       
        aria-controls="accordion-collapse-body-{{$newObjectButtomId}}" 
        title="Cliquez"
        style="background-color: white;"  
        class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
            <x-button.primary :action="'none'" :type="'button'" :name="'new'">
                New Project
            </x-button.primary>
        </div>
    </div>

</div>
</x-layout.app-layout>