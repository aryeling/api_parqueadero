<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Marca</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar()">
                        <fieldset class="mb-4">
                            <legend>Datos de la marca</legend>
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
    name:"editar-marca",
    data(){
        return {
                descripcion: "",
                activo: ""
        }
    },
    async mounted(){
        await this.mostrarMarca()
    },
    methods: {
        async mostrarMarca(){
            await this.axios.get(`/api/marcas/${this.$route.params.id}`)
            .then(response =>{
                const {descripcion, activo} = response.data.marca;
                this.descripcion = descripcion;
                this.activo = activo;
            })
            .catch(error =>{
                console.log(error)
            })
        },

        async actualizar(){
            await this.axios.put(`/api/marcas/update/${this.$route.params.id}`, {
                descripcion: this.descripcion,
                activo: this.activo
            })
            .then(response =>{
                this.$router.push({name:"mostrarMarcas"})
            })
            .catch(error =>{
                console.log(error)
            })
        },
    },


}
</script>
