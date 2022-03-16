<template>
    <div class="row">
        <div class="col-12 mb-4">
            <router-link :to='{name:"crearTipoVehiculo"}' class="btn btn-success">Nuevo</router-link>
        </div>
         <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="tipo_vehiculo in tipo_vehiculos" :key="tipo_vehiculo.id">
                            <td>{{ tipo_vehiculo.id }}</td>
                            <td>{{ tipo_vehiculo.descripcion }}</td>
                            <td v-if="tipo_vehiculo.activo == 0" class="text-danger">Inactivo</td>
                            <td v-else class="text-success">Activo</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarTipoVehiculo",params:{"id":tipo_vehiculo.id}}' class="btn btn-info">Editar</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"tipo-vehiculo",
        data(){
            return {
                tipo_vehiculos:[]
            }
        },
        mounted(){
            this.mostrarTipoVehiculos()
        },
        methods: {
            async mostrarTipoVehiculos(){
                await this.axios.get('/api/tipo_vehiculos/all')
                .then(response =>{
                    this.tipo_vehiculos = response.data
                })
                .catch(error =>{
                    this.tipo_vehiculos = []
                })
            },
        }
    }
</script>
