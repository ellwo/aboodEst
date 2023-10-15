@extends('backend.layouts.backend-layout', ['class' => 'g-sidenav-show bg-gray-100 rtl',
'title'=>'ادارة الجوازات'  ])
 @section('content')

   <!-- End Navbar -->
   <div class="py-4 container-fluid">
    <div class="my-4 row">
        <div class="mx-auto mb-4 col-lg-12 col-md-12 mb-md-0">
            <div class="card">
                <div dir="rtl" class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>الجوازات </h6>
                            <p class="text-sm">

<x-auth-session-status class="mb-4" class="alert-primary" :title="session('title')??'ملاحظة !'" :status="session('status')" />

                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">

                        </div>
                    </div>

    <div class=" container p-4 m-4 text-center bg-white rounded ">
        <style>
            /* Add border to table */


            /* Add border to table cells */
            td,
            th {
                border: 1px solid black;
                padding: 5px;
                font-size: 11px !important;
                font-weight: bold !important;
                color: #000 !important;
            }

            #myProgress {
                width: 100%;
                background-color: #ddd;
            }

            #myBar {
                width: 10%;
                height: 30px;
                background-color: #0091ff;
                text-align: center;
                line-height: 30px;
                color: white;
            }
        </style>
        <div style="display: none;" id="myProgress">
            <div id="myBar">0%</div>
            <div id="myBartext">0%</div>

        </div>

        <div id="upload">
            <label for="fileInput" class="form-label">يرجى اختيار ملف الاكسل بالتنسيق المعروض في الجدول ادناه </label>
            <div id="countofrows" style="display: none;" class="p-2 text-dark font-bold"> </div>
            <input class="form-control form-control-lg" id="fileInput" type="file">
        </div>
        <br>
    </div>


                </div>
           @livewire('pass-table', key(time()))
            </div>
        </div>
    </div>

</div>
  @endsection

@push('js')


<script src="{{ asset('assets/js/xlsx.full.min.js') }}"></script>
<script>


function toggleReload(e){
                    e.preventDefault();
                    e.returnValue='انت على وشك انهاء العملية هل انت متأكد؟؟';
                }

    let fileInput = document.getElementById('fileInput');

    const max_tak = 100;

    let count = 0;
    let take = max_tak;
    let skip = 0;
    let persint = 0;
    let uploaded_counter = 0;
    // Add event listener for file input change

    let all_data = new Array();
    fileInput.addEventListener('change', function(e) {
        let file = e.target.files[0];

        if (file.type == "application/vnd.ms-excel" || file.type ==
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {

                window.addEventListener('beforeunload',toggleReload)
            let reader = new FileReader();
            reader.onload = function(e) {
                // Get binary data from file reader
                let binaryData = e.target.result;

                // Parse binary data into workbook object
                let workbook = XLSX.read(binaryData, {
                    type: 'binary'
                });

                // Get first worksheet
                let worksheet = workbook.Sheets[workbook.SheetNames[0]];

                // Convert worksheet to JSON
                let data = XLSX.utils.sheet_to_json(worksheet, {
                    header: 1,
                    defval: null
                });


                // Create table data rows
                let table=document.createElement('table');
                for (let i = 1; i < data.length; i++) {
                     let dataRow = table.insertRow();
                    for (let key in data[i]) {
                           let dataCell = dataRow.insertCell();
                         dataCell.innerHTML = data[i][key];
                        //     var ob={key:key,};
                        if(key==3 || key==4 || key==5 || key==6){
                            if(data[i][key]!=null){
                                data[i][key]=ExcelDateToJSDate(data[i][key]);
                            }
                        }
                    }
                    all_data.push(data[i]);

                }
                count = all_data.length;

                var btnhtml =
                    '<button id="sendbtn" onClick="uploadeData()" type="button" class="btn btn-primary mt-4 pr-4 pl-4">حفظ</button>';
                $("#upload").append(btnhtml);
                $("#countofrows").html("عدد السجلات  : " + count);
                $("#countofrows").attr("style", "display:block;");
                //  uploadeData(all_data);
                //   console.log(all_data);
            };

            reader.readAsBinaryString(file);
        } else {

            alert("يجب عليك اختيار ملف اكسل ");
            $("#fileInput").val('');

        }


        // Read Excel file



    });







    async function uploadeData() {
        var data = all_data;
        const numRowsToShow = Math.min(data.length, 10);


        $("#myProgress").attr("style", "display:block");
        $("#fileInput").attr("disabled", "disabled");
        $("#sendbtn").remove();

        for (var i = 0; i < data.length; i += max_tak) {

            console.log("skip");
            console.log(skip);
            console.log("takkkkkk");
            console.log(take);

            var updata = data.slice(skip, take);
            skip += max_tak;
            take += max_tak;
            console.log("be forr");
            var add = (updata.length / data.length) * 100;
            // var add2= (100*updata.length)/data.length;
            persint += add;
            uploaded_counter += updata.length;

            await ajxaproform(updata, add);
        }



    }




    async function ajxaproform(formData, i) {
        //e.preventDefault();
        $(":submit").attr('disable', 'disable');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        await $.ajax({
            method: 'post',
            url: "{{ route('pass.createex') }}",
            data: {
                "data": formData
            },
            dataType: 'JSON',
            success: function(data) {
                //  move(i);

                var elem = document.getElementById("myBar");
                var elemtext = document.getElementById("myBartext");
                var width = persint;

                if (i < 100) {
                    width += i;
                }
                if (uploaded_counter == all_data.length) {
                    width = 100;
                    $("#upload").append(
                        '<div class="alert alert-success alert-dismissible fade show ss"><button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button><strong></strong> تم ارسال وحفظ  ' +
                        uploaded_counter + ' البيانات بنجاح </div>')
                    $("#sendbtn").remove();
                    $("#countofrows").html("");
                    $("#myProgress").attr("style", "display:none;");
                    elem.style.width = 0 + "%";
                    $("#fileInput").val('');
                    $("#fileInput").removeAttr("disabled");
                    persint = 0;
                    take = max_tak;
                    skip = 0;
                    count = 0;
                    uploaded_counter = 0;
                    all_data = new Array();
                    width = 0;
                    console.log("Rempove------------------");
                    document.addEventListener('beforeunload',function(e){

                    });
                    return;


                }
                if (width >= 100) {
                    width = 100;
                }
                elem.style.width = width + "%";
                elem.innerHTML = width.toFixed(2) +
                    "%";
                    elemtext.innerHTML=(uploaded_counter) + "/" + all_data.length + "  " + width.toFixed(2) +
                    "%";

                console.log(data);
                //$("#search_con").html(data.resulteView);
            },

            error: function(data) {
                console.log(data);

            }

        });


    }



    function ExcelDateToJSDate(serial) {
   var utc_days  = Math.floor(serial - 25569);
   var utc_value = utc_days * 86400;
   var date_info = new Date(utc_value * 1000);

   var fractional_day = serial - Math.floor(serial) + 0.0000001;

   var total_seconds = Math.floor(86400 * fractional_day);

   var seconds = total_seconds % 60;

   total_seconds -= seconds;

   var hours = Math.floor(total_seconds / (60 * 60));
   var minutes = Math.floor(total_seconds / 60) % 60;

   var d=new Date(date_info.getFullYear(), date_info.getMonth(), date_info.getDate());
   return d.toLocaleDateString();
}
</script>

@endpush

  {{--


    <div class="card">
    <div class="table-responsive">
      <table dir="rtl" class="table mb-0 align-items-center">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">John Michael</h6>
                  <p class="mb-0 text-xs text-secondary">john@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Manager</p>
              <p class="mb-0 text-xs text-secondary">Organization</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">23/04/18</span>
            </td>
            <td class="align-middle">
              <a href="javascript:;" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Alexa Liras</h6>
                  <p class="mb-0 text-xs text-secondary">alexa@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Programator</p>
              <p class="mb-0 text-xs text-secondary">Developer</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">11/01/19</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                  <p class="mb-0 text-xs text-secondary">laurent@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Executive</p>
              <p class="mb-0 text-xs text-secondary">Projects</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">19/09/17</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Michael Levi</h6>
                  <p class="mb-0 text-xs text-secondary">michael@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Programator</p>
              <p class="mb-0 text-xs text-secondary">Developer</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">24/12/08</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Richard Gran</h6>
                  <p class="mb-0 text-xs text-secondary">richard@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Manager</p>
              <p class="mb-0 text-xs text-secondary">Executive</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">04/10/21</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="px-2 py-1 d-flex">
                <div>
                  <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Miriam Eric</h6>
                  <p class="mb-0 text-xs text-secondary">miriam@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="mb-0 text-xs font-weight-bold">Programtor</p>
              <p class="mb-0 text-xs text-secondary">Developer</p>
            </td>
            <td class="text-sm text-center align-middle">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="text-center align-middle">
              <span class="text-xs text-secondary font-weight-bold">14/09/20</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-xs text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

--}}
