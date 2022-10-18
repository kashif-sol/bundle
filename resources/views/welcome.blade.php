@extends('website')
@section('content')
    <style>
        input[type="text"] {
            padding: 4px;
            width: 30%;

            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
            margin-bottom: 20px;
            box-shadow: aqua;
        }

        html {
            font-size: 13px;
        }

        table {
            font-size: 14px;
        }

        .btn {
            font-size: 17px;
        }
    </style>
    <section role="main" class="content-body content-body-modern">


        <!-- start: page -->
        <div class="row">


            <div class="col">

                <div class="card card-modern card-modern-table-over-header">
                    <div class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        </div>
                        <h2 class="card-title">Add Bundle</h2><br>
                        <br>
                    </div>

                    <div class="card-body">

                        <form name="contactUsForm" id="contactUsForm" method="post" action="javascript:void(0)">
                            @sessionToken
                            <label for="">Main Product</label><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" id="main" style="width: 96%;" class="form-control"
                                        value="">
                                </div>
                                <div class="col-md-8">
                                    <input type="button" onclick="myFunction()" class="btn btn-primary"
                                        style="font-size: 12px;" value="search">
                                </div>
                            </div>
                            <input type="hidden" id="master_id" name="master_id" value="{{ $bundle->id ?? '' }}">
                            <input type="hidden" id="hidden" name="product_id" value="">
                            <input type="text" id="title" class="form-control title" name="title"
                                value="{{ $bundle->title ?? '' }}" readonly>
                            <br>

                            @if (isset($bundle_products))
                                <div class="prod_data">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">handle</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        <tbody>
                                            @foreach ($bundle_products as $bundleee)
                                                <tr>
                                                     <td>{{ $bundleee->product_id }}</td>
                                                    <td>{{ $bundleee->handle }}</td>
                                                    <td><button class=" btn btn-secondary deleteRecord"
                                                            data-id="{{ $bundleee->id }}">Delete</button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            @endif

                            <div class="rowbtn">
                                <button type="submit" class="btn btn-primary" id="submit"
                                    onclick="saveprod()">Save</button>
                                <button type="button" class="btn btn-secondary add-more "
                                    @if (empty($bundle)) style="display:none;" @endif data-toggle="modal"
                                    data-target="#exampleModalLong">Add Bundle Products</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>


            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="padding-left: 100px;">Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    @sessionToken
                                    <div class="row">
                                        <label for="sku" style="margin-left: 10px;">Enter Sku</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="sku" style="width: 100%;">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="button" onclick="popupFunction()" class="btn btn-primary"
                                                value="Search" style="font-size: 12px;">
                                                <input type="hidden" name="prod_id" id="prod_id" class="prod_id"
                                                value="{{ $bundle->prod_id ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ url('save-product') }}" method="post"">
                                <div id="dynamic_field">
                                    @sessionToken
                                    <input type="hidden" name="main_prod" id="main-prod" class="main-prod"
                                        value="{{ $bundle->id ?? '' }}">
                                  
                                </div>
                                <button type="submit" class="btn btn-secondary">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end: page -->
    </section>

    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<div id="row' + i +
                    '"><input type="text" onkeyup="myFunction(' + i +
                    ')" class="form-control" name="product_' + i + '" value="" placeholder="Product ' +
                    i + '" id="product_' + i + '"></div>')

            });

        });



        function myFunction() {

            var id = $('#main').val();
            console.log(id);
            var token = $('.session-token').val();
            var hidden = document.getElementById("hidden");
            var title = document.getElementById('main')
            $.ajax({
                url: "/product",
                type: 'POST',
                data: {
                    product: id,
                    token: token
                },
                success: function(response) {
                    //if request if made successfully then the response represent the data

                    console.log(response);
                    if (response && response.length > 0) {
                        $("#hidden").val($("#hidden").val() + response[1].id);
                    } else {
                        $("#hidden").val($("#hidden").val() + '');
                    }
                    if (response && response.length > 0) {
                        console.log('y');
                        $(".title").val($(".title").val() + response[0].title);

                    } else {
                        $(".title").val($(".title").val() + '');
                        console.log('xy');
                    }
                    if (response && response.length > 0) {
                        console.log('y');


                    } else {
                        $(".title").val($(".title").val() + '');
                        console.log('xy');
                    }


                }


            });
        }
    </script>
    <script>
        $(".deleteRecord").click(function() {
            var id = $(this).data("id");


            $.ajax({
                url: "/variant/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });

        });
    </script>
    <script>
        function popupFunction() {
            var id = $('#sku').val();
            var prod_id=$('#prod_id').val();
            var token = $('.session-token').val();
            var hidden = document.getElementById("hidden");
            var title = document.getElementById('main')
            $.ajax({
                url: "/sku",
                type: 'POST',
                data: {
                    product: id,
                    token: token
                },
                success: function(response) {
                    console.log(response);
                    if(prod_id==response[0].prod_id){
                        alert('Product is already available');
                    }
                    else{
                    $('#dynamic_field').append(
                        '<div class="row" id="row"><p class="col-sm-4">title</p><p class="col-sm-4">Id</p><p class="col-sm-4">Order</p></div>'
                    )
                    for (i = 0; i < response.length; i++) {
                        $('#dynamic_field').append('<div class="row" id="row' + i +
                            '"><input type="text" name="title[]" readonly  class="col-sm-3 form-control" style="margin-left:5px;padding:10px"  value="' +
                            response[i].title +
                            '"  >&nbsp;<input type="text" name="product_id[]" readonly class="col-sm-3 form-control"  style="margin-left:5px;padding:10px" value="' +
                            response[i].id +
                            '"   >&nbsp<input type="hidden" name="handle[]" readonly class="col-sm-3 form-control"  style="margin-left:5px;padding:10px" value="' +
                            response[i].handle +
                            '"   >&nbsp<input type="text" name="order[]"  class="col-sm-3 form-control" style="margin-left:5px;padding:10px" value="" ></div>'
                        )
                    }
                }

                }


            });
        }
    </script>
    <script>
        function saveprod() {

            console.log('helo');
            if ($("#contactUsForm").length > 0) {

                $.ajax({
                    url: "{{ url('save-prod') }}",
                    type: "POST",
                    data: $('#contactUsForm').serialize(),
                    success: function(response) {
                        console.log(response);
                        alert('Product has been Saved');

                        window.location.href = "/create-bundle/" + response.id;
                        $('.add-more').show();
                        if (response && response.length > 0) {
                            console.log('y');


                        } else {
                            console.log('xy');
                        }
                        if (response && response.length > 0) {
                            console.log('y');
                            $(".title").val($(".title").val() + response.title);

                        } else {
                            $(".title").val($(".title").val() + '');
                            console.log('xy');
                        }


                    }
                });
            }

        }
    </script>
@endsection
