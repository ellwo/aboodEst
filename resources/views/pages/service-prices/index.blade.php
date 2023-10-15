<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>قائمة الاسعار</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>قائمة الاسعار</li>
            </ol>

        </div>
    </div>


    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>قائمة الاسعار</h2>
                <p></p>
            </div>


            <div class="slides-4 swiper">
                <div class="flex flex-wrap justify-center w-full">


                    @foreach ($service_prices as $service_price)

                    <div class="swiper- lg:w-1/4 ">
                        <div class="testimonial-wrap ">
                            <div class="testimonial-item lg:w-3/4 rounded-md border flex flex-col justify-between">

                                <div>
                                    <h3>{{ $service_price->titel }}</h3>
                                    <hr>

                                </div>

                              <div>
                                <div class="">

                                    <span class=" font-bold">{{ $service_price->active?"متاح ":"غير متاح" }}

                                    </div>
                                <h4>السعر</h4>
                                <span class="text-xl font-bold">{{ $service_price->price!=0? $service_price->price:'غير محدد' }}
                                <span class="text-sm">/ريال سعودي</span></span>


                              </div>

                        <a href="{{ route('service_price.show', $service_price) }}" class="readmore stretched-link">التفاصيل <i
                            class="bi bi-arrow-left"></i></a>
                            </div>

                        </div>
                    </div>

                    @endforeach
                    <!-- End testimonial item -->
                    <!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>


</x-public-layout>

