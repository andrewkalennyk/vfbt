/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(12);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

Nova.booting(function (Vue, router, store) {
    router.addRoutes([{
        name: 'citizen-finder',
        path: '/citizen-finder',
        component: __webpack_require__(2)
    }]);
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(3)
}
var normalizeComponent = __webpack_require__(8)
/* script */
var __vue_script__ = __webpack_require__(9)
/* template */
var __vue_template__ = __webpack_require__(11)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/Tool.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-68ff5483", Component.options)
  } else {
    hotAPI.reload("data-v-68ff5483", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(4);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("6e5db1d0", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-68ff5483\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Tool.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-68ff5483\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Tool.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)(false);
// imports


// module
exports.push([module.i, "\n*,:after,:before {\n    border: 0 solid #dae1e7;\n}\n.bg-grey-lighter {\n    background-color: #f1f5f8\n}\n.bg-blue {\n    background-color: #3490dc;\n}\n.border-teal {\n    border-color: #4dc0b5;\n}\n.bg-teal {\n    background-color: #4dc0b5;\n}\n", ""]);

// exports


/***/ }),
/* 5 */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(7)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}
var options = null
var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction, _options) {
  isProduction = _isProduction

  options = _options || {}

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }
  if (options.ssrId) {
    styleElement.setAttribute(ssrIdKey, obj.id)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),
/* 7 */
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),
/* 8 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_the_mask__ = __webpack_require__(10);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_the_mask___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue_the_mask__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__citizenView__ = __webpack_require__(16);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__citizenView___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__citizenView__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
    directives: { mask: __WEBPACK_IMPORTED_MODULE_0_vue_the_mask__["mask"] },
    mounted: function mounted() {
        this.getInfo();
    },
    data: function data() {
        return {
            fullData: {},
            working: false,
            citizen: false,
            noCitizens: false,
            newCitizenForm: false,
            electivePlotId: '',
            streetId: '',
            houseId: '',
            electivePlots: [],
            streets: [],
            houses: [],
            findCitizens: []
        };
    },

    components: {
        citizenView: __WEBPACK_IMPORTED_MODULE_1__citizenView___default.a
    },
    methods: {
        processFind: function processFind() {
            var _this = this;

            this.working = true;
            Nova.request().post('/search-citizen', {
                first_name: this.firstName,
                last_name: this.lastName,
                patronymic_name: this.patronymicName,
                phone: this.phone,
                date_birth: this.birthDate,
                certificate_number: this.certificateNumber,
                elective_plot_id: this.electivePlotId,
                street_id: this.streetId,
                house_id: this.houseId
            }).then(function (_ref) {
                var data = _ref.data;

                _this.findCitizens = data.citizens;
                if (data.citizens.length === 0) {
                    _this.$toasted.error('Нічого не знайдено!');
                } else {
                    _this.$toasted.success(data.message);
                }
                _this.working = false;
            });
        },
        choseCitizen: function choseCitizen(event) {
            var citizen = false;
            this.findCitizens.forEach(function (value, key) {
                if (value.id === parseInt(event.currentTarget.id)) {
                    citizen = value;
                }
            });
            this.citizen = citizen;
            this.findCitizens = [];
            this.newCitizenForm = false;
        },
        getInfo: function getInfo() {
            var _this2 = this;

            Nova.request().post('/get-info-for-new').then(function (_ref2) {
                var data = _ref2.data;

                _this2.electivePlots = data.elective_plots;
                _this2.streets = data.streets;
            });
        },
        changeStreet: function changeStreet() {
            var _this3 = this;

            Nova.request().post('/get-related-entities-by-street', {
                street_id: this.streetId
            }).then(function (_ref3) {
                var data = _ref3.data;

                _this3.electivePlots = data.elective_plots;
                _this3.houses = data.houses;
                console.log(_this3.houseId);
            });
        },
        changeHouse: function changeHouse() {
            var house = '';
            var id = this.houseId;
            var electivePlots = this.electivePlots;
            var electivePlotChosen = '';
            console.log('changeHouse');
            this.houses.forEach(function (value, key) {
                if (value.id === parseInt(id)) {
                    house = value;
                }
            });

            if (house && this.electivePlotId === '') {
                electivePlots.forEach(function (value, key) {
                    if (value.id === parseInt(house.elective_plot_id)) {
                        electivePlotChosen = house.elective_plot_id;
                    }
                });
                this.electivePlotId = electivePlotChosen;
            }
        },
        changeElectivePlot: function changeElectivePlot() {
            var _this4 = this;

            Nova.request().post('/get-related-entities-by-elective-plot', {
                elective_plot_id: this.electivePlotId
            }).then(function (_ref4) {
                var data = _ref4.data;

                _this4.streets = data.streets;
            });
        }

        /* openForm() {
            this.citizen = false;
            this.newCitizenForm = true;
        },
         assignCitizen(citizen) {
            this.citizen = citizen;
            this.newCitizenForm = false;
        },*/

    }
});

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

(function(e,t){ true?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.VueTheMask=t():e.VueTheMask=t()})(this,function(){return function(e){function t(r){if(n[r])return n[r].exports;var a=n[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,t),a.l=!0,a.exports}var n={};return t.m=e,t.c=n,t.i=function(e){return e},t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p=".",t(t.s=10)}([function(e,t){e.exports={"#":{pattern:/\d/},X:{pattern:/[0-9a-zA-Z]/},S:{pattern:/[a-zA-Z]/},A:{pattern:/[a-zA-Z]/,transform:function(e){return e.toLocaleUpperCase()}},a:{pattern:/[a-zA-Z]/,transform:function(e){return e.toLocaleLowerCase()}},"!":{escape:!0}}},function(e,t,n){"use strict";function r(e){var t=document.createEvent("Event");return t.initEvent(e,!0,!0),t}var a=n(2),o=n(0),i=n.n(o);t.a=function(e,t){var o=t.value;if((Array.isArray(o)||"string"==typeof o)&&(o={mask:o,tokens:i.a}),"INPUT"!==e.tagName.toLocaleUpperCase()){var u=e.getElementsByTagName("input");if(1!==u.length)throw new Error("v-mask directive requires 1 input, found "+u.length);e=u[0]}e.oninput=function(t){if(t.isTrusted){var i=e.selectionEnd,u=e.value[i-1];for(e.value=n.i(a.a)(e.value,o.mask,!0,o.tokens);i<e.value.length&&e.value.charAt(i-1)!==u;)i++;e===document.activeElement&&(e.setSelectionRange(i,i),setTimeout(function(){e.setSelectionRange(i,i)},0)),e.dispatchEvent(r("input"))}};var s=n.i(a.a)(e.value,o.mask,!0,o.tokens);s!==e.value&&(e.value=s,e.dispatchEvent(r("input")))}},function(e,t,n){"use strict";var r=n(6),a=n(5);t.a=function(e,t){var o=!(arguments.length>2&&void 0!==arguments[2])||arguments[2],i=arguments[3];return Array.isArray(t)?n.i(a.a)(r.a,t,i)(e,t,o,i):n.i(r.a)(e,t,o,i)}},function(e,t,n){"use strict";function r(e){e.component(s.a.name,s.a),e.directive("mask",i.a)}Object.defineProperty(t,"__esModule",{value:!0});var a=n(0),o=n.n(a),i=n(1),u=n(7),s=n.n(u);n.d(t,"TheMask",function(){return s.a}),n.d(t,"mask",function(){return i.a}),n.d(t,"tokens",function(){return o.a}),n.d(t,"version",function(){return c});var c="0.11.1";t.default=r,"undefined"!=typeof window&&window.Vue&&window.Vue.use(r)},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=n(1),a=n(0),o=n.n(a),i=n(2);t.default={name:"TheMask",props:{value:[String,Number],mask:{type:[String,Array],required:!0},masked:{type:Boolean,default:!1},tokens:{type:Object,default:function(){return o.a}}},directives:{mask:r.a},data:function(){return{lastValue:null,display:this.value}},watch:{value:function(e){e!==this.lastValue&&(this.display=e)},masked:function(){this.refresh(this.display)}},computed:{config:function(){return{mask:this.mask,tokens:this.tokens,masked:this.masked}}},methods:{onInput:function(e){e.isTrusted||this.refresh(e.target.value)},refresh:function(e){this.display=e;var e=n.i(i.a)(e,this.mask,this.masked,this.tokens);e!==this.lastValue&&(this.lastValue=e,this.$emit("input",e))}}}},function(e,t,n){"use strict";function r(e,t,n){return t=t.sort(function(e,t){return e.length-t.length}),function(r,a){for(var o=!(arguments.length>2&&void 0!==arguments[2])||arguments[2],i=0;i<t.length;){var u=t[i];i++;var s=t[i];if(!(s&&e(r,s,!0,n).length>u.length))return e(r,u,o,n)}return""}}t.a=r},function(e,t,n){"use strict";function r(e,t){var n=!(arguments.length>2&&void 0!==arguments[2])||arguments[2],r=arguments[3];e=e||"",t=t||"";for(var a=0,o=0,i="";a<t.length&&o<e.length;){var u=t[a],s=r[u],c=e[o];s&&!s.escape?(s.pattern.test(c)&&(i+=s.transform?s.transform(c):c,a++),o++):(s&&s.escape&&(a++,u=t[a]),n&&(i+=u),c===u&&o++,a++)}for(var f="";a<t.length&&n;){var u=t[a];if(r[u]){f="";break}f+=u,a++}return i+f}t.a=r},function(e,t,n){var r=n(8)(n(4),n(9),null,null);e.exports=r.exports},function(e,t){e.exports=function(e,t,n,r){var a,o=e=e||{},i=typeof e.default;"object"!==i&&"function"!==i||(a=e,o=e.default);var u="function"==typeof o?o.options:o;if(t&&(u.render=t.render,u.staticRenderFns=t.staticRenderFns),n&&(u._scopeId=n),r){var s=u.computed||(u.computed={});Object.keys(r).forEach(function(e){var t=r[e];s[e]=function(){return t}})}return{esModule:a,exports:o,options:u}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement;return(e._self._c||t)("input",{directives:[{name:"mask",rawName:"v-mask",value:e.config,expression:"config"}],attrs:{type:"text"},domProps:{value:e.display},on:{input:e.onInput}})},staticRenderFns:[]}},function(e,t,n){e.exports=n(3)}])});

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("heading", { staticClass: "mb-6" }, [_vm._v("Citizen Finder")]),
      _vm._v(" "),
      _c(
        "card",
        {
          staticClass: "bg-white flex flex-col rounded",
          staticStyle: { "min-height": "300px" }
        },
        [
          _c(
            "form",
            {
              staticClass: "px-8 pt-6 pb-8",
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.processFind($event)
                }
              }
            },
            [
              _c("div", { staticClass: "flex mb-4" }, [
                _c("div", { staticClass: "w-1/3 mt-2 ml-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "lastName" }
                    },
                    [
                      _vm._v(
                        "\n                        Прізвище\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.lastName,
                        expression: "lastName"
                      }
                    ],
                    staticClass:
                      "shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline",
                    attrs: {
                      id: "lastName",
                      placeholder: "Прізвище",
                      type: "text"
                    },
                    domProps: { value: _vm.lastName },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.lastName = $event.target.value
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "w-1/3 bg-grey h-12 mt-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "first_name" }
                    },
                    [
                      _vm._v(
                        "\n                        Ім'я\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.firstName,
                        expression: "firstName"
                      }
                    ],
                    staticClass:
                      "shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline",
                    attrs: {
                      id: "first_name",
                      type: "text",
                      name: "first_name",
                      placeholder: "Ім'я"
                    },
                    domProps: { value: _vm.firstName },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.firstName = $event.target.value
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "w-1/3 bg-grey-light h-12 mt-2 mr-2" },
                  [
                    _c(
                      "label",
                      {
                        staticClass:
                          "block text-grey-darker text-sm font-bold m-2",
                        attrs: { for: "patronymic_name" }
                      },
                      [
                        _vm._v(
                          "\n                        По-Батькові\n                    "
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.patronymicName,
                          expression: "patronymicName"
                        }
                      ],
                      staticClass:
                        "shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline",
                      attrs: {
                        id: "patronymic_name",
                        type: "text",
                        name: "patronymic_name",
                        placeholder: "По-Батькові"
                      },
                      domProps: { value: _vm.patronymicName },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.patronymicName = $event.target.value
                        }
                      }
                    })
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "flex mb-4" }, [
                _c("div", { staticClass: "w-1/3 mt-2 ml-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "phone" }
                    },
                    [
                      _vm._v(
                        "\n                        Телефон\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.phone,
                        expression: "phone"
                      },
                      {
                        name: "mask",
                        rawName: "v-mask",
                        value: "+380##-###-##-##",
                        expression: "'+380##-###-##-##'"
                      }
                    ],
                    staticClass:
                      "shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline",
                    attrs: {
                      id: "phone",
                      name: "phone",
                      placeholder: "+380__-___-__-__",
                      type: "text"
                    },
                    domProps: { value: _vm.phone },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.phone = $event.target.value
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "w-1/3 mt-2 ml-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "birth_date" }
                    },
                    [
                      _vm._v(
                        "\n                        Дата Народження\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.birthDate,
                        expression: "birthDate"
                      },
                      {
                        name: "mask",
                        rawName: "v-mask",
                        value: "##-##-####",
                        expression: "'##-##-####'"
                      }
                    ],
                    staticClass:
                      "shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline",
                    attrs: {
                      id: "birth_date",
                      name: "birthDate",
                      placeholder: "__-__-____",
                      type: "text"
                    },
                    domProps: { value: _vm.birthDate },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.birthDate = $event.target.value
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "w-1/3 mt-2 ml-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "certificate_number" }
                    },
                    [
                      _vm._v(
                        "\n                        Номер посвідчення\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.certificateNumber,
                        expression: "certificateNumber"
                      }
                    ],
                    staticClass:
                      "shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline",
                    attrs: {
                      id: "certificate_number",
                      name: "certificateNumber",
                      type: "text"
                    },
                    domProps: { value: _vm.certificateNumber },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.certificateNumber = $event.target.value
                      }
                    }
                  })
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "flex mb-4" }, [
                _c("div", { staticClass: "w-1/3 mt-2 ml-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "grid-elective-plot" }
                    },
                    [
                      _vm._v(
                        "\n                        Дільниця\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.electivePlotId,
                          expression: "electivePlotId"
                        }
                      ],
                      staticClass:
                        "block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                      attrs: {
                        id: "grid-elective-plot",
                        name: "elective_plot_id"
                      },
                      on: {
                        change: [
                          function($event) {
                            var $$selectedVal = Array.prototype.filter
                              .call($event.target.options, function(o) {
                                return o.selected
                              })
                              .map(function(o) {
                                var val = "_value" in o ? o._value : o.value
                                return val
                              })
                            _vm.electivePlotId = $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          },
                          _vm.changeElectivePlot
                        ]
                      }
                    },
                    [
                      _c("option", { attrs: { value: "" } }, [
                        _vm._v("Виберіть дільницю")
                      ]),
                      _vm._v(" "),
                      _vm._l(_vm.electivePlots, function(electivePlot) {
                        return _c(
                          "option",
                          { domProps: { value: electivePlot.id } },
                          [_vm._v(_vm._s(electivePlot.title))]
                        )
                      })
                    ],
                    2
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "w-1/3 bg-grey h-12 mt-2 mr-2" }, [
                  _c(
                    "label",
                    {
                      staticClass:
                        "block text-grey-darker text-sm font-bold m-2",
                      attrs: { for: "grid-elective-plot" }
                    },
                    [
                      _vm._v(
                        "\n                        Вулиця\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.streetId,
                          expression: "streetId"
                        }
                      ],
                      staticClass:
                        "block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                      attrs: { id: "grid-street", name: "street_id" },
                      on: {
                        change: [
                          function($event) {
                            var $$selectedVal = Array.prototype.filter
                              .call($event.target.options, function(o) {
                                return o.selected
                              })
                              .map(function(o) {
                                var val = "_value" in o ? o._value : o.value
                                return val
                              })
                            _vm.streetId = $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          },
                          _vm.changeStreet
                        ]
                      }
                    },
                    [
                      _c("option", { attrs: { value: "" } }, [
                        _vm._v("Виберіть вулицю")
                      ]),
                      _vm._v(" "),
                      _vm._l(_vm.streets, function(street) {
                        return _c(
                          "option",
                          { domProps: { value: street.id } },
                          [_vm._v(_vm._s(street.title))]
                        )
                      })
                    ],
                    2
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "w-1/3 bg-grey h-12 mt-2 mr-2" }, [
                  _vm.houses.length
                    ? _c(
                        "label",
                        {
                          staticClass:
                            "block text-grey-darker text-sm font-bold m-2",
                          attrs: { for: "grid-house" }
                        },
                        [
                          _vm._v(
                            "\n                        Будинок\n                    "
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.houses.length
                    ? _c(
                        "select",
                        {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.houseId,
                              expression: "houseId"
                            }
                          ],
                          staticClass:
                            "block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                          attrs: { id: "grid-house", name: "house_id" },
                          on: {
                            change: [
                              function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.houseId = $event.target.multiple
                                  ? $$selectedVal
                                  : $$selectedVal[0]
                              },
                              _vm.changeHouse
                            ]
                          }
                        },
                        [
                          _c("option", { attrs: { value: "" } }, [
                            _vm._v("Виберіть будинок")
                          ]),
                          _vm._v(" "),
                          _vm._l(_vm.houses, function(house) {
                            return _c(
                              "option",
                              { domProps: { value: house.id } },
                              [_vm._v(_vm._s(house.title))]
                            )
                          })
                        ],
                        2
                      )
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "flex mb-4" }, [
                _c("div", { staticClass: "w-1/3 mt-2 ml-2 mr-2" }),
                _vm._v(" "),
                _c("div", { staticClass: "w-1/3 bg-grey h-12 mt-2 mr-2" }),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "w-1/3 bg-grey-light h-12 mt-2 mr-2 align-content-end"
                  },
                  [
                    _c(
                      "button",
                      {
                        staticClass:
                          "flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded",
                        attrs: { disabled: _vm.working, type: "submit" }
                      },
                      [
                        _vm._v(
                          "\n                        Пошук\n                    "
                        )
                      ]
                    )
                  ]
                )
              ])
            ]
          ),
          _vm._v(" "),
          this.findCitizens.length
            ? _c(
                "div",
                { staticClass: "px-8 pt-6 pb-8 bg-grey-lighter" },
                [
                  _c("h2", [_vm._v("Результати")]),
                  _vm._v(" "),
                  _vm._l(_vm.findCitizens, function(citizen) {
                    return _c(
                      "a",
                      {
                        staticClass:
                          "block px-4 py-2 hover:bg-20 text-80 no-underline",
                        attrs: { href: "javascript:void(0)", id: citizen.id },
                        on: { click: _vm.choseCitizen }
                      },
                      [
                        _vm._v(
                          _vm._s(citizen.last_name) +
                            " " +
                            _vm._s(citizen.first_name) +
                            " " +
                            _vm._s(citizen.patronymic_name)
                        )
                      ]
                    )
                  })
                ],
                2
              )
            : _vm._e()
        ]
      ),
      _vm._v(" "),
      _c("citizen-view", { attrs: { citizen: this.citizen } })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-68ff5483", module.exports)
  }
}

/***/ }),
/* 12 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 13 */,
/* 14 */,
/* 15 */,
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(8)
/* script */
var __vue_script__ = __webpack_require__(17)
/* template */
var __vue_template__ = __webpack_require__(18)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/citizenView.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1b961ab2", Component.options)
  } else {
    hotAPI.reload("data-v-1b961ab2", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 17 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'citizenView',
    props: ['citizen'],
    mounted: function mounted() {}
});

/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { attrs: { id: "citizenView" } }, [
    _vm.citizen
      ? _c("div", { staticClass: "mt-6  rounded overflow-hidden shadow-lg" }, [
          _c("div", { staticClass: "px-6 py-4" }, [
            _c("div", { staticClass: "font-bold text-xl mb-4" }, [
              _vm._v(
                _vm._s(_vm.citizen.last_name) +
                  " " +
                  _vm._s(_vm.citizen.first_name) +
                  " " +
                  _vm._s(_vm.citizen.patronymic_name)
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Дата Народження")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(_vm.citizen.birthDay))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Телефон")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(_vm.citizen.phone))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Категория")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.category))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("# посв")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.certificate_number))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Чорний список")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.black_list))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "font-bold text-xl mb-4" }, [
              _vm._v("Адресса ")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Громадська приймальня")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.office))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Дільниця")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.elective_plot))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Bулиця")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.street))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Дім")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.house))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "flex -mb-3" }, [
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v("Квартира")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [_vm._v(" — ")]),
              _vm._v(" "),
              _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                _vm._v(_vm._s(this.citizen.flat))
              ])
            ])
          ])
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1b961ab2", module.exports)
  }
}

/***/ })
/******/ ]);