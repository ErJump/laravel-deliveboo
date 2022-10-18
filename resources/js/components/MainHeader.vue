<template>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark ms_bg_primary py-2">
         <div class="container-fluid">
            <router-link to="/" class="navbar-brand">
               <img src="../../../public/assets/images/logo-white.png" alt="logo" class="d-none d-lg-block">
               <img src="../../../public/assets/images/logo-small.png" alt="logo" class="d-lg-none">
            </router-link>
            <div class="d-flex justify-content-between">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <router-link to="/" class="nav-link">Home</router-link>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/admin">Area Personale</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>
</template>

<script>
export default {

}
</script>

<style>

</style>