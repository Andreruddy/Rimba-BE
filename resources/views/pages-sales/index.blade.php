@extends('layouts.master')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Sales</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Customer</th>
                                        <th>Total Diskon</th>
                                        <th>Total Harga</th>
                                        <th>Total Bayar</th>
                                        <th>Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                    <tr>
                                        <td> {{$data->id}} </td>
                                        <td> {{$data->customer->nama_cust}} </td>
                                        <td> Rp. {{number_format($data->total_diskon, 2,',','.')}} </td>
                                        <td> Rp. {{number_format($data->total_harga, 2,',','.')}} </td>
                                        <td> Rp. {{number_format($data->total_bayar, 2,',','.')}} </td>
                                        <td> 
                                            @if ($data->type == 'CASH')
                                                <span class="badge badge-info">
                                                @elseif($data->type == 'CREDIT')
                                                <span class="badge badge-success">
                                            @else
                                                <span>
                                            @endif
                                                {{$data->type}} 
                                                </span>
                                        </td>  
                                        <td>
                                            <form action="{{ route('sales.destroy', $data->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>   
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection