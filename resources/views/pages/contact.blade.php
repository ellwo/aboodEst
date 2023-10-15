
<x-public-layout>

    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" style=" ">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>اتصل بنا</h2>
          <ol>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>
            <li>تواصل معنا</li>
          </ol>

        </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-map"></i>
                <h3>عنواننا </h3>
                <p>
                   صنعاء- قطاع تخليص التأشيرات أمام السفارة السعودية <br>
                    بجوار هيئة الاستثمار

                </p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-envelope"></i>
                <h3>ارسل لنا ايميل</h3>
                <p><a href="mailto:info@ajyadgroup.net">info@ajyadgroup.net</a></p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-telephone"></i>
                <h3>اتصل بنا </h3>
                <p><a href="callto:01-267440">01-267440 </a> | <a href="callto:01-240800"> 01-240800</a></p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="mt-1 row gy-4">

            <div class="col-lg-6 ">
              <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1923.8827628153222!2d44.20513845842825!3d15.33497248392893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603db29b8ac6397%3A0x82e29c24e2bcd842!2sAjyad%20Group!5e0!3m2!1sen!2s!4v1689799947635!5m2!1sen!2s"
                frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="col-lg-6">

            @livewire('contact-us-form')
            </div><!-- End Contact Form -->

          </div>

        </div>
      </section><!-- End Contact Section -->


      @slot('script')
          @livewireScripts
      @endslot
      @slot('style')
          @livewireStyles
      @endslot
      @include('pages.addresses.address-list')
</x-public-layout>
