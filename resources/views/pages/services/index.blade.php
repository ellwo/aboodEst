<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>خدماتنا</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>الخدمات</li>
            </ol>

        </div>
    </div>



    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>خدماتنا</h2>
                <p>نحن نقدم العديد من الخدمات في مجال السفريات بشكل عام
                </p>
            </div>

            <div class="row gy-4">



                @foreach ($services as $service)

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="{{ $service->img }}"></i>

                        </div>
                        <h3>{{ $service->titel }}</h3>
                        <p>
                            {{ $service->note }}</p>
                        <a href="{{ route('service.show', $service) }}" class="readmore stretched-link">اقراء المزيد <i
                                class="bi bi-arrow-left"></i></a>
                    </div>
                </div>
                @endforeach
                <!-- End Service Item -->

                <!-- End Service Item -->

                <!-- End Service Item -->

            </div>

        </div>
    </section>

    <div dir="ltr" class="m-auto mt-2 w-50">

  {{ $services->links() }}

  </div>



</x-public-layout>
