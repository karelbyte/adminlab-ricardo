<template>
  <q-dialog v-model="showForm" persistent transition-show="scale" transition-hide="scale">
    <q-card  style="width: 700px; max-width: 80vw;">
      <q-card-section class="bg-blue">
        Entregar resultados
      </q-card-section>
      <q-separator/>
      <q-card-section>
        <p>Seguro que quiere entregrar los resulados del cliente: <b>{{item.client}}</b></p>
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
  name: 'FormConfirmDelivery',
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
      this.saldar = false
    }
  },
  methods: {
    changeStatusService () {
      this.saldar = true
      this.$axios.post(ApiUrl + '/services/set-status', { id: this.item.id }).then(res => {
        this.$noty.positive(res.data)
        this.saldar = false
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
