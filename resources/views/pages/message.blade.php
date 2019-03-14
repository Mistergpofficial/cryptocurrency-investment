@extends('layouts.dash')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ Auth::user()->full_name }}'s Dashboard</h2>
                    <h5>Welcome {{ Auth::user()->full_name }} , Love to see you back. </h5>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <section class="content-header">


                <ol class="breadcrumb">
                    <li><a href="">Home<i class="fa fa-home"></i> </a></li>
                    <li class="active">Message</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <Message></Message>
            </section>
            <!-- /.content -->




            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

    <!-- /. WRAPPER  -->


@endsection
