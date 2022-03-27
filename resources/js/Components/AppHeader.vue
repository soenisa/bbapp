<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="#">Header</CHeaderBrand>
      <CHeaderToggler @click="visible = !visible" />
      <CCollapse class="header-collapse" :visible="visible">
        <CHeaderNav>
          <CNavItem>
            <CNavLink href="#" active>
              Dashboard?
            </CNavLink>
          </CNavItem>
          <CNavItem>
            <CNavLink href="#">Link</CNavLink>
          </CNavItem>
          <CDropdown togglerText="Dropdown" variant="nav-item">
            <CDropdownItem href="#">Action</CDropdownItem>
            <CDropdownItem href="#">Another action</CDropdownItem>
            <CDropdownItem href="#">Something else here</CDropdownItem>
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

  export default {
    name: 'AppHeader',
    data() {
      return { 
        visible: true,
      }
    }
  }
</script>