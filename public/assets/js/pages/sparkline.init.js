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

/***/ "./resources/js/pages/sparkline.init.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/sparkline.init.js ***!
  \**********************************************/
/***/ (() => {

eval("/*\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\nAuthor: CoderThemes\nWebsite: https://coderthemes.com/\nContact: support@coderthemes.com\nFile: Sparkline charts init js\n*/\n$(document).ready(function () {\n  var DrawSparkline = function DrawSparkline() {\n    // Line Chart\n    var colors = ['#6658dd', '#1abc9c'];\n    var dataColors = $(\"#sparkline1\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline1').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {\n      type: 'line',\n      width: \"100%\",\n      height: '165',\n      chartRangeMax: 50,\n      lineColor: colors[0],\n      fillColor: hexToRGB(colors[0], 0.3),\n      highlightLineColor: 'rgba(0,0,0,.1)',\n      highlightSpotColor: 'rgba(0,0,0,.2)',\n      maxSpotColor: false,\n      minSpotColor: false,\n      spotColor: false,\n      lineWidth: 1\n    });\n    $('#sparkline1').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {\n      type: 'line',\n      width: \"100%\",\n      height: '165',\n      chartRangeMax: 40,\n      lineColor: colors[1],\n      fillColor: hexToRGB(colors[1], 0.3),\n      composite: true,\n      highlightLineColor: 'rgba(0,0,0,.1)',\n      highlightSpotColor: 'rgba(0,0,0,.2)',\n      maxSpotColor: false,\n      minSpotColor: false,\n      spotColor: false,\n      lineWidth: 1\n    }); // Bar Chart\n\n    var colors = ['#4a81d4'];\n    var dataColors = $(\"#sparkline2\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline2').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {\n      type: 'bar',\n      height: '165',\n      barWidth: '10',\n      barSpacing: '3',\n      barColor: colors\n    }); // Pie Chart\n\n    var colors = ['#4fc6e1', '#f7b84b', '#e3eaef', '#f1556c'];\n    var dataColors = $(\"#sparkline3\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline3').sparkline([20, 40, 30, 10], {\n      type: 'pie',\n      width: '165',\n      height: '165',\n      sliceColors: colors\n    }); // Combine Line Chart\n\n    var colors = ['#2d7bf4', '#4eb7eb'];\n    var dataColors = $(\"#sparkline4\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline4').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {\n      type: 'line',\n      width: \"100%\",\n      height: '165',\n      chartRangeMax: 50,\n      lineColor: colors[0],\n      fillColor: 'transparent',\n      lineWidth: 2,\n      highlightLineColor: 'rgba(0,0,0,.1)',\n      highlightSpotColor: 'rgba(0,0,0,.2)',\n      maxSpotColor: false,\n      minSpotColor: false,\n      spotColor: false\n    });\n    $('#sparkline4').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {\n      type: 'line',\n      width: \"100%\",\n      height: '165',\n      chartRangeMax: 40,\n      lineColor: colors[1],\n      fillColor: 'transparent',\n      composite: true,\n      lineWidth: 2,\n      maxSpotColor: false,\n      minSpotColor: false,\n      spotColor: false,\n      highlightLineColor: 'rgba(0,0,0,1)',\n      highlightSpotColor: 'rgba(0,0,0,1)'\n    }); // Composite bar Chart\n\n    var colors = ['#e3eaef', '#6c757d'];\n    var dataColors = $(\"#sparkline6\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {\n      type: 'line',\n      width: \"100%\",\n      height: '165',\n      lineColor: colors[0],\n      lineWidth: 2,\n      fillColor: 'rgba(227,234,239,0.3)',\n      highlightLineColor: 'rgba(0,0,0,.1)',\n      highlightSpotColor: 'rgba(0,0,0,.2)'\n    });\n    $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {\n      type: 'bar',\n      height: '165',\n      barWidth: '10',\n      barSpacing: '5',\n      composite: true,\n      barColor: colors[1]\n    }); // Discrete Chart\n\n    var colors = ['#36404c'];\n    var dataColors = $(\"#sparkline7\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $(\"#sparkline7\").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7], {\n      type: 'discrete',\n      width: '280',\n      height: '165',\n      lineColor: colors\n    }); // Bullet Chart\n\n    var colors = ['#64c5b1', '#5553ce'];\n    var dataColors = $(\"#sparkline8\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline8').sparkline([10, 12, 12, 9, 7], {\n      type: 'bullet',\n      width: '280',\n      height: '80',\n      targetColor: colors[0],\n      performanceColor: colors[1]\n    }); // Box Plot Chart\n\n    var colors = ['#6658dd', '#1abc9c'];\n    var dataColors = $(\"#sparkline9\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline9').sparkline([4, 27, 34, 52, 54, 59, 61, 68, 78, 82, 85, 87, 91, 93, 100], {\n      type: 'box',\n      width: '280',\n      height: '80',\n      boxLineColor: colors[0],\n      boxFillColor: 'transparent',\n      whiskerColor: colors[1],\n      medianColor: colors[1],\n      targetColor: colors[1]\n    }); // Tristate Charts\n\n    var colors = ['#0acf97', '#e3eaef', '#ff679b'];\n    var dataColors = $(\"#sparkline10\").data('colors');\n\n    if (dataColors) {\n      colors = dataColors.split(\",\");\n    }\n\n    $('#sparkline10').sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1], {\n      height: '80',\n      width: '100%',\n      type: 'tristate',\n      posBarColor: colors[0],\n      negBarColor: colors[1],\n      zeroBarColor: colors[2],\n      barWidth: 8,\n      barSpacing: 3,\n      zeroAxis: false\n    });\n  },\n      DrawMouseSpeed = function DrawMouseSpeed() {\n    var mrefreshinterval = 500; // update display every 500ms\n\n    var lastmousex = -1;\n    var lastmousey = -1;\n    var lastmousetime;\n    var mousetravel = 0;\n    var mpoints = [];\n    var mpoints_max = 30;\n    $('html').mousemove(function (e) {\n      var mousex = e.pageX;\n      var mousey = e.pageY;\n\n      if (lastmousex > -1) {\n        mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));\n      }\n\n      lastmousex = mousex;\n      lastmousey = mousey;\n    });\n\n    var mdraw = function mdraw() {\n      var md = new Date();\n      var timenow = md.getTime();\n\n      if (lastmousetime && lastmousetime != timenow) {\n        var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);\n        mpoints.push(pps);\n        if (mpoints.length > mpoints_max) mpoints.splice(0, 1);\n        mousetravel = 0;\n        var colors = ['#f1556c'];\n        var dataColors = $(\"#sparkline5\").data('colors');\n\n        if (dataColors) {\n          colors = dataColors.split(\",\");\n        }\n\n        $('#sparkline5').sparkline(mpoints, {\n          tooltipSuffix: ' pixels per second',\n          type: 'line',\n          width: \"100%\",\n          height: '165',\n          chartRangeMax: 77,\n          maxSpotColor: false,\n          minSpotColor: false,\n          spotColor: false,\n          lineWidth: 1,\n          lineColor: colors,\n          fillColor: hexToRGB(colors[0], 0.3),\n          highlightLineColor: 'rgba(24,147,126,.1)',\n          highlightSpotColor: 'rgba(24,147,126,.2)'\n        });\n      }\n\n      lastmousetime = timenow;\n      setTimeout(mdraw, mrefreshinterval);\n    }; // We could use setInterval instead, but I prefer to do it this way\n\n\n    setTimeout(mdraw, mrefreshinterval);\n  };\n\n  DrawSparkline();\n  DrawMouseSpeed();\n  var resizeChart;\n  $(window).resize(function (e) {\n    clearTimeout(resizeChart);\n    resizeChart = setTimeout(function () {\n      DrawSparkline();\n      DrawMouseSpeed();\n    }, 300);\n  });\n});\n/* utility function */\n\nfunction hexToRGB(hex, alpha) {\n  var r = parseInt(hex.slice(1, 3), 16),\n      g = parseInt(hex.slice(3, 5), 16),\n      b = parseInt(hex.slice(5, 7), 16);\n\n  if (alpha) {\n    return \"rgba(\" + r + \", \" + g + \", \" + b + \", \" + alpha + \")\";\n  } else {\n    return \"rgb(\" + r + \", \" + g + \", \" + b + \")\";\n  }\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly91Ym9sZC1sYXJhdmVsLy4vcmVzb3VyY2VzL2pzL3BhZ2VzL3NwYXJrbGluZS5pbml0LmpzP2Y4MGMiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJEcmF3U3BhcmtsaW5lIiwiY29sb3JzIiwiZGF0YUNvbG9ycyIsImRhdGEiLCJzcGxpdCIsInNwYXJrbGluZSIsInR5cGUiLCJ3aWR0aCIsImhlaWdodCIsImNoYXJ0UmFuZ2VNYXgiLCJsaW5lQ29sb3IiLCJmaWxsQ29sb3IiLCJoZXhUb1JHQiIsImhpZ2hsaWdodExpbmVDb2xvciIsImhpZ2hsaWdodFNwb3RDb2xvciIsIm1heFNwb3RDb2xvciIsIm1pblNwb3RDb2xvciIsInNwb3RDb2xvciIsImxpbmVXaWR0aCIsImNvbXBvc2l0ZSIsImJhcldpZHRoIiwiYmFyU3BhY2luZyIsImJhckNvbG9yIiwic2xpY2VDb2xvcnMiLCJ0YXJnZXRDb2xvciIsInBlcmZvcm1hbmNlQ29sb3IiLCJib3hMaW5lQ29sb3IiLCJib3hGaWxsQ29sb3IiLCJ3aGlza2VyQ29sb3IiLCJtZWRpYW5Db2xvciIsInBvc0JhckNvbG9yIiwibmVnQmFyQ29sb3IiLCJ6ZXJvQmFyQ29sb3IiLCJ6ZXJvQXhpcyIsIkRyYXdNb3VzZVNwZWVkIiwibXJlZnJlc2hpbnRlcnZhbCIsImxhc3Rtb3VzZXgiLCJsYXN0bW91c2V5IiwibGFzdG1vdXNldGltZSIsIm1vdXNldHJhdmVsIiwibXBvaW50cyIsIm1wb2ludHNfbWF4IiwibW91c2Vtb3ZlIiwiZSIsIm1vdXNleCIsInBhZ2VYIiwibW91c2V5IiwicGFnZVkiLCJNYXRoIiwibWF4IiwiYWJzIiwibWRyYXciLCJtZCIsIkRhdGUiLCJ0aW1lbm93IiwiZ2V0VGltZSIsInBwcyIsInJvdW5kIiwicHVzaCIsImxlbmd0aCIsInNwbGljZSIsInRvb2x0aXBTdWZmaXgiLCJzZXRUaW1lb3V0IiwicmVzaXplQ2hhcnQiLCJ3aW5kb3ciLCJyZXNpemUiLCJjbGVhclRpbWVvdXQiLCJoZXgiLCJhbHBoYSIsInIiLCJwYXJzZUludCIsInNsaWNlIiwiZyIsImIiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBWTtBQUUxQixNQUFJQyxhQUFhLEdBQUcsU0FBaEJBLGFBQWdCLEdBQVk7QUFDNUI7QUFDQSxRQUFJQyxNQUFNLEdBQUcsQ0FBQyxTQUFELEVBQVksU0FBWixDQUFiO0FBQ0EsUUFBSUMsVUFBVSxHQUFHTCxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCTSxJQUFqQixDQUFzQixRQUF0QixDQUFqQjs7QUFDQSxRQUFJRCxVQUFKLEVBQWdCO0FBQ1pELE1BQUFBLE1BQU0sR0FBR0MsVUFBVSxDQUFDRSxLQUFYLENBQWlCLEdBQWpCLENBQVQ7QUFDSDs7QUFDRFAsSUFBQUEsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQlEsU0FBakIsQ0FBMkIsQ0FBQyxDQUFELEVBQUksRUFBSixFQUFRLEVBQVIsRUFBWSxFQUFaLEVBQWdCLEVBQWhCLEVBQW9CLEVBQXBCLEVBQXdCLEVBQXhCLEVBQTRCLEVBQTVCLEVBQWdDLEVBQWhDLENBQTNCLEVBQWdFO0FBQzVEQyxNQUFBQSxJQUFJLEVBQUUsTUFEc0Q7QUFFNURDLE1BQUFBLEtBQUssRUFBRSxNQUZxRDtBQUc1REMsTUFBQUEsTUFBTSxFQUFFLEtBSG9EO0FBSTVEQyxNQUFBQSxhQUFhLEVBQUUsRUFKNkM7QUFLNURDLE1BQUFBLFNBQVMsRUFBRVQsTUFBTSxDQUFDLENBQUQsQ0FMMkM7QUFNNURVLE1BQUFBLFNBQVMsRUFBRUMsUUFBUSxDQUFDWCxNQUFNLENBQUMsQ0FBRCxDQUFQLEVBQVksR0FBWixDQU55QztBQU81RFksTUFBQUEsa0JBQWtCLEVBQUUsZ0JBUHdDO0FBUTVEQyxNQUFBQSxrQkFBa0IsRUFBRSxnQkFSd0M7QUFTNURDLE1BQUFBLFlBQVksRUFBRSxLQVQ4QztBQVU1REMsTUFBQUEsWUFBWSxFQUFFLEtBVjhDO0FBVzVEQyxNQUFBQSxTQUFTLEVBQUUsS0FYaUQ7QUFZNURDLE1BQUFBLFNBQVMsRUFBRTtBQVppRCxLQUFoRTtBQWVBckIsSUFBQUEsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQlEsU0FBakIsQ0FBMkIsQ0FBQyxFQUFELEVBQUssRUFBTCxFQUFTLEVBQVQsRUFBYSxFQUFiLEVBQWlCLEVBQWpCLEVBQXFCLEVBQXJCLEVBQXlCLEVBQXpCLEVBQTZCLEVBQTdCLEVBQWlDLEVBQWpDLENBQTNCLEVBQWlFO0FBQzdEQyxNQUFBQSxJQUFJLEVBQUUsTUFEdUQ7QUFFN0RDLE1BQUFBLEtBQUssRUFBRSxNQUZzRDtBQUc3REMsTUFBQUEsTUFBTSxFQUFFLEtBSHFEO0FBSTdEQyxNQUFBQSxhQUFhLEVBQUUsRUFKOEM7QUFLN0RDLE1BQUFBLFNBQVMsRUFBRVQsTUFBTSxDQUFDLENBQUQsQ0FMNEM7QUFNN0RVLE1BQUFBLFNBQVMsRUFBRUMsUUFBUSxDQUFDWCxNQUFNLENBQUMsQ0FBRCxDQUFQLEVBQVksR0FBWixDQU4wQztBQU83RGtCLE1BQUFBLFNBQVMsRUFBRSxJQVBrRDtBQVE3RE4sTUFBQUEsa0JBQWtCLEVBQUUsZ0JBUnlDO0FBUzdEQyxNQUFBQSxrQkFBa0IsRUFBRSxnQkFUeUM7QUFVN0RDLE1BQUFBLFlBQVksRUFBRSxLQVYrQztBQVc3REMsTUFBQUEsWUFBWSxFQUFFLEtBWCtDO0FBWTdEQyxNQUFBQSxTQUFTLEVBQUUsS0Faa0Q7QUFhN0RDLE1BQUFBLFNBQVMsRUFBRTtBQWJrRCxLQUFqRSxFQXRCNEIsQ0FzQzVCOztBQUNBLFFBQUlqQixNQUFNLEdBQUcsQ0FBQyxTQUFELENBQWI7QUFDQSxRQUFJQyxVQUFVLEdBQUdMLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJNLElBQWpCLENBQXNCLFFBQXRCLENBQWpCOztBQUNBLFFBQUlELFVBQUosRUFBZ0I7QUFDWkQsTUFBQUEsTUFBTSxHQUFHQyxVQUFVLENBQUNFLEtBQVgsQ0FBaUIsR0FBakIsQ0FBVDtBQUNIOztBQUNEUCxJQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCUSxTQUFqQixDQUEyQixDQUFDLENBQUQsRUFBSSxDQUFKLEVBQU8sQ0FBUCxFQUFVLENBQVYsRUFBYSxDQUFiLEVBQWdCLENBQWhCLEVBQW1CLENBQW5CLEVBQXNCLEVBQXRCLEVBQTBCLEVBQTFCLEVBQThCLENBQTlCLEVBQWlDLENBQWpDLEVBQW9DLENBQXBDLEVBQXVDLEVBQXZDLEVBQTJDLEVBQTNDLEVBQStDLEVBQS9DLEVBQW1ELEVBQW5ELENBQTNCLEVBQW1GO0FBQy9FQyxNQUFBQSxJQUFJLEVBQUUsS0FEeUU7QUFFL0VFLE1BQUFBLE1BQU0sRUFBRSxLQUZ1RTtBQUcvRVksTUFBQUEsUUFBUSxFQUFFLElBSHFFO0FBSS9FQyxNQUFBQSxVQUFVLEVBQUUsR0FKbUU7QUFLL0VDLE1BQUFBLFFBQVEsRUFBRXJCO0FBTHFFLEtBQW5GLEVBNUM0QixDQW9ENUI7O0FBQ0EsUUFBSUEsTUFBTSxHQUFHLENBQUMsU0FBRCxFQUFZLFNBQVosRUFBdUIsU0FBdkIsRUFBa0MsU0FBbEMsQ0FBYjtBQUNBLFFBQUlDLFVBQVUsR0FBR0wsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQk0sSUFBakIsQ0FBc0IsUUFBdEIsQ0FBakI7O0FBQ0EsUUFBSUQsVUFBSixFQUFnQjtBQUNaRCxNQUFBQSxNQUFNLEdBQUdDLFVBQVUsQ0FBQ0UsS0FBWCxDQUFpQixHQUFqQixDQUFUO0FBQ0g7O0FBQ0RQLElBQUFBLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJRLFNBQWpCLENBQTJCLENBQUMsRUFBRCxFQUFLLEVBQUwsRUFBUyxFQUFULEVBQWEsRUFBYixDQUEzQixFQUE2QztBQUN6Q0MsTUFBQUEsSUFBSSxFQUFFLEtBRG1DO0FBRXpDQyxNQUFBQSxLQUFLLEVBQUUsS0FGa0M7QUFHekNDLE1BQUFBLE1BQU0sRUFBRSxLQUhpQztBQUl6Q2UsTUFBQUEsV0FBVyxFQUFFdEI7QUFKNEIsS0FBN0MsRUExRDRCLENBaUU1Qjs7QUFDQSxRQUFJQSxNQUFNLEdBQUcsQ0FBQyxTQUFELEVBQVksU0FBWixDQUFiO0FBQ0EsUUFBSUMsVUFBVSxHQUFHTCxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCTSxJQUFqQixDQUFzQixRQUF0QixDQUFqQjs7QUFDQSxRQUFJRCxVQUFKLEVBQWdCO0FBQ1pELE1BQUFBLE1BQU0sR0FBR0MsVUFBVSxDQUFDRSxLQUFYLENBQWlCLEdBQWpCLENBQVQ7QUFDSDs7QUFDRFAsSUFBQUEsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQlEsU0FBakIsQ0FBMkIsQ0FBQyxDQUFELEVBQUksRUFBSixFQUFRLEVBQVIsRUFBWSxFQUFaLEVBQWdCLEVBQWhCLEVBQW9CLEVBQXBCLEVBQXdCLEVBQXhCLEVBQTRCLEVBQTVCLEVBQWdDLEVBQWhDLENBQTNCLEVBQWdFO0FBQzVEQyxNQUFBQSxJQUFJLEVBQUUsTUFEc0Q7QUFFNURDLE1BQUFBLEtBQUssRUFBRSxNQUZxRDtBQUc1REMsTUFBQUEsTUFBTSxFQUFFLEtBSG9EO0FBSTVEQyxNQUFBQSxhQUFhLEVBQUUsRUFKNkM7QUFLNURDLE1BQUFBLFNBQVMsRUFBRVQsTUFBTSxDQUFDLENBQUQsQ0FMMkM7QUFNNURVLE1BQUFBLFNBQVMsRUFBRSxhQU5pRDtBQU81RE8sTUFBQUEsU0FBUyxFQUFFLENBUGlEO0FBUTVETCxNQUFBQSxrQkFBa0IsRUFBRSxnQkFSd0M7QUFTNURDLE1BQUFBLGtCQUFrQixFQUFFLGdCQVR3QztBQVU1REMsTUFBQUEsWUFBWSxFQUFFLEtBVjhDO0FBVzVEQyxNQUFBQSxZQUFZLEVBQUUsS0FYOEM7QUFZNURDLE1BQUFBLFNBQVMsRUFBRTtBQVppRCxLQUFoRTtBQWNBcEIsSUFBQUEsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQlEsU0FBakIsQ0FBMkIsQ0FBQyxFQUFELEVBQUssRUFBTCxFQUFTLEVBQVQsRUFBYSxFQUFiLEVBQWlCLEVBQWpCLEVBQXFCLEVBQXJCLEVBQXlCLEVBQXpCLEVBQTZCLEVBQTdCLEVBQWlDLEVBQWpDLENBQTNCLEVBQWlFO0FBQzdEQyxNQUFBQSxJQUFJLEVBQUUsTUFEdUQ7QUFFN0RDLE1BQUFBLEtBQUssRUFBRSxNQUZzRDtBQUc3REMsTUFBQUEsTUFBTSxFQUFFLEtBSHFEO0FBSTdEQyxNQUFBQSxhQUFhLEVBQUUsRUFKOEM7QUFLN0RDLE1BQUFBLFNBQVMsRUFBRVQsTUFBTSxDQUFDLENBQUQsQ0FMNEM7QUFNN0RVLE1BQUFBLFNBQVMsRUFBRSxhQU5rRDtBQU83RFEsTUFBQUEsU0FBUyxFQUFFLElBUGtEO0FBUTdERCxNQUFBQSxTQUFTLEVBQUUsQ0FSa0Q7QUFTN0RILE1BQUFBLFlBQVksRUFBRSxLQVQrQztBQVU3REMsTUFBQUEsWUFBWSxFQUFFLEtBVitDO0FBVzdEQyxNQUFBQSxTQUFTLEVBQUUsS0FYa0Q7QUFZN0RKLE1BQUFBLGtCQUFrQixFQUFFLGVBWnlDO0FBYTdEQyxNQUFBQSxrQkFBa0IsRUFBRTtBQWJ5QyxLQUFqRSxFQXJGNEIsQ0FxRzVCOztBQUNBLFFBQUliLE1BQU0sR0FBRyxDQUFDLFNBQUQsRUFBWSxTQUFaLENBQWI7QUFDQSxRQUFJQyxVQUFVLEdBQUdMLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJNLElBQWpCLENBQXNCLFFBQXRCLENBQWpCOztBQUNBLFFBQUlELFVBQUosRUFBZ0I7QUFDWkQsTUFBQUEsTUFBTSxHQUFHQyxVQUFVLENBQUNFLEtBQVgsQ0FBaUIsR0FBakIsQ0FBVDtBQUNIOztBQUNEUCxJQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCUSxTQUFqQixDQUEyQixDQUFDLENBQUQsRUFBSSxDQUFKLEVBQU8sQ0FBUCxFQUFVLENBQVYsRUFBYSxDQUFiLEVBQWdCLENBQWhCLEVBQW1CLENBQW5CLEVBQXNCLEVBQXRCLEVBQTBCLEVBQTFCLEVBQThCLENBQTlCLEVBQWlDLENBQWpDLEVBQW9DLENBQXBDLEVBQXVDLEVBQXZDLEVBQTJDLEVBQTNDLEVBQStDLEVBQS9DLEVBQW1ELEVBQW5ELENBQTNCLEVBQW1GO0FBQy9FQyxNQUFBQSxJQUFJLEVBQUUsTUFEeUU7QUFFL0VDLE1BQUFBLEtBQUssRUFBRSxNQUZ3RTtBQUcvRUMsTUFBQUEsTUFBTSxFQUFFLEtBSHVFO0FBSS9FRSxNQUFBQSxTQUFTLEVBQUVULE1BQU0sQ0FBQyxDQUFELENBSjhEO0FBSy9FaUIsTUFBQUEsU0FBUyxFQUFFLENBTG9FO0FBTS9FUCxNQUFBQSxTQUFTLEVBQUUsdUJBTm9FO0FBTy9FRSxNQUFBQSxrQkFBa0IsRUFBRSxnQkFQMkQ7QUFRL0VDLE1BQUFBLGtCQUFrQixFQUFFO0FBUjJELEtBQW5GO0FBVUFqQixJQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCUSxTQUFqQixDQUEyQixDQUFDLENBQUQsRUFBSSxDQUFKLEVBQU8sQ0FBUCxFQUFVLENBQVYsRUFBYSxDQUFiLEVBQWdCLENBQWhCLEVBQW1CLENBQW5CLEVBQXNCLEVBQXRCLEVBQTBCLEVBQTFCLEVBQThCLENBQTlCLEVBQWlDLENBQWpDLEVBQW9DLENBQXBDLEVBQXVDLEVBQXZDLEVBQTJDLEVBQTNDLEVBQStDLEVBQS9DLEVBQW1ELEVBQW5ELENBQTNCLEVBQW1GO0FBQy9FQyxNQUFBQSxJQUFJLEVBQUUsS0FEeUU7QUFFL0VFLE1BQUFBLE1BQU0sRUFBRSxLQUZ1RTtBQUcvRVksTUFBQUEsUUFBUSxFQUFFLElBSHFFO0FBSS9FQyxNQUFBQSxVQUFVLEVBQUUsR0FKbUU7QUFLL0VGLE1BQUFBLFNBQVMsRUFBRSxJQUxvRTtBQU0vRUcsTUFBQUEsUUFBUSxFQUFFckIsTUFBTSxDQUFDLENBQUQ7QUFOK0QsS0FBbkYsRUFySDRCLENBOEg1Qjs7QUFDQSxRQUFJQSxNQUFNLEdBQUcsQ0FBQyxTQUFELENBQWI7QUFDQSxRQUFJQyxVQUFVLEdBQUdMLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJNLElBQWpCLENBQXNCLFFBQXRCLENBQWpCOztBQUNBLFFBQUlELFVBQUosRUFBZ0I7QUFDWkQsTUFBQUEsTUFBTSxHQUFHQyxVQUFVLENBQUNFLEtBQVgsQ0FBaUIsR0FBakIsQ0FBVDtBQUNIOztBQUNEUCxJQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCUSxTQUFqQixDQUEyQixDQUFDLENBQUQsRUFBSSxDQUFKLEVBQU8sQ0FBUCxFQUFVLENBQVYsRUFBYSxDQUFiLEVBQWdCLENBQWhCLEVBQW1CLENBQW5CLEVBQXNCLENBQXRCLEVBQXlCLENBQXpCLEVBQTRCLENBQTVCLEVBQStCLENBQS9CLEVBQWtDLENBQWxDLEVBQXFDLENBQXJDLEVBQXdDLENBQXhDLEVBQTJDLENBQTNDLEVBQThDLENBQTlDLEVBQWlELENBQWpELEVBQW9ELENBQXBELEVBQXVELENBQXZELEVBQTBELENBQTFELEVBQTZELENBQTdELEVBQWdFLENBQWhFLEVBQW1FLENBQW5FLEVBQXNFLENBQXRFLEVBQXlFLENBQXpFLEVBQTRFLENBQTVFLEVBQStFLENBQS9FLEVBQWtGLENBQWxGLENBQTNCLEVBQWlIO0FBQzdHQyxNQUFBQSxJQUFJLEVBQUUsVUFEdUc7QUFFN0dDLE1BQUFBLEtBQUssRUFBRSxLQUZzRztBQUc3R0MsTUFBQUEsTUFBTSxFQUFFLEtBSHFHO0FBSTdHRSxNQUFBQSxTQUFTLEVBQUVUO0FBSmtHLEtBQWpILEVBcEk0QixDQTJJNUI7O0FBQ0EsUUFBSUEsTUFBTSxHQUFHLENBQUMsU0FBRCxFQUFZLFNBQVosQ0FBYjtBQUNBLFFBQUlDLFVBQVUsR0FBR0wsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQk0sSUFBakIsQ0FBc0IsUUFBdEIsQ0FBakI7O0FBQ0EsUUFBSUQsVUFBSixFQUFnQjtBQUNaRCxNQUFBQSxNQUFNLEdBQUdDLFVBQVUsQ0FBQ0UsS0FBWCxDQUFpQixHQUFqQixDQUFUO0FBQ0g7O0FBQ0RQLElBQUFBLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJRLFNBQWpCLENBQTJCLENBQUMsRUFBRCxFQUFLLEVBQUwsRUFBUyxFQUFULEVBQWEsQ0FBYixFQUFnQixDQUFoQixDQUEzQixFQUErQztBQUMzQ0MsTUFBQUEsSUFBSSxFQUFFLFFBRHFDO0FBRTNDQyxNQUFBQSxLQUFLLEVBQUUsS0FGb0M7QUFHM0NDLE1BQUFBLE1BQU0sRUFBRSxJQUhtQztBQUkzQ2dCLE1BQUFBLFdBQVcsRUFBRXZCLE1BQU0sQ0FBQyxDQUFELENBSndCO0FBSzNDd0IsTUFBQUEsZ0JBQWdCLEVBQUV4QixNQUFNLENBQUMsQ0FBRDtBQUxtQixLQUEvQyxFQWpKNEIsQ0F5SjVCOztBQUNBLFFBQUlBLE1BQU0sR0FBRyxDQUFDLFNBQUQsRUFBWSxTQUFaLENBQWI7QUFDQSxRQUFJQyxVQUFVLEdBQUdMLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJNLElBQWpCLENBQXNCLFFBQXRCLENBQWpCOztBQUNBLFFBQUlELFVBQUosRUFBZ0I7QUFDWkQsTUFBQUEsTUFBTSxHQUFHQyxVQUFVLENBQUNFLEtBQVgsQ0FBaUIsR0FBakIsQ0FBVDtBQUNIOztBQUNEUCxJQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCUSxTQUFqQixDQUEyQixDQUFDLENBQUQsRUFBSSxFQUFKLEVBQVEsRUFBUixFQUFZLEVBQVosRUFBZ0IsRUFBaEIsRUFBb0IsRUFBcEIsRUFBd0IsRUFBeEIsRUFBNEIsRUFBNUIsRUFBZ0MsRUFBaEMsRUFBb0MsRUFBcEMsRUFBd0MsRUFBeEMsRUFBNEMsRUFBNUMsRUFBZ0QsRUFBaEQsRUFBb0QsRUFBcEQsRUFBd0QsR0FBeEQsQ0FBM0IsRUFBeUY7QUFDckZDLE1BQUFBLElBQUksRUFBRSxLQUQrRTtBQUVyRkMsTUFBQUEsS0FBSyxFQUFFLEtBRjhFO0FBR3JGQyxNQUFBQSxNQUFNLEVBQUUsSUFINkU7QUFJckZrQixNQUFBQSxZQUFZLEVBQUV6QixNQUFNLENBQUMsQ0FBRCxDQUppRTtBQUtyRjBCLE1BQUFBLFlBQVksRUFBRSxhQUx1RTtBQU1yRkMsTUFBQUEsWUFBWSxFQUFFM0IsTUFBTSxDQUFDLENBQUQsQ0FOaUU7QUFPckY0QixNQUFBQSxXQUFXLEVBQUU1QixNQUFNLENBQUMsQ0FBRCxDQVBrRTtBQVFyRnVCLE1BQUFBLFdBQVcsRUFBRXZCLE1BQU0sQ0FBQyxDQUFEO0FBUmtFLEtBQXpGLEVBL0o0QixDQTBLNUI7O0FBQ0EsUUFBSUEsTUFBTSxHQUFHLENBQUMsU0FBRCxFQUFZLFNBQVosRUFBdUIsU0FBdkIsQ0FBYjtBQUNBLFFBQUlDLFVBQVUsR0FBR0wsQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQk0sSUFBbEIsQ0FBdUIsUUFBdkIsQ0FBakI7O0FBQ0EsUUFBSUQsVUFBSixFQUFnQjtBQUNaRCxNQUFBQSxNQUFNLEdBQUdDLFVBQVUsQ0FBQ0UsS0FBWCxDQUFpQixHQUFqQixDQUFUO0FBQ0g7O0FBQ0RQLElBQUFBLENBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JRLFNBQWxCLENBQTRCLENBQUMsQ0FBRCxFQUFJLENBQUosRUFBTyxDQUFQLEVBQVUsQ0FBVixFQUFhLENBQUMsQ0FBZCxFQUFpQixDQUFDLENBQWxCLEVBQXFCLENBQXJCLEVBQXdCLENBQUMsQ0FBekIsRUFBNEIsQ0FBNUIsRUFBK0IsQ0FBL0IsRUFBa0MsQ0FBbEMsRUFBcUMsQ0FBckMsQ0FBNUIsRUFBcUU7QUFDakVHLE1BQUFBLE1BQU0sRUFBRSxJQUR5RDtBQUVqRUQsTUFBQUEsS0FBSyxFQUFFLE1BRjBEO0FBR2pFRCxNQUFBQSxJQUFJLEVBQUUsVUFIMkQ7QUFJakV3QixNQUFBQSxXQUFXLEVBQUU3QixNQUFNLENBQUMsQ0FBRCxDQUo4QztBQUtqRThCLE1BQUFBLFdBQVcsRUFBRTlCLE1BQU0sQ0FBQyxDQUFELENBTDhDO0FBTWpFK0IsTUFBQUEsWUFBWSxFQUFFL0IsTUFBTSxDQUFDLENBQUQsQ0FONkM7QUFPakVtQixNQUFBQSxRQUFRLEVBQUUsQ0FQdUQ7QUFRakVDLE1BQUFBLFVBQVUsRUFBRSxDQVJxRDtBQVNqRVksTUFBQUEsUUFBUSxFQUFFO0FBVHVELEtBQXJFO0FBWUgsR0E1TEQ7QUFBQSxNQTZMSUMsY0FBYyxHQUFHLFNBQWpCQSxjQUFpQixHQUFZO0FBQ3pCLFFBQUlDLGdCQUFnQixHQUFHLEdBQXZCLENBRHlCLENBQ0c7O0FBQzVCLFFBQUlDLFVBQVUsR0FBRyxDQUFDLENBQWxCO0FBQ0EsUUFBSUMsVUFBVSxHQUFHLENBQUMsQ0FBbEI7QUFDQSxRQUFJQyxhQUFKO0FBQ0EsUUFBSUMsV0FBVyxHQUFHLENBQWxCO0FBQ0EsUUFBSUMsT0FBTyxHQUFHLEVBQWQ7QUFDQSxRQUFJQyxXQUFXLEdBQUcsRUFBbEI7QUFDQTVDLElBQUFBLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVTZDLFNBQVYsQ0FBb0IsVUFBVUMsQ0FBVixFQUFhO0FBQzdCLFVBQUlDLE1BQU0sR0FBR0QsQ0FBQyxDQUFDRSxLQUFmO0FBQ0EsVUFBSUMsTUFBTSxHQUFHSCxDQUFDLENBQUNJLEtBQWY7O0FBQ0EsVUFBSVgsVUFBVSxHQUFHLENBQUMsQ0FBbEIsRUFBcUI7QUFDakJHLFFBQUFBLFdBQVcsSUFBSVMsSUFBSSxDQUFDQyxHQUFMLENBQVNELElBQUksQ0FBQ0UsR0FBTCxDQUFTTixNQUFNLEdBQUdSLFVBQWxCLENBQVQsRUFBd0NZLElBQUksQ0FBQ0UsR0FBTCxDQUFTSixNQUFNLEdBQUdULFVBQWxCLENBQXhDLENBQWY7QUFDSDs7QUFDREQsTUFBQUEsVUFBVSxHQUFHUSxNQUFiO0FBQ0FQLE1BQUFBLFVBQVUsR0FBR1MsTUFBYjtBQUNILEtBUkQ7O0FBU0EsUUFBSUssS0FBSyxHQUFHLFNBQVJBLEtBQVEsR0FBWTtBQUNwQixVQUFJQyxFQUFFLEdBQUcsSUFBSUMsSUFBSixFQUFUO0FBQ0EsVUFBSUMsT0FBTyxHQUFHRixFQUFFLENBQUNHLE9BQUgsRUFBZDs7QUFDQSxVQUFJakIsYUFBYSxJQUFJQSxhQUFhLElBQUlnQixPQUF0QyxFQUErQztBQUMzQyxZQUFJRSxHQUFHLEdBQUdSLElBQUksQ0FBQ1MsS0FBTCxDQUFXbEIsV0FBVyxJQUFJZSxPQUFPLEdBQUdoQixhQUFkLENBQVgsR0FBMEMsSUFBckQsQ0FBVjtBQUNBRSxRQUFBQSxPQUFPLENBQUNrQixJQUFSLENBQWFGLEdBQWI7QUFDQSxZQUFJaEIsT0FBTyxDQUFDbUIsTUFBUixHQUFpQmxCLFdBQXJCLEVBQ0lELE9BQU8sQ0FBQ29CLE1BQVIsQ0FBZSxDQUFmLEVBQWtCLENBQWxCO0FBQ0pyQixRQUFBQSxXQUFXLEdBQUcsQ0FBZDtBQUNBLFlBQUl0QyxNQUFNLEdBQUcsQ0FBQyxTQUFELENBQWI7QUFDQSxZQUFJQyxVQUFVLEdBQUdMLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJNLElBQWpCLENBQXNCLFFBQXRCLENBQWpCOztBQUNBLFlBQUlELFVBQUosRUFBZ0I7QUFDWkQsVUFBQUEsTUFBTSxHQUFHQyxVQUFVLENBQUNFLEtBQVgsQ0FBaUIsR0FBakIsQ0FBVDtBQUNIOztBQUNEUCxRQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCUSxTQUFqQixDQUEyQm1DLE9BQTNCLEVBQW9DO0FBQ2hDcUIsVUFBQUEsYUFBYSxFQUFFLG9CQURpQjtBQUVoQ3ZELFVBQUFBLElBQUksRUFBRSxNQUYwQjtBQUdoQ0MsVUFBQUEsS0FBSyxFQUFFLE1BSHlCO0FBSWhDQyxVQUFBQSxNQUFNLEVBQUUsS0FKd0I7QUFLaENDLFVBQUFBLGFBQWEsRUFBRSxFQUxpQjtBQU1oQ00sVUFBQUEsWUFBWSxFQUFFLEtBTmtCO0FBT2hDQyxVQUFBQSxZQUFZLEVBQUUsS0FQa0I7QUFRaENDLFVBQUFBLFNBQVMsRUFBRSxLQVJxQjtBQVNoQ0MsVUFBQUEsU0FBUyxFQUFFLENBVHFCO0FBVWhDUixVQUFBQSxTQUFTLEVBQUVULE1BVnFCO0FBV2hDVSxVQUFBQSxTQUFTLEVBQUVDLFFBQVEsQ0FBQ1gsTUFBTSxDQUFDLENBQUQsQ0FBUCxFQUFZLEdBQVosQ0FYYTtBQVloQ1ksVUFBQUEsa0JBQWtCLEVBQUUscUJBWlk7QUFhaENDLFVBQUFBLGtCQUFrQixFQUFFO0FBYlksU0FBcEM7QUFlSDs7QUFDRHdCLE1BQUFBLGFBQWEsR0FBR2dCLE9BQWhCO0FBQ0FRLE1BQUFBLFVBQVUsQ0FBQ1gsS0FBRCxFQUFRaEIsZ0JBQVIsQ0FBVjtBQUNILEtBaENELENBakJ5QixDQWtEekI7OztBQUNBMkIsSUFBQUEsVUFBVSxDQUFDWCxLQUFELEVBQVFoQixnQkFBUixDQUFWO0FBQ0gsR0FqUEw7O0FBbVBBbkMsRUFBQUEsYUFBYTtBQUNia0MsRUFBQUEsY0FBYztBQUVkLE1BQUk2QixXQUFKO0FBRUFsRSxFQUFBQSxDQUFDLENBQUNtRSxNQUFELENBQUQsQ0FBVUMsTUFBVixDQUFpQixVQUFVdEIsQ0FBVixFQUFhO0FBQzFCdUIsSUFBQUEsWUFBWSxDQUFDSCxXQUFELENBQVo7QUFDQUEsSUFBQUEsV0FBVyxHQUFHRCxVQUFVLENBQUMsWUFBWTtBQUNqQzlELE1BQUFBLGFBQWE7QUFDYmtDLE1BQUFBLGNBQWM7QUFDakIsS0FIdUIsRUFHckIsR0FIcUIsQ0FBeEI7QUFJSCxHQU5EO0FBT0gsQ0FqUUQ7QUFtUUE7O0FBRUEsU0FBU3RCLFFBQVQsQ0FBa0J1RCxHQUFsQixFQUF1QkMsS0FBdkIsRUFBOEI7QUFDMUIsTUFBSUMsQ0FBQyxHQUFHQyxRQUFRLENBQUNILEdBQUcsQ0FBQ0ksS0FBSixDQUFVLENBQVYsRUFBYSxDQUFiLENBQUQsRUFBa0IsRUFBbEIsQ0FBaEI7QUFBQSxNQUNJQyxDQUFDLEdBQUdGLFFBQVEsQ0FBQ0gsR0FBRyxDQUFDSSxLQUFKLENBQVUsQ0FBVixFQUFhLENBQWIsQ0FBRCxFQUFrQixFQUFsQixDQURoQjtBQUFBLE1BRUlFLENBQUMsR0FBR0gsUUFBUSxDQUFDSCxHQUFHLENBQUNJLEtBQUosQ0FBVSxDQUFWLEVBQWEsQ0FBYixDQUFELEVBQWtCLEVBQWxCLENBRmhCOztBQUlBLE1BQUlILEtBQUosRUFBVztBQUNQLFdBQU8sVUFBVUMsQ0FBVixHQUFjLElBQWQsR0FBcUJHLENBQXJCLEdBQXlCLElBQXpCLEdBQWdDQyxDQUFoQyxHQUFvQyxJQUFwQyxHQUEyQ0wsS0FBM0MsR0FBbUQsR0FBMUQ7QUFDSCxHQUZELE1BRU87QUFDSCxXQUFPLFNBQVNDLENBQVQsR0FBYSxJQUFiLEdBQW9CRyxDQUFwQixHQUF3QixJQUF4QixHQUErQkMsQ0FBL0IsR0FBbUMsR0FBMUM7QUFDSDtBQUNKIiwic291cmNlc0NvbnRlbnQiOlsiLypcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcbkF1dGhvcjogQ29kZXJUaGVtZXNcbldlYnNpdGU6IGh0dHBzOi8vY29kZXJ0aGVtZXMuY29tL1xuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cbkZpbGU6IFNwYXJrbGluZSBjaGFydHMgaW5pdCBqc1xuKi9cblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuXG4gICAgdmFyIERyYXdTcGFya2xpbmUgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIC8vIExpbmUgQ2hhcnRcbiAgICAgICAgdmFyIGNvbG9ycyA9IFsnIzY2NThkZCcsICcjMWFiYzljJ107XG4gICAgICAgIHZhciBkYXRhQ29sb3JzID0gJChcIiNzcGFya2xpbmUxXCIpLmRhdGEoJ2NvbG9ycycpO1xuICAgICAgICBpZiAoZGF0YUNvbG9ycykge1xuICAgICAgICAgICAgY29sb3JzID0gZGF0YUNvbG9ycy5zcGxpdChcIixcIik7XG4gICAgICAgIH1cbiAgICAgICAgJCgnI3NwYXJrbGluZTEnKS5zcGFya2xpbmUoWzAsIDIzLCA0MywgMzUsIDQ0LCA0NSwgNTYsIDM3LCA0MF0sIHtcbiAgICAgICAgICAgIHR5cGU6ICdsaW5lJyxcbiAgICAgICAgICAgIHdpZHRoOiBcIjEwMCVcIixcbiAgICAgICAgICAgIGhlaWdodDogJzE2NScsXG4gICAgICAgICAgICBjaGFydFJhbmdlTWF4OiA1MCxcbiAgICAgICAgICAgIGxpbmVDb2xvcjogY29sb3JzWzBdLFxuICAgICAgICAgICAgZmlsbENvbG9yOiBoZXhUb1JHQihjb2xvcnNbMF0sIDAuMyksXG4gICAgICAgICAgICBoaWdobGlnaHRMaW5lQ29sb3I6ICdyZ2JhKDAsMCwwLC4xKScsXG4gICAgICAgICAgICBoaWdobGlnaHRTcG90Q29sb3I6ICdyZ2JhKDAsMCwwLC4yKScsXG4gICAgICAgICAgICBtYXhTcG90Q29sb3I6IGZhbHNlLFxuICAgICAgICAgICAgbWluU3BvdENvbG9yOiBmYWxzZSxcbiAgICAgICAgICAgIHNwb3RDb2xvcjogZmFsc2UsXG4gICAgICAgICAgICBsaW5lV2lkdGg6IDFcbiAgICAgICAgfSk7XG5cbiAgICAgICAgJCgnI3NwYXJrbGluZTEnKS5zcGFya2xpbmUoWzI1LCAyMywgMjYsIDI0LCAyNSwgMzIsIDMwLCAyNCwgMTldLCB7XG4gICAgICAgICAgICB0eXBlOiAnbGluZScsXG4gICAgICAgICAgICB3aWR0aDogXCIxMDAlXCIsXG4gICAgICAgICAgICBoZWlnaHQ6ICcxNjUnLFxuICAgICAgICAgICAgY2hhcnRSYW5nZU1heDogNDAsXG4gICAgICAgICAgICBsaW5lQ29sb3I6IGNvbG9yc1sxXSxcbiAgICAgICAgICAgIGZpbGxDb2xvcjogaGV4VG9SR0IoY29sb3JzWzFdLCAwLjMpLFxuICAgICAgICAgICAgY29tcG9zaXRlOiB0cnVlLFxuICAgICAgICAgICAgaGlnaGxpZ2h0TGluZUNvbG9yOiAncmdiYSgwLDAsMCwuMSknLFxuICAgICAgICAgICAgaGlnaGxpZ2h0U3BvdENvbG9yOiAncmdiYSgwLDAsMCwuMiknLFxuICAgICAgICAgICAgbWF4U3BvdENvbG9yOiBmYWxzZSxcbiAgICAgICAgICAgIG1pblNwb3RDb2xvcjogZmFsc2UsXG4gICAgICAgICAgICBzcG90Q29sb3I6IGZhbHNlLFxuICAgICAgICAgICAgbGluZVdpZHRoOiAxXG4gICAgICAgIH0pO1xuXG4gICAgICAgIC8vIEJhciBDaGFydFxuICAgICAgICB2YXIgY29sb3JzID0gWycjNGE4MWQ0J107XG4gICAgICAgIHZhciBkYXRhQ29sb3JzID0gJChcIiNzcGFya2xpbmUyXCIpLmRhdGEoJ2NvbG9ycycpO1xuICAgICAgICBpZiAoZGF0YUNvbG9ycykge1xuICAgICAgICAgICAgY29sb3JzID0gZGF0YUNvbG9ycy5zcGxpdChcIixcIik7XG4gICAgICAgIH1cbiAgICAgICAgJCgnI3NwYXJrbGluZTInKS5zcGFya2xpbmUoWzMsIDYsIDcsIDgsIDYsIDQsIDcsIDEwLCAxMiwgNywgNCwgOSwgMTIsIDEzLCAxMSwgMTJdLCB7XG4gICAgICAgICAgICB0eXBlOiAnYmFyJyxcbiAgICAgICAgICAgIGhlaWdodDogJzE2NScsXG4gICAgICAgICAgICBiYXJXaWR0aDogJzEwJyxcbiAgICAgICAgICAgIGJhclNwYWNpbmc6ICczJyxcbiAgICAgICAgICAgIGJhckNvbG9yOiBjb2xvcnNcbiAgICAgICAgfSk7XG5cbiAgICAgICAgLy8gUGllIENoYXJ0XG4gICAgICAgIHZhciBjb2xvcnMgPSBbJyM0ZmM2ZTEnLCAnI2Y3Yjg0YicsICcjZTNlYWVmJywgJyNmMTU1NmMnXTtcbiAgICAgICAgdmFyIGRhdGFDb2xvcnMgPSAkKFwiI3NwYXJrbGluZTNcIikuZGF0YSgnY29sb3JzJyk7XG4gICAgICAgIGlmIChkYXRhQ29sb3JzKSB7XG4gICAgICAgICAgICBjb2xvcnMgPSBkYXRhQ29sb3JzLnNwbGl0KFwiLFwiKTtcbiAgICAgICAgfVxuICAgICAgICAkKCcjc3BhcmtsaW5lMycpLnNwYXJrbGluZShbMjAsIDQwLCAzMCwgMTBdLCB7XG4gICAgICAgICAgICB0eXBlOiAncGllJyxcbiAgICAgICAgICAgIHdpZHRoOiAnMTY1JyxcbiAgICAgICAgICAgIGhlaWdodDogJzE2NScsXG4gICAgICAgICAgICBzbGljZUNvbG9yczogY29sb3JzXG4gICAgICAgIH0pO1xuXG4gICAgICAgIC8vIENvbWJpbmUgTGluZSBDaGFydFxuICAgICAgICB2YXIgY29sb3JzID0gWycjMmQ3YmY0JywgJyM0ZWI3ZWInXTtcbiAgICAgICAgdmFyIGRhdGFDb2xvcnMgPSAkKFwiI3NwYXJrbGluZTRcIikuZGF0YSgnY29sb3JzJyk7XG4gICAgICAgIGlmIChkYXRhQ29sb3JzKSB7XG4gICAgICAgICAgICBjb2xvcnMgPSBkYXRhQ29sb3JzLnNwbGl0KFwiLFwiKTtcbiAgICAgICAgfVxuICAgICAgICAkKCcjc3BhcmtsaW5lNCcpLnNwYXJrbGluZShbMCwgMjMsIDQzLCAzNSwgNDQsIDQ1LCA1NiwgMzcsIDQwXSwge1xuICAgICAgICAgICAgdHlwZTogJ2xpbmUnLFxuICAgICAgICAgICAgd2lkdGg6IFwiMTAwJVwiLFxuICAgICAgICAgICAgaGVpZ2h0OiAnMTY1JyxcbiAgICAgICAgICAgIGNoYXJ0UmFuZ2VNYXg6IDUwLFxuICAgICAgICAgICAgbGluZUNvbG9yOiBjb2xvcnNbMF0sXG4gICAgICAgICAgICBmaWxsQ29sb3I6ICd0cmFuc3BhcmVudCcsXG4gICAgICAgICAgICBsaW5lV2lkdGg6IDIsXG4gICAgICAgICAgICBoaWdobGlnaHRMaW5lQ29sb3I6ICdyZ2JhKDAsMCwwLC4xKScsXG4gICAgICAgICAgICBoaWdobGlnaHRTcG90Q29sb3I6ICdyZ2JhKDAsMCwwLC4yKScsXG4gICAgICAgICAgICBtYXhTcG90Q29sb3I6IGZhbHNlLFxuICAgICAgICAgICAgbWluU3BvdENvbG9yOiBmYWxzZSxcbiAgICAgICAgICAgIHNwb3RDb2xvcjogZmFsc2VcbiAgICAgICAgfSk7XG4gICAgICAgICQoJyNzcGFya2xpbmU0Jykuc3BhcmtsaW5lKFsyNSwgMjMsIDI2LCAyNCwgMjUsIDMyLCAzMCwgMjQsIDE5XSwge1xuICAgICAgICAgICAgdHlwZTogJ2xpbmUnLFxuICAgICAgICAgICAgd2lkdGg6IFwiMTAwJVwiLFxuICAgICAgICAgICAgaGVpZ2h0OiAnMTY1JyxcbiAgICAgICAgICAgIGNoYXJ0UmFuZ2VNYXg6IDQwLFxuICAgICAgICAgICAgbGluZUNvbG9yOiBjb2xvcnNbMV0sXG4gICAgICAgICAgICBmaWxsQ29sb3I6ICd0cmFuc3BhcmVudCcsXG4gICAgICAgICAgICBjb21wb3NpdGU6IHRydWUsXG4gICAgICAgICAgICBsaW5lV2lkdGg6IDIsXG4gICAgICAgICAgICBtYXhTcG90Q29sb3I6IGZhbHNlLFxuICAgICAgICAgICAgbWluU3BvdENvbG9yOiBmYWxzZSxcbiAgICAgICAgICAgIHNwb3RDb2xvcjogZmFsc2UsXG4gICAgICAgICAgICBoaWdobGlnaHRMaW5lQ29sb3I6ICdyZ2JhKDAsMCwwLDEpJyxcbiAgICAgICAgICAgIGhpZ2hsaWdodFNwb3RDb2xvcjogJ3JnYmEoMCwwLDAsMSknXG4gICAgICAgIH0pO1xuXG4gICAgICAgIC8vIENvbXBvc2l0ZSBiYXIgQ2hhcnRcbiAgICAgICAgdmFyIGNvbG9ycyA9IFsnI2UzZWFlZicsICcjNmM3NTdkJ107XG4gICAgICAgIHZhciBkYXRhQ29sb3JzID0gJChcIiNzcGFya2xpbmU2XCIpLmRhdGEoJ2NvbG9ycycpO1xuICAgICAgICBpZiAoZGF0YUNvbG9ycykge1xuICAgICAgICAgICAgY29sb3JzID0gZGF0YUNvbG9ycy5zcGxpdChcIixcIik7XG4gICAgICAgIH1cbiAgICAgICAgJCgnI3NwYXJrbGluZTYnKS5zcGFya2xpbmUoWzMsIDYsIDcsIDgsIDYsIDQsIDcsIDEwLCAxMiwgNywgNCwgOSwgMTIsIDEzLCAxMSwgMTJdLCB7XG4gICAgICAgICAgICB0eXBlOiAnbGluZScsXG4gICAgICAgICAgICB3aWR0aDogXCIxMDAlXCIsXG4gICAgICAgICAgICBoZWlnaHQ6ICcxNjUnLFxuICAgICAgICAgICAgbGluZUNvbG9yOiBjb2xvcnNbMF0sXG4gICAgICAgICAgICBsaW5lV2lkdGg6IDIsXG4gICAgICAgICAgICBmaWxsQ29sb3I6ICdyZ2JhKDIyNywyMzQsMjM5LDAuMyknLFxuICAgICAgICAgICAgaGlnaGxpZ2h0TGluZUNvbG9yOiAncmdiYSgwLDAsMCwuMSknLFxuICAgICAgICAgICAgaGlnaGxpZ2h0U3BvdENvbG9yOiAncmdiYSgwLDAsMCwuMiknXG4gICAgICAgIH0pO1xuICAgICAgICAkKCcjc3BhcmtsaW5lNicpLnNwYXJrbGluZShbMywgNiwgNywgOCwgNiwgNCwgNywgMTAsIDEyLCA3LCA0LCA5LCAxMiwgMTMsIDExLCAxMl0sIHtcbiAgICAgICAgICAgIHR5cGU6ICdiYXInLFxuICAgICAgICAgICAgaGVpZ2h0OiAnMTY1JyxcbiAgICAgICAgICAgIGJhcldpZHRoOiAnMTAnLFxuICAgICAgICAgICAgYmFyU3BhY2luZzogJzUnLFxuICAgICAgICAgICAgY29tcG9zaXRlOiB0cnVlLFxuICAgICAgICAgICAgYmFyQ29sb3I6IGNvbG9yc1sxXVxuICAgICAgICB9KTtcblxuICAgICAgICAvLyBEaXNjcmV0ZSBDaGFydFxuICAgICAgICB2YXIgY29sb3JzID0gWycjMzY0MDRjJ107XG4gICAgICAgIHZhciBkYXRhQ29sb3JzID0gJChcIiNzcGFya2xpbmU3XCIpLmRhdGEoJ2NvbG9ycycpO1xuICAgICAgICBpZiAoZGF0YUNvbG9ycykge1xuICAgICAgICAgICAgY29sb3JzID0gZGF0YUNvbG9ycy5zcGxpdChcIixcIik7XG4gICAgICAgIH1cbiAgICAgICAgJChcIiNzcGFya2xpbmU3XCIpLnNwYXJrbGluZShbNCwgNiwgNywgNywgNCwgMywgMiwgMSwgNCwgNCwgNSwgNiwgMywgNCwgNSwgOCwgNywgNiwgOSwgMywgMiwgNCwgMSwgNSwgNiwgNCwgMywgN10sIHtcbiAgICAgICAgICAgIHR5cGU6ICdkaXNjcmV0ZScsXG4gICAgICAgICAgICB3aWR0aDogJzI4MCcsXG4gICAgICAgICAgICBoZWlnaHQ6ICcxNjUnLFxuICAgICAgICAgICAgbGluZUNvbG9yOiBjb2xvcnNcbiAgICAgICAgfSk7XG5cbiAgICAgICAgLy8gQnVsbGV0IENoYXJ0XG4gICAgICAgIHZhciBjb2xvcnMgPSBbJyM2NGM1YjEnLCAnIzU1NTNjZSddO1xuICAgICAgICB2YXIgZGF0YUNvbG9ycyA9ICQoXCIjc3BhcmtsaW5lOFwiKS5kYXRhKCdjb2xvcnMnKTtcbiAgICAgICAgaWYgKGRhdGFDb2xvcnMpIHtcbiAgICAgICAgICAgIGNvbG9ycyA9IGRhdGFDb2xvcnMuc3BsaXQoXCIsXCIpO1xuICAgICAgICB9XG4gICAgICAgICQoJyNzcGFya2xpbmU4Jykuc3BhcmtsaW5lKFsxMCwgMTIsIDEyLCA5LCA3XSwge1xuICAgICAgICAgICAgdHlwZTogJ2J1bGxldCcsXG4gICAgICAgICAgICB3aWR0aDogJzI4MCcsXG4gICAgICAgICAgICBoZWlnaHQ6ICc4MCcsXG4gICAgICAgICAgICB0YXJnZXRDb2xvcjogY29sb3JzWzBdLFxuICAgICAgICAgICAgcGVyZm9ybWFuY2VDb2xvcjogY29sb3JzWzFdXG4gICAgICAgIH0pO1xuXG4gICAgICAgIC8vIEJveCBQbG90IENoYXJ0XG4gICAgICAgIHZhciBjb2xvcnMgPSBbJyM2NjU4ZGQnLCAnIzFhYmM5YyddO1xuICAgICAgICB2YXIgZGF0YUNvbG9ycyA9ICQoXCIjc3BhcmtsaW5lOVwiKS5kYXRhKCdjb2xvcnMnKTtcbiAgICAgICAgaWYgKGRhdGFDb2xvcnMpIHtcbiAgICAgICAgICAgIGNvbG9ycyA9IGRhdGFDb2xvcnMuc3BsaXQoXCIsXCIpO1xuICAgICAgICB9XG4gICAgICAgICQoJyNzcGFya2xpbmU5Jykuc3BhcmtsaW5lKFs0LCAyNywgMzQsIDUyLCA1NCwgNTksIDYxLCA2OCwgNzgsIDgyLCA4NSwgODcsIDkxLCA5MywgMTAwXSwge1xuICAgICAgICAgICAgdHlwZTogJ2JveCcsXG4gICAgICAgICAgICB3aWR0aDogJzI4MCcsXG4gICAgICAgICAgICBoZWlnaHQ6ICc4MCcsXG4gICAgICAgICAgICBib3hMaW5lQ29sb3I6IGNvbG9yc1swXSxcbiAgICAgICAgICAgIGJveEZpbGxDb2xvcjogJ3RyYW5zcGFyZW50JyxcbiAgICAgICAgICAgIHdoaXNrZXJDb2xvcjogY29sb3JzWzFdLFxuICAgICAgICAgICAgbWVkaWFuQ29sb3I6IGNvbG9yc1sxXSxcbiAgICAgICAgICAgIHRhcmdldENvbG9yOiBjb2xvcnNbMV1cbiAgICAgICAgfSk7XG5cbiAgICAgICAgLy8gVHJpc3RhdGUgQ2hhcnRzXG4gICAgICAgIHZhciBjb2xvcnMgPSBbJyMwYWNmOTcnLCAnI2UzZWFlZicsICcjZmY2NzliJ107XG4gICAgICAgIHZhciBkYXRhQ29sb3JzID0gJChcIiNzcGFya2xpbmUxMFwiKS5kYXRhKCdjb2xvcnMnKTtcbiAgICAgICAgaWYgKGRhdGFDb2xvcnMpIHtcbiAgICAgICAgICAgIGNvbG9ycyA9IGRhdGFDb2xvcnMuc3BsaXQoXCIsXCIpO1xuICAgICAgICB9XG4gICAgICAgICQoJyNzcGFya2xpbmUxMCcpLnNwYXJrbGluZShbMSwgMSwgMCwgMSwgLTEsIC0xLCAxLCAtMSwgMCwgMCwgMSwgMV0sIHtcbiAgICAgICAgICAgIGhlaWdodDogJzgwJyxcbiAgICAgICAgICAgIHdpZHRoOiAnMTAwJScsXG4gICAgICAgICAgICB0eXBlOiAndHJpc3RhdGUnLFxuICAgICAgICAgICAgcG9zQmFyQ29sb3I6IGNvbG9yc1swXSxcbiAgICAgICAgICAgIG5lZ0JhckNvbG9yOiBjb2xvcnNbMV0sXG4gICAgICAgICAgICB6ZXJvQmFyQ29sb3I6IGNvbG9yc1syXSxcbiAgICAgICAgICAgIGJhcldpZHRoOiA4LFxuICAgICAgICAgICAgYmFyU3BhY2luZzogMyxcbiAgICAgICAgICAgIHplcm9BeGlzOiBmYWxzZVxuICAgICAgICB9KTtcblxuICAgIH0sXG4gICAgICAgIERyYXdNb3VzZVNwZWVkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgdmFyIG1yZWZyZXNoaW50ZXJ2YWwgPSA1MDA7IC8vIHVwZGF0ZSBkaXNwbGF5IGV2ZXJ5IDUwMG1zXG4gICAgICAgICAgICB2YXIgbGFzdG1vdXNleCA9IC0xO1xuICAgICAgICAgICAgdmFyIGxhc3Rtb3VzZXkgPSAtMTtcbiAgICAgICAgICAgIHZhciBsYXN0bW91c2V0aW1lO1xuICAgICAgICAgICAgdmFyIG1vdXNldHJhdmVsID0gMDtcbiAgICAgICAgICAgIHZhciBtcG9pbnRzID0gW107XG4gICAgICAgICAgICB2YXIgbXBvaW50c19tYXggPSAzMDtcbiAgICAgICAgICAgICQoJ2h0bWwnKS5tb3VzZW1vdmUoZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgICAgICAgICB2YXIgbW91c2V4ID0gZS5wYWdlWDtcbiAgICAgICAgICAgICAgICB2YXIgbW91c2V5ID0gZS5wYWdlWTtcbiAgICAgICAgICAgICAgICBpZiAobGFzdG1vdXNleCA+IC0xKSB7XG4gICAgICAgICAgICAgICAgICAgIG1vdXNldHJhdmVsICs9IE1hdGgubWF4KE1hdGguYWJzKG1vdXNleCAtIGxhc3Rtb3VzZXgpLCBNYXRoLmFicyhtb3VzZXkgLSBsYXN0bW91c2V5KSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGxhc3Rtb3VzZXggPSBtb3VzZXg7XG4gICAgICAgICAgICAgICAgbGFzdG1vdXNleSA9IG1vdXNleTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgdmFyIG1kcmF3ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIHZhciBtZCA9IG5ldyBEYXRlKCk7XG4gICAgICAgICAgICAgICAgdmFyIHRpbWVub3cgPSBtZC5nZXRUaW1lKCk7XG4gICAgICAgICAgICAgICAgaWYgKGxhc3Rtb3VzZXRpbWUgJiYgbGFzdG1vdXNldGltZSAhPSB0aW1lbm93KSB7XG4gICAgICAgICAgICAgICAgICAgIHZhciBwcHMgPSBNYXRoLnJvdW5kKG1vdXNldHJhdmVsIC8gKHRpbWVub3cgLSBsYXN0bW91c2V0aW1lKSAqIDEwMDApO1xuICAgICAgICAgICAgICAgICAgICBtcG9pbnRzLnB1c2gocHBzKTtcbiAgICAgICAgICAgICAgICAgICAgaWYgKG1wb2ludHMubGVuZ3RoID4gbXBvaW50c19tYXgpXG4gICAgICAgICAgICAgICAgICAgICAgICBtcG9pbnRzLnNwbGljZSgwLCAxKTtcbiAgICAgICAgICAgICAgICAgICAgbW91c2V0cmF2ZWwgPSAwO1xuICAgICAgICAgICAgICAgICAgICB2YXIgY29sb3JzID0gWycjZjE1NTZjJ107XG4gICAgICAgICAgICAgICAgICAgIHZhciBkYXRhQ29sb3JzID0gJChcIiNzcGFya2xpbmU1XCIpLmRhdGEoJ2NvbG9ycycpO1xuICAgICAgICAgICAgICAgICAgICBpZiAoZGF0YUNvbG9ycykge1xuICAgICAgICAgICAgICAgICAgICAgICAgY29sb3JzID0gZGF0YUNvbG9ycy5zcGxpdChcIixcIik7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgJCgnI3NwYXJrbGluZTUnKS5zcGFya2xpbmUobXBvaW50cywge1xuICAgICAgICAgICAgICAgICAgICAgICAgdG9vbHRpcFN1ZmZpeDogJyBwaXhlbHMgcGVyIHNlY29uZCcsXG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlOiAnbGluZScsXG4gICAgICAgICAgICAgICAgICAgICAgICB3aWR0aDogXCIxMDAlXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWlnaHQ6ICcxNjUnLFxuICAgICAgICAgICAgICAgICAgICAgICAgY2hhcnRSYW5nZU1heDogNzcsXG4gICAgICAgICAgICAgICAgICAgICAgICBtYXhTcG90Q29sb3I6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgbWluU3BvdENvbG9yOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHNwb3RDb2xvcjogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICBsaW5lV2lkdGg6IDEsXG4gICAgICAgICAgICAgICAgICAgICAgICBsaW5lQ29sb3I6IGNvbG9ycyxcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbGxDb2xvcjogaGV4VG9SR0IoY29sb3JzWzBdLCAwLjMpLFxuICAgICAgICAgICAgICAgICAgICAgICAgaGlnaGxpZ2h0TGluZUNvbG9yOiAncmdiYSgyNCwxNDcsMTI2LC4xKScsXG4gICAgICAgICAgICAgICAgICAgICAgICBoaWdobGlnaHRTcG90Q29sb3I6ICdyZ2JhKDI0LDE0NywxMjYsLjIpJ1xuICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgbGFzdG1vdXNldGltZSA9IHRpbWVub3c7XG4gICAgICAgICAgICAgICAgc2V0VGltZW91dChtZHJhdywgbXJlZnJlc2hpbnRlcnZhbCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICAvLyBXZSBjb3VsZCB1c2Ugc2V0SW50ZXJ2YWwgaW5zdGVhZCwgYnV0IEkgcHJlZmVyIHRvIGRvIGl0IHRoaXMgd2F5XG4gICAgICAgICAgICBzZXRUaW1lb3V0KG1kcmF3LCBtcmVmcmVzaGludGVydmFsKTtcbiAgICAgICAgfTtcblxuICAgIERyYXdTcGFya2xpbmUoKTtcbiAgICBEcmF3TW91c2VTcGVlZCgpO1xuXG4gICAgdmFyIHJlc2l6ZUNoYXJ0O1xuXG4gICAgJCh3aW5kb3cpLnJlc2l6ZShmdW5jdGlvbiAoZSkge1xuICAgICAgICBjbGVhclRpbWVvdXQocmVzaXplQ2hhcnQpO1xuICAgICAgICByZXNpemVDaGFydCA9IHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgRHJhd1NwYXJrbGluZSgpO1xuICAgICAgICAgICAgRHJhd01vdXNlU3BlZWQoKTtcbiAgICAgICAgfSwgMzAwKTtcbiAgICB9KTtcbn0pO1xuXG4vKiB1dGlsaXR5IGZ1bmN0aW9uICovXG5cbmZ1bmN0aW9uIGhleFRvUkdCKGhleCwgYWxwaGEpIHtcbiAgICB2YXIgciA9IHBhcnNlSW50KGhleC5zbGljZSgxLCAzKSwgMTYpLFxuICAgICAgICBnID0gcGFyc2VJbnQoaGV4LnNsaWNlKDMsIDUpLCAxNiksXG4gICAgICAgIGIgPSBwYXJzZUludChoZXguc2xpY2UoNSwgNyksIDE2KTtcblxuICAgIGlmIChhbHBoYSkge1xuICAgICAgICByZXR1cm4gXCJyZ2JhKFwiICsgciArIFwiLCBcIiArIGcgKyBcIiwgXCIgKyBiICsgXCIsIFwiICsgYWxwaGEgKyBcIilcIjtcbiAgICB9IGVsc2Uge1xuICAgICAgICByZXR1cm4gXCJyZ2IoXCIgKyByICsgXCIsIFwiICsgZyArIFwiLCBcIiArIGIgKyBcIilcIjtcbiAgICB9XG59Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9wYWdlcy9zcGFya2xpbmUuaW5pdC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/pages/sparkline.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/sparkline.init.js"]();
/******/ 	
/******/ })()
;