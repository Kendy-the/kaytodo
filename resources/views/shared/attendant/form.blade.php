<form action="/attendant/new" method="post" class="flex flex-col rounded-xl my-2 text-sm md:text-[17px]">
    @csrf
    <div class="flex justify-between">
        <div class="w-[48%] flex bg-gray-100 border border-gray-300 rounded-xl justify-center items-center px-3 pb-1 pt-3">
            <div class="flex justify-center items-center flex-col gap-2">
                <div class="flex gap-2">
                    <img src="{{'/assets/img/hours-icone.svg'}}" alt="">
                    <p>Today</p>
                </div>
                <input type="text" value="00:00" class="rounded border-violet-400 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 w-full md:w-auto text-xl text-center">
            </div>
        </div>
        <div class="w-[48%] flex bg-gray-100 border border-gray-300 rounded-xl justify-center items-center px-3 pt-2 pb-3">
            <div class="flex justify-center items-center flex-col gap-2">
                <div class="flex gap-2">
                    <img src="{{'/assets/img/hours-icone.svg'}}" alt="">
                    <p>This Pay Period</p>
                </div>
                <input type="text" value="32:00" class="rounded border-violet-400 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 w-full md:w-auto text-xl text-center">
            </div>
        </div>
    </div>
    <x-button.primary :action="'none'" :type="'submit'" :name="'submit'" class="mt-4">
        Clock In
    </x-button.primary>
</form>