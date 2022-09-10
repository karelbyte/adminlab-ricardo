<template>
  <q-page class="q-pa-md">
    <div class="gt-xs row flex q-mb-md">
      <q-breadcrumbs class="text-grey">
        <q-breadcrumbs-el label="Cotizaciones" />
        <q-breadcrumbs-el label="Listado" />
        <q-breadcrumbs-el v-if="views.news" label="Nueva" />
      </q-breadcrumbs>
    </div>
    <!-- LISTADO DE COTIZACIONES -->
    <div v-if="views.list">
      <div class="row">
        <div class="col-lg-8 col-xs-12">
          <q-btn color="primary" class="q-mr-sm" label="Nueva" @click="newItem" />
        </div>
        <div class="col-lg-4 col-xs-12 flex flex-inline">
          <q-input
            dense
            autofocus
            :type="filter.field.type"
            v-model="filter.val"
            debounce="300"
            stack-label
            label="filtro..."
            style="width: 49%"
          />
          <q-select
            dense
            v-model="filter.field"
            :options="filerOptions"
            label="filtro por..."
            style="width: 50%"
          >
            <template v-slot:option="scope">
              <q-item v-bind="scope.itemProps" v-on="scope.itemEvents"
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
            <q-separator />
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
                <template v-slot:body-cell-balance="props">
                  <q-td :props="props">
                   {{props.value}}
                  </q-td>
                </template>
                <template v-slot:body-cell-actions="props">
                  <q-td :props="props">
                    <q-btn color="primary" flat icon="fa fa-ellipsis-h">
                      <q-menu
                        transition-show="flip-right"
                        transition-hide="flip-left"
                        :offset="[-50, 0]"
                      >
                        <q-list style="min-width: 100px">
                          <q-item
                            clickable
                            v-close-popup
                            @click="openQuote(props.row)"
                          >
                            <q-item-section avatar>
                              <q-icon color="secondary" name="fa fa-print" />
                            </q-item-section>
                            <q-item-section>Imprimir</q-item-section>
                          </q-item>
                          <q-item
                            clickable
                            v-close-popup
                            @click="eraserShow(props.row)"
                          >
                            <q-item-section avatar>
                              <q-icon color="negative" name="fa fa-eraser" />
                            </q-item-section>
                            <q-item-section>Eliminar</q-item-section>
                          </q-item>
                        </q-list>
                      </q-menu>
                    </q-btn>
                  </q-td>
                </template>
              </q-table>
            </q-card-section>
          </q-card>
        </div>
      </div>
    </div>
    <!-- CREAR COTIZACION -->
    <div v-if="views.news">
      <q-card style="width: 100%">
        <q-card-section> {{ titleForm }} </q-card-section><q-separator />
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 q-pa-sm">
            <q-input
              dense
              outlined
              type="date"
              v-model="item.moment"
              class="q-mb-sm"
            />
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 q-pa-sm">
            <q-input
              dense
              outlined
              v-model="item.client_name"
              class="q-mb-sm"
              label="Prospecto"
            />
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 q-pa-sm">
            <q-btn
              label="Analisis"
              style="background-color: brown; color: wheat"
              @click="newItemDetail"
            />
          </div>
        </div>
        <q-card-section class="section-fix">
          <q-table
            flat
            square
            :data="item.analysis"
            :columns="productsColumns"
            row-key="id"
            :loading="loading"
            :no-data-label="dataLabel"
            @request="getList"
          >
            <template v-slot:body-cell-actions="props">
              <q-td :props="props">
                <q-btn
                  dense
                  color="secondary"
                  class="q-mr-xs"
                  icon="fa fa-edit"
                  @click="editItemDetail(props.row)"
                />
                <q-btn
                  dense
                  color="negative"
                  icon="fa fa-eraser"
                  @click="eraserShowItemDetail(props.row)"
                />
              </q-td>
            </template>
            <template v-slot:bottom-row>
              <q-tr>
                <q-td class="text-right"> Subtotal </q-td>
                <q-td class="text-left">
                  <span>{{ getSubTotal }}</span>
                </q-td>
                <q-td class="text-right">
                  <span style="font-size: 18px">Total</span>
                </q-td>
                <q-td class="text-left">
                  <b
                    ><span style="font-size: 18px" class="text-black">{{
                      getTotal
                    }}</span></b
                  >
                </q-td>
              </q-tr>
            </template>
          </q-table>
        </q-card-section>
        <q-separator />
        <q-separator />
        <q-card-section>
          <q-btn
            v-if="IsSaveWard()"
            dense
            label="Guardar cotizacion"
            class="q-mr-xs"
            color="positive"
            @click="saveItem()"
          />
          <q-btn dense flat label="Cerrar" v-close-popup @click="close()" />
        </q-card-section>
      </q-card>
    </div>
    <!-- FORMA DE AÑADIR DETALLE Al SERVICIO / EDITAR -->
    <q-dialog
      v-model="showFormDetail"
      persistent
      transition-show="scale"
      transition-hide="scale"
    >
      <q-card style="width: 700px; max-width: 80vw">
        <q-card-section> Añadir analisis </q-card-section>
        <q-separator />
        <q-card-section>
          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <q-select
                v-model="analysis_aux"
                use-input
                fill-input
                hide-selected
                :disable="isItemDetailEdit"
                input-debounce="0"
                dense
                outlined
                :options="analysisSearch"
                option-label="description"
                option-value="id"
                map-options
                @filter="filterFn"
                class="q-mb-sm"
                autofocus
                @input="setItemDet"
              >
                <template v-slot:option="scope">
                  <q-item v-bind="scope.itemProps" v-on="scope.itemEvents">
                    <q-item-section>
                      <q-item-label caption>{{
                        scope.opt.description
                      }}</q-item-label>
                    </q-item-section>
                  </q-item>
                </template>
                <template v-slot:no-option>
                  <q-item>
                    <q-item-section class="text-grey">
                      Sin resultados!
                    </q-item-section>
                  </q-item>
                </template>
              </q-select>
            </div>
          </div>
          <q-separator class="q-my-md" />
          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <q-input
                dense
                outlined
                v-model="itemDetail.description"
                label="Descripción de analisis"
                class="q-mb-md"
              />
            </div>
            <div class="col-lg-12 col-xs-12">
              <q-input
                dense
                outlined
                v-model="itemDetail.price"
                label="Precio"
                class="q-mb-md"
              />
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn
            v-if="IsSaveDetail()"
            dense
            label="Guardar"
            color="positive"
            @click="addItemDetail()"
          />
          <q-btn dense flat label="Cerrar" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
    <!--  ELIMINAR DETALLE DEL SERVICIO -->
    <q-dialog
      v-model="showFormDeleteItem"
      persistent
      transition-show="scale"
      transition-hide="scale"
    >
      <q-card style="width: 700px; max-width: 80vw">
        <q-card-section class="bg-red-5"> Eliminar detalle </q-card-section>
        <q-separator />
        <q-card-section>
          <p>
            Seguro que desea eliminar:
            <b> {{ this.itemDetail.description }}</b> ?
          </p>
          <p>Esta operación es irrevercible!</p>
        </q-card-section>
        <q-separator />
        <q-card-actions align="right">
          <q-btn
            dense
            label="Eliminar"
            color="negative"
            v-close-popup
            @click="eraserItemDetail"
          />
          <q-btn dense flat label="Cerrar" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
    <!-- COMP ELIMINAR -->
    <delete-item
      :showFormDelete="showFormDelete"
      :item="item"
      title="Eliminar servicio"
      url="/quotes/eraser"
      targets="client,analysis_description"
      @updateList="updateOfEraser"
    />
    <q-dialog
      v-model="showPrintNote"
      persistent
      transition-show="scale"
      transition-hide="scale"
    >
      <q-card style="width: 500px; max-width: 80vw">
        <q-card-section> Imprimir nota </q-card-section>
        <q-separator />
        <q-card-section v-html="iframe"> </q-card-section>
        <q-separator />
        <q-card-actions align="right">
          <q-btn dense flat label="Cerrar" @click="showPrintNote = false" />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import { ApiUrl, onview, generateId, dateToUS } from '../boot/tools'
import DeleteItem from '../components/DeleteItem'

export default {
  name: 'services',
  components: {
    DeleteItem
  },
  data () {
    return {
      showPrintQr: false,
      qrCant: 1,
      config: {
        height: 300,
        language: 'es'
      },
      showFormLocation: false,
      showFormClient: false,
      showFormDoctor: false,
      statusEditResult: 1,
      showEditResult: false,
      dataResult: {
        id: 0,
        content: ''
      },
      clientName: '',
      client: null,
      doctor: null,
      analysis_aux: null,
      toPrint: {
        name: '',
        codeAnalysis: '',
        barcode: '12345'
      },
      pagination: {
        sortBy: 'id',
        descending: true,
        page: 1,
        rowsPerPage: 10,
        rowsNumber: 0
      },
      datas: [],
      errors: [],
      views: {
        list: true,
        news: false
      },
      columns: [
        {
          name: 'moment',
          required: true,
          label: 'FECHA',
          align: 'left',
          field: 'created_at',
          format: val => new Date(val.replace(/-/g, '/')).toLocaleDateString(),
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'cliente',
          required: true,
          label: 'NOMBRE',
          align: 'left',
          field: 'client_name',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'balance',
          required: true,
          label: 'MONTO',
          align: 'left',
          field: 'amount',
          headerClasses: 'bg-primary text-white'
        },
        {
          name: 'status_id',
          required: true,
          label: 'ESTADO',
          align: 'left',
          field: 'status',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        { name: 'actions', label: 'ACCIONES', field: '', align: 'center', headerClasses: 'bg-primary text-white' }
      ],
      act: 'post',
      dataLabel: 'Cargando datos...',
      withCant: false,
      cantSendToInventory: 0,
      showFormDetail: false,
      showFormDelete: false,
      showApplyForm: false,
      showFormDeleteItem: false,
      titleForm: '',
      filter: {
        field: {
          value: 'moment',
          label: 'Fecha',
          type: 'date'
        },
        val: ''
      },
      filerOptions: [
        {
          value: 'moment',
          label: 'Fecha',
          type: 'date',
          join: null
        },
        {
          value: 'barcode',
          label: 'CB',
          type: 'text',
          join: null
        },
        {
          value: 'clients.names',
          label: 'Cliente',
          type: 'text',
          join: 'clients'
        }
      ],
      loading: false,
      item: {
        id: 0,
        moment: '',
        client_name: '',
        status: 0,
        amount: 0,
        details: []
      },
      itemClear: {
        id: 0,
        moment: '',
        client_name: '',
        status: 0,
        amount: 0,
        analysis: []
      },
      clients: [],
      doctors: [],
      locations: [],
      location: null,
      clientsSearch: [],
      doctorsSearch: [],
      analysis: [],
      analysisSearch: [],
      isItemEdit: false,
      isItemDetailEdit: false,
      itemDetail: {
        id: null,
        analysis_id: null,
        description: '',
        price: 0
      },
      itemDetailClear: {
        id: null,
        analysis_id: null,
        description: '',
        price: 0
      },
      productsColumns: [
        {
          name: 'code',
          required: true,
          label: 'CODIGO',
          align: 'left',
          field: 'code',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'description',
          required: true,
          label: 'Analisis',
          align: 'left',
          field: 'description',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        {
          name: 'price',
          required: true,
          label: 'PRECIO',
          align: 'left',
          field: 'price',
          headerClasses: 'bg-primary text-white',
          sortable: true
        },
        { name: 'actions', label: 'ACCIONES', field: '', align: 'center', headerClasses: 'bg-primary text-white' }
      ],
      showFormChangeStatusService: false,
      locationsSearch: [],
      next: 0,
      showPrintNote: false,
      iframe: '',
      fixDescription: false,
      showEmail: false
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
    },
    'client': 'getCodeBar',
    'location': 'getCodeBar'
  },
  computed: {
    getSubTotal: function () {
      let total = 0
      if (this.item.analysis.length > 0) {
        total = this.item.analysis.reduce((ret, item) => {
          return ret + parseFloat(item.price)
        }, 0)
      } else {
        total = 0
      }
      return total
    },
    getTotal: function () {
      if (this.item.analysis.length > 0) {
        const total = this.item.analysis.reduce((a, b) => {
          return a + parseFloat(b.price)
        }, 0)
        return (total).toFixed(2)
      } else {
        return 0
      }
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
    openQuote (item) {
      let url = ApiUrl + '/quotes/print/' + item.id
      window.open(url, '_blank')
    },
    saveContentResult () {
      this.$axios.post(ApiUrl + '/services/store-content', this.dataResult).then(() => {
        this.showEditResult = false
        this.$noty.positive('Se guardo la información!')
      })
    },
    printQuote (item) {
      this.showPrintNote = true
      this.iframe = '<iframe src="/analysis/sales-note/' + item.id + '" style="width: 100%" frameborder="0"></iframe>'
    },
    setItemDet (value) {
      this.itemDetail.price = value.price
      this.itemDetail.description = value.description
      this.itemDetail.code = value.code
    },
    close () {
      onview('list', this.views)
      this.getList(
        {
          pagination: this.pagination
        }
      )
    },
    filterFn (val, update) {
      if (val === '') {
        update(() => {
          this.analysisSearch = this.analysis
        })
        return
      }
      update(() => {
        const needle = val.toLowerCase()
        this.analysisSearch = this.analysis.filter(v => v.description.toLowerCase().indexOf(needle) > -1)
      })
    },
    getList (props) {
      let toServer = {
        pagination: props.pagination,
        filter: this.filter
      }
      this.dataLabel = 'Cargando datos...'
      this.loading = true
      this.$axios.post(ApiUrl + '/quotes/list', toServer).then(res => {
        this.datas = res.data.list
        this.dataLabel = this.datas.length >= 0 ? '' : 'No hay datos que mostrar...'
        this.pagination = props.pagination
        this.pagination.rowsNumber = res.data.total
        this.loading = false
      })
    },
    newItemDetail () {
      this.itemDetail = { ...this.itemDetailClear }
      this.isItemDetailEdit = false
      this.showFormDetail = true
    },
    addItemDetail () {
      let item = this.item.analysis.find(it => it.analysis_id === this.itemDetail.analysis_id)
      if (item === undefined) {
        this.itemDetail.id = generateId(5)
        this.itemDetail.analysis_id = this.analysis_aux.id
        this.item.analysis.push({ ...this.itemDetail })
        this.itemDetail = { ...this.itemDetailClear }
        this.showFormDetail = false
      } else {
        this.item.analysis.forEach(it => {
          if (it.id === this.itemDetail.id) {
            it.analysis_id = this.analysis_aux.id
            it.price = this.itemDetail.price
            it.code = this.itemDetail.code
            it.barcode = this.itemDetail.barcode
            it.barcode_quantity = this.itemDetail.barcode_quantity
            this.showFormDetail = false
          }
        })
      }
      this.isItemDetailEdit = false
    },
    newItem () {
      this.$axios.get(ApiUrl + '/quotes/resources').then(res => {
        this.act = 'post'
        this.clients = res.data.clients
        this.analysis = res.data.analysis.map(item => {
          item.description = item.description.normalize('NFD').replace(/[\u0300-\u036f]/g, '')
          return item
        })
        this.titleForm = 'Añadir cotizacion'
        this.item = { ...this.itemClear }
        this.item.analysis = []
        this.item.moment = dateToUS(new Date())
        this.isItemEdit = false
        onview('news', this.views)
      })
    },
    editItem (itm) {
      this.$axios.get(ApiUrl + '/services/resources').then(res => {
        this.clients = res.data.clients
        this.analysis = res.data.analysis
        this.doctors = res.data.doctors
        this.locations = res.data.locations
        this.titleForm = 'Editar servicio a cliente.'
        this.isItemEdit = true
        this.act = 'update'
        this.item = { ...itm }
        this.client = this.clients.find(it => it.id === itm.client_id)
        this.doctor = this.doctors.find(doc => doc.id === itm.doctor_id)
        this.location = this.locations.find(loc => loc.id === itm.location_id)
        onview('news', this.views)
      })
    },
    saveItem () {
      this.item.amount = this.getTotal
      this.$axios({
        method: 'post',
        url: ApiUrl + '/quotes/' + this.act,
        data: this.item
      }).then(res => {
        this.$noty.positive(res.data)
        this.getList({
          pagination: this.pagination
        })
        onview('list', this.views)
      }).catch(er => {
        if (er.response.data.hasOwnProperty('errors')) {
          this.errors = er.response.data.errors
        } else {
          this.$noty.negative(er.response.data)
        }
      })
    },
    getListUpdate () {
      this.getList({
        pagination: this.pagination
      })
      this.showFormChangeStatusService = false
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
    },
    // FUNCION PARA VALIDAD DATOS DE ENVIO AL BACK END
    IsSaveDetail () {
      /* let code = this.itemDetail.barcode !== ''
        let cant = parseInt(this.itemDetail.barcode_quantity) > 0 */
      let price = parseInt(this.itemDetail.price) > 0
      let isSelect = this.analysis_aux !== null
      return isSelect && price
    },
    IsSaveWard () {
      let client = this.item.client_name !== null && this.item.client_name !== ''
      let moment = this.item.moment !== ''
      let data = this.item.analysis.length > 0
      return client && moment && data
    },
    eraserShowItemDetail (it) {
      this.itemDetail = { ...it }
      this.showFormDeleteItem = true
    },
    eraserItemDetail () {
      this.item.analysis = this.item.analysis.filter(it => it.id !== this.itemDetail.id)
      this.showFormDeleteItem = true
    },
    editItemDetail (it) {
      this.itemDetail = { ...it }
      this.analysis_aux = this.analysis.find(its => its.id === it.analysis_id)
      this.isItemDetailEdit = true
      this.showFormDetail = true
    },
    applyShow (it) {
      this.item = { ...it }
      this.showApplyForm = true
    },
    applyToInventory () {
      this.$axios.post(ApiUrl + '/services/apply', { id: this.item.id }).then(res => {
        this.showApplyForm = false
        this.$noty.positive(res.data)
        this.getList({
          pagination: this.pagination
        })
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

.texto-vertical {
  writing-mode: vertical-lr;
  transform: translateY(-40px) rotate(180deg);
  font-size: 12px;
}

tr {
  cursor: pointer;
  &.selected {
    color: #fff;
    background: #0f0;
    td:after,
    td:before {
      background: none;
    }
  }
}
</style>
