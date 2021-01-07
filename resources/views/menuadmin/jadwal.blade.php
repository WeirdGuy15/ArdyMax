@extends('welcome')
@section('data')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Data Jadwal</h4>
                                </div>
                                <div class="col-lg-6">
                                <div class="text-right">
                                    <button class="btn btn-outline-primary" type="button"
                                    data-toggle="modal" data-target="#AddjadwalModal" data-whatever="@mdo">Tambah Jadwal</button>
                                </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">Tanggal Resepsi</th>
                                            <th style="width:10%">ID Jadwal</th>
                                            <th style="width:20%">Nama MPA & MPI</th>
                                            
                                            <th style="width:10%">No. HP</th>
                                            <th style="width:20%">Lokasi Resepsi</th>
                                            <th style="width:10%">Status</th>
                                            <th class="no-content" style="width:30%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_jadwal as $jadwal)

                                        <tr>
                                            <td>{{date('Y-m-d', strtotime($jadwal->tgl_resepsi))}}</td>
                                            <td>{{$jadwal->id_jadwal}}</td>
                                            <td>{{$jadwal->nama_MPAnMPI}}</td>

                                            
                                            <td>{{$jadwal->no_HP1}}</td>
                                            <td>{{$jadwal->lokasi_resepsi}}</td>
                                            @if($jadwal->status == "Dikerjakan")
                                            <td>
                                                <span class="shadow-none badge badge-primary">Dikerjakan</span>
                                            </td>
                                            @elseif($jadwal->status == "selesai")
                                            <td>
                                                <span class="shadow-none badge badge-danger">Selesai</span>
                                            </td>
                                            @endif
                                            <td>
                                                <button class="btn-pil btn-primary btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalHistory{{$jadwal->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                                </button>
                                                <button class="btn-pil btn-warning btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalView{{$jadwal->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </button>

                                                <button class="btn-pil btn-danger btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalDelete{{$jadwal->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                </button>
                                            </td>
                                            <div id="exampleModalDelete{{$jadwal->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin jadwal {{$jadwal->nama_MPAnMPI}} Mau Dihapus ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('Deletejadwal', $jadwal->id)}}" class="btn btn-danger">Yaking Dong</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="exampleModalHistory{{$jadwal->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin jadwal {{$jadwal->nama_MPAnMPI}} Sudah Selesai ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('Donejadwal', $jadwal->id)}}" class="btn btn-danger">Yaking Dong</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="exampleModalView{{$jadwal->id}}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Form Edit jadwal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{route('Updatejadwal', $jadwal->id)}}" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">ID jadwal</label>
                                                                <input type="text" class="form-control"  value="{{$jadwal->id_jadwal}}" name="id_jadwal" readonly>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Nama Pasangan</label>
                                                                <input type="text" class="form-control"  value="{{$jadwal->nama_MPAnMPI}}" name="nama_MPAnMPI" readonly>
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">No. HP 1</label>
                                                                    <input type="text" class="form-control"  name="no_HP1" value="{{$jadwal->no_HP1}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">No. HP 2</label>
                                                                    <input type="text" class="form-control"  name="no_HP2" value="{{$jadwal->no_HP2}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Paket Pernikahan</label>
                                                                <select class="form-control selectpicker" data-live-search="true" name="paket">
                                                                <option value="{{$jadwal->paket}}">{{$jadwal->paket}}</option>
                                                                @foreach($nikah as $jdwl)
                                                                <option value="{{$jdwl->nama_paket}}">{{$jdwl->nama_paket}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Warna Tema</label>
                                                                <input type="text" class="form-control"  value="{{$jadwal->warna_tema}}" name="warna_tema" readonly>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Jam Temu</label>
                                                                <input type="text" class="form-control"  placeholder="jam_temu" value="{{$jadwal->jam_temu}}">
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputEmail4">Tanggal Akad</label>
                                                                    <input  value="{{$jadwal->tgl_akad}}" class="form-control flatpickr flatpickr-input active" type="text" name="tgl_akad">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">Jam Akad</label>
                                                                    <input type="text" class="form-control"  name="jam_akad" value="{{$jadwal->jam_akad}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Lokasi Akad</label>
                                                                    <input type="text" class="form-control"  name="lokasi_akad" value="{{$jadwal->lokasi_akad}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputEmail4">Tanggal Resepsi</label>
                                                                    <input  value="{{$jadwal->tgl_resepsi}}" class="form-control flatpickr flatpickr-input active" type="text" name="tgl_resepsi">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">Jam Resepsi</label>
                                                                    <input type="text" class="form-control"  name="jam_resepsi" value="{{$jadwal->jam_resepsi}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Lokasi Resepsi</label>
                                                                    <input type="text" class="form-control"  name="lokasi_resepsi" value="{{$jadwal->lokasi_resepsi}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputEmail4">Paket Rias</label>
                                                                    <select class="form-control" data-live-search="true" name="paket_rias">
                                                                    <option value="{{$jadwal->paket_rias}}">{{$jadwal->paket_rias}}</option>
                                                                    @foreach($rias as $rs)
                                                                    <option value="{{$rs->paket_rias}}">{{$rs->paket_rias}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputEmail4">Jenis Rias</label>
                                                                    <select class="form-control" data-live-search="true" name="jenis_rias">
                                                                    <option value="{{$jadwal->jenis_rias}}">{{$jadwal->jenis_rias}}</option>
                                                                    @foreach($jenis_rias as $jr)
                                                                    <option value="{{$jr->jenis_rias}}">{{$jr->jenis_rias}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">Perias</label>
                                                                    <select class="form-control" data-live-search="true" name="perias">
                                                                    <option value="{{$jadwal->perias}}">{{$jadwal->perias}}</option>
                                                                    @foreach($perias as $prias)
                                                                    <option value="{{$prias->name}}">{{$prias->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">Catatan Perias</label>
                                                                    <input type="text" class="form-control"  value="{{$jadwal->tambah_rias}}" name="tambah_rias">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Paket Dekorasi</label>
                                                                <select class="form-control" data-live-search="true" name="paket_dek">
                                                                <option value="{{$jadwal->paket_dek}}">{{$jadwal->paket_dek}}</option>
                                                                @foreach($paket_dek as $dek)
                                                                <option value="{{$dek->paket_dek}}">{{$dek->paket_dek}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">PJ Dekorasi</label>
                                                                    <select class="form-control" data-live-search="true" name="dekorasi">
                                                                    <option value="{{$jadwal->dekorasi}}">{{$jadwal->dekorasi}}</option>
                                                                    @foreach($dekorasi as $dekor)
                                                                    <option value="{{$dekor->name}}">{{$dekor->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Catatan Dekorasi</label>
                                                                    <input type="text" class="form-control"  value="{{$jadwal->tambah_dek}}" name="tambah_dek">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Paket Dokumentasi</label>
                                                                <select class="form-control" data-live-search="true" name="paket_dok">
                                                                <option value="{{$jadwal->paket_dok}}">{{$jadwal->paket_dok}}</option>
                                                                @foreach($paket_dok as $dok)
                                                                <option value="{{$dok->paket_dok}}">{{$dok->paket_dok}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">PJ Dokumentasi</label>
                                                                    <select class="form-control" data-live-search="true" name="dokumentasi">
                                                                    <option value="{{$jadwal->dokumentasi}}">{{$jadwal->dokumentasi}}</option>
                                                                    @foreach($fotografer as $foto)
                                                                    <option value="{{$foto->name}}">{{$foto->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Catatan Dokumentasi</label>
                                                                    <input type="text" class="form-control"  value="{{$jadwal->tambah_dok}}" name="tambah_dok">
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-4">
                                                                    <label for="inputEmail4">Hiburan</label>
                                                                    <select class="form-control" data-live-search="true" name="paket_hiburan">
                                                                    <option value="{{$jadwal->paket_hiburan}}">{{$jadwal->paket_hiburan}}</option>
                                                                    @foreach($paket_hiburan as $hib)
                                                                    <option value="{{$hib->paket_hiburan}}">{{$hib->paket_hiburan}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="inputPassword4">PJ Hiburan</label>
                                                                    <select class="form-control" data-live-search="true" name="hiburan">
                                                                    <option value="{{$jadwal->hiburan}}">{{$jadwal->hiburan}}</option>
                                                                    @foreach($hiburan as $hib)
                                                                    <option value="{{$hib->name}}">{{$hib->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="inputPassword4">Catatan Hiburan</label>
                                                                    <input type="text" class="form-control"  value="{{$jadwal->tambah_hiburan}}" name="tambah_hiburan">
                                                                </div>
                                                                    
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">MC</label>
                                                                    <select class="form-control" data-live-search="true" name="paket_mc">
                                                                    <option value="{{$jadwal->paket_mc}}">{{$jadwal->paket_mc}}</option>
                                                                    @foreach($paket_mc as $pkt_mc)
                                                                    <option value="{{$pkt_mc->paket_mc}}">{{$pkt_mc->paket_mc}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">PJ MC</label>
                                                                    <select class="form-control" data-live-search="true" name="mc">
                                                                    <option value="{{$jadwal->mc}}">{{$jadwal->mc}}</option>
                                                                    @foreach($mc as $pj_mc)
                                                                    <option value="{{$pj_mc->name}}">{{$pj_mc->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputPassword4">Catatan MC</label>
                                                                    <input type="text" class="form-control"  value="{{$jadwal->tambah_mc}}" name="tambah_mc">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="inputAddress">Cucu Lampah</label>
                                                                    <select class="form-control" data-live-search="true" name="cucu_lampah">
                                                                    <option value="{{$jadwal->cucu_lampah}}">{{$jadwal->cucu_lampah}}</option>
                                                                    @foreach($cucu_lampah as $cl)
                                                                    <option value="{{$cl->cucu_lampah}}">{{$cl->cucu_lampah}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">Tenda</label>
                                                                    <select class="form-control" data-live-search="true" name="paket_tenda">
                                                                    <option value="{{$jadwal->paket_tenda}}">{{$jadwal->paket_tenda}}</option>
                                                                    @foreach($paket_tenda as $tnd)
                                                                    <option value="{{$tnd->paket_tenda}}">{{$tnd->paket_tenda}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">PJ Tenda</label>
                                                                    <select class="form-control" data-live-search="true" name="tenda">
                                                                    <option value="{{$jadwal->tenda}}">{{$jadwal->tenda}}</option>
                                                                    @foreach($tenda as $tend)
                                                                    <option value="{{$tend->name}}">{{$tend->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                    
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">Mobil</label>
                                                                    <select class="form-control" data-live-search="true" name="paket_mobil">
                                                                    <option value="{{$jadwal->paket_mobil}}">{{$jadwal->paket_mobil}}</option>
                                                                    @foreach($paket_mobil as $mbl)
                                                                    <option value="{{$mbl->paket_mobil}}">{{$mbl->paket_mobil}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">PJ Mobil</label>
                                                                    <select class="form-control" data-live-search="true" name="mobil">
                                                                    <option value="{{$jadwal->mobil}}">{{$jadwal->mobil}}</option>
                                                                    @foreach($mobil as $mob)
                                                                    <option value="{{$mob->name}}">{{$mob->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                    
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <label for="inputAddress">Catatan Jadwal</label>
                                                                <input type="text" class="form-control"  value="{{$jadwal->catatan}}" name="catatan">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">PJ Catering</label>
                                                                <select class="form-control" data-live-search="true" name="catering">
                                                                <option value="{{$jadwal->catering}}">{{$jadwal->catering}}</option>
                                                                @foreach($catering as $ctr)
                                                                <option value="{{$ctr->name}}">{{$ctr->name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="inputAddress">Makanan</label>
                                                                <input type="text" class="form-control"  value="{{$jadwal->makan}}" name="makan">
                                                            </div>
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-4">
                                                                    <label for="inputPassword4">Foto Gaun</label>
                                                                    <input type="file" class="form-control-file"  name="foto_gaun">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="inputPassword4">Foto Dekor</label>
                                                                    <input type="file" class="form-control-file"  name="foto_dekor">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="inputPassword4">Foto Photobooth</label>
                                                                    <input type="file" class="form-control-file"  name="foto_booth">
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
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal Resepsi</th>
                                            <th>ID Jadwal</th>
                                            <th>Nama MPA & MPI</th>
                                            
                                            <th>No. HP</th>
                                            <th>Lokasi Resepsi</th>
                                            <th>Status</th>
                                            <th class="no-content">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

<div id="AddjadwalModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('Addjadwal')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nama MPA</label>
                        <input type="text" class="form-control"  placeholder="Nama MPA" name="nama_MPA">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Nama MPI</label>
                        <input type="text" class="form-control"  placeholder="Nama MPI" name="nama_MPI">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">No. HP 1</label>
                        <input type="text" class="form-control"  placeholder="No. HP" name="no_HP1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">No. HP 2</label>
                        <input type="text" class="form-control"  placeholder="No. HP" name="no_HP2">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress">Paket Pernikahan</label>
                    <select class="form-control" name="paket" id="paket">
                    <option value="18">Pilih Paket</option>
                    @foreach($nikah as $jdwl)
                    <option value="{{$jdwl->nama_paket}}">{{$jdwl->nama_paket}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress">Warna Tema</label>
                    <input type="text" class="form-control"  name="warna_tema">
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress">Jam Temu</label>
                    <input type="text" class="form-control"  placeholder="Contoh : 07:00" name="jam_temu" >
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Tanggal Akad</label>
                        <input type="date" class="form-control"  name="tgl_akad">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Jam Akad</label>
                        <input type="time" class="form-control"  name="jam_akad">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Lokasi Akad</label>
                        <input type="text" class="form-control"  placeholder="lokasi_akad" name="lokasi_akad">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Tanggal Resepsi</label>
                        <input type="date" class="form-control"  name="tgl_resepsi">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Jam Resepsi</label>
                        <input type="time" class="form-control"  name="jam_resepsi">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Lokasi Resepsi</label>
                        <input type="text" class="form-control"  placeholder="Lokasi Resepsi" name="lokasi_resepsi">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Paket Rias</label>
                        <select class="form-control" id="rias" name="paket_rias">
                        <option value="-">Pilih Paket Rias</option>
                        @foreach($rias as $rs)
                        <option value="{{$rs->paket_rias}}">{{$rs->paket_rias}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Jenis Rias</label>
                        <select class="form-control selectpicker" data-live-search="true" name="jenis_rias">
                        <option value="-">Pilih Jenis Rias</option>
                        @foreach($jenis_rias as $jr)
                        <option value="{{$jr->jenis_rias}}">{{$jr->jenis_rias}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Perias</label>
                        <select class="form-control selectpicker" data-live-search="true" name="perias">
                        @foreach($perias as $prias)
                        <option value="{{$prias->name}}">{{$prias->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Catatan Perias</label>
                        <input type="text" class="form-control"  placeholder="Catatan Perias" name="tambah_rias">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlSelect1">Paket Dekorasi</label>
                    <select class="form-control" id="dek" name="paket_dek">
                    <option value="-">Pilih Paket Dekorasi</option>
                    @foreach($paket_dek as $dek)
                    <option value="{{$dek->paket_dek}}">{{$dek->paket_dek}}</option>
                    @endforeach
                    </select>
                </div>
                <br><br>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">PJ Dekorasi</label>
                        <select class="form-control selectpicker" data-live-search="true" name="dekorasi">
                        <option value="-">Pilih PJ Dekor</option>
                        @foreach($dekorasi as $dekor)
                        <option value="{{$dekor->name}}">{{$dekor->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Catatan Dekorasi</label>
                        <input type="text" class="form-control"  placeholder="Catatan Dekorasi" name="tambah_dek">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress">Paket Dokumentasi</label>
                    <select class="form-control" id="dok" name="paket_dok">
                    <option value="-">Pilih Paket Dokumentasi</option>
                    @foreach($paket_dok as $dok)
                    <option value="{{$dok->paket_dok}}">{{$dok->paket_dok}}</option>
                    @endforeach
                    </select>
                </div>
                <br><br>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">PJ Dokumentasi</label>
                        <select class="form-control selectpicker" data-live-search="true" name="dokumentasi">
                        <option value="-">Pilih Fotografer</option>
                        @foreach($fotografer as $foto)
                        <option value="{{$foto->name}}">{{$foto->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Catatan Dokumentasi</label>
                        <input type="text" class="form-control"  placeholder="Catatan Dokumentasi" name="tambah_rias">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Hiburan</label>
                        <select class="form-control" id="hiburan" name="paket_hiburan">
                        <option value="-">Pilih Paket Hiburan</option>
                        @foreach($paket_hiburan as $hib)
                        <option value="{{$hib->paket_hiburan}}">{{$hib->paket_hiburan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">PJ Hiburan</label>
                        <select class="form-control selectpicker" data-live-search="true" name="hiburan">
                        <option value="-">Pilih PJ Hiburan</option>
                        @foreach($hiburan as $hib)
                        <option value="{{$hib->name}}">{{$hib->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Catatan Hiburan</label>
                        <input type="text" class="form-control"  placeholder="Catatan Hiburan" name="tambah_hiburan">
                    </div>
                        
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">MC</label>
                        <select class="form-control" id="mc" name="paket_mc">
                        <option value="-">Pilih Paket MC</option>
                        @foreach($paket_mc as $pkt_mc)
                        <option value="{{$pkt_mc->paket_mc}}">{{$pkt_mc->paket_mc}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">PJ MC</label>
                        <select class="form-control selectpicker" data-live-search="true" name="mc">
                        <option value="-">Pilih PJ MC</option>
                        @foreach($mc as $pj_mc)
                        <option value="{{$pj_mc->name}}">{{$pj_mc->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Catatan MC</label>
                        <input type="text" class="form-control"  placeholder="Catatan MC" name="tambah_mc">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Cucu Lampah</label>
                        <select class="form-control selectpicker" data-live-search="true" name="cucu_lampah">
                        <option value="-">Pilih Paket Cucu Lampah</option>
                        @foreach($cucu_lampah as $cl)
                        <option value="{{$cl->cucu_lampah}}">{{$cl->cucu_lampah}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Tenda</label>
                        <select class="form-control selectpicker" data-live-search="true" name="paket_tenda">
                        <option value="-">Pilih Paket Tenda</option>
                        @foreach($paket_tenda as $tnd)
                        <option value="{{$tnd->paket_tenda}}">{{$tnd->paket_tenda}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">PJ Tenda</label>
                        <select class="form-control selectpicker" data-live-search="true" name="tenda">
                        <option value="-">Pilih PJ Tenda</option>
                        @foreach($tenda as $tend)
                        <option value="{{$tend->name}}">{{$tend->name}}</option>
                        @endforeach
                        </select>
                    </div>
                        
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Mobil</label>
                        <select class="form-control selectpicker" data-live-search="true" name="paket_mobil">
                        <option value="-">Pilih Paket Mobil</option>
                        @foreach($paket_mobil as $mbl)
                        <option value="{{$mbl->paket_mobil}}">{{$mbl->paket_mobil}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">PJ Mobil</label>
                        <select class="form-control selectpicker" data-live-search="true" name="mobil">
                        <option value="-">Pilih PJ Mobil</option>
                        @foreach($mobil as $mob)
                        <option value="{{$mob->name}}">{{$mob->name}}</option>
                        @endforeach
                        </select>
                    </div>
                        
                </div>
                <div class="form-group mb-4">
                    <label for="inputAddress">PJ Catering</label>
                    <select class="form-control selectpicker" data-live-search="true" name="catering">
                    <option value="-">Pilih PJ Catering</option>
                    @foreach($catering as $ctr)
                    <option value="{{$ctr->name}}">{{$ctr->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Nasi</label>
                        <select class="form-control selectpicker" data-live-search="true" name="nasi">
                        <option value="-">Pilih Menu Nasi</option>
                        @foreach($nasi as $nasi)
                        <option value="{{$nasi->makan}}">{{$nasi->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Sayur</label>
                        <select class="form-control selectpicker" data-live-search="true" name="sayur">
                        <option value="-">Pilih Menu Sayur</option>
                        @foreach($sayur as $sayur)
                        <option value="{{$sayur->makan}}">{{$sayur->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Ayam</label>
                        <select class="form-control selectpicker" data-live-search="true" name="ayam">
                        <option value="-">Pilih Menu Ayam</option>
                        @foreach($ayam as $ayam)
                        <option value="{{$ayam->makan}}">{{$ayam->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Ikan</label>
                        <select class="form-control selectpicker" data-live-search="true" name="ikan">
                        <option value="-">Pilih Menu Ikan</option>
                        @foreach($ikan as $ikan)
                        <option value="{{$ikan->makan}}">{{$ikan->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Sup</label>
                        <select class="form-control selectpicker" data-live-search="true" name="sup">
                        <option value="-">Pilih Menu Sup</option>
                        @foreach($sup as $sup)
                        <option value="{{$sup->makan}}">{{$sup->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Minuman</label>
                        <select class="form-control selectpicker" data-live-search="true" name="minuman">
                        <option value="-">Pilih Menu Minuman</option>
                        @foreach($minuman as $minuman)
                        <option value="{{$minuman->makan}}">{{$minuman->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Snack</label>
                        <select class="form-control selectpicker" data-live-search="true" name="snack">
                        <option value="-">Pilih Menu Snack</option>
                        @foreach($snack as $snack)
                        <option value="{{$snack->makan}}">{{$snack->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Desert</label>
                        <select class="form-control selectpicker" data-live-search="true" name="desert">
                        <option value="-">Pilih Menu Desert</option>
                        @foreach($desert as $desert)
                        <option value="{{$desert->makan}}">{{$desert->makan}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <label for="inputAddress">Catatan Jadwal</label>
                    <input type="text" class="form-control"  placeholder="Catatan Jadwal" name="catatan">
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Foto Gaun</label>
                        <input type="file" class="form-control-file"  name="foto_gaun">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Foto Dekor</label>
                        <input type="file" class="form-control-file"  name="foto_dekor">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Foto Photobooth</label>
                        <input type="file" class="form-control-file"  name="foto_booth">
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi</button>
                <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
$(document).ready(function() {
    $('#dek').select2();
    $('#dok').select2();
    $('#rias').select2();
    $('#hiburan').select2();
    $('#mc').select2();
});
</script>

<script type="text/javascript">
        $(document).ready(function () {
           $('#paket').change(function () {
             var id = $(this).val();

             $('#dek').find('option').remove(':first');

             $.ajax({
                url:'jadwal/dekor/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].paket_dek;

                             var option = "<option value='"+name+"' selected>"+name+"</option>"; 

                             $("#dek").append(option,);
                        }
                    }
                }
             })
           });
        });
</script>
<script type="text/javascript">
        $(document).ready(function () {
           $('#paket').change(function () {
             var id = $(this).val();

             $('#dok').find('option').remove(':first');

             $.ajax({
                url:'jadwal/dok/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].paket_dok;

                             var option = "<option value='"+name+"' selected>"+name+"</option>"; 

                             $("#dok").append(option,);
                        }
                    }
                }
             })
           });
        });
</script>
<script type="text/javascript">
        $(document).ready(function () {
           $('#paket').change(function () {
             var id = $(this).val();

             $('#rias').find('option').remove(':first');

             $.ajax({
                url:'jadwal/rias/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].paket_rias;

                             var option = "<option value='"+name+"' selected>"+name+"</option>"; 

                             $("#rias").append(option,);
                        }
                    }
                }
             })
           });
        });
</script>
<script type="text/javascript">
        $(document).ready(function () {
           $('#paket').change(function () {
             var id = $('#paket').val();

             $('#hiburan').find('option').remove(':first');

             $.ajax({
                url:'jadwal/hiburan/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].paket_hiburan;

                             var option = "<option value='"+name+"' selected>"+name+"</option>"; 

                             $("#hiburan").append(option,);
                        }
                    }
                }
             })
           });
        });
</script>
<script type="text/javascript">
        $(document).ready(function () {
           $('#paket').change(function () {
             var id = $('#paket').val();

             $('#mc').find('option').remove(':first');

             $.ajax({
                url:'jadwal/mc/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].paket_mc;

                             var option = "<option value='"+name+"' selected>"+name+"</option>"; 

                             $("#mc").append(option,);
                        }
                    }
                }
             })
           });
        });
</script>
@endsection