@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl', 'title' => 'الرسائل والاستفسارات'])
@section('content')
    <!-- End Navbar -->
    <div class="py-4 container-fluid">
        <div dir="rtl" class="row">
            <div class="col-12">
                <div class="mb-4 card">
                    <div class="pb-0 card-header">
                        <h6>الرسائل والاستفسارات</h6>
                    </div>
                    <div dir="rtl" class="px-0 pt-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            معلومات المرسل</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            الموضوع</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            الحالة</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            التاريخ</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($contacts as $contact)

                                    <tr>
                                        <td>
                                            <div class="px-2 py-1 d-flex">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $contact->name }}</h6>
                                                    <p class="mb-0 text-sm font-bold text-info">{{ $contact->phone }}</p>
                                                    <p class="mb-0 text-xs text-secondary">{{ $contact->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="">
                                            <p class="mb-0 text-xs font-weight-bold">{{ $contact->subject }}</p>
                                            <p
                                            style="max-width: 15vw; overflow-y: hidden; overflow-x: hidden;"
                                            class="mb-0 text-xs text-secondary">{{ $contact->message }}
                                            </p>
                                        </td>
                                        <td class="text-sm text-center align-middle">
                                            @if ($contact->reply=="")

                                            <span class="badge badge-sm bg-gradient-secondary">لم يتم الرد</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-success">تم الرد {{ $contact->updated_at }}</span>

                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="text-xs text-secondary font-weight-bold">{{ $contact->created_at }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('contacts.edit',$contact) }}" class="text-xs text-secondary font-weight-bold"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                               عرض ورد
                                            </a>
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
