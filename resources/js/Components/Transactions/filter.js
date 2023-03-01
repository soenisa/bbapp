import { reactive } from 'vue';

export const filter = reactive({
    fromDate: null,
    toDate: null,
    transactions: [],
    setFromDate(value) {
        this.fromDate = value;
    },
    setToDate(value) {
        this.toDate = value;
    }
});