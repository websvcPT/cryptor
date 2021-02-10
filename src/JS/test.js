/*
Compatible Macro Scheduler (www.mjtnet.com) code:
  Let>AES_ALG=AES_256_CBC
  AESEncrypt>hello world,mypassword,ENCRYPT,result
  AESEncrypt>result,mypassword,DECRYPT,original
*/

let crypto = require("crypto");

let data = '{"val1":"xxxxxx"}';
let password = '964POMWCLRCP+A0ER3UMRPODSJGFV3843QĹK,FD9843MQewocm3c4';
let iv = '0000000000000000';

let password_hash = crypto.createHash('sha256').update(password,'utf8').digest('hex');

let key = hex2bin(password_hash);
password_hash = Buffer.alloc(32,key,"binary");

let cipher = crypto.createCipheriv('aes-256-cbc', password_hash, iv);

let encryptedData = cipher.update(data, 'utf8', 'base64') + cipher.final('base64');

console.log('Base64 Encrypted:',  encryptedData);

let decipher = crypto.createDecipheriv('aes-256-cbc', password_hash, iv);

let decryptedText = decipher.update(encryptedData, 'base64', 'utf8') + decipher.final('utf8');

console.log('Decrypted Text:', decryptedText)

function hex2bin(hex)
{
    var bytes = [], str;

    for(var i=0; i< hex.length-1; i+=2)
        bytes.push(parseInt(hex.substr(i, 2), 16));

    return String.fromCharCode.apply(String, bytes);
}
