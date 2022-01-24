<template>
    <div>
        <h3 class="text-center">Edit Note</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="updateNote">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="note.title">
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea cols="30" rows="5" class="form-control" v-model="note.body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                note: {}
            }
        },
        created() {
            this.axios
                .get(`/api/v1/notes/${this.$route.params.id}`)
                .then((res) => {
                    this.note = res.data;
                });
        },
        methods: {
            updateNote() {
                this.axios
                    .put(`/api/v1/notes/${this.$route.params.id}`, this.note)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>
