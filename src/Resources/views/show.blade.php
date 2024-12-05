<!-- src/Resources/views/voitures/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Détails de la voiture</title>
</head>
<body>
    <h1>Détails de la voiture</h1>
    <p>Marque: {{ $voiture->marque }}</p>
    <p>Modèle: {{ $voiture->modele }}</p>
    <p>Année: {{ $voiture->annee }}</p>
    <p>Prix: {{ $voiture->prix }}</p>
    <a href="{{ route('voitures.index') }}">Retour à la liste</a>
</body>
</html>
