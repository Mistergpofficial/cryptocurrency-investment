@extends('layouts.dash')

@section('content')



<Dashboard></Dashboard>


@endsection


@section('scripts')
    <script src="{!! asset('js/admin/dashboard.js') !!}"></script>
    <script src="{!! asset('js/admin/dashboard-chart.js') !!}"></script>
@endsection
