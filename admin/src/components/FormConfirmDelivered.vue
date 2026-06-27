<template>
  <q-dialog v-model="showForm" persistent transition-show="scale" transition-hide="scale">
    <q-card  style="width: 700px; max-width: 80vw;">
      <q-card-section class="bg-blue">
        Entregar documentos
      </q-card-section>
      <q-separator/>
      <q-card-section>
        <p>Entregrar los resulados del cliente <b>{{item.client}}</b> en documento</p>
        <q-card-section v-if="saldar" class="text-center">
          <q-spinner color="primary" size="3em" />
        </q-card-section>
      </q-card-section>
      <q-separator/>
      <q-card-actions align="right">
        <q-btn dense label="Aplicar" color="negative"  @click="changeStatusService"/>
        <q-btn dense flat label="Cerrar" @click="close" v-close-popup  />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import { ApiUrl } from '../boot/tools'

export default {
  name: 'FormConfirmDelivered',
  props: ['show', 'item'],
  data () {
    return {
      showForm: false,
      saldar: false
    }
  },
  watch: {
    show: function () {
      this.showForm = this.show
    }
  },
  methods: {
    changeStatusService () {
      this.saldar = true
      this.$axios.get(ApiUrl + '/services/setdelivered/' + this.item.id).then(res => {
        this.saldar = false
        this.$noty.positive(res.data)
        this.$emit('close')
        this.$emit('update')
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
