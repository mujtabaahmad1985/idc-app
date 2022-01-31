@extends('layout.app')
@section('page-title') Inventory Management @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}

    </style>
@endsection

@section('content')
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Drug Stock Report
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="d-lg-flex">
                            @include('reports.report-menu')
                            <div class="tab-content flex-lg-fill">
                                <div class="tab-pane fade active show " id="vertical-left-tab1">

                                    <div class="card card-body">
                                        <div class="table-responsive">
                                            <div class="table-responsive">  <table class="table table-striped product-list-table">
                                                    <thead>
                                                    <tr>
                                                        <th width="20px"><div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="all"  >
                                                                <label class="custom-control-label" for="all"></label>
                                                            </div></th>
                                                        <th>Name</th>

                                                        <th>Expiry Date</th>
                                                        <th>Brand Name</th>
                                                        <th>Category</th>
                                                        <th>Stock</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @if(isset($products) && $products->count() > 0)
                                                        @foreach($products as $product)
                                                            <tr >
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="product{!! $product->id !!}"  >
                                                                        <label class="custom-control-label" for="product{!! $product->id !!}"></label>
                                                                    </div>
                                                                </td>

                                                                <td>{!! $product->product_title !!}</td>
                                                                <td>@if(isset($product->product_purchases) && !empty($product->product_purchases[0]->expiry_date) && $product->product_purchases[0]->expiry_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($product->product_purchases[0]->expiry_date) !!} @endif</td>
                                                                <td>{!! isset($product->medication_brands)?$product->medication_brands->brand_name:"" !!}</td>
                                                                <td>{!! isset($product->medication_categories)?$product->medication_categories->name:"" !!}</td>
                                                                <td>
                                                                    @if($product->quantity_signal > $product->in_stock)
                                                                        <span class="badge bg-danger-600" style="width: 30px"> {!! $product->in_stock !!}</span>
                                                                    @else
                                                                        <span class="badge bg-green-600"  style="width: 30px"> {!! $product->in_stock !!}</span>
                                                                    @endif

                                                                </td>



                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>




        </div>
    </div>





{{--    END BRAND MODAL --}}

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js') !!}

<script>
    $(function () {





        $(".product-list-table").DataTable({
            "paging": true, "info":     true,"searching": true,

            "aaSorting": [],
            "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],

        });


    })
</script>
@endsection