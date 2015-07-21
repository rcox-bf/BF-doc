# Introduction - Bluefin API Library
This repository has been created to provide an overview of Bluefin Payment Systems family of Application Programming Interface services. Below are description of the services that Bluefin provides through API(s). 

### PayConex (QSAPI)
-----
PayConex is Bluefin’s flagship transaction processing solution. The PayConex API (QSAPI) allows our
customers to programmatically submit transactions through the PayConex Gateway. QSAPI’s flexible
solutions allow our customers several options for submitting transactions while maintaining PCI
compliance through the entire process. QSAPI supports any application or device that can connect
through the Internet-based API and also offers PCI compliance scope reduction through technologies
such as end-to-end encryption (E2E) and tokenization. When used in conjunction with our Transparent
Redirection product, a merchant can greatly reduce PCI compliance scope by bypassing any permanent
or temporary storage of cardholder data (CHD) on servers, networks, or computing devices.

### Reporting Services (RSAPI)
-----
The Bluefin Reporting Services API (RSAPI) provides our customers with a level of access to reporting
data rarely found in the industry. Using RSAPI, our customers can request formatted exports of
transaction data from previous days. RSAPI’s reports contain no sensitive cardholder data, such as card
numbers, meaning the data provided by RSAPI is 100% PCI compliant. 

### Transaction Status (TSAPI)
-----
The Transaction Status API (TSAPI) ensures processing and communication integrity. Transactions
submitted through QSAPI are transmitted over the Internet. From time to time, an Internet Service
Provider (ISP) or upstream Internet network (the backbone of the Internet) may lose a packet or timeout
on a communication during the response from QSAPI to your system. TSAPI allows you to pre-fetch
token IDs and then submit the token ID with a new transaction. If there is ever an Internet timeout, you
can query TSAPI to give you the status of the transaction and whether it was received, approved, or
declined. This reduces duplicate charges and enhances the overall integrity of the communication
process. 

### Bluefin Scheduling Layer (SLAPI)
-----
The Bluefin scheduling layer allows our clients to create recurring payments without having to build a
client-side recurring payment solution. The Scheduling Layer API (SLAPI) allows our clients to create a
wide range of recurring transaction scenarios to manage the unique transaction processing needs of
their business. The scheduling layer also allows our clients to access existing recurring payment records
using our secure PCI compliant token system to modify, cancel, or view recurring payment schedules
and details.

See ["Getting Started"](getting-started.md) for an overview of how to begin using these different services.
