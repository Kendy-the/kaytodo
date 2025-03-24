<div class="mb-5 md:mb-20 lg:mb-0">
    <div class="shadow-3xl rounded-2xl bg-white w-auto md:w-[500px] md:h-auto">
        <div>
            <div class="px-10 py-5 h-min flex flex-col gap-5">
                <div class="mt-5 text-center">
                    <h1 class="my-2 text-2xl font-bold">{{ $title }}</h1>
                    <div>{{ $content }}</div>
                </div>
                <div>
                    <x-button.primary :action="$buttonAction" :type="'none'" :name="'none'"> {{ $buttonName }} </x-button.primary>

                    @if (isset($buttonAction1))
                        <x-button.primary :action="$buttonAction1" :type="'none'" :name="'none'">{{ $buttonName1 }}</x-button.primary>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>