@ECHO OFF

TITLE MSBUILDTests
goto ALLTESTS
goto end


:ALLTESTS
ECHO testing frameworks
mocha test/commandBuilderTests.js
exit /b

:end
pause
@exit /B 0
