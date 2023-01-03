<template>
    <div id="summary-panel">
        <CRow>
          <CCol :xs="4"  v-for="(summary) in summaries" :key="summary.id">
            <CWidgetStatsF :color="getColor(summary.target, summary.value)" :padding="false" :id="summary.id" :title="summary.title" :value="summary.value">
              <template #icon>
                <CIcon :icon="getIcon(summary.id)" size="xl"/>
              </template>
            </CWidgetStatsF>
          </CCol>
        </CRow>
    </div>
</template>

<script>
import { CRow, CCol, CWidgetStatsF } from '@coreui/vue';
import { CIcon } from '@coreui/icons-vue';
import { cilAppsSettings } from '@coreui/icons';

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
      cilAppsSettings
    };
  },
  data() {
      return {
        FILE: null,
        importTypes: ['big-bad-budget', 'td-visa', 'scotia-debit', 'scotia-amex'],
        type: null,
        showFailureAlert: false,
        showSuccessAlert: false,
        summaries: [
          { 'id':'ATM withdrawal-summary', 'title': 'ATM Withdrawal', target: 1000, value: 1999.50},
          { 'id':'Bank fees-summary', 'title': 'Bank Fees', target: 1000, value: 1999.50},
          { 'id':'E-transfer-summary', 'title': 'E-transfer', target: 1000, value: 1999.50},
          { 'id':'income-summary', 'title': 'Income', target: 1000, value: 1999.50},
          { 'id':'insurance-summary', 'title': 'Insurance', target: 1000, value: 1999.50},
          { 'id':'internet-summary', 'title': 'Internet', target: 1000, value: 1000},
          { 'id':'investment-summary', 'title': 'Investment', target: 1000, value: 1999.50},
          { 'id':'Papa support-summary', 'title': 'Papa Support', target: 1000, value: 1999.50},
          { 'id':'phone-summary', 'title': 'Phone', target: 1000, value: 999.50},
          { 'id':'rent-summary', 'title': 'Rent', target: 1000, value: 1999.50},
        ]
    }
  },
  methods: {
    getColor: (target, value) => {
      if (value < target) {
        return 'info'
      } else if (value == target) {
        return 'warning';
      }

      return 'danger';
    },
    getIcon: (id) => {
      return cilAppsSettings;
    }
  },
}
</script>
