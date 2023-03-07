<template>
<div>
    <SummaryPanel />
    <div class="flex justify-between">
        <CCardText class="fw-bold align-self-end">
            Total spent: {{ formatAmount(total) }}
        </CCardText>
        <div>
            <CForm @submit.prevent="getTransactions">
                <div class="flex flex-row justify-end gap-x-10">
                    <div>
                        <CFormLabel>Category</CFormLabel>
                        <CFormSelect
                        class="align-self-end"
                        aria-label="Default select example"
                        :options="categories"
                        v-model="category">
                        </CFormSelect>
                    </div>
                    <div>
                        <CFormLabel for="filterStartDate">Start Date</CFormLabel>
                        <CFormInput type="date" id="filterStartDate" aria-describedby="filterStartDate" v-model="fromDate"/>
                    </div>
                    <div>
                        <CFormLabel for="filterEndDate">End Date</CFormLabel>
                        <CFormInput type="date" id="filterEndDate" aria-describedby="filterEndDate" v-model="toDate"/>
                    </div>
                    <CButton class="align-self-end" type="submit" color="primary" style="height: 38px;">Submit</CButton>
                </div>
            </CForm>
        </div>
    </div>
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
import { CTable, CTableBody, CTableRow, CTableDataCell, CTableHeaderCell, CTableHead,  } from '@coreui/vue';
import moment from 'moment';
import {filter} from "./filter.js"

export default {
    name: "TransactionsTable",
    components: {
        CTable, 
        SummaryPanel
    },
    mounted: function() {
        this.getCategories();
        this.getTransactions();
    },
    data: function () {
        return {
            categories: [],
            total: 0,
            fromDate: null,
            toDate: null,
            category: null,
            filter
        };
    },
    methods: {
        formatDate: (date) => { 
            return moment(date).format('ddd, D MMM yyyy')
        },
        getTransactions: function() {
            filter.fromDate = this.fromDate;
            filter.toDate = this.toDate;
            // filter.setFromDate(this.fromDate);
            // filter.setToDate(this.toDate);
            
            axios.get(route('transactions.index'), {
                        params: {
                            fromDate: filter.fromDate,
                            toDate: filter.toDate,
                            category: this.category == 'All' ? null  : this.category
                        }
                })
                .then(response => {
                    filter.transactions = response.data.data;
                    this.total = filter.transactions.reduce( function(a, b){
                        return a + parseFloat(b.amount);
                    }, 0);
                    this.total = this.total.toFixed(2);
                });
        },
        getCategories: function() {
            axios.get(route('categories.index'))
                .then(response => {
                    this.categories = [{ label: 'All', value: null}].concat(response.data);
                });
        },
        formatAmount: function(amount) {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            });
            return `${amount < 0 ? '-' : ' '}${formatter.format(Math.abs(amount))}`;
        },
        amountClass: function(amount) {
            return {
                'text-success prewrapped ': amount > 0,
                'text-danger': amount < 0
            };
        },
    }
}
</script>
