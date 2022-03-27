<template>
  <CSidebar visible>
  <CSidebarBrand>
    <BreezeApplicationLogo class="block h-9 w-auto fill-white" />
    BBAPP
    <Link :href="route('dashboard')">
    </Link>
  </CSidebarBrand>
  <CSidebarNav>
    <li class="nav-title">Nav Title</li>
    <CNavItem href="#">
      <CIcon  customClassName="nav-icon" icon="cil-speedometer"/>
      Nav item
    </CNavItem>
    <CNavItem href="#">
        <CIcon  customClassName="nav-icon" icon="cil-speedometer"/>
        With badge
        <CBadge color="primary ms-auto">NEW</CBadge>
    </CNavItem>
    <CNavGroup>
      <template #togglerContent>
        <CIcon  customClassName="nav-icon" icon="cil-puzzle"/> Nav dropdown
      </template>
      <CNavItem href="#">
        <CIcon  customClassName="nav-icon" icon="cil-puzzle"/> Nav dropdown item
      </CNavItem>
      <CNavItem href="#">
         <CIcon  customClassName="nav-icon" icon="cil-puzzle"/> Nav dropdown item
      </CNavItem>
    </CNavGroup>
  </CSidebarNav>
  <CSidebarToggler/>
</CSidebar>
</template>

<script>
import { computed } from 'vue'
import { useStore } from 'vuex'
import { CSidebar, CSidebarBrand, CSidebarNav, CNavItem, CIcon, CBadge, CNavGroup, CSidebarToggler } from '@coreui/vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'AppSidebar',
  components: {
    BreezeApplicationLogo,
    Link,
    CIcon
  },
  setup() {
    const store = useStore()
    return {
      sidebarUnfoldable: computed(() => store.state.sidebarUnfoldable),
      sidebarVisible: computed(() => store.state.sidebarVisible),
    }
  },
}
</script>
