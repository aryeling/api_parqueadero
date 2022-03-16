<template>
    <div class="row">
        <div class="col-12 mb-4">
            <router-link :to='{name:"crearVehiculo"}' class="btn btn-success">Nuevo</router-link>
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
                        <tr v-for="marca in marcas" :key="marca.id">
                            <td>{{ marca.id }}</td>
                            <td>{{ marca.descripcion }}</td>
                            <td>{{ marca.activo }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarMarca",params:{"id":marca.id}}' class="btn btn-info">Editar</router-link>
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
        name:"marca",
        data(){
            return {
                marcas:[]
            }
        },
        mounted(){
            this.mostrarMarcas()
        },
        methods: {
            async mostrarMarcas(){
                await this.axios.get('/api/marcas/all')
                .then(response =>{
                    this.marcas = response.data
                })
                .catch(error =>{
                    this.marcas = []
                })
            },
        }
    }
</script>
