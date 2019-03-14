<template>
    <div>
        <header-up></header-up>
        <left-nav></left-nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1748.5px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Deposit Form
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/dashboard`"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/deposit`">Members Deposit</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xl-4 col-lg-5">

                        <!-- Profile Image -->
                        <div class="box">
                            <div class="box-body box-profile">

                                <img class="profile-user-img rounded img-fluid mx-auto d-block" :src="`https://itradeoption.com/public/images/find_user.png`"  v-if="authUser.pro_pic == null">
                                <img class="profile-user-img rounded img-fluid mx-auto d-block" :src="`https://itradeoption.com/public/crypto_images/` + authUser.pro_pic" v-else="authUser.pro_pic != null">
                                <h2 class="profile-username text-center mb-0">{{ authUser.full_name }}</h2>

                                <h4 class="text-muted text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>{{ authUser.email }}</h4>

                                <!--<div class="row social-states">
                                    <div class="col-6 text-right"><a href="http://html-templates.multipurposethemes.com/bootstrap-4/admin/unique/02/unique-admin/crypto-dashboard/pages/members/member-profile.html#" class="link"><i class="ion ion-ios-people-outline"></i> 254</a></div>
                                    <div class="col-6 text-left"><a href="http://html-templates.multipurposethemes.com/bootstrap-4/admin/unique/02/unique-admin/crypto-dashboard/pages/members/member-profile.html#" class="link"><i class="ion ion-images"></i> 54</a></div>
                                </div>-->

                                <div class="row">
                                    <!--      <div class="col-12">
                                              <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">My Profile</span>
                                                  </h4>
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Invests</span>
                                                  </h4>
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">The Wallet</span>
                                                  </h4>
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Deposit</span>
                                                  </h4>
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Reports</span>
                                                  </h4>
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Services</span>
                                                  </h4>
                                                  <h4 class="media media-single p-15">
                                                      <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Support</span>
                                                  </h4>
                                              </div>
                                          </div>-->
                                    <!-- <h2 class="title w-p100 mt-10 mb-0 p-20">Last Transactions</h2>
                                     <div class="col-12">
                                         <div class="media-list media-list-hover w-p100 mt-0">
                                             <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                 <p>
                                                     <i class="fa fa-circle text-red pr-10 font-size-12"></i>Deal number 1548
                                                     <span class="subtitle pl-20 mt-10">by<span class="text-red">Johen Doe</span></span>
                                                 </p>
                                                 <p class="text-right pull-right"><span class="badge badge-sm badge-danger mb-10">sell</span><br>0.12458921 BTC</p>
                                             </h5>
                                             <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                 <p>
                                                     <i class="fa fa-circle text-success pr-10 font-size-12"></i>Deal number 1548
                                                     <span class="subtitle pl-20 mt-10">by<span class="text-success">Johen Doe</span></span>
                                                 </p>
                                                 <p class="text-right pull-right"><span class="badge badge-sm badge-success mb-10">sell</span><br>0.12458921 BTC</p>
                                             </h5>
                                             <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                 <p>
                                                     <i class="fa fa-circle text-success pr-10 font-size-12"></i>Deal number 1548
                                                     <span class="subtitle pl-20 mt-10">by<span class="text-success">Johen Doe</span></span>
                                                 </p>
                                                 <p class="text-right pull-right"><span class="badge badge-sm badge-success mb-10">sell</span><br>0.12458921 BTC</p>
                                             </h5>
                                             <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                 <p>
                                                     <i class="fa fa-circle text-red pr-10 font-size-12"></i>Deal number 1548
                                                     <span class="subtitle pl-20 mt-10">by<span class="text-red">Johen Doe</span></span>
                                                 </p>
                                                 <p class="text-right pull-right"><span class="badge badge-sm badge-danger mb-10">sell</span><br>0.12458921 BTC</p>
                                             </h5>
                                             <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                 <p>
                                                     <i class="fa fa-circle text-success pr-10 font-size-12"></i>Deal number 1548
                                                     <span class="subtitle pl-20 mt-10">by<span class="text-success">Johen Doe</span></span>
                                                 </p>
                                                 <p class="text-right pull-right"><span class="badge badge-sm badge-success mb-10">sell</span><br>0.12458921 BTC</p>
                                             </h5>
                                         </div>
                                     </div>-->
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
                                <h3 class="box-title">Deposit details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" v-if="submitted">
                                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                            New Deposit Created
                                        </div>
                                        <form @submit.prevent="invest"  @keydown="clear($event.target.name)" >
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Currency</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="currency" id="plan_fd"  style="box-shadow:none; -webkit-box-shadow:none; border-radius:0; -moz-box-shadow:none;   border: 1px solid #CFD2D7;" v-model="investmentDetails.currency">
                                                        <option value="USD">USD</option>
                                                    </select>
                                                    <span class="help is-danger" style="color: red;">{{ getInvestmentError('currency') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount($)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="amount" placeholder="Depositing Amount"  name="amount" v-model="investmentDetails.amount">
                                                    <span class="help is-danger" style="color: red;">{{ getInvestmentError('amount') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                <span v-if="investmentDetails.amount >= 1000 && investmentDetails.amount <= 10000">
                               <label class="col-sm-2 col-form-label"></label>
                            <select name="registras_plan" class="form-control" v-model="investmentDetails.registras_plan" >
                                <option disabled value="">- Choose a package * -</option>
                                <option>Basic Plan</option>
                            </select>
                              <span class="help is-danger" style="color: red;">{{ getInvestmentError('registras_plan') }}</span>
                        </span>

                                                    <span v-if="investmentDetails.amount >= 10001 && investmentDetails.amount <= 30000">
                                     <label class="col-sm-2 col-form-label"></label>
                            <select name="registras_plan" class="form-control" v-model="investmentDetails.registras_plan" >
                                <option disabled value="">- Choose a package * -</option>
                                <option>StartUp Plan</option>
                            </select>
                              <span class="help is-danger" style="color: red;">{{ getInvestmentError('registras_plan') }}</span>
                        </span>
                                                    <span v-if="investmentDetails.amount >= 30001 && investmentDetails.amount <= 50000">
                                     <label class="col-sm-2 col-form-label"></label>
                            <select name="registras_plan" class="form-control" v-model="investmentDetails.registras_plan" >
                                <option disabled value="">- Choose a package * -</option>
                                <option>Standard Plan</option>
                            </select>
                                 <span class="help is-danger" style="color: red;">{{ getInvestmentError('registras_plan') }}</span>
                           </span>
                                                    <span v-if="investmentDetails.amount >= 50001 && investmentDetails.amount <= 100000">
                                   <label class="col-sm-2 col-form-label"></label>
                            <select name="registras_plan" class="form-control" v-model="investmentDetails.registras_plan" >
                                <option disabled value="">- Choose a package * -</option>
                                <option>Premium Plan</option>
                            </select>
                                 <span class="help is-danger" style="color: red;">{{ getInvestmentError('registras_plan') }}</span>
                           </span>
                                                    <span v-if="investmentDetails.amount >= 100001 && investmentDetails.amount <= 1000000">
                                     <label class="col-sm-2 col-form-label"></label>
                            <select name="registras_plan" class="form-control" v-model="investmentDetails.registras_plan" >
                                <option disabled value="">- Choose a package * -</option>
                                <option>Platinum Plan</option>
                            </select>
                                 <span class="help is-danger" style="color: red;">{{ getInvestmentError('registras_plan') }}</span>
                           </span>
                                                    <span v-if="investmentDetails.amount > 0 && investmentDetails.amount <= 999">
                                 <span class="help is-danger" style="color: red;">Plan amount begins from 1000 upwards</span>
                           </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount(BTC)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="btc"   name="btc" v-model="investmentDetails.btc = investmentDetails.amount / coinsBtc[0].price_usd" disabled>
                                                   <span class="help is-danger" style="color: red;">{{ getInvestmentError('btc') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount(ETH)</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="eth"   name="eth" v-model="investmentDetails.eth = investmentDetails.amount / coinetEth[0].price_usd" disabled>
                                                 <span class="help is-danger" style="color: red;">{{ getInvestmentError('eth') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Payment Method</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="payment_mode" v-model="investmentDetails.payment_mode">
                                                        <option disabled value="">- Choose a payment method * -</option>
                                                        <option>Bitcoin</option>
                                                        <option>Ethereum</option>
                                                    </select>
                                                    <span class="help is-danger" style="color: red;">{{ getInvestmentError('payment_mode') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-yellow">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
        <footer-up></footer-up>
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
                coinDataBtc: {},
                coinetEth: [],
                coinData1Eth: {},
                deposit: [],     /*using the fetchCategories()*/
                // depositToBeUpdated: {},
                depositToBeDeleted: {},
                pagination: {},
                searchWord:"",       /*used by the global filter*/
                depositCount: "",
                submitted: false,
                submit: false,
                investmentDetails: {
                    registras_plan: '',
                    currency: '',
                    amount: '',
                    btc: '',
                    eth: '',
                    payment_mode: ''
                    // payment_type: ''
                },
                errors: {},
                newDepositForm: false,
                filterParams: false,

            };
        },
        components: {
            'left-nav': leftNav,
            'header-up': Header,
            'footer-up' : Footer
        },


        created() {
            this.fetchDeposit();
            this.fetchDepositCount();
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

            fetchDepositCount () {
                this.$http.get(depositCount).then((response) => {
                    this.depositCount = response.body;
                });
            },

            fetchDeposit(page_url) {

                page_url = page_url || clientDeposit
                this.$http.get(page_url).then((response) => {
                    this.makePagination(response.data)
                    this.deposit = response.data.data;
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


            invest() {
                let transaction = this.investmentDetails;
                this.investmentDetails = { registras_plan: '', currency: '', amount: '', btc: '', eth: '', payment_mode: ''};
                this.$http.post(`${Laravel.appUrl}/user/post-deposit`, transaction)
                    .then(function (response) {
                        // this.submitted = true;
                        this.deposit.unshift(transaction);
                        this.depositCount++;
                        this.investmentDetails = "";
                        window.location = `${Laravel.appUrl}/user/invoice`

                    })
                    .catch((err) => {
                        this.errors = err.body.errors;
                    })
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
            getCoins1Eth: function() {
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

            /* editDeposit (transaction) {
                 this.depositToBeUpdated = transaction;
             },

             updateDeposit() {

                 let transaction = this.depositToBeUpdated;
                 this.$http.post(`${Laravel.appUrl}/user/update-deposit`, transaction).then((response) => {
                     this.fetchDeposit();
                     this.submitted = true;
                 }).catch( err => {
                     this.errors = err.body.errors;
                 });

             },

 */

            /* deleteDeposit (transaction) {

                 let shouldDelete = confirm('Are you sure you want to delete this episode');
                 if (!shouldDelete) return
                 this.$http.get('http://localhost:8000/delete-deposit' + '/' + transaction.id).then((response) => {
                     //  vm.$delete(vm.deposit, vm.deposit.indexOf(transaction))
                     //  vm.depositCount--
                     alert('deleted')
                 });

             },*/
            getInvestmentError(field){

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
            this.getCoins1Eth();
        }

    }
    setInterval(() => {
        this.getCoins();
    }, UPDATE_INTERVAL);

    setInterval(() => {
        this.getCoins1();
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




