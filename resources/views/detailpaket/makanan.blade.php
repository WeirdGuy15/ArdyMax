@extends('welcome')
@section('data')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{route('makanan')}}"><h4>Data Makanan</h4></a>
                                </div>
                                <div class="col-lg-6">
                                <div class="text-right">
                                    <button class="btn btn-outline-primary" type="button"
                                    data-toggle="modal" data-target="#AddmakanModal" data-whatever="@mdo">Tambah Data Makanan</button>
                                </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs  mb-3 mt-3 nav-fill" id="justifyTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Nasi">Nasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Sayur">Sayur</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Ikan">Ikan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Ayam">Ayam</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Minuman">Minuman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Snack">Snack</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Desert">Desert</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/makanan/Sup">Sup</a>
                                </li>
                            </ul>

                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Makanan</th>
                                            <th>Nama Makanan</th>
                                            <th>Kategori</th>
                                            <th class="no-content">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                        @foreach($data_makan as $makan)
                                        <tr>
                                            <td> <?=$no?> </td>
                                            <td>{{$makan->id_makan}}</td>
                                            <td>{{$makan->makan}}</td>
                                            <td>{{$makan->kategori}}</td>
                                            <td>
                                                <button class="btn-pil btn-warning btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalView{{$makan->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </button>
                                                <button class="btn-pil btn-danger btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalDelete{{$makan->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                </button>
                                            </td>
                                            
                                            <div id="exampleModalDelete{{$makan->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin Makanan {{$makan->makan}} Mau Dihapus ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('Deletemakan', $makan->id)}}" class="btn btn-danger">Yaking Dong</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="exampleModalView{{$makan->id}}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Form Edit Makanan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{route('Updatemakan', $makan->id)}}" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">ID Makanan</label>
                                                                <input type="text" class="form-control" id="inputAddress" value="{{$makan->id_makan}}" name="id_makan" readonly>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress2">Nama Makanan</label>
                                                                <input type="text" class="form-control" id="inputAddress2" value="{{$makan->makan}}" name="makan">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputState">Kategori Makanan</label>
                                                                <select id="inputState" class="form-control" name="kategori">
                                                                    <option value="{{$makan->kategori}}">{{$makan->kategori}}</option>

                                                                        @foreach($kategori as $makan)
                                                                        <option value="{{$makan->kategori}}">{{$makan->kategori}}</option>
                                                                        @endforeach
                                                                </select>
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
                                        </tr>
                                        <?php $no++ ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Makanan</th>
                                            <th>Nama Makanan</th>
                                            <th>Kategori</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

<div id="AddmakanModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Daftar Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('Addmakan')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-4">
                    <label for="inputAddress">Nama Makanan</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Makanan" name="makan">
                </div>
                <div class="form-group mb-4">
                    <label for="inputState">Kategori Makanan</label>
                    <select id="kategori" class="form-control basic" name="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kategori)
                        <option value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                        @endforeach
                    </select>
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


@endsection


@section('script')
<script src="../plugins/select2/custom-select2.js"></script>
@endsection