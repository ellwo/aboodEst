<section id="team" class="team">
    <div class="container" data-aos="fade-up">

        <div class="section-header mx-auto">
            <h2>فروعنا</h2>
            <p>هنا قائمة بعناوين فروعنا في مختلف محافضات الجمهورية اليمنية</p>
        </div>





        @foreach ($cities as $c)
            <div class="flex flex-col mt-2 mb-2">
                <div class="pb-0 mt-2 mb-0 text-right section-header">
                    <h3>
                        مكاتب {{ $c->name }}</h3>
                </div>
                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 ">



                    @foreach ($c->ads as $address)
                    <div class="flex items-center justify-between p-4 border rounded-md ">
                        <div class=" member" data-aos="fade-up" data-aos-delay="100">

                            <div class="member-info">
                                <h4>{{ $address->name }}</h4>

                               @foreach ($address->phone ?? [] as $phone)

                                <span>
                                    <i class="mx-2 fa fa-phone"></i>
                                     <a href="callto:{{ $phone }}">{{ $phone }}</a>
                                </span>
                               @endforeach

                                <p>
                                    <i class="mx-2 fa fa-map-marker"></i>
                                {{ $address->address }}
                                </p>
                            </div>

                            @if ($address->map_link!="#")

                            <a href="{{ route('contact') }}"
                            class="mx-auto mt-4 text-left  ">عرض
                               ع خرائط جوجل <i class="bi bi-arrow-left"></i>
                           </a>
                            @endif
                        </div>

                    </div>

                    @endforeach



                </div>


            </div>
        @endforeach





    </div>
</section><!-- End Our Team Section -->
