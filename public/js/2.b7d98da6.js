(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[2],{a9c3:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-layout",{attrs:{view:"hHh lpR fFf"}},[a("q-header",{staticClass:"bg-blue-10",attrs:{elevated:""}},[a("q-toolbar",[a("q-btn",{attrs:{flat:"",dense:"",round:"","aria-label":"Menu",icon:"menu"},on:{click:function(t){e.leftDrawerOpen=!e.leftDrawerOpen}}}),a("q-toolbar-title",[e._v("\n        Laboratorio Clinico Integral\n      ")]),a("q-btn",{attrs:{flat:"",color:"white",icon:e.$q.fullscreen.isActive?"fullscreen_exit":"fullscreen"},on:{click:function(t){return e.$q.fullscreen.toggle()}}})],1)],1),a("q-drawer",{attrs:{width:220,"show-if-above":"","content-style":e.labBgColor,elevated:""},model:{value:e.leftDrawerOpen,callback:function(t){e.leftDrawerOpen=t},expression:"leftDrawerOpen"}},[a("q-list",{attrs:{dark:""}},[a("q-separator"),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(20),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("quotes",20)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-money-check-alt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Cotizaciones")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(1),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("services",1)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-book-open"}})],1),a("q-item-section",[a("q-item-label",[e._v("Servicios")])],1)],1),a("q-separator"),a("q-expansion-item",{attrs:{"expand-separator":"",icon:"fa fa-tags",label:"Catalogos"}},[a("q-list",{staticClass:"q-pl-md",attrs:{dark:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(3),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("analisis",3)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-flask"}})],1),a("q-item-section",[a("q-item-label",[e._v("Analisis")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(2),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("clientes",2)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-users"}})],1),a("q-item-section",[a("q-item-label",[e._v("Clientes")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(11),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("doctores",11)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-user-md"}})],1),a("q-item-section",[a("q-item-label",[e._v("Doctores")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(12),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("procedencias",12)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-map-marked-alt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Fuentes")])],1)],1)],1)],1),a("q-separator"),a("q-expansion-item",{attrs:{"expand-separator":"",icon:"fa fa-toolbox",label:"Almacen"}},[a("q-list",{staticClass:"q-pl-md",attrs:{dark:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(4),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("medidas",4)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-weight-hanging"}})],1),a("q-item-section",[a("q-item-label",[e._v("Medidas")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(5),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("categorias",5)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-th-large"}})],1),a("q-item-section",[a("q-item-label",[e._v("Categorias")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(6),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("proveedores",6)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-truck-loading"}})],1),a("q-item-section",[a("q-item-label",[e._v("Proveedores")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(7),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("productos",7)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fab fa-product-hunt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Productos")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(8),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("recepcion",8)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-plus-square"}})],1),a("q-item-section",[a("q-item-label",[e._v("Recepciones")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(9),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("existencias",9)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-th"}})],1),a("q-item-section",[a("q-item-label",[e._v("Existencias")])],1)],1)],1)],1),a("q-separator"),a("q-expansion-item",{attrs:{"expand-separator":"",icon:"fa fa-sliders-h",label:"Configuración"}},[a("q-list",{staticClass:"q-pl-md",attrs:{dark:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(10),"active-class":"text-orange-5"},on:{click:e.backUp}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-cloud-upload-alt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Backup...")])],1)],1)],1)],1)],1)],1),a("q-page-container",[a("router-view")],1),a("q-dialog",{attrs:{persistent:""},model:{value:e.modalBackUp,callback:function(t){e.modalBackUp=t},expression:"modalBackUp"}},[a("q-card",{staticStyle:{width:"500px"}},[a("q-card-section",{staticClass:"row items-center bg-green-5"},[a("q-avatar",{attrs:{icon:"fa fa-file","text-color":"white"}}),a("span",{staticClass:"q-ml-sm"},[e._v("Administrador de copias de seguridad")])],1),a("q-separator"),a("q-card-section",[a("q-circular-progress",{staticClass:"q-ma-md",attrs:{indeterminate:"",size:"40px",thickness:.2,color:"green","center-color":"grey-8","track-color":"transparent"}}),a("span",{staticClass:"q-ml-sm"},[e._v("Creando copia de seguridad....")])],1),a("q-separator")],1)],1)],1)},r=[],c=a("129a"),s={name:"Layout",data:function(){return{leftDrawerOpen:!1,modalBackUp:!1,labBgColor:{"background-color":"#082B61"},active:0}},methods:{backUp:function(){var e=this;this.modalBackUp=!0,this.$axios.get(c["a"]+"/backup").then((function(){e.modalBackUp=!1})).catch((function(){e.modalBackUp=!1}))},isActiveItem:function(e){return e===this.active},goToUrl:function(e,t){this.active=t,this.$router.push(e)}}},n=s,o=(a("e4a4"),a("2877")),l=a("4d5a"),m=a("e359"),p=a("65c6"),v=a("9c40"),q=a("6ac5"),d=a("9404"),u=a("1c1c"),f=a("eb85"),b=a("66e5"),g=a("4074"),k=a("0016"),w=a("0170"),x=a("3b73"),h=a("09e3"),U=a("24e8"),C=a("f09f"),I=a("a370"),A=a("cb32"),Q=a("58ea"),_=a("714f"),T=a("eebe"),N=a.n(T),B=Object(o["a"])(n,i,r,!1,null,"4c2deb36",null);t["default"]=B.exports;N()(B,"components",{QLayout:l["a"],QHeader:m["a"],QToolbar:p["a"],QBtn:v["a"],QToolbarTitle:q["a"],QDrawer:d["a"],QList:u["a"],QSeparator:f["a"],QItem:b["a"],QItemSection:g["a"],QIcon:k["a"],QItemLabel:w["a"],QExpansionItem:x["a"],QPageContainer:h["a"],QDialog:U["a"],QCard:C["a"],QCardSection:I["a"],QAvatar:A["a"],QCircularProgress:Q["a"]}),N()(B,"directives",{Ripple:_["a"]})},e11c:function(e,t,a){},e4a4:function(e,t,a){"use strict";var i=a("e11c"),r=a.n(i);r.a}}]);