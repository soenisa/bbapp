<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { TransactionsTable } from "@/Components/Transactions";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Transactions</CCardHeader>
      <CCardBody>
        <!-- <CCardTitle>Transactions</CCardTitle> -->
        <TransactionsTable />
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>
