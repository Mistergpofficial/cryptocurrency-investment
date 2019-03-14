@extends('layouts.dash')

@section('content')
    <header-up></header-up>
    <Left></Left>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1783.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Management
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/prime/user/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/prime/user/manage-users">Users</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box box-secondary">
                <div class="box-header with-border">
                    <h3 class="box-title">All Users</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        @if($users->count() > 0)
                            <table class="table no-margin no-border table-hover">
                                <thead>
                                <tr class="bg-dark">
                                    <th class="text-yellow">FULL NAME</th>
                                    <th class="text-yellow">EMAIL</th>
                                    <th class="text-yellow">USERNAME</th>
                                    <th class="text-yellow">BTC WALLET</th>
                                    <th class="text-yellow">ETH WALLET</th>
                                    <th class="text-yellow">REFERER</th>
                                    <th class="text-yellow">COUNTRY</th>
                                    <th class="text-yellow">STATE</th>
                                    <th class="text-yellow">JOINED DATE</th>
                                    <th class="text-yellow">STATUS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->btc }}</td>
                                        <td>{{ $user->eth }}</td>
                                        <td>{{ $user->upline }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->state }}</td>
                                       <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                                        <td><a
                                               href="{{ url('/purge-user') .'/'.$user->id }}"> <span class="label label-warning">Purge User</span></a></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">You have no registered user </div>
                        @endif

                        <div class="col-md-12 text-center">
                            {{ $users->links() }}
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
