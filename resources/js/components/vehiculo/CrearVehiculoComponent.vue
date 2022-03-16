<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Vehiculo</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear()">
                        <fieldset class="mb-4">
                            <legend>Datos del vehiculo</legend>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Placa</label>
                                        <input type="text" class="form-control" v-model="placa" >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input type="text" class="form-control" v-model="color" >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <select class="form-select" aria-label="Marca" v-model="marca">
                                            <option selected>Seleccione</option>
                                            <option v-for="marca in marcas" :key="marca.id" :value="marca.id">{{marca.descripcion}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Tipo de vehiculo</label>
                                        <select class="form-select" aria-label="Tipo Vehiculos" v-model="tipo_vehiculo">
                                            <option selected>Seleccione</option>
                                            <option v-for="tipo_vehiculo in tipo_vehiculos" :key="tipo_vehiculo.id" :value="tipo_vehiculo.id">{{tipo_vehiculo.descripcion}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="mt-4">
                            <legend>Datos del propietario</legend>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Cedula</label>
                                        <input type="text" class="form-control" v-model="propietario.cedula" >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" v-model="propietario.nombre"  >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" v-model="propietario.apellido" >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-select" aria-label="Sexo" v-model="propietario.sexo" >
                                            <option selected>Seleccione</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" v-model="propietario.fecha_nac"  >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" class="form-control" v-model="propietario.correo"  >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" v-model="propietario.telefono"  >
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"crear-vehiculo",
    data(){
        return {
                placa: "",
                color: "",
                tipo_vehiculo: "",
                marca:"",
                propietario:{
                    cedula:"",
                    nombre:"",
                    apellido:"",
                    sexo:"",
                    fecha_nac:"",
                    telefono:"",
                    correo:""
                },


            marcas:[],
            tipo_vehiculos:[],

        }
    },
    mounted(){
        this.mostrarVehiculos(),
        this.mostrarMarcas(),
        this.mostrarTipoVehiculos()
    },
    methods: {
        async mostrarVehiculos(){
            await this.axios.get('/api/vehiculos/all')
            .then(response =>{
                this.vehiculos = response.data,
                this.marcas = response.data
            })
            .catch(error =>{
                this.vehiculos = []
            })
        },

        async mostrarMarcas(){
            await this.axios.get('/api/marca/activo')
            .then(response =>{
                this.marcas = response.data
            })
            .catch(error =>{
                this.marcas = []
            })
        },

        async mostrarTipoVehiculos(){
            await this.axios.get('/api/tipo_vehiculo/activo')
            .then(response =>{
                this.tipo_vehiculos = response.data
            })
            .catch(error =>{
                this.tipo_vehiculos = []
            })
        },

        async crear(){
            await this.axios.post('/api/vehiculos/new', {
                placa: this.placa,
                color: this.color,
                tipo_vehiculo: this.tipo_vehiculo,
                marca: this.marca,
                propietario: this.propietario
            })
            .then(response =>{
                this.$router.push({name:"mostrarVehiculos"})
            })
            .catch(error =>{
                console.log(error)
            })
        }
    }


}
</script>

