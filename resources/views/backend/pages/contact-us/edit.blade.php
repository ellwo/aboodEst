@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>'الرد على استفسار '])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-10 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>الرد على   :- {{ $contact->email }}</h6>
                            <p class="text-sm">

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

<a href="{{ route('contacts') }}" class="btn bg-gradient-info btn-sm">عودة الى القائمة <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>

                <form dir="rtl" class="p-4" method="POST" action="{{ route('service_prices.update',$contact) }}">
                    @method('PUT')
                    @csrf

                    <div class="">

                        <td>
                        </td>
                        <td class="">
                            <div class="border card">
                               <div class="card-header">

                                <div class="px-2 py-1 d-flex">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">اسم المرسل : {{ $contact->name }}</h6>
                                        <p class="mb-0 text-sm font-bold text-info">رقم الهاتف :{{ $contact->phone }}</p>
                                        <p class="mb-0 text-xs text-secondary">البريد الالكتروني{{ $contact->email }}</p>

                                    </div>
                                </div>
                                <p class="mb-0 text-lg font-weight-bold">الموضوع : {{ $contact->subject }}</p>
                                <p class="mb-0 text-lg font-weight-bold">محتوى الرسالة: </p>
                                <p
                            style="text-wrap: balance;"
                            class="mb-0 text-sm ">{{ $contact->message }}
                            </p>
                               </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </td>
                    </div>

                      <div class="form-group">
                        <label for="note">الرد </label>
                        <textarea name="note" class="form-control" id="note" rows="3">@php
                            echo old('reply');
                        @endphp</textarea>
                      </div>

                    <div class="d-flex">

                        <button type="submit" class="mx-auto btn bg-gradient-success">الرد <i class="mx-2 fa fa-message"></i></button>
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
