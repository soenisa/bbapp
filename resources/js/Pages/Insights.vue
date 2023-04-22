<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Savings from "@/Components/Insights/Charts/Savings.vue";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <CCard>
      <CCardHeader component="h5">Insights</CCardHeader>
      <CCardBody>
        <!-- <CCardTitle>Transactions</CCardTitle> -->
        <Savings />
      </CCardBody>
    </CCard>
  </BreezeAuthenticatedLayout>
</template>
