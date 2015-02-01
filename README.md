Laravel-4-Bing-Translation-Library
==================================

######Copied from [Laravel 4 Bing Translation Library](https://github.com/Ronster/Laravel-4-Bing-Translation-Library), but with support to Laravel 4.2+

## Installation

Install this package through Composer. To your `composer.json` file, add:

```
"require-dev": {
	"sputinyk/bing-translation": "dev-master"
}
```

Next, run `composer update` to download it.

Finally, add the service provider to `app/config/app.php`, within the `providers` array.

```
'providers' => array(
	// ...

	'Sputinyk\BingTranslation\BingTranslationServiceProvider'
)
```

## Configuration

Run `php artisan config:publish Sputinyk/bing-translation` to publish the package config file. Add your API key and your done.

## Usage

This package is a laravel 4 port of the Microsoft Bing Translation PHP wrapper. Instructions can be found here: [Microsoft Bing Translation PHP wrapper](http://www.codediesel.com/php/microsoft-bing-translate-php-wrapper/)

## Example
```
$text = 'Hello world!';
$translatedText = Bing::translate( $text, "en", "nl" );
dd($translatedText);
```
