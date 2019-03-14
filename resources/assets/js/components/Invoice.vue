<template>
    <div>
        <header-up></header-up>
        <left-nav></left-nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1783.5px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   My Invoices
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/dashboard`"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/invoice`">Invoices</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box box-secondary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Transactions</h3>
                        <p class="mg-b-0">Total Transaction:  &nbsp; {{ transactions.length}} </p>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin no-border table-hover">
                                <thead>
                                <tr class="bg-dark">
                                    <th class="text-yellow">Payment To</th>
                                    <th class="text-yellow">Amount($)</th>
                                    <th class="text-yellow">Amount(BTC)</th>
                                    <th class="text-yellow">Amount(ETH)</th>
                                    <th class="text-yellow">Rate(%)</th>
                                    <th class="text-yellow">ROI($)</th>
                                    <th class="text-yellow">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="trans in transactions">
                                    <td>
                                        {{ trans.payment_mode}}
                                    </td>
                                    <td>{{ trans.amount}}</td>
                                    <td>
                                        {{ trans.amount_btc}}   </td>
                                    <td>{{ trans.amount_eth}}</td>
                                    <td>{{ trans.rate}}</td>
                                    <td>{{ trans.returns}}</td>
                                    <td v-if="trans.status == 'PENDING'"><span class="label label-danger">{{ trans.status }}</span></td>
                                    <td v-else="trans.status == 'ACTIVATED'"><span class="label label-success">{{ trans.status }}</span></td>
                                </tr>
                                <span v-if="transactions && transactions.length === 0">
                                    <center class="text-center">No transaction Yet.</center>
                                    </span>
                                </tbody>
                            </table>
                            <!-- bottom pagination -->
                            <div class="card-block uk-animation-slide-top-medium">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="paginationn float-right">
                                            <button class="btn btn-default btn-sm" @click="myTransactions(pagination.prev_page_url)"
                                                    :disabled="!pagination.prev_page_url">
                                                Previous
                                            </button> &nbsp;
                                            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp;
                                            <button class="btn btn-default btn-sm" @click="myTransactions(pagination.next_page_url)"
                                                    :disabled="!pagination.next_page_url">Next
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pagination -->
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
        <footer-up></footer-up>
    </div>
</template>



<script>
    import leftNav from '../components/leftNav.vue'
    import Header from '../components/Header.vue'
    import Footer from '../components/Footer.vue'
    import {transactions} from '../utilities/settings'
    import {getUser} from '../utilities/settings'
    export default {
        data () {
            return {
                transactions: [],
                authUser: {},
                pagination: {}
            }

        },
        components: {
            'left-nav': leftNav,
            'header-up': Header,
            'footer-up' : Footer
        },

        created () {
            this.myTransactions()
            this.getUser();
        },


        methods: {
            getUser() {
                this.$http.get(getUser).then(function (response) {
                    this.authUser = response.body;
                })
                    .catch( (err) => {
                        console.log(err)
                    });
            },
            myTransactions(page_url) {

                page_url = page_url || transactions
                this.$http.get(page_url).then((response) => {
                    this.makePagination(response.data)
                    this.transactions = response.data.data;
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
        }
    }
</script>