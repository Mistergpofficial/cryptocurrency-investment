@extends('layouts.dash')

@section('content')
    <header-up></header-up>
    <Left></Left>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1748.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Withdrawal Form
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!! route('user.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{!! route('user.withdraw') !!}">Members Withdrawals</a></li>
                <li class="breadcrumb-item active">Members Withdrawal</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xl-4 col-lg-5">

                    <!-- Profile Image -->
                    <div class="box">
                        <div class="box-body box-profile">
                            @if(Auth()->user()->pro_pic == "")
                            <img class="profile-user-img rounded img-fluid mx-auto d-block" src="{!! asset('images/find_user.png') !!}" >
                            @else
                                <img class="profile-user-img rounded img-fluid mx-auto d-block" src="{!! asset('public/crypto_images/' . Auth()->user()->pro_pic) !!}"  >
                            @endif
                                <h2 class="profile-username text-center mb-0">@{{ authUser.full_name }}</h2>

                            <h4 class="text-muted text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>@{{ authUser.email }}</h4>


                            <div class="row">

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-8 col-lg-7">
                    <div class="box box-solid bg-black">
                        <div class="box-header with-border">
                            <h3 class="box-title">Withdrawal details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" v-if="submitted">
                                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                        Your request has been received
                                    </div>
                                    <div class="alert alert-success" v-if="sub">
                                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                        You ReInvested Successfully
                                    </div>
                                    @if(count($balance) > 0)

                                        @if($balance->sum('returns') > 0)
                                            <form  action="" method="post" @submit.prevent="withdraw()" @keydown="clear($event.target.name)" >
                                                <p>Your total balance is ${{ $sum}}</p>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Amount($)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="amount" v-model="withdrawalDetails.amount" placeholder="Withdrawal Amount"  name="amount">
                                                <span class="help is-danger" style="color: red;">@{{ getWithdrawalError('amount') }}</span>
                                                <br/>
                                                <span style="color: red;" class="validation" v-show="!validations.amount.is_valid">@{{ validations.amount.text }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Payment Mode</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="payment_mode" v-model="withdrawalDetails.payment_mode">
                                                    <option value="Bitcoin">Bitcoin</option>
                                                    <option value="Ethereum">Ethereum</option>
                                                </select>
                                                <span class="help is-danger" style="color: red;">@{{ getWithdrawalError('payment_mode') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-yellow">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                        <br/>
                                        <br/>
                                        @if($reInvest['day_count'] == 30)
                                            <form  action="" method="post" @submit.prevent="reInvestTotal()">
                                               <button name="invest" type="submit" class="btn btn-primary">REINVEST</button>
                                            </form>
                                            @endif
                                        @endif
                                    @else
                                        @if(count($referral) > 0)
                                            @if($referral->sum('amount') > 0)

                                                <form  action="" method="post" @submit.prevent="withdrawReferral()" @keydown="clear($event.target.name)" >
                                                    <p>Your referral balance is {{ $sum }}</p>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Amount($)</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="amount" v-model="withdrawalReferralDetails.amount" placeholder="Withdrawal Amount"  name="amount">
                                                            <span class="help is-danger" style="color: red;">@{{ getWithdrawalReferralError('amount') }}</span><br/>
                                                            <span style="color: red;" class="validation" v-show="!validations.amount.is_valid">@{{ validations.amount.text }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Payment Mode</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="payment_mode" v-model="withdrawalReferralDetails.payment_mode">
                                                                <option value="Bitcoin">Bitcoin</option>
                                                                <option value="Ethereum">Ethereum</option>
                                                            </select>
                                                            <span class="help is-danger" style="color: red;">@{{ getWithdrawalReferralError('payment_mode') }}</span>    </div>
                                                    </div>
                                                    <input type="hidden" name="referral" v-model="withdrawalReferralDetails.referral">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-yellow">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>

                                        <br/>
                                                @if($reInvest['day_count'] == 30)
                                                <form action="" method="post" @submit.prevent="reInvestReferral()">
                                                  <button name="invest" type="submit" class="btn btn-primary">REINVEST</button>
                                                </form>
                                            @endif
                                            @endif

                                        @else
                                            <p>Your account balance is $0</p>
                                        @endif
                                    @endif

                                    <br/>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->








        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer-down></footer-down>
@endsection
