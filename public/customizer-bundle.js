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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./js/customizer.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./js/customizer.js":
/*!**************************!*\
  !*** ./js/customizer.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/* global wp, jQuery */\n\n/**\n * File customizer.js.\n *\n * Theme Customizer enhancements for a better user experience.\n *\n * Contains handlers to make Theme Customizer preview reload changes asynchronously.\n */\n(function ($) {\n  // Site title and description.\n  wp.customize('blogname', function (value) {\n    value.bind(function (to) {\n      $('.site-title a').text(to);\n    });\n  });\n  wp.customize('blogdescription', function (value) {\n    value.bind(function (to) {\n      $('.site-description').text(to);\n    });\n  }); // Header text color.\n\n  wp.customize('header_textcolor', function (value) {\n    value.bind(function (to) {\n      if ('blank' === to) {\n        $('.site-title, .site-description').css({\n          clip: 'rect(1px, 1px, 1px, 1px)',\n          position: 'absolute'\n        });\n      } else {\n        $('.site-title, .site-description').css({\n          clip: 'auto',\n          position: 'relative'\n        });\n        $('.site-title a, .site-description').css({\n          color: to\n        });\n      }\n    });\n  });\n})(jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9qcy9jdXN0b21pemVyLmpzLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vanMvY3VzdG9taXplci5qcz9hNjgzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qIGdsb2JhbCB3cCwgalF1ZXJ5ICovXG5cbi8qKlxuICogRmlsZSBjdXN0b21pemVyLmpzLlxuICpcbiAqIFRoZW1lIEN1c3RvbWl6ZXIgZW5oYW5jZW1lbnRzIGZvciBhIGJldHRlciB1c2VyIGV4cGVyaWVuY2UuXG4gKlxuICogQ29udGFpbnMgaGFuZGxlcnMgdG8gbWFrZSBUaGVtZSBDdXN0b21pemVyIHByZXZpZXcgcmVsb2FkIGNoYW5nZXMgYXN5bmNocm9ub3VzbHkuXG4gKi9cbihmdW5jdGlvbiAoJCkge1xuICAvLyBTaXRlIHRpdGxlIGFuZCBkZXNjcmlwdGlvbi5cbiAgd3AuY3VzdG9taXplKCdibG9nbmFtZScsIGZ1bmN0aW9uICh2YWx1ZSkge1xuICAgIHZhbHVlLmJpbmQoZnVuY3Rpb24gKHRvKSB7XG4gICAgICAkKCcuc2l0ZS10aXRsZSBhJykudGV4dCh0byk7XG4gICAgfSk7XG4gIH0pO1xuICB3cC5jdXN0b21pemUoJ2Jsb2dkZXNjcmlwdGlvbicsIGZ1bmN0aW9uICh2YWx1ZSkge1xuICAgIHZhbHVlLmJpbmQoZnVuY3Rpb24gKHRvKSB7XG4gICAgICAkKCcuc2l0ZS1kZXNjcmlwdGlvbicpLnRleHQodG8pO1xuICAgIH0pO1xuICB9KTsgLy8gSGVhZGVyIHRleHQgY29sb3IuXG5cbiAgd3AuY3VzdG9taXplKCdoZWFkZXJfdGV4dGNvbG9yJywgZnVuY3Rpb24gKHZhbHVlKSB7XG4gICAgdmFsdWUuYmluZChmdW5jdGlvbiAodG8pIHtcbiAgICAgIGlmICgnYmxhbmsnID09PSB0bykge1xuICAgICAgICAkKCcuc2l0ZS10aXRsZSwgLnNpdGUtZGVzY3JpcHRpb24nKS5jc3Moe1xuICAgICAgICAgIGNsaXA6ICdyZWN0KDFweCwgMXB4LCAxcHgsIDFweCknLFxuICAgICAgICAgIHBvc2l0aW9uOiAnYWJzb2x1dGUnXG4gICAgICAgIH0pO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgJCgnLnNpdGUtdGl0bGUsIC5zaXRlLWRlc2NyaXB0aW9uJykuY3NzKHtcbiAgICAgICAgICBjbGlwOiAnYXV0bycsXG4gICAgICAgICAgcG9zaXRpb246ICdyZWxhdGl2ZSdcbiAgICAgICAgfSk7XG4gICAgICAgICQoJy5zaXRlLXRpdGxlIGEsIC5zaXRlLWRlc2NyaXB0aW9uJykuY3NzKHtcbiAgICAgICAgICBjb2xvcjogdG9cbiAgICAgICAgfSk7XG4gICAgICB9XG4gICAgfSk7XG4gIH0pO1xufSkoalF1ZXJ5KTsiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./js/customizer.js\n");

/***/ })

/******/ });