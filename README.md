# Cryptor

This package includes 2 versions of encryption.

- Cryptor
  - Encrypts and Decrypts using a provided key, and random IV

- CryptorFixedIv
  - Encrypts and Decrypts using a provided key, with fixed (provideable) IV

**Examples**:

```php
$data = '{"val1":"xxxxxx"}';

$encryption_key = "964POMWCLRCP+A0ER3UMRPODSJGFV3843QĹK,FD9843MQewocm3c4";
$crypt = new CryptorFixedIv($encryption_key);
$encrypted = $crypt->encrypt($data);
echo "\nencrypted: " . $encrypted;

$crypt = new CryptorFixedIv($encryption_key);
echo "\ndecrypted: " . $crypt->decrypt($encrypted);
echo chr(10);

# encrypted: PAlHiBIcsH7A61fPySEasRurrYAGzAmTIMxTR82LB8w=
# decrypted: {"val1":"xxxxxx"}
```

**Compatible with JS**:

```bash
cd src/JS
npm i
node test.js
# Base64 Encrypted: PAlHiBIcsH7A61fPySEasRurrYAGzAmTIMxTR82LB8w=
# Decrypted Text: {"val1":"xxxxxx"}
```
