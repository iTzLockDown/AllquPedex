<template>
    <div class="card">
        <div class="card-header">
            Registros de <strong>Usuarios</strong></div>
        <div class="card-body card-accent-success">
            <form action="" v-on:submit.prevent="nuevoCliente()">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nombre</label>
                    <div class="col-md-3">

                        <input type="text" class="form-control"  autocomplete="off" placeholder ="Nombre..." v-model="nombre" required minlength="4" maxlength="20">

                    </div>
                    <label class="col-md-2 col-form-label text-right">Apellidos</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" autocomplete="off" placeholder ="Apellidos..." v-model="apellidos" required minlength="4" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Documento Identidad</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" autocomplete="off" placeholder ="Documento Identidad..." v-model="dni" required minlength="8" maxlength="8">
                    </div>
                    <label class="col-md-2 col-form-label text-right">Telefeno</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" autocomplete="off" placeholder ="Telefono/celular..." v-model="telefono" required minlength="9" maxlength="9">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-3">
                        <input type="email" class="form-control" autocomplete="off" placeholder ="Nombre..." v-model="email" required >
                    </div>
                    <label class="col-md-2 col-form-label text-right">Dirección</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" autocomplete="off" placeholder ="Dirección..." v-model="direccion" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Permisos</label>
                    <div class="col-md-3">

                        <select class="form-control" v-model="permiso" required>
                            <option v-bind:value="3">Usuario</option>
                            <option v-bind:value="2">Usuario Administrador</option>
                            <option v-bind:value="1">Administrador</option>

                        </select>

                    </div>

                </div>
                <div class="form-group row">

                    <div class="col-md-3">
                        <button class="btn btn-success"> <i class="fa fa-user-plus"></i> Grabar Usuario </button>
                    </div>

                </div>

            </form>

    </div>

    </div>

</template>

<script>
    export default {
        data(){

          return {
              id:'',
              nombre:'',
              apellidos:'',
              dni:'',
              telefono:'',
              email:'',
              direccion:'',
              permiso:'',
              estado:false,
          }
        },

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
                nuevoCliente(){
                    let cliente={
                        id: 3,
                        nombre: this.nombre,
                        dni: this.dni,
                        telefono: this.telefono,
                        email: this.email,
                        direccion: this.direccion,
                        permiso: this.permiso,

                    }
                    this.$emit('nuevoCliente',cliente);

                },

        }
    }
</script>


