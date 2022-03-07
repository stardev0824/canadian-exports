@extends("admin.layouts.app")

@push("css")
    <!-- JQuery DataTable Css -->
    <link href="{{asset("assets/back_end/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet">

@endpush

@section("title","Issue Management")

@section("content")


    <div class="block-header">
        <h2>
            <a href="{{route("admin.issue.create")}}" class="btn btn-primary waves-effect">
                <i class="material-icons">add</i>
                <span>Create new issue</span>
            </a>
        </h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All  issues
                    </h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Is Current Issue</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>

                            <tr>
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Is Current Issue</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($issues as $key=>$issue)
                                <tr class="{{$issue->is_current_issue==true?"bg-cyan":""}}">
                                    <td>{{$key+1}}</td>
                                    <td><a href="{{asset("storage/".$issue->pdf)}}">{{$issue->title}}</a></td>
                                    <td>{{$issue->is_current_issue?"Yes":"No"}}</td>

                                    <td>
                                        <img src="{{asset("storage/".$issue->front_image)}}" class="img-thumbnail" width="100 vh" height="100 vh" alt="Responsive image">
                                    </td>
                                    <td>{{$issue->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route("admin.issue.edit",$issue->id)}}" class="btn btn-info waves-effect">
                                            <i class="material-icons ">edit</i>
                                        </a>

                                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{$issue->id}})">
                                            <i class="material-icons ">delete</i>
                                        </button>

                                        <form action="{{route("admin.issue.destroy",$issue->id)}} "
                                              method="post" style="display: none"
                                              id="delete-form-{{$issue->id}}">
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
