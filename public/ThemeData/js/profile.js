$(function() {

    $(document).on("click", ".delete-profile", function() {
        var id = $(this).data("id");
        if (!confirm("are you sure!")) {
            return true;
        }
        $.ajax({
            url: "/delete-profile/" + id,
            cache: false,
            success: function(html) {
                alert("Record deleted");
                window.location.reload(true);
            }
        });
    });
    $(document).on("click", ".get-profile", function() {
        var id = $(this).data("id");
        $.ajax({
            url: "/get-profile/" + id,
            cache: false,
            success: function(data) {
                $("#name").val(data.name);
                $("#last_name").val(data.last_name);
                $("#email").val(data.email);
                $("#phone").val(data.phone);
                $("#size").val(data.size);
                $("#amount").val(data.amount);
                $("#cdesign").val(data.cdesign);
                $("#budget").val(data.budget);
              
                $("#id").val(data.id);
                
                $("#edit-quote").modal("show");
            }
        });
        
        $("#closemodal").click(function () {
            // alert('hello World');
            $('#edit-quote').modal('hide');
        });
    });
    
    // $(document).on("click", "#saveProfile", function() {
    //     $.ajax({
    //         url: "/save-profile",
    //         type: 'POST',
    //         data: $('#save-profile').serialize(),
    //         success: function(data) {
    //             $("#edit-quote").modal("hide");
    //             window.location.reload(true);
    //         }
    //     });
    // });

});
