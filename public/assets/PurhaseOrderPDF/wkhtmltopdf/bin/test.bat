set VAR_1=%1
set VAR_2=%2
wkhtmltopdf --javascript-delay 10000 %VAR_2%\html\%VAR_1%.html %VAR_2%\pdfs\%VAR_1%.pdf
exit



