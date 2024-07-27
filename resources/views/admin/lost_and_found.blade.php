@extends('layouts.master_admin', ['title' => 'uploadUpdates', 'subtitle' => ''])
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">
                    {{ $update ? "Edit Lost and found" : "Create Lost and found" }}
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
                                {{ $update ? "Edit Lost and found" : "Create Lost and found" }}
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
                action="lost_and_found"
                enctype="multipart/form-data"
                class="row"
            >
                @csrf
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body profile-card">
                            <center class="mt-4">
                                <img
                                    src="{{ $update ? '/updates/' . $update->image : '/foradmin/assets/images/users/5.jpg' }}"
                                    width="150"
                                />
                                <h4 class="card-title mt-2">
                                    {{
                                        $edit
                                            ? "Update an Image"
                                            : "Upload an Image"
                                    }}
                                </h4>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                />
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->

                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-horizontal form-material mx-2">
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">Title</label>
                                    <div class="col-md-12">
                                        <input
                                            name="title"
                                            type="text"
                                            value="{{ $update ? $update->title : '' }}"
                                            placeholder="Title of the update"
                                            class="form-control ps-0 form-control-line"
                                        />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0"
                                        >Description</label
                                    >
                                    <div class="col-md-12">
                                        <textarea
                                            name="description"
                                            rows="5"
                                            class="form-control ps-0 form-control-line"
                                        >
 {{ $update ? $update->description : '' }}</textarea
                                        >
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
                        <h4 class="card-title">List of Lost and found</h4>
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
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">
                                                Description
                                            </th>
                                           
                                        </tr>
                                    </thead>
                                    
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
    <footer class="footer">© <?php echo '2024 - '. date("Y"); ?><a href="#"></a></footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

<script>
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
