# Vcard Archive Explorer

This project reads all vcard contacts in a folder and displays them within a list.
Can be used to view deleted contacts that are still available in a backup archive.
All the vcard files should be within the folder ./storage/vcards.
All files that do not end in .vcf are ignored.

As a parser I use JeroenDesloovere\VCard, but I have customised the VCardParser::parseBirthday method,
because the original one uses DateTime, which cannot recognise all birthday types. I am using my own Date class now.

Get started:
- Install PHP 8.3
- Install dependencies via `composer install`.
- Run `php people` to show a list of all contacts that displays name, phone numbers, mail addresses and birthdays.
