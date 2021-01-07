@extends('welcome')
@section('data')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{route('laporan')}}"><h4>Data Laporan Jadwal</h4></a>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-right">
                                    <a href="{{route('Exportlaporan')}}" class="btn btn-outline-success" type="button">Export Laporan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Jadwal</th>
                                            <th>Nama MPA & MPI</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>No HP 1</th>
                                            <th>No HP 2</th>
                                            <th>Paket</th>
                                            <th class="no-content">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                        @foreach($data_laporan as $laporan)
                                        <tr>
                                            <td> <?=$no?> </td>
                                            <td>{{$laporan->id_jadwal}}</td>
                                            <td>{{$laporan->nama_MPAnMPI}}</td>
                                            <td>{{$laporan->tgl_resepsi}}</td>
                                            <td>{{$laporan->no_HP1}}</td>
                                            <td>{{$laporan->no_HP2}}</td>
                                            <td>{{$laporan->paket}}</td>
                                            <td>
                                                
                                                <button class="btn-pil btn-danger btn-xs" type="button" data-toggle="modal"
                                                data-target="#exampleModalDelete{{$laporan->id}}" data-whatever="@getbootstrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                </button>
                                            </td>
                                            
                                            <div id="exampleModalDelete{{$laporan->id}}" class="modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Yakin laporanan {{$laporan->nama_MPAnMPI}} Mau Dihapus ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Nggak Jadi Deh</button>
                                                            <a href="{{route('Deletelaporan', $laporan->id)}}" class="btn btn-danger">Yaking Dong</a>
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
                                            <th>ID Jadwal</th>
                                            <th>Nama MPA & MPI</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>No HP 1</th>
                                            <th>No HP 2</th>
                                            <th>Paket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>


@endsection
