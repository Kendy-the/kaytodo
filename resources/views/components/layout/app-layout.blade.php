<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'KayTODO')</title>
</head>
@php $user = Auth::user() @endphp

<body id="body-pd" class="bg-gray-100">
    <div class="flex justify-center items-center mx-auto max-w-screen-xl">
        <header class="header" id="header">
            <div class="w-full flex justify-between">
                {{-- first part --}}
                <div class="flex justify-center items-center relative right-4">
                    <a id="previous-url" href="" class="w-3 md:w-8 m-0 md:me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(24, 23, 23, 1);transform: ;msFilter:;">
                            <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z">
                            </path>
                        </svg>
                    </a>
                    @if (Request::is('task') || Request::is('category') || Request::is('home') || Request::is('project'))
                        <form action="/account/search" method="post" class="hidden lg:flex items-center">
                            <i class='bx bx-search text-lg'></i>
                            <input type="search" name="" id="" placeholder="Search"
                                class="relative right-6 rounded ps-8 h-9 hidden lg:inline-block border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-400">
                        </form>
                    @endif
                </div>
                {{-- second part --}}
                <div class="flex items-center justify-between w-full lg:w-auto">
                    <div class="flex me-3 items-center">

                        <div>
                            <a href="/account/profile" data-popover-target="popover-user-profile">
                                @if (isset($user) && is_null($user->image))
                                    <div class="bg-violet-100 rounded-full w-13 h-13 me-3 flex justify-center items-center">
                                        {{ isset($user) ? Str::upper(Str::substr($user->first_name, 0, 1)) . ' ' . Str::upper(Str::substr($user->last_name, 0, 1)) : 'JD' }}
                                    </div>
                                @else
                                    <img src="{{ isset($user) ? $user->imageUrl() : '' }}" class="rounded-full w-12 h-12 me-3 border border-gray-300 object-cover">
                                @endif
                            </a>

                            {{-- pop over data --}}
                            <div data-popover id="popover-user-profile" role="tooltip" class="absolute p-1 z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 hover:bg-violet-400 hover:text-white active:bg-violet-500">
                                <a href="/auth/logout" class="cursor-pointer font-semibold flex gap-2 p-2">
                                    <img src="{{"/assets/img/logout.svg"}}" alt="">
                                    <div>logout</div>
                                </a>
                            </div>
                        </div>


                        <div class="flex flex-col">
                            <div class="flex">
                                {{ isset($user) ? Str::substr(Str::ucfirst($user->first_name),0,3) . "..." : 'Don...' }}
                                <svg class="ms-1 w-4" width="18" height="19" viewBox="0 0 18 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.12484 10.0833L6.9165 8.89583C6.76373 8.74306 6.57289 8.66667 6.344 8.66667C6.11512 8.66667 5.91706 8.75 5.74984 8.91667C5.59706 9.06945 5.52067 9.26389 5.52067 9.5C5.52067 9.73611 5.59706 9.93056 5.74984 10.0833L7.5415 11.875C7.70817 12.0417 7.90262 12.125 8.12484 12.125C8.34706 12.125 8.5415 12.0417 8.70817 11.875L12.2498 8.33334C12.4165 8.16667 12.4962 7.97222 12.489 7.75C12.4818 7.52778 12.4021 7.33333 12.2498 7.16667C12.0832 7 11.8854 6.91333 11.6565 6.90667C11.4276 6.9 11.2296 6.97972 11.0623 7.14584L8.12484 10.0833ZM5.7915 17.625L4.58317 15.5833L2.2915 15.0833C2.08317 15.0417 1.9165 14.9342 1.7915 14.7608C1.6665 14.5875 1.61789 14.3964 1.64567 14.1875L1.87484 11.8333L0.312337 10.0417C0.173448 9.88889 0.104004 9.70833 0.104004 9.5C0.104004 9.29167 0.173448 9.11111 0.312337 8.95834L1.87484 7.16667L1.64567 4.8125C1.61789 4.60417 1.6665 4.41306 1.7915 4.23917C1.9165 4.06528 2.08317 3.95778 2.2915 3.91667L4.58317 3.41667L5.7915 1.375C5.90262 1.19445 6.05539 1.07278 6.24984 1.01C6.44428 0.947224 6.63873 0.95778 6.83317 1.04167L8.99984 1.95834L11.1665 1.04167C11.3609 0.958336 11.5554 0.94778 11.7498 1.01C11.9443 1.07222 12.0971 1.19389 12.2082 1.375L13.4165 3.41667L15.7082 3.91667C15.9165 3.95834 16.0832 4.06611 16.2082 4.24C16.3332 4.41389 16.3818 4.60472 16.354 4.8125L16.1248 7.16667L17.6873 8.95834C17.8262 9.11111 17.8957 9.29167 17.8957 9.5C17.8957 9.70833 17.8262 9.88889 17.6873 10.0417L16.1248 11.8333L16.354 14.1875C16.3818 14.3958 16.3332 14.5869 16.2082 14.7608C16.0832 14.9347 15.9165 15.0422 15.7082 15.0833L13.4165 15.5833L12.2082 17.625C12.0971 17.8056 11.9443 17.9272 11.7498 17.99C11.5554 18.0528 11.3609 18.0422 11.1665 17.9583L8.99984 17.0417L6.83317 17.9583C6.63873 18.0417 6.44428 18.0522 6.24984 17.99C6.05539 17.9278 5.90262 17.8061 5.7915 17.625Z"
                                        fill="#675AFF" />
                                </svg>
                            </div>

                            <div class="text-[#795FFC]">
                                {{ isset($user) ? Str::substr($user->profession, 0, 10) . '...' : 'Junior...' }}
                            </div>
                        </div>
                    </div>

                    @if (Request::is('task') || Request::is('category') || Request::is('home') || Request::is('project'))
                        <form action="/account/search" method="post"
                            class="mx-5 items-center hidden md:flex lg:hidden">
                            <i class='bx bx-search text-lg'></i>
                            <input type="search" name="" id="" placeholder="Search"
                                class="relative right-6 rounded ps-8 h-9 mx-2 w-40 border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-400">
                        </form>
                    @endif

                    {{-- notification --}}
                    <div class="flex ps-2 gap-2 items-center">
                        <div class="h-8 border-l me-2"></div>
                        <a href="/account/message">
                            <div class=" bg-violet-100 rounded-full w-12 h-12 flex justify-center items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.1665 2.02499H5.83317C3.33317 2.02499 1.6665 3.69166 1.6665 6.19166V11.1917C1.6665 13.6917 3.33317 15.3583 5.83317 15.3583H9.1665L12.8748 17.825C13.4248 18.1917 14.1665 17.8 14.1665 17.1333V15.3583C16.6665 15.3583 18.3332 13.6917 18.3332 11.1917V6.19166C18.3332 3.69166 16.6665 2.02499 14.1665 2.02499ZM12.9165 9.37499H7.08317C6.7415 9.37499 6.45817 9.09166 6.45817 8.74999C6.45817 8.40833 6.7415 8.12499 7.08317 8.12499H12.9165C13.2582 8.12499 13.5415 8.40833 13.5415 8.74999C13.5415 9.09166 13.2582 9.37499 12.9165 9.37499Z"
                                        fill="#6E62FF" />
                                </svg>
                            </div>
                        </a>
                        <a href="/account/notification">
                            <div class=" bg-violet-100 rounded-full w-12 h-12 flex justify-center items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1168 12.075L15.2834 10.6917C15.1084 10.3833 14.9501 9.79999 14.9501 9.45832V7.34999C14.9501 5.39166 13.8001 3.69999 12.1418 2.90832C11.7084 2.14166 10.9084 1.66666 9.99178 1.66666C9.08345 1.66666 8.26678 2.15832 7.83345 2.93332C6.20845 3.74166 5.08345 5.41666 5.08345 7.34999V9.45832C5.08345 9.79999 4.92512 10.3833 4.75012 10.6833L3.90845 12.075C3.57512 12.6333 3.50012 13.25 3.70845 13.8167C3.90845 14.375 4.38345 14.8083 5.00012 15.0167C6.61678 15.5667 8.31678 15.8333 10.0168 15.8333C11.7168 15.8333 13.4168 15.5667 15.0335 15.025C15.6168 14.8333 16.0668 14.3917 16.2835 13.8167C16.5001 13.2417 16.4418 12.6083 16.1168 12.075Z"
                                        fill="#6E62FF" />
                                    <path
                                        d="M12.3582 16.675C12.0082 17.6417 11.0832 18.3333 9.9999 18.3333C9.34157 18.3333 8.69157 18.0667 8.23324 17.5917C7.96657 17.3417 7.76657 17.0083 7.6499 16.6667C7.75824 16.6833 7.86657 16.6917 7.98324 16.7083C8.1749 16.7333 8.3749 16.7583 8.5749 16.775C9.0499 16.8167 9.53324 16.8417 10.0166 16.8417C10.4916 16.8417 10.9666 16.8167 11.4332 16.775C11.6082 16.7583 11.7832 16.75 11.9499 16.725C12.0832 16.7083 12.2166 16.6917 12.3582 16.675Z"
                                        fill="#6E62FF" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="l-navbar hidden md:block mx-auto max-w-screen-xl" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav_list">

                    <span class="hidden lg:inline" id="header-toggle">
                        <a href="#" class="nav_logo text-white">
                            <i class='nav_icon'>K</i>
                            <span class="nav_name"><span>Kay</span> <span class="upper">todo</span></span>
                        </a>
                    </span>

                    <span class="lg:hidden">
                        <a href="#" class="nav_logo text-white">
                            <i class='nav_icon'>K</i>
                            <span class="nav_name"><span>Kay</span> <span class="upper">todo</span></span>
                        </a>
                    </span>

                    <a href="/home" @class([
                        'nav_link',
                        'active' => str_contains(
                            request()->route() != null ? request()->route()->getName() : ' ',
                            'home'),
                    ])>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.0397 6.82006L14.2797 2.79006C12.7097 1.69006 10.2997 1.75006 8.78975 2.92006L3.77975 6.83006C2.77975 7.61006 1.98975 9.21006 1.98975 10.4701V17.3701C1.98975 19.9201 4.05975 22.0001 6.60975 22.0001H17.3897C19.9397 22.0001 22.0097 19.9301 22.0097 17.3801V10.6001C22.0097 9.25006 21.1397 7.59006 20.0397 6.82006ZM12.7497 18.0001C12.7497 18.4101 12.4097 18.7501 11.9997 18.7501C11.5897 18.7501 11.2497 18.4101 11.2497 18.0001V15.0001C11.2497 14.5901 11.5897 14.2501 11.9997 14.2501C12.4097 14.2501 12.7497 14.5901 12.7497 15.0001V18.0001Z"
                                fill="#FEFEFE" />
                        </svg>
                        <span class="nav_name">Home</span>
                    </a>
                    <a href="/project" @class([
                        'nav_link',
                        'active' => str_contains(
                            request()->route() != null ? request()->route()->getName() : ' ',
                            'project'),
                    ])>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.7899 11.88C11.2499 11.88 10.6999 11.78 10.2699 11.59L4.3699 8.97C2.8699 8.3 2.6499 7.4 2.6499 6.91C2.6499 6.42 2.8699 5.52 4.3699 4.85L10.2699 2.23C11.1399 1.84 12.4499 1.84 13.3199 2.23L19.2299 4.85C20.7199 5.51 20.9499 6.42 20.9499 6.91C20.9499 7.4 20.7299 8.3 19.2299 8.97L13.3199 11.59C12.8799 11.79 12.3399 11.88 11.7899 11.88ZM11.7899 3.44C11.4499 3.44 11.1199 3.49 10.8799 3.6L4.9799 6.22C4.3699 6.5 4.1499 6.78 4.1499 6.91C4.1499 7.04 4.3699 7.33 4.9699 7.6L10.8699 10.22C11.3499 10.43 12.2199 10.43 12.6999 10.22L18.6099 7.6C19.2199 7.33 19.4399 7.04 19.4399 6.91C19.4399 6.78 19.2199 6.49 18.6099 6.22L12.7099 3.6C12.4699 3.5 12.1299 3.44 11.7899 3.44Z"
                                fill="white" />
                            <path
                                d="M12 17.09C11.62 17.09 11.24 17.01 10.88 16.85L4.09 13.83C3.06 13.38 2.25 12.13 2.25 11C2.25 10.59 2.59 10.25 3 10.25C3.41 10.25 3.75 10.59 3.75 11C3.75 11.55 4.2 12.24 4.7 12.47L11.49 15.49C11.81 15.63 12.18 15.63 12.51 15.49L19.3 12.47C19.8 12.25 20.25 11.55 20.25 11C20.25 10.59 20.59 10.25 21 10.25C21.41 10.25 21.75 10.59 21.75 11C21.75 12.13 20.94 13.38 19.91 13.84L13.12 16.86C12.76 17.01 12.38 17.09 12 17.09Z"
                                fill="white" />
                            <path
                                d="M12 22.09C11.62 22.09 11.24 22.01 10.88 21.85L4.09 18.83C2.97 18.33 2.25 17.22 2.25 15.99C2.25 15.58 2.59 15.24 3 15.24C3.41 15.24 3.75 15.59 3.75 16C3.75 16.63 4.12 17.21 4.7 17.47L11.49 20.49C11.81 20.63 12.18 20.63 12.51 20.49L19.3 17.47C19.88 17.21 20.25 16.64 20.25 16C20.25 15.59 20.59 15.25 21 15.25C21.41 15.25 21.75 15.59 21.75 16C21.75 17.23 21.03 18.34 19.91 18.84L13.12 21.86C12.76 22.01 12.38 22.09 12 22.09Z"
                                fill="white" />
                        </svg>
                        <span class="nav_name">Project</span>
                    </a>
                    <a href="/task" @class([
                        'nav_link',
                        'active' => str_contains(
                            request()->route() != null ? request()->route()->getName() : ' ',
                            'task'),
                    ])>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 5.75C7.59 5.75 7.25 5.41 7.25 5V2C7.25 1.59 7.59 1.25 8 1.25C8.41 1.25 8.75 1.59 8.75 2V5C8.75 5.41 8.41 5.75 8 5.75Z"
                                fill="white" />
                            <path
                                d="M16 5.75C15.59 5.75 15.25 5.41 15.25 5V2C15.25 1.59 15.59 1.25 16 1.25C16.41 1.25 16.75 1.59 16.75 2V5C16.75 5.41 16.41 5.75 16 5.75Z"
                                fill="white" />
                            <path
                                d="M16 22.75H8C4.35 22.75 2.25 20.65 2.25 17V8.5C2.25 4.85 4.35 2.75 8 2.75H16C19.65 2.75 21.75 4.85 21.75 8.5V17C21.75 20.65 19.65 22.75 16 22.75ZM8 4.25C5.14 4.25 3.75 5.64 3.75 8.5V17C3.75 19.86 5.14 21.25 8 21.25H16C18.86 21.25 20.25 19.86 20.25 17V8.5C20.25 5.64 18.86 4.25 16 4.25H8Z"
                                fill="white" />
                            <path
                                d="M16 11.75H8C7.59 11.75 7.25 11.41 7.25 11C7.25 10.59 7.59 10.25 8 10.25H16C16.41 10.25 16.75 10.59 16.75 11C16.75 11.41 16.41 11.75 16 11.75Z"
                                fill="white" />
                            <path
                                d="M12 16.75H8C7.59 16.75 7.25 16.41 7.25 16C7.25 15.59 7.59 15.25 8 15.25H12C12.41 15.25 12.75 15.59 12.75 16C12.75 16.41 12.41 16.75 12 16.75Z"
                                fill="white" />
                        </svg>
                        <span class="nav_name">Task</span>
                    </a>

                    <a href="/category" @class([
                        'nav_link',
                        'active' => str_contains(
                            request()->route() != null ? request()->route()->getName() : ' ',
                            'category'),
                    ])>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                            <path
                                d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm5 2h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm1-6h4v4h-4V5zM3 20a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6zm2-5h4v4H5v-4zm8 5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6zm2-5h4v4h-4v-4z">
                            </path>
                        </svg>
                        <span class="nav_name">Category</span>
                    </a>
                </div>
            </div>
            <div>
                <a href="/account/profile" @class([
                    'nav_link',
                    'active' => str_contains(
                        request()->route() != null ? request()->route()->getName() : ' ',
                        'account'),
                ])>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5002 22.75C10.7102 22.75 9.96025 22.34 9.44025 21.64L8.42023 20.3C8.21023 20.02 7.93025 19.86 7.63025 19.84C7.34025 19.82 7.03027 19.96 6.78027 20.21C5.92027 21.13 5.08022 21.57 4.29022 21.55C3.75022 21.53 3.28023 21.29 2.92023 20.85C2.88023 20.8 2.84024 20.73 2.81024 20.66C2.42024 19.82 2.24023 18.68 2.24023 16.97V7.05001C2.24023 5.34001 2.42024 4.21001 2.81024 3.36001C2.84024 3.30001 2.87023 3.24001 2.92023 3.19001C3.27023 2.74001 3.74027 2.50001 4.28027 2.47001C5.08027 2.44001 5.93026 2.90001 6.77026 3.80001C7.02026 4.07001 7.32024 4.20001 7.62024 4.18001C7.92024 4.16001 8.20022 4.00001 8.41022 3.72001L9.43024 2.37001C9.95024 1.67001 10.7002 1.26001 11.4902 1.26001C12.2802 1.26001 13.0302 1.67001 13.5502 2.37001L14.5602 3.71001C14.7702 4.00001 15.0602 4.16001 15.3702 4.18001C15.6602 4.20001 15.9702 4.06001 16.2202 3.80001C17.0402 2.92001 17.8502 2.47001 18.6302 2.47001C19.1902 2.47001 19.7103 2.72001 20.0703 3.19001C20.1103 3.24001 20.1502 3.30001 20.1802 3.37001C20.5702 4.21001 20.7502 5.35001 20.7502 7.06001V16.98C20.7502 18.69 20.5702 19.82 20.1802 20.67C20.1402 20.76 20.0903 20.84 20.0203 20.91C19.7103 21.31 19.2002 21.56 18.6302 21.56C17.8502 21.56 17.0402 21.11 16.2202 20.23C15.9802 19.97 15.6502 19.83 15.3702 19.85C15.0602 19.87 14.7802 20.03 14.5602 20.32L13.5502 21.66C13.0402 22.34 12.2902 22.75 11.5002 22.75ZM7.58026 18.33C7.62026 18.33 7.67027 18.33 7.71027 18.33C8.45027 18.37 9.14023 18.76 9.61023 19.39L10.6302 20.74C11.1202 21.4 11.8602 21.4 12.3502 20.75L13.3602 19.41C13.8402 18.77 14.5403 18.39 15.2803 18.35C16.0203 18.31 16.7602 18.62 17.3002 19.2C18.0402 19.99 18.4902 20.05 18.6102 20.05C18.6902 20.05 18.7603 20.03 18.8303 19.97C19.1103 19.34 19.2302 18.39 19.2302 16.97V7.05001C19.2302 5.65001 19.1003 4.70001 18.8303 4.07001C18.7503 3.98001 18.6702 3.97001 18.6102 3.97001C18.4902 3.97001 18.0402 4.03001 17.3002 4.82001C16.7602 5.40001 16.0203 5.71001 15.2803 5.67001C14.5303 5.63001 13.8302 5.24001 13.3502 4.61001L12.3403 3.27001C11.8503 2.61001 11.1102 2.61001 10.6202 3.27001L9.60022 4.63001C9.13022 5.26001 8.44026 5.64001 7.70026 5.68001C6.96026 5.72001 6.22024 5.41001 5.68024 4.84001C5.07024 4.18001 4.60027 3.96001 4.34027 3.97001C4.28027 3.97001 4.21025 3.99001 4.13025 4.07001C3.86025 4.70001 3.73022 5.65001 3.73022 7.05001V16.97C3.73022 18.38 3.86025 19.33 4.13025 19.96C4.22025 20.04 4.28027 20.05 4.34027 20.06C4.59027 20.07 5.06023 19.85 5.67023 19.2C6.20023 18.63 6.89026 18.33 7.58026 18.33Z"
                            fill="white" />
                        <path
                            d="M16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z"
                            fill="white" />
                        <path
                            d="M14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5Z"
                            fill="white" />
                    </svg>
                    <span class="nav_name">Setting</span>
                </a>
            </div>
        </nav>
    </div>

    {{-- Main - content --}}
    {{ $slot }}

    <footer style="transform: translateX(-50%);"
        class="fixed z-50 w-[102%] py-2 h-16 max-w-lg bg-black border bottom-[-1px] left-1/2 border-gray-600 md:hidden">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <a href="/home" @class([
                'inline-flex flex-col items-center justify-center px-5 rounded-full  group',
                'bg-gray-800' => str_contains(
                    request()->route() != null ? request()->route()->getName() : ' ',
                    'home'),
            ]) data-tooltip-target="tooltip-home" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.0397 6.82006L14.2797 2.79006C12.7097 1.69006 10.2997 1.75006 8.78975 2.92006L3.77975 6.83006C2.77975 7.61006 1.98975 9.21006 1.98975 10.4701V17.3701C1.98975 19.9201 4.05975 22.0001 6.60975 22.0001H17.3897C19.9397 22.0001 22.0097 19.9301 22.0097 17.3801V10.6001C22.0097 9.25006 21.1397 7.59006 20.0397 6.82006ZM12.7497 18.0001C12.7497 18.4101 12.4097 18.7501 11.9997 18.7501C11.5897 18.7501 11.2497 18.4101 11.2497 18.0001V15.0001C11.2497 14.5901 11.5897 14.2501 11.9997 14.2501C12.4097 14.2501 12.7497 14.5901 12.7497 15.0001V18.0001Z"
                        fill="#FEFEFE" />
                </svg>
                <span class="sr-only">Home</span>

            </a>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="/project" @class([
                'inline-flex flex-col items-center justify-center px-5 dark:hover:bg-gray-800 group rounded-full',
                'bg-gray-800' => str_contains(
                    request()->route() != null ? request()->route()->getName() : ' ',
                    'project'),
            ]) data-tooltip-target="tooltip-wallet" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.7899 11.88C11.2499 11.88 10.6999 11.78 10.2699 11.59L4.3699 8.97C2.8699 8.3 2.6499 7.4 2.6499 6.91C2.6499 6.42 2.8699 5.52 4.3699 4.85L10.2699 2.23C11.1399 1.84 12.4499 1.84 13.3199 2.23L19.2299 4.85C20.7199 5.51 20.9499 6.42 20.9499 6.91C20.9499 7.4 20.7299 8.3 19.2299 8.97L13.3199 11.59C12.8799 11.79 12.3399 11.88 11.7899 11.88ZM11.7899 3.44C11.4499 3.44 11.1199 3.49 10.8799 3.6L4.9799 6.22C4.3699 6.5 4.1499 6.78 4.1499 6.91C4.1499 7.04 4.3699 7.33 4.9699 7.6L10.8699 10.22C11.3499 10.43 12.2199 10.43 12.6999 10.22L18.6099 7.6C19.2199 7.33 19.4399 7.04 19.4399 6.91C19.4399 6.78 19.2199 6.49 18.6099 6.22L12.7099 3.6C12.4699 3.5 12.1299 3.44 11.7899 3.44Z"
                        fill="white" />
                    <path
                        d="M12 17.09C11.62 17.09 11.24 17.01 10.88 16.85L4.09 13.83C3.06 13.38 2.25 12.13 2.25 11C2.25 10.59 2.59 10.25 3 10.25C3.41 10.25 3.75 10.59 3.75 11C3.75 11.55 4.2 12.24 4.7 12.47L11.49 15.49C11.81 15.63 12.18 15.63 12.51 15.49L19.3 12.47C19.8 12.25 20.25 11.55 20.25 11C20.25 10.59 20.59 10.25 21 10.25C21.41 10.25 21.75 10.59 21.75 11C21.75 12.13 20.94 13.38 19.91 13.84L13.12 16.86C12.76 17.01 12.38 17.09 12 17.09Z"
                        fill="white" />
                    <path
                        d="M12 22.09C11.62 22.09 11.24 22.01 10.88 21.85L4.09 18.83C2.97 18.33 2.25 17.22 2.25 15.99C2.25 15.58 2.59 15.24 3 15.24C3.41 15.24 3.75 15.59 3.75 16C3.75 16.63 4.12 17.21 4.7 17.47L11.49 20.49C11.81 20.63 12.18 20.63 12.51 20.49L19.3 17.47C19.88 17.21 20.25 16.64 20.25 16C20.25 15.59 20.59 15.25 21 15.25C21.41 15.25 21.75 15.59 21.75 16C21.75 17.23 21.03 18.34 19.91 18.84L13.12 21.86C12.76 22.01 12.38 22.09 12 22.09Z"
                        fill="white" />
                </svg>
                <span class="sr-only">Project</span>
            </a>
            <div id="tooltip-wallet" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                project
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div class="flex items-center justify-center">
                <a href="/task" @class([
                    'inline-flex items-center justify-center w-full h-full font-medium rounded-full group focus:ring-4',
                    'bg-gray-800' => str_contains(
                        request()->route() != null ? request()->route()->getName() : ' ',
                        'task'),
                ]) data-tooltip-target="tooltip-new" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 5.75C7.59 5.75 7.25 5.41 7.25 5V2C7.25 1.59 7.59 1.25 8 1.25C8.41 1.25 8.75 1.59 8.75 2V5C8.75 5.41 8.41 5.75 8 5.75Z"
                            fill="white" />
                        <path
                            d="M16 5.75C15.59 5.75 15.25 5.41 15.25 5V2C15.25 1.59 15.59 1.25 16 1.25C16.41 1.25 16.75 1.59 16.75 2V5C16.75 5.41 16.41 5.75 16 5.75Z"
                            fill="white" />
                        <path
                            d="M16 22.75H8C4.35 22.75 2.25 20.65 2.25 17V8.5C2.25 4.85 4.35 2.75 8 2.75H16C19.65 2.75 21.75 4.85 21.75 8.5V17C21.75 20.65 19.65 22.75 16 22.75ZM8 4.25C5.14 4.25 3.75 5.64 3.75 8.5V17C3.75 19.86 5.14 21.25 8 21.25H16C18.86 21.25 20.25 19.86 20.25 17V8.5C20.25 5.64 18.86 4.25 16 4.25H8Z"
                            fill="white" />
                        <path
                            d="M16 11.75H8C7.59 11.75 7.25 11.41 7.25 11C7.25 10.59 7.59 10.25 8 10.25H16C16.41 10.25 16.75 10.59 16.75 11C16.75 11.41 16.41 11.75 16 11.75Z"
                            fill="white" />
                        <path
                            d="M12 16.75H8C7.59 16.75 7.25 16.41 7.25 16C7.25 15.59 7.59 15.25 8 15.25H12C12.41 15.25 12.75 15.59 12.75 16C12.75 16.41 12.41 16.75 12 16.75Z"
                            fill="white" />
                    </svg>
                    <span class="sr-only">Task</span>
                </a>
            </div>
            <div id="tooltip-new" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                task
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <a href="/category" @class([
                'inline-flex flex-col items-center justify-center px-5 rounded-full dark:hover:bg-gray-800 group',
                'bg-gray-800' => str_contains(
                    request()->route() != null ? request()->route()->getName() : ' ',
                    'category'),
            ]) data-tooltip-target="tooltip-profile" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                    <path
                        d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm5 2h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm1-6h4v4h-4V5zM3 20a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6zm2-5h4v4H5v-4zm8 5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6zm2-5h4v4h-4v-4z">
                    </path>
                </svg>
                <span class="sr-only">Category</span>
            </a>
            <div id="tooltip-profile" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                category
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <a href="/account/profile" @class([
                'inline-flex flex-col items-center justify-center px-5 rounded-full dark:hover:bg-gray-800 group',
                'bg-gray-800' => str_contains(
                    request()->route() != null ? request()->route()->getName() : ' ',
                    'account'),
            ]) data-tooltip-target="tooltip-profile" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.5002 22.75C10.7102 22.75 9.96025 22.34 9.44025 21.64L8.42023 20.3C8.21023 20.02 7.93025 19.86 7.63025 19.84C7.34025 19.82 7.03027 19.96 6.78027 20.21C5.92027 21.13 5.08022 21.57 4.29022 21.55C3.75022 21.53 3.28023 21.29 2.92023 20.85C2.88023 20.8 2.84024 20.73 2.81024 20.66C2.42024 19.82 2.24023 18.68 2.24023 16.97V7.05001C2.24023 5.34001 2.42024 4.21001 2.81024 3.36001C2.84024 3.30001 2.87023 3.24001 2.92023 3.19001C3.27023 2.74001 3.74027 2.50001 4.28027 2.47001C5.08027 2.44001 5.93026 2.90001 6.77026 3.80001C7.02026 4.07001 7.32024 4.20001 7.62024 4.18001C7.92024 4.16001 8.20022 4.00001 8.41022 3.72001L9.43024 2.37001C9.95024 1.67001 10.7002 1.26001 11.4902 1.26001C12.2802 1.26001 13.0302 1.67001 13.5502 2.37001L14.5602 3.71001C14.7702 4.00001 15.0602 4.16001 15.3702 4.18001C15.6602 4.20001 15.9702 4.06001 16.2202 3.80001C17.0402 2.92001 17.8502 2.47001 18.6302 2.47001C19.1902 2.47001 19.7103 2.72001 20.0703 3.19001C20.1103 3.24001 20.1502 3.30001 20.1802 3.37001C20.5702 4.21001 20.7502 5.35001 20.7502 7.06001V16.98C20.7502 18.69 20.5702 19.82 20.1802 20.67C20.1402 20.76 20.0903 20.84 20.0203 20.91C19.7103 21.31 19.2002 21.56 18.6302 21.56C17.8502 21.56 17.0402 21.11 16.2202 20.23C15.9802 19.97 15.6502 19.83 15.3702 19.85C15.0602 19.87 14.7802 20.03 14.5602 20.32L13.5502 21.66C13.0402 22.34 12.2902 22.75 11.5002 22.75ZM7.58026 18.33C7.62026 18.33 7.67027 18.33 7.71027 18.33C8.45027 18.37 9.14023 18.76 9.61023 19.39L10.6302 20.74C11.1202 21.4 11.8602 21.4 12.3502 20.75L13.3602 19.41C13.8402 18.77 14.5403 18.39 15.2803 18.35C16.0203 18.31 16.7602 18.62 17.3002 19.2C18.0402 19.99 18.4902 20.05 18.6102 20.05C18.6902 20.05 18.7603 20.03 18.8303 19.97C19.1103 19.34 19.2302 18.39 19.2302 16.97V7.05001C19.2302 5.65001 19.1003 4.70001 18.8303 4.07001C18.7503 3.98001 18.6702 3.97001 18.6102 3.97001C18.4902 3.97001 18.0402 4.03001 17.3002 4.82001C16.7602 5.40001 16.0203 5.71001 15.2803 5.67001C14.5303 5.63001 13.8302 5.24001 13.3502 4.61001L12.3403 3.27001C11.8503 2.61001 11.1102 2.61001 10.6202 3.27001L9.60022 4.63001C9.13022 5.26001 8.44026 5.64001 7.70026 5.68001C6.96026 5.72001 6.22024 5.41001 5.68024 4.84001C5.07024 4.18001 4.60027 3.96001 4.34027 3.97001C4.28027 3.97001 4.21025 3.99001 4.13025 4.07001C3.86025 4.70001 3.73022 5.65001 3.73022 7.05001V16.97C3.73022 18.38 3.86025 19.33 4.13025 19.96C4.22025 20.04 4.28027 20.05 4.34027 20.06C4.59027 20.07 5.06023 19.85 5.67023 19.2C6.20023 18.63 6.89026 18.33 7.58026 18.33Z"
                    fill="white" />
                <path
                    d="M16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z"
                    fill="white" />
                <path
                    d="M14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5Z"
                    fill="white" />
            </svg>
                <span class="sr-only">Setting</span>
            </a>
            <div id="tooltip-profile" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                Setting
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>
