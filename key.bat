@ECHO OFF

DOSKEY ..=cd ..
DOSKEY go-h=cd c://tools/homestead
DOSKEY go-l=cd c://op/domains/lara
DOSKEY vrp=vagrant reload --provision
DOSKEY h=C: ^& cd %USERPROFILE%

DOSKEY ar=php artisan $*
REM doskey pu=.\vendor\bin\phpunit $*

REM doskey c=composer $*
REM doskey cda=composer dump-autoload $*

REM doskey g=gulp $*
REM doskey gp=gulp --production $*
REM doskey gw=gulp watch --continue $*
REM doskey gwp=gulp watch --production --continue $*

REM cd %HOMEDRIVE%%HOMEPATH%
cd %CD%