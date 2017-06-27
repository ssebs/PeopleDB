:loop
powershell -executionpolicy remotesigned -File accountsfromcsv.ps1
timeout /t 120 /nobreak
goto :loop