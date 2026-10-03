# Direction artistique V2 — Le Moulin de Laure

État : intégration locale et préversion publique vérifiées le 2026-10-03. Branche `redesign/art-direction-v2`. Cette décision remplace la composition V1, pas les fondations de marque approuvées. Déploiement et QA live : `V2-PREVIEW-DEPLOYMENT-REPORT.md`.

## Audit sévère de la V1 publique

Captures du domaine principal à 1440 et 375 px : `.local-wp/review-live/`. La V1 était techniquement fiable, mais l'accueil plaçait les œuvres dans quatre petites découpes équilibrées, puis répétait des sections crème/blanc/encre avec liens et CTA similaires. Le hub utilisait quatre panneaux de même anatomie. Les titres Lora restaient timides, les œuvres décoraient la grille au lieu de la commander, et le header/footer Astra donnaient la sensation d'un site WordPress éditorial standard. Le premier écran ne portait pas assez la singularité picturale de Laure.

## Recherche réellement inspectée

21st MCP a été interrogé avec `art gallery website`, `editorial art direction`, `museum exhibition landing`, `art book layout`, `immersive editorial storytelling`, `organic image composition`, `experimental typography editorial`, `full bleed artwork`, `chapter navigation editorial`, `image masking portfolio` et `creative studio editorial`. Previews ouvertes :

- [Editorial Image Hero](https://21st.dev/@felipemenezes098/components/hero-07) : échelle d'une œuvre et tension avec une typographie de couverture. Le montage final emploie les tableaux de Laure et une composition originale.
- [Editorial Collage Hero](https://21st.dev/@felipemenezes098/components/hero-04) : comparaison utile, mais la grille deux colonnes ressemblait trop à la V1 ; écartée.
- [Portfolio Gallery](https://21st.dev/@isaiahbjork/components/portfolio-gallery) : superpositions observées, mais cartes sombres et marquee incompatibles avec le Moulin ; écartée.
- [Immersive Scroll Gallery](https://21st.dev/@ishamsu/components/immersive-scroll-gallery) : variation de crop/échelle retenue, répétition de la même image rejetée.
- [Image Masking](https://21st.dev/@uilayout.contact/components/image-masking) : principe de découpe organique retenu, formes de démonstration remplacées par des contours sobres propres aux quatre œuvres.

Aucun code de composant 21st, React, Tailwind ou dépendance de motion n'a été copié. `UI/UX Pro Max` a contrôlé image scaling, clavier, touch, mouvement réduit et poids des WebP après la décision artistique. `Taste Skill` a servi aux gates anti-générique, répétition et premier viewport. `Frontend Design Pro` a guidé la thèse visuelle et la traduction en thème enfant.

## Trois directions comparées

Les prototypes statiques se trouvent dans `design/prototypes/v2/` ; `scripts/review-v2-prototypes.mjs` recrée les captures 1440/390 dans `.local-wp/v2-review/`.

| Piste | Qualité | Limite décisive |
| --- | --- | --- |
| A, `galerie.html` | Couverture de livre d'art, grande œuvre, blanc intentionnel | Trop statique pour exprimer les quatre univers et le passage |
| B, `passages.html` | Quatre chapitres lisibles, changements de rythme | Quatre compositions moitié texte/moitié image trop répétitives ; aplats trop littéraux |
| C, `collage.html` | Ouverture vivante et très reconnaissable grâce aux fragments des tableaux | Une fois les quatre œuvres présentes, les bandes successives restaient trop proches les unes des autres |

Direction retenue : **le livre peint à traverser**. Elle unit l'ouverture libre de C, l'échelle éditoriale de A et la narration en chapitres de B, sans conserver la porte comme vignette de service. Le fichier `door-passage.webp` reste une ponctuation possible, non une quatrième porte Air inventée.

## Principes visuels stabilisés

- Les tableaux sont structurels : Phénix dominant dès l'entrée ; Écureuil Terre avec découpe inclinée ; Feu vertical et débordant ; Tortue dans une découpe ample ; Air plus léger et oblique. Le détail des peintures informe chaque champ chromatique.
- Lora travaille à échelle de couverture et de chapitre, Source Sans 3 sert aux repères et aux textes. Grandes phrases avec suivi serré ; jamais de petit texte or peu contrasté. Palette, logo et fontes du Master restent intacts.
- Peu de boîtes, presque aucune ombre ; les CTA de découverte sont des liens éditoriaux de 44 px minimum. La réservation reste plus visible. Les chapitres ont des proportions, recadrages et points d'entrée distincts.
- Desktop : ouverture superposée, manifeste encre, quatre chapitres, Laure par l'emblème et le vide, Jardin végétal, Journal en double page avec détail de peinture, fermeture verte. Mobile : ordre texte puis œuvre dans le hero ; chapitre comme pleine image puis texte ; pas de carousel ; menu natif `<details>`.
- Pas de parallax, scroll-jacking ni animation permanente. Une micro-translation de flèche peut accompagner un survol ; `prefers-reduced-motion` coupe transitions et scroll smooth.

## Prototype, intégration, deux revues

Le prototype choisi est `selected.html` avec `hub.html` et `terre.html`, dans le même dossier. Le hub emploie quatre chapitres pleine largeur, jamais des cards. Les quatre pages détail sont rendues dans WordPress avec contenu et champ chromatique propres à chaque univers. La V2 s'insère via le template déjà attribué aux pages ; `header-v2.php` et `footer-v2.php` remplacent visuellement Astra sur ces pages sans toucher au thème parent. L'accueil, le hub et les détails utilisent des compositions versionnées en HTML sous `assets/v2/`; les pages de soutien restent éditées dans Gutenberg et reçoivent l'enveloppe V2. Les articles natifs reprennent header/footer V2. Le contenu V1 dans la DB est conservé pour rollback, mais les trois familles artistiques sont désormais pilotées par le thème, donc modifier leurs textes visibles exige un changement versionné.

**Review 1, composition/brand** : les titres longs du hub et des détails débordaient à 390 px ; l'échelle mobile a été ajustée. Le Journal n'avait qu'un titre et un lien ; un détail pictural au format de page de magazine a été ajouté. Le raccourci réservation mobile s'affichait comme une flèche isolée ; la réservation a été intégrée au menu explicite.

**Review 2, WordPress/UX** : Astra réimposait une couleur encre aux grands titres sur les champs encre/vert, donc plusieurs phrases étaient invisibles malgré le bon prototype statique. Des règles ciblées ont corrigé cette collision. Les captures locales ont été rouvertes. Sous reduced motion, 48 vues (12 pages × 375/768/1024/1440) avaient un H1, aucune image cassée, erreur console ou débordement horizontal. Le premier Tab atteint le skip link ; le menu mobile natif s'ouvre ; les quatre liens de l'univers sont visibles ; 18 chemins internes distincts répondent HTTP 200. PHP lint et `git diff --check` passent.

## Limites et garde-fous

Les quatre services, le Jardin et le Journal conservent uniquement les faits déjà présents dans le brief/patterns V1. Aucun tarif, durée, preuve de formation, témoignage, partenaire, réponse FAQ ou promesse de résultat n'a été ajouté. Le portrait réel de Laure et les articles manquent ; l'emblème et une mise en page magazine assument volontairement cette absence. Le formulaire et Timetics restent des états d'attente jusqu'à configuration réelle. Le site doit rester `noindex, follow` tant que le contenu et les parcours ne sont pas approuvés. La V2 ne touche ni WordPress core ni Astra parent.
