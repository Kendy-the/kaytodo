{{-- Toast Using --}}
{{-- <x-toast :type="'success'" :message="'Task created successfully!'" /> --}}
{{-- <x-toast :type="'danger'" :message="'Failed to create task!'" /> --}}
{{-- <x-toast :type="'warning'" :message="'Please fill in all required fields!'" /> --}}

<div id="toast-{{ $type }}"
    @class(['fixed top-15 right-0 md:top-20 md:right-5 z-30 float-right flex flex-col w-full max-w-sm pt-4 pb-0 text-body rounded shadow-xs shadow-black/50', 'bg-success-light' => $type == 'success', 'bg-danger-light' => $type == 'danger', 'bg-warning-light' => $type == 'warning']) class="" role="alert">

    <div class="flex items-center w-full max-w-sm px-4">
        <div @class(['inline-flex items-center justify-center shrink-0 w-7 h-7 text-white rounded', 'bg-success-dark' => $type == 'success', 'bg-danger-dark' => $type == 'danger', 'bg-warning-dark' => $type == 'warning'])>

            @if ($type == "success")

                <svg class="w-5 h-5 z-" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/></svg>
                <span class="sr-only">Check icon</span>

            @elseif($type == "danger")

                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                <span class="sr-only">Error icon</span>

            @elseif($type == "warning")

                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <span class="sr-only">Warning icon</span>

            @endif

        </div>

        <div @class(['absolute -top-3 -right-3 inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white rounded-full', 'bg-red-500' => $type == 'danger', 'bg-green-500' => $type == 'success', 'bg-yellow-500' => $type == 'warning'])>
            {{ $type == 'success' ? 'S' : ($type == 'danger' ? 'D' : 'W') }}
        </div>

        <div @class(['ms-3 text-sm font-normal', 'text-white' => $type == 'danger'])>{{ $message }}</div>

        <button type="button" @class(['ms-auto flex items-center justify-center text-body hover:text-heading hover:text-white bg-transparent box-border border border-transparent focus:ring-1 font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none','text-white'=> $type == 'success' || $type == 'danger', 'hover:bg-success-dark' => $type == 'success', 'hover:bg-danger-dark' => $type == 'danger', 'hover:bg-warning-dark' => $type == 'warning']) data-dismiss-target="#toast-{{ $type }}" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
        </button>
    </div>

    <style>
        progress::-webkit-progress-bar {
            background: var(--first-color-light);
        }

        progress::-webkit-progress-value {
            transition: width 0.3s ease;
            background-color: {{ $type == 'success' ? '#16a34a' : ($type == 'danger' ? '#dc2626' : '#eab308') }};
        }
    </style>

    <progress
        id="toast-progress-{{ $type }}"
        @class([
            'h-1.5 w-full mt-2',
            'bg-success-dark' => $type == 'success',
            'bg-danger-dark' => $type == 'danger',
            'bg-warning-dark' => $type == 'warning'
        ])
        value="0"
        max="100">
    </progress>

    <script>
        document.addEventListener("DOMContentLoaded", function(){

            const exclude = ['toast-progress-danger', 'toast-progress-warning'];

            const duration = 3000; // durée totale
            const progress = document.getElementById('toast-progress-{{ $type }}');
            const toast = document.getElementById('toast-{{ $type }}');

            if(!progress) return;

            let value = 0;
            const intervalTime = 30; // vitesse d'update
            const step = 100 / (duration / intervalTime);

            const interval = setInterval(() => {

                value += step;
                progress.value = value;

                if(value >= 100){
                    clearInterval(interval);

                    if(progress.id && exclude.includes(progress.id)){
                        return;
                    }

                    if(toast){
                        toast.classList.add("hidden");
                    }
                }

            }, intervalTime);

        });
    </script>

</div>
