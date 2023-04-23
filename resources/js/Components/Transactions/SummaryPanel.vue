<template>
    <div id="summary-panel">
        <CRow>
          <CCol :xs="4"  v-for="(summary) in summaries" :key="summary.id">
            <CWidgetStatsF :color="getColor(summary.status)" :padding="false" :id="summary.id" :title="summary.title" :value="formatAmount(summary.value ?? 0)">
              <template #icon>
                <CIcon :icon="getIcon(summary.status)" size="xl"/>
              </template>
            </CWidgetStatsF>
          </CCol>
        </CRow>
        <CButton class="align-self-end" @click="getSummaries" color="primary" style="height: 38px;">Refresh</CButton>
    </div>
</template>

<script>
import { CRow, CCol, CWidgetStatsF } from '@coreui/vue';
import { CIcon } from '@coreui/icons-vue';
import { cilMoodGood, cilMoodVeryGood, cilMoodBad } from '@coreui/icons';
import { filter } from './filter.js'

export default {
  name: "SummaryPanel",
  components: {
      CRow,
      CCol,
      CWidgetStatsF,
      CIcon
  },
  setup() {
    return {
      cilMoodGood,
      cilMoodVeryGood,
      cilMoodBad
    };
  },
  mounted() {
    this.getSummaries();
  },
  data() {
      return {
        filter,
        FILE: null,
        importTypes: ['big-bad-budget', 'td-visa', 'scotia-debit', 'scotia-amex'],
        type: null,
        showFailureAlert: false,
        showSuccessAlert: false,
        summaries: [
          { id:'ATM withdrawal-summary', title: 'ATM Withdrawal', status: 'low', value: 1999.50},
          { id:'Bank fees-summary', title: 'Bank Fees', status: 'low', value: 1999.50},
          { id:'E-transfer-summary', title: 'E-transfer', status: 'high', value: 1999.50},
          { id:'income-summary', title: 'Income', status: 'low', value: 1999.50},
          { id:'insurance-summary', title: 'Insurance', status: 'low', value: 1999.50},
          { id:'internet-summary', title: 'Internet', status: 'mid', value: 1000},
          { id:'investment-summary', title: 'Investment', status: 'low', value: 1999.50},
          { id:'Papa support-summary', title: 'Papa Support', status: 'low', value: 1999.50},
          { id:'phone-summary', title: 'Phone', status: 'mid', value: 999.50},
          { id:'rent-summary', title: 'Rent', status: 'high', value: 1999.50},
        ]
    }
  },
  methods: {
    getColor: (status) => {
      if (status == 'low') {
        return 'info'
      } else if (status == 'mid') {
        return 'warning';
      }

      return 'danger';
    },
    getIcon: (status) => {
      if (status == 'low') {
        return cilMoodVeryGood;
      } else if (status == 'mid') {
        return cilMoodGood;
      }

      return cilMoodBad;
    },
    formatAmount: function(amount) {
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });
        return `${amount < 0 ? '-' : ' '}${formatter.format(Math.abs(amount))}`;
    },
    getSummaries: function() {
        axios.get(route('summaries.index'), {
                params: {
                    fromDate: filter.fromDate,
                    toDate: filter.toDate
                }
              })
            .then(response => {
              this.summaries = response.data;
            });
    },
  },
}
</script>
