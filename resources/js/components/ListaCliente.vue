<template>
    <tr>
        <td>{{cliente.id}}</td>
        <td> {{cliente.nombre}}, {{cliente.apellidos}}</td>
        <td>{{cliente.telefono}}</td>
        <td>{{cliente.permiso}}</td>
        <td>

            <button class="btn btn-sm btn-dark"><i class="fa fa-edit" title="Editar" ></i></button>
            <button class="btn btn-warning btn-sm" v-on:click="onClickDelete()"><i class="fa fa-ban" title="Eliminar"></i></button>

        </td>
    </tr>
</template>

<script>
    export default {
        props:['cliente'],
        data()
        {
          return {
              estadoFlag: false,

          };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            onClickDelete()
            {
                this.$emit('delete')
            }
        }

    }
</script>


                                                                                   
