<?php
/**
 * The global configuration for the tests.
 */

error_reporting(E_ALL | E_STRICT);

ini_set('display_errors', 1);

date_default_timezone_set('Europe/Berlin');

spl_autoload_register(function(
    $className, $projectRoot = __DIR__, $directoryToBeLoaded = 'src/', $prefix = 'ExtJsTypes_'
  ) {
    static $classes;

    if ($classes === null) {

      $regexIterator = new RegexIterator(
        new RecursiveIteratorIterator(
          new RecursiveDirectoryIterator($directoryToBeLoaded)
        ),
        '/^.+\.php$/i',
        RecursiveRegexIterator::GET_MATCH
      );

      foreach (iterator_to_array($regexIterator, false) as $file) {

        $path = str_replace($directoryToBeLoaded, '', current($file));
        $name = str_replace('/', '_', $path);
        $name = str_replace('.php', '', $name);

        $classes[$prefix . $name] = $directoryToBeLoaded . $path;
      }
    }

    if (isset($classes[$className])) {
      require $projectRoot . '/'. $classes[$className];
    }
  }
);
