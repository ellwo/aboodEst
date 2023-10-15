@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>' اضاقة عداد جديد'])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-6 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>اضافة  عداد جديد  :- </h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<button type="button" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('counters.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">اسم العداد </label>
                      <input type="text" required name="titel" class="form-control" id="exampleFormControlInput1" value="{{old('titel') }}" placeholder="ادخل اسم الخدمة">
                      <x-input-error :messages="$errors->get('titel')" class="mt-2" />

                    </div>

                    <input type="hidden" name="img" id="img" value="">

                    <div dir="l" class="mb-4 input-group">
                            <div class="dropdown ">
                                <a href="#" class="btn dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                    <i id="theicon" class="{{ old('img') }} "></i> ايقونة العداد
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

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">قيمة العداد</label>
                        <input name="value" type="number" value="{{ old('value')}}" class="form-control" id="exampleFormControlTextarea1"  />
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
