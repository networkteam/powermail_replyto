# TYPO3 Extension: powermail_replyto

Replaces the sender of the receiver mail with global MAIL/defaultMailFromAddress and MAIL/defaultMailFromName.
The original sender is set as ReplyTo.

The behaviour is deactivated when `plugin.tx_powermail.settings.setup.receiver.overwrite.senderEmail` returns a valid mail address.

## Why this extension

It could also be achieved with Powermail TypoScript configuration, but it's less handy when you need to configure it
for every form because field markers for email/name vary from form to form.
