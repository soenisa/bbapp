export const filter = ref({
    fromDate: null,
    toDate: null,
    setFromDate(value) {
        this.fromDate = value;
    },
    setToDate(value) {
        this.toDate = value;
    }
});