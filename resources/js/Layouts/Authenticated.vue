<script>
import { CContainer, CHeader, CFooter } from '@coreui/vue';
import AppSidebar from '@/components/AppSidebar.vue';

export default {
  name: 'DefaultLayout',
  components: {
    AppSidebar,
    CFooter,
    CHeader,
    CContainer,
  },
}
</script>

<template>
  <div class="d-flex">
    <AppSidebar />
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <CHeader />
      <div class="body flex-grow-1 px-3">
        <CContainer lg>
          <main>
            <!-- not sure if I need this: <router-view /> -->
            <slot />
          </main>
        </CContainer>
      </div>
      <CFooter />
    </div>
  </div>
</template>
