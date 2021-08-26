(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-843f85f2"],{"1e07":function(n,t,e){},"77ed":function(n,t,e){},8040:function(n,t,e){"use strict";e.r(t);var i=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-row",[e("b-col",{attrs:{cols:"12"}},[e("sweet-alert-basic"),e("sweet-alert-position"),e("sweet-alert-animation"),e("sweet-alert-types"),e("sweet-alert-option"),e("sweet-alert-confirm-option")],1)],1)},o=[],r=e("a15b"),a=e("b28b"),s=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-card-code",{attrs:{title:"Basic Examples"},scopedSlots:n._u([{key:"code",fn:function(){return[n._v("\n    "+n._s(n.codeBasic)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[n._v("\n    SweetAlert automatically centers itself on the page and looks great no matter if you're using a desktop computer, mobile or tablet. It's even highly customizable, as you can see below!\n  ")]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.showAlert}},[n._v("\n      Basic\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.withTitle}},[n._v("\n      With Title\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.withFooter}},[n._v("\n      With Footer\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.withHtml}},[n._v("\n      HTML\n    ")])],1)],1)},l=[],c=e("541c"),u=e("d6e4"),b=e("1947"),p=e("e009"),m="\n<template>\n  \x3c!-- trigger buttons --\x3e\n  <div class=\"demo-inline-spacing\">\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"showAlert\"\n    >\n      Basic\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"withTitle\"\n    >\n      With Title\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"withFooter\"\n    >\n      With Footer\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"withHtml\"\n    >\n      HTML\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport {  BButton } from 'bootstrap-vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n\n    // basic\n    showAlert() {\n      this.$swal({\n        title: 'Any fool can use a computer',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // whith title\n    withTitle() {\n      this.$swal({\n        title: 'The Internet?,',\n        text: 'That thing is still around?',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // with footer\n    withFooter() {\n      this.$swal({\n        icon: 'error',\n        title: 'Oops...',\n        text: 'Something went wrong!',\n        footer: '<a href=\"javascript:void(0)\">Why do I have this issue?</a>',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // with html\n    withHtml() {\n      this.$swal({\n        title: '<span class=\"font-weight-bolder\">HTML <u>example</u></span>',\n        icon: 'info',\n        html:\n          'You can use <span class=\"font-weight-bolder\">bold text</span>, '\n          + '<a href=\"https://pixinvent.com/\" target=\"_blank\">links</a> '\n          + 'and other HTML tags',\n        showCloseButton: true,\n        showCancelButton: true,\n        focusConfirm: false,\n        confirmButtonText: 'Great!',\n        confirmButtonAriaLabel: 'Thumbs up, great!',\n        cancelButtonAriaLabel: 'Thumbs down',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n          cancelButton: 'btn btn-outline-danger ml-1',\n        },\n        buttonsStyling: false,\n      })\n    },\n  },\n}\n<\/script>\n",f="\n<template>\n  \x3c!-- trigger button --\x3e\n  <div class=\"demo-inline-spacing\">\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"topStart\"\n    >\n      Top Start\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"topEnd\"\n    >\n      Top End\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"bottomStart\"\n    >\n      Bottom Starts\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"bottomEnd\"\n    >\n      Bottom End\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport { BButton } from 'bootstrap-vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n\n    // top start\n    topStart() {\n      this.$swal({\n        position: 'top-start',\n        icon: 'success',\n        title: 'Your work has been saved',\n        showConfirmButton: false,\n        timer: 1500,\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n    // top end\n    topEnd() {\n      this.$swal({\n        position: 'top-end',\n        icon: 'success',\n        title: 'Your work has been saved',\n        showConfirmButton: false,\n        timer: 1500,\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n    // bottom start\n    bottomStart() {\n      this.$swal({\n        position: 'bottom-start',\n        icon: 'success',\n        title: 'Your work has been saved',\n        showConfirmButton: false,\n        timer: 1500,\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // bottom end\n    bottomEnd() {\n      this.$swal({\n        position: 'bottom-end',\n        icon: 'success',\n        title: 'Your work has been saved',\n        showConfirmButton: false,\n        timer: 1500,\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n  },\n}\n<\/script>\n",d="\n<template>\n  \x3c!-- trigger button --\x3e\n  <div class=\"demo-inline-spacing\">\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"bounceIn\"\n    >\n      Bounce In\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"fadeIn\"\n    >\n      Fade In\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"flipIn\"\n    >\n      Flip In\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"tada\"\n    >\n      Tada\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"shake\"\n    >\n      Shake\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport {  BButton } from 'bootstrap-vue'\nimport Ripple from 'vue-ripple-directive'\nimport 'animate.css'\n\nexport default {\n  components: {\n    BCardCode,\n    BButton,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n\n    // bounce in method\n    bounceIn() {\n      this.$swal({\n        title: 'Bounce In Animation',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        showClass: {\n          popup: 'animate__animated animate__bounceIn',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // fade in\n    fadeIn() {\n      this.$swal({\n        title: 'Fade In Animation',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        showClass: {\n          popup: 'animate__animated animate__fadeIn',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // flip in\n    flipIn() {\n      this.$swal({\n        title: 'Flip In Animation',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        showClass: {\n          popup: 'animate__animated animate__flipInX',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // tada\n    tada() {\n      this.$swal({\n        title: 'Tada Animation',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        showClass: {\n          popup: 'animate__animated animate__tada',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // shake\n    shake() {\n      this.$swal({\n        title: 'Shake Animation',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        showClass: {\n          popup: 'animate__animated animate__shakeX',\n        },\n        buttonsStyling: false,\n      })\n    },\n  },\n}\n<\/script>\n",v="\n<template>\n  \x3c!-- trigger button --\x3e\n  <div class=\"demo-inline-spacing\">\n    <b-button\n      v-ripple.400=\"'rgba(40, 199, 111, 0.15)'\"\n      variant=\"outline-success\"\n      @click=\"success\"\n    >\n      Success\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(234, 84, 85, 0.15)'\"\n      variant=\"outline-danger\"\n      @click=\"error\"\n    >\n      Error\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(255, 159, 67, 0.15)'\"\n      variant=\"outline-warning\"\n      @click=\"warning\"\n    >\n      Warning\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(0, 207, 232, 0.15)'\"\n      variant=\"outline-info\"\n      @click=\"info\"\n    >\n      Info\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport {  BButton } from 'bootstrap-vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BCardCode,\n    BButton,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n\n    // success\n    success() {\n      this.$swal({\n        title: 'Good job!',\n        text: 'You clicked the button!',\n        icon: 'success',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // error\n    error() {\n      this.$swal({\n        title: 'Error!',\n        text: ' You clicked the button!',\n        icon: 'error',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // warning\n    warning() {\n      this.$swal({\n        title: 'Warning!',\n        text: ' You clicked the button!',\n        icon: 'warning',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // info\n    info() {\n      this.$swal({\n        title: 'Info!',\n        text: 'You clicked the button!',\n        icon: 'info',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n  },\n}\n<\/script>\n",h="\n<template>\n  \x3c!-- trigger button --\x3e\n  <div class=\"demo-inline-spacing\">\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"customImage\"\n    >\n      Custom Image\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"autoClose\"\n    >\n      Auto Close\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"clickOutside\"\n    >\n      Click Outside\n    </b-button>\n    <b-button\n      v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n      variant=\"outline-primary\"\n      @click=\"ajax\"\n    >\n      Ajax\n    </b-button>\n  </div>\n</template>\n\n<script>\nimport { BButton } from 'bootstrap-vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n  },\n  directives: {\n    Ripple,\n  },\n  data() {\n    return {\n      timerInterval: null,\n    }\n  },\n  methods: {\n\n    // custom image\n    customImage() {\n      this.$swal({\n        title: 'Sweet!',\n        text: 'Modal with a custom image.',\n        // eslint-disable-next-line global-require\n        imageUrl: require('@/assets/images/slider/04.jpg'),\n        imageWidth: 400,\n        imageHeight: 200,\n        imageAlt: 'Custom image',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // auto close\n    autoClose() {\n      this.$swal({\n        title: 'Auto close alert!',\n        html: 'I will close in <strong>3</strong> seconds.',\n        timer: 3000,\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // click out side\n    clickOutside() {\n      this.$swal({\n        title: 'Click outside to close!',\n        text: 'This is a cool message!',\n        allowOutsideClick: true,\n        customClass: {\n          confirmButton: 'btn btn-primary',\n        },\n        buttonsStyling: false,\n      })\n    },\n\n    // ajax\n    ajax() {\n      this.$swal({\n        title: 'Search for a user',\n        input: 'text',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n          cancelButton: 'btn btn-outline-danger ml-1',\n        },\n        buttonsStyling: false,\n        inputAttributes: {\n          autocapitalize: 'off',\n        },\n        showCancelButton: true,\n        confirmButtonText: 'Look up',\n        showLoaderOnConfirm: true,\n        preConfirm(login) {\n          if (!login) return null\n          return fetch(`//api.github.com/users/${login}`)\n            .then(response => {\n              if (!response.ok) {\n                throw new Error(response.statusText)\n              }\n              return response.json()\n            })\n            .catch(error => {\n              this.$swal.showValidationMessage(`Request failed:  ${error}`)\n            })\n        },\n      }).then(result => {\n        if (result.value) {\n          this.$swal({\n            title: `${result.value.login}'s avatar`,\n            imageUrl: result.value.avatar_url,\n            customClass: { confirmButton: 'btn btn-primary' },\n          })\n        }\n      })\n    },\n  },\n}\n<\/script>\n",g="\n<template>\n  \x3c!-- trigger buttons --\x3e\n  <div class=\"demo-inline-spacing\">\n    <div>\n      <h5>Confirm Button Text</h5>\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"confirmText\"\n      >\n        Confirm Text\n      </b-button>\n    </div>\n    <div>\n      <h5>Confirm Button Text</h5>\n      <b-button\n        v-ripple.400=\"'rgba(113, 102, 240, 0.15)'\"\n        variant=\"outline-primary\"\n        @click=\"confirmButtonColor\"\n      >\n        Confirm Button Color\n      </b-button>\n    </div>\n  </div>\n</template>\n\n<script>\nimport { BButton } from 'bootstrap-vue'\nimport Ripple from 'vue-ripple-directive'\n\nexport default {\n  components: {\n    BButton,\n  },\n  directives: {\n    Ripple,\n  },\n  methods: {\n    // confirm texrt\n    confirmText() {\n      this.$swal({\n        title: 'Are you sure?',\n        text: \"You won't be able to revert this!\",\n        icon: 'warning',\n        showCancelButton: true,\n        confirmButtonText: 'Yes, delete it!',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n          cancelButton: 'btn btn-outline-danger ml-1',\n        },\n        buttonsStyling: false,\n      }).then(result => {\n        if (result.value) {\n          this.$swal({\n            icon: 'success',\n            title: 'Deleted!',\n            text: 'Your file has been deleted.',\n            customClass: {\n              confirmButton: 'btn btn-success',\n            },\n          })\n        }\n      })\n    },\n\n    // comfirm button color\n    confirmButtonColor() {\n      this.$swal({\n        title: 'Are you sure?',\n        text: \"You won't be able to revert this!\",\n        icon: 'warning',\n        showCancelButton: true,\n        confirmButtonText: 'Yes, delete it!',\n        customClass: {\n          confirmButton: 'btn btn-primary',\n          cancelButton: 'btn btn-outline-danger ml-1',\n        },\n        buttonsStyling: false,\n      }).then(result => {\n        if (result.value) {\n          this.$swal({\n            icon: 'success',\n            title: 'Deleted!',\n            text: 'Your file has been deleted.',\n            customClass: {\n              confirmButton: 'btn btn-success',\n            },\n          })\n        } else if (result.dismiss === 'cancel') {\n          this.$swal({\n            title: 'Cancelled',\n            text: 'Your imaginary file is safe :)',\n            icon: 'error',\n            customClass: {\n              confirmButton: 'btn btn-success',\n            },\n          })\n        }\n      })\n    },\n  },\n}\n<\/script>\n",w={components:{BCardCode:c["a"],BCardText:u["a"],BButton:b["a"]},directives:{Ripple:p["a"]},data:function(){return{codeBasic:m}},methods:{showAlert:function(){this.$swal({title:"Any fool can use a computer",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},withTitle:function(){this.$swal({title:"The Internet?,",text:"That thing is still around?",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},withFooter:function(){this.$swal({icon:"error",title:"Oops...",text:"Something went wrong!",footer:'<a href="javascript:void(0)">Why do I have this issue?</a>',customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},withHtml:function(){this.$swal({title:'<span class="font-weight-bolder">HTML <u>example</u></span>',icon:"info",html:'You can use <span class="font-weight-bolder">bold text</span>, <a href="https://pixinvent.com/" target="_blank">links</a> and other HTML tags',showCloseButton:!0,showCancelButton:!0,focusConfirm:!1,confirmButtonText:"Great!",confirmButtonAriaLabel:"Thumbs up, great!",cancelButtonAriaLabel:"Thumbs down",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-outline-danger ml-1"},buttonsStyling:!1})}}},y=w,B=e("2877"),C=Object(B["a"])(y,s,l,!1,null,null,null),x=C.exports,O=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-card-code",{attrs:{title:"Position"},scopedSlots:n._u([{key:"code",fn:function(){return[n._v("\n    "+n._s(n.codePosition)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[n._v("\n    You can specify position of your alert with "),e("code",[n._v("{position : 'top-start' | 'top-end' | 'bottom-start' | 'bottom-end' }")]),n._v(" in js.\n  ")]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.topStart}},[n._v("\n      Top Start\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.topEnd}},[n._v("\n      Top End\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.bottomStart}},[n._v("\n      Bottom Starts\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.bottomEnd}},[n._v("\n      Bottom End\n    ")])],1)],1)},_=[],j={components:{BCardCode:c["a"],BCardText:u["a"],BButton:b["a"]},directives:{Ripple:p["a"]},data:function(){return{codePosition:f}},methods:{topStart:function(){this.$swal({position:"top-start",icon:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500,customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},topEnd:function(){this.$swal({position:"top-end",icon:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500,customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},bottomStart:function(){this.$swal({position:"bottom-start",icon:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500,customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},bottomEnd:function(){this.$swal({position:"bottom-end",icon:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500,customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})}}},k=j,S=Object(B["a"])(k,O,_,!1,null,null,null),$=S.exports,T=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-card-code",{attrs:{title:"Animations"},scopedSlots:n._u([{key:"code",fn:function(){return[n._v("\n    "+n._s(n.codeAnimation)+"\n  ")]},proxy:!0}])},[e("b-card-text",{staticClass:"mb-0"},[e("span",[n._v("Use ")]),e("code",[n._v("popup")]),e("span",[n._v(" inside ")]),e("code",[n._v("showClass")]),e("span",[n._v(" parameter to add animation to your alert.")])]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.bounceIn}},[n._v("\n      Bounce In\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.fadeIn}},[n._v("\n      Fade In\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.flipIn}},[n._v("\n      Flip In\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.tada}},[n._v("\n      Tada\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.shake}},[n._v("\n      Shake\n    ")])],1)],1)},I=[],A=(e("77ed"),{components:{BCardCode:c["a"],BCardText:u["a"],BButton:b["a"]},directives:{Ripple:p["a"]},data:function(){return{codeAnimation:d}},methods:{bounceIn:function(){this.$swal({title:"Bounce In Animation",customClass:{confirmButton:"btn btn-primary"},showClass:{popup:"animate__animated animate__bounceIn"},buttonsStyling:!1})},fadeIn:function(){this.$swal({title:"Fade In Animation",customClass:{confirmButton:"btn btn-primary"},showClass:{popup:"animate__animated animate__fadeIn"},buttonsStyling:!1})},flipIn:function(){this.$swal({title:"Flip In Animation",customClass:{confirmButton:"btn btn-primary"},showClass:{popup:"animate__animated animate__flipInX"},buttonsStyling:!1})},tada:function(){this.$swal({title:"Tada Animation",customClass:{confirmButton:"btn btn-primary"},showClass:{popup:"animate__animated animate__tada"},buttonsStyling:!1})},shake:function(){this.$swal({title:"Shake Animation",customClass:{confirmButton:"btn btn-primary"},showClass:{popup:"animate__animated animate__shakeX"},buttonsStyling:!1})}}}),Y=A,E=Object(B["a"])(Y,T,I,!1,null,null,null),N=E.exports,P=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-card-code",{attrs:{title:"Types"},scopedSlots:n._u([{key:"code",fn:function(){return[n._v("\n    "+n._s(n.codeTypes)+"\n  ")]},proxy:!0}])},[e("b-card-text",[n._v('\n    The type of the modal. SweetAlert comes with 4 built-in types which will show a corresponding icon animation: "success", "error", "warning" and "info". You can also set it as "input" to get a prompt modal. It can either be put in the object under the key "icon" or passed as the third parameter of the function.\n  ')]),e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(40, 199, 111, 0.15)",expression:"'rgba(40, 199, 111, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-success"},on:{click:n.success}},[n._v("\n      Success\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(234, 84, 85, 0.15)",expression:"'rgba(234, 84, 85, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-danger"},on:{click:n.error}},[n._v("\n      Error\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 159, 67, 0.15)",expression:"'rgba(255, 159, 67, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-warning"},on:{click:n.warning}},[n._v("\n      Warning\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(0, 207, 232, 0.15)",expression:"'rgba(0, 207, 232, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-info"},on:{click:n.info}},[n._v("\n      Info\n    ")])],1)],1)},R=[],F={components:{BCardCode:c["a"],BCardText:u["a"],BButton:b["a"]},directives:{Ripple:p["a"]},data:function(){return{codeTypes:v}},methods:{success:function(){this.$swal({title:"Good job!",text:"You clicked the button!",icon:"success",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},error:function(){this.$swal({title:"Error!",text:" You clicked the button!",icon:"error",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},warning:function(){this.$swal({title:"Warning!",text:" You clicked the button!",icon:"warning",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},info:function(){this.$swal({title:"Info!",text:"You clicked the button!",icon:"info",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})}}},H=F,L=Object(B["a"])(H,P,R,!1,null,null,null),D=L.exports,W=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-card-code",{attrs:{title:"Options"},scopedSlots:n._u([{key:"code",fn:function(){return[n._v("\n    "+n._s(n.codeOptions)+"\n  ")]},proxy:!0}])},[e("div",{staticClass:"demo-inline-spacing"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.customImage}},[n._v("\n      Custom Image\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.autoClose}},[n._v("\n      Auto Close\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.clickOutside}},[n._v("\n      Click Outside\n    ")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.ajax}},[n._v("\n      Ajax\n    ")])],1)])},M=[],G=(e("d3b7"),{components:{BCardCode:c["a"],BButton:b["a"]},directives:{Ripple:p["a"]},data:function(){return{timerInterval:null,codeOptions:h}},methods:{customImage:function(){this.$swal({title:"Sweet!",text:"Modal with a custom image.",imageUrl:e("80d9"),imageWidth:400,imageHeight:200,imageAlt:"Custom image",customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},autoClose:function(){this.$swal({title:"Auto close alert!",html:"I will close in <strong>3</strong> seconds.",timer:3e3,customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},clickOutside:function(){this.$swal({title:"Click outside to close!",text:"This is a cool message!",allowOutsideClick:!0,customClass:{confirmButton:"btn btn-primary"},buttonsStyling:!1})},ajax:function(){var n=this;this.$swal({title:"Search for a user",input:"text",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-outline-danger ml-1"},buttonsStyling:!1,inputAttributes:{autocapitalize:"off"},showCancelButton:!0,confirmButtonText:"Look up",showLoaderOnConfirm:!0,preConfirm:function(n){var t=this;return n?fetch("//api.github.com/users/".concat(n)).then((function(n){if(!n.ok)throw new Error(n.statusText);return n.json()})).catch((function(n){t.$swal.showValidationMessage("Request failed:  ".concat(n))})):null}}).then((function(t){t.value&&n.$swal({title:"".concat(t.value.login,"'s avatar"),imageUrl:t.value.avatar_url,customClass:{confirmButton:"btn btn-primary"}})}))}}}),U=G,q=Object(B["a"])(U,W,M,!1,null,null,null),V=q.exports,X=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("b-card-code",{attrs:{title:"Confirm Options"},scopedSlots:n._u([{key:"code",fn:function(){return[n._v("\n    "+n._s(n.codeConfirm)+"\n  ")]},proxy:!0}])},[e("div",{staticClass:"demo-inline-spacing"},[e("div",[e("h5",[n._v("Confirm Button Text")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.confirmText}},[n._v("\n        Confirm Text\n      ")])],1),e("div",[e("h5",[n._v("Confirm Button Text")]),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(113, 102, 240, 0.15)",expression:"'rgba(113, 102, 240, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary"},on:{click:n.confirmButtonColor}},[n._v("\n        Confirm Button Color\n      ")])],1)])])},z=[],J={components:{BButton:b["a"],BCardCode:c["a"]},directives:{Ripple:p["a"]},data:function(){return{codeConfirm:g}},methods:{confirmText:function(){var n=this;this.$swal({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-outline-danger ml-1"},buttonsStyling:!1}).then((function(t){t.value&&n.$swal({icon:"success",title:"Deleted!",text:"Your file has been deleted.",customClass:{confirmButton:"btn btn-success"}})}))},confirmButtonColor:function(){var n=this;this.$swal({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-outline-danger ml-1"},buttonsStyling:!1}).then((function(t){t.value?n.$swal({icon:"success",title:"Deleted!",text:"Your file has been deleted.",customClass:{confirmButton:"btn btn-success"}}):"cancel"===t.dismiss&&n.$swal({title:"Cancelled",text:"Your imaginary file is safe :)",icon:"error",customClass:{confirmButton:"btn btn-success"}})}))}}},K=J,Q=Object(B["a"])(K,X,z,!1,null,null,null),Z=Q.exports,nn={components:{BRow:r["a"],BCol:a["a"],SweetAlertBasic:x,SweetAlertPosition:$,SweetAlertAnimation:N,SweetAlertTypes:D,SweetAlertOption:V,SweetAlertConfirmOption:Z}},tn=nn,en=(e("d563"),Object(B["a"])(tn,i,o,!1,null,null,null));t["default"]=en.exports},a15b:function(n,t,e){"use strict";e.d(t,"a",(function(){return B}));var i=e("b42e"),o=e("c637"),r=e("a723"),a=e("2326"),s=e("228e"),l=e("6c06"),c=e("b508"),u=e("d82f"),b=e("cf75"),p=e("fa73");function m(n,t){var e=Object.keys(n);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(n);t&&(i=i.filter((function(t){return Object.getOwnPropertyDescriptor(n,t).enumerable}))),e.push.apply(e,i)}return e}function f(n){for(var t=1;t<arguments.length;t++){var e=null!=arguments[t]?arguments[t]:{};t%2?m(Object(e),!0).forEach((function(t){d(n,t,e[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(e)):m(Object(e)).forEach((function(t){Object.defineProperty(n,t,Object.getOwnPropertyDescriptor(e,t))}))}return n}function d(n,t,e){return t in n?Object.defineProperty(n,t,{value:e,enumerable:!0,configurable:!0,writable:!0}):n[t]=e,n}var v=["start","end","center"],h=Object(c["a"])((function(n,t){return t=Object(p["h"])(Object(p["g"])(t)),t?Object(p["c"])(["row-cols",n,t].filter(l["a"]).join("-")):null})),g=Object(c["a"])((function(n){return Object(p["c"])(n.replace("cols",""))})),w=[],y=function(){var n=Object(s["b"])().reduce((function(n,t){return n[Object(b["g"])(t,"cols")]=Object(b["c"])(r["p"]),n}),Object(u["c"])(null));return w=Object(u["h"])(n),Object(b["d"])(Object(u["m"])(f(f({},n),{},{alignContent:Object(b["c"])(r["u"],null,(function(n){return Object(a["a"])(Object(a["b"])(v,"between","around","stretch"),n)})),alignH:Object(b["c"])(r["u"],null,(function(n){return Object(a["a"])(Object(a["b"])(v,"between","around"),n)})),alignV:Object(b["c"])(r["u"],null,(function(n){return Object(a["a"])(Object(a["b"])(v,"baseline","stretch"),n)})),noGutters:Object(b["c"])(r["g"],!1),tag:Object(b["c"])(r["u"],"div")})),o["Ob"])},B={name:o["Ob"],functional:!0,get props(){return delete this.props,this.props=y(),this.props},render:function(n,t){var e,o=t.props,r=t.data,a=t.children,s=o.alignV,l=o.alignH,c=o.alignContent,u=[];return w.forEach((function(n){var t=h(g(n),o[n]);t&&u.push(t)})),u.push((e={"no-gutters":o.noGutters},d(e,"align-items-".concat(s),s),d(e,"justify-content-".concat(l),l),d(e,"align-content-".concat(c),c),e)),n(o.tag,Object(i["a"])(r,{staticClass:"row",class:u}),a)}}},b28b:function(n,t,e){"use strict";e.d(t,"a",(function(){return x}));var i=e("b42e"),o=e("c637"),r=e("a723"),a=e("992e"),s=e("2326"),l=e("228e"),c=e("6c06"),u=e("7b1e"),b=e("b508"),p=e("d82f"),m=e("cf75"),f=e("fa73");function d(n,t){var e=Object.keys(n);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(n);t&&(i=i.filter((function(t){return Object.getOwnPropertyDescriptor(n,t).enumerable}))),e.push.apply(e,i)}return e}function v(n){for(var t=1;t<arguments.length;t++){var e=null!=arguments[t]?arguments[t]:{};t%2?d(Object(e),!0).forEach((function(t){h(n,t,e[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(e)):d(Object(e)).forEach((function(t){Object.defineProperty(n,t,Object.getOwnPropertyDescriptor(e,t))}))}return n}function h(n,t,e){return t in n?Object.defineProperty(n,t,{value:e,enumerable:!0,configurable:!0,writable:!0}):n[t]=e,n}var g=["auto","start","end","center","baseline","stretch"],w=function(n,t,e){var i=n;if(!Object(u["p"])(e)&&!1!==e)return t&&(i+="-".concat(t)),"col"!==n||""!==e&&!0!==e?(i+="-".concat(e),Object(f["c"])(i)):Object(f["c"])(i)},y=Object(b["a"])(w),B=Object(p["c"])(null),C=function(){var n=Object(l["b"])().filter(c["a"]),t=n.reduce((function(n,t){return n[t]=Object(m["c"])(r["i"]),n}),Object(p["c"])(null)),e=n.reduce((function(n,t){return n[Object(m["g"])(t,"offset")]=Object(m["c"])(r["p"]),n}),Object(p["c"])(null)),i=n.reduce((function(n,t){return n[Object(m["g"])(t,"order")]=Object(m["c"])(r["p"]),n}),Object(p["c"])(null));return B=Object(p["a"])(Object(p["c"])(null),{col:Object(p["h"])(t),offset:Object(p["h"])(e),order:Object(p["h"])(i)}),Object(m["d"])(Object(p["m"])(v(v(v(v({},t),e),i),{},{alignSelf:Object(m["c"])(r["u"],null,(function(n){return Object(s["a"])(g,n)})),col:Object(m["c"])(r["g"],!1),cols:Object(m["c"])(r["p"]),offset:Object(m["c"])(r["p"]),order:Object(m["c"])(r["p"]),tag:Object(m["c"])(r["u"],"div")})),o["y"])},x={name:o["y"],functional:!0,get props(){return delete this.props,this.props=C()},render:function(n,t){var e,o=t.props,r=t.data,s=t.children,l=o.cols,c=o.offset,u=o.order,b=o.alignSelf,p=[];for(var m in B)for(var f=B[m],d=0;d<f.length;d++){var v=y(m,f[d].replace(m,""),o[f[d]]);v&&p.push(v)}var g=p.some((function(n){return a["e"].test(n)}));return p.push((e={col:o.col||!g&&!l},h(e,"col-".concat(l),l),h(e,"offset-".concat(c),c),h(e,"order-".concat(u),u),h(e,"align-self-".concat(b),b),e)),n(o.tag,Object(i["a"])(r,{class:p}),s)}}},d563:function(n,t,e){"use strict";e("1e07")},d6e4:function(n,t,e){"use strict";e.d(t,"a",(function(){return c}));var i=e("2b0e"),o=e("b42e"),r=e("c637"),a=e("a723"),s=e("cf75"),l=Object(s["d"])({textTag:Object(s["c"])(a["u"],"p")},r["u"]),c=i["default"].extend({name:r["u"],functional:!0,props:l,render:function(n,t){var e=t.props,i=t.data,r=t.children;return n(e.textTag,Object(o["a"])(i,{staticClass:"card-text"}),r)}})}}]);
//# sourceMappingURL=chunk-843f85f2.7ba6798d.js.map