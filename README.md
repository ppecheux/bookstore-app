*Contexte *
===========

> Dans un contexte d’expansion des logiciels libres, on souhaite
> proposer un site de référencement de livres électroniques sous licence
> libre. Le format EPUB doit être utilisé aﬁn d’optimiser la lecture sur
> tous supports.

*Données d’entrée *
===================

> exemples de sites similaires : Framabook
> ([*https://framabook.org/*](https://framabook.org/)), InLibroVeritas
> ([*http://www.inlibroveritas.net/*](http://www.inlibroveritas.net/))
> ...

*Objet du Projet *
==================

> Phase de déﬁnition et de réalisation

*Produit du Projet *
====================

> Note de clariﬁcation , product Backlog, MCD, MLD, Base de données
> relationnelle

*Objectifs visés *
==================

> *Liste de fonctions nécessaires :*
>
> - un utilisateur peut **s’enregistrer** sur le site en entrant les
> informations suivantes : adresse mail et mot de passe. Le nom et le
> prénom sont des attributs qui seront utiles pour un site user friendly
> ( Bonjour Nom Prénom sur la page d'accueil).

-   un utilisateur peut **afficher l’ensemble des livres** référencés
    sur le site

-   un utilisateur peut **rechercher** un livre **par auteur** ou **par
    titre** (ou les 2)

-   un utilisateur peut eﬀectuer une **recherche** dans les livres d’une
    **catégorie** seulement

> - un utilisateur peut faire une **recherche** par auteur qui retourne
> une (page de) **fiche auteur** : la rechercher par auteur parcours à
> la fois les livres et les auteurs et renvoie la liste des livres
> correspondant à l’auteur ainsi qu’un lien vers une ﬁche auteur
> contenant une petite biographie et une liste de ses oeuvres.
>
> - un utilisateur peut **télécharger** un livre (en s’enregistrant ou
> non)
>
> - un utilisateur connecté peut **acheter** des livres qu’ils les ai
> téléchargé précédemment ou non aﬁn de soutenir l’auteur
>
> - un utilisateur enregistré peut **aimer ses livres préférés** et de
> mettre un **commentaire**.

-   un utilisateur peut **faire un don** anonyme ou non au site

-   un utilisateur peut **s’abonner** à un auteur pour recevoir un mail
    quand l’auteur sort un livre.

-   le gestionnaire du site peut **ajouter un livre et une catégorie**
    dans le site.

> - le gestionnaire ne peut pas ajouter un livre ou une catégorie qui
> existe déjà.
>
> - le gestionnaire du site peut **promouvoir** certains livres de son
> choix
>
> **users stories : cf Annexe 1**

*Acteurs du Projet *
====================

> MOA : Stéphane Crozat
>
> MOE : Groupe 7 de NF18, TD du mardi 13h15

*Contraintes à respecter *
==========================

> Délai : jalons du 17/04, 22/05, 29/05 Performance : base de données
> fonctionnelle

*Annexe 1 : Liste des objets et de leurs propriétés*
====================================================

-   Livre :

    -   titre (chaîne de caractères)

    -   pages (entier)

    -   langue (chaîne de caractères)

    -   résumé (chaîne de caractères)

    -   datePublication (date)

-   Catégorie :

    -   nom (chaîne de caractères)

    -   description (chaîne de caractères)

-   Licence :

    -   nom (chaîne de caractères)

    -   droitModiﬁcation (boolean)

    -   partageMemeCondition (boolean)

    -   droitUtilisationCommercial (boolean)

-   Auteur :

    -   nom (chaîne de caractères)

    -   prenom (chaîne de caractères)

    -   biographie (chaîne de caractères)

    -   nationalité (chaîne de caractères)

-   Utilisateurs enregistrés

    -   e-mail (chaîne de caractères)

    -   mot de passe (chaîne de caractères)

    -   nom (chaîne de caractères)

    -   prenom (chaîne de caractères)

-   Livre en vedette :

    -   titre (chaîne de caractères)

    -   auteur (chaîne de caractères)

    -   pages (entier)

    -   langue (chaîne de caractères)

    -   résumé (chaîne de caractères)

    -   datePublication (date)

    -   dateLimite (date)

    -   phraseAccorche (chaîne de caractères)

-   Don

    -   montantDon (réel)

    -   dateDon (date)

*Annexe 2 : users stories*
==========================

1)  Un utilisateur désire lire un livre conseillé par un membre de sa
    famille. Il se rend sur le site en connaissant parfaitement le nom
    de l’auteur et le titre du livre. Il trouve le livre, unique
    résultat de sa requête de recherche, et décide de le télécharger,
    sans s’enregistrer. Après l’avoir lu, il décide de retourner sur le
    site et eﬀectue un don anonyme d’un montant de 15€ pour aider au bon
    fonctionnement du site.

2)  Un autre utilisateur anonyme a lu un livre de Maupassant, et désire
    découvrir ses autres oeuvres. Il se rend sur le site, et ne
    recherche que le nom de l’auteur, Maupassant. Il trouve ainsi
    l’ensemble des livres dont Maupassant ﬁgure dans le nom, le prénom
    de l’auteur, ou dans le titre du livre (possibilité d’ajouter des
    listes de tags réagissant également à ce type de requête).

3)  Le premier utilisateur, désormais fan de lecture, décide de
    s’enregistrer sur le site, pour avoir accès à davantages
    d’informations sur son historique de lectures, de dons et d’achats.
    Il rentre donc ses informations privées (Nom, Prénom, Adresse Mail,
    Mot de passe, Pseudonyme ) Certaines de ces

> informations sont obligatoires, et d’autres facultatives. Lorsque son
> compte est fait, il décide d’acheter les livres lus précédemment.
> Maintenant qu’il est identiﬁé, il décide maintenant de laisser la
> mention “j’aime” sur ses livres préférés et s’abonne à ses auteurs
> favoris.

1)  Le gestionnaire du site décide d’ajouter un livre au répertoire du
    site. Il rentre le titre, l’auteur, la catégorie dans laquelle il se
    situe, ainsi que la licence libre du livre. Cependant, le site lui
    indique que le livre existe déjà dans la base de données, car déjà
    rentré auparavant. Il décide de rentrer un autre livre, mais le site
    lui renvoie une autre erreur : la catégorie du livre n’existe pas.
    Le gestionnaire crée donc la catégorie qu’il désire, puis rentre
    cette fois le livre sans erreur.

2)  Un utilisateur enregistré ne sait pas quoi lire, et essaye de
    trouver un livre lui donnant envie. Il décide de parcourir
    l’ensemble des livres référencés sur le site. Cependant, au cours de
    sa recherche, il se rend compte qu’il désire en particulier lire un
    livre sur les bases de données. Il sélectionne la catégorie “Romans”
    et eﬀectue une recherche par mots-clés contenant “base de données”.
    N’ayant aucune réponse, il se rend compte de son erreur et choisit
    la catégorie “Manuels”.

3)  Le site fonctionne depuis désormais plusieurs mois, et possède un
    certain nombre d’utilisateurs enregistrés ainsi que de visiteurs
    anonymes. Le gestionnaire du site décide de promouvoir les livres
    les plus lus et appréciés. Il eﬀectue une requête pour n’avoir que
    les livres ayant étés téléchargés plus de 1 000 fois, et dont le
    nombre de favoris dépasse 10% du nombre de téléchargements. Il
    décide également d’ajouter à cette liste tous les livres ayant étés
    téléchargés plus de 10 000 fois. Puis, il aﬃche en première page
    l’ensemble des livres obtenus par ses recherches.


