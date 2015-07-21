#PayConex Transaction Interface - Overview
PayConex’s flexible, secure and PCI compliant API allows our customers the flexibility to run a wide
variety of transaction types.

###Post a Sale (Payment)
-----
This allows a merchant to post a sale transaction to a variety of tender
types (Card, ACH, etc.).

###Post an Authorization (Authorization ONLY)
-----
This allows a merchant to verify the ability of a card to accept a specific
transaction amount without actually charging the card. Funds are
reserved on the card for future capture.

###Post a Capture
-----
This allows a merchant to capture a previously authorized card, thus converting an Authorization (preauthorization)
into a Sale.

###Post a Reissue
-----
This allows a merchant to create a new transaction, using a previously tokenized card. This important
function allows merchants to create new transactions based on card numbers stored at Bluefin, without
storing cardholder data on their own systems.

###Post a Refund
-----
The most common use of this transaction type allows a merchant to refund an existing transaction, but
will also reverse a recent payment transaction. You can refund the entire amount or a partial amount. If
a transaction is refunded the same day it is run, then it results in voiding the sale back to a preauthorization
state. If the transaction is refunded after it has already been captured/settled, then it
results in crediting the funds back to the card. Bluefin flexibly manages which is the appropriate action
to take, so all you need to do is submit the refund.

###Post a Credit
-----
This allows a merchant the ability to credit money back onto a card. With this transaction type, there is
no correlation to an original payment.

###Store Only
-----
This allows a merchant to store the cardholder data (card number, expiration, name, etc.) for a card, for
later use, without running any actions against the card immediately. 

-----
[**Go Back To** - Getting Started](/getting-started.md)
