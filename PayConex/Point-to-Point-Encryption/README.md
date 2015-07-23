# Point-to-Point Encryption (P2PE)
Point to Point Encryption (P2PE) allows the merchant the ability to safeguard their customer’s data from
the point of capture all the way through its delivery to Bluefin.

Bluefin approved encryption devices such as the SecuRED and M130 encrypt the data at the reader.
This ensures that only encrypted data leaves the capture device and enters the merchant’s computer via
the USB connector. The encrypted data cannot be decrypted locally. It can only be decrypted once
safely on the Bluefin servers.

The encryption device does however allow for PCI approved data such as the card holders name, first
four of the card, last four of the card, and expiration date to be shown for you to capture if needed.

### Orientation

Bluefin supports several devices for card swipe or keyed entry. Popular choices among P2PE devices are
the SecuRED and SHRED devices, and for E2E encryption, the M100 and M130. For mobile applications,
Bluefin supports the Shuttle device for E2E encryption and the forthcoming Prima M device for P2P
encryption means form a mobile platform.

They all function as keyboard emulators. Their output can be targeted in the exact same way the output
of a keyboard can be targeted. The M100 is a key entry only device. The SHRED and the M130 are both
a keyed entry and a card swipe device. The SecuRED is a card swipe only device. Both of the mobile
devices are swipe only, audio jack, devices.

When accepting card swipe or keyed input from an encrypted POI terminal such as the M100 or M130,
the data is captured directly as keyboard input, as if someone had typed it into your application. In
order to ensure that these “keystrokes” are recorded into the correct field, the merchant application
must have keyboard focus on the field that will receive the input.
For a web form, you can use HTML code such as the following to place the keyboard focus on the
appropriate form field as soon as the page loads:

```<body onLoad="document.getElementById('encryptedpayload').focus();">```

Elsewhere, in the form itself, there should be an input field using the same name (in this example, we
have used “encryptedpayload”, although the name of the field could be anything). We recommend
using a “password” input type because the encrypted output does not need to be visible and may create
confusion to the user. Here is a simple example:

```<input type="password" name="encryptedpayload">```

In order to successfully submit a swiped transaction, you will need to pass the encrypted output in its
entirety. You can pass it using the variable “card_tracks”. For swipe transactions, you do not need to 
supply the card_number, card_expiration, first_name, last_name or card_verification fields, as these are
included in the encrypted data.

In order to successfully submit a keyed transaction, you will need to pass the encrypted output in its
entirety. You can pass it using the variable “card_number”. For keyed transactions, you do not need to
supply the card_number, card_expiration, or card_verification fields, as these are included in the
encrypted data. The first_name, last_name fields are not generally required unless they are explicitly
required by the processor

*Please note with keyed entries, the M100 and M130 will prompt you for additional card fields.*

**Note**: If you are using Transparent Redirect, we recommend creating two separate pages or payment
sections related to swipe or keyed transactions and allow the cashier to select the appropriate field
before swiping or keying the credit card information.

The M100 & M130 outputs their data in an encrypted format. Please note that other than the “in the
clear” data elements listed below, no other components of the output should be stored. The remaining
output will not be able to be decrypted, and any submissions over the API of a partial output will cause a
failed submission.

For swiped transactions the output data is comprised of encrypted card data and the following “in the clear” elements.

Card holders name = CHolder
First four and last four card digits = MskPAN
Card expiration = Exp

For keyed entries, there are several options available on the M100 and M130 device to choose from.
The M100 and M130, by default, are set to Configuration #1, but can be adjusted to support up to 5
different formats if you wish to use a different one. All possible configurations are listed below, but
Bluefin recommends configuration #1 (default) or #4.

**Configuration #1** (Recommended Configuration)<br>
First four and last four card digits = MskPAN<br>
Card expiration = Exp

**Configuration #2**<br>
First four and last four card digits = MskPAN<br>
Card expiration = Exp<br>
Zip code = AVSZip<br>

**Configuration #3**<br>
First four and last four card digits = MskPAN<br>
Card expiration = Exp<br>
Street number of the Address = AVSAddr (not utilized by Bluefin for processing, or stored)<br>
Zip code = AVSZip<br>

**Configuration #4 (Recommended Configuration)**<br>
First four and last four card digits = MskPAN<br>
Card expiration = Exp<br>
Zip code = AVSZip (not utilized by Bluefin for processing or stored)<br>
Security code = ***<br>
*This configuration asks for the CVV2 security code, but it is encrypted and not included in the output.

**Configuration #5**<br>
First four and last four card digits = MskPAN<br>
Card expiration = Exp<br>
Street number of the Address= AVSAddr (not utilized by Bluefin for processing or stored)<br>
Zip code = AVSZip (not utilized by Bluefin for processing or stored)<br>
Security code = ***<br>
*This configuration asks for the CVV2 security code, but it is encrypted and not included in the output.*

To modify the configurations on your M100 and M130 unit, press the “Admin” key. The screen will
display “Select Config 1-5.” Simply hit the number on the keypad indicating the configuration you want,
and then press Enter. Again, Bluefin recommends Configuration #1, or optionally #4.

The following table includes an index of the API request variables for point to point encryption (P2PE) or end to end encryption (E2EE):

| Variable Name  | Max Length | Type | Description |
| :-------------: | :-------------: | :-------------: | :------------- | 
| **card_tracks**  | ? | Alphanumeric | This allows for the submission of the entire data payload from a swipe produced on an encrypted device such as the M100 or M130. |
| **card_number**  | ? | Alphanumeric | This allows for the submission of the entire data payload from a keyed entry produced on an encrypted device such as the M100 or M130. |
