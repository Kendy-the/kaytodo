<x-layout.app-layout>
    @section('title', 'message')

    <div class="pe-2 overflow-y-auto h-dvh pb-20 md:pb-5">
        <div class="bg-white rounded-xl p-2">
            <h1 class="font-bold text-xl text-center my-2">{{ isset($name) && !empty($name) ? $name : 'Jhon Doe'}}</h1>
        </div>
        <div class="mb-20 md:mb-20">

            {{-- message recieved --}}
            <div class="my-4">
                <div class="flex">
                    <div class="flex flex-col gap-3 rounded-xl p-4 bg-white w-[80%]">
                        <div>
                            yeh, bruh !
                        </div>
                        <div class="text-end">{{ isset($hour) ? $hour : "09:10" }}</div>
                    </div>
                    <div class="w-[20%]"></div>
                </div>
            </div>

            {{-- message recieved --}}
            <div class="my-4">
                <div class="flex">
                    <div class="flex flex-col gap-3 rounded-xl p-4 bg-white w-[80%]">
                        <div>
                            What's new? What do we do about the project? you must assign me my tasks.
                        </div>
                        <div class="text-end">{{ isset($hour) ? $hour : "09:10" }}</div>
                    </div>
                    <div class="w-[20%]"></div>
                </div>
            </div>

            {{-- message send --}}
            <div class="my-4">
                <div class="flex">
                    <div class="w-[20%]"></div>
                    <div class="flex flex-col gap-3 rounded-xl text-white text-end p-4 bg-violet-500 w-[80%]">
                        <div>
                            Yeh, brother. No problem, it will be done in a few hours.
                        </div>
                        <div>{{ isset($hour) ? $hour : "09:10" }}</div>
                    </div>
                </div>
            </div>

        </div>
        
        <form action="/account/message/send" method="post">
            @csrf
            <div class="fixed bottom-17 md:bottom-2 bg-white rounded-xl p-3 w-[93%] md:w-[83%] lg:w-[90%]">
                <div class="flex items-center w-full">
                    <div class="flex justify-between rounded-xl w-[80%] md:w-[87%] lg:w-[90%] bg-gray-300 me-3 lg:me-4">
                        <textarea name="message" id="message" placeholder="type a message..." class="w-full focus:outline-2 border-[#DFEAF2] focus:outline-offset-2 focus:outline-violet-500 rounded-xl p-2 h-10 lg:h-13"></textarea>
                    </div>
                    <button class="cursor-pointer bg-violet-500 rounded-full w-10 h-10 lg:w-13 lg:h-13 flex justify-center items-center" title="send">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.92492 4.96667L13.4416 2.45834C16.8166 1.33334 18.6499 3.17501 17.5333 6.55001L15.0249 14.0667C13.3416 19.125 10.5749 19.125 8.89159 14.0667L8.14992 11.8333L5.91659 11.0917C0.866586 9.41667 0.866586 6.65834 5.92492 4.96667Z" fill="#FEFEFE"/>
                            <path d="M10.1001 9.69167L13.2751 6.50833L10.1001 9.69167Z" fill="#FEFEFE"/>
                            <path d="M10.1 10.3167C9.94163 10.3167 9.7833 10.2583 9.6583 10.1333C9.41663 9.89166 9.41663 9.49166 9.6583 9.24999L12.825 6.06666C13.0666 5.82499 13.4666 5.82499 13.7083 6.06666C13.95 6.30832 13.95 6.70832 13.7083 6.94999L10.5416 10.1333C10.4166 10.25 10.2583 10.3167 10.1 10.3167Z" fill="#7A5AF8"/>
                            </svg>                            
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout.app-layout>