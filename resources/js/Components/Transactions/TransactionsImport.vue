<template>
  <div>
    <CForm @submit.prevent="onSubmit" class="flex flex-row gap-3">
      <div class="mb-3">
        <CFormLabel for="transaction_data">Import transactions</CFormLabel>
        <CFormInput type="file" id="transaction_data" @change="onFileUpload" />
      </div>
      <div>
          <CFormLabel>Import Type</CFormLabel>
          <CFormSelect
          :options="importTypes"
          v-model="type">
          </CFormSelect>
      </div>
      <CButton type="submit" color="primary"  class="align-self-end mb-3" style="height: 38px;"> Submit </CButton>
    </CForm>
    <div>
      <CAlert color="danger" dismissible v-if="showFailureAlert">
        <strong>Import failed</strong> Check the logs?
      </CAlert>
      <CAlert color="success" dismissible v-if="showSuccessAlert">
        <strong>Import complete</strong>
      </CAlert>
    </div>
  </div>
</template>

<script>
import { CForm, CFormLabel, CFormInput, CButton } from "@coreui/vue";

export default {
  name: "TransactionsImport",
  components: {},
  data() {
      return {
        FILE: null,
        importTypes: ['big-bad-budget', 'td-visa', 'scotia-debit', 'scotia-amex'],
        type: null,
        showFailureAlert: false,
        showSuccessAlert: false,
    }
  },
  methods: {
    onFileUpload(event) {
      this.FILE = event.target.files[0];
    },
    onSubmit() {
      const formData = new FormData();
      formData.append("transaction_data", this.FILE, this.FILE.name);
      formData.append("type", this.type);
      axios
        .post(route("transactions.import"), formData)
        .then((res) => {
          //Perform Success Action
          this.showFailureAlert = false;
          this.showSuccessAlert = true;
        })
        .catch((error) => {
          // error.response.status Check status code
          this.showFailureAlert = true;
          this.showSuccessAlert = false;
        })
        .finally(() => {
          //Perform action in always
        });
    },
  },
};
</script>