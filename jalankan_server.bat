@echo off
title StudentMart Server
cd /d "D:\studentmart"
echo ========================================================
echo   Menjalankan Server StudentMart (Localhost:8000)
echo ========================================================
echo.
echo Server sedang berjalan...
echo Buka browser dan kunjungi: http://127.0.0.1:8000
echo.
echo (Jangan tutup jendela ini selama menggunakan website)
echo Tekan Ctrl+C untuk mematikan server.
echo.
C:\php\php.exe artisan serve --host=127.0.0.1 --port=8000
pause
