<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { TransactionsTable, TransactionsFilter, SummaryPanel } from "@/Components/Transactions";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Transactions</CCardHeader>
      <CCardBody>
        <CCardTitle>Transactions</CCardTitle>
        <SummaryPanel />
        <TransactionsFilter />
        <TransactionsTable />
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>
