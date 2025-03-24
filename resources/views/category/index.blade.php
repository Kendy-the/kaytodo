<x-layout.app-layout>

    @section('title', 'Category')

<div class="container pt-3 pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">

    {{-- Project Banner --}}
    @include('shared.banner',[
        'title' => 'Challenges awaiting', 
        'content' => "Let's tackle your to do list - Category",
        'imgPath' => '/assets/img/task-banner.svg'
    ])
 
    @php
        $newObjectTopId = 1;
        foreach($posts as $pos)
        {
            if(isset($pos) && !empty($pos))
            {
                $newObjectTopId = mt_rand($pos->id + 100, ($pos->id +10000));
                $newObjectTopId += $pos->id;
            }else{
                $newObjectTopId = 1;
            }
            break;
        }
    @endphp

    {{-- New Project Button  --}}
    <div data-accordion="collapse">
        <div id="accordion-collapse-heading-{{$newObjectTopId}}" 
            data-accordion-target="#accordion-collapse-body-{{$newObjectTopId}}"       
            aria-controls="accordion-collapse-body-{{$newObjectTopId}}"
            title="Cliquez"
            style="background-color: white" 
         class="rounded-xl p-4 flex justify-center items-center text-center mt-4">
            <x-button.primary :action="'none'" :type="'button'" :name="'new'">
                New Category
            </x-button.primary>
        </div>
    
        {{-- New project  --}}
       
        <div id="accordion-collapse-body-{{$newObjectTopId}}" aria-labelledby="accordion-collapse-heading-{{$newObjectTopId}}" class="hidden">
            @include('shared.category.form',[
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
        <x-slot:sub-title>your current task progress</x-slot:sub-title>
        <x-slot:todo>{{ isset($todo)? $todo : 0 }}</x-slot:todo>
        <x-slot:progress>{{ isset($progress)? $progress : 0 }}</x-slot:progress>
        <x-slot:done>{{ isset($done)? $done : 0 }}</x-slot:done>
    </x-tacapro.summary>

    {{-- Stats --}}
    <x-tacapro.stats :object="'category'">
        <x-slot:sum>{{ isset($post->tasks->done) ? count($post->tasks->done) : 0 }}</x-slot:sum>
        <x-slot:width>{{ isset($post->tasks->progress) ? count($post->tasks->progress) . "%" : "0%" }}</x-slot:width>
    </x-tacapro.stats>

    {{-- Nav --}}
    <x-tacapro.nav :name="'category'">
        <x-slot:first>All</x-slot:first>
        <x-slot:first-value>{{ isset($posts) ? $posts->count() : 0 }}</x-slot:first-value>

        <x-slot:second>Recently Add</x-slot:second>
        <x-slot:second-value>{{ isset($category) ? count($category->recent) : 0 }}</x-slot:second-value>

        <x-slot:third>Pin</x-slot:third>
        <x-slot:third-value>{{ isset($category) ? count($category->pin) : 0 }}</x-slot:third-value>
    </x-tacapro.nav>

    {{-- Object --}}
    <x-tacapro.object_ 
    :objects="$posts" 
    :$post :$post 
    :name="'category'">
    </x-tacapro.object_>

    {{-- New project  --}}
    <div data-accordion="collapse">
        @php
            $newObjectButtomId = 2;
            foreach($posts as $post)
            {
                if(isset($post) && !empty($post))
                {
                    $newObjectButtomId = mt_rand($post->id + 200, ($post->id +10000));
                    $newObjectButtomId += $post->id;
                }else{
                    $newObjectButtomId = 2;
                }
                break;
            }
        @endphp

        <div id="accordion-collapse-body-{{$newObjectButtomId}}" aria-labelledby="accordion-collapse-heading-{{$newObjectButtomId}}" class="hidden">
            @include('shared.category.form',[
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
                New Category
            </x-button.primary>
        </div>
    </div>

</div>
</x-layout.app-layout>