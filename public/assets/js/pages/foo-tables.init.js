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

/***/ "./resources/js/pages/foo-tables.init.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/foo-tables.init.js ***!
  \***********************************************/
/***/ (() => {

eval("/*\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\nAuthor: CoderThemes\nWebsite: https://coderthemes.com/\nContact: support@coderthemes.com\nFile: Foo tables init js\n*/\n$(window).on('load', function () {\n  // Row Toggler\n  // -----------------------------------------------------------------\n  $('#demo-foo-row-toggler').footable(); // Accordion\n  // -----------------------------------------------------------------\n\n  $('#demo-foo-accordion').footable().on('footable_row_expanded', function (e) {\n    $('#demo-foo-accordion tbody tr.footable-detail-show').not(e.row).each(function () {\n      $('#demo-foo-accordion').data('footable').toggleDetail(this);\n    });\n  }); // Pagination\n  // -----------------------------------------------------------------\n\n  $('#demo-foo-pagination').footable();\n  $('#demo-show-entries').change(function (e) {\n    e.preventDefault();\n    var pageSize = $(this).val();\n    $('#demo-foo-pagination').data('page-size', pageSize);\n    $('#demo-foo-pagination').trigger('footable_initialized');\n  }); // Filtering\n  // -----------------------------------------------------------------\n\n  var filtering = $('#demo-foo-filtering');\n  filtering.footable().on('footable_filtering', function (e) {\n    var selected = $('#demo-foo-filter-status').find(':selected').val();\n    e.filter += e.filter && e.filter.length > 0 ? ' ' + selected : selected;\n    e.clear = !e.filter;\n  }); // Filter status\n\n  $('#demo-foo-filter-status').change(function (e) {\n    e.preventDefault();\n    filtering.trigger('footable_filter', {\n      filter: $(this).val()\n    });\n  }); // Search input\n\n  $('#demo-foo-search').on('input', function (e) {\n    e.preventDefault();\n    filtering.trigger('footable_filter', {\n      filter: $(this).val()\n    });\n  }); // Add & Remove Row\n  // -----------------------------------------------------------------\n\n  var addrow = $('#demo-foo-addrow');\n  addrow.footable().on('click', '.demo-delete-row', function () {\n    //get the footable object\n    var footable = addrow.data('footable'); //get the row we are wanting to delete\n\n    var row = $(this).parents('tr:first'); //delete the row\n\n    footable.removeRow(row);\n  }); // Search input\n\n  $('#demo-input-search2').on('input', function (e) {\n    e.preventDefault();\n    addrow.trigger('footable_filter', {\n      filter: $(this).val()\n    });\n  }); // Add Row Button\n\n  $('#demo-btn-addrow').click(function () {\n    //get the footable object\n    var footable = addrow.data('footable'); //build up the row we are wanting to add\n\n    var newRow = '<tr><td style=\"text-align: center;\"><button class=\"demo-delete-row btn btn-danger btn-xs btn-icon\"><i class=\"fa fa-times\"></i></button></td><td>Adam</td><td>Doe</td><td>Traffic Court Referee</td><td>22 Jun 1972</td><td><span class=\"badge label-table badge-success   \">Active</span></td></tr>'; //add it\n\n    footable.appendRow(newRow);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly91Ym9sZC1sYXJhdmVsLy4vcmVzb3VyY2VzL2pzL3BhZ2VzL2Zvby10YWJsZXMuaW5pdC5qcz81NzkzIl0sIm5hbWVzIjpbIiQiLCJ3aW5kb3ciLCJvbiIsImZvb3RhYmxlIiwiZSIsIm5vdCIsInJvdyIsImVhY2giLCJkYXRhIiwidG9nZ2xlRGV0YWlsIiwiY2hhbmdlIiwicHJldmVudERlZmF1bHQiLCJwYWdlU2l6ZSIsInZhbCIsInRyaWdnZXIiLCJmaWx0ZXJpbmciLCJzZWxlY3RlZCIsImZpbmQiLCJmaWx0ZXIiLCJsZW5ndGgiLCJjbGVhciIsImFkZHJvdyIsInBhcmVudHMiLCJyZW1vdmVSb3ciLCJjbGljayIsIm5ld1JvdyIsImFwcGVuZFJvdyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQUEsQ0FBQyxDQUFDQyxNQUFELENBQUQsQ0FBVUMsRUFBVixDQUFhLE1BQWIsRUFBcUIsWUFBVztBQUU1QjtBQUNBO0FBQ0FGLEVBQUFBLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCRyxRQUEzQixHQUo0QixDQU01QjtBQUNBOztBQUNBSCxFQUFBQSxDQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QkcsUUFBekIsR0FBb0NELEVBQXBDLENBQXVDLHVCQUF2QyxFQUFnRSxVQUFTRSxDQUFULEVBQVk7QUFDeEVKLElBQUFBLENBQUMsQ0FBQyxtREFBRCxDQUFELENBQXVESyxHQUF2RCxDQUEyREQsQ0FBQyxDQUFDRSxHQUE3RCxFQUFrRUMsSUFBbEUsQ0FBdUUsWUFBVztBQUM5RVAsTUFBQUEsQ0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUJRLElBQXpCLENBQThCLFVBQTlCLEVBQTBDQyxZQUExQyxDQUF1RCxJQUF2RDtBQUNILEtBRkQ7QUFHSCxHQUpELEVBUjRCLENBYzVCO0FBQ0E7O0FBQ0FULEVBQUFBLENBQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCRyxRQUExQjtBQUNBSCxFQUFBQSxD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O0FBQ0FiLEVBQUFBLENBQUMsQ0FBQyxrQkFBRCxDQUFELENBQXNCd0IsS0FBdEIsQ0FBNEIsWUFBVztBQUVuQztBQUNBLFFBQUlyQixRQUFRLEdBQUdrQixNQUFNLENBQUNiLElBQVAsQ0FBWSxVQUFaLENBQWYsQ0FIbUMsQ0FLbkM7O0FBQ0EsUUFBSWlCLE1BQU0sR0FBRyxxU0FBYixDQU5tQyxDQVFuQzs7QUFDQXRCLElBQUFBLFFBQVEsQ0FBQ3VCLFNBQVQsQ0FBbUJELE1BQW5CO0FBQ0gsR0FWRDtBQVdILENBL0VEIiwic291cmNlc0NvbnRlbnQiOlsiLypcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcbkF1dGhvcjogQ29kZXJUaGVtZXNcbldlYnNpdGU6IGh0dHBzOi8vY29kZXJ0aGVtZXMuY29tL1xuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cbkZpbGU6IEZvbyB0YWJsZXMgaW5pdCBqc1xuKi9cblxuJCh3aW5kb3cpLm9uKCdsb2FkJywgZnVuY3Rpb24oKSB7XG5cbiAgICAvLyBSb3cgVG9nZ2xlclxuICAgIC8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gICAgJCgnI2RlbW8tZm9vLXJvdy10b2dnbGVyJykuZm9vdGFibGUoKTtcblxuICAgIC8vIEFjY29yZGlvblxuICAgIC8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gICAgJCgnI2RlbW8tZm9vLWFjY29yZGlvbicpLmZvb3RhYmxlKCkub24oJ2Zvb3RhYmxlX3Jvd19leHBhbmRlZCcsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgJCgnI2RlbW8tZm9vLWFjY29yZGlvbiB0Ym9keSB0ci5mb290YWJsZS1kZXRhaWwtc2hvdycpLm5vdChlLnJvdykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQoJyNkZW1vLWZvby1hY2NvcmRpb24nKS5kYXRhKCdmb290YWJsZScpLnRvZ2dsZURldGFpbCh0aGlzKTtcbiAgICAgICAgfSk7XG4gICAgfSk7XG5cbiAgICAvLyBQYWdpbmF0aW9uXG4gICAgLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAgICAkKCcjZGVtby1mb28tcGFnaW5hdGlvbicpLmZvb3RhYmxlKCk7XG4gICAgJCgnI2RlbW8tc2hvdy1lbnRyaWVzJykuY2hhbmdlKGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgdmFyIHBhZ2VTaXplID0gJCh0aGlzKS52YWwoKTtcbiAgICAgICAgJCgnI2RlbW8tZm9vLXBhZ2luYXRpb24nKS5kYXRhKCdwYWdlLXNpemUnLCBwYWdlU2l6ZSk7XG4gICAgICAgICQoJyNkZW1vLWZvby1wYWdpbmF0aW9uJykudHJpZ2dlcignZm9vdGFibGVfaW5pdGlhbGl6ZWQnKTtcbiAgICB9KTtcblxuICAgIC8vIEZpbHRlcmluZ1xuICAgIC8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gICAgdmFyIGZpbHRlcmluZyA9ICQoJyNkZW1vLWZvby1maWx0ZXJpbmcnKTtcbiAgICBmaWx0ZXJpbmcuZm9vdGFibGUoKS5vbignZm9vdGFibGVfZmlsdGVyaW5nJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgdmFyIHNlbGVjdGVkID0gJCgnI2RlbW8tZm9vLWZpbHRlci1zdGF0dXMnKS5maW5kKCc6c2VsZWN0ZWQnKS52YWwoKTtcbiAgICAgICAgZS5maWx0ZXIgKz0gKGUuZmlsdGVyICYmIGUuZmlsdGVyLmxlbmd0aCA+IDApID8gJyAnICsgc2VsZWN0ZWQgOiBzZWxlY3RlZDtcbiAgICAgICAgZS5jbGVhciA9ICFlLmZpbHRlcjtcbiAgICB9KTtcblxuICAgIC8vIEZpbHRlciBzdGF0dXNcbiAgICAkKCcjZGVtby1mb28tZmlsdGVyLXN0YXR1cycpLmNoYW5nZShmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIGZpbHRlcmluZy50cmlnZ2VyKCdmb290YWJsZV9maWx0ZXInLCB7ZmlsdGVyOiAkKHRoaXMpLnZhbCgpfSk7XG4gICAgfSk7XG5cbiAgICAvLyBTZWFyY2ggaW5wdXRcbiAgICAkKCcjZGVtby1mb28tc2VhcmNoJykub24oJ2lucHV0JywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBmaWx0ZXJpbmcudHJpZ2dlcignZm9vdGFibGVfZmlsdGVyJywge2ZpbHRlcjogJCh0aGlzKS52YWwoKX0pO1xuICAgIH0pO1xuXG5cbiAgICAvLyBBZGQgJiBSZW1vdmUgUm93XG4gICAgLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAgICB2YXIgYWRkcm93ID0gJCgnI2RlbW8tZm9vLWFkZHJvdycpO1xuICAgIGFkZHJvdy5mb290YWJsZSgpLm9uKCdjbGljaycsICcuZGVtby1kZWxldGUtcm93JywgZnVuY3Rpb24oKSB7XG5cbiAgICAgICAgLy9nZXQgdGhlIGZvb3RhYmxlIG9iamVjdFxuICAgICAgICB2YXIgZm9vdGFibGUgPSBhZGRyb3cuZGF0YSgnZm9vdGFibGUnKTtcblxuICAgICAgICAvL2dldCB0aGUgcm93IHdlIGFyZSB3YW50aW5nIHRvIGRlbGV0ZVxuICAgICAgICB2YXIgcm93ID0gJCh0aGlzKS5wYXJlbnRzKCd0cjpmaXJzdCcpO1xuXG4gICAgICAgIC8vZGVsZXRlIHRoZSByb3dcbiAgICAgICAgZm9vdGFibGUucmVtb3ZlUm93KHJvdyk7XG4gICAgfSk7XG5cbiAgICAvLyBTZWFyY2ggaW5wdXRcbiAgICAkKCcjZGVtby1pbnB1dC1zZWFyY2gyJykub24oJ2lucHV0JywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBhZGRyb3cudHJpZ2dlcignZm9vdGFibGVfZmlsdGVyJywge2ZpbHRlcjogJCh0aGlzKS52YWwoKX0pO1xuICAgIH0pO1xuXG4gICAgLy8gQWRkIFJvdyBCdXR0b25cbiAgICAkKCcjZGVtby1idG4tYWRkcm93JykuY2xpY2soZnVuY3Rpb24oKSB7XG5cbiAgICAgICAgLy9nZXQgdGhlIGZvb3RhYmxlIG9iamVjdFxuICAgICAgICB2YXIgZm9vdGFibGUgPSBhZGRyb3cuZGF0YSgnZm9vdGFibGUnKTtcblxuICAgICAgICAvL2J1aWxkIHVwIHRoZSByb3cgd2UgYXJlIHdhbnRpbmcgdG8gYWRkXG4gICAgICAgIHZhciBuZXdSb3cgPSAnPHRyPjx0ZCBzdHlsZT1cInRleHQtYWxpZ246IGNlbnRlcjtcIj48YnV0dG9uIGNsYXNzPVwiZGVtby1kZWxldGUtcm93IGJ0biBidG4tZGFuZ2VyIGJ0bi14cyBidG4taWNvblwiPjxpIGNsYXNzPVwiZmEgZmEtdGltZXNcIj48L2k+PC9idXR0b24+PC90ZD48dGQ+QWRhbTwvdGQ+PHRkPkRvZTwvdGQ+PHRkPlRyYWZmaWMgQ291cnQgUmVmZXJlZTwvdGQ+PHRkPjIyIEp1biAxOTcyPC90ZD48dGQ+PHNwYW4gY2xhc3M9XCJiYWRnZSBsYWJlbC10YWJsZSBiYWRnZS1zdWNjZXNzICAgXCI+QWN0aXZlPC9zcGFuPjwvdGQ+PC90cj4nO1xuXG4gICAgICAgIC8vYWRkIGl0XG4gICAgICAgIGZvb3RhYmxlLmFwcGVuZFJvdyhuZXdSb3cpO1xuICAgIH0pO1xufSk7Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9wYWdlcy9mb28tdGFibGVzLmluaXQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/pages/foo-tables.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/foo-tables.init.js"]();
/******/ 	
/******/ })()
;