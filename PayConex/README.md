#PayConex Transaction Interface - Overview
PayConex’s flexible, secure and PCI compliant API allows our customers the flexibility to run a wide variety of transaction types. The content contained in this portion of the document outlines some of the key features and functions that can be performed using QSAPI. 

The functions listed below are not an exhaustive guide to all functions that can be accomplished with QSAPI; rather they are examples of common actions and are meant to help developers get acclimated with the QSAPI functions. Please visit the [QSAPI variables index](variable-index/qsapi/qsapi-request-parameters.md) to review the different request/response parameters that you can post to the API.

## Features

Feature| Details
------------- | -------------
[**Tokenization**](Tokenization) | The payment gateway stores the card number so the client does not have to,significantly minimizing the vendor/merchant’s PCI footprint.
[**Point-to-Point Encryption (P2PE)**](Point-to-Point-Encryption)  | Bluefin encrypts the magnetic stripe (track data) and card data at the point of entry using a secure device rather than the computer keyboard. Merchants implementing Bluefin’s PCI-validated P2PE solution can consider their encrypted cardholder data to be completely out of PCI scope.
[**Transparent Redirect**]() | The transparent redirect feature is an elegant token-based method to securely and transparently collect card data directly from the cardholder while allowing the merchant to still manage the authorization process. Removes the vendor/merchant from PCI transmission scope.


##Functions

#### [SALE](SALE)
-----
This transaction type allows a merchant to post a sale transaction using either Credit Card or ACH. Please see [tokenization](Tokenization) documentation on how to create a SALE using a previously aquired token. 

#### [AUTHORIZATION](AUTHORIZATION)
-----
This transaction type allows a merchant to verify the ability of a card to accept a specific transaction amount without actually charging the card or to validate the card in order to store a token ([click here]() for token explanation) for later use. Funds are reserved on the card for future capture. Please see [tokenization](Tokenization) documentation on how to conduct a CAPTURE or create another AUTHORIZATION from a previously stored token.

####[CREDIT](CREDIT)
-----
This allows a merchant the ability to credit money back onto a card. With this transaction type, there is no correlation to an original payment. Please see [tokenization](Tokenization) documentation on how to use a token to create a CREDIT transaction. 

####[STORE](STORE)
-----
This allows a merchant to store the cardholder data (card number, expiration, name, etc.) for a card, for later use, without running any actions against the card immediately. This only validates that a card number is in the correct format, it does not validate available funds, expiration date, CVV, or AVS information.

#### [Capture]()
-----
This allows a merchant to capture a previously authorized card, thus converting an Authorization (preauthorization)
into a Sale.

#### [Reissue]()
-----
This allows a merchant to create a new transaction, using a previously (tokenized)[] card. This important function allows merchants to create new transactions based on card numbers stored at Bluefin, without storing cardholder data on their own systems.

####[Refund]()
-----
The most common use of this transaction type allows a merchant to refund an existing transaction, but will also reverse a recent payment transaction. You can refund the entire amount or a partial amount (note: a transaction can only be refunded a single time whether partial or full). 

If a transaction is refunded the same day it is run, then it results in voiding the sale back to a pre-authorization state. If the transaction is refunded after it has already been captured/settled, then it results in crediting the funds back to the card. Bluefin flexibly manages which is the appropriate action to take, so all you need to do is submit the refund.

[**Go Back To** - Getting Started](/getting-started.md)
