<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { TransactionsImport } from "@/Components/Transactions";
</script>

<template>
  <Head title="Importer" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Importer</CCardHeader>
      <CCardBody>
        <TransactionsImport />
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>
