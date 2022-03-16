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

            <pre>
                {{ arreglo }}
            </pre>

    </div>
  </div>
</template>

<script>
    export default {
        name:"vehiculos-marca",
        data(){
            return {
                items:[],
                arreglo:[]
            }
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
            arregloFunc(){
                // Your code here!
                const array =[
                ["2018-12-01","AM","ID123",5000],
                ["2018-12-01","AM","ID545",7000],
                ["2018-12-01","PM","ID545",3000],
                ["2018-12-02","AM","ID545",7000]
                ];

                let result="";

                for (var i = 0; i < 1; i++) {
                    result = array.reduceRight((hash, obj) => {
                    if(obj[0] === undefined) return hash;

                    const primer =  Object.assign(
                        hash, { [obj[i]]:( hash[obj[i]] || [] ).concat(obj)});

                    return this.arreglo = Object.assign({},primer);
                    }, {});

                    this.arreglo = result;
                    console.log(result);
                }
            }
        },
        mounted(){
            this.mostrarCantidadVehiculosMarca()
            this.arregloFunc();
        },
    }
</script>
