<template>
  <q-page class=" q-pa-md">
    <div class="gt-xs row flex">
      <q-breadcrumbs class="text-grey">
        <q-breadcrumbs-el label="Doctores" />
        <q-breadcrumbs-el label="Listado" />
      </q-breadcrumbs>
    </div>
    <div class="row">
      <div class="col-lg-8 col-xs-12"><q-btn color="primary" label="Nuevo" @click="newItem"/></div>
      <div class="col-lg-4 col-xs-12 flex flex-inline">
        <q-input dense autofocus v-model="filter.val" label="filtro..." style="width: 49%"/>
        <q-select dense v-model="filter.field" :options="filerOptions" label="filtro por..."
                  style="width: 50%"
        >
          <template v-slot:option="scope">
            <q-item
              v-bind="scope.itemProps"
              v-on="scope.itemEvents"
            ><q-item-section>
              <q-item-label caption>{{ scope.opt.label }}</q-item-label>
            </q-item-section>
            </q-item>
          </template>
        </q-select>
      </div>
    </div>
    <div class="row flex">
      <div class="col-lg-12 col-xs-12 q-mt-xs">
        <q-card>
          <q-separator/>
          <q-card-section class="section-fix">
            <q-table
              flat
              :data="datas"
              :columns="columns"
              row-key="id"
              :loading="loading"
              :pagination.sync="pagination"
              :no-data-label="dataLabel"
              @request="getList"
              binary-state-sort
            >
              <template v-slot:body-cell-age="props">
                <q-td :props="props">
                  <span>{{getAge(props.row.birthday)}}</span><br>
                </q-td>
              </template>
              <template v-slot:body-cell-actions="props">
                <q-td :props="props">
                  <q-btn dense color="secondary"  class="q-mr-xs" icon="fa fa-edit" @click="editItem(props.row)"/>
                  <q-btn dense color="negative"  class="q-mr-xs" icon="fa fa-eraser" @click="eraserShow(props.row)"/>
                  <q-btn dense color="warning" icon="fa fa-file-alt" @click="openInfo(props.row)" />
                </q-td>
              </template>
            </q-table>
          </q-card-section>
        </q-card>
      </div>
    </div>
    <!-- COMP ELIMINAR -->
    <delete-item
      :showFormDelete="showFormDelete"
      :item="item"
      title="Eliminar doctor"
      url="/doctors/eraser"
      targets="names"
      @updateList="updateOfEraser"
    />
    <!-- FORMA DE AÑADIR / EDITAR -->
    <q-dialog v-model="showForm" persistent transition-show="scale" transition-hide="scale">
      <q-card  style="width: 700px; max-width: 80vw;">
        <q-card-section>
          {{titleForm}}
        </q-card-section>
        <q-separator/>
        <q-card-section>
          <q-input ref="name" dense outlined autofocus v-model="item.names" label="Nombres" class="q-mb-xs text-uppercase"/>
          <q-input dense outlined v-model="item.email" label="Correo" class="q-mb-xs"/>
          <q-input v-only-int-numbers dense outlined v-model="item.telf" label="Telefono"/>
        </q-card-section>
        <q-separator/>
        <q-card-actions align="right">
          <q-btn v-if="validateSave" dense label="Guardar" color="positive"  @click="saveItem"/>
          <q-btn dense flat label="Cerrar" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import { ApiUrl } from '../boot/tools'
import DeleteItem from '../components/DeleteItem'
export default {
  name: 'doctors',
  components: {
    DeleteItem
  },
  data () {
    return {
      pagination: {
        sortBy: 'names',
        descending: true,
        page: 1,
        rowsPerPage: 10,
        rowsNumber: 0
      },
      datas: [],
      columns: [
        {
          name: 'names',
          required: true,
          label: 'NOMBRES',
          align: 'left',
          field: 'names',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'email',
          required: true,
          label: 'CORREO',
          align: 'left',
          field: 'email',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'telf',
          required: true,
          label: 'TELEFONO',
          align: 'left',
          field: 'telf',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'clients',
          required: true,
          label: 'CLIENTES',
          align: 'center',
          field: 'clients',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        { name: 'actions', label: 'ACCIONES', field: '', align: 'center', headerClasses: 'bg-primary text-white' }
      ],
      act: 'post',
      dataLabel: 'Cargando datos...',
      showForm: false,
      showFormDelete: false,
      titleForm: '',
      filter: {
        field: {
          value: 'names',
          label: 'Nombres',
          type: 'text'
        },
        val: ''
      },
      filerOptions: [
        {
          value: 'names',
          label: 'Nombres',
          type: 'text'
        },
        {
          value: 'address',
          label: 'Direccion',
          type: 'text'
        }
      ],
      loading: false,
      item: {
        id: 0,
        names: '',
        email: '',
        telf: ''
      },
      itemClear: {
        id: 0,
        names: '',
        email: '',
        telf: ''
      }
    }
  },
  watch: {
    'filter.field.value': function () {
      this.getList({
        pagination: this.pagination
      })
    },
    'filter.val': function () {
      this.getList({
        pagination: this.pagination
      })
    }
  },
  computed: {
    validateSave () {
      return this.item.names !== ''
    }
  },
  mounted () {
    this.getList(
      {
        pagination: this.pagination
      }
    )
  },
  methods: {
    openInfo (item) {
      let url = ApiUrl + '/doctors/info/' + item.id
      window.open(url, '_blank')
    },
    getList (props) {
      let toServer = {
        pagination: props.pagination,
        filter: this.filter
      }
      this.dataLabel = 'Cargando datos...'
      this.loading = true
      this.$axios.post(ApiUrl + '/doctors/list', toServer).then(res => {
        this.datas = res.data.list
        this.dataLabel = this.datas.length >= 0 ? '' : 'No hay datos que mostrar...'
        this.pagination = props.pagination
        this.pagination.rowsNumber = res.data.total
        this.loading = false
      })
    },
    newItem () {
      this.act = 'post'
      this.titleForm = 'Añadir doctor.'
      this.item = { ...this.itemClear }
      this.showForm = true
    },
    editItem (itm) {
      this.act = 'update'
      this.titleForm = 'Editar datos del doctor.'
      this.item = { ...itm }
      this.showForm = true
    },
    saveItem () {
      this.item.names = this.item.names.toUpperCase()
      this.$axios({
        method: 'post',
        url: ApiUrl + '/doctors/' + this.act,
        data: this.item
      }).then(res => {
        this.$noty.positive(res.data)
        this.item = { ...this.itemClear }
        this.$refs.name.focus()
        this.getList({
          pagination: this.pagination
        })
      })
    },
    eraserShow (itm) {
      this.item = { ...itm }
      this.showFormDelete = true
    },
    updateOfEraser () {
      this.showFormDelete = false
      this.getList({
        pagination: this.pagination
      })
    }
  }
}
</script>

<style scoped>

  .filter-input > div {
    width: 60px;
  }
  .section-fix {
    padding: 0 !important;
  }

</style>
