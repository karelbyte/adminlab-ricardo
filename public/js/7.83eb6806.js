(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[7],{5994:function(t,e,a){"use strict";var i=a("d937"),s=a.n(i);s.a},c5d2:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{staticClass:"q-pa-md"},[a("div",{staticClass:"gt-xs row flex"},[a("q-breadcrumbs",{staticClass:"text-grey"},[a("q-breadcrumbs-el",{attrs:{label:"Almacen"}}),a("q-breadcrumbs-el",{attrs:{label:"Categorias"}})],1)],1),a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-8 col-xs-12"},[a("q-btn",{attrs:{color:"primary",label:"Nueva"},on:{click:t.newItem}})],1),a("div",{staticClass:"col-lg-4 col-xs-12 flex flex-inline"},[a("q-input",{staticStyle:{width:"49%"},attrs:{dense:"",autofocus:"",label:"filtro..."},model:{value:t.filter.val,callback:function(e){t.$set(t.filter,"val",e)},expression:"filter.val"}}),a("q-select",{staticStyle:{width:"50%"},attrs:{dense:"",options:t.filerOptions,label:"filtro por..."},scopedSlots:t._u([{key:"option",fn:function(e){return[a("q-item",t._g(t._b({},"q-item",e.itemProps,!1),e.itemEvents),[a("q-item-section",[a("q-item-label",{attrs:{caption:""}},[t._v(t._s(e.opt.label))])],1)],1)]}}]),model:{value:t.filter.field,callback:function(e){t.$set(t.filter,"field",e)},expression:"filter.field"}})],1)]),a("div",{staticClass:"row flex"},[a("div",{staticClass:"col-lg-12 col-xs-12 q-mt-xs"},[a("q-card",[a("q-separator"),a("q-card-section",{staticClass:"section-fix"},[a("q-table",{attrs:{flat:"",data:t.datas,columns:t.columns,"row-key":"id",loading:t.loading,pagination:t.pagination,"no-data-label":t.dataLabel,"binary-state-sort":""},on:{"update:pagination":function(e){t.pagination=e},request:t.getList},scopedSlots:t._u([{key:"body-cell-actions",fn:function(e){return[a("q-td",{attrs:{props:e}},[a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"secondary",icon:"fa fa-edit"},on:{click:function(a){return t.editItem(e.row)}}}),a("q-btn",{attrs:{dense:"",color:"negative",icon:"fa fa-eraser"},on:{click:function(a){return t.eraserShow(e.row)}}})],1)]}}])})],1)],1)],1)]),a("delete-item",{attrs:{showFormDelete:t.showFormDelete,item:t.item,title:"Eliminar Categoria",url:"/categories/eraser",targets:"description"},on:{updateList:t.updateOfEraser}}),a("q-dialog",{attrs:{persistent:"","transition-show":"scale","transition-hide":"scale"},model:{value:t.showForm,callback:function(e){t.showForm=e},expression:"showForm"}},[a("q-card",{staticStyle:{width:"700px","max-width":"80vw"}},[a("q-card-section",[t._v("\n        "+t._s(t.titleForm)+"\n      ")]),a("q-separator"),a("q-card-section",[a("q-input",{attrs:{outlined:"",autofocus:"",label:"Introduce la unidad de medida"},model:{value:t.item.description,callback:function(e){t.$set(t.item,"description",e)},expression:"item.description"}})],1),a("q-separator"),a("q-card-actions",{attrs:{align:"right"}},[""!==t.item.description?a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",label:"Guardar",color:"positive"},on:{click:t.saveItem}}):t._e(),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",flat:"",label:"Cerrar"}})],1)],1)],1)],1)},s=[],o=(a("456d"),a("8a81"),a("9986"),a("8e6e"),a("c47a")),n=a.n(o),r=(a("d25f"),a("129a")),l=a("474f");function c(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,i)}return a}function d(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?c(Object(a),!0).forEach((function(e){n()(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):c(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var p={name:"Categories",components:{DeleteItem:l["a"]},data:function(){return{pagination:{sortBy:"description",descending:!0,page:1,rowsPerPage:10,rowsNumber:0},datas:[],columns:[{name:"description",required:!0,label:"DESCRIPCION",align:"left",field:"description",headerClasses:"bg-primary text-white",sortable:!0},{name:"actions",label:"ACCIONES",field:"",align:"center",headerClasses:"bg-primary text-white"}],act:"post",dataLabel:"Cargando datos...",showForm:!1,showFormDelete:!1,titleForm:"",filter:{field:{value:"description",label:"Descripcion",type:"text"},val:""},filerOptions:[{value:"description",label:"Descripcion",type:"text"}],loading:!1,item:{id:0,description:""},itemClear:{id:0,description:""}}},watch:{"filter.field.value":function(){this.getList({pagination:this.pagination})},"filter.val":function(){this.getList({pagination:this.pagination})}},mounted:function(){this.getList({pagination:this.pagination})},methods:{getList:function(t){var e=this,a={pagination:t.pagination,filter:this.filter};this.dataLabel="Cargando datos...",this.loading=!0,this.$axios.post(r["a"]+"/categories/list",a).then((function(a){e.datas=a.data.list,e.dataLabel=e.datas.length>=0?"":"No hay datos que mostrar...",e.pagination=t.pagination,e.pagination.rowsNumber=a.data.total,e.loading=!1}))},newItem:function(){this.act="post",this.titleForm="Añadir categoria",this.item=d({},this.itemClear),this.showForm=!0},editItem:function(t){this.act="update",this.titleForm="Editar categoria",this.item=d({},t),this.showForm=!0},saveItem:function(){var t=this;this.$axios({method:"post",url:r["a"]+"/categories/"+this.act,data:this.item}).then((function(e){t.$noty.positive(e.data),t.getList({pagination:t.pagination})}))},eraserShow:function(t){this.item=d({},t),this.showFormDelete=!0},updateOfEraser:function(){this.showFormDelete=!1,this.getList({pagination:this.pagination})}}},u=p,m=(a("5994"),a("2877")),f=a("9989"),g=a("ead5"),b=a("079e"),h=a("9c40"),w=a("27f9"),v=a("ddd8"),q=a("66e5"),y=a("4074"),C=a("0170"),x=a("f09f"),O=a("eb85"),Q=a("a370"),F=a("eaac"),I=a("db86"),S=a("24e8"),k=a("4b7e"),D=a("7f67"),P=a("eebe"),L=a.n(P),j=Object(m["a"])(u,i,s,!1,null,"2462d27b",null);e["default"]=j.exports;L()(j,"components",{QPage:f["a"],QBreadcrumbs:g["a"],QBreadcrumbsEl:b["a"],QBtn:h["a"],QInput:w["a"],QSelect:v["a"],QItem:q["a"],QItemSection:y["a"],QItemLabel:C["a"],QCard:x["a"],QSeparator:O["a"],QCardSection:Q["a"],QTable:F["a"],QTd:I["a"],QDialog:S["a"],QCardActions:k["a"]}),L()(j,"directives",{ClosePopup:D["a"]})},d937:function(t,e,a){}}]);