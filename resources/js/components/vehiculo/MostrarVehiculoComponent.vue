<template>
    <div class="row">
        <div class="col-8 mb-4">
            <router-link :to='{name:"crearVehiculo"}' class="btn btn-success">Nuevo</router-link>
        </div>
        <div class="col-4 mb-4">
            <form class="d-flex">
                <div class="input-group">
                    <input
                    class="form-control"
                    type="search"
                    placeholder="Buscar por placa de vehículo, nombre o cédula del propietario"
                    aria-label="Search"
                    aria-describedby="basic-addon1"
                    v-model="search"
                    @keyup="buscarItem"
                    >
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </form>
        </div>
         <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Color</th>
                            <th>Tipo de Vehiculo</th>
                            <th>Cedula</th>
                            <th>Propietario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="vehiculo in vehiculos" :key="vehiculo.id">
                            <td>{{ vehiculo.id }}</td>
                            <td>{{ vehiculo.placa }}</td>
                            <td>{{ vehiculo.marca }}</td>
                            <td>{{ vehiculo.color }}</td>
                            <td>{{ vehiculo.tipo_vehiculo }}</td>
                            <td>{{ vehiculo.cedula }}</td>
                            <td>{{ vehiculo.nombre }} {{ vehiculo.apellido }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarVehiculo",params:{"id":vehiculo.id}}' class="btn btn-info">Editar</router-link>
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
        name:"vehiculos",
        data(){
            return {
                vehiculos:[],
                search:"",
                setTimeOutBuscador:""
            }
        },
        mounted(){
            this.mostrarVehiculos()
        },
        methods: {
            async mostrarVehiculos(){
                await this.axios.get('/api/vehiculos/all')
                .then(response =>{
                    this.vehiculos = response.data
                })
                .catch(error =>{
                    this.vehiculos = []
                })
            },
             async buscar(){
                await this.axios.get('/api/vehiculo/buscar',{
                    params: {
                        search: this.search
                    }
                })
                .then(response =>{
                    this.vehiculos = response.data
                })
                .catch(error =>{
                    this.vehiculos = []
                })
            },

            buscarItem(){
                clearTimeout(this.setTimeOutBuscador);
                this.setTimeOutBuscador = setTimeout(this.buscar, 360);

            },
        }
    }
</script>
