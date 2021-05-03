#C:\xampp\htdocs\2021\school2021\WDV495\python\python.exe

import cgi
import cgitb

form = cgi.FieldStorage()

first_name = form.getValue('firstName').capitalize()
last_name = form.getValue('lastName').capitalize()
school = form.getValue('school').capitalize()

print("Content-Type: text/html\n\n")

print("<html>")
print("<head>")
print("<title>Hello - Second CGI Program </title>")
#print("<style> table{font-family:")
print("</head>")
print("<body>")
print("<h1>Python Assignment</h1>")