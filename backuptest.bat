@echo Backup database %PG_PATH%%PG_FILENAME%
@echo off
set hour=%time:~0,2%
if "%hour:~0,1%" == " " set hour=0%hour:~1,1%
set min=%time:~3,2%
if "%min:~0,1%" == " " set min=0%min:~1,1%
set secs=%time:~6,2%
if "%secs:~0,1%" == " " set secs=0%secs:~1,1%
set year=%date:~-4%
set month=%date:~8,2%
if "%month:~0,1%" == " " set month=0%month:~1,1%
set day=%date:~5,2%
if "%day:~0,1%" == " " set day=0%day:~1,1%


set datetimef=%year%-%month%-%day%_%hour%-%min%-%secs%
SET PG_BIN=E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe
SET PG_HOST=localhost
SET PG_PORT=5432
SET PG_DATABASE=DIRDEUPTAEB
SET PG_USER=postgres
SET PG_PASSWORD=123456
SET PG_PATH=E:\laragon\www\DIRDEUPTAEB\db_autosave

SET PG_FILENAME=%PG_PATH%\db-backup%datetimef%.backup

%PG_BIN% -h %PG_HOST% -p %PG_PORT% -U %PG_USER% -C -F c %PG_DATABASE% > %PG_FILENAME%

@echo Backup Taken Complete %PG_FILENAME%
@echo %date%
set hour=%time:~0,2%
if "%hour:~0,1%" == " " set hour=0%hour:~1,1%
echo hour=%hour%
set min=%time:~3,2%
if "%min:~0,1%" == " " set min=0%min:~1,1%
echo min=%min%
set secs=%time:~6,2%
if "%secs:~0,1%" == " " set secs=0%secs:~1,1%
echo secs=%secs%
set year=%date:~-4%
echo year=%year%
set month=%date:~8,2%
if "%month:~0,1%" == " " set month=0%month:~1,1%
echo month=%month%
set day=%date:~5,2%
if "%day:~0,1%" == " " set day=0%day:~1,1%
echo day=%day%

set datetimef=%year%-%month%-%day%_%hour%-%min%-%secs%

echo datetimef=%datetimef%
pause