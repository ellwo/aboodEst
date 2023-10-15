{{-- <aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="m-0 navbar-brand" href="{{ route('home') }}"
            target="_blank">
            <img src="./img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Argon Dashboard 2 Laravel</span>
        </a>
    </div>
    <hr class="mt-0 horizontal dark">
    <div class="w-auto collapse navbar-collapse " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-tv-2 text-primary opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="mt-3 nav-item d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                </div>
                <h6 class="mb-0 text-xs ms-2 text-uppercase font-weight-bolder opacity-6">Laravel Examples</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-single-02 text-dark opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="#">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-bullet-list-67 text-dark opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="mt-3 nav-item">
                <h6 class="text-xs ps-4 ms-2 text-uppercase font-weight-bolder opacity-6">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-calendar-grid-58 text-warning opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  str_contains(request()->url(), 'billing') == true ? 'active' : '' }}" href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-credit-card text-success opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'virtual-reality' ? 'active' : '' }}" href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-app text-info opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'rtl' ? 'active' : '' }}" href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-world-2 text-danger opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="mt-3 nav-item">
                <h6 class="text-xs ps-4 ms-2 text-uppercase font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-single-02 text-dark opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-single-copy-04 text-warning opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-collection text-info opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="mx-3 sidenav-footer ">
        <div class="shadow-none card card-plain" id="sidenavCard">
            <img class="mx-auto w-50" src="/img/illustrations/icon-documentation-warning.svg"
                alt="sidebar_illustration">
            <div class="p-3 pt-0 text-center card-body w-100">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="mb-0 text-xs font-weight-bold">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="/docs/bootstrap/overview/argon-dashboard/index.html" target="_blank"
            class="mb-3 btn btn-dark btn-sm w-100">Documentation</a>
        <a class="mb-0 btn btn-primary btn-sm w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" type="button">Upgrade to PRO</a>
    </div>
</aside> --}}
<aside
class="my-3  border-0  bg-light sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-end me-4 rotate-caret"
id="sidenav-main">
<div class="sidenav-header">
    <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute start-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="m-0 navbar-brand" href=""
        target="_blank">
        <x-application-logo class="navbar-brand-img h-100" alt="main_logo"/>
        <br>
        <span class="mx-auto text-center me-1 font-weight-bold"><x-app-name-text/></span>
    </a>
</div>
<hr class="mt-0 horizontal dark">
<div class="w-auto px-0 collapse navbar-collapse " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link
            @if (request()->routeIs('dashboard'))
            active
            @endif
            " href="{{ route('dashboard') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-gauge text-primary opacity-10"></i>
                </div>

                <span class="nav-link-text me-1">لوحة القيادة</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->routeIs('services'))
                active
            @endif" href="{{ route('services') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-grip-vertical text-warning opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">الخدمات</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->routeIs('service_prices')||request()->routeIs('service_prices.*'))
                active
            @endif" href="{{ route('service_prices') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-grip-vertical text-warning opacity-10"></i>
                </div>
                <span class="nav-link-text me-1"> الخدمات الفرعية</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link

            @if (request()->routeIs('passportinfos')||request()->routeIs('passportinfos.*'))

            active
            @endif
            " href="{{ route('passportinfos') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-passport text-info opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">ادارة سجلات الجوازات</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link
            @if(request()->routeIs('companies'))
                active
            @endif
            " href="{{ route('companies') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-handshake text-success opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">شركاؤنا</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link

            @if (request()->routeIs('addresses')||request()->routeIs('addresses.*'))

            active
            @endif
            " href="{{ route('addresses') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-location-crosshairs text-info opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">ادارة الفروع</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link

            @if (request()->routeIs('posts'))
                active
            @endif
            " href="{{ route('posts') }}">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm fa-solid fa-newspaper text-danger opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">الاخبار</span>
            </a>
        </li>
        <li class="mt-3 nav-item">
            <h6 class="text-xs ps-4 me-4 pe-2 text-uppercase font-weight-bolder opacity-6">صفحات المرافق</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm ni ni-single-02 text-dark opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">حساب تعريفي</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../pages/sign-in.html">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm ni ni-single-copy-04 text-warning opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">تسجيل الدخول</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../pages/sign-up.html">
                <div
                    class="text-center icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                    <i class="text-sm ni ni-collection text-info opacity-10"></i>
                </div>
                <span class="nav-link-text me-1">اشتراك</span>
            </a>
        </li>
    </ul>
</div>
</aside>
