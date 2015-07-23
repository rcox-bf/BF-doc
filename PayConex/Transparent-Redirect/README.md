# Transparent Redirect

## Overview

Transparent redirect is built on the principle of keeping sensitive PCI data off of a merchant’s web
server. Payment forms utilizing transparent redirect submit their data directly to Bluefin from the
customer’s browser so that the sensitive PCI data never touches the merchant’s servers. Bluefin
captures the transaction details, and then relays the response back to the merchant’s website where it
can be recorded, and gives control of the post-transaction user experience back to the merchant.

In addition to transparent redirect, Bluefin provides a support function that allows the merchant to
receive a post back to their servers with the transaction details. This additional feature ensures that the
merchant gets a copy of the transaction response details. The post back happens independently from
the response sent through the customer’s browser. See [POSTback]() documentation for more information.

## Configuration

This version of the API is built around allowing the merchant to have the greatest level of control over
the transparent redirect process by passing the URLs in each transaction. It also allows the merchant the
option to selectively not send URLs if they don’t wish to. So transparent redirect can be used, or not
used, at any time, with any transaction.

Transparent redirect REQUIRES the use of HASH authentication. Please see [Example 3 from the the HASH](/HASH-Authentication) documentation for further explanation. 

## Example Transparent Redirect Page

Please see this for an example on using PHP and HTML to create your own Transparent Redirect payment page. 
