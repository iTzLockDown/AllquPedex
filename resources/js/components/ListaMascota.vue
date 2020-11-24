<template>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-user"></i> Registro de Emisoras

        </div>

        <div class="card-body">
            <div class="" align="left">
                <form action="">
                <div class="col-lg-4">
                     <input type="text" class="form-control" autocomplete="off" placeholder ="Nombre">
                </div>
                <div class="col-lg-3">

                </div>
               </form>

                <div class="text-right "><a  href="#" class="btn btn-sm btn-outline-info" ><i class="fa fa-plus"></i> Nuevo Emisora</a></div>
                <br>
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Emisora</th>
                        <th>R. Legal</th>
                        <th>R. Comercial</th>
                        <th>Telefono</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-sm btn-dark"><i class="fa fa-edit" title="Editar" ></i></a>
                            <a href="" onclick="return confirm('Esta seguro de eliminar la mascota')" class="btn btn-warning btn-sm" title="Eliminar"><i class="fa fa-ban" title="Eliminar"></i></a>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <a href="" class="btn btn-outline-success"> <i class="ico icon-docs"></i>Exportar excel</a>

            </div>
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


