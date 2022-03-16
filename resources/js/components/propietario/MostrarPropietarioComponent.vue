<template>
    <div class="row">
        <div class="col-8 mb-4">
            <router-link :to='{name:"crearPropietario"}' class="btn btn-success">Nuevo</router-link>
        </div>

         <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Cedula</th>
                            <th>Propietario</th>
                            <th>Sexo</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="propietario in propietarios" :key="propietario.id">
                            <td>{{ propietario.id }}</td>
                            <td>{{ propietario.cedula }}</td>
                            <td>{{ propietario.nombre }} {{ propietario.apellido }}</td>
                            <td>{{ propietario.sexo }}</td>
                            <td>{{ propietario.fecha_nac }}</td>
                            <td>{{ propietario.correo }}</td>
                            <td>{{ propietario.telefono }}</td>

                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarPropietario",params:{"id":propietario.id}}' class="btn btn-info">Editar</router-link>
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
        name:"propietarios",
        data(){
            return {
                propietarios:[],
            }
        },
        mounted(){
            this.mostrarPropietarios()
        },
        methods: {
            async mostrarPropietarios(){
                await this.axios.get('/api/propietarios/all')
                .then(response =>{
                    this.propietarios = response.data
                })
                .catch(error =>{
                    this.propietarios = []
                })
            },

        }
    }
</script>
