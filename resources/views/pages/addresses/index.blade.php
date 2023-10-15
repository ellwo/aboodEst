<x-public-layout>






    <div class="breadcrumbs d-flex align-items-center bg-m_secondary" >
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>فروعنا</h2>
            <ol>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>فروعنا</li>
            </ol>

        </div>
    </div>

    @include('pages.addresses.address-list')
     </x-public-layout>
