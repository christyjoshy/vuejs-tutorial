<template>
    <div>
        <h2 class="text-center">Notes List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="note in notes" :key="note.id">
                <td>{{ note.id }}</td>
                <td>{{ note.title }}</td>
                <td>{{ note.body }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: note.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteNote(note.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notes: []
            }
        },
        created() {
            this.axios
                .get('/api/v1/notes/')
                .then(response => {
                    this.notes = response.data;
                });
        },
        methods: {
            deleteNote(id) {
                this.axios
                    .delete(`/api/v1/notes/${id}`)
                    .then(response => {
                        let i = this.notes.map(data => data.id).indexOf(id);
                        this.notes.splice(i, 1)
                    });
            }
        }
    }
</script>
