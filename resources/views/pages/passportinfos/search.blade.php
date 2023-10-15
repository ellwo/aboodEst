<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>الاستعلام عن حالة جواز</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>الاستعلام عن حالة جواز</li>
            </ol>

        </div>
    </div>


    <section id="get-started" class="get-started section-bg">
        <div class="container">

            <div class="row justify-content-between gy-4">

                <div class="flex flex-col d-flex align-items-center" data-aos="fade-up">


                    <div class="py-0 m-0 mb-0 section-header">
                        <h2>الاستعلام على حالة الجواز</h2>

                    </div>
                    <div class="content">
                        <p>
                            يمكنك ويسهولة متابعة حالة معاملة جوازك من اي مكان فقط ب ادخال رقم الجواز
                        </p>
                    </div>

                    <form onsubmit="ajxaproform(event,this,'{{ route('pass.search') }}')" method="POST" class="w-full text-center php-email-form lg:w-2/3">

                        @csrf

                        <div class="py-0 m-0 section-header">
                            <h4 class="text-lg font-bold md:text-2xl">قم بادخال رقم الجواز</h4>
                        </div>

                        <div class="w-full ">

                            <div class="w-full">
                                <input autofocus="true" type="text" name="pass_num"
                                    class="w-full p-2 font-bold border rounded-md focus md:w-2/3 md:text-2xl focus:border-blue-600"
                                    placeholder="رقم الجواز" required>
                            </div>


                            <div class="mt-2 text-center col-md-12">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your quote request has been sent successfully. Thank you!
                                </div>

                                <button class="relative" id='btnsubmit' type="submit">بحث <i class="fa fa-search"></i></button>
                                <div id="search_con" class="">

                                </div>

                            </div>

                        </div>
                    </form>




                </div>

                <!-- End Quote Form -->

            </div>

        </div>
    </section>


    <x-slot name="script">


        <script src="{{ asset('assets/vendor/owl/js/jquery.min.js') }} "></script>
        <script src="{{ asset('assets/js/search_pass.js') }}"></script>

    </x-slot>

</x-public-layout>
