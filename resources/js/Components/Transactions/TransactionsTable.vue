<template>
    <div>
        <CCardText>
            Total spent: {{ total }}
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
                    <CTableDataCell v-bind:class="amountClass">{{ formatAmount(transaction.amount ?? 0) }}</CTableDataCell>
                    <CTableDataCell>{{ transaction.category }}</CTableDataCell>
                    <CTableDataCell>{{ transaction.created_at }}</CTableDataCell>
                </CTableRow>
            </CTableBody>
        </CTable>
    </div>
</template>

<style scoped>
.positive {
    color: success
}
</style>

<script>
import { CTable, CTableBody, CTableRow, CTableDataCell, CTableHeaderCell, CTableHead,  } from '@coreui/vue';

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
    computed: {
        amountClass: function(amount) {
            return {
                positive: amount > 0,
                negative: amount < 0
            };
        }
    },
    methods: {
        getAllTransactions: function() {
            console.log('calling transactions..');
            axios.get(route('transactions.index'))
                .then(response => {
                    this.transactions = response.data.data;
                    this.total = this.transactions.reduce( function(a, b){
                        return a + parseFloat(b.amount);
                    }, 0);
                });
        },
        formatAmount: function(amount) {
            return `${amount < 0 ? '-' : ''}$${Math.abs(amount)}`;
        }
    }
}
</script>
