/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/page/modules-datatables.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/page/modules-datatables.js ***!
  \********************************************************/
/***/ (() => {

eval("\n\n$(\"[data-checkboxes]\").each(function () {\n  var me = $(this),\n      group = me.data('checkboxes'),\n      role = me.data('checkbox-role');\n  me.change(function () {\n    var all = $('[data-checkboxes=\"' + group + '\"]:not([data-checkbox-role=\"dad\"])'),\n        checked = $('[data-checkboxes=\"' + group + '\"]:not([data-checkbox-role=\"dad\"]):checked'),\n        dad = $('[data-checkboxes=\"' + group + '\"][data-checkbox-role=\"dad\"]'),\n        total = all.length,\n        checked_length = checked.length;\n\n    if (role == 'dad') {\n      if (me.is(':checked')) {\n        all.prop('checked', true);\n      } else {\n        all.prop('checked', false);\n      }\n    } else {\n      if (checked_length >= total) {\n        dad.prop('checked', true);\n      } else {\n        dad.prop('checked', false);\n      }\n    }\n  });\n});\n$(\"#table-1\").dataTable({\n  \"columnDefs\": [{\n    \"sortable\": false,\n    \"targets\": [2, 3]\n  }]\n});\n$(\"#table-2\").dataTable({\n  \"columnDefs\": [{\n    \"sortable\": false,\n    \"targets\": [0, 2, 3]\n  }]\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3BhZ2UvbW9kdWxlcy1kYXRhdGFibGVzLmpzPzE2ODUiXSwibmFtZXMiOlsiJCIsImVhY2giLCJtZSIsImdyb3VwIiwiZGF0YSIsInJvbGUiLCJjaGFuZ2UiLCJhbGwiLCJjaGVja2VkIiwiZGFkIiwidG90YWwiLCJsZW5ndGgiLCJjaGVja2VkX2xlbmd0aCIsImlzIiwicHJvcCIsImRhdGFUYWJsZSJdLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWJBLENBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCQyxJQUF2QixDQUE0QixZQUFXO0FBQ3JDLE1BQUlDLEVBQUUsR0FBR0YsQ0FBQyxDQUFDLElBQUQsQ0FBVjtBQUFBLE1BQ0VHLEtBQUssR0FBR0QsRUFBRSxDQUFDRSxJQUFILENBQVEsWUFBUixDQURWO0FBQUEsTUFFRUMsSUFBSSxHQUFHSCxFQUFFLENBQUNFLElBQUgsQ0FBUSxlQUFSLENBRlQ7QUFJQUYsSUFBRSxDQUFDSSxNQUFILENBQVUsWUFBVztBQUNuQixRQUFJQyxHQUFHLEdBQUdQLENBQUMsQ0FBQyx1QkFBdUJHLEtBQXZCLEdBQStCLG9DQUFoQyxDQUFYO0FBQUEsUUFDRUssT0FBTyxHQUFHUixDQUFDLENBQUMsdUJBQXVCRyxLQUF2QixHQUErQiw0Q0FBaEMsQ0FEYjtBQUFBLFFBRUVNLEdBQUcsR0FBR1QsQ0FBQyxDQUFDLHVCQUF1QkcsS0FBdkIsR0FBK0IsOEJBQWhDLENBRlQ7QUFBQSxRQUdFTyxLQUFLLEdBQUdILEdBQUcsQ0FBQ0ksTUFIZDtBQUFBLFFBSUVDLGNBQWMsR0FBR0osT0FBTyxDQUFDRyxNQUozQjs7QUFNQSxRQUFHTixJQUFJLElBQUksS0FBWCxFQUFrQjtBQUNoQixVQUFHSCxFQUFFLENBQUNXLEVBQUgsQ0FBTSxVQUFOLENBQUgsRUFBc0I7QUFDcEJOLFdBQUcsQ0FBQ08sSUFBSixDQUFTLFNBQVQsRUFBb0IsSUFBcEI7QUFDRCxPQUZELE1BRUs7QUFDSFAsV0FBRyxDQUFDTyxJQUFKLENBQVMsU0FBVCxFQUFvQixLQUFwQjtBQUNEO0FBQ0YsS0FORCxNQU1LO0FBQ0gsVUFBR0YsY0FBYyxJQUFJRixLQUFyQixFQUE0QjtBQUMxQkQsV0FBRyxDQUFDSyxJQUFKLENBQVMsU0FBVCxFQUFvQixJQUFwQjtBQUNELE9BRkQsTUFFSztBQUNITCxXQUFHLENBQUNLLElBQUosQ0FBUyxTQUFULEVBQW9CLEtBQXBCO0FBQ0Q7QUFDRjtBQUNGLEdBcEJEO0FBcUJELENBMUJEO0FBNEJBZCxDQUFDLENBQUMsVUFBRCxDQUFELENBQWNlLFNBQWQsQ0FBd0I7QUFDdEIsZ0JBQWMsQ0FDWjtBQUFFLGdCQUFZLEtBQWQ7QUFBcUIsZUFBVyxDQUFDLENBQUQsRUFBRyxDQUFIO0FBQWhDLEdBRFk7QUFEUSxDQUF4QjtBQUtBZixDQUFDLENBQUMsVUFBRCxDQUFELENBQWNlLFNBQWQsQ0FBd0I7QUFDdEIsZ0JBQWMsQ0FDWjtBQUFFLGdCQUFZLEtBQWQ7QUFBcUIsZUFBVyxDQUFDLENBQUQsRUFBRyxDQUFILEVBQUssQ0FBTDtBQUFoQyxHQURZO0FBRFEsQ0FBeEIiLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3BhZ2UvbW9kdWxlcy1kYXRhdGFibGVzLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cbiQoXCJbZGF0YS1jaGVja2JveGVzXVwiKS5lYWNoKGZ1bmN0aW9uKCkge1xuICB2YXIgbWUgPSAkKHRoaXMpLFxuICAgIGdyb3VwID0gbWUuZGF0YSgnY2hlY2tib3hlcycpLFxuICAgIHJvbGUgPSBtZS5kYXRhKCdjaGVja2JveC1yb2xlJyk7XG5cbiAgbWUuY2hhbmdlKGZ1bmN0aW9uKCkge1xuICAgIHZhciBhbGwgPSAkKCdbZGF0YS1jaGVja2JveGVzPVwiJyArIGdyb3VwICsgJ1wiXTpub3QoW2RhdGEtY2hlY2tib3gtcm9sZT1cImRhZFwiXSknKSxcbiAgICAgIGNoZWNrZWQgPSAkKCdbZGF0YS1jaGVja2JveGVzPVwiJyArIGdyb3VwICsgJ1wiXTpub3QoW2RhdGEtY2hlY2tib3gtcm9sZT1cImRhZFwiXSk6Y2hlY2tlZCcpLFxuICAgICAgZGFkID0gJCgnW2RhdGEtY2hlY2tib3hlcz1cIicgKyBncm91cCArICdcIl1bZGF0YS1jaGVja2JveC1yb2xlPVwiZGFkXCJdJyksXG4gICAgICB0b3RhbCA9IGFsbC5sZW5ndGgsXG4gICAgICBjaGVja2VkX2xlbmd0aCA9IGNoZWNrZWQubGVuZ3RoO1xuXG4gICAgaWYocm9sZSA9PSAnZGFkJykge1xuICAgICAgaWYobWUuaXMoJzpjaGVja2VkJykpIHtcbiAgICAgICAgYWxsLnByb3AoJ2NoZWNrZWQnLCB0cnVlKTtcbiAgICAgIH1lbHNle1xuICAgICAgICBhbGwucHJvcCgnY2hlY2tlZCcsIGZhbHNlKTtcbiAgICAgIH1cbiAgICB9ZWxzZXtcbiAgICAgIGlmKGNoZWNrZWRfbGVuZ3RoID49IHRvdGFsKSB7XG4gICAgICAgIGRhZC5wcm9wKCdjaGVja2VkJywgdHJ1ZSk7XG4gICAgICB9ZWxzZXtcbiAgICAgICAgZGFkLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XG4gICAgICB9XG4gICAgfVxuICB9KTtcbn0pO1xuXG4kKFwiI3RhYmxlLTFcIikuZGF0YVRhYmxlKHtcbiAgXCJjb2x1bW5EZWZzXCI6IFtcbiAgICB7IFwic29ydGFibGVcIjogZmFsc2UsIFwidGFyZ2V0c1wiOiBbMiwzXSB9XG4gIF1cbn0pO1xuJChcIiN0YWJsZS0yXCIpLmRhdGFUYWJsZSh7XG4gIFwiY29sdW1uRGVmc1wiOiBbXG4gICAgeyBcInNvcnRhYmxlXCI6IGZhbHNlLCBcInRhcmdldHNcIjogWzAsMiwzXSB9XG4gIF1cbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/js/page/modules-datatables.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/js/page/modules-datatables.js"]();
/******/ 	
/******/ })()
;