# Composer
composer is een project based package manager.
Dit houd in dat composer libs beheerd download en update.
Daarnaast zorgt het ook voor het inladen van deze resouces.

## Installatie
Composer is software die draait op je computer en maakt zelf niet deel uit van je project.
Moet het geinstalleerd worden.
[Link voor het downloaden van de installer](https://getcomposer.org/doc/00-intro.md#installation-windows)

Na de installatie kun je vanuit je commandprompt(cmd) het commando `composer` gebruiken

## Gebruik
In ieder project dat composer gebruikt zul je 3 dingen terug vinden in je filesystem.

* composer.json `Hierin staan alle lib die je in je project wilt gebruiken`
* composer.lock `Hierin staat vast welke versie van iedere lib en sublib je gebruikt (zodat updates je code niet kapot maken)`
* /vendor `hier in staan alle libs - deze map wordt niet meegenomen in git (dus hoeft niet aanwezig te zijn)`

Om alle benodigde libs te downloaden en isntalleren/klaar maken voor gebruik. Ga in cmd naar de benodigde map en voor het volgende commano uit

```
composer install
```