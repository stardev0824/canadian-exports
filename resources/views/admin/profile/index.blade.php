@extends("admin.layouts.app")

@push("css")
    <!-- JQuery DataTable Css -->
    <link href="{{asset("assets/back_end/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet">

@endpush

@section("title","Profile Business Management")

@section("content")


    <div class="block-header">
        <h2>
            <a href="{{route("admin.profile.create")}}" class="btn btn-primary waves-effect">
                <i class="material-icons">add</i>
                <span>Create new profile</span>
            </a>
        </h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All profiles
                    </h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Company Name</th>
                                <th>Company Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>

                            <tr>
                                <th>#ID</th>
                                <th>Company Name</th>
                                <th>Company Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($profiles as $key=>$profile)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$profile->company_name}}</td>
                                    <td>{{$profile->company_email}}</td>

                                    <td>{{$profile->created_at}}</td>
                                    <td>{{$profile->updated_at}}</td>
                                    <td class="text-center ">
                                        <a href="{{route("admin.profile.edit",$profile->id)}}" class="btn btn-info waves-effect">
                                            <i class="material-icons ">edit</i>
                                        </a>

                                            <a type="button"  href="{{route("admin.profile.show",$profile->id)}}" class=" btn bg-blue waves-effect">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>

                                        <button class="btn btn-danger waves-effect"  type="button" onclick="deleteTag({{$profile->id}})">
                                            <i class="material-icons ">delete</i>
                                        </button>

                                        <form action="{{route("admin.profile.destroy",$profile->id)}} "
                                              method="post" style="display: none"
                                              id="delete-form-{{$profile->id}}">
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
                order: [[ 1, 'asc' ],[ 2, 'asc' ]],
                lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="{{asset("assets/back_end/js/pages/ui/modals.js")}}"></script>

@endpush
