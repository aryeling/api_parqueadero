<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Tipo de Vehículo</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear()">
                        <fieldset class="mb-4">
                            <legend>Datos de la tipo de vehiculo</legend>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <input type="text" class="form-control" v-model="descripcion" >
                                    </div>
                                </div>

                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select" aria-label="Tipo Vehiculos" v-model="activo">
                                            <option selected>Seleccione</option>
                                            <option value="0">Inactivo</option>
                                            <option value="1">Activo</option>
                                        </select>
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
    name:"crear-tipo-vehiculo",
    data(){
        return {
                descripcion: "",
                activo: ""
        }
    },
    methods: {
        async crear(){
            await this.axios.post('/api/tipo_vehiculos/new', {
                descripcion: this.descripcion,
                activo: this.activo,
            })
            .then(response =>{
                this.$router.push({name:"mostrarTipoVehiculos"})
            })
            .catch(error =>{
                console.log(error)
            })
        }
    }


}
</script>

