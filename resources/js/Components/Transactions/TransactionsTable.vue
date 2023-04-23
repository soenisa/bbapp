<template>
<div>
    <SummaryPanel />
    <TransactionsFilter />
    <CTable striped>
        <CTableHead>
            <CTableRow>
            <CTableHeaderCell scope="col">#</CTableHeaderCell>
            <CTableHeaderCell scope="col">Name</CTableHeaderCell>
            <CTableHeaderCell scope="col">Amount</CTableHeaderCell>
            <CTableHeaderCell scope="col">Category</CTableHeaderCell>
            <CTableHeaderCell scope="col">Account</CTableHeaderCell>
            <CTableHeaderCell scope="col">Created At</CTableHeaderCell>
            </CTableRow>
        </CTableHead>
        <CTableBody>
            <CTableRow v-for="(transaction, index) in filter.transactions" :key="transaction.id">
                <CTableHeaderCell scope="row">{{ index + 1 }}</CTableHeaderCell>
                <CTableDataCell>{{ transaction.name }}</CTableDataCell>
                <CTableDataCell class="fw-bold font-monospace" v-bind:class="amountClass(transaction.amount)">{{ formatAmount(transaction.amount ?? 0) }}</CTableDataCell>
                <CTableDataCell>{{ transaction.category }}</CTableDataCell>
                <CTableDataCell>{{ transaction.account ?? '—' }}</CTableDataCell>
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
import SummaryPanel from  "./SummaryPanel";
import TransactionsFilter from  "./TransactionsFilter";
import { CTable, CTableBody, CTableRow, CTableDataCell, CTableHeaderCell, CTableHead,  } from '@coreui/vue';
import { filter } from "./filter.js";
import formatHelper from "@/Helpers/formatHelper.js";

export default {
    name: "TransactionsTable",
    mixins: [formatHelper],
    components: {
        CTable, 
        SummaryPanel,
        TransactionsFilter,
    },
    data: function () {
        return {
            filter,
        };
    },
    methods: {
        amountClass: function(amount) {
            return {
                'text-success prewrapped ': amount > 0,
                'text-danger': amount < 0
            };
        },
    }
}
</script>
