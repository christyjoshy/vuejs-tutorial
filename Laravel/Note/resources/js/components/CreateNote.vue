<template>
    <div>
        <h3 class="text-center">Create Note</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addNote">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="note.title">
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea cols="30" rows="5" class="form-control" v-model="note.body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Create</button>
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
        methods: {
            addNote() {
                this.axios
                    .post('/api/v1/notes', this.note)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = true)
            }
        }
    }
</script>
