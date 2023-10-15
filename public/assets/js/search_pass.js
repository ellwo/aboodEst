function ajxaproform(e, th, urll) {

    e.preventDefault();

    $(":submit").attr('disable', 'disable');
    var oldhtml = $("#btnsubmit").html();
    // console.log(th);
    $("#btnsubmit").html('<div id="preloader2"><div/>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = new FormData(th);



    $.ajax({
        method: 'post',
        url: urll,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        crossDomain: true,
        success: function(data) {
            console.log(data);
            $("#search_con").html(data.resulteView);
            $("#btnsubmit").html(oldhtml);
        },
        error: (data) => {

            console.log(data.responseJSON.errors);
            console.log('error');
            $("#btnsubmit").html(oldhtml);
            //$(".addpro").prepend("<div class='m-4 rounded-lg text-white bg-red-700 '> " + data.message + "</div>");

            // if(dA)

            //  $(".addpro ").addClass("border-red-800 rounded-lg border ");
        }

    });


}