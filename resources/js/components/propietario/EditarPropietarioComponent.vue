<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar propietario</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar()">
                        <fieldset class="mt-4">
                            <legend>Datos del propietario</legend>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Cedula</label>
                                        <input type="text" class="form-control" v-model="cedula" >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" v-model="nombre"  >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" v-model="apellido" >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-select" aria-label="Sexo" v-model="sexo" >
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
                                        <input type="date" class="form-control" v-model="fecha_nac"  >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" class="form-control" v-model="correo"  >
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" v-model="telefono"  >
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
    name:"editar-propietario",
    data(){
        return {
            cedula:"",
            nombre:"",
            apellido:"",
            sexo:"",
            fecha_nac:"",
            telefono:"",
            correo:""
        }
    },
    async mounted(){
        await this.mostrarPropietario()
    },
    methods: {
        async mostrarPropietario(){
            await this.axios.get(`/api/propietarios/${this.$route.params.id}`)
            .then(response =>{
                const {cedula, nombre, apellido, fecha_nac, sexo, telefono, correo} = response.data.propietario;
                this.cedula = cedula,
                this.nombre = nombre,
                this.apellido = apellido,
                this.fecha_nac = fecha_nac,
                this.sexo = sexo,
                this.telefono = telefono,
                this.correo = correo

            })
            .catch(error =>{
                console.log(error)
            })
        },

        async actualizar(){
            await this.axios.put(`/api/propietarios/update/${this.$route.params.id}`, {
                cedula: this.cedula,
                nombre: this.nombre,
                apellido: this.apellido,
                fecha_nac: this.fecha_nac,
                sexo: this.sexo,
                telefono: this.telefono,
                correo: this.correo
            })
            .then(response =>{
                this.$router.push({name:"mostrarPropietarios"})
            })
            .catch(error =>{
                console.log(error)
            })
        },
    },


}
</script>
