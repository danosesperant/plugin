<!-- src/Resources/views/voitures/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Modifier une voiture</title>
</head>
<body>
    <h1>Modifier une voiture</h1>
    <form action="{{ route('voitures.update', $voiture->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="marque">Marque:</label>
        <input type="text" name="marque" id="marque" value="{{ $voiture->marque }}" required><br>
        <label for="modele">Modèle:</label>
        <input type="text" name="modele" id="modele" value="{{ $voiture->modele }}" required><br>
        <label for="annee">Année:</label>
        <input type="number" name="annee" id="annee" value="{{ $voiture->annee }}" required><br>
        <label for="prix">Prix:</label>
        <input type="number" step="0.01" name="prix" id="prix" value="{{ $voiture->prix }}" required><br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
