
<x-public-layout>

    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" style=" ">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>من نحن ؟</h2>
          <ol>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>
            <li>من نحن </li>
          </ol>

        </div>
      </div>
  <!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">


      <div class="row position-relative">



        <div class="col-lg-7 about-img" >


            <div dir="rtl" id="hero" class="hero">

                <div class="home-slider owl-carousel owl-loaded owl-drag">



                    <div class="relative h-screen "
                        style="
                        height: 660px;
                        background-image: url(images/bg2-2.jpg); background-size: contain;
                               background-position: center;
                               background-repeat: no-repeat;
                               ">
                        <div class="absolute inset-0 opacity-70"></div>
                    </div>

                    <div class="relative h-screen "
                        style="
                        height: 660px;
                        background-image: url(assets/img/hero-carousel/hero-carousel-44.jpg);
                         background-size: contain;
                               background-position: center;
                               background-repeat: no-repeat;
                               ">
                        <div class="absolute inset-0 opacity-70"></div>
                    </div>

                </div>
                </div>
        </div>

        <div class="col-lg-7">
          <h2><x-app-name-text/></h2>
          <div class="our-story">
            <h4>منذ عام 2003</h4>
            <h3>قصتنا</h3>
            <p>تأسست مجموعة أجياد في عام 2004م ودشنت نشاطها بتقديم خدمات الحج والعمرة ثم الأيدي العاملة وتخليص التأشيرات المتنوعة وتذاكر السفر..  مجموعة أجياد وفي ظل منافسة كبيرة وصعوبات شهدتها وتشهدها كل من سوق تخليص التأشيرات وخدمات الحج والعمرة في اليمن استطاعت في وقت قياسي أن تحقق حضوراً معتبراً داخل هذه السوق حتى صارت في الصدارة.</p>

          </div>
        </div>

      </div>

    </div>
  </section>


  <section id="stats-counter" class="stats-counter section-bg">
    <div class="container">


        <div class="py-0 m-0 mb-4 section-header">
            <h2>نعتز بأرقامنا </h2>

        </div>
      <div class="flex justify-center text-center row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="flex-shrink-0 bi bi-emoji-smile color-blue"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="23200" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>عميل سعيد</p>
            </div>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="flex-shrink-0 bi bi-journal-richtext color-orange"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="52100" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>معاملة منجزة</p>
            </div>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item d-flex align-items-center w-100 h-100">
            <i class="flex-shrink-0 fa fa-hands-helping color-green"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>عام من الخبرة</p>
            </div>
          </div>
        </div><!-- End Stats Item -->

        <!-- End Stats Item -->

      </div>

    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Stats Counter Section ======= -->

  <x-slot name="script">
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }} "></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }} "></script>
    <script src="{{ asset('assets/vendor/owl/js/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/vendor/owl/js/owl.carousel.min.js') }} "></script>


         <script type="text/javascript">

             $(document).ready(function () {
                $('.home-slider').owlCarousel({
                  loop:true,
                  autoplay: true,
                  margin: 0,
                  animateOut: 'fadeOut',
                  animateIn: 'fadeIn',
                  autoplayHoverPause: true,
                  items: 1,
                  responsive: {
                      0: {
                          items: 1,
                          nav: false,
                          dots: false
                      },
                      600: {
                          items: 1,
                          nav: false,
                          dots: false
                      },
                      1000: {
                          items: 1,
                          nav: false,
                          dots: false
                      }
                  }
              });

    new PureCounter();



             });
              </script>

</x-slot>
</x-public-layout>
