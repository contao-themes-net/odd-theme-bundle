# contao-themes-net/odd-theme-bundle
ODD - exploring contao theme for contao cms

license

pdir contao theme licence -> see LICENSE file for more informations

## demo

for demo please visit https://odd.contao-themes.net

## install & documentation

for documentation please visit https://docs.contao-themes.net/

## compatible
compatible with Contao >=4.4

## structure

    ./src/Resources
        config = Symfony config (services etc.)
        contao = contao stuff (config, dca etc.)
        public = symlink to web (Images, JS, CSS etc.)
        views  = Templates for Twig

    # Weitere Beispiele für Verzeichnisse in ./src/
    Typ     	                    Verzeichnis
    Commands	                    Command/
    Controllers	                    Controller/
    Service Container Extensions	DependencyInjection/
    Event Listeners	                EventListener/
    Model Klassen	                Model/
    Übersetzungen (Symfony)	        Resources/translations/
    Übersetzungen (Contao)	        Resources/contao/languages/
    Templates (.html5)              Resources/contao/templates/
    Unit-Tests	                    Tests/


## dependencies & licenses

- [Bootstrap Framework](https://getbootstrap.com/) | [Github](https://github.com/twbs/bootstrap) | MIT License (MIT)
- [Fontawesome](https://fontawesome.com/) | [Github](https://github.com/FortAwesome/Font-Awesome) | Font Awesome Free License
- [contao theme helper bundle](https://github.com/pdir/contao-theme-helper-bundle) by [pdir](https://pdir.de/ "Webdesign für Dresden") | Code copyright by pdir / digital agentur. Code released under LGPL v3.
- [Headroom.js](http://wicky.nillia.ms/headroom.js/) | [Github](https://github.com/WickyNilliams/headroom.js) | Code copyright 2013 by Nick Williams. Code released under the MIT license.
