<template>
  <AuthenticatedLayout>
    <Head title="Home" />
      <div class="container">
        <div class="row d-flex justify-content-center display-3 text-success mt-5 pt-5">
          Home Page
        </div>
      </div>
  </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
  components:{
    AuthenticatedLayout,
    Head,
    Link,
  },
}
</script>

