
<template>
  <div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <span style="text-align:center; color:#0071bb; font-weight:800;" class="brand-link">
        AGENDA
      </span>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="/home" class="nav-link active">
                <i class="fa fa-solid fa-address-book"></i>  
                <p>
                   <strong>Agenda</strong>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul style="cursor:pointer;" class="nav nav-treeview">
                <li class="nav-item">
                  <router-link tag="li" active-class="active" to="/home" class="nav-link" exact>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contatos</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link  tag="li" active-class="active" to="newCont" class="nav-link" exact>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Novo Contato</p>
                  </router-link>
                </li>
                
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>
  
</template>

<script>

export default {
  name: "app-header",
};
</script>

<style lang="scss" src="./style.scss" scoped>
</style>
