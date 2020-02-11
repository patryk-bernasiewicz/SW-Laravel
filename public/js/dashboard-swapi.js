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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboard-swapi.js":
/*!*****************************************!*\
  !*** ./resources/js/dashboard-swapi.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.addEventListener('load', function () {
  var loader, infoBox, loading;

  var showLoader = function showLoader() {
    var show = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
    var parent = arguments.length > 1 ? arguments[1] : undefined;
    loading = !!show;

    if (!loader) {
      loader = document.createElement('img');
      loader.src = '/img/spinner.svg';
      loader.alt = 'Loading...';
      loader.classList.add('w-16', 'h-16', 'ml-4');

      if (!show) {
        loader.classList.add('hidden');
      }

      loader.style = 'margin: -.75em 0;';
      parent.insertAdjacentElement('afterend', loader);
    } else {
      if (show) {
        loader.classList.remove('hidden');
      } else {
        loader.classList.add('hidden');
      }
    }
  };

  var showInfoBox = function showInfoBox(text) {
    var show = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
    var parent = arguments.length > 2 ? arguments[2] : undefined;

    if (!infoBox) {
      infoBox = document.createElement('div');
      infoBox.classList.add('mt-2', 'mb-1', 'text-green-500');
      parent.insertAdjacentElement('beforebegin', infoBox);
    }

    if (show) {
      infoBox.classList.remove('hidden');
    } else {
      infoBox.classList.add('hidden');
    }

    infoBox.innerText = text;
  };

  var refreshBtn = document.querySelector('#swapi_refresh');
  refreshBtn.addEventListener('click', function (e) {
    if (loading) return;
    showLoader(true, e.target);
    e.target.setAttribute('disabled', 'disabled');
    showInfoBox('Working! Please do not refresh the browser and do not close the window.', true, e.target.parentElement);
    fetch('/dashboard/swapi/refresh', {
      cache: 'no-cache',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    }).then(function (res) {
      return res.json();
    }).then(function (res) {
      showLoader(false, e.target);
      showInfoBox(res.message);
      e.target.removeAttribute('disabled', 'disabled');
    })["catch"](function (err) {
      showLoader(false, e.target);
      showInfoBox(err.message);
      e.target.removeAttribute('disabled', 'disabled');
    });
  });
});

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/dashboard-swapi.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Code\laravel\resources\js\dashboard-swapi.js */"./resources/js/dashboard-swapi.js");


/***/ })

/******/ });