<template>
  <div>
    <div class="row">
      <div class="col-3 mb-2">
        <div class="form-group">
          <label>descripcion</label>
          <input type="text" class="form-control" v-model="info.descripcion" />
        </div>
      </div>
      <div class="col-3 mb-2">
        <div class="form-group">
          <label>Activo</label>
          <select class="form-select" aria-label="activo" v-model="info.activo">
            <option selected>Seleccione</option>
            <option value="true">true</option>
            <option value="false">false</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data: function () {
    return {
      info: {
        descripcion: this.$props.descripcion,
        activo: this.$props.activo,
      },
    };
  },
  props: {
    descripcion: {
      type: String,
      required: true,
    },
    activo: {
      type: Boolean,
      require: true,
    },
  },
  methods: {
      enviarDataAlPadre(){
          this.$emit("getDataHijo", "holaaaaa")
      }
  },
};
</script>
