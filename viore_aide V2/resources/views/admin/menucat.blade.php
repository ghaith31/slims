<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catégorie</title>
    <style>
        .subcategories {
            position: fixed;
            top: 0;
            left: 18%; /* Valeur par défaut pour les écrans plus grands */
            transform: translateX(-100%);
            transform: translateY(60%); /* Centre le conteneur horizontalement */
            background-color: white; /* Fond blanc pour le cadre */
            padding: 1px; /* Espacement intérieur */
            border-radius: 1px; /* Bordure arrondie */
            z-index: 9999; /* Assure que le cadre est au-dessus du contenu */
            display: flex; /* Utilisation de flexbox */
            flex-wrap: wrap; /* Permettre le passage à la ligne automatique */
            justify-content: flex-end; /* Centrer les éléments sur l'axe principal */
        }

        @media (max-width: 767px) {
            .subcategories {
                left: 50%; /* Valeur pour les écrans mobiles */
            }
        }

        .subcategory-square {
            width: 150px; /* Largeur souhaitée */
            height: 150px; /* Hauteur souhaitée */
            background-color: #fffffff2;
            padding: 10px;
            margin: 4px;
            display: flex;
            flex-direction: column; /* Aligner le contenu en colonne */
            align-items: center;
            justify-content: center;
            border: 1px solid black; /* Bordure noire de 2 pixels */
        }

        .subcategory-square a {
            color: black; /* Couleur du texte en noir */
            text-decoration: none;
            display: block;
            margin-bottom: 10px; /* Marge en bas pour séparer le texte de l'image */
        }

        .subcategory-square a:hover {
            background-color: gray;
        }

        .subcategory-square img {
            max-width: 150%; /* Taille maximale de l'image */
            max-height: 150%; /* Taille maximale de l'image */
        }

        .cart {
            position: absolute;
            top: 5px; /* Ajuster la position verticale */
            right: 5px; /* Ajuster la position horizontale */
        }
    </style>
</head>
<body>
@include('admin.sidebarmenu')
<div class="layout-page">

    @include('admin.nav')
    <div class="subcategories">
        @foreach ($sousCategories as $sousCategorie)
            <div class="subcategory-square">      
                <a href="{{ url('/menu1/' . $sousCategorie->id) }}" class="sidebar-link">{{ $sousCategorie->Nom }}</a><br>        
            </div>
        @endforeach
    </div> 
    
</body>
</html>
