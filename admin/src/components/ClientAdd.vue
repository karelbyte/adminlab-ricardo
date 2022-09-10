<template>
  <q-dialog v-model="show" persistent transition-show="scale" transition-hide="scale">
    <q-card  style="width: 700px; max-width: 80vw;">
      <q-card-section>
        Añadir cliente
      </q-card-section>
      <q-separator/>
      <q-card-section>
        <q-input ref="name" dense outlined autofocus v-model="item.names" label="Nombres" class="q-mb-xs text-uppercase"/>
        <span>Fecha de nacimiento</span>
        <q-input dense outlined type="date" v-model="item.birthday" class="q-mb-sm"/>
        <q-input dense outlined v-model="item.email" label="Correos separados por ," class="q-mb-xs"/>
        <q-input v-only-int-numbers dense outlined v-model="item.telf" label="Telefono" class="q-mb-xs"/>
        <q-input dense outlined type="textarea" v-model="item.note" label="Observaciones" />
      </q-card-section>
      <q-separator/>
      <q-card-actions align="right">
        <q-btn v-if="validateSave" dense label="Guardar" color="positive"  @click="saveItem"/>
        <q-btn dense flat label="Cerrar"  @click="close" />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import { ApiUrl } from '../boot/tools'

export default {
  name: 'ClientAdd',
  props: [
    'showFormClient',
    'act',
    'name'
  ],
  computed: {
    validateSave () {
      return this.item.names !== '' && this.item.birthday
    }
  },
  data () {
    return {
      show: false,
      item: {
        id: 0,
        names: '',
        birthday: '',
        note: '',
        email: '',
        telf: ''
      },
      itemClear: {
        id: 0,
        names: '',
        birthday: '',
        note: '',
        email: '',
        telf: ''
      }
    }
  },
  watch: {
    'showFormClient': function () {
      this.show = this.showFormClient
    },
    name () {
      this.item.names = this.name
    }
  },
  methods: {
    mounted () {
      this.item.names = this.name
    },
    close () {
      this.item = { ...this.itemClear }
      this.$emit('close')
    },
    saveItem () {
      this.item.names = this.item.names.toUpperCase()
      this.$axios({
        method: 'post',
        url: ApiUrl + '/clients/' + this.act,
        data: this.item
      }).then(() => {
        this.item = { ...this.itemClear }
        this.$emit('update')
      })
    }
  }
}
</script>

<style scoped>

</style>
