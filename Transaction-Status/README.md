#Transaction Status Interface
The Transaction Status is a unique service that Bluefin provides for merchants to allow their systems to
reserve token IDs prior to a transaction so that our merchants can have an added level of control,
assurance and reporting for their internal applications.

The Transaction Status Interface API (TSAPI) allows our merchants to request a token ID from the Bluefin
Gateway prior to a transaction. Using the standard QSAPI process, a merchant would post a transaction
and during the response, Bluefin would provide a unique transaction ID for the merchant to use to
reference that transaction. With TSAPI, the merchant first obtains a transaction ID from TSAPI and then
provides the transaction ID along with the transaction data to QSAPI. The previously obtained
transaction ID is now the token of record for that transaction with Bluefin.

After the transaction is run, the status of the transaction can be queried through TSAPI. This way, if a
timeout occurs, the merchant can retry the query against TSAPI to receive the transaction success or
decline details.

The added layer of assurance comes into play because since the merchant is in effect acting as the
“originating” entity for the transaction ID, the merchant can then know the applied token ID for that
transaction regardless of any timeouts in responses that may occur due to Internet connectivity issues
or other data transfer issues.
