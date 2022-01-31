@extends('layout.app')
@section('page-title') Permissions @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/css/file-explore.css') !!}
    <style>
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            font-size: 0.8rem
        }

        .select2 {
            width: 100% !important;

            margin-bottom: 22px;
            font-size: 0.8rem;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            height: 30px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #000 transparent transparent transparent;
        }

        .select2-search.select2-search--dropdown {
            width: 100%;
        }

        .select2-container--default .select2-selection {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0
        }

        .select-wrapper input.select-dropdown {
            font-size: 0.8rem;
            height: 2rem;
            line-height: 2rem
        }

        .card-panel {
            padding: 10px 15px;
        }

        .permission-list-table td, .permission-list-table th{ padding: 0; font-size: 14px;}


        .permission-list-table tbody p{ margin:2px 0 0 0;}
        .permission-list-table tbody .dropdown-content li{ min-height: 15px;}
        .permission-list-table tbody .dropdown-content li > a, .dropdown-content li > span{font-size: 14px;}
        .permission-list-table tbody .material-icons{ font-size: 20px}
        .permission-list-table tbody .dropdown-content li > a > i{     margin: 0 30px 0 0;}
        .permission-list-table tbody a{font-size: 14px;}
    </style>
@endsection

@section('content')

    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <form>
                <h4 class="header">Set Permissions</h4>
                <div class="row">
                    <div class="col s6">
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12">Select Role</div>
                                <div class="col s12">
                                    <select>
                                        <option></option>
                                        <option value="sub-admin">Sub Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12">Select User</div>
                                <div class="col s12">
                                    <select>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel">
                            <table class="permission-list-table ">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        <p>
                                            <input type="checkbox" class="filled-in" id="all"/>
                                            <label for="all"></label>
                                        </p>
                                    </th>
                                    <th>Permission Title</th>
                                    <th>Permission Description</th>
                                    <th></th>
                                </tr>
                                </tbody>
                                @if(isset($permissions))
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td colspan="5" style="font-weight: bolder; padding: 5px">{!! $permission->permission_title !!}</td>
                                        </tr>
                                        @if($permission->children->count() > 0)
                                            @foreach($permission->children as $child)
                                                <tr>
                                                    <td></td>
                                                    <td> <p>
                                                            <input type="checkbox" class="filled-in permission parent" name="permission[]" value="{!! $permission->id !!}"
                                                                   id="permission{!! $child->id !!}" />
                                                            <label class="red-text" for="permission{!! $child->id !!}">{!! $child->permission_title !!}</label>
                                                        </p></td>
                                                    <td>{!! $child->permission_title !!}</td>
                                                    <td>{!! $child->permission_description !!}</td>
                                                    <td></td>
                                                </tr>
                                             @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </table>
                        </div>

                    </div>
                </div>
            </form>


        </div>


        <!--end container-->


    </section>

@endsection


@section('js')
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}

    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}

    <script>
        $(function () {
            $("select").material_select('destroy');
            $("select").select2();
        })
    </script>


    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection