<template>
    <div id="summary-panel">
        <CRow>
          <CCol :xs="4">
            <CWidgetStatsF color="primary" :padding="false" title="Title" value="$1.999,50">
              <template #icon>
                <CIcon :icon="cilAppsSettings" size="xl"/>
              </template>
            </CWidgetStatsF>
          </CCol>
          <CCol :xs="4">
            <CWidgetStatsF color="info" :padding="false" title="Title" value="$1.999,50">
              <template #icon>
                <CIcon :icon="cilAppsSettings" size="xl"/>
              </template>
            </CWidgetStatsF>
          </CCol>
          <CCol :xs="4">
            <CWidgetStatsF color="warning" :padding="false" title="Title" value="$1.999,50">
              <template #icon>
                <CIcon :icon="cilAppsSettings" size="xl"/>
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
        CIcon,
        cilAppsSettings
    },
  data() {
      return {
        FILE: null,
        importTypes: ['big-bad-budget', 'td-visa', 'scotia-debit', 'scotia-amex'],
        type: null,
        showFailureAlert: false,
        showSuccessAlert: false,
    }
  },
}
</script>
