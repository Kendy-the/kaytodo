<form action="/account/search" method="post" class="hidden items-center {{ isset($myClass[0]) ? $myClass[0] : '' }}">
    <i class='bx bx-search text-lg {{ isset($myClass[1]) ? $myClass[1] : '' }}'></i>
    <input type="hidden" name="object" value="{{ $object }}"/>
    <input type="search" name="" id="" placeholder="Search"
        class="relative right-6 rounded ps-8 h-9 border-[#DFEAF2] focus:outline-2 focus:outline-offset-2 focus:outline-violet-400 {{ isset($myClass[2]) ? $myClass[2] : '' }}"/>
</form>
