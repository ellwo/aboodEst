<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="p-0 pb-2 card-body">
        <div class="table- p-2" >

            <div class="ms-md-auto pe-md-3 col-lg-8 mx-auto my-4  d-flex align-items-center">
                <div dir="rtl" class="input-group border border-dark">
                    <span class="input-group-text text-body"><i class="fas fa-search"
                            aria-hidden="true"></i></span>
                    <input type="text" class="form-control " wire:model.blur='search' placeholder="ابحث ...">
                </div>

            </div>
            <table dir="rtl" class="table mb-0 ">
                <thead>
                    <tr>
                        <th class=" text-uppercase  font-weight-bold ">
                            رقم الجواز</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            الاسم</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            اسم المكتب</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            تاريخ الاستلام</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            تاريخ الارسال الى السفارة</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            تاريخ الخروج من السفارة</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            تاريخ التسليم</th>
                            <th
                            class=" text-uppercase  font-weight-bold  ps-2">
                            الحالة</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($passports as $p)

                    <tr>
                        <td>{{ $p->pass_num }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->office_name }}</td>
                        <td>{{$p->received_date  }}</td>
                        <td>{{ $p->sending_embassy_date }}</td>
                        <td>{{ $p->departure_embassy_date }}</td>
                        <td>{{ $p->delivery_date }}</td>
                        <td>{{ $p->state_info }}</td>

                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
        {{ $passports->links() }}
    </div>
</div>
