<template>
  <q-dialog v-model="showForm" persistent transition-show="scale" transition-hide="scale">
    <q-card  style="width: 700px; max-width: 80vw;">
      <q-card-section class="bg-blue">
        Dar como impreso
      </q-card-section>
      <q-separator/>
      <q-card-section>
       <p>El servicio con codigo:  <b>{{item.barcode}}</b> se guardara como impreso</p>
      </q-card-section>
      <q-separator/>
      <q-card-actions align="right">
        <q-btn dense label="Aplicar" color="negative"  @click="changePrintedService"/>
        <q-btn dense flat label="Cerrar" @click="close" v-close-popup  />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import { ApiUrl } from '../boot/tools'

export default {
  name: 'FormChangeServicePrinted',
  props: ['show', 'item'],
  data () {
    return {
      showForm: false
    }
  },
  watch: {
    show: function () {
      this.showForm = this.show
    }
  },
  methods: {
    changePrintedService () {
      this.$axios.get(ApiUrl + '/services/setprinted/' + this.item.id).then(res => {
        this.$noty.positive(res.data)
        this.$emit('close')
      })
    },
    close () {
      this.$emit('close')
    }
  }
}
</script>

<style scoped>

</style>
