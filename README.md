# Task

With the help of Symphony 6 dependency injection component and composer implement:

1. Generators 
   1. Random string generator(a-zA-Z0-9). Possibility to set random string length via dependency injection. Result example: afAs3d
   2. Array with random strings generator(a-zA-Z0-9). Possibility to set array size and string length via dependency injection. Result example: ['Av54sD', '123456', 'NN54sM']

2. Converters
   1. Can convert string by the following pattern: Input: 22aAcd Output: 22/1/1/3/4
   2. Rot13 converter

3. Create Generators collection.

4. Add index.php and add random Generators to your Generators collection. Loop threw collection and apply random Converter to every Generator.

Use PHPCodeSniffer, PHPStan and PHPUnit.

# Test

```bash
composer test
```

```bash
composer lint
```

```bash
composer phpstan
```
