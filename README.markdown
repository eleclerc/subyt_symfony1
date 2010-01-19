Before using:

    mkdir cache log
    chmod 755 data
    chmod 777 cache log data/subyt.db
    ./symfony plugin:publish-assets
	ln -s /path/to/pear/data/symfony/web/sf ./web/sf

Might have to adjust `config/ProjectConfiguration.class.php` too. Current setup is working with Zend Server CE and Symfony installed via PEAR


