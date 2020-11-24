<template>
    <div class="alert alert-success alert-dismissible" role = "alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <label class="text-center"> Mensaje</label>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
