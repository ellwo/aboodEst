@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl'])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-12 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>تعديل خدمة :- {{ $service->titel }}</h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<a href="{{ route('services') }}" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('services.update',$service->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">اسم الخدمة</label>
                      <input type="text" required name="titel" class="form-control" id="exampleFormControlInput1" value="{{ $service->titel }}" placeholder="ادخل اسم الخدمة">
                      <x-input-error :messages="$errors->get('titel')" class="mt-2" />

                    </div>
                    <div class="form-group">

                      <label for="exampleFormControlSelect1">ايقونة الخدمة</label>

                      <input type="hidden" name="img" id="img" value="{{ $service->img }}">

        <div dir="l" class="mb-4 input-group">
                <div class="dropdown ">
                    <a href="#" class="btn dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                        <i id="theicon" class="{{ old('img',$service->img) }} "></i> ايقونة الخدمة
                    </a>
                    <ul id="selectison" style="height: 30vh !important; overflow-y: auto !important;" class="dropdown-menu h-24" aria-labelledby="navbarDropdownMenuLink2">
                        <li>
                            <div class="dropdown-item" >
                                <i class=""></i>
                            </div>
                        </li>
                    </ul>
                  </div>
        </div>

                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">وصف الحدمة</label>
                      <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $service->note }}</textarea>
                    </div>



                    <div class="d-flex">

                        <button type="submit" class="mx-auto btn bg-gradient-success">حفظ <i class="mx-2 fa fa-save"></i></button>
                    </div>

                  </form>
            </div>
        </div>
    </div>
   </div>

   @endsection
   @push('js')
   <script src="{{ asset('assets/js/icons_select.js')}}"></script>


   @endpush
