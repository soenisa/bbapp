import moment from 'moment';

var formatHelper = {
    methods: {
        formatDate: (date) => {
            return moment(date).format('ddd, D MMM yyyy')
        },
        formatAmount: function (amount) {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            });
            return `${amount < 0 ? '-' : ' '}${formatter.format(Math.abs(amount))}`;
        }
    }
};

export default formatHelper;