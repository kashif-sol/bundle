@extends('website')
@section('content')
    <style>
        th,
        td {
            text-align: center;
        }
    </style>
    <section role="main" class="content-body content-body-modern">
        <div class="card">

            <div class="row">
                <a href="create-bundle" class="btn btn-secondary btn-sm"
                    style="padding: 8px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 17%;
            margin-left: 19px;
            font-size: 16px;
            margin-bottom: 15px;">Create
                    Bundle</a>
            </div>


            <div class="card-body">
                <div class="card-header">
                    <h1
                        style="margin-top: 20px;
                margin-bottom: 10px;
                color: black;
                font-size: larger;
                font-size: 19px;
                padding-left: 45px;">
                        Bundles</h1>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Title</th>
                        
                        <th scope="col">Action</th>
                    </tr>
                    <tbody>
                        @if (!isset($bundle))
                            <tr>

                            </tr>
                        @else
                            @foreach ($bundle as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                   

                                    <td><button class=" btn btn-primary deleteRecord"
                                            data-id="{{ $product->id }}">Delete</button></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        $(".deleteRecord").click(function() {
            var id = $(this).data("id");


            $.ajax({
                url: "bundle/" + id,
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

@endsection
