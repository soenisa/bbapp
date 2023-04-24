<template>
    <div class="flex justify-between">
        <CCardText class="fw-bold align-self-end">
            Total spent: {{ formatAmount(total) }}
        </CCardText>
        <div>
            <CForm @submit.prevent="getTransactions">
                <div class="flex flex-row justify-end gap-x-10">
                    <div>
                        <CFormLabel>Category</CFormLabel>
                        <CFormSelect class="align-self-end" aria-label="Default select example" :options="categories"
                            v-model="category">
                        </CFormSelect>
                    </div>
                    <div>
                        <CFormLabel for="filterStartDate">Start Date</CFormLabel>
                        <CFormInput type="date" id="filterStartDate" aria-describedby="filterStartDate"
                            v-model="fromDate" />
                    </div>
                    <div>
                        <CFormLabel for="filterEndDate">End Date</CFormLabel>
                        <CFormInput type="date" id="filterEndDate" aria-describedby="filterEndDate" v-model="toDate" />
                    </div>
                    <CButton class="align-self-end" type="submit" color="primary" style="height: 38px;">Submit</CButton>
                </div>
            </CForm>
        </div>
    </div>
</template>

<script>
import { filter } from "./filter.js"
import formatHelper from "@/Helpers/formatHelper.js";

// TODO: allow user to pass in what type of data they want in return
// add an endpoint to get transactions formatted as a series readable by apex charts?

export default {
    name: "TransactionsFilter",
    mixins: [formatHelper],
    components: {
    },
    data: function () {
        return {
            categories: [],
            total: 0,
            fromDate: null,
            toDate: null,
            category: null,
            filter,
        };
    },
    mounted: function () {
        this.getCategories();
        this.getTransactions();
    },
    methods: {
        getTransactions: function () {
            filter.fromDate = this.fromDate;
            filter.toDate = this.toDate;
            axios.get(route('transactions.index'), {
                params: {
                    fromDate: filter.fromDate,
                    toDate: filter.toDate,
                    category: this.category == 'All' ? null : this.category
                }
            })
                .then(response => {
                    filter.transactions = response.data.data;
                    this.total = filter.transactions.reduce(function (a, b) {
                        return a + parseFloat(b.amount);
                    }, 0);
                    this.total = this.total.toFixed(2);
                });
        },
        getCategories: function () {
            axios.get(route('categories.index'))
                .then(response => {
                    this.categories = [{ label: 'All', value: null }].concat(response.data);
                });
        }
    }
}
</script>