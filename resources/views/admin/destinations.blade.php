@extends('layouts.master_admin', ['title' => 'uploadUpdates', 'subtitle' => ''])
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">
                    {{ $update ? "Edit Place" : "Create Place" }}
                </h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                {{
                                    $update
                                        ? "Edit Place"
                                        : "Create Place"
                                }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            <form
                method="POST"
                action="place"
                enctype="multipart/form-data"
                class="row"
            >
                @csrf
                <!-- Column -->
                
                <!-- Column -->
                <!-- Column -->

                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-horizontal form-material mx-2">
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">From</label>
                                    <div class="col-md-12">
                                        <select name="place_id_from" id="place_id_from">
                                            <option value="">Select from destination</option>
                                            @foreach($places as $place)
                                                <option value="{{$place->id}}">{{$place->name}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input
                                            name="name"
                                            type="text"
                                            value="{{ $update ? $update->title : '' }}"
                                            placeholder="Name of the place"
                                            class="form-control ps-0 form-control-line"
                                        /> -->
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <div class="col-sm-12 d-flex">
                                        <button
                                            type="submit"
                                            class="btn btn-success mx-auto mx-md-0 text-white"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @if (!$edit)
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Destination</h4>
                        <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                        <div class="table-responsive">
                            <form
                                action="/admin-update-priority/update-priority"
                                method="POST"
                            >
                                @csrf

                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Name</th>

                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($destinations as $destination )
                                        <tr>
                                            <td>{{$destination->name}}</td>
                                            <td>
                                                <button
                                                    class="btn btn-danger text-white"
                                                    type="button"
                                                    onclick="deleteDestination({{$destination->id}})"
                                                >
                                                    delete
                                                </button>
                                                <button
                                                    class="btn btn-primary"
                                                    type="button"
                                                    onclick="editDestination({{$destination->id}})"
                                                >
                                                    edit
                                                </button>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">© 2024<a href="#"></a></footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

<script>
    function deleteDestination(id) {
        const confirm_modal = confirm("Delete Destination?");
        if (confirm_modal) {
            window.location.href = "/deleteDestination/" + id;
        }
    }
    function editDestination(id) {
        window.location.href = "/editAnnouncement/" + id;
    }
    function disapprove(id, idpage) {
        let confirm_Final = confirm("Do you really want to DISAPPROVE?");
        if (confirm_Final) {
            window.location.href =
                "/admin-remarks/" + id + "/" + idpage + "/Update";
        }

        // alert(id+" "+idpage);
        // document.getElementById("demo").style.color = "red";
    }

    function approve(id, idpage) {
        let confirm_Final = confirm("Do you really want to APPROVE?");
        if (confirm_Final) {
            window.location.href = "/approve-list/" + id + "/" + idpage;
        }

        // alert(id+" "+idpage);
        // document.getElementById("demo").style.color = "red";
    }
</script>
@stop
