<template>
    <div class="card">
        <div class="card-header">
            Registros de <strong>Usuarios</strong></div>
        <div class="card-body">
            <form action="">

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Nombre</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" autocomplete="off" placeholder ="Nombre...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Email</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" autocomplete="off" placeholder ="Nombre...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Permisos</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" autocomplete="off" placeholder ="Nombre...">
                </div>
                <button class="btn btn-sm btn-primary" type="submit"  >
                    <i class="fa fa-save" ></i> Grabar</button>
            </div>
            </form>
        </div>
        <div class="card-footer">

            <a href="" class="btn btn-sm btn-danger" > <i class="fa fa-arrow-left" ></i> Regresar</a>

        </div>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


