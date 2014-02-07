# SubYt

**Deprecated** 

This project is deprecated, but still in a working state if you can get the requirements

## requirements

in `vendor` dir:

    - symfony 1.4
    - Zend Feamework 1.9

## setup

Adjust paths (for symfony and Zend Framework) in `config/ProjectConfiguration.class.php`

Then setup the project

    ./symfony project:permissions
    ./symfony doctrine:build --db
    chmod 777 data/subyt.db
    ./symfony plugin:publish-assets
	ln -s /path/to/vendor/symfony-1.9.x/data/web/sf ./web/sf
    ./symfony guard:create-user admin password


