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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
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
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_inputmask_core__ = __webpack_require__(16);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_inputmask_core___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_inputmask_core__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__ff_polyfill__ = __webpack_require__(17);
function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }


 // Firefox Polyfill for focus events

Object(__WEBPACK_IMPORTED_MODULE_1__ff_polyfill__["a" /* default */])();

/* harmony default export */ __webpack_exports__["a"] = ({
  name: 'MaskedInput',
  render: function render(h) {
    return h('input', {
      ref: 'input',
      attrs: {
        disabled: this.maskCore === null || this.disabled
      },
      domProps: {
        value: this.value
      },
      on: {
        keydown: this.keyDown,
        keypress: this.keyPress,
        keyup: this.keyUp,
        textInput: this.textInput,
        mouseup: this.mouseUp,
        focusout: this.focusOut,
        cut: this.cut,
        copy: this.copy,
        paste: this.paste
      }
    });
  },


  data: function data() {
    return {
      marginLeft: 0,
      maskCore: null,
      updateAfterAll: false
    };
  },

  props: {
    value: {
      type: String
    },
    mask: {
      required: true,
      validator: function validator(value) {
        return !!(value && value.length >= 1 || value instanceof Object);
      }
    },
    placeholderChar: {
      type: String,
      default: '_',
      validator: function validator(value) {
        return !!(value && value.length === 1);
      }
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },

  watch: {
    mask: function mask(newValue, oldValue) {
      if (JSON.stringify(newValue) !== JSON.stringify(oldValue)) {
        this.initMask();
      }
    },
    value: function value(newValue) {
      if (this.maskCore) this.maskCore.setValue(newValue); // For multiple inputs support
    }
  },

  mounted: function mounted() {
    this.initMask();
  },


  methods: {
    initMask: function initMask() {
      var _this = this;

      try {
        if (this.mask instanceof Object) {
          this.maskCore = new __WEBPACK_IMPORTED_MODULE_0_inputmask_core___default.a(this.mask);
        } else {
          this.maskCore = new __WEBPACK_IMPORTED_MODULE_0_inputmask_core___default.a({
            pattern: this.mask,
            value: '',
            placeholderChar: this.placeholderChar,
            /* eslint-disable quote-props */
            formatCharacters: {
              'a': {
                validate: function validate(char) {
                  return (/^[A-Za-zА-Яа-я]$/.test(char)
                  );
                }
              },
              'A': {
                validate: function validate(char) {
                  return (/^[A-Za-zА-Яа-я]$/.test(char)
                  );
                },
                transform: function transform(char) {
                  return char.toUpperCase();
                }
              },
              '*': {
                validate: function validate(char) {
                  return (/^[\dA-Za-zА-Яа-я]$/.test(char)
                  );
                }
              },
              '#': {
                validate: function validate(char) {
                  return (/^[\dA-Za-zА-Яа-я]$/.test(char)
                  );
                },
                transform: function transform(char) {
                  return char.toUpperCase();
                }
              },
              '+': {
                validate: function validate() {
                  return true;
                }
              }
            }
          });
        }
        [].concat(_toConsumableArray(this.$refs.input.value)).reduce(function (memo, item) {
          return _this.maskCore.input(item);
        }, null);
        this.maskCore.setSelection({
          start: 0,
          end: 0
        });
        if (this.$refs.input.value === '') {
          this.$emit('input', '', '');
        } else {
          this.updateToCoreState();
        }
      } catch (e) {
        this.maskCore = null;
        this.$refs.input.value = 'Error';
        this.$emit('input', this.$refs.input.value, '');
      }
    },
    getValue: function getValue() {
      return this.maskCore ? this.maskCore.getValue() : '';
    },
    keyDown: function keyDown(e) {
      // Always
      if (this.maskCore === null) {
        e.preventDefault();
        return;
      }
      this.setNativeSelection();
      switch (e.keyCode) {
        // backspace
        case 8:
          e.preventDefault();
          if (this.maskCore.selection.start > this.marginLeft || this.maskCore.selection.start !== this.maskCore.selection.end) {
            this.maskCore.backspace();
            this.updateToCoreState();
          }
          break;

        // left arrow
        case 37:
          e.preventDefault();
          if (this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
            // this.$refs.input.selectionEnd = this.$refs.input.selectionStart - 1; @TODO
            this.$refs.input.selectionStart -= 1;
          }
          this.maskCore.selection = {
            start: this.$refs.input.selectionStart,
            end: this.$refs.input.selectionStart
          };
          this.updateToCoreState();
          break;

        // right arrow
        case 39:
          e.preventDefault();
          if (this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
            this.$refs.input.selectionEnd += 1;
          }
          this.maskCore.selection = {
            start: this.$refs.input.selectionEnd,
            end: this.$refs.input.selectionEnd
          };
          this.updateToCoreState();
          break;

        // end
        case 35:
          e.preventDefault();
          this.$refs.input.selectionStart = this.$refs.input.value.length;
          this.$refs.input.selectionEnd = this.$refs.input.value.length;
          this.maskCore.selection = {
            start: this.$refs.input.selectionEnd,
            end: this.$refs.input.selectionEnd
          };
          this.updateToCoreState();
          break;

        // home
        case 36:
          e.preventDefault();
          this.$refs.input.selectionStart = 0;
          this.$refs.input.selectionEnd = 0;
          this.maskCore.selection = {
            start: this.$refs.input.selectionStart,
            end: this.$refs.input.selectionStart
          };
          this.updateToCoreState();
          break;

        // delete
        case 46:
          e.preventDefault();
          if (this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
            this.maskCore.setValue('');
            this.maskCore.setSelection({
              start: 0,
              end: 0
            });
            this.$refs.input.selectionStart = this.maskCore.selection.start;
            this.$refs.input.selectionEnd = this.maskCore.selection.start;
          } else {
            this.maskCore.backspace();
          }
          this.updateToCoreState();
          break;

        default:
          break;
      }
    },
    keyPress: function keyPress(e) {
      // works only on Desktop
      if (e.ctrlKey) return; // Fix FF copy/paste issue
      // IE & FF are not trigger textInput event, so we have to force it
      /* eslint-disable */
      var isIE = /*@cc_on!@*/false || !!document.documentMode; //by http://stackoverflow.com/questions/9847580/how-to-detect-safari-chrome-ie-firefox-and-opera-browser
      /* eslint-enable */
      var isFirefox = typeof InstallTrigger !== 'undefined';
      if (isIE || isFirefox) {
        e.preventDefault();
        e.data = e.key;
        this.textInput(e);
      }
    },
    textInput: function textInput(e) {
      if (e.preventDefault) e.preventDefault();
      if (this.maskCore.input(e.data)) {
        this.updateAfterAll = true;
      }
      this.updateToCoreState();
    },
    keyUp: function keyUp(e) {
      if (e.keyCode === 9) {
        // Preven change selection for Tab in
        return;
      }
      this.updateToCoreState();
      this.updateAfterAll = false;
    },
    cut: function cut(e) {
      e.preventDefault();
      if (this.$refs.input.selectionStart !== this.$refs.input.selectionEnd) {
        try {
          document.execCommand('copy');
        } catch (err) {} // eslint-disable-line no-empty
        this.maskCore.backspace();
        this.updateToCoreState();
      }
    },
    copy: function copy() {},
    paste: function paste(e) {
      var _this2 = this;

      e.preventDefault();
      var text = e.clipboardData.getData('text');
      [].concat(_toConsumableArray(text)).reduce(function (memo, item) {
        return _this2.maskCore.input(item);
      }, null);
      this.updateToCoreState();
    },
    updateToCoreState: function updateToCoreState() {
      if (this.maskCore === null) {
        return;
      }
      if (this.$refs.input.value !== this.maskCore.getValue()) {
        this.$refs.input.value = this.maskCore.getValue();
        this.$emit('input', this.$refs.input.value, this.maskCore.getRawValue());
      }
      this.$refs.input.selectionStart = this.maskCore.selection.start;
      this.$refs.input.selectionEnd = this.maskCore.selection.end;
    },
    isEmpty: function isEmpty() {
      if (this.maskCore === null) return true;
      return this.maskCore.getValue() === this.maskCore.emptyValue;
    },
    focusOut: function focusOut() {
      if (this.isEmpty()) {
        this.$refs.input.value = '';
        this.maskCore.setSelection({
          start: 0,
          end: 0
        });
        this.$emit('input', '', '');
      }
    },
    setNativeSelection: function setNativeSelection() {
      this.maskCore.selection = {
        start: this.$refs.input.selectionStart,
        end: this.$refs.input.selectionEnd
      };
    },
    mouseUp: function mouseUp() {
      if (this.isEmpty() && this.$refs.input.selectionStart === this.$refs.input.selectionEnd) {
        this.maskCore.setSelection({
          start: 0,
          end: 0
        });
        this.$refs.input.selectionStart = this.maskCore.selection.start;
        this.$refs.input.selectionEnd = this.maskCore.selection.start;
        this.marginLeft = this.maskCore.selection.start;
        this.updateToCoreState();
      } else {
        this.setNativeSelection();
      }
    }
  }
});


/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(3);
module.exports = __webpack_require__(20);


/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

Nova.booting(function (Vue, router, store) {
    router.addRoutes([{
        name: 'citizen-finder',
        path: '/citizen-finder',
        component: __webpack_require__(4)
    }]);
});

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(5)
}
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(10)
/* template */
var __vue_template__ = __webpack_require__(19)
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
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(6);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(8)("6e5db1d0", content, false, {});
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
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(7)(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* Scoped Styles */\n", ""]);

// exports


/***/ }),
/* 7 */
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
/* 8 */
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

var listToStyles = __webpack_require__(9)

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
/* 9 */
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
/* 10 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__citizenView__ = __webpack_require__(11);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__citizenView___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__citizenView__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__newCitizenView__ = __webpack_require__(14);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__newCitizenView___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__newCitizenView__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_masked_input__ = __webpack_require__(1);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    mounted: function mounted() {},

    components: {
        citizenView: __WEBPACK_IMPORTED_MODULE_0__citizenView___default.a, newCitizenView: __WEBPACK_IMPORTED_MODULE_1__newCitizenView___default.a, MaskedInput: __WEBPACK_IMPORTED_MODULE_2_vue_masked_input__["a" /* default */]
    },
    data: function data() {
        return {
            fullData: {},
            working: false,
            citizen: false,
            noCitizens: false,
            newCitizenForm: false,
            findCitizens: []
        };
    },

    methods: {
        processFind: function processFind() {
            var _this = this;

            this.working = true;
            Nova.request().post('/search-citizen', {
                first_name: this.firstName,
                last_name: this.lastName,
                patronymic_name: this.patronymicName
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
        openForm: function openForm() {
            this.citizen = false;
            this.newCitizenForm = true;
        },
        assignCitizen: function assignCitizen(citizen) {
            this.citizen = citizen;
            this.newCitizenForm = false;
        }
    }
});

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(12)
/* template */
var __vue_template__ = __webpack_require__(13)
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
/* 12 */
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
/* 13 */
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

/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(15)
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
Component.options.__file = "resources/js/components/newCitizenView.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-d101be10", Component.options)
  } else {
    hotAPI.reload("data-v-d101be10", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 15 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_masked_input__ = __webpack_require__(1);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    name: 'newCitizenView',
    components: {
        MaskedInput: __WEBPACK_IMPORTED_MODULE_0_vue_masked_input__["a" /* default */]
    },
    data: function data() {
        return {
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

    props: ['newCitizenForm'],
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
        newCitizen: function newCitizen() {
            var _this2 = this;

            var myForm = document.getElementById('new_citizen_form'),
                data = new FormData(myForm);

            Nova.request().post('/save-citizen', data).then(function (_ref2) {
                var data = _ref2.data;

                _this2.$toasted.success(data.message);
                _this2.$emit('assignCitizenChild', data.citizen);
            });
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
                if (value.street_id === parseInt(streetId)) {
                    houses.push(value);
                }
            });
            this.filteredHouses = houses;
        }
    },
    mounted: function mounted() {
        this.getInfo();
    }
});

/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function extend(dest, src) {
  if (src) {
    var props = Object.keys(src)
    for (var i = 0, l = props.length; i < l ; i++) {
      dest[props[i]] = src[props[i]]
    }
  }
  return dest
}

function copy(obj) {
  return extend({}, obj)
}

/**
 * Merge an object defining format characters into the defaults.
 * Passing null/undefined for en existing format character removes it.
 * Passing a definition for an existing format character overrides it.
 * @param {?Object} formatCharacters.
 */
function mergeFormatCharacters(formatCharacters) {
  var merged = copy(DEFAULT_FORMAT_CHARACTERS)
  if (formatCharacters) {
    var chars = Object.keys(formatCharacters)
    for (var i = 0, l = chars.length; i < l ; i++) {
      var char = chars[i]
      if (formatCharacters[char] == null) {
        delete merged[char]
      }
      else {
        merged[char] = formatCharacters[char]
      }
    }
  }
  return merged
}

var ESCAPE_CHAR = '\\'

var DIGIT_RE = /^\d$/
var LETTER_RE = /^[A-Za-z]$/
var ALPHANNUMERIC_RE = /^[\dA-Za-z]$/

var DEFAULT_PLACEHOLDER_CHAR = '_'
var DEFAULT_FORMAT_CHARACTERS = {
  '*': {
    validate: function(char) { return ALPHANNUMERIC_RE.test(char) }
  },
  '1': {
    validate: function(char) { return DIGIT_RE.test(char) }
  },
  'a': {
    validate: function(char) { return LETTER_RE.test(char) }
  },
  'A': {
    validate: function(char) { return LETTER_RE.test(char) },
    transform: function(char) { return char.toUpperCase() }
  },
  '#': {
    validate: function(char) { return ALPHANNUMERIC_RE.test(char) },
    transform: function(char) { return char.toUpperCase() }
  }
}

/**
 * @param {string} source
 * @patam {?Object} formatCharacters
 */
function Pattern(source, formatCharacters, placeholderChar, isRevealingMask) {
  if (!(this instanceof Pattern)) {
    return new Pattern(source, formatCharacters, placeholderChar)
  }

  /** Placeholder character */
  this.placeholderChar = placeholderChar || DEFAULT_PLACEHOLDER_CHAR
  /** Format character definitions. */
  this.formatCharacters = formatCharacters || DEFAULT_FORMAT_CHARACTERS
  /** Pattern definition string with escape characters. */
  this.source = source
  /** Pattern characters after escape characters have been processed. */
  this.pattern = []
  /** Length of the pattern after escape characters have been processed. */
  this.length = 0
  /** Index of the first editable character. */
  this.firstEditableIndex = null
  /** Index of the last editable character. */
  this.lastEditableIndex = null
  /** Lookup for indices of editable characters in the pattern. */
  this._editableIndices = {}
  /** If true, only the pattern before the last valid value character shows. */
  this.isRevealingMask = isRevealingMask || false

  this._parse()
}

Pattern.prototype._parse = function parse() {
  var sourceChars = this.source.split('')
  var patternIndex = 0
  var pattern = []

  for (var i = 0, l = sourceChars.length; i < l; i++) {
    var char = sourceChars[i]
    if (char === ESCAPE_CHAR) {
      if (i === l - 1) {
        throw new Error('InputMask: pattern ends with a raw ' + ESCAPE_CHAR)
      }
      char = sourceChars[++i]
    }
    else if (char in this.formatCharacters) {
      if (this.firstEditableIndex === null) {
        this.firstEditableIndex = patternIndex
      }
      this.lastEditableIndex = patternIndex
      this._editableIndices[patternIndex] = true
    }

    pattern.push(char)
    patternIndex++
  }

  if (this.firstEditableIndex === null) {
    throw new Error(
      'InputMask: pattern "' + this.source + '" does not contain any editable characters.'
    )
  }

  this.pattern = pattern
  this.length = pattern.length
}

/**
 * @param {Array<string>} value
 * @return {Array<string>}
 */
Pattern.prototype.formatValue = function format(value) {
  var valueBuffer = new Array(this.length)
  var valueIndex = 0

  for (var i = 0, l = this.length; i < l ; i++) {
    if (this.isEditableIndex(i)) {
      if (this.isRevealingMask &&
          value.length <= valueIndex &&
          !this.isValidAtIndex(value[valueIndex], i)) {
        break
      }
      valueBuffer[i] = (value.length > valueIndex && this.isValidAtIndex(value[valueIndex], i)
                        ? this.transform(value[valueIndex], i)
                        : this.placeholderChar)
      valueIndex++
    }
    else {
      valueBuffer[i] = this.pattern[i]
      // Also allow the value to contain static values from the pattern by
      // advancing its index.
      if (value.length > valueIndex && value[valueIndex] === this.pattern[i]) {
        valueIndex++
      }
    }
  }

  return valueBuffer
}

/**
 * @param {number} index
 * @return {boolean}
 */
Pattern.prototype.isEditableIndex = function isEditableIndex(index) {
  return !!this._editableIndices[index]
}

/**
 * @param {string} char
 * @param {number} index
 * @return {boolean}
 */
Pattern.prototype.isValidAtIndex = function isValidAtIndex(char, index) {
  return this.formatCharacters[this.pattern[index]].validate(char)
}

Pattern.prototype.transform = function transform(char, index) {
  var format = this.formatCharacters[this.pattern[index]]
  return typeof format.transform == 'function' ? format.transform(char) : char
}

function InputMask(options) {
  if (!(this instanceof InputMask)) { return new InputMask(options) }
  options = extend({
    formatCharacters: null,
    pattern: null,
    isRevealingMask: false,
    placeholderChar: DEFAULT_PLACEHOLDER_CHAR,
    selection: {start: 0, end: 0},
    value: ''
  }, options)

  if (options.pattern == null) {
    throw new Error('InputMask: you must provide a pattern.')
  }

  if (typeof options.placeholderChar !== 'string' || options.placeholderChar.length > 1) {
    throw new Error('InputMask: placeholderChar should be a single character or an empty string.')
  }

  this.placeholderChar = options.placeholderChar
  this.formatCharacters = mergeFormatCharacters(options.formatCharacters)
  this.setPattern(options.pattern, {
    value: options.value,
    selection: options.selection,
    isRevealingMask: options.isRevealingMask
  })
}

// Editing

/**
 * Applies a single character of input based on the current selection.
 * @param {string} char
 * @return {boolean} true if a change has been made to value or selection as a
 *   result of the input, false otherwise.
 */
InputMask.prototype.input = function input(char) {
  // Ignore additional input if the cursor's at the end of the pattern
  if (this.selection.start === this.selection.end &&
      this.selection.start === this.pattern.length) {
    return false
  }

  var selectionBefore = copy(this.selection)
  var valueBefore = this.getValue()

  var inputIndex = this.selection.start

  // If the cursor or selection is prior to the first editable character, make
  // sure any input given is applied to it.
  if (inputIndex < this.pattern.firstEditableIndex) {
    inputIndex = this.pattern.firstEditableIndex
  }

  // Bail out or add the character to input
  if (this.pattern.isEditableIndex(inputIndex)) {
    if (!this.pattern.isValidAtIndex(char, inputIndex)) {
      return false
    }
    this.value[inputIndex] = this.pattern.transform(char, inputIndex)
  }

  // If multiple characters were selected, blank the remainder out based on the
  // pattern.
  var end = this.selection.end - 1
  while (end > inputIndex) {
    if (this.pattern.isEditableIndex(end)) {
      this.value[end] = this.placeholderChar
    }
    end--
  }

  // Advance the cursor to the next character
  this.selection.start = this.selection.end = inputIndex + 1

  // Skip over any subsequent static characters
  while (this.pattern.length > this.selection.start &&
         !this.pattern.isEditableIndex(this.selection.start)) {
    this.selection.start++
    this.selection.end++
  }

  // History
  if (this._historyIndex != null) {
    // Took more input after undoing, so blow any subsequent history away
    this._history.splice(this._historyIndex, this._history.length - this._historyIndex)
    this._historyIndex = null
  }
  if (this._lastOp !== 'input' ||
      selectionBefore.start !== selectionBefore.end ||
      this._lastSelection !== null && selectionBefore.start !== this._lastSelection.start) {
    this._history.push({value: valueBefore, selection: selectionBefore, lastOp: this._lastOp})
  }
  this._lastOp = 'input'
  this._lastSelection = copy(this.selection)

  return true
}

/**
 * Attempts to delete from the value based on the current cursor position or
 * selection.
 * @return {boolean} true if the value or selection changed as the result of
 *   backspacing, false otherwise.
 */
InputMask.prototype.backspace = function backspace() {
  // If the cursor is at the start there's nothing to do
  if (this.selection.start === 0 && this.selection.end === 0) {
    return false
  }

  var selectionBefore = copy(this.selection)
  var valueBefore = this.getValue()

  // No range selected - work on the character preceding the cursor
  if (this.selection.start === this.selection.end) {
    if (this.pattern.isEditableIndex(this.selection.start - 1)) {
      this.value[this.selection.start - 1] = this.placeholderChar
    }
    this.selection.start--
    this.selection.end--
  }
  // Range selected - delete characters and leave the cursor at the start of the selection
  else {
    var end = this.selection.end - 1
    while (end >= this.selection.start) {
      if (this.pattern.isEditableIndex(end)) {
        this.value[end] = this.placeholderChar
      }
      end--
    }
    this.selection.end = this.selection.start
  }

  // History
  if (this._historyIndex != null) {
    // Took more input after undoing, so blow any subsequent history away
    this._history.splice(this._historyIndex, this._history.length - this._historyIndex)
  }
  if (this._lastOp !== 'backspace' ||
      selectionBefore.start !== selectionBefore.end ||
      this._lastSelection !== null && selectionBefore.start !== this._lastSelection.start) {
    this._history.push({value: valueBefore, selection: selectionBefore, lastOp: this._lastOp})
  }
  this._lastOp = 'backspace'
  this._lastSelection = copy(this.selection)

  return true
}

/**
 * Attempts to paste a string of input at the current cursor position or over
 * the top of the current selection.
 * Invalid content at any position will cause the paste to be rejected, and it
 * may contain static parts of the mask's pattern.
 * @param {string} input
 * @return {boolean} true if the paste was successful, false otherwise.
 */
InputMask.prototype.paste = function paste(input) {
  // This is necessary because we're just calling input() with each character
  // and rolling back if any were invalid, rather than checking up-front.
  var initialState = {
    value: this.value.slice(),
    selection: copy(this.selection),
    _lastOp: this._lastOp,
    _history: this._history.slice(),
    _historyIndex: this._historyIndex,
    _lastSelection: copy(this._lastSelection)
  }

  // If there are static characters at the start of the pattern and the cursor
  // or selection is within them, the static characters must match for a valid
  // paste.
  if (this.selection.start < this.pattern.firstEditableIndex) {
    for (var i = 0, l = this.pattern.firstEditableIndex - this.selection.start; i < l; i++) {
      if (input.charAt(i) !== this.pattern.pattern[i]) {
        return false
      }
    }

    // Continue as if the selection and input started from the editable part of
    // the pattern.
    input = input.substring(this.pattern.firstEditableIndex - this.selection.start)
    this.selection.start = this.pattern.firstEditableIndex
  }

  for (i = 0, l = input.length;
       i < l && this.selection.start <= this.pattern.lastEditableIndex;
       i++) {
    var valid = this.input(input.charAt(i))
    // Allow static parts of the pattern to appear in pasted input - they will
    // already have been stepped over by input(), so verify that the value
    // deemed invalid by input() was the expected static character.
    if (!valid) {
      if (this.selection.start > 0) {
        // XXX This only allows for one static character to be skipped
        var patternIndex = this.selection.start - 1
        if (!this.pattern.isEditableIndex(patternIndex) &&
            input.charAt(i) === this.pattern.pattern[patternIndex]) {
          continue
        }
      }
      extend(this, initialState)
      return false
    }
  }

  return true
}

// History

InputMask.prototype.undo = function undo() {
  // If there is no history, or nothing more on the history stack, we can't undo
  if (this._history.length === 0 || this._historyIndex === 0) {
    return false
  }

  var historyItem
  if (this._historyIndex == null) {
    // Not currently undoing, set up the initial history index
    this._historyIndex = this._history.length - 1
    historyItem = this._history[this._historyIndex]
    // Add a new history entry if anything has changed since the last one, so we
    // can redo back to the initial state we started undoing from.
    var value = this.getValue()
    if (historyItem.value !== value ||
        historyItem.selection.start !== this.selection.start ||
        historyItem.selection.end !== this.selection.end) {
      this._history.push({value: value, selection: copy(this.selection), lastOp: this._lastOp, startUndo: true})
    }
  }
  else {
    historyItem = this._history[--this._historyIndex]
  }

  this.value = historyItem.value.split('')
  this.selection = historyItem.selection
  this._lastOp = historyItem.lastOp
  return true
}

InputMask.prototype.redo = function redo() {
  if (this._history.length === 0 || this._historyIndex == null) {
    return false
  }
  var historyItem = this._history[++this._historyIndex]
  // If this is the last history item, we're done redoing
  if (this._historyIndex === this._history.length - 1) {
    this._historyIndex = null
    // If the last history item was only added to start undoing, remove it
    if (historyItem.startUndo) {
      this._history.pop()
    }
  }
  this.value = historyItem.value.split('')
  this.selection = historyItem.selection
  this._lastOp = historyItem.lastOp
  return true
}

// Getters & setters

InputMask.prototype.setPattern = function setPattern(pattern, options) {
  options = extend({
    selection: {start: 0, end: 0},
    value: ''
  }, options)
  this.pattern = new Pattern(pattern, this.formatCharacters, this.placeholderChar, options.isRevealingMask)
  this.setValue(options.value)
  this.emptyValue = this.pattern.formatValue([]).join('')
  this.selection = options.selection
  this._resetHistory()
}

InputMask.prototype.setSelection = function setSelection(selection) {
  this.selection = copy(selection)
  if (this.selection.start === this.selection.end) {
    if (this.selection.start < this.pattern.firstEditableIndex) {
      this.selection.start = this.selection.end = this.pattern.firstEditableIndex
      return true
    }
    // Set selection to the first editable, non-placeholder character before the selection
    // OR to the beginning of the pattern
    var index = this.selection.start
    while (index >= this.pattern.firstEditableIndex) {
      if (this.pattern.isEditableIndex(index - 1) &&
          this.value[index - 1] !== this.placeholderChar ||
          index === this.pattern.firstEditableIndex) {
        this.selection.start = this.selection.end = index
        break
      }
      index--
    }
    return true
  }
  return false
}

InputMask.prototype.setValue = function setValue(value) {
  if (value == null) {
    value = ''
  }
  this.value = this.pattern.formatValue(value.split(''))
}

InputMask.prototype.getValue = function getValue() {
  return this.value.join('')
}

InputMask.prototype.getRawValue = function getRawValue() {
  var rawValue = []
  for (var i = 0; i < this.value.length; i++) {
    if (this.pattern._editableIndices[i] === true) {
      rawValue.push(this.value[i])
    }
  }
  return rawValue.join('')
}

InputMask.prototype._resetHistory = function _resetHistory() {
  this._history = []
  this._historyIndex = null
  this._lastOp = null
  this._lastSelection = copy(this.selection)
}

InputMask.Pattern = Pattern

module.exports = InputMask


/***/ }),
/* 17 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// Copy paste from https://gist.github.com/nuxodin/9250e56a3ce6c0446efa
/* harmony default export */ __webpack_exports__["a"] = (function () {
  var w = window,
      d = w.document;

  if (w.onfocusin === undefined) {
    d.addEventListener('focus', addPolyfill, true);
    d.addEventListener('blur', addPolyfill, true);
    d.addEventListener('focusin', removePolyfill, true);
    d.addEventListener('focusout', removePolyfill, true);
  }

  function addPolyfill(e) {
    var type = e.type === 'focus' ? 'focusin' : 'focusout';
    var event = new CustomEvent(type, {
      bubbles: true,
      cancelable: false
    });
    event.c1Generated = true;
    e.target.dispatchEvent(event);
  }

  function removePolyfill(e) {
    if (!e.c1Generated) {
      // focus after focusin, so chrome will the first time trigger tow times focusin
      d.removeEventListener('focus', addPolyfill, true);
      d.removeEventListener('blur', addPolyfill, true);
      d.removeEventListener('focusin', removePolyfill, true);
      d.removeEventListener('focusout', removePolyfill, true);
    }
    setTimeout(function () {
      d.removeEventListener('focusin', removePolyfill, true);
      d.removeEventListener('focusout', removePolyfill, true);
    });
  }
});;


/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { attrs: { id: "newCitizenView" } }, [
    _vm.newCitizenForm
      ? _c(
          "div",
          {
            staticClass: "relative rounded overflow-hidden mb-8 shadow-lg mt-6"
          },
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
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.date,
                              expression: "date"
                            }
                          ],
                          ref: "citizenValue",
                          staticClass:
                            "appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input",
                          attrs: {
                            id: "grid-birthdate-name",
                            name: "date_birth",
                            type: "text",
                            placeholder: "12-05-2019",
                            mask: "11 / 11 / 1111"
                          },
                          domProps: { value: _vm.date },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.date = $event.target.value
                            }
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
                                      var val =
                                        "_value" in o ? o._value : o.value
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
                      ? _c(
                          "div",
                          { staticClass: "flex flex-wrap -mx-3 mb-2" },
                          [_vm._m(0)]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _c("h2", [_vm._v("Адреса")]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "flex flex-wrap -mx-3 mb-2 mt-3" },
                      [
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
                                      _vm.electivePlotId = $event.target
                                        .multiple
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
                                _vm._l(_vm.electivePlots, function(
                                  electivePlot
                                ) {
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
                                            .call(
                                              $event.target.options,
                                              function(o) {
                                                return o.selected
                                              }
                                            )
                                            .map(function(o) {
                                              var val =
                                                "_value" in o
                                                  ? o._value
                                                  : o.value
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
                                    _vm._l(_vm.filteredStreets, function(
                                      street
                                    ) {
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
                      ]
                    ),
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
      : _vm._e()
  ])
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
    require("vue-hot-reload-api")      .rerender("data-v-d101be10", module.exports)
  }
}

/***/ }),
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "app" } },
    [
      _c("heading", { staticClass: "mb-6" }, [_vm._v("Пошук")]),
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
                "a",
                {
                  staticClass:
                    "bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4",
                  on: { click: _vm.openForm }
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
      _c("citizen-view", { attrs: { citizen: this.citizen } }),
      _vm._v(" "),
      _c("new-citizen-view", {
        attrs: { newCitizenForm: this.newCitizenForm, citizen: this.citizen },
        on: { assignCitizenChild: _vm.assignCitizen }
      })
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
/* 20 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);