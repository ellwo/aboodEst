
<header dir="ltr" style="direction: ltr !important;" id="header"
class="top-0 transition-transform duration-500 header align-items-center"
:class="{
    ' hidden translate-y-0': scrollingDown,
    'fixed bg-base-30': scrollingUp,
    'fixed ':!scrollingDown && !scrollingUp
}"

>
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <i class="mobile-nav-toggle mobile-nav-show fa fa-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none fa fa-x"></i>
        <nav dir="rtl" id="navbar" class="navbar ">

            <ul>
                <li><a href="{{ route('home') }}" class="
                    @if (request()->routeIs('home'))
                    active
                    @else
                    @endif
                    ">الرئيسية</a></li>

                    <li><a href="{{(request()->routeIs('home')||request()->routeIs('pass.search.get'))?'#get-started':route('pass.search.get',['key'=>'الاستعلام-عن-حالة-جواز'])}}"
                        class="{{ request()->routeIs('pass.search.get')?'active':'' }}"
                        >الاستعلام عن جواز</a></li>

                <li><a href="{{request()->routeIs('home')?'#services': route('service')}}"

                    class="@if (request()->routeIs('service')||request()->routeIs('service.*'))
                    active
                    @else
                    @endif">الخدمات</a></li>
                <li><a class=" @if (request()->routeIs('address'))
                    active
                    @else
                    @endif" href="{{ route('address') }}">فروعنا</a></li>

                <li><a class="@if (request()->routeIs('post.*')||request()->routeIs('post'))
                    active
                    @else
                    @endif" href="{{ route('post') }}">اخر الاخبار</a></li>


                    <li><a class="@if (request()->routeIs('service_price')||request()->routeIs('service_price.*'))
                        active
                        @else
                        @endif" href="{{ route('service_price') }}">قائمة الاسعار</a></li>

                {{-- <li class="dropdown"><a href="#"><span>مواقع التواصل الاجتماعي</span> <i
            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> --}}
                <li><a class="{{ request()->routeIs('about-us')?'active':'' }}"
                     href="{{(request()->routeIs('home')||request()->routeIs('about-us'))?'#alt-services':route('about-us')}}">من نحن</a>
                </li>

                <li><a class="  @if (request()->routeIs('contact'))
                    active
                    @else

                    @endif" href="{{ route('contact') }}">تواصل معنا </a></li>
            </ul>
        </nav>

        <a href="{{ route('home' ) }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1
            :class="{
                'hidden ': scrollingUp,
                'block':!scrollingDown && !scrollingUp
            }"
            class="text-center"
            ><x-application-logo class="h-14 sm:h-16 lg:h-24"/><span>
            <x-app-name-text/>
            </span></h1>
            <h1
            :class="{
                ' block': scrollingDown,
                'hidden':!scrollingDown && !scrollingUp
            }"
            class="flex items-center justify-center text-center"
            >
           <img src="{{ asset('images/icon-logo.png') }}" class="h-12" alt="" srcset="">
           <x-app-name-text/>
           <span></span></h1>
        </a>

        <!-- .navbar -->

    </div>
</header>
