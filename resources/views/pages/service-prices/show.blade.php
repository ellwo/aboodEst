<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>{{ $post->titel }}</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('service_price') }}">قائمة الاسعار</a></li>
                <li>{{ $post->titel }}</li>
            </ol>

        </div>
    </div>

    <section id="blog" class="blog py-0">
        <div class="container" data-aos="fade-up" data-aos-delay="100">


          <div class=" row g-5">

            <x-frontend.service-desc :post="$post"/>

            <div class="col-lg-2"></div>

          </div>

        </div>
      </section><!-- End Blog Details Section -->



</x-public-layout>
