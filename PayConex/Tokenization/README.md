# Tokenization

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
