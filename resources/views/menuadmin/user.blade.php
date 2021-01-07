@extends('welcome')
@section('data')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Data User</h4>
                                </div>
                                <div class="col-lg-6">
                                <div class="text-right">
                                    <button class="btn btn-outline-primary" type="button"
                                    data-toggle="modal" data-target="#AddUserModal" data-whatever="@mdo">Tambah User</button>
                                </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th class="no-content">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                        @foreach($data_user as $user)
                                        <tr>
                                            <td> <?=$no?> </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->level}}</td>
                                            <td>{{$user->alamat}}</td>
                                            <td>{{$user->no_telp}}</td>
                                            <td>
                                                <button class="btn-pil btn-warning btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalView{{$user->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </button>
                                                <button class="btn-pil btn-danger btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalDelete{{$user->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                </button>
                                            </td>
                                            <div id="exampleModalView{{$user->id}}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Form Edit User</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{route('UpdateUser', $user->id)}}" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Nama</label>
                                                                <input type="text" class="form-control" id="inputAddress" value="{{$user->name}}" name="name">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress2">Alamat</label>
                                                                <input type="text" class="form-control" id="inputAddress2" value="{{$user->alamat}}" name="alamat">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress2">No. Telp</label>
                                                                <input type="text" class="form-control" id="inputAddress2" value="{{$user->no_telp}}" name="no_telp">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputState">Posisi</label>
                                                                <select id="inputState" class="form-control" name="level">
                                                                    <option value="{{$user->level}}">{{$user->level}}</option>

                                                                    @foreach($data as $devisi)
                                                                    <option value="{{$devisi->nama}}">{{$devisi->nama}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">Username</label>
                                                                    <input type="text" class="form-control" id="inputEmail4" value="{{$user->id_user}}" name="id_user">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Password</label>
                                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                                                                </div>
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="exampleModalDelete{{$user->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin Data {{$user->name}} Mau Dihapus ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('DeleteUser', $user->id)}}" class="btn btn-danger">Yaking Dong</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <?php $no++ ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

<div id="AddUserModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Daftar User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('AddUser')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-4">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama User" name="name">
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress2">Alamat</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Alamat" name="alamat">
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress2">No. Telp</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="No. Telp" name="no_telp">
                </div>
                <div class="form-group mb-4">
                    <label for="inputState">Posisi</label>
                    <select id="inputState" class="form-control" name="level">
                        <option>Pilih Posisi</option>
                        @foreach($data as $devisi)
                        <option value="{{$devisi->nama}}">{{$devisi->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Username</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Username" name="id_user">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                    </div>
                </div>
                
            
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

if ($message = Session::get('sukses')) {
    swal("Done!", results.message, "success");
}
</script>
@endsection