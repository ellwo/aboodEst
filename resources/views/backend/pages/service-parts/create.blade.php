@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>' اضاقة سعر خدمة جديدة'])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-10 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>اضافة  سعر خدمة جديدة  :- </h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<button type="button" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('service_prices.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">اسم الخدمة</label>
                        <input type="text" required name="titel" class="form-control"
                         id="exampleFormControlInput1" value="{{old('titel') }}" placeholder="ادخل اسم الخدمة">
                        <x-input-error :messages="$errors->get('titel')" class="mt-2" />

                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">سعر الخدمة</label>
                        <input type="number" required name="price" class="form-control"
                         id="exampleFormControlInput1" value="{{old('price',0) }}" placeholder="ادخل سعر الخدمة">
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />

                      </div>


                      <div class="col-4">
                        <label for="exampleFormControlInput1">الحالة</label>

                        <div class="mb-3 ">
                            <label class="w-full h-4 form-control" x-bind:for="'customRadio0">متاح
                                                                         <input class="form-check-input" type="radio" value="1" checked="" name="active"
                                                                            x-bind:id="'customRadio0">
                                                                    </label>
                        </div>
                        <div class="">
                            <label class="w-full h-4 form-control " for="customRadio2">غير متاح
                                                                        <input class="form-check-input" type="radio" value="0" name="active"
                                                                        id="customRadio2">
                                                                    </label>
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">وصف الحدمة</label>
                        <textarea name="note" class="form-control" id="note" rows="6"></textarea>
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
   <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
   <script src="{{ asset('assets/js/ar.js') }}"></script>

<script>

ClassicEditor
    .create( document.querySelector( '#note' ), {
        language: {
            // The UI will be English.
            ui: 'ar',

            // But the content will be edited in Arabic.
            content: 'ar'
        }  ,
         removePlugins: [],
         ckfinder: {
                    uploadUrl: "{{route('image.upload').'?_token='.csrf_token()}}",
        }

    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>

@endpush
