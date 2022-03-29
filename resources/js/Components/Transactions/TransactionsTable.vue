<template>
    <div>
        <CCardText class="fw-bold">
            Total spent: ${{ total }}
        </CCardText>
        <CTable striped>
            <CTableHead>
                <CTableRow>
                <CTableHeaderCell scope="col">#</CTableHeaderCell>
                <CTableHeaderCell scope="col">Name</CTableHeaderCell>
                <CTableHeaderCell scope="col">Amount</CTableHeaderCell>
                <CTableHeaderCell scope="col">Category</CTableHeaderCell>
                <CTableHeaderCell scope="col">Created At</CTableHeaderCell>
                </CTableRow>
            </CTableHead>
            <CTableBody>
                <CTableRow v-for="transaction in transactions" :key="transaction.id">
                    <CTableHeaderCell scope="row">{{ transaction.id }}</CTableHeaderCell>
                    <CTableDataCell>{{ transaction.name }}</CTableDataCell>
                    <CTableDataCell class="fw-bold font-monospace" v-bind:class="amountClass(transaction.amount)">{{ formatAmount(transaction.amount ?? 0) }}</CTableDataCell>
                    <CTableDataCell>{{ transaction.category }}</CTableDataCell>
                    <CTableDataCell>{{ formatDate(transaction.created_at) }}</CTableDataCell>
                </CTableRow>
            </CTableBody>
        </CTable>
    </div>
</template>

<style>
.prewrapped {
    white-space: pre-wrap;
}
</style>

<script>
import { CTable, CTableBody, CTableRow, CTableDataCell, CTableHeaderCell, CTableHead,  } from '@coreui/vue';
import moment from 'moment';

export default {
    name: "TransactionsTable",
    components: {
        CTable
    },
    mounted: function() {
        this.getAllTransactions();
    },
    data: function () {
        return {
            transactions: [],
            total: 0
        };
    },
    methods: {
        formatDate: (date) => { 
            return moment(date).format('ddd, D MMM yyyy')
        },
        getAllTransactions: function() {
            console.log('calling transactions..');
            axios.get(route('transactions.index'))
                .then(response => {
                    this.transactions = response.data.data;
                    this.total = this.transactions.reduce( function(a, b){
                        return a + parseFloat(b.amount);
                    }, 0);
                    this.total = this.total.toFixed(2);
                });
        },
        formatAmount: function(amount) {
            return `${amount < 0 ? '-' : ' '}$${Math.abs(amount).toFixed(2)}`;
        },
        amountClass: function(amount) {
            return {
                'text-success prewrapped ': amount > 0,
                'text-danger': amount < 0
            };
        }
    }
}
</script>
