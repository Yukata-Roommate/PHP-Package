<?php

namespace YukataRm\Proxy;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\CryptManager;

/**
 * Crypt Proxy
 *
 * @package YukataRm\Proxy
 *
 * @method static \YukataRm\Interface\Crypt\EncoderInterface encoder(\YukataRm\Enum\Crypt\EncodeAlgorithmEnum|string|null $algorithm = null)
 * @method static \YukataRm\Interface\Crypt\EncoderInterface base64Encoder()
 * @method static \YukataRm\Interface\Crypt\EncoderInterface hexEncoder()
 *
 * @method static string encode(\YukataRm\Enum\Crypt\EncodeAlgorithmEnum|string $algorithm, string $data)
 * @method static string base64Encode(string $data)
 * @method static string hexEncode(string $data)
 *
 * @method static string decode(\YukataRm\Enum\Crypt\EncodeAlgorithmEnum|string $algorithm, string $data)
 * @method static string base64Decode(string $data)
 * @method static string hexDecode(string $data)
 *
 *
 * @method static \YukataRm\Interface\Crypt\HasherInterface hasher(\YukataRm\Enum\Crypt\HashAlgorithmEnum|string|null $algorithm = null)
 * @method static \YukataRm\Interface\Crypt\HasherInterface md5Hasher()
 * @method static \YukataRm\Interface\Crypt\HasherInterface sha256Hasher()
 * @method static \YukataRm\Interface\Crypt\HasherInterface sha512Hasher()
 * @method static \YukataRm\Interface\Crypt\HasherInterface sha3_256Hasher()
 * @method static \YukataRm\Interface\Crypt\HasherInterface sha3_512Hasher()
 *
 * @method static string hash(\YukataRm\Enum\Crypt\HashAlgorithmEnum|string $algorithm, string $data)
 * @method static string hashMd5(string $data)
 * @method static string hashSha256(string $data)
 * @method static string hashSha512(string $data)
 * @method static string hashSha3_256(string $data)
 * @method static string hashSha3_512(string $data)
 *
 *
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface encrypter(\YukataRm\Enum\Crypt\EncryptAlgorithmEnum|string|null $algorithm = null, string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256CbcEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256CcmEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256CfbEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256Cfb1Encrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256Cfb8Encrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256CtrEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256GcmEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256OcbEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256OfbEncrypter(string|null $key = null)
 * @method static \YukataRm\Interface\Crypt\EncrypterInterface aes256XtsEncrypter(string|null $key = null)
 *
 * @method static string encrypt(\YukataRm\Enum\Crypt\EncryptAlgorithmEnum|string $algorithm, string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Cbc(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Ccm(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Cfb(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Cfb1(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Cfb8(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Ctr(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Gcm(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Ocb(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Ofb(string $key, mixed $data, bool $serialize = false)
 * @method static string encryptAes256Xts(string $key, mixed $data, bool $serialize = false)
 *
 * @method static mixed decrypt(\YukataRm\Enum\Crypt\EncryptAlgorithmEnum|string $algorithm, string $key, string $data)
 * @method static mixed decryptAes256Cbc(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Ccm(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Cfb(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Cfb1(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Cfb8(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Ctr(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Gcm(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Ocb(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Ofb(string $key, string $data, bool $unserialize = false)
 * @method static mixed decryptAes256Xts(string $key, string $data, bool $unserialize = false)
 *
 *
 * @method static \YukataRm\Interface\Crypt\PasswordInterface password(\YukataRm\Enum\Crypt\PasswordAlgorithmEnum|string|null $algorithm = null)
 * @method static \YukataRm\Interface\Crypt\PasswordInterface passwordDefault()
 * @method static \YukataRm\Interface\Crypt\PasswordInterface passwordBcrypt(string|null $salt = null, int|null $cost = null)
 * @method static \YukataRm\Interface\Crypt\PasswordInterface passwordArgon2i(int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 * @method static \YukataRm\Interface\Crypt\PasswordInterface passwordArgon2id(int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 *
 * @method static string generatePassword(string $characters, int $length)
 * @method static string generatePasswordBy(int $length, bool $useAlphabet = true, bool $useNumeric = true, bool $useSymbol = true, string|null $addCharacters = null)
 *
 * @method static string hashPassword(\YukataRm\Enum\Crypt\PasswordAlgorithmEnum|string $algorithm, string $data)
 * @method static string hashPasswordDefault(string $data)
 * @method static string hashPasswordBcrypt(string $data, string|null $salt = null, int|null $cost = null)
 * @method static string hashPasswordArgon2i(string $data, int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 * @method static string hashPasswordArgon2id(string $data, int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 *
 * @method static bool verifyPassword(string $data, string $hash)
 *
 * @method static bool isPasswordNeedRehash(\YukataRm\Enum\Crypt\PasswordAlgorithmEnum|string $algorithm, string $hash)
 * @method static bool isPasswordNeedRehashDefault(string $hash)
 * @method static bool isPasswordNeedRehashBcrypt(string $hash, string|null $salt = null, int|null $cost = null)
 * @method static bool isPasswordNeedRehashArgon2i(string $hash, int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 * @method static bool isPasswordNeedRehashArgon2id(string $hash, int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 *
 * @method static string rehashPassword(\YukataRm\Enum\Crypt\PasswordAlgorithmEnum|string $algorithm, string $hash)
 * @method static string rehashPasswordDefault(string $hash)
 * @method static string rehashPasswordBcrypt(string $hash, string|null $salt = null, int|null $cost = null)
 * @method static string rehashPasswordArgon2i(string $hash, int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 * @method static string rehashPasswordArgon2id(string $hash, int|null $memoryCost = null, int|null $timeCost = null, int|null $threads = null)
 *
 * @see \YukataRm\Proxy\Manager\CryptManager
 */
class Crypt extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = CryptManager::class;
}
