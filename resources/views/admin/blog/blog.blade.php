@extends('admin.master.admin-master')
@section('content')
    <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Blog Page</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="width: 10%;">Tittle</th>
                                            <th scope="col" style="width: 20%;">Image</th>
                                            <th scope="col" style="width: 58%;">Description</th>
                                            <th scope="col" style="width: 12%;"></th>
                                            <!-- <th scope="col">
                                                <a class="add-blog" href="blogs/edit-blog">Edit</a>
                                                |
                                                <a class="add-blog" href="blogs/delete-blog">Delete</a>
                                            </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($viewblog as $blog)
                                            <tr>
                                                <td> {{ $blog->tittle }}</td>
                                                <td><img src="{!! asset('admin/assets/images/blogs/'.$blog->image) !!}" style="width: 100%;"></td>
                                                <td> {!! $blog->des !!} </td>
                                                <td>
                                                    <a class="add-blog" href="{{ url('admin/blogs/edit/'.$blog->id) }}">Edit</a>
                                                    <hr>
                                                    <a class="add-blog" href="{{ url('admin/blogs/delete/'.$blog->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $viewblog->render() }}
                                <a class="add-blog" href="blogs/add"><button>Add</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
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
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
@endsection