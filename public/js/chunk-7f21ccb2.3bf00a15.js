(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7f21ccb2"],{"0759":function(t,n,e){"use strict";e.d(n,"a",(function(){return g}));var o=e("2b0e"),r=e("b42e"),i=e("c637"),a=e("a723"),c=e("992e"),s=e("d82f"),l=e("cf75"),u=e("fa73"),p=e("7386"),b=e("aa0d");function d(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);n&&(o=o.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,o)}return e}function f(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{};n%2?d(Object(e),!0).forEach((function(n){v(t,n,e[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):d(Object(e)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(e,n))}))}return t}function v(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}var m=function t(n,e){if(!n)return null;var o=(n.$options||{}).components,r=o[e];return r||t(n.$parent,e)},h=Object(l["d"])(Object(s["m"])(f(f({},Object(s["j"])(b["b"],["content","stacked"])),{},{icon:Object(l["c"])(a["u"]),stacked:Object(l["c"])(a["g"],!1)})),i["ib"]),g=o["default"].extend({name:i["ib"],functional:!0,props:h,render:function(t,n){var e=n.data,o=n.props,i=n.parent,a=Object(u["e"])(Object(u["h"])(o.icon||"")).replace(c["p"],"");return t(a&&m(i,"BIcon".concat(a))||p["a"],Object(r["a"])(e,{props:f(f({},o),{},{icon:null})}))}})},"223c":function(t,n,e){"use strict";var o=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"toastification"},[e("div",{staticClass:"d-flex align-items-start"},[e("b-avatar",{staticClass:"mr-75 flex-shrink-0",attrs:{variant:t.variant,size:"1.8rem"}},[e("feather-icon",{attrs:{icon:t.icon,size:"15"}})],1),e("div",{staticClass:"d-flex flex-grow-1"},[e("div",[t.title?e("h5",{staticClass:"mb-0 font-weight-bolder toastification-title",class:"text-"+t.variant,domProps:{textContent:t._s(t.title)}}):t._e(),t.text?e("small",{staticClass:"d-inline-block text-body",domProps:{textContent:t._s(t.text)}}):t._e()]),e("span",{staticClass:"cursor-pointer toastification-close-icon ml-auto ",on:{click:function(n){return t.$emit("close-toast")}}},[t.hideClose?t._e():e("feather-icon",{staticClass:"text-body",attrs:{icon:"XIcon"}})],1)])],1)])},r=[],i=e("e8a3"),a={components:{BAvatar:i["a"]},props:{variant:{type:String,default:"primary"},icon:{type:String,default:null},title:{type:String,default:null},text:{type:String,default:null},hideClose:{type:Boolean,default:!1}}},c=a,s=(e("b549"),e("2877")),l=Object(s["a"])(c,o,r,!1,null,"55dd3057",null);n["a"]=l.exports},"2e1f":function(t,n,e){"use strict";e.r(n);var o=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("b-row",[e("b-col",{attrs:{cols:"12"}},[e("toastification-variant"),e("toastification-position"),e("toastification-icon"),e("toastification-timeout")],1)],1)},r=[],i=e("a15b"),a=e("b28b"),c=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("b-card-code",{attrs:{title:"Variant"},scopedSlots:t._u([{key:"code",fn:function(){return[t._v("\n    "+t._s(t.codeVariant)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[e("span",[t._v("You can use ")]),e("code",[t._v("variant")]),e("span",[t._v(" prop for color variant.")])]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("primary")}}},[t._v("\n      Primary\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(186, 191, 199, 0.15)",expression:"'rgba(186, 191, 199, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-secondary"},on:{click:function(n){return t.showToast("secondary")}}},[t._v("\n      Secondary\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(40, 199, 111, 0.15)",expression:"'rgba(40, 199, 111, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-success"},on:{click:function(n){return t.showToast("success")}}},[t._v("\n      Success\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(234, 84, 85, 0.15)",expression:"'rgba(234, 84, 85, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-danger"},on:{click:function(n){return t.showToast("danger")}}},[t._v("\n      Danger\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 159, 67, 0.15)",expression:"'rgba(255, 159, 67, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-warning"},on:{click:function(n){return t.showToast("warning")}}},[t._v("\n      Warning\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(0, 207, 232, 0.15)",expression:"'rgba(0, 207, 232, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-info"},on:{click:function(n){return t.showToast("info")}}},[t._v("\n      Info\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(30, 30, 30, 0.15)",expression:"'rgba(30, 30, 30, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-dark"},on:{click:function(n){return t.showToast("dark")}}},[t._v("\n      Dark\n    ")])],1)],1)},s=[],l=e("1947"),u=e("d6e4"),p=e("541c"),b=e("e009"),d=e("223c"),f='\n<template>\n  <div class="demo-inline-spacing">\n    \x3c!-- primary trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(113, 102, 240, 0.15)\'"\n      variant="outline-primary"\n      @click="showToast(\'primary\')"\n    >\n      Primary\n    </b-button>\n\n    \x3c!-- secondary trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(186, 191, 199, 0.15)\'"\n      variant="outline-secondary"\n      @click="showToast(\'secondary\')"\n    >\n      Secondary\n    </b-button>\n\n    \x3c!-- success trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(40, 199, 111, 0.15)\'"\n      variant="outline-success"\n      @click="showToast(\'success\')"\n    >\n      Success\n    </b-button>\n\n    \x3c!-- danger trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(234, 84, 85, 0.15)\'"\n      variant="outline-danger"\n      @click="showToast(\'danger\')"\n    >\n      Danger\n    </b-button>\n\n    \x3c!-- warning trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(255, 159, 67, 0.15)\'"\n      variant="outline-warning"\n      @click="showToast(\'warning\')"\n    >\n      Warning\n    </b-button>\n\n    \x3c!-- info trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(0, 207, 232, 0.15)\'"\n      variant="outline-info"\n      @click="showToast(\'info\')"\n    >\n      Info\n    </b-button>\n\n    \x3c!-- dark trigger button --\x3e\n    <b-button\n      v-ripple.400="\'rgba(30, 30, 30, 0.15)\'"\n      variant="outline-dark"\n      @click="showToast(\'dark\')"\n    >\n      Dark\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport { BButton } from \'bootstrap-vue\'\nimport Ripple from \'vue-ripple-directive\'\nimport ToastificationContent from \'@core/components/toastification/ToastificationContent.vue\'\n\nexport default {\n  components: {\n    BButton,\n    // eslint-disable-next-line vue/no-unused-components\n    ToastificationContent,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n    showToast(variant) {\n      this.$toast({\n        component: ToastificationContent,\n        props: {\n          title: \'Notification\',\n          icon: \'BellIcon\',\n          text: \'👋 Chocolate oat cake jelly oat cake candy jelly beans pastry.\',\n          variant,\n        },\n      })\n    },\n  },\n}\n<\/script>\n',v="\n<template>\n  <div>\n    <h5 class=\"mb-0\">Top Positions</h5>\n    <div class=\"demo-inline-spacing\">\n\n      \x3c!-- Top right --\x3e\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"showToast('primary','top-right')\"\n      >\n        Top Right\n      </b-button>\n\n      \x3c!-- Top left --\x3e\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"showToast('secondary','top-left')\"\n      >\n        Top Left\n      </b-button>\n\n      \x3c!-- top center --\x3e\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"showToast('success','top-center')\"\n      >\n        Top Center\n      </b-button>\n    </div>\n\n    <h5 class=\"mt-2 mb-0\">\n      Bottom Positions\n    </h5>\n    <div class=\"demo-inline-spacing\">\n      \x3c!-- bottom right --\x3e\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"showToast('danger','bottom-right')\"\n      >\n        Bottom Right\n      </b-button>\n\n      \x3c!-- bottom left --\x3e\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"showToast('warning','bottom-left')\"\n      >\n        Bottom Left\n      </b-button>\n\n      \x3c!-- bottom center --\x3e\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"showToast('info','bottom-center')\"\n      >\n        Bottom Center\n      </b-button>\n    </div>\n  </div>\n</template>\n\n<script>\nimport { BButton, BCardText } from 'bootstrap-vue'\nimport ToastificationContent from '@core/components/toastification/ToastificationContent.vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n    BCardText,\n    // eslint-disable-next-line vue/no-unused-components\n    ToastificationContent,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n    showToast(variant, position) {\n      this.$toast({\n        component: ToastificationContent,\n        props: {\n          title: 'Notification',\n          icon: 'InfoIcon',\n          text: 'I do not think that word means what you think it means.',\n          variant,\n        },\n      },\n      {\n        position,\n      })\n    },\n  },\n}\n<\/script>\n",m="\n<template>\n  <div class=\"demo-inline-spacing\">\n\n    \x3c!-- default time trigger button --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('primary')\"\n    >\n      Time Default\n    </b-button>\n\n    \x3c!-- 4s delay trigger button --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('primary',4000)\"\n    >\n      Time 4s(4000)\n    </b-button>\n\n    \x3c!-- 8s delay trigger button --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('primary',8000)\"\n    >\n      Time 8s(8000)\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport { BButton} from 'bootstrap-vue'\nimport ToastificationContent from '@core/components/toastification/ToastificationContent.vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n    BCardText,\n    // eslint-disable-next-line vue/no-unused-components\n    ToastificationContent,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n    showToast(variant, timeout) {\n      this.$toast({\n        component: ToastificationContent,\n        props: {\n          title: 'Notification',\n          icon: 'BellIcon',\n          text: 'I do not think that word means what you think it means.',\n          variant,\n        },\n      },\n      {\n        timeout,\n      })\n    },\n  },\n}\n<\/script>\n",h="\n<template>\n  <div class=\"demo-inline-spacing\">\n    \x3c!-- mail icon --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('primary','MailIcon')\"\n    >\n      Icon Mail\n    </b-button>\n\n    \x3c!-- Inbox icon --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('secondary','InboxIcon')\"\n    >\n      Icon Inbox\n    </b-button>\n\n    \x3c!-- Check icon --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('success','CheckIcon')\"\n    >\n      Icon Check\n    </b-button>\n\n    \x3c!-- heart icon --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('danger','HeartIcon')\"\n    >\n      Icon Heart\n    </b-button>\n\n    \x3c!-- favorite icon --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('warning','StarIcon')\"\n    >\n      Icon Favorite\n    </b-button>\n\n    \x3c!-- slack icon --\x3e\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showToast('info','SlackIcon')\"\n    >\n      Icon Slack\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport { BButton } from 'bootstrap-vue'\nimport ToastificationContent from '@core/components/toastification/ToastificationContent.vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n    BCardCode,\n    // eslint-disable-next-line vue/no-unused-components\n    ToastificationContent,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n    showToast(variant, icon) {\n      this.$toast({\n        component: ToastificationContent,\n        props: {\n          title: 'Notification',\n          icon,\n          text: 'I do not think that word means what you think it means.',\n          variant,\n        },\n      })\n    },\n  },\n}\n<\/script>\n",g={components:{BButton:l["a"],BCardCode:p["a"],BCardText:u["a"],ToastificationContent:d["a"]},directives:{Ripple:b["a"]},data:function(){return{codeVariant:f}},methods:{showToast:function(t){this.$toast({component:d["a"],props:{title:"Notification",icon:"BellIcon",text:"👋 Chocolate oat cake jelly oat cake candy jelly beans pastry.",variant:t}})}}},O=g,y=e("2877"),j=Object(y["a"])(O,c,s,!1,null,null,null),w=j.exports,x=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("b-card-code",{attrs:{title:"Position"},scopedSlots:t._u([{key:"code",fn:function(){return[t._v("\n    "+t._s(t.codePosition)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[e("span",[t._v("Position of the toast on the screen. Can be any of ")]),e("code",[t._v("top-right")]),e("span",[t._v(" , ")]),e("code",[t._v("top-center")]),e("span",[t._v(" , ")]),e("code",[t._v("top-left")]),e("span",[t._v(" , ")]),e("code",[t._v("bottom-right")]),e("span",[t._v(" , ")]),e("code",[t._v("bottom-center")]),e("span",[t._v(" , ")]),e("code",[t._v("bottom-left")]),t._v(".\n  ")]),e("h5",{staticClass:"mb-0"},[t._v("\n    Top Positions\n  ")]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("primary","top-right")}}},[t._v("\n      Top Right\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("secondary","top-left")}}},[t._v("\n      Top Left\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("success","top-center")}}},[t._v("\n      Top Center\n    ")])],1),e("h5",{staticClass:"mt-2 mb-0"},[t._v("\n    Bottom Positions\n  ")]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("danger","bottom-right")}}},[t._v("\n      Bottom Right\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("warning","bottom-left")}}},[t._v("\n      Bottom Left\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("info","bottom-center")}}},[t._v("\n      Bottom Center\n    ")])],1)],1)},T=[],k={components:{BButton:l["a"],BCardCode:p["a"],BCardText:u["a"],ToastificationContent:d["a"]},directives:{Ripple:b["a"]},data:function(){return{codePosition:v}},methods:{showToast:function(t,n){this.$toast({component:d["a"],props:{title:"Notification",icon:"InfoIcon",text:"I do not think that word means what you think it means.",variant:t}},{position:n})}}},C=k,_=Object(y["a"])(C,x,T,!1,null,null,null),B=_.exports,I=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("b-card-code",{attrs:{title:"Icon"},scopedSlots:t._u([{key:"code",fn:function(){return[t._v("\n    "+t._s(t.codeIcon)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[e("span",[t._v("Custom icon class to be used. Use ")]),e("code",[t._v("icon")]),e("span",[t._v(" prop to set icon.")])]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("primary","MailIcon")}}},[t._v("\n      Icon Mail\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("secondary","InboxIcon")}}},[t._v("\n      Icon Inbox\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("success","CheckIcon")}}},[t._v("\n      Icon Check\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("danger","HeartIcon")}}},[t._v("\n      Icon Heart\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("warning","StarIcon")}}},[t._v("\n      Icon Favorite\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("info","SlackIcon")}}},[t._v("\n      Icon Slack\n    ")])],1)],1)},S=[],P={components:{BButton:l["a"],BCardCode:p["a"],BCardText:u["a"],ToastificationContent:d["a"]},directives:{Ripple:b["a"]},data:function(){return{codeIcon:h}},methods:{showToast:function(t,n){this.$toast({component:d["a"],props:{title:"Notification",icon:n,text:"I do not think that word means what you think it means.",variant:t}})}}},N=P,D=Object(y["a"])(N,I,S,!1,null,null,null),R=D.exports,$=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("b-card-code",{attrs:{title:"Timeout"},scopedSlots:t._u([{key:"code",fn:function(){return[t._v("\n    "+t._s(t.codeTime)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[t._v("\n    How many milliseconds for the toast to be auto dismissed, or false to disable.\n  ")]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("primary")}}},[t._v("\n      Time Default\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("primary",4e3)}}},[t._v("\n      Time 4s(4000)\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:function(n){return t.showToast("primary",8e3)}}},[t._v("\n      Time 8s(8000)\n    ")])],1)],1)},E=[],z={components:{BButton:l["a"],BCardCode:p["a"],BCardText:u["a"],ToastificationContent:d["a"]},directives:{Ripple:b["a"]},data:function(){return{codeTime:m}},methods:{showToast:function(t,n){this.$toast({component:d["a"],props:{title:"Notification",icon:"BellIcon",text:"I do not think that word means what you think it means.",variant:t}},{timeout:n})}}},V=z,L=Object(y["a"])(V,$,E,!1,null,null,null),G=L.exports,H={components:{BRow:i["a"],BCol:a["a"],ToastificationVariant:w,ToastificationPosition:B,ToastificationIcon:R,ToastificationTimeout:G}},A=H,M=Object(y["a"])(A,o,r,!1,null,null,null);n["default"]=M.exports},"8d81":function(t,n,e){},a15b:function(t,n,e){"use strict";e.d(n,"a",(function(){return j}));var o=e("b42e"),r=e("c637"),i=e("a723"),a=e("2326"),c=e("228e"),s=e("6c06"),l=e("b508"),u=e("d82f"),p=e("cf75"),b=e("fa73");function d(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);n&&(o=o.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,o)}return e}function f(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{};n%2?d(Object(e),!0).forEach((function(n){v(t,n,e[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):d(Object(e)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(e,n))}))}return t}function v(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}var m=["start","end","center"],h=Object(l["a"])((function(t,n){return n=Object(b["h"])(Object(b["g"])(n)),n?Object(b["c"])(["row-cols",t,n].filter(s["a"]).join("-")):null})),g=Object(l["a"])((function(t){return Object(b["c"])(t.replace("cols",""))})),O=[],y=function(){var t=Object(c["b"])().reduce((function(t,n){return t[Object(p["g"])(n,"cols")]=Object(p["c"])(i["p"]),t}),Object(u["c"])(null));return O=Object(u["h"])(t),Object(p["d"])(Object(u["m"])(f(f({},t),{},{alignContent:Object(p["c"])(i["u"],null,(function(t){return Object(a["a"])(Object(a["b"])(m,"between","around","stretch"),t)})),alignH:Object(p["c"])(i["u"],null,(function(t){return Object(a["a"])(Object(a["b"])(m,"between","around"),t)})),alignV:Object(p["c"])(i["u"],null,(function(t){return Object(a["a"])(Object(a["b"])(m,"baseline","stretch"),t)})),noGutters:Object(p["c"])(i["g"],!1),tag:Object(p["c"])(i["u"],"div")})),r["Ob"])},j={name:r["Ob"],functional:!0,get props(){return delete this.props,this.props=y(),this.props},render:function(t,n){var e,r=n.props,i=n.data,a=n.children,c=r.alignV,s=r.alignH,l=r.alignContent,u=[];return O.forEach((function(t){var n=h(g(t),r[t]);n&&u.push(n)})),u.push((e={"no-gutters":r.noGutters},v(e,"align-items-".concat(c),c),v(e,"justify-content-".concat(s),s),v(e,"align-content-".concat(l),l),e)),t(r.tag,Object(o["a"])(i,{staticClass:"row",class:u}),a)}}},b28b:function(t,n,e){"use strict";e.d(n,"a",(function(){return x}));var o=e("b42e"),r=e("c637"),i=e("a723"),a=e("992e"),c=e("2326"),s=e("228e"),l=e("6c06"),u=e("7b1e"),p=e("b508"),b=e("d82f"),d=e("cf75"),f=e("fa73");function v(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);n&&(o=o.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,o)}return e}function m(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{};n%2?v(Object(e),!0).forEach((function(n){h(t,n,e[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):v(Object(e)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(e,n))}))}return t}function h(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}var g=["auto","start","end","center","baseline","stretch"],O=function(t,n,e){var o=t;if(!Object(u["p"])(e)&&!1!==e)return n&&(o+="-".concat(n)),"col"!==t||""!==e&&!0!==e?(o+="-".concat(e),Object(f["c"])(o)):Object(f["c"])(o)},y=Object(p["a"])(O),j=Object(b["c"])(null),w=function(){var t=Object(s["b"])().filter(l["a"]),n=t.reduce((function(t,n){return t[n]=Object(d["c"])(i["i"]),t}),Object(b["c"])(null)),e=t.reduce((function(t,n){return t[Object(d["g"])(n,"offset")]=Object(d["c"])(i["p"]),t}),Object(b["c"])(null)),o=t.reduce((function(t,n){return t[Object(d["g"])(n,"order")]=Object(d["c"])(i["p"]),t}),Object(b["c"])(null));return j=Object(b["a"])(Object(b["c"])(null),{col:Object(b["h"])(n),offset:Object(b["h"])(e),order:Object(b["h"])(o)}),Object(d["d"])(Object(b["m"])(m(m(m(m({},n),e),o),{},{alignSelf:Object(d["c"])(i["u"],null,(function(t){return Object(c["a"])(g,t)})),col:Object(d["c"])(i["g"],!1),cols:Object(d["c"])(i["p"]),offset:Object(d["c"])(i["p"]),order:Object(d["c"])(i["p"]),tag:Object(d["c"])(i["u"],"div")})),r["y"])},x={name:r["y"],functional:!0,get props(){return delete this.props,this.props=w()},render:function(t,n){var e,r=n.props,i=n.data,c=n.children,s=r.cols,l=r.offset,u=r.order,p=r.alignSelf,b=[];for(var d in j)for(var f=j[d],v=0;v<f.length;v++){var m=y(d,f[v].replace(d,""),r[f[v]]);m&&b.push(m)}var g=b.some((function(t){return a["e"].test(t)}));return b.push((e={col:r.col||!g&&!s},h(e,"col-".concat(s),s),h(e,"offset-".concat(l),l),h(e,"order-".concat(u),u),h(e,"align-self-".concat(p),p),e)),t(r.tag,Object(o["a"])(i,{class:b}),c)}}},b549:function(t,n,e){"use strict";e("8d81")},d6e4:function(t,n,e){"use strict";e.d(n,"a",(function(){return l}));var o=e("2b0e"),r=e("b42e"),i=e("c637"),a=e("a723"),c=e("cf75"),s=Object(c["d"])({textTag:Object(c["c"])(a["u"],"p")},i["u"]),l=o["default"].extend({name:i["u"],functional:!0,props:s,render:function(t,n){var e=n.props,o=n.data,i=n.children;return t(e.textTag,Object(r["a"])(o,{staticClass:"card-text"}),i)}})},e8a3:function(t,n,e){"use strict";e.d(n,"b",(function(){return k})),e.d(n,"a",(function(){return B}));var o=e("2b0e"),r=e("c637"),i=e("0056"),a=e("a723"),c=e("9b76"),s=e("7b1e"),l=e("3a58"),u=e("d82f"),p=e("cf75"),b=e("4a38"),d=e("8c18"),f=e("0759"),v=e("7386"),m=e("1947"),h=e("aa59");function g(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);n&&(o=o.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,o)}return e}function O(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{};n%2?g(Object(e),!0).forEach((function(n){y(t,n,e[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):g(Object(e)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(e,n))}))}return t}function y(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}var j="b-avatar",w=["sm",null,"lg"],x=.4,T=.7*x,k=function(t){return t=Object(s["n"])(t)&&Object(s["i"])(t)?Object(l["b"])(t,0):t,Object(s["h"])(t)?"".concat(t,"px"):t||null},C=Object(u["j"])(h["b"],["active","event","routerTag"]),_=Object(p["d"])(Object(u["m"])(O(O({},C),{},{alt:Object(p["c"])(a["u"],"avatar"),ariaLabel:Object(p["c"])(a["u"]),badge:Object(p["c"])(a["j"],!1),badgeLeft:Object(p["c"])(a["g"],!1),badgeOffset:Object(p["c"])(a["u"]),badgeTop:Object(p["c"])(a["g"],!1),badgeVariant:Object(p["c"])(a["u"],"primary"),button:Object(p["c"])(a["g"],!1),buttonType:Object(p["c"])(a["u"],"button"),icon:Object(p["c"])(a["u"]),rounded:Object(p["c"])(a["j"],!1),size:Object(p["c"])(a["p"]),square:Object(p["c"])(a["g"],!1),src:Object(p["c"])(a["u"]),text:Object(p["c"])(a["u"]),variant:Object(p["c"])(a["u"],"secondary")})),r["c"]),B=o["default"].extend({name:r["c"],mixins:[d["a"]],inject:{bvAvatarGroup:{default:null}},props:_,data:function(){return{localSrc:this.src||null}},computed:{computedSize:function(){var t=this.bvAvatarGroup;return k(t?t.size:this.size)},computedVariant:function(){var t=this.bvAvatarGroup;return t&&t.variant?t.variant:this.variant},computedRounded:function(){var t=this.bvAvatarGroup,n=!(!t||!t.square)||this.square,e=t&&t.rounded?t.rounded:this.rounded;return n?"0":""===e||(e||"circle")},fontStyle:function(){var t=this.computedSize,n=-1===w.indexOf(t)?"calc(".concat(t," * ").concat(x,")"):null;return n?{fontSize:n}:{}},marginStyle:function(){var t=this.computedSize,n=this.bvAvatarGroup,e=n?n.overlapScale:0,o=t&&e?"calc(".concat(t," * -").concat(e,")"):null;return o?{marginLeft:o,marginRight:o}:{}},badgeStyle:function(){var t=this.computedSize,n=this.badgeTop,e=this.badgeLeft,o=this.badgeOffset,r=o||"0px";return{fontSize:-1===w.indexOf(t)?"calc(".concat(t," * ").concat(T," )"):null,top:n?r:null,bottom:n?null:r,left:e?r:null,right:e?null:r}}},watch:{src:function(t,n){t!==n&&(this.localSrc=t||null)}},methods:{onImgError:function(t){this.localSrc=null,this.$emit(i["x"],t)},onClick:function(t){this.$emit(i["f"],t)}},render:function(t){var n,e=this.computedVariant,o=this.disabled,r=this.computedRounded,i=this.icon,a=this.localSrc,s=this.text,l=this.fontStyle,u=this.marginStyle,d=this.computedSize,g=this.button,x=this.buttonType,T=this.badge,k=this.badgeVariant,_=this.badgeStyle,B=!g&&Object(b["d"])(this),I=g?m["a"]:B?h["a"]:"span",S=this.alt,P=this.ariaLabel||null,N=null;this.hasNormalizedSlot()?N=t("span",{staticClass:"b-avatar-custom"},[this.normalizeSlot()]):a?(N=t("img",{style:e?{}:{width:"100%",height:"100%"},attrs:{src:a,alt:S},on:{error:this.onImgError}}),N=t("span",{staticClass:"b-avatar-img"},[N])):N=i?t(f["a"],{props:{icon:i},attrs:{"aria-hidden":"true",alt:S}}):s?t("span",{staticClass:"b-avatar-text",style:l},[t("span",s)]):t(v["m"],{attrs:{"aria-hidden":"true",alt:S}});var D=t(),R=this.hasNormalizedSlot(c["d"]);if(T||""===T||R){var $=!0===T?"":T;D=t("span",{staticClass:"b-avatar-badge",class:y({},"badge-".concat(k),k),style:_},[R?this.normalizeSlot(c["d"]):$])}var E={staticClass:j,class:(n={},y(n,"".concat(j,"-").concat(d),d&&-1!==w.indexOf(d)),y(n,"badge-".concat(e),!g&&e),y(n,"rounded",!0===r),y(n,"rounded-".concat(r),r&&!0!==r),y(n,"disabled",o),n),style:O(O({},u),{},{width:d,height:d}),attrs:{"aria-label":P||null},props:g?{variant:e,disabled:o,type:x}:B?Object(p["e"])(C,this):{},on:g||B?{click:this.onClick}:{}};return t(I,E,[N,D])}})}}]);
//# sourceMappingURL=chunk-7f21ccb2.3bf00a15.js.map