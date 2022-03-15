<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>
        </div>
      </div>
    </div>

    <div v-if="listVehiculos.length > 0">
      <div v-for="vehiculo in listVehiculos" :key="vehiculo.id">
        <pre>{{ vehiculo }}</pre>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    this.getVehiculos();
    console.log("Component mounted.");
  },
  data: function () {
    return {
      listVehiculos: [],
    };
  },
  methods: {
    async getVehiculos() {
      try {
        const result = await axios.get("/api/vehiculos/all");
        console.log("result", result?.data);
        this.listVehiculos = result?.data;
      } catch (error) {
        console.error(`Err: ${error}`);
      }
    },
  },
};
</script>
