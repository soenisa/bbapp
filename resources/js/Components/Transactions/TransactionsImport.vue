<template>
  <div>
    <CForm @submit.prevent="onSubmit">
      <div class="mb-3">
        <CFormLabel for="transaction_data">Import transactions</CFormLabel>
        <CFormInput type="file" id="transaction_data" @change="onFileUpload" />
      </div>
      <div>
        <CAlert color="danger" dismissible v-if="showFailureAlert">
          <strong>Import failed</strong> Check the logs?
        </CAlert>
        <CAlert color="success" dismissible v-if="showSuccessAlert">
          <strong>Import complete</strong>
        </CAlert>
      </div>
      <CButton type="submit" color="primary"> Submit </CButton>
    </CForm>
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
      axios
        .post(route("transactions.import"), formData)
        .then((res) => {
          //Perform Success Action
          this.showFailureAlert = true;
          this.showSuccessAlert = false;
        })
        .catch((error) => {
          // error.response.status Check status code
          this.showFailureAlert = false;
          this.showSuccessAlert = true;
        })
        .finally(() => {
          //Perform action in always
        });
    },
  },
};
</script>