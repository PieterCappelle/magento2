<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\App\Filesystem;

/**
 * A Magento application specific list of directories
 */
class DirectoryList extends \Magento\Framework\Filesystem\DirectoryList
{
    /**
     * Code base root
     */
    const ROOT = 'base';

    /**
     * Most of entire application
     */
    const APP = 'app';

    /**
     * Modules
     */
    const MODULES = 'code';

    /**
     * Themes
     */
    const THEMES = 'design';

    /**
     * Initial configuration of the application
     */
    const CONFIG = 'etc';

    /**
     * Email Templates
     */
    const EMAIL = 'email';

    /**
     * Libraries or third-party components
     */
    const LIB_INTERNAL = 'lib_internal';

    /**
     * Libraries/components that need to be accessible publicly through web-server (such as various DHTML components)
     */
    const LIB_WEB = 'lib_web';

    /**
     * Language packages
     */
    const LOCALE = 'i18n';

    /**
     * \Directory within document root of a web-server to access static view files publicly
     */
    const PUB = 'pub';

    /**
     * Storage of files entered or generated by the end-user
     */
    const MEDIA = 'media';

    /**
     * Storage of static view files that are needed on HTML-pages, emails or similar content
     */
    const STATIC_VIEW = 'static';

    /**
     * Various files generated by the system in runtime
     */
    const VAR_DIR = 'var';

    /**
     * Temporary files
     */
    const TMP = 'tmp';

    /**
     * File system caching directory (if file system caching is used)
     */
    const CACHE = 'cache';

    /**
     * Logs of system messages and errors
     */
    const LOG = 'log';

    /**
     * File system session directory (if file system session storage is used)
     */
    const SESSION = 'session';

    /**
     * Directory for Setup application
     */
    const SETUP = 'setup';

    /**
     * Dependency injection related file directory
     */
    const DI = 'di';

    /**
     * Relative directory key for generated code
     */
    const GENERATION = 'generation';

    /**
     * Temporary directory for uploading files by end-user
     */
    const UPLOAD = 'upload';

    /**
     * A suffix for temporary materialization directory where pre-processed files will be written (if necessary)
     */
    const TMP_MATERIALIZATION_DIR = 'view_preprocessed';

    const TEMPLATE_MINIFICATION_DIR = 'html';

    /**
     * {@inheritdoc}
     */
    public static function getDefaultConfig()
    {
        $result = [
            self::ROOT => [parent::PATH => ''],
            self::APP => [parent::PATH => 'app'],
            self::MODULES => [parent::PATH => 'app/code'],
            self::CONFIG => [parent::PATH => 'app/etc'],
            self::LIB_INTERNAL => [parent::PATH => 'lib/internal'],
            self::VAR_DIR => [parent::PATH => 'var'],
            self::CACHE => [parent::PATH => 'var/cache'],
            self::LOG => [parent::PATH => 'var/log'],
            self::DI => [parent::PATH => 'var/di'],
            self::GENERATION => [parent::PATH => 'var/generation'],
            self::LOCALE => [parent::PATH => 'app/i18n'],
            self::SESSION => [parent::PATH => 'var/session'],
            self::MEDIA => [parent::PATH => 'pub/media', parent::URL_PATH => 'pub/media'],
            self::STATIC_VIEW => [parent::PATH => 'pub/static', parent::URL_PATH => 'pub/static'],
            self::PUB => [parent::PATH => 'pub', parent::URL_PATH => 'pub'],
            self::LIB_WEB => [parent::PATH => 'lib/web'],
            self::TMP => [parent::PATH => 'var/tmp'],
            self::THEMES => [parent::PATH => 'app/design'],
            self::UPLOAD => [parent::PATH => 'pub/media/upload', parent::URL_PATH => 'pub/media/upload'],
            self::TMP_MATERIALIZATION_DIR => [parent::PATH => 'var/view_preprocessed'],
            self::TEMPLATE_MINIFICATION_DIR => [parent::PATH => 'var/view_preprocessed/html'],
            self::SETUP => [parent::PATH => 'setup/src'],
        ];
        return parent::getDefaultConfig() + $result;
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($root, array $config = [])
    {
        parent::__construct($root, [self::ROOT => [self::PATH => $root]] + $config);
    }
}
