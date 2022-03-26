<script>
import { CContainer, CSidebar, CHeader, CFooter } from '@coreui/vue'

export default {
  name: 'DefaultLayout',
  components: {
    CFooter,
    CHeader,
    CSidebar,
    CContainer,
  },
}
</script>

<template>
  <div>
    <CSidebar />
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
