@echo off
REM Avvia il sito Fabbrica Lirica in locale con il server integrato di PHP.
REM Uso: start-server.bat [porta]
REM Richiede PHP installato (php -v per verificare) e presente nel PATH.

set PORT=%1
if "%PORT%"=="" set PORT=8000

echo Fabbrica Lirica — avvio server di sviluppo
echo Cartella: %~dp0
echo URL:      http://localhost:%PORT%
echo (Ctrl+C per fermare)
echo.

php -S localhost:%PORT% -t "%~dp0"
