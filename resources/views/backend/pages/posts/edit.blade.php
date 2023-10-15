@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>'تعديل خبر '])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-6 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>تعديل  خبر   :- </h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<button type="button" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('posts.update',$p) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">عنوان الخبر</label>
                      <input type="text" required name="titel"
                      class="form-control" id="exampleFormControlInput1" value="{{old('titel',$p->titel) }}" placeholder="ادخل عنوان الخبر">
                      <x-input-error :messages="$errors->get('titel')" class="mt-2" />

                    </div>


                    <div class="form-group">
                        <label for="content">تفاصيل الخبر</label>
                        <textarea name="content" class="form-control" id="content" rows="3">@php
                            echo $p->content;
                        @endphp</textarea>
                      </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">الصورة </label>


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
   <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/translations/ar.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css">


<script>

ClassicEditor
    .create( document.querySelector( '#content' ), {
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

   <script src="{{ asset('assets/js/uploadeimage.js') }}"></script>
   <script>
      newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"img",
                    w:1000,
                    h:1000,
                    mx_h:600,
                    mx_w:600,
                   //vh:1000,
                   // vw:1000,
                    color:'#FFFFFF',
                   // withmask:true,
                   // with_w_h:true,
                    //maskUrl:'{{ config("mysetting.logo") }}',

                    src:"{{ old('img',$p->img) }}"
        });
   </script>

   @endpush
