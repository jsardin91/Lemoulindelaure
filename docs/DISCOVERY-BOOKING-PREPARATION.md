# Appel découverte gratuit — préparation Timetics

2026-10-04, branche `redesign/editorial-portals-v3`.

## Décision

La page `/prendre-rendez-vous/` doit présenter **un seul appel découverte gratuit** pour le moment. Les quatre rendez-vous Timetics « Prévisualisation — [service] » ne doivent plus être proposés dans cette page. Leur durée technique de 15 minutes n'est pas une durée validée pour l'appel découverte.

Le rendu V3 et le shortcode enfant sont préparés pour un formulaire Timetics natif unique. Le site ne l'affiche que si `lmdl_timetics_booking_mode=single`, `lmdl_timetics_booking_id` désigne un rendez-vous publié/visible et que ce rendez-vous porte `_lmdl_discovery_call=1`. En l'absence de configuration confirmée, la page indique que les créneaux ouvriront bientôt et renvoie au contact. Aucun créneau n'est inventé.

## Données nécessaires avant ouverture

- Durée exacte de l'appel.
- Jours et plages horaires précis, exceptions éventuelles, heure locale `Europe/Paris` à confirmer.
- Téléphone ou visioconférence ; qui appelle qui ou quel lien utiliser.
- Compte Laure/organisatrice Timetics et adresse recevant les notifications ; vérifier la délivrabilité des emails de confirmation.
- Règles de préavis, d'annulation et de reprogrammation si Laure souhaite en afficher.

Le brief historique indique seulement « principalement les soirs et le samedi ». Il ne permet pas de créer des créneaux exacts. L'instruction « gratuit » du propriétaire est la source du tarif zéro pour **cet appel seulement**.

## Mise en service prévue

1. Sauvegarde privée vérifiée, puis audit du compte Timetics existant et du rôle `timetics-staff` sans divulguer ses données dans Git ou les logs publics.
2. Créer un seul rendez-vous **One-to-One** intitulé « Appel découverte gratuit », capacité 1, tarif 0, durée/lieu/plages validés. Utiliser un vrai organisateur et tester les disponibilités. Ne pas activer paiement, groupe ou questions sensibles.
3. Configurer et vérifier les notifications destinataire/invité. Désactiver les quatre anciens rendez-vous de prévisualisation, sans les supprimer.
4. Marquer le nouveau rendez-vous `_lmdl_discovery_call=1`, stocker son ID local dans `lmdl_timetics_booking_id`, passer `lmdl_timetics_booking_mode` à `single`, puis purger LiteSpeed.
5. Tester sur la préversion, au minimum : affichage, date, créneau, formulaire, confirmation, emails, mobile/clavier, fuseau horaire, absence des quatre anciens rendez-vous et `noindex, follow`. Ne pas créer une réservation de test sur le site public sans la supprimer ensuite et vérifier les notifications.

La documentation officielle Timetics décrit la configuration des rendez-vous individuels, plages de disponibilité et lieux : https://timetics.ai/docs/how-to-create-a-booking/ . La version WordPress installée localement est Timetics 1.0.64 ; son shortcode `[timetics-booking-form id="..."]` et ses modèles PHP ont été vérifiés directement. Les étapes exactes doivent être confirmées dans cette version plutôt que déduites de l'interface Timetics AI actuelle.

## Vérifications effectuées

- Rendu local de la page en état fermé aux largeurs 375/768/1024/1440 : un H1, aucun débordement ni image cassée ; captures 375/1440 inspectées.
- Lint PHP des fichiers modifiés et vérification JS du script de revue : réussis.
- Une fixture **TEST LOCAL** a permis de vérifier que le shortcode unique remplace la liste. Le calendrier Timetics a montré un chargement continu dans cette fixture ; le navigateur a signalé une ressource externe bloquée (`ERR_NETWORK_ACCESS_DENIED`). Cela ne valide pas le parcours de réservation. Aucun rendez-vous réel ni notification n'a été créé.
- La page d'appel découverte préparée a été déployée avec le polish Journal du 2026-10-04. Elle reste **fermée** : aucun rendez-vous Timetics actif ni créneau n'a été créé. Astra parent est intact. Le workflow de thème a reçu un mode `journal_demo_only` pour l'article témoin, indépendant de la configuration Timetics.
