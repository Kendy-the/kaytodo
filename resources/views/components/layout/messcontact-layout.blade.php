<div class="fixed w-[90%]">
    <div class="lg:me-3 bg-white rounded-xl p-3 md:me-10">
        <div class="messcontact grid grid-cols-4 lg:grid-cols-3 gap-1">
            <div class="contact bg-gray-100 col-span-3 lg:col-span-1 rounded" id="contact">
                <h1 class="toggle-message font-bold text-sm md:text-xl text-center my-2">{{ $firstTitle }}</h1>
                {{ $first }}
            </div>
            <div class="message lg:col-span-2 rounded" id="message">
                <h1 class="toggle-message font-bold bg-gray-100 text-sm md:text-xl text-center py-2 rounded">{{ $secondTitle }}</h1>
                {{ $second }}
            </div>
        </div>
    </div>
</div>