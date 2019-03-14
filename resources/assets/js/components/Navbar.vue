<!--
<template>
    <div>
        <span class="call-text">Price: {{ coin }}</span>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                coin: [],
                coinData: {},
                coinet: [],
                coinData1: {}
            }

        },


        created () {
            this.getCoinData();
            this.getCoinData1();
        },

        methods: {

            getCoinData: function() {

                this.$http.get(CRYPTOCOMPARE_API_URI + "/data/all/coinlist")
                    .then((resp) => {
                        this.coinData = resp.data.Data;
                        this.getCoins();
                    })
                    .catch((err) => {
                        this.getCoins();
                        console.error(err);
                    });
            },

            /**
             * Get the top 10 cryptocurrencies by value.  This data is refreshed each 5
             * minutes by the backing API service.
             */
            getCoins: function() {
                this.$http.get(COINMARKETCAP_API_URI + "/v1/ticker/bitcoin/")
                    .then((resp) => {
                        this.coin = resp.body;
                    })
                    .catch((err) => {
                        console.error(err);
                    });
            },

            /**
             * Given a cryptocurrency ticket symbol, return the currency's logo
             * image.
             */
            getCoinImage: function(symbol) {

                // These two symbols don't match up across API services. I'm manually
                // replacing these here so I can find the correct image for the currency.
                //
                // In the future, it would be nice to find a more generic way of searching
                // for currency images
                symbol = (symbol === "MIOTA" ? "IOT" : symbol);
                symbol = (symbol === "VERI" ? "VRM" : symbol);

                return CRYPTOCOMPARE_URI + this.coinData[symbol].ImageUrl;
            },

            getCoinImage1: function(symbol) {

                // These two symbols don't match up across API services. I'm manually
                // replacing these here so I can find the correct image for the currency.
                //
                // In the future, it would be nice to find a more generic way of searching
                // for currency images
                symbol = (symbol === "MIOTA" ? "IOT" : symbol);
                symbol = (symbol === "VERI" ? "VRM" : symbol);

                return CRYPTOCOMPARE_URI + this.coinData1[symbol].ImageUrl;
            },


            /**
             * Return a CSS color (either red or green) depending on whether or
             * not the value passed in is negative or positive.
             */
            getColor: (num) => {
                return num > 0 ? "color:green;" : "color:red;";
            },



            getCoinData1: function() {

                this.$http.get(CRYPTOCOMPARE_API_URI + "/data/all/coinlist")
                    .then((resp) => {
                        this.coinData1 = resp.data.Data;
                        this.getCoins1();
                    })
                    .catch((err) => {
                        this.getCoins1();
                        console.error(err);
                    });
            },

            /**
             * Get the top 10 cryptocurrencies by value.  This data is refreshed each 5
             * minutes by the backing API service.
             */
            getCoins1: function() {
                this.$http.get(COINMARKETCAP_API_URI + "/v1/ticker/ethereum/")
                    .then((resp) => {
                        this.coinet = resp.body;
                    })
                    .catch((err) => {
                        console.error(err);
                    });
            },

        }
    }
    /*  setInterval(() => {
          app.getCoins();
      }, UPDATE_INTERVAL)*/;
</script>-->
