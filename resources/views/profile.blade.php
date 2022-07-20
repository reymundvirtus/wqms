@extends('layouts.defaultLayout')

@section('title')
    WQMS - Profiles
@endsection

@section('content')
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <h4 class="sidebar-header">PROFILES</h4>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No.</th>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Email</th>
                                        <th class="text-center" scope="col">Created</th>
                                        <th class="text-center" scope="col"></th>
                                        <th class="text-center" scope="col">Menu</th>
                                        <th class="text-center" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="get_user_data">
                                    <!-- append the data here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->

    {{-- Modal for Update --}}
    <div class="modal fade" id="updateAccount" tabindex="-1" role="dialog1" aria-labelledby="exampleModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: rgba(67, 56, 202, 1)">
                <div class="card card-authentication1 mx-auto my-4">
                    <div class="card-body">
                        <div class="card-content p-2">
                            <div class="card-title text-uppercase text-center py-3">Update Account</div>
                            <form id="update_data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="user_idu" class="sr-only">User ID</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="hidden" id="user_idu"
                                            class="form-control input-shadow" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nameu">Name</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="nameu"
                                            class="form-control input-shadow">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailu">Email</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="emailu"
                                            class="form-control input-shadow">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passwordu">Password</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="passwordu"
                                            class="form-control input-shadow" value=" ">
                                    </div>
                                </div>
                                <p class="text-red-500 font-bold">Note: Put your current or new password before clicking
                                    Update</p>
                                <button type="submit" class="btn card-hover" data-bs-dismiss="modal"
                                    style="background-color: #c94bbd; color: rgb(0, 0, 0)">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for Read --}}
    <div class="modal fade" id="readUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: rgba(67, 56, 202, 1)">
                <div class="card card-authentication1 mx-auto my-4">
                    <div class="card-body">
                        <div class="card-content p-2">
                            <div class="card-title text-uppercase text-center py-3">Details</div>
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="namer">Name</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="namer" name="namer"
                                            class="form-control input-shadow" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailr">Email</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="emailr" name="emailr"
                                            class="form-control input-shadow" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passwordr">Password</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="passwordr" name="passwordr"
                                            class="form-control input-shadow" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dater">Created At</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="dater" name="dater"
                                            class="form-control input-shadow" readonly>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>
@endsection
