(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[6],{"0fa5":function(t,e,a){"use strict";var i=a("9eca"),s=a.n(i);s.a},"9eca":function(t,e,a){},f742:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{staticClass:" q-pa-md"},[a("div",{staticClass:"gt-xs row flex q-mb-md"},[a("q-breadcrumbs",{staticClass:"text-grey"},[a("q-breadcrumbs-el",{attrs:{label:"Catalogo"}}),a("q-breadcrumbs-el",{attrs:{label:"Analisis"}}),t.views.news?a("q-breadcrumbs-el",{attrs:{label:"Nueva"}}):t._e()],1)],1),t.views.list?a("div",[a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-8 col-xs-12"},[a("q-btn",{attrs:{color:"primary",label:"Nueva"},on:{click:t.newItem}})],1),a("div",{staticClass:"col-lg-4 col-xs-12 flex flex-inline"},[a("q-input",{staticStyle:{width:"49%"},attrs:{dense:"",autofocus:"",label:"filtro..."},model:{value:t.filter.val,callback:function(e){t.$set(t.filter,"val",e)},expression:"filter.val"}}),a("q-select",{staticStyle:{width:"50%"},attrs:{dense:"",options:t.filerOptions,label:"filtro por..."},scopedSlots:t._u([{key:"option",fn:function(e){return[a("q-item",t._g(t._b({},"q-item",e.itemProps,!1),e.itemEvents),[a("q-item-section",[a("q-item-label",{attrs:{caption:""}},[t._v(t._s(e.opt.label))])],1)],1)]}}],null,!1,1963659883),model:{value:t.filter.field,callback:function(e){t.$set(t.filter,"field",e)},expression:"filter.field"}})],1)]),a("div",{staticClass:"row flex"},[a("div",{staticClass:"col-lg-12 col-xs-12 q-mt-xs"},[a("q-card",[a("q-separator"),a("q-card-section",{staticClass:"section-fix"},[a("q-table",{attrs:{flat:"",data:t.datas,columns:t.columns,"row-key":"id",loading:t.loading,pagination:t.pagination,"no-data-label":t.dataLabel,"binary-state-sort":""},on:{"update:pagination":function(e){t.pagination=e},request:t.getList},scopedSlots:t._u([{key:"body-cell-actions",fn:function(e){return[a("q-td",{attrs:{props:e}},[a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"secondary",icon:"fa fa-edit"},on:{click:function(a){return t.editItem(e.row)}}}),a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"negative",icon:"fa fa-eraser"},on:{click:function(a){return t.eraserShow(e.row)}}}),a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"primary",icon:"fa fa-clone"},on:{click:function(a){return t.clones(e.row)}}}),a("q-btn",{staticClass:"text-black",attrs:{dense:"",color:"info",icon:"fa fa-file-pdf"},on:{click:function(a){return t.analisisShow(e.row.id)}}})],1)]}}],null,!1,597538237)})],1)],1)],1)])]):t._e(),t.views.news?a("div",[a("q-card",{staticStyle:{width:"100%"}},[a("q-card-section",[t._v("\n        "+t._s(t.titleForm)+"\n      ")]),a("q-separator"),a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-2 col-md-2 col-sm-12 col-xs-12 q-pa-sm"},[a("q-input",{staticClass:"q-mb-sm text-uppercase",attrs:{dense:"",outlined:"",autofocus:"",label:"Codigo"},model:{value:t.item.code,callback:function(e){t.$set(t.item,"code",e)},expression:"item.code"}})],1),a("div",{staticClass:"col-lg-8 col-md-8 col-sm-12 col-xs-12 q-pa-sm"},[a("q-input",{staticClass:"q-mb-sm text-uppercase",attrs:{dense:"",outlined:"",label:"Descripción"},model:{value:t.item.description,callback:function(e){t.$set(t.item,"description",e)},expression:"item.description"}})],1),a("div",{staticClass:"col-lg-2 col-md-2 col-sm-12 col-xs-12 q-pa-sm"},[a("q-input",{directives:[{name:"only-numbers",rawName:"v-only-numbers"}],staticClass:"q-mb-sm",attrs:{dense:"",outlined:"",label:"Precio"},model:{value:t.item.price,callback:function(e){t.$set(t.item,"price",t._n(e))},expression:"item.price"}})],1),a("div",{staticClass:"col-lg-12 col-md-12 col-sm-12 col-xs-12 q-pa-sm",attrs:{hidden:t.templateOff}},[a("tinymce",{attrs:{id:"d1",toolbar1:t.tool,other_options:t.tinyOptions},model:{value:t.item.content,callback:function(e){t.$set(t.item,"content",e)},expression:"item.content"}})],1),a("div",{staticClass:"col-lg-8 col-md-12 col-sm-12 col-xs-12 q-pa-sm"},[t.item.affects?a("q-btn",{attrs:{label:"Añadir Producto"},on:{click:t.newItemDetail}}):t._e()],1),a("div",{staticClass:"col-lg-2 col-md-6 col-sm-12 col-xs-12 q-pl-sm"},[a("q-checkbox",{attrs:{label:"Se utiliza inventario"},model:{value:t.item.affects,callback:function(e){t.$set(t.item,"affects",e)},expression:"item.affects"}})],1),a("div",{staticClass:"col-lg-2 col-md-6 col-sm-12 col-xs-12 q-pl-sm q-pr-lg text-right"},[a("q-checkbox",{attrs:{label:"Ocultar plantilla"},model:{value:t.templateOff,callback:function(e){t.templateOff=e},expression:"templateOff"}})],1)]),a("q-separator"),t.item.affects?a("q-card-section",{staticClass:"section-fix"},[a("q-table",{ref:"tm",attrs:{flat:"",square:"",data:t.item.products,columns:t.productsColumns,"row-key":"id",loading:t.loading,"no-data-label":t.dataLabel},on:{request:t.getList},scopedSlots:t._u([{key:"body-cell-actions",fn:function(e){return[a("q-td",{attrs:{props:e}},[a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"secondary",icon:"fa fa-edit"},on:{click:function(a){return t.editItemDetail(e.row)}}}),a("q-btn",{attrs:{dense:"",color:"negative",icon:"fa fa-eraser"},on:{click:function(a){return t.eraserShowItemDetail(e.row)}}})],1)]}}],null,!1,2576782805)})],1):t._e(),a("q-separator"),a("q-card-section",[t.IsSaveWard()?a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",label:"Guardar analisis",color:"positive"},on:{click:function(e){return t.saveItem()}}}):t._e(),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",flat:"",label:"Cerrar"},on:{click:function(e){return t.close()}}})],1)],1)],1):t._e(),a("q-dialog",{attrs:{persistent:"","transition-show":"scale","transition-hide":"scale"},model:{value:t.showFormDetail,callback:function(e){t.showFormDetail=e},expression:"showFormDetail"}},[a("q-card",{staticStyle:{width:"700px","max-width":"80vw"}},[a("q-card-section",[t._v("\n        Añadir producto a descontar\n      ")]),a("q-separator"),a("q-card-section",[a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-12 col-xs-12"},[a("q-select",{staticClass:"q-mb-sm",attrs:{"use-input":"",disable:t.isItemEdit,"input-debounce":"0",dense:"",outlined:"",options:t.productsSearch,"option-label":"names","option-value":"product_id",autofocus:""},on:{filter:t.filterFn},scopedSlots:t._u([{key:"option",fn:function(e){return[a("q-item",t._g(t._b({},"q-item",e.itemProps,!1),e.itemEvents),[a("q-item-section",[a("q-item-label",{attrs:{caption:""}},[t._v(t._s(e.opt.names))])],1)],1)]}},{key:"no-option",fn:function(){return[a("q-item",[a("q-item-section",{staticClass:"text-grey"},[t._v("\n                    null\n                  ")])],1)]},proxy:!0}]),model:{value:t.itemDetail,callback:function(e){t.itemDetail=e},expression:"itemDetail"}}),a("q-input",{staticClass:"q-mb-md",attrs:{dense:"",outlined:"",label:"Cantidad"},model:{value:t.itemDetail.cant,callback:function(e){t.$set(t.itemDetail,"cant",t._n(e))},expression:"itemDetail.cant"}})],1)])]),a("q-separator"),a("q-card-actions",{attrs:{align:"right"}},[t.IsSaveDetail()?a("q-btn",{attrs:{dense:"",label:"Guardar",color:"positive"},on:{click:function(e){return t.addItemDetail()}}}):t._e(),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",flat:"",label:"Cerrar"}})],1)],1)],1),a("q-dialog",{attrs:{persistent:"","transition-show":"scale","transition-hide":"scale"},model:{value:t.showFormDeleteItem,callback:function(e){t.showFormDeleteItem=e},expression:"showFormDeleteItem"}},[a("q-card",{staticStyle:{width:"700px","max-width":"80vw"}},[a("q-card-section",{staticClass:"bg-red-5"},[t._v("\n        Eliminar detalle\n      ")]),a("q-separator"),a("q-card-section",[a("p",[t._v("Seguro que desea eliminar: "),a("b",[t._v(" "+t._s(this.itemDetail.names))]),t._v(" ?")]),a("p",[t._v("Esta operación es irrevercible!")])]),a("q-separator"),a("q-card-actions",{attrs:{align:"right"}},[a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",label:"Eliminar",color:"negative"},on:{click:t.eraserItemDetail}}),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",flat:"",label:"Cerrar"}})],1)],1)],1),a("delete-item",{attrs:{showFormDelete:t.showFormDelete,item:t.item,title:"Eliminar analisis",url:"/analysis/eraser",targets:"description"},on:{updateList:t.updateOfEraser}})],1)},s=[],n=(a("8e6e"),a("8a81"),a("ac6a"),a("cadf"),a("06db"),a("456d"),a("7514"),a("9523")),o=a.n(n),l=a("2cbf"),r=a("129a"),c=a("474f");function d(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,i)}return a}function m(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?d(Object(a),!0).forEach((function(e){o()(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):d(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var u={name:"reception",components:{DeleteItem:c["a"],tinymce:l["a"]},data:function(){return{config:{height:400,language:"es"},templateOff:!1,tinyOptions:{height:"40vh",language_url:"../statics/es.js",menubar:!0},tool:"formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat| table preview print | code",pagination:{sortBy:"description",descending:!0,page:1,rowsPerPage:10,rowsNumber:0},datas:[],errors:[],views:{list:!0,news:!1},columns:[{name:"code",required:!0,label:"CODIGO",align:"left",field:"code",headerClasses:"bg-primary text-white",sortable:!0},{name:"description",required:!0,label:"DESCRIPCION",align:"left",field:"description",headerClasses:"bg-primary text-white",sortable:!0},{name:"price",required:!0,label:"PRECIO",align:"left",field:"price",headerClasses:"bg-primary text-white",sortable:!0},{name:"actions",label:"ACCIONES",field:"",align:"center",headerClasses:"bg-primary text-white"}],act:"post",dataLabel:"Cargando datos...",withCant:!1,cantSendToInventory:0,showFormDetail:!1,showFormDelete:!1,showApplyForm:!1,showFormDeleteItem:!1,titleForm:"",filter:{field:{value:"code",label:"Codigo",type:"text"},val:""},filerOptions:[{value:"description",label:"Descripción",type:"text"}],loading:!1,item:{id:0,code:"",description:"",content:"",affects:!1,products:[]},itemClear:{id:0,code:"",description:"",content:"",affects:!1,products:[]},products:[],productsSearch:[],isItemEdit:!1,itemDetail:{id:null,product_id:null,code:"",names:"",cant:0},itemDetailClear:{id:null,product_id:null,code:"",names:"",cant:0},productsColumns:[{name:"code",required:!0,label:"CODIGO",align:"left",field:"code",headerClasses:"bg-primary text-white",sortable:!0},{name:"names",required:!0,label:"NOMBRE",align:"left",field:"names",headerClasses:"bg-primary text-white",sortable:!0},{name:"cant",required:!0,label:"CANTIDAD",align:"left",field:"cant",headerClasses:"bg-primary text-white",sortable:!0},{name:"actions",label:"ACCIONES",field:"",align:"center",headerClasses:"bg-primary text-white"}]}},watch:{"filter.field.value":function(){this.getList({pagination:this.pagination})},"filter.val":function(){this.getList({pagination:this.pagination})}},mounted:function(){this.getList({pagination:this.pagination})},methods:{clones:function(t){var e=this;this.$axios.get(r["a"]+"/analysis/clone/"+t.id).then((function(){e.getList({pagination:e.pagination})}))},analisisShow:function(t){window.open("/analysis/pdf/"+t,"_blank")},editItemDetail:function(t){var e=this;this.$axios.get(r["a"]+"/receptions/resources").then((function(a){e.products=a.data.products,e.itemDetail=m({},t),e.isItemEdit=!0,e.showFormDetail=!0}))},eraserShowItemDetail:function(t){this.itemDetail=m({},t),this.showFormDeleteItem=!0},eraserItemDetail:function(){var t=this;this.item.products=this.item.products.filter((function(e){return e.id!==t.itemDetail.id})),this.showFormDeleteItem=!0},IsSaveDetail:function(){var t=parseInt(this.itemDetail.cant)>0,e=this.itemDetail.product_id&&""!==this.itemDetail.product_id;return t&&e},newItemDetail:function(){var t=this;this.$axios.get(r["a"]+"/receptions/resources").then((function(e){t.products=e.data.products,t.itemDetail=m({},t.itemDetailClear),t.isItemEdit=!1,t.showFormDetail=!0}))},addItemDetail:function(){var t=this,e=this.item.products.find((function(e){return e.product_id===t.itemDetail.product_id}));void 0===e?(this.itemDetail.id=Object(r["c"])(5),this.item.products.push(m({},this.itemDetail)),this.itemDetail=m({},this.itemDetailClear),this.$noty.info("Producto añadido!")):this.item.products.forEach((function(e){e.product_id===t.itemDetail.product_id&&(t.isItemEdit?(e.cant=t.itemDetail.cant,t.itemDetail=m({},t.itemDetailClear),t.showFormDetail=!1,t.$noty.warning("Se actualizo la cantidad!")):(e.cant+=t.itemDetail.cant,t.itemDetail=m({},t.itemDetailClear),t.$noty.warning("Producto añadido anteriormente, se actualizo la cantidad!")))}))},close:function(){Object(r["d"])("list",this.views),this.getList({pagination:this.pagination})},filterFn:function(t,e){var a=this;e(""!==t?function(){var e=t.toLowerCase();a.productsSearch=a.products.filter((function(t){return t.names.toLowerCase().indexOf(e)>-1}))}:function(){a.productsSearch=a.products})},getList:function(t){var e=this,a={pagination:t.pagination,filter:this.filter};this.dataLabel="Cargando datos...",this.loading=!0,this.$axios.post(r["a"]+"/analysis/list",a).then((function(a){e.datas=a.data.list,e.dataLabel=e.datas.length>=0?"":"No hay datos que mostrar...",e.pagination=t.pagination,e.pagination.rowsNumber=a.data.total,e.loading=!1}))},newItem:function(){this.act="post",this.withCant=!1,this.cantSendToInventory=0,this.titleForm="Añadir analisis",this.item=m({},this.itemClear),Object(r["d"])("news",this.views)},editItem:function(t){var e=this;Object(r["d"])("news",this.views),this.titleForm="Editar analisis",setTimeout((function(){e.act="update",e.item=m({},t)}),1e3)},saveItem:function(){var t=this;this.$axios({method:"post",url:r["a"]+"/analysis/"+this.act,data:this.item}).then((function(e){t.$noty.positive(e.data),t.getList({pagination:t.pagination}),Object(r["d"])("list",t.views)})).catch((function(e){e.response.data.hasOwnProperty("errors")?t.errors=e.response.data.errors:t.$noty.negative(e.response.data)}))},eraserShow:function(t){this.item=m({},t),this.showFormDelete=!0},updateOfEraser:function(){this.showFormDelete=!1,this.getList({pagination:this.pagination})},IsSaveWard:function(){var t=""!==this.item.description,e=this.item.price>0;return e&&t}}},p=u,f=(a("0fa5"),a("2877")),h=a("9989"),b=a("ead5"),g=a("079e"),v=a("9c40"),w=a("27f9"),q=a("ddd8"),C=a("66e5"),D=a("4074"),x=a("0170"),y=a("f09f"),I=a("eb85"),O=a("a370"),_=a("eaac"),k=a("db86"),S=a("8f8e"),F=a("24e8"),E=a("4b7e"),P=a("7f67"),j=a("eebe"),L=a.n(j),$=Object(f["a"])(p,i,s,!1,null,"0e1705b4",null);e["default"]=$.exports;L()($,"components",{QPage:h["a"],QBreadcrumbs:b["a"],QBreadcrumbsEl:g["a"],QBtn:v["a"],QInput:w["a"],QSelect:q["a"],QItem:C["a"],QItemSection:D["a"],QItemLabel:x["a"],QCard:y["a"],QSeparator:I["a"],QCardSection:O["a"],QTable:_["a"],QTd:k["a"],QCheckbox:S["a"],QDialog:F["a"],QCardActions:E["a"]}),L()($,"directives",{ClosePopup:P["a"]})}}]);