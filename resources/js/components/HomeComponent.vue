<template>
    <div class="row justify-content-md-center">
         <div class="col-6 mb-4">
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr class="text-center">
                            <th>Marca</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items" :key="item.descripcion">
                            <td>{{ item.descripcion }}</td>
                            <td class="text-end">{{ item.cantidad }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"vehiculos-marca",
        data(){
            return {
                items:[]
            }
        },
        mounted(){
            this.mostrarCantidadVehiculosMarca()
        },
        methods: {
            async mostrarCantidadVehiculosMarca(){
                await this.axios.get('/api/vehiculo/cant_marca')
                .then(response =>{
                    this.items = response.data
                })
                .catch(error =>{
                    console.log(error);
                    this.items = []
                })
            },
        }
    }
</script>
