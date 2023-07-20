<template>
  <AuthenticatedLayout>
    <Head title="New Student" />
    <div class="container">
      <div class="row mt-4">
        <h3 class="text-success mb-5">Add New Student</h3>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <form @submit.prevent="storeStudent" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-10">
                <label for="name" class="mb-2">Student Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Student Name" v-model="student_form.name">
              </div>
              <div class="col-md-10 my-5">
                <label for="name" class="mb-2">Student Age</label>
                <input type="number" name="age" class="form-control" placeholder="Enter Student Age" v-model="student_form.age">
              </div>
              <div class="col-md-10">
                <label for="name" class="mb-2">Student Image</label>
                <input type="file" name="image" accept="image/*" class="form-control" @input="student_form.image = $event.target.files[0]">
              </div>
            </div>
            <div class="col-md-10 mt-4 d-flex justify-content-end">
              <Link type="button" :href="route('student')" class="btn btn-warning mx-2">Cancel</Link>
              <input type="submit" accept="image/*" class="btn btn-success" value="Save">
            </div>
          </form>
        </div>
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
  data () {
    return {
      student_form: {
        name: '',
        age:'',
        image: '',
      },
    }
  },
  methods: {
    async storeStudent() {
      const formData = new FormData();
      formData.append('name', this.student_form.name);
      formData.append('age', this.student_form.age);
      formData.append('image', this.student_form.image);

      await axios.post(route('student.store'), formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });
      this.student_form = {
        name: '',
        age: '',
        image: '',
      };
    }
  }
}
</script>

<style lang="css">
/* @import '/resources/css/app.css'; */
</style>
