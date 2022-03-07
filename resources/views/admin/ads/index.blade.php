@extends("admin.layouts.app")

@push("css")
    <!-- JQuery DataTable Css -->
    <link href="{{asset("assets/back_end/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet">

@endpush

@section("title","Ads Management")

@section("content")


    <div class="block-header">
        <h2>
            <a href="{{route("admin.ads.create")}}" class="btn btn-primary waves-effect">
                <i class="material-icons">add</i>
                <span>Create new program</span>
            </a>
        </h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All programs
                    </h2>

                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Program Name</th>
                                <th>Length</th>
                                <th>Canadian Students</th>
                                <th>International Students</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>

                            <tr>
                                <th>#ID</th>
                                <th>Program Name</th>
                                <th>Length</th>
                                <th>Canadian Students</th>
                                <th>International Students</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($get as $key=>$data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->program_name}}</td>
                                    <td>{{$data->length}}</td>
                                    <td>{{$data->tuition_canadian_students}}</td>
                                    <td>{{$data->tuition_international_students}}</td>
                                    <td class="text-center">
                                        <a href="{{route("admin.ads.edit",$data->id)}}" class="btn btn-info waves-effect">
                                            <i class="material-icons ">edit</i>
                                        </a>

                                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{$data->id}})">
                                            <i class="material-icons ">delete</i>
                                        </button>

                                        <form action="{{route("admin.ads.destroy",$data->id)}} "
                                              method="post" style="display: none"
                                              id="delete-form-{{$data->id}}">
                                            @csrf
                                            @method("delete")
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push("js")
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/jquery.dataTables.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/buttons.flash.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/jszip.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/pdfmake.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/vfs_fonts.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/buttons.html5.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/buttons.print.min.js")}}"></script>

    <script src="{{asset('assets/back_end/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        const deleteTag=id=>{
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById("delete-form-"+id).submit();
                }
            })
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.js-exportable').DataTable({
                dom: 'Blfrtip',
                responsive: true,
                pageLength: 25,
                order: [ 1, 'asc' ],
                lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endpush
