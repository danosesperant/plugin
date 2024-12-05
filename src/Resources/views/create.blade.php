<!-- src/Resources/views/voitures/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une voiture</title>
</head>
<body>
    <h1>Ajouter une voiture</h1>
    <form action="{{ route('voitures.store') }}" method="POST">
        @csrf
        <label for="marque">Marque:</label>
        <input type="text" name="marque" id="marque" required><br>
        <label for="modele">Modèle:</label>
        <input type="text" name="modele" id="modele" required><br>
        <label for="annee">Année:</label>
        <input type="number" name="annee" id="annee" required><br>
        <label for="prix">Prix:</label>
        <input type="number" step="0.01" name="prix" id="prix" required><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
