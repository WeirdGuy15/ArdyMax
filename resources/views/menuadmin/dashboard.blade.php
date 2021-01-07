@extends('welcome')
@section('data')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">


                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Jadwal Terbaru</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Nama Pasangan</div></th>
                                                <th><div class="th-content">Jam Resepsi</div></th>
                                                <th><div class="th-content th-heading">Tanggal Resepsi</div></th>
                                                <th><div class="th-content">Tempat Resepsi</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($data_jadwal as $jadwal)
                                            <tr>

                                                <td style="width: 40%" align='left'>
                                                	<div class="td-content">{{$jadwal->nama_MPAnMPI}}</div>
                                                </td>

                                                <td style="width: 10%" align='left'><div class="td-content">{{$jadwal->jam_resepsi}}</div></td>

                                                <td style="width: 10%" align='left'><div class="td-content">{{$jadwal->tgl_resepsi}}</div></td>

                                                <td style="width: 40%" align='left'><div class="td-content">{{$jadwal->lokasi_resepsi}}</div></td>
                                               
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-three">

                            <div class="widget-heading">
                                <h5 class="">Ranking Paket Nikah</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            	<th><div class="th-content">No</div></th>
                                                <th><div class="th-content">Paket Nikah</div></th>
                                                <th><div class="th-content th-heading">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $no=1; ?>
                                        	@foreach($ranking as $rank)
                                            <tr>
                                            	<td><div class="td-content"><?=$no?></div></td>
                                                @if($rank->paket == "Pilih Paket Utama")
                                                	<td><div class="td-content">Tidak Pakai Paket</div></td>
                                                @else
                                                	<td><div class="td-content">{{$rank->paket}}</div></td>
                                                @endif
                                                <td><div class="td-content"><span class="pricing">{{$rank->total}}</span></div></td>
                                            </tr>
                                            <?php $no++ ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


@endsection
