@extends('website')
@section('content')
    <style>
        th,
        td {
            text-align: center;
        }
        html {
    font-size: 13px;
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
                        
                        <h2 class="card-title">Dashboard</h2><br>
                        <br>
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
                                    <td>
                                        <button class=" btn btn-secondary deleteRecord"
                                            data-id="{{ $product->id }}">Delete</button>
                                        {{-- <a href="javascript:void(0)" id="show-product"
                                            data-url="{{ route('bundle.view', $product->prod_id) }}"
                                            class="btn btn-info">Show</a> --}}
                                            <a href="{{ url('create-bundle') }}/{{$product->id}}"  class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="display">

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
    <script type="text/javascript">
        $(document).ready(function() {

            /*------------------------------------------
            --------------------------------------------
            When click user on Show Button
        
            --------------------------------------------
            --------------------------------------------*/
            
            $('body').on('click', '#show-product', function() {

                var userURL = $(this).data('url');
                $.ajax({
                    url: userURL,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('.display').append('<table class="table table-striped" id="alldata" ></table>')
                        for (i = 0; i < response.length; i++) {

                        $('#alldata').append('<tr id="row' + i + '"><td>' + response[i].title +'</td><td>' + response[i].main_prod + '</td></tr>'
                        )
                        }
                    }
                });

            });

        });
    </script>

@endsection
