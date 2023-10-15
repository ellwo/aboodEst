<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>اخر الاخبار</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>اخر الاخبار</li>
            </ol>

        </div>
    </div>

    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up" ">



<div class=" section-header">
    <h2>اخر الاخبار</h2>
    <p></p>
  </div>

  <div class="row gy-5 ">



    @foreach ($posts as $p)
    <div class="col-xl-4 col-md-6 " data-aos="fade-up " data-aos-delay="100 ">
        <div class="post-item position-relative h-100 ">

          <div class="overflow-hidden post-img position-relative ">
            <img src="{{ $p->img }}" class="img-fluid " alt=" ">
            <span class="post-date ">{{ $p->created_at }}</span>
          </div>

          <div class="post-content d-flex flex-column ">

            <h3 class="post-title ">{{ $p->titel }}</h3>

            <div class="meta d-flex align-items-center ">
              <div class="d-flex align-items-center ">
                <i class="bi bi-person "></i> <span class="ps-2 ">{{ $p->user?->name }}</span>
              </div>
              <span class="px-3 text-black-50 ">/</span>

            </div>

            <hr>

            <a href="{{ route('post.show',$p) }}" class="readmore stretched-link "><span>اقراء المزيد</span><i
                class="bi bi-arrow-right "></i></a>

          </div>

        </div>
      </div><!-- End post item -->

    @endforeach

  </div>

  <div dir="ltr" class="m-auto mt-2 w-50">

  {{ $posts->links() }}

  </div>
  </div>
</section>



</x-public-layout>
