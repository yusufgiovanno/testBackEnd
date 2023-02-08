<script>
function entry(){
    $('#frontPage').attr('hidden', true );
    $('#exit'     ).attr('hidden', true );
    $('#entry'    ).attr('hidden', false);
    $('#result'   ).attr('hidden', true );
}

function frontPage(){
    $('#frontPage').attr('hidden', false);
    $('#exit'     ).attr('hidden', true );
    $('#entry'    ).attr('hidden', true );
    $('#result'   ).attr('hidden', true );
}

function exit(){
    $('#frontPage').attr('hidden', true );
    $('#exit'     ).attr('hidden', false);
    $('#entry'    ).attr('hidden', true );
    $('#result'   ).attr('hidden', true );
}

$("#nopol").bind("keypress", function (event) {
    if (event.charCode!=0) {
             var regex = new RegExp("^[A-Za-z0-9 _]");

        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }

    }
});

$('.btn-entry').on('click', function () {
    var nopol = $('#nopol').val();
    $.ajax({
        type: "POST",
        url: "/entry?_token=" + $('#_token').val(),
        data: {nopol : nopol},
        success: function (response) {
            $('#result').attr('hidden', false);
            $('.result').html(response);
        }
    });
});

$('.btn-exit').on('click', function () {
    var noparkir = $('#noparkir').val();
    $.ajax({
        type: "POST",
        url: "/exit?_token=" + $('#_token').val(),
        data: {noparkir : noparkir},
        success: function (response) {
            $('#result').attr('hidden', false);
            $('.result').html(response);
        }
    });
});

</script>