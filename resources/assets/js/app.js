/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');


let CRYPTOCOMPARE_API_URI = "https://min-api.cryptocompare.com";
let CRYPTOCOMPARE_URI = "https://www.cryptocompare.com";

let COINMARKETCAP_API_URI = "https://api.coinmarketcap.com";
// The amount of milliseconds (ms) after which we should update our currency
// charts
let UPDATE_INTERVAL = 60 * 1000;

Vue.component('Home', require('./components/Home.vue'));








const app = new Vue({
    el: '#app',
    data : {

        coinsBtc: {},
        coinetEth: {},
        coiniiBtcEth: [],
      
    },


    created () {
        this.getCoins3BtcEth();
    },


        methods: {
            // this is for the price index on navbar si

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

            getCoins3BtcEth: function() {
                let npp = this
                $.ajax({
                    url: 'https://api.coinmarketcap.com/v1/ticker/?limit=10',
                    method: 'GET'
                }).then(function (response) {
                    if (response.error) {
                        console.err("There was an error " + response.error);
                    } else {

                        console.log(response);
                        npp.coiniiBtcEth = response
                    }
                }).catch(function (err) {
                    console.error(err);
                });

            },
            /**
             * Return a CSS color (either red or green) depending on whether or
             * not the value passed in is negative or positive.
             */
            getColor3BtcEth: (num) => {
                return num > 0 ? "color:green;" : "color:red;";
            },
        },
    mounted(){
        this.getCoinsBtc();

    }





});



setInterval(() => {
    this.getCoinsBtc();
}, UPDATE_INTERVAL);
/*setInterval(() => {
    this.getCoins1Eth();
}, UPDATE_INTERVAL);*/
setInterval(() => {
    this.getCoins3BtcEth();
}, UPDATE_INTERVAL);
