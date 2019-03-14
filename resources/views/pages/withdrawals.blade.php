@extends('layouts.dash')

@section('content')
    <header-up></header-up>
    <Left></Left>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1783.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Withdrawals Table
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!! route('user.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{!! route('user.withdrawals') !!}">User Withdrawals</a></li>
                <li class="breadcrumb-item active">Withdrawals Table</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box box-secondary">
                <div class="box-header with-border">
                    <h3 class="box-title">All Withdrawals</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        @if($withdrawals->count() > 0)
                            <table class="table no-margin no-border table-hover">
                                <thead>
                                <tr class="bg-dark">
                                    <th class="text-yellow">CLIENT</th>
                                    <th class="text-yellow">AMOUNT($)</th>
                                    <th class="text-yellow">BITCOIN WALLET</th>
                                    <th class="text-yellow">STATUS</th>
                                    <th class="text-yellow">WITHDRAWAL TYPE</th>
                                    <th class="text-yellow">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($withdrawals as $withdraw)
                                    <tr>
                                        <td>{{ $withdraw->user->full_name }}</td>
                                        <td>{{ $withdraw->amount }}</td>
                                        <td>{{ $withdraw->user->btc }}</td>
                                        <td>{{ $withdraw->status }}</td>
                                        @if($withdraw->type == "total")
                                            <td><span>Total balance</span></td>
                                        @else
                                            @if($withdraw->type == "referral")
                                                <td><span>Referral balance</span></td>
                                            @endif
                                        @endif
                                        @if($withdraw->status == "NOT PAID" && $withdraw->type == "total")
                                            <td> <a href="{{ url('confirm-withdrawal-payment').'/'.$withdraw->id}}"><span class="label label-warning">PAY NOW</span></a></td>
                                        @else

                                            @if($withdraw->status == "NOT PAID" && $withdraw->type == "referral")
                                                <td> <a href="{{ url('confirm-referral-withdrawal-payment').'/'.$withdraw->id}}"><span class="label label-warning">PAY REFERRAL NOW</span></a></td>
                                            @else
                                                <td><button class="btn btn-success"><span class="label label-success">{{ $withdraw->status  }}</span></button></td>

                                            @endif
                                        @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">You have no pending withdrawals</div>
                        @endif

                        <div class="col-md-12 text-center">
                            {{ $withdrawals->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- Default box -->

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer-down></footer-down>
@endsection
