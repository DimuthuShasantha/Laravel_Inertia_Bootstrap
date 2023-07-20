<template>
  <AuthenticatedLayout>
        <Head title="Students" />
        <div class="container">
          <div class="row mt-4">
            <h3 class="text-success mb-5">Student Management</h3>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-end mb-3">
              <Link type="button" :href="route('student.create')" class="btn btn-success"><i class="bi bi-plus-circle mx-2"></i><em>Add New Student</em></Link>
            </div>
            <div class="card shadow-sm p-1">
              <div class="card-body">
                <table class="table table-success table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Profile</th>
                      <th scope="col">Name</th>
                      <th scope="col">Age</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(student, key) in student_list">
                      <td>{{ ++key }}</td>
                      <td>
                        <!-- <img :src="`${config.access_path}/${student.images.image}`" alt="profile"> -->
                      </td>
                      <td>{{ student.name }}</td>
                      <td>{{ student.age }}</td>
                      <td>
                        <span v-if="student.status==1" class="badge text-bg-success">Active</span>
                        <span v-else class="badge text-bg-warning">Inactive</span>
                      </td>
                      <td>
                        <span v-if="student.status==1">
                          <button @click.prevent="statusStudent(student.id)" class="btn btn-warning px-2 py-1 fw-lighter"><span><i class="bi bi-x-circle-fill"></i></span></button>
                        </span>
                        <span v-else>
                          <button @click.prevent="statusStudent(student.id)" class="btn btn-success px-2 py-1 fw-lighter"><span><i class="bi bi-check-circle-fill"></i></span></button>
                        </span>
                        <Link :href="route('student.edit', student.id)" class="btn btn-primary px-2 py-1 fw-lighter mx-2"><span><i class="bi bi-pencil"></i></span></Link>
                        <button @click.prevent="deleteStudent(student.id)" class="btn btn-danger px-2 py-1 fw-lighter"><span><i class="bi bi-trash"></i></span></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import axios from 'axios';



export default {
  components:{
    AuthenticatedLayout,
    Head,
    Link,
    axios
  },
  data() {
    return {
      student_list: [],
    }
  },
  beforeMount () {
    this.getStudents();
  },
  methods: {
    async getStudents() {
      const students = await axios.get(route('student.list'));
      this.student_list = students.data;
    },
    async deleteStudent (id) {
      await axios.delete(route('student.delete', id));
      this.getStudents();
    },
    async statusStudent (id) {
      await axios.get(route('student.status', id));
      this.getStudents();
    }
  },
}
</script>

<style lang="css">

</style>
