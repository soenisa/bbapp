<template>
  <Head title="Insights" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Insights</CCardHeader>
      <CCardBody>
        <TransactionsTable />
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { TransactionsTable } from "@/Components/Transactions";


</script>
