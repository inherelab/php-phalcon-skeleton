@echo off
@setlocal

SET BASE_PATH=%~dp0
IF "%PHP_CMD%" == "" SET PHP_CMD=php5.exe

ECHO Start dev server on 127.0.0.1:8066
php5 -S 127.0.0.1:8066 -t web

:end
ECHO.
ECHO    exit,ByeBye!
ECHO.

@endlocal