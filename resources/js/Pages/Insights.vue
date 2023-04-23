<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Savings } from "@/Components/Insights/Charts";
import { TransactionsFilter } from "@/Components/Transactions";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Insights</CCardHeader>
      <CCardBody>
        <TransactionsFilter />
        <Savings />
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>
