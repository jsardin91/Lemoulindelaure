# Audit de chargement de l’aperçu — 12 octobre 2026

## Périmètre et constats

- Contrôle en navigateur de 13 routes publiques : accueil, hub et quatre accompagnements, Jardin, À propos, Journal et article, FAQ, Contact, réservation. Toutes affichaient `noindex, follow`. Aucun fichier Timetics (script ou CSS) n’était présent sur les 12 routes sans réservation ; la réservation chargeait 4 scripts et 2 feuilles Timetics. Aucun chargement immédiat d’image cassée relevé. Les images différées n’ont pas toutes été ouvertes pour ce contrôle.
- LiteSpeed Cache 7.9.1 actif sur l’aperçu. Audit en lecture seule [GitHub Actions, run 38227368843](https://github.com/jsardin91/Lemoulindelaure/actions/runs/38227368843) : `cache=1`, TTL public 604800 secondes ; Guest Mode, minification/combinaison CSS et JS non activés, `optm-js_defer=0`. L’option de cache navigateur du plugin est vide, mais le serveur sert les CSS et JS avec `Cache-Control: public, max-age=604800`.
- Cinq pages testées via requête HEAD avaient `x-litespeed-cache: hit` et un premier octet entre 57 et 110 ms depuis cette connexion. Quelques requêtes avec paramètre unique, donc hors du cache courant, ont pris environ 0,76 à 1,28 s. Ces mesures ponctuelles ne sont ni un test de terrain ni une attribution causale à un plugin.
- Les deux principaux scripts Timetics servis sur la page de réservation représentent environ 1,8 Mo non compressés (`packages.js` 1 197 644 octets, `frontend.js` 599 430 octets). La page de réservation est donc naturellement la plus lourde en JavaScript. L’accueil ne charge que les scripts WordPress emoji, Astra et V3.

## Décision

Le soupçon précis d’un chargement de Timetics sur les autres pages est infirmé par le navigateur. La mise en cache HTML est effective et le cache navigateur des fichiers statiques aussi. Aucun réglage LiteSpeed global n’a été modifié : différer ou combiner les scripts sans test complet du calendrier pourrait nuire à la réservation. Le thème conserve sa règle qui retire `timetics-packages` hors réservation, vérifiée sur les 13 routes.

La lenteur perçue peut correspondre aux premiers chargements hors cache ou au poids de Timetics sur la réservation. Si elle persiste, faire une mesure de terrain sur le même appareil et le même réseau (page, heure, première visite ou revisite, et phase ressentie : attente de la page ou calendrier) avant de modifier l’hébergement ou le parcours de réservation. Un futur test de chargement à la demande du calendrier demanderait une validation fonctionnelle complète.

Références : [documentation officielle LiteSpeed sur le cache](https://docs.litespeedtech.com/lscache/lscwp/cache/) et [optimisation de page](https://docs.litespeedtech.com/lscache/lscwp/pageopt/).
