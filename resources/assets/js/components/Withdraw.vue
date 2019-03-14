<!--
<template>
    <div>
        <header-up></header-up>
        <left-nav></left-nav>
        &lt;!&ndash; ########## START: MAIN PANEL ########## &ndash;&gt;
        <div class="br-mainpanel">
            <div class="br-pageheader pd-y-15 pd-l-20">
                <nav class="breadcrumb pd-0 mg-0 tx-12">
                    <a class="breadcrumb-item" href="'http://localhost/prime/'">Home</a>
                    <a class="breadcrumb-item" href="http://localhost/prime/user/deposit">Deposit</a>
                </nav>
            </div>&lt;!&ndash; br-pageheader &ndash;&gt;
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <h4 class="tx-gray-800 mg-b-5">My Withdrawal</h4>
                <p class="mg-b-0">Total Deposit:  &nbsp; {{depositCount}}  </p>
            </div>

            <div class="br-pagebody">
                <div class="br-section-wrapper">
                    &lt;!&ndash;  <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
                      <p class="mg-b-25 mg-lg-b-50">Using the most basic table markup.</p>&ndash;&gt;
                    <main class="main">
                        &lt;!&ndash; main page starts here &ndash;&gt;
                        <div class="breadcrumb">

                            <li class="breadcrumb-item"><span class="uk-badge"> &nbsp; Total Withdrawal: @{{withdrawalCount}} &nbsp; </span></li>
                            <li> &nbsp; <button class="newButton breadcrumb-item uk-button uk-button-primary uk-button-small" href="#newWithdrawalForm" uk-scroll @click="newWithdrawalForm = true">Add New Withdrawal</button></li>

                            &lt;!&ndash; Breadcrumb Menu&ndash;&gt;
                            <li id="pagination" class="breadcrumb-menu hidden-md-down">
                                <button class="btn btn-default btn-sm" @click="fetchWithdrawal(pagination.prev_page_url)"
                                        :disabled="!pagination.prev_page_url">
                                    Previous
                                </button> &nbsp;
                                <span>Page @{{pagination.current_page}} of @{{pagination.last_page}}</span> &nbsp;
                                <button class="btn btn-default btn-sm" @click="fetchWithdrawal(pagination.next_page_url)"
                                        :disabled="!pagination.next_page_url">Next
                                </button>
                            </li>
                        </div>

                        <div class="container-fluid">
                            <div class="animated fadeIn">

                                &lt;!&ndash; new withdrawal form &ndash;&gt;
                                <div id="newWithdrawalForm" class="col-lg-12 uk-animation-slide-top-medium" v-show="newWithdrawalForm">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-edit"></i>  Fill in the new withdrawal details
                                            <div class="card-actions">
                                                <a class="pull-right" style="color:#FC0000;"  @click="newWithdrawalForm = false" uk-close></a>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            @if(count($balance) > 0)

                                            @if($balance->sum('returns') > 0)
                                            {{&#45;&#45; @if(count($referral) > 0)
                                        @if($referral->sum('amount') > 0)&#45;&#45;}}
                                            <form  action="" method="post" @submit.prevent="withdraw()" @keydown="clear($event.target.name)" >
                                                <div class="box-body">
                                                    <div class="alert alert-success" v-if="submitted">
                                                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                                        Your request has been received
                                                    </div>
                                                    <p>Your total balance is ${{ $sum}}</p>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Amount  $</span>
                                                        <input type="text" class="form-control" id="amount" v-model="withdrawalDetails.amount" placeholder="Withdrawal Amount"  name="amount">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                    <span class="help is-danger" style="color: red;">@{{ getWithdrawalError('amount') }}</span><br/>
                                                    <span style="color: red;" class="validation" v-show="!validations.amount.is_valid">@{{ validations.amount.text }}</span>
                                                    <br>

                                                    <div class="form-group">

                                                        <label>Payment Mode</label>

                                                        <select class="form-control" name="payment_mode" v-model="withdrawalDetails.payment_mode">
                                                            <option value="Bitcoin">Bitcoin</option>
                                                            <option value="Ethereum">Ethereum</option>
                                                        </select>
                                                        <span class="help is-danger" style="color: red;">@{{ getWithdrawalError('payment_mode') }}</span>
                                                    </div>
                                                    <input type="hidden" name="total" v-model="withdrawalDetails.total">
                                                    <div class="box-footer">
                                                        <input type="submit" name="save"  class="btn btn-primary btn-lg" value="Apply">
                                                    </div>
                                                </div>
                                                &lt;!&ndash; /.box-body &ndash;&gt;
                                            </form>
                                            @endif



                                            @else
                                            @if(count($referral) > 0)
                                            @if($referral->sum('amount') > 0)

                                            <form  action="" method="post" @submit.prevent="withdrawReferral()" @keydown="clear($event.target.name)" >
                                                <div class="box-body">
                                                    <div class="alert alert-success" v-if="submitted">
                                                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                                        Your request has been received
                                                    </div>
                                                    <p>Your referral balance is {{ $sum }}</p>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Amount  $</span>
                                                        <input type="text" class="form-control" id="amount" v-model="withdrawalReferralDetails.amount" placeholder="Withdrawal Amount"  name="amount">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                    <span class="help is-danger" style="color: red;">@{{ getWithdrawalReferralError('amount') }}</span><br/>
                                                    <span style="color: red;" class="validation" v-show="!validations.amount.is_valid">@{{ validations.amount.text }}</span>
                                                    <br>

                                                    <div class="form-group">

                                                        <label>Payment Mode</label>

                                                        <select class="form-control" name="payment_mode" v-model="withdrawalReferralDetails.payment_mode">
                                                            <option value="Bitcoin">Bitcoin</option>
                                                            <option value="Ethereum">Ethereum</option>
                                                        </select>
                                                        <span class="help is-danger" style="color: red;">@{{ getWithdrawalReferralError('payment_mode') }}</span>
                                                    </div>
                                                    <input type="hidden" name="referral" v-model="withdrawalReferralDetails.referral">
                                                    <div class="box-footer">
                                                        <input type="submit" name="save"  class="btn btn-primary btn-lg" value="Apply">
                                                    </div>
                                                </div>
                                                &lt;!&ndash; /.box-body &ndash;&gt;
                                            </form>
                                            @endif

                                            @else
                                            <p>Your account balance is $0</p>
                                            @endif
                                            @endif


                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash; new category form &ndash;&gt;




                                &lt;!&ndash; search input &ndash;&gt;
                                <div class="card-block" v-show="!newWithdrawalForm">
                                    <div id="searchForm" class="col-lg-12 uk-animation-slide-top-medium">
                                        <div class="card">
                                            <div class="card-header">
                                                <input type="text" v-model="searchWord" class="form-control" PLACEHOLDER="search withdrawals...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash; search input &ndash;&gt;

                                &lt;!&ndash; ALL THE CATEGORIES&ndash;&gt;
                                <div class="row">

                                    <div class="col-sm-6 col-md-4 uk-animation-slide-bottom-medium" v-for="withdraw in filterBy(withdrawal, searchWord)" v-show="!newWithdrawalForm">
                                        <div class="card uk-card uk-card-default uk-card-hover">
                                            <div class="card-block">
                                                <strong class="categoryName"> Amount:</strong> &nbsp;$@{{ withdraw.amount }}
                                                <hr>
                                                <p> <strong class="categoryDescription">Status:</strong> &nbsp;@{{ withdraw.status }}</p>
                                                <p> <strong class="categoryDescription">Application Date:</strong> &nbsp;@{{ withdraw.created_at | formatDate }}</p>
                                                <p v-if="withdraw.payment_date == null"> <strong class="categoryDescription">Payment Date:</strong>&nbsp;Not Yet Paid</p>
                                                <p v-else> <strong class="categoryDescription">Payment Date:</strong> &nbsp;@{{ withdraw.payment_date | formatDate }}</p>
                                            </div>

                                            <div class="uk-container card-footer">
                                                &lt;!&ndash;  <a v-if="transaction.status == 'PENDING' " uk-icon="icon: pencil; ratio: 1.2" href="#editDepositModal" uk-toggle @click.prevent="editDeposit (transaction)"><i class="fa fa-pencil"></i></a>
                                                  &nbsp; &nbsp;
                  &ndash;&gt;
                                                <a v-if="withdraw.status == 'NOT PAID' " style="color:#FC0000;" uk-icon="icon: close; ratio: 1.2" uk-toggle   :href="`/delete-withdrawal/${withdraw.id}`" ><i class="fa fa-times"></i></a>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                &lt;!&ndash; bottom pagination &ndash;&gt;
                                <div class="card-block uk-animation-slide-top-medium" v-show="!newWithdrawalForm">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="paginationn float-right">
                                                <button class="btn btn-default btn-sm" @click="fetchWithdrawal(pagination.prev_page_url)"
                                                        :disabled="!pagination.prev_page_url">
                                                    Previous
                                                </button> &nbsp;
                                                <span>Page @{{pagination.current_page}} of @{{pagination.last_page}}</span> &nbsp;
                                                <button class="btn btn-default btn-sm" @click="fetchWithdrawal(pagination.next_page_url)"
                                                        :disabled="!pagination.next_page_url">Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash; pagination &ndash;&gt;







                            </div>
                        </div>


                    </main>

                </div>&lt;!&ndash; br-section-wrapper &ndash;&gt;
            </div>&lt;!&ndash; br-pagebody &ndash;&gt;
            <footer-up></footer-up>
        </div>&lt;!&ndash; br-mainpanel &ndash;&gt;
        &lt;!&ndash; ########## END: MAIN PANEL ########## &ndash;&gt;
    </div>




</template>

<script>
    import leftNav from '../components/leftNav.vue'
    import Header from '../components/Header.vue'
    import Footer from '../components/Footer.vue'
    import {depositCount} from '../utilities/settings'
    import {clientDeposit} from '../utilities/settings'
    import {getUser} from '../utilities/settings'
    import {COINMARKETCAP_API_URI} from "../utilities/settings"
    import {CRYPTOCOMPARE_API_URI} from "../utilities/settings"
    import {CRYPTOCOMPARE_URI} from "../utilities/settings"
    import Vue2Filters from 'vue2-filters'
    // The amount of milliseconds (ms) after which we should update our currency
    // charts.
    let UPDATE_INTERVAL = 60 * 1000;
    Vue.use(Vue2Filters);

    export default {

        data () {
            return {
                authUser: [],
                coinsBtc: [],
                coinetEth: [],
                withdraw_amt: {},
                withdraw_ref_amt: {},
                hide:false,
                withdrawal: {},
                withdrawalToBeDeleted: {},
                pagination: {},
                searchWord:"",       /*used by the global filter*/
                withdrawalCount: "",
                newWithdrawalForm: false,
                filterParams: false,
                submitted: false,
                submit: false,
                withdrawalDetails: {
                    amount: '',
                    payment_mode: '',
                    total: 'total'
                },
                withdrawalReferralDetails: {
                    amount: '',
                    payment_mode: '',
                    referral: 'referral'
                },
                validations: {
                    amount: {
                        is_valid: true,
                        text: ''
                    },
                    registras_plan: {
                        is_valid: true,
                        text: ''
                    }
                },


            };
        },
        components: {
            'left-nav': leftNav,
            'header-up': Header,
            'footer-up' : Footer
        },


        created() {
            this.fetchWithdrawal();
            this.fetchWithdrawalCount();
            this.getCoinsBtc();
            this.getAuthUser();
        },

        methods: {

            getAuthUser(){
                this.$http.get(getUser).then(function (response) {
                    // console.log(this.settings)
                    this.authUser = response.body;
                })
            },

            fetchWithdrawalCount () {
                this.$http.get(withdrawalCount).then((response) => {
                    this.withdrawalCount = response.body;
                });
            },

            fetchWithdrawal(page_url) {

                page_url = page_url || clientWithdrawal
                this.$http.get(page_url).then((response) => {
                    this.makePagination(response.data)
                    this.withdrawal = response.data.data;
                });

            },

            makePagination (data) {
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url,
                    total: data.total
                }
                this.pagination = pagination;
            },
            turnFilter: function () {

                let keep = this.filterParams;
                if (keep) {
                    this.filterParams = false;
                }
                else if (!keep) {
                    this.filterParams = true;
                }
            },
            validateAmount(){
                let validNewAmount = true;

                if(this.withdrawalDetails.amount > this.withdraw_amt.sum){
                    validNewAmount = false;
                    this.validations.amount.is_valid = false;
                    this.validations.amount.text = 'Amount given has exceeded total balance'
                }else {
                    this.validations.amount.is_valid = true;
                    this.validations.amount.text = '';
                }

                return validNewAmount;
            },

            withdraw() {
                if(this.validateAmount()) {
                    this.$http.post(`${Laravel.appUrl}/user/post-withdraw`, this.withdrawalDetails)
                        .then(function (response) {
                            this.submitted = true;
                            this.withdrawalDetails = ""
                            window.location = `${Laravel.appUrl}/user/withdraw`
                        })
                        .catch((err) => {
                            this.errors = err.body.errors;
                        })
                }
            },
            validateReferralAmount(){
                let validNewReferralAmount = true;

                if(this.withdrawalReferralDetails.amount > this.withdraw_ref_amt.ref){
                    validNewReferralAmount = false;
                    this.validations.amount.is_valid = false;
                    this.validations.amount.text = 'Amount given has exceeded available referral balance'
                }else {
                    this.validations.amount.is_valid = true;
                    this.validations.amount.text = '';
                }

                return validNewReferralAmount;
            },


            withdrawReferral() {
                if(this.validateReferralAmount()) {
                    this.$http.post(`${Laravel.appUrl}/user/post-referral-withdraw`, this.withdrawalReferralDetails)
                        .then(function (response) {
                            this.submitted = true;
                            this.withdrawalReferralDetails = ""

                            // window.location = `${Laravel.appUrl}/user/withdraw`
                        })
                        .catch((err) => {
                            this.errors = err.body.errors;
                        })
                }
            },

            getCoinsBtc: function() {
                let that = this
                $.ajax({
                    url: 'https://api.coinmarketcap.com/v1/ticker/bitcoin/',
                    method: 'GET'
                }).then(function (response) {
                    if (response.error) {
                        console.err("There was an error " + response.error);
                    } else {

                        console.log(response);
                        that.coinsBtc = response
                    }
                }).catch(function (err) {
                    console.error(err);
                });

            },
            getCoinEth: function() {
                let self = this
                $.ajax({
                    url: 'https://api.coinmarketcap.com/v1/ticker/ethereum/',
                    method: 'GET'
                }).then(function (response) {
                    if (response.error) {
                        console.err("There was an error " + response.error);
                    } else {

                        console.log(response);
                        self.coinetEth = response
                    }
                }).catch(function (err) {
                    console.error(err);
                });

            },

            /**
             * Return a CSS color (either red or green) depending on whether or
             * not the value passed in is negative or positive.
             */
            getColor: (num) => {
                return num > 0 ? "color:green;" : "color:red;";
            },

            getWithdrawalError(field){

                if (this.errors.hasOwnProperty(field) ) {



                    if (typeof this.errors[field] === "object") {

                        return this.errors[field][0];
                    }

                    if ( typeof this.errors[field] === "string" ) {

                        return this.errors[field]
                    }
                }

            },

            getWithdrawalReferralError(field){

                if (this.errors.hasOwnProperty(field) ) {



                    if (typeof this.errors[field] === "object") {

                        return this.errors[field][0];
                    }

                    if ( typeof this.errors[field] === "string" ) {

                        return this.errors[field]
                    }
                }

            },

            clear(field) {
                delete this.errors[field];
            },

            any() {
                return Object.keys(this.errors).length > 0;
            },



        },
        mounted(){
            this.getCoinEth();
        }

    }
    setInterval(() => {
        this.getCoinsBtc();
    }, UPDATE_INTERVAL);

    setInterval(() => {
        this.getCoinEth();
    }, UPDATE_INTERVAL);

</script>


<style>

    .categoryName {
        color: #263238;
    }

    .categoryDescription {
        color: #20A8D8;
    }

</style>




-->
