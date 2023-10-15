@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>' اتعديل'])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-6 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>تعديل  شركاؤنا   :- </h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<button type="button" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('companies.update',$co) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">اسم الشريك</label>
                      <input type="text" required name="name" class="form-control"
                       id="exampleFormControlInput1"
                        value="{{old('name',$co->name) }}" placeholder="ادخل اسم الشريك">
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput12">رابط صفحة الشريك</label>
                        <input type="text" dir="ltr" required name="link"
                         class="form-control" id="exampleFormControlInput12" value="{{old('link',$co->link) }}" placeholder="ادخل اسم الشريك">
                        <x-input-error :messages="$errors->get('link')" class="mt-2" />

                      </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">الصورة \ الشعار</label>


        <div dir="l" class="mb-4 input-group">
            <span class="input-group-text"><i class="fa-solid fa-circle"></i></span>

            <div id="img"></div>
            <x-input-error :messages="$errors->get('img')" class="mt-2" />

        </div>

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


   <script src="{{ asset('assets/js/uploadeimage.js') }}"></script>
   <script>
      newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"img",
                    w:400,
                    h:200,
                    vh:200,
                    vw:400,
                    color:'#FFFFFF',
                   // withmask:true,
                    with_w_h:true,
                    //maskUrl:'{{ config("mysetting.logo") }}',

                    src:"{{ old('img',$co->img) }}"
        });
   </script>

   @endpush
