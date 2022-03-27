<template>
  <CSidebar visible>
  <CSidebarBrand>
    <Link class="flex items-center text-white no-underline" :href="route('dashboard')">
      <BreezeApplicationLogo class="block h-9 w-auto fill-white" :fillColor="'white'"/>
      <span class="pl-2">BBAPP</span>
    </Link>
  </CSidebarBrand>
  <CSidebarNav>
    <li class="nav-title">Nav Title</li>
    <CNavItem href="#">
      <CIcon class="sidebarIcon" :icon="cilSpeedometer"/>
      Nav item
    </CNavItem>
    <CNavItem href="#">
        <CIcon class="sidebarIcon" :icon="cilSpeedometer"/>
        With badge
        <CBadge color="primary ms-auto">NEW</CBadge>
    </CNavItem>
    <CNavGroup>
      <template #togglerContent>
        <CIcon class="sidebarIcon" :icon="cilPuzzle"/> Nav dropdown
      </template>
      <CNavItem href="#">
        <CIcon class="sidebarIcon" :icon="cilPuzzle"/> Nav dropdown item
      </CNavItem>
      <CNavItem href="#">
         <CIcon class="sidebarIcon" :icon="cilPuzzle"/> Nav dropdown item
      </CNavItem>
    </CNavGroup>
  </CSidebarNav>
  <CSidebarToggler/>
</CSidebar>
</template>

<style>
.sidebarIcon {
  margin-right: 5px;
}
</style>

<script>
// Uninstall these?
import { computed } from 'vue'
import { useStore } from 'vuex'
import { CSidebar, CSidebarBrand, CSidebarNav, CNavItem, CBadge, CNavGroup, CSidebarToggler } from '@coreui/vue';
import { CIcon } from '@coreui/icons-vue';
import { cilSpeedometer, cilPuzzle } from '@coreui/icons';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'AppSidebar',
  components: {
    BreezeApplicationLogo,
    Link,
    CBadge,
    CIcon
  },
  setup() {
    const store = useStore()
    return {
      sidebarUnfoldable: computed(() => store.state.sidebarUnfoldable), 
      sidebarVisible: computed(() => store.state.sidebarVisible),
      cilSpeedometer,
      cilPuzzle,
    }
  },
}
</script>
