<template>
<div>
    <mensaje-component v-if="estadoMensaje"></mensaje-component>
    <cliente-form v-if="estadoFlag"  @nuevoCliente="agregarCliente"></cliente-form>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-user"></i> Registro de Clientes

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
                <div class="text-right ">
                    <button  class="btn btn-sm btn-outline-info" v-if="!estadoFlag" v-on:click="abrirFormulario()"><i class="fa fa-user-plus"></i> Nuevo Cliente</button>
                    <button  class="btn btn-sm btn-outline-danger" v-if="estadoFlag" v-on:click="cerrarFormulario()"><i class="fa fa-window-close"></i> Cerrar Formulario</button>
                </div>
                <br>
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Usuario</th>
                        <th>Telefono</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <lista-cliente
                            v-for="(cliente, index)  in clientes"
                            :key="cliente.id"
                            :cliente="cliente"
                            @delete="deleteCliente(index)">
                        </lista-cliente>
                    </tbody>
                </table>
                <a href="" class="btn btn-outline-success"> <i class="ico icon-docs"></i>Exportar excel</a>

            </div>
        </div>

    </div>
</div>
</template>

<script>
    export default {
        data()
        {
            return {
                estadoFlag: false,
                estadoMensaje: false,
                clientes:[]
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:
            {
                abrirFormulario(){
                    this.estadoFlag = true;
                },
                cerrarFormulario(){
                    this.estadoFlag=false;
                },
                mostrarMensaje()
                {
                    this.estadoMensaje = true;
                },
                agregarCliente(cliente)
                {
                    this.clientes.push(cliente);
                    this.cerrarFormulario();
                    this.mostrarMensaje();
                    setTimeout(() => this.estadoMensaje = false, 2000);
                },
                deleteCliente(index){
                    alert(index)
                },

            },
    }
</script>

