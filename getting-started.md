#Getting Started
The first step in developing a connection from your application to any of the PayConex APIs is getting
set up with a certification account. You should have been assigned certification credentials during your
setup process, but if you have not been assigned an account yet, please [click here](https://www.bluefin.com/solutions/integrated-payments-isv/sandbox-account/) and submit the form to request an account. 

The certification environment (also referred to as CERT or Sandbox) allows our customers to develop their solution
in an environment that is identical to our live production environment. Developing on CERT allows you
the ability to test transactions without the fear of cards being submitted for actual processing, and
removes any concerns over having to remove test data from production.

CERT accounts are provided with every integration project, and can be made available again at a later
date should you wish to make coding changes on your end that you would like to test. The CERT
environment does support all API functions, including support for card reader devices.

#### Base URL
There are two base URLs that are important for connecting to the API and they must be followed. When developing and testing,
you need to use the CERT URL. For production (live) processing, you need to just change the first portion
of the URL to secure. Both URLs are shown below:

-----

* https://cert.payconex.net/api/

* https://secure.payconex.net/api/

-----

>**NOTE**: Each API has it's own location or endpoint that will need to come after the base URL. The following (in bold) are the locations you will need to append to the end of the URL to access each API. 
* PayConex (QSAPI): **qsapi/3.8/**
* Transaction Status (TSAPI): **tsapi/3.8/**
* Reporting Services (RSAPI): **rsapi/3.8/**
* Scheduling Layer (SLAPI): **slapi/3.8/**

-----

#### HASH for Security

Bluefin highly recommends using a HASH for security reasons. A hash function is an algorithm that
transforms (hashes) an arbitrary set of data elements, such as a text string or file, into a single fixed
length value (the hash). The computed hash value is a means of protecting sensitive data. Bluefin has
included this functionality into its API.

[See HASH documentation for more information.](HASH-Authentication)


You will be issued different API credentials for certification and production. After the CERT process,
when you are ready to process cards, you will need to update your API authentication credentials with
the production credentials that were provided to you for your transactions to process correctly.

If you have any technical issues during the certification process that you need help with, please email us
at support@bluefin.com or integration@bluefin.com. Members of our support or integration staff can help answer 
your technical questions, and help troubleshoot code samples, as required.

Click one of the following for more information regarding that specific API:

-----

* [PayConex (QSAPI)](PayConex/README.md)
* [Transaction Status (TSAPI)](Transaction-Status/README.md)
* [Reporting Services (RSAPI)](Reporting-Services/README.md)
* [Scheduling Layer (SLAPI)](Scheduling-Layer/README.md)

-----

[**Go Back** - Introduction](README.md)

