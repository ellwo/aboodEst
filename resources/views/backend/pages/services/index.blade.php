@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
 'title' => 'ادارة الخدمات'])
@section('content')
    <!-- End Navbar -->
    <div class="py-4 container-fluid">
        <div class="my-4 row">
            <div class="mx-auto mb-4 h-100 col-lg-8 col-md-10 mb-md-0">
                <div class="card ">
                    <div dir="rtl" class="pb-0 card-header">
                        <div class="mb-3 row">
                            <div class="col-6">
                                <h6>ادارة الخدمات  </h6>
                                <p class="text-sm">

                                    <a href="{{ route('services.create') }}" class="btn bg-gradient-info btn-sm">اضافة
                                        سعر خدمة <i class="fa fa-plus"></i></a>
                                    <x-auth-session-status class="mb-4" class="alert-primary" :title="session('title') ?? 'ملاحظة !'"
                                        :status="session('status')" />

                                </p>
                            </div>
                            <div class="my-auto col-6 text-start">

                            </div>
                        </div>
                    </div>
                    <div class="p-0 pb-2 card-body">
                        <div class="table-responsive">
                            <table dir="rtl" class="table mb-0 ">
                                <thead>
                                    <tr>
                                        <th class="text-lg text-uppercase text-secondary font-weight-bolder opacity-7">
                                            عنوان الخدمة </th>



                                        <th class="text-lg text-uppercase text-secondary font-weight-bolder opacity-7 ">
                                            عدد الفئات \الخدمات الفرعية</th>

                                        <th
                                            class="text-lg text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                            ادارة</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                <i class="{{ $service->img }} mx-2"></i>
                                                {{ $service->titel }}
                                            </td>
                                            <td class="underline text-info link">
                                                {{ $service->service_prices->count() }}
                                            </td>

                                            <td dir="ltr" class="">


                                                <div class="my-auto col-6 text-start">
                                                    <div class="dropdown float-start ps-4">
                                                        <a class="p-4 cursor-pointer" id="dropdownTable"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                                        </a>
                                                        <ul class="px-2 py-3 dropdown-menu me-n4"
                                                            aria-labelledby="dropdownTable">
                                                            <li><a class="flex justify-between p-2 dropdown-item border-radius-md "
                                                                    href="{{ route('services.edit', $service->id) }}">تعديل
                                                                    <i class="mx-2 fa fa-edit"></i></a></li>
                                                            <li><a class="flex justify-between p-2 dropdown-item border-radius-md"
                                                                    href="{{ route('services.create', ['copy' => $service->id]) }}">نسخ
                                                                    <i class="mx-2 fa fa-copy"></i></a></li>

                                                            <li>
                                                                <form
                                                                    action="{{ route('services.destroy', $service) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="dropdown-item border-radius-md"
                                                                        href="javascript:;">
                                                                        حذف <i class="fa fa-delete"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{-- <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">

                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">{{ $se->id }}</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div> --}}


                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection




{{--
@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl', 'title' => 'ادارة الخدمات'])
@section('content')
    <!-- End Navbar -->
    <div class="py-4 container-fluid">
        <div class="my-4 row">
            <div class="mx-auto mb-4 col-lg-8 col-md-6 mb-md-0">
                <div class="card">
                    <div dir="rtl" class="pb-0 card-header">
                        <div class="mb-3 row">
                            <div class="col-6">
                                <h6>الخدمات </h6>
                                <p class="text-sm">

                                    <a href="{{ route('services.create') }}" class="btn bg-gradient-info btn-sm">اضافة خدمة
                                        جديدة <i class="fa fa-plus"></i></a>
                                    <x-auth-session-status class="mb-4" class="alert-primary" :title="session('title') ?? 'ملاحظة !'"
                                        :status="session('status')" />

                                </p>
                            </div>
                            <div class="my-auto col-6 text-start">

                            </div>
                        </div>
                    </div>
                    <div class="p-0 pb-2 card-body">
                        <div class="table-">
                            <table dir="rtl" class="table mb-0 ">
                                <thead>
                                    <tr>
                                        <th class="text-lg text-uppercase text-secondary font-weight-bolder opacity-7">
                                            الخدمة</th>
                                        <th class="text-lg text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            عدد فئات الحدمة</th>
                                        <th
                                            class="text-lg text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                            ادارة</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($services as $se)
                                        <tr>
                                            <td>
                                                <div class="px-2 py-1 d-flex">
                                                    <div>
                                                        <i class="{{ $se->img }} mx-2"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $se->titel }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                                <span class="badge bg-gradient-primary">10</span>
                                            </td>
                                            <td dir="ltr" class="">
                                                 <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">{{ $se->id }}</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                                <button type="button" class="btn bg-gradient-danger btn-sm">حذف <i
                                                        class="fa fa-delete"></i></button>
                                                <a href="{{ route('services.edit', $se->id) }}"
                                                    class="btn btn-outline-warning btn-sm">تعديل <i
                                                        class="fa fa-edit"></i></a>

                                                <a href="{{ route('service.show', $se->id) }}"
                                                    class="btn btn-outline-success btn-sm">عرض <i class="fa fa-eye"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



    <div class="card">
    <div class="table-responsive">
      <table dir="rtl" class="table mb-0 align-items-center">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">John Michael</h6>
                  <p class="mb-0 text-xs text-secondary">john@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Manager</p>
              <p class="mb-0 text-xs text-secondary">Organization</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">23/04/18</span>
            </td>
            <td class="align-middle">
              <a href="javascript:;" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Alexa Liras</h6>
                  <p class="mb-0 text-xs text-secondary">alexa@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Programator</p>
              <p class="mb-0 text-xs text-secondary">Developer</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">11/01/19</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                  <p class="mb-0 text-xs text-secondary">laurent@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Executive</p>
              <p class="mb-0 text-xs text-secondary">Projects</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">19/09/17</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Michael Levi</h6>
                  <p class="mb-0 text-xs text-secondary">michael@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Programator</p>
              <p class="mb-0 text-xs text-secondary">Developer</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">24/12/08</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Richard Gran</h6>
                  <p class="mb-0 text-xs text-secondary">richard@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Manager</p>
              <p class="mb-0 text-xs text-secondary">Executive</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">04/10/21</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Miriam Eric</h6>
                  <p class="mb-0 text-xs text-secondary">miriam@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Programtor</p>
              <p class="mb-0 text-xs text-secondary">Developer</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">14/09/20</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

--}}
