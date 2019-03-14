@extends('layouts.dash')

@section('content')
    <header-up></header-up>
    <Left></Left>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1783.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Transactions Table
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!! route('user.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{!! route('user.transactions') !!}">User Transactions</a></li>
                <li class="breadcrumb-item active">Transactions Table</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box box-secondary">
                <div class="box-header with-border">
                    <h3 class="box-title">All Transactions</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        @if($transactions->count() > 0)
                        <table class="table no-margin no-border table-hover">
                            <thead>
                            <tr class="bg-dark">
                                <th class="text-yellow">CLIENT</th>
                                <th class="text-yellow">PAYMENT TO</th>
                                <th class="text-yellow">AMOUNT($)</th>
                                <th class="text-yellow">Amount(BTC)</th>
                                <th class="text-yellow">Amount(ETH)</th>
                                <th class="text-yellow">Rate(%)</th>
                                <th class="text-yellow">ROI($)</th>
                                <th class="text-yellow">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user->full_name }}</td>
                                <td>{{ $transaction->payment_mode }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->amount_btc }}</td>
                                <td>{{ $transaction->amount_eth }}</td>
                                <td>{{ $transaction->rate }}%</td>
                                <td>{{ $transaction->returns }}</td>
                                @if($transaction->status == "PENDING")
                                    <td> <a href="{{ url('confirm-payment').'/'.$transaction->id}}" class="btn btn-info"><span class="label label-success">ACTIVATE</span></a></td>
                                @else
                                    <td><button class="btn btn-success"><span class="label label-success">{{ $transaction->status  }}</span></button></td>
                                @endif

                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-info">You have no pending transaction</div>
                    @endif
                            <div class="col-md-12 text-center">
                                {{ $transactions->links() }}
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
