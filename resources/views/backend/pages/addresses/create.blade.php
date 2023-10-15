@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>' اضاقة فرع جديد'])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-10 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>اضافة  فرع جديد  :- </h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<a href="{{ route('addresses') }}" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('addresses.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">اسم الفرع</label>
                      <input type="text" required name="name" class="form-control"
                       id="exampleFormControlInput1" value="{{old('name') }}" placeholder="ادخل اسم الفرع">
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                    <div x-data='{"phones_count":0}' class="form-group  ">
                        <label for="exampleFormControlInput12">ارقام الهاتف</label>

                        <div class="text-center flex">
                        <input type="text" required name="phone[]" class="form-control" id="exampleFormControlInput12"  placeholder="">

                        <template x-for="i in phones_count">


        <div dir="l" class="mb-4 input-group">
            <span onclick=" $(this).parent().removeClass('mb-4');$(this).parent().html('');" class="input-group-text bg-danger"><i class="fa-solid fa-remove "></i></span>
                            <input type="text"  name="phone[]"
                            class="form-control"  placeholder=""/>
        </div>
                        </template>
                        <button @click="phones_count++;" class="btn btn-success btn-sm mt-1 mx-auto" type="button"> اضافة رقم <i class="fa fa-plus"></i> </button>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="exampleFormControlInput12">المدينة</label>
                      <select name="city_id" class="form-control">
                        @foreach ($cities as $city )
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                      </select>
                      </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput144">الشارع</label>
                        <input type="text" required name="st_name"
                         class="form-control" id="exampleFormControlInput144"
                          value="{{old('st_name') }}" placeholder="ادخل اسم الشارع الرئيسي">
                        <x-input-error :messages="$errors->get('st_name')" class="mt-2" />

                      </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput100">العنوان</label>
                        <input type="text" required name="address" class="form-control"
                        id="exampleFormControlInput100" value="{{old('address') }}" placeholder="ادخل العنوان">
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />

                      </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput12">رابط خرائط جوجل</label>
                        <input type="text" dir="ltr" required name="map_link" class="form-control" id="exampleFormControlInput12" value="{{old('map_link','#') }}" placeholder="ادخل الرابط الخاص بخرائط جوجل">
                        <x-input-error :messages="$errors->get('map_link')" class="mt-2" />

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

