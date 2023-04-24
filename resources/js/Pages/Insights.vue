<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { InsightChart } from "@/Components/Insights/Charts";
import { TransactionsFilter } from "@/Components/Transactions";

let savingsOptions = {
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100]
    }
  }
};
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Insights</CCardHeader>
      <CCardBody>
        <TransactionsFilter />
        <InsightChart name="Savings" insight-type="savings" :chart-options='savingsOptions'/>
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>
