/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/pages/jquery.todo.js":
/*!*******************************************!*\
  !*** ./resources/js/pages/jquery.todo.js ***!
  \*******************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Todo init js\r\n*/\n!function ($) {\n  \"use strict\";\n\n  var TodoApp = function TodoApp() {\n    this.$body = $(\"body\"), this.$todoContainer = $('#todo-container'), this.$todoMessage = $(\"#todo-message\"), this.$todoRemaining = $(\"#todo-remaining\"), this.$todoTotal = $(\"#todo-total\"), this.$archiveBtn = $(\"#btn-archive\"), this.$todoList = $(\"#todo-list\"), this.$todoDonechk = \".todo-done\", this.$todoForm = $(\"#todo-form\"), this.$todoInput = $(\"#todo-input-text\"), this.$todoBtn = $(\"#todo-btn-submit\"), this.$todoData = [{\n      'id': '1',\n      'text': 'Design One page theme',\n      'done': false\n    }, {\n      'id': '2',\n      'text': 'Build a js based app',\n      'done': true\n    }, {\n      'id': '3',\n      'text': 'Creating component page',\n      'done': true\n    }, {\n      'id': '4',\n      'text': 'Testing??',\n      'done': true\n    }, {\n      'id': '5',\n      'text': 'Hehe!! This looks cool!',\n      'done': false\n    }, {\n      'id': '6',\n      'text': 'Create new version 3.0',\n      'done': false\n    }, {\n      'id': '7',\n      'text': 'Build an angular app',\n      'done': true\n    }, {\n      'id': '8',\n      'text': 'Vue Admin & Dashboard  ',\n      'done': false\n    }];\n    this.$todoCompletedData = [];\n    this.$todoUnCompletedData = [];\n  }; //mark/unmark - you can use ajax to save data on server side\n\n\n  TodoApp.prototype.markTodo = function (todoId, complete) {\n    for (var count = 0; count < this.$todoData.length; count++) {\n      if (this.$todoData[count].id == todoId) {\n        this.$todoData[count].done = complete;\n      }\n    }\n  }, //adds new todo\n  TodoApp.prototype.addTodo = function (todoText) {\n    this.$todoData.push({\n      'id': this.$todoData.length,\n      'text': todoText,\n      'done': false\n    }); //regenerate list\n\n    this.generate();\n  }, //Archives the completed todos\n  TodoApp.prototype.archives = function () {\n    this.$todoUnCompletedData = [];\n\n    for (var count = 0; count < this.$todoData.length; count++) {\n      //geretaing html\n      var todoItem = this.$todoData[count];\n\n      if (todoItem.done == true) {\n        this.$todoCompletedData.push(todoItem);\n      } else {\n        this.$todoUnCompletedData.push(todoItem);\n      }\n    }\n\n    this.$todoData = [];\n    this.$todoData = [].concat(this.$todoUnCompletedData); //regenerate todo list\n\n    this.generate();\n  }, //Generates todos\n  TodoApp.prototype.generate = function () {\n    console.log(\"Generate\"); //clear list\n\n    this.$todoList.html(\"\");\n    var remaining = 0;\n\n    for (var count = 0; count < this.$todoData.length; count++) {\n      //geretaing html\n      var todoItem = this.$todoData[count];\n      if (todoItem.done == true) this.$todoList.prepend('<li class=\"list-group-item border-0 ps-0\"><div class=\"form-check\"><input type=\"checkbox\" class=\"form-check-input todo-done\" id=\"' + todoItem.id + '\" checked><label class=\"form-check-label\" for=\"' + todoItem.id + '\"><s>' + todoItem.text + '</s></label></div></li>');else {\n        remaining = remaining + 1;\n        this.$todoList.prepend('<li class=\"list-group-item border-0 ps-0\"><div class=\"form-check\"><input type=\"checkbox\" class=\"form-check-input todo-done\" id=\"' + todoItem.id + '\"><label class=\"form-check-label\" for=\"' + todoItem.id + '\">' + todoItem.text + '</label></div></li>');\n      }\n    } //set total in ui\n\n\n    this.$todoTotal.text(this.$todoData.length); //set remaining\n\n    this.$todoRemaining.text(remaining);\n  }, //init todo app\n  TodoApp.prototype.init = function () {\n    var $this = this; //generating todo list\n\n    window.addEventListener('load', function () {\n      $this.generate();\n    });\n    $this.$archiveBtn.on(\"click\", function (e) {\n      e.preventDefault();\n      $this.archives();\n      return false;\n    }); //binding todo done chk\n\n    $(document).on(\"change\", this.$todoDonechk, function () {\n      if (this.checked) $this.markTodo($(this).attr('id'), true);else $this.markTodo($(this).attr('id'), false); //regenerate list\n\n      $this.generate();\n    }); //binding the new todo button\n\n    $this.$todoForm.on(\"submit\", function (e) {\n      e.preventDefault();\n\n      if ($this.$todoInput.val() == \"\" || typeof $this.$todoInput.val() == 'undefined' || $this.$todoInput.val() == null) {\n        $this.$todoInput.focus();\n        return false;\n      } else {\n        $this.addTodo($this.$todoInput.val());\n        $this.$todoInput.val(\"\");\n        $this.$todoForm.removeClass('was-validated');\n        setTimeout(function () {\n          $this.$todoForm.removeClass('was-validated');\n        });\n        return true;\n      }\n    });\n  }, //init TodoApp\n  $.TodoApp = new TodoApp(), $.TodoApp.Constructor = TodoApp;\n}(window.jQuery), //initializing todo app\nfunction ($) {\n  \"use strict\";\n\n  $.TodoApp.init();\n}(window.jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly91Ym9sZC1sYXJhdmVsLy4vcmVzb3VyY2VzL2pzL3BhZ2VzL2pxdWVyeS50b2RvLmpzP2EwMjYiXSwibmFtZXMiOlsiJCIsIlRvZG9BcHAiLCIkYm9keSIsIiR0b2RvQ29udGFpbmVyIiwiJHRvZG9NZXNzYWdlIiwiJHRvZG9SZW1haW5pbmciLCIkdG9kb1RvdGFsIiwiJGFyY2hpdmVCdG4iLCIkdG9kb0xpc3QiLCIkdG9kb0RvbmVjaGsiLCIkdG9kb0Zvcm0iLCIkdG9kb0lucHV0IiwiJHRvZG9CdG4iLCIkdG9kb0RhdGEiLCIkdG9kb0NvbXBsZXRlZERhdGEiLCIkdG9kb1VuQ29tcGxldGVkRGF0YSIsInByb3RvdHlwZSIsIm1hcmtUb2RvIiwidG9kb0lkIiwiY29tcGxldGUiLCJjb3VudCIsImxlbmd0aCIsImlkIiwiZG9uZSIsImFkZFRvZG8iLCJ0b2RvVGV4dCIsInB1c2giLCJnZW5lcmF0ZSIsImFyY2hpdmVzIiwidG9kb0l0ZW0iLCJjb25jYXQiLCJjb25zb2xlIiwibG9nIiwiaHRtbCIsInJlbWFpbmluZyIsInByZXBlbmQiLCJ0ZXh0IiwiaW5pdCIsIiR0aGlzIiwid2luZG93IiwiYWRkRXZlbnRMaXN0ZW5lciIsIm9uIiwiZSIsInByZXZlbnREZWZhdWx0IiwiZG9jdW1lbnQiLCJjaGVja2VkIiwiYXR0ciIsInZhbCIsImZvY3VzIiwicmVtb3ZlQ2xhc3MiLCJzZXRUaW1lb3V0IiwiQ29uc3RydWN0b3IiLCJqUXVlcnkiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUEsQ0FBQyxVQUFTQSxDQUFULEVBQVk7QUFDVDs7QUFFQSxNQUFJQyxPQUFPLEdBQUcsU0FBVkEsT0FBVSxHQUFXO0FBQ3JCLFNBQUtDLEtBQUwsR0FBYUYsQ0FBQyxDQUFDLE1BQUQsQ0FBZCxFQUNBLEtBQUtHLGNBQUwsR0FBc0JILENBQUMsQ0FBQyxpQkFBRCxDQUR2QixFQUVBLEtBQUtJLFlBQUwsR0FBb0JK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Q0FBQ2EsTUFIVCxDQTlLQSIsInNvdXJjZXNDb250ZW50IjpbIi8qXHJcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcclxuQXV0aG9yOiBDb2RlclRoZW1lc1xyXG5XZWJzaXRlOiBodHRwczovL2NvZGVydGhlbWVzLmNvbS9cclxuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cclxuRmlsZTogVG9kbyBpbml0IGpzXHJcbiovXHJcblxyXG4hZnVuY3Rpb24oJCkge1xyXG4gICAgXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4gICAgdmFyIFRvZG9BcHAgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB0aGlzLiRib2R5ID0gJChcImJvZHlcIiksXHJcbiAgICAgICAgdGhpcy4kdG9kb0NvbnRhaW5lciA9ICQoJyN0b2RvLWNvbnRhaW5lcicpLFxyXG4gICAgICAgIHRoaXMuJHRvZG9NZXNzYWdlID0gJChcIiN0b2RvLW1lc3NhZ2VcIiksXHJcbiAgICAgICAgdGhpcy4kdG9kb1JlbWFpbmluZyA9ICQoXCIjdG9kby1yZW1haW5pbmdcIiksXHJcbiAgICAgICAgdGhpcy4kdG9kb1RvdGFsID0gJChcIiN0b2RvLXRvdGFsXCIpLFxyXG4gICAgICAgIHRoaXMuJGFyY2hpdmVCdG4gPSAkKFwiI2J0bi1hcmNoaXZlXCIpLFxyXG4gICAgICAgIHRoaXMuJHRvZG9MaXN0ID0gJChcIiN0b2RvLWxpc3RcIiksXHJcbiAgICAgICAgdGhpcy4kdG9kb0RvbmVjaGsgPSBcIi50b2RvLWRvbmVcIixcclxuICAgICAgICB0aGlzLiR0b2RvRm9ybSA9ICQoXCIjdG9kby1mb3JtXCIpLFxyXG4gICAgICAgIHRoaXMuJHRvZG9JbnB1dCA9ICQoXCIjdG9kby1pbnB1dC10ZXh0XCIpLFxyXG4gICAgICAgIHRoaXMuJHRvZG9CdG4gPSAkKFwiI3RvZG8tYnRuLXN1Ym1pdFwiKSxcclxuXHJcbiAgICAgICAgdGhpcy4kdG9kb0RhdGEgPSBbXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICAnaWQnOiAnMScsXHJcbiAgICAgICAgICAgICd0ZXh0JzogJ0Rlc2lnbiBPbmUgcGFnZSB0aGVtZScsXHJcbiAgICAgICAgICAgICdkb25lJzogZmFsc2VcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgJ2lkJzogJzInLFxyXG4gICAgICAgICAgICAndGV4dCc6ICdCdWlsZCBhIGpzIGJhc2VkIGFwcCcsXHJcbiAgICAgICAgICAgICdkb25lJzogdHJ1ZVxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICAnaWQnOiAnMycsXHJcbiAgICAgICAgICAgICd0ZXh0JzogJ0NyZWF0aW5nIGNvbXBvbmVudCBwYWdlJyxcclxuICAgICAgICAgICAgJ2RvbmUnOiB0cnVlXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgICdpZCc6ICc0JyxcclxuICAgICAgICAgICAgJ3RleHQnOiAnVGVzdGluZz8/JyxcclxuICAgICAgICAgICAgJ2RvbmUnOiB0cnVlXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgICdpZCc6ICc1JyxcclxuICAgICAgICAgICAgJ3RleHQnOiAnSGVoZSEhIFRoaXMgbG9va3MgY29vbCEnLFxyXG4gICAgICAgICAgICAnZG9uZSc6IGZhbHNlXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgICdpZCc6ICc2JyxcclxuICAgICAgICAgICAgJ3RleHQnOiAnQ3JlYXRlIG5ldyB2ZXJzaW9uIDMuMCcsXHJcbiAgICAgICAgICAgICdkb25lJzogZmFsc2VcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgJ2lkJzogJzcnLFxyXG4gICAgICAgICAgICAndGV4dCc6ICdCdWlsZCBhbiBhbmd1bGFyIGFwcCcsXHJcbiAgICAgICAgICAgICdkb25lJzogdHJ1ZVxyXG4gICAgICAgIH0se1xyXG4gICAgICAgICAgICAnaWQnOiAnOCcsXHJcbiAgICAgICAgICAgICd0ZXh0JzogJ1Z1ZSBBZG1pbiAmIERhc2hib2FyZCAgJyxcclxuICAgICAgICAgICAgJ2RvbmUnOiBmYWxzZVxyXG4gICAgICAgIH1dO1xyXG5cclxuICAgICAgICB0aGlzLiR0b2RvQ29tcGxldGVkRGF0YSA9IFtdO1xyXG4gICAgICAgIHRoaXMuJHRvZG9VbkNvbXBsZXRlZERhdGEgPSBbXTtcclxuICAgICAgIFxyXG4gICAgfTtcclxuXHJcbiAgICAvL21hcmsvdW5tYXJrIC0geW91IGNhbiB1c2UgYWpheCB0byBzYXZlIGRhdGEgb24gc2VydmVyIHNpZGVcclxuICAgIFRvZG9BcHAucHJvdG90eXBlLm1hcmtUb2RvID0gZnVuY3Rpb24odG9kb0lkLCBjb21wbGV0ZSkge1xyXG4gICAgICAgZm9yKHZhciBjb3VudD0wOyBjb3VudDx0aGlzLiR0b2RvRGF0YS5sZW5ndGg7Y291bnQrKykge1xyXG4gICAgICAgICAgICBpZih0aGlzLiR0b2RvRGF0YVtjb3VudF0uaWQgPT0gdG9kb0lkKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzLiR0b2RvRGF0YVtjb3VudF0uZG9uZSA9IGNvbXBsZXRlO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICB9XHJcbiAgICB9LFxyXG4gICAgLy9hZGRzIG5ldyB0b2RvXHJcbiAgICBUb2RvQXBwLnByb3RvdHlwZS5hZGRUb2RvID0gZnVuY3Rpb24odG9kb1RleHQpIHtcclxuICAgICAgICB0aGlzLiR0b2RvRGF0YS5wdXNoKHsnaWQnOiB0aGlzLiR0b2RvRGF0YS5sZW5ndGgsICd0ZXh0JzogdG9kb1RleHQsICdkb25lJzogZmFsc2V9KTtcclxuICAgICAgICAvL3JlZ2VuZXJhdGUgbGlzdFxyXG4gICAgICAgIHRoaXMuZ2VuZXJhdGUoKTtcclxuICAgIH0sXHJcbiAgICAvL0FyY2hpdmVzIHRoZSBjb21wbGV0ZWQgdG9kb3NcclxuICAgIFRvZG9BcHAucHJvdG90eXBlLmFyY2hpdmVzID0gZnVuY3Rpb24oKSB7XHJcbiAgICBcdHRoaXMuJHRvZG9VbkNvbXBsZXRlZERhdGEgPSBbXTtcclxuICAgICAgICBmb3IodmFyIGNvdW50PTA7IGNvdW50PHRoaXMuJHRvZG9EYXRhLmxlbmd0aDtjb3VudCsrKSB7XHJcbiAgICAgICAgICAgIC8vZ2VyZXRhaW5nIGh0bWxcclxuICAgICAgICAgICAgdmFyIHRvZG9JdGVtID0gdGhpcy4kdG9kb0RhdGFbY291bnRdO1xyXG4gICAgICAgICAgICBpZih0b2RvSXRlbS5kb25lID09IHRydWUpIHtcclxuICAgICAgICAgICAgICAgIHRoaXMuJHRvZG9Db21wbGV0ZWREYXRhLnB1c2godG9kb0l0ZW0pO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgdGhpcy4kdG9kb1VuQ29tcGxldGVkRGF0YS5wdXNoKHRvZG9JdGVtKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICB0aGlzLiR0b2RvRGF0YSA9IFtdO1xyXG4gICAgICAgIHRoaXMuJHRvZG9EYXRhID0gW10uY29uY2F0KHRoaXMuJHRvZG9VbkNvbXBsZXRlZERhdGEpO1xyXG4gICAgICAgIC8vcmVnZW5lcmF0ZSB0b2RvIGxpc3RcclxuICAgICAgICB0aGlzLmdlbmVyYXRlKCk7XHJcbiAgICB9LFxyXG4gICAgLy9HZW5lcmF0ZXMgdG9kb3NcclxuICAgIFRvZG9BcHAucHJvdG90eXBlLmdlbmVyYXRlID0gZnVuY3Rpb24oKSB7XHJcblxyXG5cclxuICAgICAgICBjb25zb2xlLmxvZyhcIkdlbmVyYXRlXCIpO1xyXG5cclxuICAgICAgICAvL2NsZWFyIGxpc3RcclxuICAgICAgICB0aGlzLiR0b2RvTGlzdC5odG1sKFwiXCIpO1xyXG4gICAgICAgIHZhciByZW1haW5pbmcgPSAwO1xyXG4gICAgICAgIGZvcih2YXIgY291bnQ9MDsgY291bnQ8dGhpcy4kdG9kb0RhdGEubGVuZ3RoO2NvdW50KyspIHtcclxuICAgICAgICAgICAgLy9nZXJldGFpbmcgaHRtbFxyXG4gICAgICAgICAgICB2YXIgdG9kb0l0ZW0gPSB0aGlzLiR0b2RvRGF0YVtjb3VudF07XHJcbiAgICAgICAgICAgIGlmKHRvZG9JdGVtLmRvbmUgPT0gdHJ1ZSlcclxuICAgICAgICAgICAgICAgIHRoaXMuJHRvZG9MaXN0LnByZXBlbmQoJzxsaSBjbGFzcz1cImxpc3QtZ3JvdXAtaXRlbSBib3JkZXItMCBwcy0wXCI+PGRpdiBjbGFzcz1cImZvcm0tY2hlY2tcIj48aW5wdXQgdHlwZT1cImNoZWNrYm94XCIgY2xhc3M9XCJmb3JtLWNoZWNrLWlucHV0IHRvZG8tZG9uZVwiIGlkPVwiJyArIHRvZG9JdGVtLmlkICsgJ1wiIGNoZWNrZWQ+PGxhYmVsIGNsYXNzPVwiZm9ybS1jaGVjay1sYWJlbFwiIGZvcj1cIicgKyB0b2RvSXRlbS5pZCArICdcIj48cz4nICsgdG9kb0l0ZW0udGV4dCArICc8L3M+PC9sYWJlbD48L2Rpdj48L2xpPicpO1xyXG4gICAgICAgICAgICBlbHNlIHtcclxuICAgICAgICAgICAgICAgIHJlbWFpbmluZyA9IHJlbWFpbmluZyArIDE7XHJcbiAgICAgICAgICAgICAgICB0aGlzLiR0b2RvTGlzdC5wcmVwZW5kKCc8bGkgY2xhc3M9XCJsaXN0LWdyb3VwLWl0ZW0gYm9yZGVyLTAgcHMtMFwiPjxkaXYgY2xhc3M9XCJmb3JtLWNoZWNrXCI+PGlucHV0IHR5cGU9XCJjaGVja2JveFwiIGNsYXNzPVwiZm9ybS1jaGVjay1pbnB1dCB0b2RvLWRvbmVcIiBpZD1cIicgKyB0b2RvSXRlbS5pZCArICdcIj48bGFiZWwgY2xhc3M9XCJmb3JtLWNoZWNrLWxhYmVsXCIgZm9yPVwiJyArIHRvZG9JdGVtLmlkICsgJ1wiPicgKyB0b2RvSXRlbS50ZXh0ICsgJzwvbGFiZWw+PC9kaXY+PC9saT4nKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy9zZXQgdG90YWwgaW4gdWlcclxuICAgICAgICB0aGlzLiR0b2RvVG90YWwudGV4dCh0aGlzLiR0b2RvRGF0YS5sZW5ndGgpO1xyXG5cclxuXHJcbiAgICAgICAgLy9zZXQgcmVtYWluaW5nXHJcbiAgICAgICAgdGhpcy4kdG9kb1JlbWFpbmluZy50ZXh0KHJlbWFpbmluZyk7XHJcbiAgICAgICAgXHJcbiAgICB9LFxyXG4gICAgLy9pbml0IHRvZG8gYXBwXHJcbiAgICBUb2RvQXBwLnByb3RvdHlwZS5pbml0ID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIHZhciAkdGhpcyA9IHRoaXM7XHJcbiAgICAgICAgLy9nZW5lcmF0aW5nIHRvZG8gbGlzdFxyXG5cclxuXHJcbiAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAkdGhpcy5nZW5lcmF0ZSgpOyAgICBcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgXHJcbiAgICAgICAgJHRoaXMuJGFyY2hpdmVCdG4ub24oXCJjbGlja1wiLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgXHRlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICR0aGlzLmFyY2hpdmVzKCk7XHJcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy9iaW5kaW5nIHRvZG8gZG9uZSBjaGtcclxuICAgICAgICAkKGRvY3VtZW50KS5vbihcImNoYW5nZVwiLCB0aGlzLiR0b2RvRG9uZWNoaywgZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGlmKHRoaXMuY2hlY2tlZCkgXHJcbiAgICAgICAgICAgICAgICAkdGhpcy5tYXJrVG9kbygkKHRoaXMpLmF0dHIoJ2lkJyksIHRydWUpO1xyXG4gICAgICAgICAgICBlbHNlXHJcbiAgICAgICAgICAgICAgICAkdGhpcy5tYXJrVG9kbygkKHRoaXMpLmF0dHIoJ2lkJyksIGZhbHNlKTtcclxuICAgICAgICAgICAgLy9yZWdlbmVyYXRlIGxpc3RcclxuICAgICAgICAgICAgJHRoaXMuZ2VuZXJhdGUoKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy9iaW5kaW5nIHRoZSBuZXcgdG9kbyBidXR0b25cclxuICAgICAgICAkdGhpcy4kdG9kb0Zvcm0ub24oXCJzdWJtaXRcIiwgZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgIGlmICgkdGhpcy4kdG9kb0lucHV0LnZhbCgpID09IFwiXCIgfHwgdHlwZW9mKCR0aGlzLiR0b2RvSW5wdXQudmFsKCkpID09ICd1bmRlZmluZWQnIHx8ICR0aGlzLiR0b2RvSW5wdXQudmFsKCkgPT0gbnVsbCkge1xyXG4gICAgICAgICAgICAgICAgJHRoaXMuJHRvZG9JbnB1dC5mb2N1cygpO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgJHRoaXMuYWRkVG9kbygkdGhpcy4kdG9kb0lucHV0LnZhbCgpKTtcclxuICAgICAgICAgICAgICAgICR0aGlzLiR0b2RvSW5wdXQudmFsKFwiXCIpO1xyXG5cclxuICAgICAgICAgICAgICAgICR0aGlzLiR0b2RvRm9ybS5yZW1vdmVDbGFzcygnd2FzLXZhbGlkYXRlZCcpO1xyXG4gICAgICAgICAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgICAgICAkdGhpcy4kdG9kb0Zvcm0ucmVtb3ZlQ2xhc3MoJ3dhcy12YWxpZGF0ZWQnKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIHRydWU7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcblxyXG4gICAgfSxcclxuICAgIC8vaW5pdCBUb2RvQXBwXHJcbiAgICAkLlRvZG9BcHAgPSBuZXcgVG9kb0FwcCwgJC5Ub2RvQXBwLkNvbnN0cnVjdG9yID0gVG9kb0FwcFxyXG4gICAgXHJcbn0od2luZG93LmpRdWVyeSksXHJcblxyXG4vL2luaXRpYWxpemluZyB0b2RvIGFwcFxyXG5mdW5jdGlvbigkKSB7XHJcbiAgICBcInVzZSBzdHJpY3RcIjtcclxuICAgICQuVG9kb0FwcC5pbml0KClcclxufSh3aW5kb3cualF1ZXJ5KTsiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3BhZ2VzL2pxdWVyeS50b2RvLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/jquery.todo.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/jquery.todo.js"]();
/******/ 	
/******/ })()
;