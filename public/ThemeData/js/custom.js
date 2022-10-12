/* Add here all your JS customizations */

$(function() {

    $(document).on("click", ".delete-record", function() {
        var id = $(this).data("id");
        if (!confirm("are you sure!")) {
            return true;
        }
        $.ajax({
            url: "/delete-quote/" + id,
            cache: false,
            success: function(html) {
                alert("Record deleted");
            }
        });
    });

    $(document).on("click", ".get-record", function() {
        var id = $(this).data("id");
        $.ajax({
            url: "/get-quote/" + id,
            cache: false,
            success: function(data) {
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#phone").val(data.phone);
                $("#help").val(data.help);
                $("#qId").val(data.id);
                $("#edit-quote").modal("show");
            }
        });
    });


    $(document).on("click", "#saveQuote", function() {
        $.ajax({
            url: "/save-quote",
            type: 'POST',
            data: $('#save-quote').serialize(),
            success: function(data) {
                $("#edit-quote").modal("hide");
            }
        });
    });
    $("#closemodal").click(function () {
        // alert('hello World');
        $('#edit-quote').modal('hide');
    });
    $("#closebtn").click(function () {
        // alert('hello World');
        $('#edit-quote').modal('hide');
    });

    

});