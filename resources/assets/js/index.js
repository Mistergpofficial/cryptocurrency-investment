/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}


require( 'jquery.caret');
require( 'at.js');


window.Vue = require('vue');

import VueCurrencyFilter from 'vue-currency-filter'
//import moment from 'moment'
import {url} from './utilities/settings';
import {allTransactions} from './utilities/settings'
import {allNotifications} from "./utilities/settings"
import {invoice} from "./utilities/settings"
import {withdraw_amt} from "./utilities/settings"
import {withdraw_referral_amt} from "./utilities/settings"
import {COINGATE_URI} from "./utilities/settings"
import {withdrawalCount} from "./utilities/settings"
import {clientWithdrawal} from "./utilities/settings"
import {depositCount} from './utilities/settings'
import {clientDeposit} from './utilities/settings'
import {getUser} from './utilities/settings'


// The API we're using for grabbing cryptocurrency prices.  The service can be
// found at: https://coinmarketcap.com/api/
//let COINMARKETCAP_API_URI = "https://api.coinmarketcap.com";
import {COINMARKETCAP_API_URI} from "./utilities/settings"
import {CRYPTOCOMPARE_API_URI} from "./utilities/settings"
import {CRYPTOCOMPARE_URI} from "./utilities/settings"
import Vue2Filters from 'vue2-filters'
// The amount of milliseconds (ms) after which we should update our currency
// charts.
let UPDATE_INTERVAL = 60 * 1000;

//Vue.prototype.$http = axios;
Vue.component('Dashboard', require('./components/Dashboard.vue'));
Vue.component('Deposit', require('./components/Deposit.vue'));
Vue.component('Invoice', require('./components/Invoice.vue'));
Vue.component('Profile', require('./components/Profile.vue'));
Vue.component('Message', require('./components/Message.vue'));
Vue.component('Transactions', require('./components/Transactions.vue'));
Vue.component('Manage', require('./components/Manage-Users.vue'));
Vue.component('Contact', require('./components/Contact.vue'));
Vue.component('Announcement', require('./components/Announcement.vue'));
Vue.component('Navbar', require('./components/Navbar.vue'));
Vue.component('Referrals', require('./components/Referral.vue'));
Vue.component('Privacy', require('./components/PrivacyPolicy.vue'));
Vue.component('Login', require('./components/Login.vue'));
Vue.component('Register', require('./components/Register.vue'));

Vue.component('Admin', require('./components/AdminReg.vue'));
Vue.component('Transaction', require('./components/UserTransaction.vue'));
Vue.component('Invoice', require('./components/Invoice.vue'));
Vue.component('header-up', require('./components/Header.vue'));
Vue.component('Left', require('./components/leftNav.vue'));

Vue.component('footer-down', require('./components/Footer.vue'));

Vue.component('Notification', require('./components/Notification.vue'));

Vue.use(Vue2Filters);


Vue.filter('timeago', function (value) {
    return moment.utc(value).local().fromNow();
});

Vue.filter('formatDate', function (value) {
    if(value) {
        return moment(String(value)).format('Do/MMMM/YYYY hh:mm')
    }
});
Vue.filter('round', function (value, decimals) {
    if(!value) {
        value = 0;
    }
    if(!decimals) {
        decimals = 0;
    }

    value = Math.round(value * Math.pow(10, decimals)) / Math.pow(10, decimals);
    return value;
});

Vue.use(VueCurrencyFilter)
Vue.use(VueCurrencyFilter,
    {
        symbol : '$',
        thousandsSeparator: '.',
        fractionCount: 2,
        fractionSeparator: ',',
        symbolPosition: 'front',
        symbolSpacing: true
    })



let index = new Vue({
    el: '#index',
    data : {

        resetSuccess: {},
        resetEmail : '',
        authUser: {},
        errors: {},
        submitted: false,
        submit: false,
        sub: false,
        image: '',
        pay_to: [],
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
        notifications: '',




       /* signupData: {
            full_name: '',
            username: '',
            email: '',
            password: '',
            password_confirmation: '',
            upline: '',
            phone: '',
            btc: '',
            country: '',
            state: '',
            city: '',
            user_name: ''
        },*/
        reInvestTotal1: {
           btc: '',
           eth: '',
       },
        reInvestReferral1: {
          btc: '',
          eth: '',
        },
        adminSignupData: {
            full_name: '',
            username: '',
            email: '',
            password: '',
            password_confirmation: '',
            phone: '',
            btc: '',
            country: '',
            state: '',
            city: '',
        },
        investmentDetails: {
            registras_plan: '',
            currency: '',
            amount: '',
            btc: '',
            eth: '',
            payment_mode: ''
           // payment_type: ''
        },
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
        }
    },

    created () {
        this.withdrawAmt();
        this.withdrawReferralAmt();
        this.fetchWithdrawal();
        this.fetchWithdrawalCount();
        this.getCoinsBtc();
        this.getAuthUser();
        this.$http.get(allNotifications).then(response => {
            this.notifications = response.body;
        });


    },


    methods: {
       /* login(){

            this.loggingIn = true;

            // Make a post request for a user to login
            this.$http.post(   `${Laravel.appUrl}/login` , this.loginData)
                .then(function (response) {
                    console.log(response);
                    window.location = `${Laravel.appUrl}/user/dashboard`

                })
                .catch( (error) => {
                    this.loggingIn = false ;
                    // console.log(error);
                    this.errors = error.body.errors || error.body ;
                });

        },
        signup(){

            this.signingUp = true ;
            // console.log(this.signingUp);
            // Make a post request for a user to login
            this.$http.post(  `${Laravel.appUrl}/register` , this.signupData)
                .then(function (response) {
                    this.submitted = true;
                    this.signupData = ""
                    //window.location = url + 'auth/login'
                })
                .catch( (error) =>  {
                    // console.log(error);
                    this.signingUp = false ;
                    this.errors = error.body.errors || error.body ;

                });
        },*/

        getAuthUser(){
            this.$http.get(getUser).then(function (response) {
                // console.log(this.settings)
                this.authUser = response.body;
            })
        },
        adminSignup(){
            // console.log(this.signingUp);
            // Make a post request for a user to login
            this.$http.post(  `${Laravel.appUrl}/admin-register/post-werbrtyrsequew/ntui` , this.adminSignupData)
                .then(function (response) {
                    this.submitted = true;
                    this.adminSignupData = ""
                    //window.location = url + 'auth/login'
                })
                .catch( (error) =>  {
                    // console.log(error);
                    this.errors = error.body.errors || error.body ;

                });
        },
        reset(){
            this.$http.post(  `${Laravel.appUrl}/password/email` , {'email' : this.resetEmail })
                .then(function (response) {
                    this.errors = {};
                    this.resetEmail = '' ;
                    this.resetSuccess = response.body ;
                })
                .catch( (error) =>  {
                    this.resetSuccess = {};
                    this.errors = error.body.errors || error.body ;
                });
        },

          invest() {
                this.$http.post(`${Laravel.appUrl}/user/post-deposit`, this.investmentDetails)
                    .then(function (response) {
                        // this.submitted = true;

                        this.investmentDetails = ""
                        window.location = `${Laravel.appUrl}/user/invoice`

                    })
                    .catch((err) => {
                        this.errors = err.body.errors;
                    })
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
                        window.location = `${Laravel.appUrl}/user/withdraw`

                      // window.location = `${Laravel.appUrl}/user/withdraw`
                    })
                    .catch((err) => {
                        this.errors = err.body.errors;
                    })
            }
        },
         reInvestTotal() {
                this.$http.post(`${Laravel.appUrl}/user/post-reinvest-total`)
                    .then(function (response) {
                        this.sub = true;
                        window.location = `${Laravel.appUrl}/user/withdraw`

                      // window.location = `${Laravel.appUrl}/user/withdraw`
                    })
                    .catch((err) => {
                        this.errors = err.body.errors;
                    })
        
        },
         reInvestReferral() {
                this.$http.post(`${Laravel.appUrl}/user/post-reinvest-referral`)
                    .then(function (response) {
                        this.sub = true;
                        window.location = `${Laravel.appUrl}/user/withdraw`

                      // window.location = `${Laravel.appUrl}/user/withdraw`
                    })
                    .catch((err) => {
                        this.errors = err.body.errors;
                    })
        
        },
        
        uploadImage() {
            this.$http.post(`${Laravel.appUrl}/user/update-profile-picture` , {image: this.image}).then(function (response) {
                this.submit = true;
                this.image = '';
                this.display = true
            })
                .catch((err) => {
                    this.errors = err.body.errors
                });
        },
        onFileChange(e){
            const files = e.target.files || e.dataTransfer.files;
            if(!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            const image = new Image();
            const reader = new FileReader();
            const vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
       /* getLoginError(field){

            if (this.errors.hasOwnProperty(field) ){
                if ( typeof this.errors[field] === "object" ) return this.errors[field][0];

                if ( typeof this.errors[field] === "string" ) return this.errors[field];
            }

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



        getSignupError(field){

            if (this.errors.hasOwnProperty(field) ) {



                if (typeof this.errors[field] === "object") {

                    return this.errors[field][0];
                }

                if ( typeof this.errors[field] === "string" ) {

                    return this.errors[field]

                }



            }

        },
        getResetError(field){
            if (this.errors.hasOwnProperty(field) ){
                if ( typeof this.errors[field] === "object" ) return this.errors[field][0];

                if ( typeof this.errors[field] === "string" ) return this.errors[field];
            }

        },
        getResetSuccess(field){
            if (this.resetSuccess.hasOwnProperty(field) ){
                if ( typeof this.resetSuccess[field] === "object" ) return this.resetSuccess[field];

                if ( typeof this.resetSuccess[field] === "string" ) return this.resetSuccess[field];
            }
        },

        getError(field){

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
        withdrawAmt(){
            this.$http.get(withdraw_amt)
                .then(function (response) {
                    this.withdraw_amt = response.body;
                })
                .catch( (err) => {
                    console.log(err)
                })
        },

        withdrawReferralAmt(){
            this.$http.get(withdraw_referral_amt)
                .then(function (response) {
                    this.withdraw_ref_amt = response.body;
                })
                .catch( (err) => {
                    console.log(err)
                })
        },


// This is for the deposit form

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

        getColor: (num) => {
            return num > 0 ? "color:green;" : "color:red;";
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


    },
    mounted() {
        this.getCoinEth();
    }
});


setInterval(() => {
    this.getCoinsBtc();
}, UPDATE_INTERVAL);

setInterval(() => {
    this.getCoinEth();
}, UPDATE_INTERVAL);

