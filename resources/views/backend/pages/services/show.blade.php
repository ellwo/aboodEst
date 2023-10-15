@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=> $service->titel ?? "" ])

@section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-8 col-md-6 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>عرض تقاصيل الخدمة :- {{ $service->titel }}</h6>
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
                      <input type="text" disabled  name="titel" class="form-control" id="exampleFormControlInput1" value="{{ $service->titel }}" placeholder="ادخل اسم الخدمة">

                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">ايقونة الخدمة</label>


        <div dir="l" class="mb-4 input-group">
            <span class="input-group-text"><i class="{{ $service->img }} "></i></span>
            <input type="text" disabled name="img" class="form-control" id="exampleFormControlInput1" value="{{ $service->img }}"/>

        </div>

                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">الخدمات الفرعية </label>
                    </div>
                    <div class="form-group">

                        @foreach ($service->service_parts as $serPart)
                        <h2 for="exampleFormControlSelect1">{{ $serPart->titel }}</h2>

             <div dir="l" class="mb-4 input-group">
                    <span class="input-group-text"><i class="{{ $serPart->titel }} "></i></span>
                    <div class="form-control">

                        @php
                            foreach($serPart->steps as $st){
            echo "<strong>عنوان :-  </strong>".$st['title']."<br/>";
            $i=1;
            foreach($st['steps'] as $p=>$k){
                if(gettype($k) === "string"){
                echo   ($st['type']=="counter"?($i++)."-":"<i class='fa-solid fa-circle'></i>")." ".$k."<br/>";}
                else if(gettype($k)=="array")
                {
                    echo   ($st['type']=="counter"?$i++:"<i class='fa-solid fa-circle'></i>")." ".$p."<br/>";
                    foreach($k as $v){
                        echo "\t     -$v<br/>   ";
                    }
                }
            }
        }
                        @endphp

                    </div>

                    </div>

                        @endforeach




                      </div>


                    {{-- <div class="d-flex">

                        <button type="submit" class="mx-auto btn bg-gradient-success">حفظ <i class="mx-2 fa fa-save"></i></button>
                    </div> --}}

                  </form>
            </div>
        </div>
    </div>
   </div>

   @endsection
