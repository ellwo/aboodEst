<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>{{ $service->titel }}</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('service') }}">الخدمات</a></li>
                <li>{{ $service->titel }}</li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
        <div class="container" data-aos="fade-up" data-aos-delay="100">


            <div class="flex flex-col items-center justify-center mx-auto mb-4 md:w-1/2 md:text-lg">
                <div class="mx-auto mb-2 text-3xl font-bold">{{ $service->titel }} <i class="{{ $service->img }}"></i></div>
                <p class="p-2 border-r-4 border-r-black ">{{ $service->note }}</p>
            </div>
            <div class="row gy-4">

                <div class=" nav nav-tabs col-lg-4">
                    <div class="w-full services-list">

                        @php
                            $it=0;
                        @endphp
                       @foreach ($service->service_parts as $ser)

                       <a class="cursor-pointer @php
                           if($it==0)
                           echo 'active show';
                           $it++;
                       @endphp" data-bs-toggle="tab" data-aos="fade-up" data-bs-target="#tab-{{ $ser->id }}">
                        {{ $ser->titel }}</a>
                       @endforeach
                    </div>

                </div>

                <div class="col-lg-8">


                    @php
                        $it=0;
                    @endphp

                <div class="tab-content">

                    @foreach ($service->service_parts as $ser)
                    <div class="tab-pane @php
                    if($it==0)
                    echo 'active show';
                    $it++;
                @endphp" id="tab-{{ $ser->id }}" data-aos="fade-up">

                  <x-frontend.service-desc :post="$ser"/>

<br><hr>

                        @foreach ($ser->steps??[] as $s)
                        <div class="pb-0 mt-2 mb-0 text-right section-header">
                            <h5 class="font-bold">
                            {{ $s['title'] }}</h5>
                        </div>
                        <ul>

                        @foreach ($s['steps']??[] as $k=>$hs)

                           <li>
                                @if ($s['type']=="counter")

                                <i class="">{{ $k+1 }}</i>
                                @else
                                <i class="">*</i>
                                @endif
                                <span>
                                  {{ $hs }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="w-50">
                        @endforeach







                    </div>
                    @endforeach

                </div>
                </div>

            </div>

        </div>
    </section>

</x-public-layout>
