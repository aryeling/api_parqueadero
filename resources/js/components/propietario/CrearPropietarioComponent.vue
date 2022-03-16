<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear propietario</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear()">
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
            cedula:"",
            nombre:"",
            apellido:"",
            sexo:"",
            fecha_nac:"",
            telefono:"",
            correo:""
        }
    },

    methods: {

        async crear(){
            await this.axios.post('/api/propietarios/new', {
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
        }
    }


}
</script>

