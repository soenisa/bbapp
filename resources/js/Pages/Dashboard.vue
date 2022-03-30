<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import TransactionsTable from '@/Components/Transactions/TransactionsTable.vue';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <CCard>
            <CCardHeader component="h5">Transactions</CCardHeader>
            <CCardBody>
                <!-- <CCardTitle>Transactions</CCardTitle> -->
                <CCardText>
                    View your transactions
                </CCardText>
                <TransactionsTable />
                <CButton href="#">Go somewhere</CButton>
            </CCardBody>
        </CCard>
    </BreezeAuthenticatedLayout>
</template>
