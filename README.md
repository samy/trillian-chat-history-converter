Trillian chat history converter (XML to human-readable format)
===============================

This tool purpose is to format the XML chat history logfiles of Trillian, multi-networks instant messaging clients.

It uses regex to match the needed informations and format it using HTML and CSS.

The code is very basic but the logic behind this tool was "quick and dirty, but fast to develop and use" :)

Where to find the Trillian XML files
----------------------
* On Windows : %appdata%\Roaming\Trillian\users\TRILLIANUSERNAME\logs\NETWORKNAME\Query
* On OS X : /Library/Containers/com.ceruleanstudios.trillian.osx/Data/Library/Application Support/Trillian/users/

Of course, replace TRILLIANUSERNAME and NETWORKNAME by the corresponding values (GOOGLE, for NETWORKNAME, for Google Talk logs)
