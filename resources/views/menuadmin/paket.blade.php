@extends('welcome')
@section('data')

<style>
select{
    width: 100px;
    text-overflow: ellipsis;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Data Paket Nikah</h4>
                                </div>
                                <div class="col-lg-6">
                                <div class="text-right">
                                    <button class="btn btn-outline-primary" type="button"
                                    data-toggle="modal" data-target="#AddpaketModal" data-whatever="@mdo">Tambah Paket Nikah</button>
                                </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Paket</th>
                                            <th>Nama Paket</th>
                                            <th class="no-content">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                        @foreach($data_paket as $paket)
                                        <tr>
                                            <td> <?=$no?> </td>
                                            <td>{{$paket->id_paket}}</td>
                                            <td>{{$paket->nama_paket}}</td>
                                            <td>
                                                <button class="btn-pil btn-warning btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalView{{$paket->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </button>
                                                <button class="btn-pil btn-danger btn-xs coba" type="button" data-id="{{$paket->id}}" id="coba">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                </button>
                                            </td>
                                            
                                            <div id="exampleModalDelete{{$paket->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin Paket {{$paket->nama_paket}} Mau Dihapus ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('Deletepaket', $paket->id)}}" class="btn btn-danger">Yaking Dong</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="exampleModalView{{$paket->id}}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Form Edit paket</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{route('Updatepaket', $paket->id)}}" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">ID Paket</label>
                                                                <input type="text" class="form-control" value="{{$paket->id_paket}}" name="id_paket" readonly>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress2">Nama Paket</label>
                                                                <input type="text" class="form-control" value="{{$paket->nama_paket}}" name="nama_paket">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="rias">Rias</label>
                                                                <select class="form-control" name="rias" >
                                                                    <option value="{{$paket->id_rias}}">{{$paket->paket_rias}}</option>
                                                                    @foreach($rias as $rs)
                                                                    <option value="{{$rs->id}}">{{$rs->paket_rias}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                            <label for="inputState">Dekorasi</label>
                                                                <select class="form-control" name="id_dek">
                                                                    <option value="{{$paket->id_dek}}">{{$paket->paket_dek}}</option>
                                                                    @foreach($dek as $dek1)
                                                                    <option value="{{$dek1->id}}">{{$dek1->paket_dek}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputState">Dokumentasi</label>
                                                                <select class="form-control" name="id_dok">
                                                                    <option value="{{$paket->id_dok}}">{{$paket->paket_dok}}t</option>
                                                                    @foreach($dok as $dok1)
                                                                    <option value="{{$dok1->id}}">{{$dok1->paket_dok}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputState">Hiburan</label>
                                                                <select class="form-control" name="id_hiburan">
                                                                    <option value="{{$paket->id_hiburan}}">{{$paket->paket_hiburan}}</option>
                                                                    @foreach($hiburan as $hbr)
                                                                    <option value="{{$hbr->id}}">{{$hbr->paket_hiburan}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label>MC</label>
                                                                <select class="form-control" name="id_mc">
                                                                    <option value="{{$paket->id_mc}}">{{$paket->paket_mc}}</option>
                                                                    @foreach($mc as $mc1)
                                                                    <option value="{{$mc1->id}}">{{$mc1->paket_mc}}</option>
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
                                            <th>ID Paket</th>
                                            <th>Nama Paket</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

<div id="AddpaketModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Daftar Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('Addpaket')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-4">
                    <label for="inputAddress">Nama Paket</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Paket" name="nama_paket">
                </div>
                <div class="form-group mb-4">
                    <label for="rias">Rias</label>
                    <select class="form-control selectpicker" name="rias" data-live-search="true">
                        <option value="">Pilih Paket</option>
                        @foreach($rias as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->paket_rias}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                <label for="inputState">Dekorasi</label>
                    <select class="form-control selectpicker" data-live-search="true" name="dek">
                        <option value="">Pilih Paket</option>
                        @foreach($dek as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->paket_dek}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <br>
                <div class="form-group mb-4">
                    <label for="inputState">Dokumentasi</label>
                    <select class="form-control selectpicker" data-live-search="true" name="dok">
                        <option value="">Pilih Paket</option>
                        @foreach($dok as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->paket_dok}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <br>
                <div class="form-group mb-4">
                    <label for="inputState">Hiburan</label>
                    <select class="form-control selectpicker" data-live-search="true" name="hiburan">
                        <option value="">Pilih Paket</option>
                        @foreach($hiburan as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->paket_hiburan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>MC</label>
                    <select class="form-control selectpicker" data-live-search="true" name="id_mc">
                        <option value="">Pilih Paket</option>
                        @foreach($mc as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->paket_mc}}</option>
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
