<?php

namespace ByRobots\Validation;


class Language
{
    /**
     * The default language.
     *
     * @var string
     */
    private $default;

    /**
     * Will contain loaded files.
     *
     * @var array
     */
    private $files = [];

    /**
     * Set-up.
     *
     * @param string $default
     */
    public function __construct($default = 'en')
    {
        $this->setDefault($default);
    }

    /**
     * Sets the default language.
     *
     * @param string $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * Get a language entry.
     *
     * @param string $key
     * @param string $language
     *
     * @return string|null
     * @throws \Exception
     */
    public function get($key, $language = null)
    {
        // If no language is specified use the default
        if (!$language) {
            $language = $this->default;
        }

        // Try to load the file. If it doesn't exist an exception will be
        // thrown here.
        $file = $this->loadLanguage($language);

        // Check we have the requested key.
        if (!empty($file[$key])) {
            return $file[$key];
        }

        // Key not found, or empty. If we're not attempting to get the default
        // language see if we have the key for that.
        if ($language != $this->default) {
            return $this->get($key, $this->default);
        }

        // No good, no key in the default language.
        return null;
    }

    /**
     * Get a language file. Loads it from disc if it hasn't already been loaded,
     * otherwise uses a cached version.
     *
     * @param string $language
     *
     * @return array
     * @throws \Exception
     */
    private function loadLanguage($language)
    {
        // If we don't have the file check it exists and load it.
        if (!array_key_exists($language, $this->files)) {
            if (!file_exists(sprintf('%s/../lang/%s.php',
                __DIR__, $language))) {
                // The file doesn't exist, bug out.
                throw new \Exception(
                    sprintf('Validation: Language file for %s missing.',
                        $language)
                );
            }

            // File exists, load it
            $this->files[$language] = include __DIR__.'/../lang/'.$language.'.php';
        }

        return $this->files[$language];
    }
}
