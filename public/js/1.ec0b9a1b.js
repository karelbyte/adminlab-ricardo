(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[1],{"5ccd":function(e,t,a){},"9edc":function(e,t,a){"use strict";var i=a("5ccd"),r=a.n(i);r.a},a9c3:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-layout",{attrs:{view:"hHh lpR fFf"}},[a("q-header",{staticClass:"bg-blue-10",attrs:{elevated:""}},[a("q-toolbar",[a("q-btn",{attrs:{flat:"",dense:"",round:"","aria-label":"Menu",icon:"menu"},on:{click:function(t){e.leftDrawerOpen=!e.leftDrawerOpen}}}),a("q-toolbar-title",[e._v("\n        Laboratorio Clinico Integral\n      ")]),a("q-btn",{attrs:{flat:"",color:"white",icon:e.$q.fullscreen.isActive?"fullscreen_exit":"fullscreen"},on:{click:function(t){return e.$q.fullscreen.toggle()}}})],1)],1),a("q-drawer",{attrs:{width:220,"show-if-above":"","content-style":e.labBgColor,elevated:""},model:{value:e.leftDrawerOpen,callback:function(t){e.leftDrawerOpen=t},expression:"leftDrawerOpen"}},[a("q-list",{attrs:{dark:""}},[a("q-separator"),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(20),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("services",20)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-money-check-alt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Cotizaciones")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(1),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("services",1)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-book-open"}})],1),a("q-item-section",[a("q-item-label",[e._v("Servicios")])],1)],1),a("q-separator"),a("q-expansion-item",{attrs:{"expand-separator":"",icon:"fa fa-tags",label:"Catalogos"}},[a("q-list",{staticClass:"q-pl-md",attrs:{dark:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(3),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("analisis",3)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-flask"}})],1),a("q-item-section",[a("q-item-label",[e._v("Analisis")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(2),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("clientes",2)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-users"}})],1),a("q-item-section",[a("q-item-label",[e._v("Clientes")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(11),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("doctores",11)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-user-md"}})],1),a("q-item-section",[a("q-item-label",[e._v("Doctores")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(12),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("procedencias",12)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-map-marked-alt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Fuentes")])],1)],1)],1)],1),a("q-separator"),a("q-expansion-item",{attrs:{"expand-separator":"",icon:"fa fa-toolbox",label:"Almacen"}},[a("q-list",{staticClass:"q-pl-md",attrs:{dark:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(4),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("medidas",4)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-weight-hanging"}})],1),a("q-item-section",[a("q-item-label",[e._v("Medidas")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(5),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("categorias",5)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-th-large"}})],1),a("q-item-section",[a("q-item-label",[e._v("Categorias")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(6),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("proveedores",6)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-truck-loading"}})],1),a("q-item-section",[a("q-item-label",[e._v("Proveedores")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(7),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("productos",7)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fab fa-product-hunt"}})],1),a("q-item-section",[a("q-item-label",[e._v("Productos")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(8),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("recepcion",8)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-plus-square"}})],1),a("q-item-section",[a("q-item-label",[e._v("Recepciones")])],1)],1),a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(9),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("existencias",9)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-th"}})],1),a("q-item-section",[a("q-item-label",[e._v("Existencias")])],1)],1)],1)],1),a("q-separator"),a("q-expansion-item",{attrs:{"expand-separator":"",icon:"fa fa-sliders-h",label:"Configuración"}},[a("q-list",{staticClass:"q-pl-md",attrs:{dark:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{clickable:"",active:e.isActiveItem(10),"active-class":"text-orange-5"},on:{click:function(t){return e.goToUrl("test",10)}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"fa fa-flask"}})],1),a("q-item-section",[a("q-item-label",[e._v("Test")])],1)],1)],1)],1)],1)],1),a("q-page-container",[a("router-view")],1)],1)},r=[],c={name:"Layout",data:function(){return{leftDrawerOpen:!1,labBgColor:{"background-color":"#082B61"},active:0}},methods:{isActiveItem:function(e){return e===this.active},goToUrl:function(e,t){this.active=t,this.$router.push(e)}}},n=c,s=(a("9edc"),a("2877")),o=a("4d5a"),l=a("e359"),m=a("65c6"),v=a("9c40"),p=a("6ac5"),q=a("9404"),f=a("1c1c"),u=a("eb85"),d=a("66e5"),b=a("4074"),g=a("0016"),k=a("0170"),w=a("3b73"),x=a("09e3"),h=a("714f"),I=a("eebe"),T=a.n(I),A=Object(s["a"])(n,i,r,!1,null,"e6726bd6",null);t["default"]=A.exports;T()(A,"components",{QLayout:o["a"],QHeader:l["a"],QToolbar:m["a"],QBtn:v["a"],QToolbarTitle:p["a"],QDrawer:q["a"],QList:f["a"],QSeparator:u["a"],QItem:d["a"],QItemSection:b["a"],QIcon:g["a"],QItemLabel:k["a"],QExpansionItem:w["a"],QPageContainer:x["a"]}),T()(A,"directives",{Ripple:h["a"]})}}]);