<template>
    <CFooter>
    <div>
        <CLink href="https://coreui.io">CoreUI</CLink>
        <span> &copy; 2021 creativeLabs.</span>
    </div>
    <div>
        <span>Powered by </span>
        <CLink href="https://laravel.com">Laravel</CLink>
        and
        <CLink href="https://coreui.io">CoreUI</CLink>
    </div>
    </CFooter>
</template>

<script>
import { CFooter } from '@coreui/vue';

export default {
  name: 'AppFooter',
  components: {
      CFooter
  }
}
</script>
