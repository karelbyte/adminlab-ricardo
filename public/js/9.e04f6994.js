(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[9],{1848:function(t,e,a){},7695:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{staticClass:"q-pa-md"},[a("div",{staticClass:"gt-xs row flex"},[a("q-breadcrumbs",{staticClass:"text-grey"},[a("q-breadcrumbs-el",{attrs:{label:"Doctores"}}),a("q-breadcrumbs-el",{attrs:{label:"Listado"}})],1)],1),a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-8 col-xs-12"},[a("q-btn",{attrs:{color:"primary",label:"Nuevo"},on:{click:t.newItem}})],1),a("div",{staticClass:"col-lg-4 col-xs-12 flex flex-inline"},[a("q-input",{staticStyle:{width:"49%"},attrs:{dense:"",autofocus:"",label:"filtro..."},model:{value:t.filter.val,callback:function(e){t.$set(t.filter,"val",e)},expression:"filter.val"}}),a("q-select",{staticStyle:{width:"50%"},attrs:{dense:"",options:t.filerOptions,label:"filtro por..."},scopedSlots:t._u([{key:"option",fn:function(e){return[a("q-item",t._g(t._b({},"q-item",e.itemProps,!1),e.itemEvents),[a("q-item-section",[a("q-item-label",{attrs:{caption:""}},[t._v(t._s(e.opt.label))])],1)],1)]}}]),model:{value:t.filter.field,callback:function(e){t.$set(t.filter,"field",e)},expression:"filter.field"}})],1)]),a("div",{staticClass:"row flex"},[a("div",{staticClass:"col-lg-12 col-xs-12 q-mt-xs"},[a("q-card",[a("q-separator"),a("q-card-section",{staticClass:"section-fix"},[a("q-table",{attrs:{flat:"",data:t.datas,columns:t.columns,"row-key":"id",loading:t.loading,pagination:t.pagination,"no-data-label":t.dataLabel,"binary-state-sort":""},on:{"update:pagination":function(e){t.pagination=e},request:t.getList},scopedSlots:t._u([{key:"body-cell-age",fn:function(e){return[a("q-td",{attrs:{props:e}},[a("span",[t._v(t._s(t.getAge(e.row.birthday)))]),a("br")])]}},{key:"body-cell-actions",fn:function(e){return[a("q-td",{attrs:{props:e}},[a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"secondary",icon:"fa fa-edit"},on:{click:function(a){return t.editItem(e.row)}}}),a("q-btn",{staticClass:"q-mr-xs",attrs:{dense:"",color:"negative",icon:"fa fa-eraser"},on:{click:function(a){return t.eraserShow(e.row)}}}),a("q-btn",{attrs:{dense:"",color:"warning",icon:"fa fa-file-alt"},on:{click:function(a){return t.openInfo(e.row)}}})],1)]}}])})],1)],1)],1)]),a("delete-item",{attrs:{showFormDelete:t.showFormDelete,item:t.item,title:"Eliminar doctor",url:"/doctors/eraser",targets:"names"},on:{updateList:t.updateOfEraser}}),a("q-dialog",{attrs:{persistent:"","transition-show":"scale","transition-hide":"scale"},model:{value:t.showForm,callback:function(e){t.showForm=e},expression:"showForm"}},[a("q-card",{staticStyle:{width:"700px","max-width":"80vw"}},[a("q-card-section",[t._v("\n        "+t._s(t.titleForm)+"\n      ")]),a("q-separator"),a("q-card-section",[a("q-input",{ref:"name",staticClass:"q-mb-xs text-uppercase",attrs:{dense:"",outlined:"",autofocus:"",label:"Nombres"},model:{value:t.item.names,callback:function(e){t.$set(t.item,"names",e)},expression:"item.names"}}),a("q-input",{staticClass:"q-mb-xs",attrs:{dense:"",outlined:"",label:"Correo"},model:{value:t.item.email,callback:function(e){t.$set(t.item,"email",e)},expression:"item.email"}}),a("q-input",{directives:[{name:"only-int-numbers",rawName:"v-only-int-numbers"}],attrs:{dense:"",outlined:"",label:"Telefono"},model:{value:t.item.telf,callback:function(e){t.$set(t.item,"telf",e)},expression:"item.telf"}})],1),a("q-separator"),a("q-card-actions",{attrs:{align:"right"}},[t.validateSave?a("q-btn",{attrs:{dense:"",label:"Guardar",color:"positive"},on:{click:t.saveItem}}):t._e(),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{dense:"",flat:"",label:"Cerrar"}})],1)],1)],1)],1)},s=[],n=(a("456d"),a("8a81"),a("9986"),a("8e6e"),a("c47a")),o=a.n(n),r=(a("d25f"),a("7f7f"),a("129a")),l=a("474f");function c(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,i)}return a}function d(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?c(Object(a),!0).forEach((function(e){o()(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):c(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var m={name:"doctors",components:{DeleteItem:l["a"]},data:function(){return{pagination:{sortBy:"names",descending:!0,page:1,rowsPerPage:10,rowsNumber:0},datas:[],columns:[{name:"names",required:!0,label:"NOMBRES",align:"left",field:"names",headerClasses:"bg-primary text-white",sortable:!0},{name:"email",required:!0,label:"CORREO",align:"left",field:"email",headerClasses:"bg-primary text-white",sortable:!0},{name:"telf",required:!0,label:"TELEFONO",align:"left",field:"telf",headerClasses:"bg-primary text-white",sortable:!0},{name:"clients",required:!0,label:"CLIENTES",align:"center",field:"clients",headerClasses:"bg-primary text-white",sortable:!0},{name:"actions",label:"ACCIONES",field:"",align:"center",headerClasses:"bg-primary text-white"}],act:"post",dataLabel:"Cargando datos...",showForm:!1,showFormDelete:!1,titleForm:"",filter:{field:{value:"names",label:"Nombres",type:"text"},val:""},filerOptions:[{value:"names",label:"Nombres",type:"text"},{value:"address",label:"Direccion",type:"text"}],loading:!1,item:{id:0,names:"",email:"",telf:""},itemClear:{id:0,names:"",email:"",telf:""}}},watch:{"filter.field.value":function(){this.getList({pagination:this.pagination})},"filter.val":function(){this.getList({pagination:this.pagination})}},computed:{validateSave:function(){return""!==this.item.names}},mounted:function(){this.getList({pagination:this.pagination})},methods:{openInfo:function(t){var e=r["a"]+"/doctors/info/"+t.id;window.open(e,"_blank")},getList:function(t){var e=this,a={pagination:t.pagination,filter:this.filter};this.dataLabel="Cargando datos...",this.loading=!0,this.$axios.post(r["a"]+"/doctors/list",a).then((function(a){e.datas=a.data.list,e.dataLabel=e.datas.length>=0?"":"No hay datos que mostrar...",e.pagination=t.pagination,e.pagination.rowsNumber=a.data.total,e.loading=!1}))},newItem:function(){this.act="post",this.titleForm="Añadir doctor.",this.item=d({},this.itemClear),this.showForm=!0},editItem:function(t){this.act="update",this.titleForm="Editar datos del doctor.",this.item=d({},t),this.showForm=!0},saveItem:function(){var t=this;this.item.names=this.item.names.toUpperCase(),this.$axios({method:"post",url:r["a"]+"/doctors/"+this.act,data:this.item}).then((function(e){t.$noty.positive(e.data),t.item=d({},t.itemClear),t.$refs.name.focus(),t.getList({pagination:t.pagination})}))},eraserShow:function(t){this.item=d({},t),this.showFormDelete=!0},updateOfEraser:function(){this.showFormDelete=!1,this.getList({pagination:this.pagination})}}},f=m,u=(a("8b4a"),a("2877")),p=a("9989"),b=a("ead5"),h=a("079e"),g=a("9c40"),w=a("27f9"),v=a("ddd8"),q=a("66e5"),y=a("4074"),x=a("0170"),C=a("f09f"),O=a("eb85"),k=a("a370"),S=a("eaac"),E=a("db86"),F=a("24e8"),L=a("4b7e"),Q=a("7f67"),I=a("eebe"),_=a.n(I),D=Object(u["a"])(f,i,s,!1,null,"196e0f65",null);e["default"]=D.exports;_()(D,"components",{QPage:p["a"],QBreadcrumbs:b["a"],QBreadcrumbsEl:h["a"],QBtn:g["a"],QInput:w["a"],QSelect:v["a"],QItem:q["a"],QItemSection:y["a"],QItemLabel:x["a"],QCard:C["a"],QSeparator:O["a"],QCardSection:k["a"],QTable:S["a"],QTd:E["a"],QDialog:F["a"],QCardActions:L["a"]}),_()(D,"directives",{ClosePopup:Q["a"]})},"8b4a":function(t,e,a){"use strict";var i=a("1848"),s=a.n(i);s.a}}]);