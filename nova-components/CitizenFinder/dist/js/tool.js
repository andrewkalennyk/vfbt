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
module.exports = __webpack_require__(11);


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
var __vue_template__ = __webpack_require__(10)
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
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* Scoped Styles */\n", ""]);

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
    name: 'app',
    mounted: function mounted() {
        this.getInfo();
    },
    data: function data() {
        return {
            fullData: {},
            working: false,
            citizen: false,
            noCitizens: false,
            findCitizens: [],
            citizenCategories: [],
            electivePlots: [],
            streets: [],
            filteredStreets: [],
            houses: [],
            filteredHouses: [],
            statuses: [],
            electivePlotId: '',
            streetId: '',
            houseId: '',
            citizenCategory: ''
        };
    },

    methods: {
        getInfo: function getInfo() {
            var _this = this;

            Nova.request().post('/get-info-for-new').then(function (_ref) {
                var data = _ref.data;

                _this.citizenCategories = data.categories;
                _this.electivePlots = data.elective_plots;
                _this.streets = data.streets;
                _this.houses = data.houses;
                _this.statuses = data.statuses;
            });
        },
        processFind: function processFind() {
            var _this2 = this;

            this.working = true;
            Nova.request().post('/search-citizen', {
                first_name: this.firstName,
                last_name: this.lastName,
                patronymic_name: this.patronymicName
            }).then(function (_ref2) {
                var data = _ref2.data;

                _this2.findCitizens = data.citizens;
                if (data.citizens.length === 0) {
                    _this2.$toasted.error('Нічого не знайдено!');
                } else {
                    _this2.$toasted.success(data.message);
                }
                _this2.working = false;
                console.log(data.citizens.length);
            });
        },
        newCitizen: function newCitizen() {
            var myForm = document.getElementById('new_citizen_form'),
                data = new FormData(myForm);

            Nova.request().post('/save-citizen', data).then(function (_ref3) {
                var data = _ref3.data;
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
        },
        filterStreets: function filterStreets() {
            var streets = [],
                electivePlotId = this.electivePlotId;
            this.streets.forEach(function (value, key) {
                if (value.elective_plot_id === parseInt(electivePlotId)) {
                    streets.push(value);
                }
            });
            this.filteredStreets = streets;
        },
        filterHouses: function filterHouses() {
            var houses = [],
                streetId = this.streetId,
                electivePlotId = this.electivePlotId;
            this.houses.forEach(function (value, key) {
                if (value.street_id === parseInt(streetId) && value.elective_plot_id === parseInt(electivePlotId)) {
                    houses.push(value);
                }
            });
            this.filteredHouses = houses;
        }
    }
});

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "app" } },
    [
      _c("heading", { staticClass: "mb-6" }, [_vm._v("Let's find them")]),
      _vm._v(" "),
      _c(
        "form",
        {
          staticClass: "w-full ",
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.processFind($event)
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass:
                "flex items-center border-b border-b-2 border-teal py-2"
            },
            [
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
                  "appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none",
                attrs: {
                  type: "text",
                  name: "last_name",
                  placeholder: "Прізвище",
                  "aria-label": "Full name"
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
              }),
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
                  "appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none",
                attrs: {
                  type: "text",
                  name: "first_name",
                  placeholder: "Ім'я",
                  "aria-label": "Full name"
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
              }),
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
                  "appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none",
                attrs: {
                  type: "text",
                  name: "patronymic_name",
                  placeholder: "По-Батькові",
                  "aria-label": "Full name"
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
              }),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass:
                    "flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded",
                  attrs: { disabled: _vm.working, type: "submit" }
                },
                [_vm._v("\n                Пошук\n            ")]
              ),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass:
                    "bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4",
                  attrs: { disabled: _vm.working, type: "submit" }
                },
                [_vm._v("\n                Новий\n            ")]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass:
                "overflow-hidden absolute w-full rounded-lg shadow-lg mt-2 mr-3 max-h-search overflow-y-auto"
            },
            [
              _c("div", { staticClass: "search-results-citizens" }, [
                this.findCitizens
                  ? _c(
                      "ul",
                      { staticClass: "list-reset" },
                      _vm._l(_vm.findCitizens, function(citizen) {
                        return _c("li", [
                          _c(
                            "a",
                            {
                              staticClass:
                                " cursor-pointer flex items-center hover:bg-20 block py-2 px-3 no-underline font-normal bg-20",
                              attrs: { id: citizen.id },
                              on: { click: _vm.choseCitizen }
                            },
                            [
                              _c("div", [
                                _c("p", { staticClass: "text-90" }, [
                                  _vm._v(
                                    _vm._s(citizen.last_name) +
                                      " " +
                                      _vm._s(citizen.first_name) +
                                      " " +
                                      _vm._s(citizen.patronymic_name)
                                  )
                                ])
                              ])
                            ]
                          )
                        ])
                      }),
                      0
                    )
                  : _vm._e()
              ])
            ]
          )
        ]
      ),
      _vm._v(" "),
      this.citizen
        ? _c(
            "div",
            { staticClass: "mt-6  rounded overflow-hidden shadow-lg" },
            [
              _c("div", { staticClass: "px-6 py-4" }, [
                _c("div", { staticClass: "font-bold text-xl mb-4" }, [
                  _vm._v(
                    _vm._s(this.citizen.last_name) +
                      " " +
                      _vm._s(this.citizen.first_name) +
                      " " +
                      _vm._s(this.citizen.patronymic_name)
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "flex -mb-3" }, [
                  _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                    _vm._v("Дата Народження")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                    _vm._v(_vm._s(this.citizen.birthDay))
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "flex -mb-3" }, [
                  _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                    _vm._v("Телефон")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                    _vm._v(_vm._s(this.citizen.phone))
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "flex -mb-3" }, [
                  _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                    _vm._v("Категория")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
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
                  _c("div", { staticClass: "w-1/3 bg-grey h-12" }, [
                    _vm._v(" — ")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "w-1/3 bg-grey-light h-12" }, [
                    _vm._v(_vm._s(this.citizen.flat))
                  ])
                ])
              ])
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "relative rounded overflow-hidden mb-8 shadow-lg mt-6" },
        [
          _c(
            "div",
            { staticClass: " border-grey-light p-4 flex justify-center p-8" },
            [
              _c(
                "form",
                {
                  staticClass: "w-full justify-center",
                  attrs: { id: "new_citizen_form" },
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.newCitizen($event)
                    }
                  }
                },
                [
                  _c("div", { staticClass: "flex flex-wrap -mx-3 mb-2" }, [
                    _c("div", { staticClass: "md:w-1/3 px-3 mb-6 md:mb-0" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-last-name" }
                        },
                        [
                          _vm._v(
                            "\n                            Прізвище\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("input", {
                        ref: "citizenValue",
                        staticClass:
                          "appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
                        attrs: {
                          id: "grid-last-name",
                          name: "last_name",
                          type: "text",
                          placeholder: ""
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "md:w-1/3 px-3" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-first-name" }
                        },
                        [
                          _vm._v(
                            "\n                            Ім'я\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("input", {
                        ref: "citizenValue",
                        staticClass:
                          "appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey",
                        attrs: {
                          id: "grid-first-name",
                          name: "first_name",
                          type: "text",
                          placeholder: ""
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "md:w-1/3 px-3" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-patronymic-name" }
                        },
                        [
                          _vm._v(
                            "\n                            По-Батькові\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("input", {
                        ref: "citizenValue",
                        staticClass:
                          "appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey",
                        attrs: {
                          id: "grid-patronymic-name",
                          name: "patronymic_name",
                          type: "text",
                          placeholder: ""
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "flex flex-wrap -mx-3 mb-2" }, [
                    _c("div", { staticClass: "md:w-1/3 px-3 mb-6 md:mb-0" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-birthdate-name" }
                        },
                        [
                          _vm._v(
                            "\n                            Дата Народження\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("input", {
                        ref: "citizenValue",
                        staticClass:
                          "appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input",
                        attrs: {
                          id: "grid-birthdate-name",
                          name: "date_birth",
                          type: "text",
                          placeholder: "12-05-2019"
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "md:w-1/3 px-3" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-phone-name" }
                        },
                        [
                          _vm._v(
                            "\n                            Телефон\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("input", {
                        ref: "citizenValue",
                        staticClass:
                          "appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey",
                        attrs: {
                          id: "grid-phone-name",
                          name: "phone",
                          type: "text",
                          placeholder: ""
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "md:w-1/3 px-3 mb-8" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-category" }
                        },
                        [
                          _vm._v(
                            "\n                            Категорія\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "relative" }, [
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.citizenCategory,
                                expression: "citizenCategory"
                              }
                            ],
                            ref: "citizenValue",
                            staticClass:
                              "block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                            attrs: {
                              id: "grid-category",
                              name: "citizens_category_id"
                            },
                            on: {
                              change: function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.citizenCategory = $event.target.multiple
                                  ? $$selectedVal
                                  : $$selectedVal[0]
                              }
                            }
                          },
                          [
                            _c("option", { attrs: { value: "" } }, [
                              _vm._v("Виберіть категорію")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.citizenCategories, function(category) {
                              return _c(
                                "option",
                                { domProps: { value: category.id } },
                                [_vm._v(_vm._s(category.title))]
                              )
                            })
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker"
                          },
                          [
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        )
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _vm.citizenCategory
                    ? _c("div", { staticClass: "flex flex-wrap -mx-3 mb-2" }, [
                        _vm._m(0)
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _c("h2", [_vm._v("Адреса")]),
                  _vm._v(" "),
                  _c("div", { staticClass: "flex flex-wrap -mx-3 mb-2 mt-3" }, [
                    _c("div", { staticClass: "md:w-1/3 px-3 mb-8" }, [
                      _c(
                        "label",
                        {
                          staticClass:
                            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                          attrs: { for: "grid-category" }
                        },
                        [
                          _vm._v(
                            "\n                            Дільниця\n                        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "relative" }, [
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
                              "block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
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
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.electivePlotId = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                _vm.filterStreets
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
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker"
                          },
                          [
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _vm.electivePlotId
                      ? _c("div", { staticClass: "md:w-1/3 px-3 mb-8" }, [
                          _c(
                            "label",
                            {
                              staticClass:
                                "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                              attrs: { for: "grid-category" }
                            },
                            [
                              _vm._v(
                                "\n                            Вулиця\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "relative" }, [
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
                                  "block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                                attrs: {
                                  id: "grid-street-plot",
                                  name: "street_id"
                                },
                                on: {
                                  change: [
                                    function($event) {
                                      var $$selectedVal = Array.prototype.filter
                                        .call($event.target.options, function(
                                          o
                                        ) {
                                          return o.selected
                                        })
                                        .map(function(o) {
                                          var val =
                                            "_value" in o ? o._value : o.value
                                          return val
                                        })
                                      _vm.streetId = $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    },
                                    _vm.filterHouses
                                  ]
                                }
                              },
                              [
                                _c("option", { attrs: { value: "" } }, [
                                  _vm._v("Виберіть вулицю")
                                ]),
                                _vm._v(" "),
                                _vm._l(_vm.filteredStreets, function(street) {
                                  return _c(
                                    "option",
                                    { domProps: { value: street.id } },
                                    [_vm._v(_vm._s(street.title))]
                                  )
                                })
                              ],
                              2
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass:
                                  "pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker"
                              },
                              [
                                _c(
                                  "svg",
                                  {
                                    staticClass: "fill-current h-4 w-4",
                                    attrs: {
                                      xmlns: "http://www.w3.org/2000/svg",
                                      viewBox: "0 0 20 20"
                                    }
                                  },
                                  [
                                    _c("path", {
                                      attrs: {
                                        d:
                                          "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                      }
                                    })
                                  ]
                                )
                              ]
                            )
                          ])
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.streetId
                      ? _c("div", { staticClass: "md:w-1/3 px-3 mb-8" }, [
                          _c(
                            "label",
                            {
                              staticClass:
                                "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                              attrs: { for: "grid-category" }
                            },
                            [
                              _vm._v(
                                "\n                            Дім\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "relative" }, [
                            _c(
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
                                  "block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                                attrs: {
                                  id: "grid-house-plot",
                                  name: "house_id"
                                },
                                on: {
                                  change: function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.houseId = $event.target.multiple
                                      ? $$selectedVal
                                      : $$selectedVal[0]
                                  }
                                }
                              },
                              [
                                _c("option", { attrs: { value: "" } }, [
                                  _vm._v("Виберіть дім")
                                ]),
                                _vm._v(" "),
                                _vm._l(_vm.filteredHouses, function(house) {
                                  return _c(
                                    "option",
                                    { domProps: { value: house.id } },
                                    [_vm._v(_vm._s(house.title))]
                                  )
                                })
                              ],
                              2
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass:
                                  "pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker"
                              },
                              [
                                _c(
                                  "svg",
                                  {
                                    staticClass: "fill-current h-4 w-4",
                                    attrs: {
                                      xmlns: "http://www.w3.org/2000/svg",
                                      viewBox: "0 0 20 20"
                                    }
                                  },
                                  [
                                    _c("path", {
                                      attrs: {
                                        d:
                                          "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                      }
                                    })
                                  ]
                                )
                              ]
                            )
                          ])
                        ])
                      : _vm._e()
                  ]),
                  _vm._v(" "),
                  _vm.houseId
                    ? _c(
                        "div",
                        { staticClass: "flex flex-wrap -mx-3 mb-2 mt-3" },
                        [
                          _vm._m(1),
                          _vm._v(" "),
                          _c("div", { staticClass: "md:w-1/3 px-3 mb-8" }, [
                            _c(
                              "label",
                              {
                                staticClass:
                                  "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
                                attrs: { for: "grid-category" }
                              },
                              [
                                _vm._v(
                                  "\n                            Статус\n                        "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", { staticClass: "relative" }, [
                              _c(
                                "select",
                                {
                                  staticClass:
                                    "block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey",
                                  attrs: {
                                    id: "grid-status",
                                    name: "status_id"
                                  }
                                },
                                [
                                  _c("option", { attrs: { value: "" } }, [
                                    _vm._v("Виберіть статус")
                                  ]),
                                  _vm._v(" "),
                                  _vm._l(_vm.statuses, function(status) {
                                    return _c(
                                      "option",
                                      { domProps: { value: status.id } },
                                      [_vm._v(_vm._s(status.title))]
                                    )
                                  })
                                ],
                                2
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker"
                                },
                                [
                                  _c(
                                    "svg",
                                    {
                                      staticClass: "fill-current h-4 w-4",
                                      attrs: {
                                        xmlns: "http://www.w3.org/2000/svg",
                                        viewBox: "0 0 20 20"
                                      }
                                    },
                                    [
                                      _c("path", {
                                        attrs: {
                                          d:
                                            "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        }
                                      })
                                    ]
                                  )
                                ]
                              )
                            ])
                          ])
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm._m(2)
                ]
              )
            ]
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "md:w-1/3 px-3 mb-6 md:mb-0" }, [
      _c(
        "label",
        {
          staticClass:
            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
          attrs: { for: "grid-certificagte-name" }
        },
        [
          _vm._v(
            "\n                            № посвідчення\n                        "
          )
        ]
      ),
      _vm._v(" "),
      _c("input", {
        staticClass:
          "appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input",
        attrs: {
          id: "grid-certificagte-name",
          name: "certificate_number",
          type: "text"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "md:w-1/3 px-3 mb-6 md:mb-0" }, [
      _c(
        "label",
        {
          staticClass:
            "block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2",
          attrs: { for: "grid-flat-name" }
        },
        [
          _vm._v(
            "\n                            Квартира\n                        "
          )
        ]
      ),
      _vm._v(" "),
      _c("input", {
        staticClass:
          "appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
        attrs: {
          id: "grid-flat-name",
          name: "flat_number",
          type: "text",
          placeholder: ""
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "flex flex-wrap -mx-3 mb-2" }, [
      _c(
        "button",
        {
          staticClass:
            "bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4",
          attrs: { type: "submit" }
        },
        [_vm._v("\n                        Зберегти\n                    ")]
      )
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-68ff5483", module.exports)
  }
}

/***/ }),
/* 11 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);