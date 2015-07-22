# Tokenization Overview

Bluefin provides the ability to store card holder data as a token_id that can be accessed at a later time. This can reduce the amount of card holder data travelling over a network or through an application which can reduce PCI scope. 

Tokens can be used for a number of different functions across all of our API offerings. Below is an overview of the functions you can accomplish using each API utilizing tokenization.


### What is a token (aka: token_id)?

A token, also known as a token_id is the 12 digit transaction_id of a previous PayConex (QSAPI) transaction. The token_id is used for capture, reissue, and refund transaction types (QSAPI) along with recurring transaction creation (SLAPI).

