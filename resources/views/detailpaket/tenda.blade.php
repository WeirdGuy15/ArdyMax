@extends('welcome')
@section('data')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Data Tenda</h4>
                                </div>
                                <div class="col-lg-6">
                                <div class="text-right">
                                    <button class="btn btn-outline-primary" type="button"
                                    data-toggle="modal" data-target="#AddtendaModal" data-whatever="@mdo">Tambah Data Tenda</button>
                                </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Tenda</th>
                                            <th>Paket Tenda</th>
                                            <th>Penanggung Jawab</th>
                                            <th class="no-content">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                        @foreach($data_tenda as $tenda)
                                        <tr>
                                            <td style="width: 10%"> <?=$no?> </td>
                                            <td style="width: 15%">{{$tenda->id_tenda}}</td>
                                            <td style="width: 50%">{{$tenda->paket_tenda}}</td>
                                            <td style="width: 10%">{{$tenda->nama_tenda}}</td>
                                            <td style="width: 15%">
                                                <button class="btn-pil btn-warning btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalView{{$tenda->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </button>
                                                <button class="btn-pil btn-danger btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalDelete{{$tenda->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                </button>
                                            </td>
                                            <div id="exampleModalView{{$tenda->id}}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Form Edit Tenda</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{route('Updatetenda', $tenda->id)}}" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">ID tenda</label>
                                                                <input type="text" class="form-control" id="inputAddress" value="{{$tenda->id_tenda}}" name="id_tenda" readonly>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress2">Paket tenda</label>
                                                                <input type="text" class="form-control" id="inputAddress2" value="{{$tenda->paket_tenda}}" name="paket_tenda">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputState">tenda</label>
                                                                <select id="inputState" class="form-control" name="nama_tenda">
                                                                    <option value="{{$tenda->nama_tenda}}">{{$tenda->nama_tenda}}</option>

                                                                    @foreach($data as $tenda)
                                                                    <option value="{{$tenda->name}}">{{$tenda->name}}</option>
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
                                            <div id="exampleModalDelete{{$tenda->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin Paket {{$tenda->paket_tenda}} Mau Dihapus ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('Deletetenda', $tenda->id)}}" class="btn btn-danger">Yaking Dong</a>
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
                                            <th>ID Tenda</th>
                                            <th>Paket Tenda</th>
                                            <th>Penanggung Jawab</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

<div id="AddtendaModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Daftar tenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('Addtenda')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-4">
                    <label for="inputAddress">Paket tenda</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Paket tenda" name="paket_tenda">
                </div>
                <div class="form-group mb-4">
                    <label for="inputState">Penanggung Jawab</label>
                    <select id="inputState" class="form-control" name="nama">
                        <option value="">Pilih tenda</option>

                        @foreach($data as $tenda)
                        <option value="{{$tenda->name}}">{{$tenda->name}}</option>
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