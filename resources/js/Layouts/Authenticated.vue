<script>
import { CContainer, CFooter } from '@coreui/vue';
import AppSidebar from '@/components/AppSidebar.vue';
import AppHeader from '@/components/AppHeader.vue';
import AppFooter from '@/components/AppFooter.vue';

export default {
  name: 'DefaultLayout',
  components: {
    AppSidebar,
    AppHeader,
    AppFooter,
    CContainer,
  },
}
</script>

<template>
  <div class="d-flex">
    <AppSidebar />
    <div class="wrapper d-flex flex-column flex-1 min-vh-100 bg-light">
      <AppHeader />
      <div class="body flex-grow-1 px-3">
        <CContainer lg>
          <main class="pt-8" >
            <!-- not sure if I need this: <router-view /> -->
            <slot />
          </main>
        </CContainer>
      </div>
      <AppFooter />
    </div>
  </div>
</template>
