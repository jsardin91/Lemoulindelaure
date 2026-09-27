# Benchmark typographique — 27 septembre 2026

Contexte : communication animale et univers créatifs de Laure Moulin. Le logo manuscrit et les peintures sont les références du client ; la police du logo n'est pas connue et n'est pas remplacée.

Méthode : recherche avec l'installation du dépôt `.agents/skills/ui-ux-pro-max/` (`--design-system` sur *animal communication wellness nature creative service*, puis `--domain typography` sur *wellness editorial warm trust serif readable french accents*). Les suggestions de couleurs et de mise en page de l'outil ne remplacent pas le logo.

| Piste du catalogue | Atout | Réserve dans ce contexte | Verdict |
| --- | --- | --- | --- |
| **Wellness Calm : Lora / Raleway** | Douceur et caractère naturel ; accord avec le symbole peint | Raleway a une finesse moins robuste pour les formulaires et les longs paragraphes | Lora retenue pour les titres |
| **Soft Rounded : Varela Round / Nunito Sans** | Très accueillante, proche du monde animal | Rend l'univers trop ludique et concurrence le lettrage original | Écartée |
| **Editorial Classic : Cormorant Garamond / Libre Baskerville** | Raffinement et sens artisanal | Titres fins et lecture plus délicate aux petites tailles | Écartée |
| **Corporate Trust : Lexend / Source Sans 3** | Texte et interfaces très lisibles | Un titre purement sans sérif atténue l'aspect peint | Source Sans 3 retenue pour le texte |

**Choix de travail : Lora 600 pour les titres, Source Sans 3 400 pour le corps, 600 pour les contrôles.** Ce couple combine deux recommandations pertinentes du catalogue. Lora fait écho aux courbes du logo ; Source Sans 3 garde les contenus de services, le menu et les formulaires lisibles. Le logo conserve son lettrage d'origine, sous forme d'image.

Les deux familles sont hébergées localement en WOFF2 variables (sous-ensemble latin couvrant le français) dans le thème enfant, avec leurs licences SIL OFL. Une seule fonte normale par famille est nécessaire ; pas de dépendance à Google Fonts au chargement. Test réel du rendu WordPress à faire dès que l'installation est accessible, sur 375, 768, 1024 et 1440 px.

Statut : **proposition implémentée**, soumise à validation avec les règles graphiques complètes du client.
