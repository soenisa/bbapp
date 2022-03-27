<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="#">Klapaucius</CHeaderBrand>
      <CHeaderToggler @click="visible = !visible" />
      <CCollapse class="header-collapse" :visible="visible">
        <CHeaderNav>
          <CNavItem>
            <!-- Does this need to be wrapped in a Link? -->
            <CNavLink :href="route('dashboard')" active>
              Dashboard
            </CNavLink>
          </CNavItem>
          <CNavItem>
            <CNavLink href="#">Link</CNavLink>
          </CNavItem>
          <CDropdown variant="nav-item">
            <CDropdownToggle>{{ $page.props.auth.user.name }}</CDropdownToggle>
            <CDropdownMenu>
              <CDropdownItem href="#">Action</CDropdownItem>
              <CDropdownItem href="#">Another action</CDropdownItem>
              <CDropdownItem>
                <Link :href="route('logout')" method="post" as="button">
                  Log Out
                </Link>
              </CDropdownItem>
            </CDropdownMenu>
          </CDropdown>
          <CNavItem>
            <CNavLink href="#" disabled>
              Disabled
            </CNavLink>
          </CNavItem>
        </CHeaderNav>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </CCollapse>
    </CContainer>
  </CHeader>
  </template>
  
<script>
import { CHeader, CContainer, CHeaderBrand, CHeaderToggler, CCollapse, CHeaderNav, CNavItem, CNavLink, CDropdown, CDropdownItem } from '@coreui/vue';
import { Link } from '@inertiajs/inertia-vue3';

  export default {
    name: 'AppHeader',
    components: {
      Link
    },
    data() {
      return { 
        visible: true,
      }
    }
  }
</script>