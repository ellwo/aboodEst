@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>' اضاقة اصناف لخدمة '])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-6 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>اضافة اصناف لخدمة   :- </h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<button type="button" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('services.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">اسم الخدمة</label>
                      <input type="text" required name="titel" class="form-control" id="exampleFormControlInput1" value="{{old('titel') }}" placeholder="ادخل اسم الخدمة">
                      <x-input-error :messages="$errors->get('titel')" class="mt-2" />

                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">ايقونة الخدمة</label>


        <div dir="l" class="mb-4 input-group">
            <span class="input-group-text"><i class="fa-solid fa-circle"></i></span>
            <input type="text" required name="img" class="form-control" id="exampleFormControlInput1" value="{{ old('img','fa-solid fa-circle') }}"/>
            <x-input-error :messages="$errors->get('img')" class="mt-2" />

        </div>

                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">وصف الحدمة</label>
                      <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
